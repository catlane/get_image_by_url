<?php
/**
 * Created by PhpStorm.
 * User: 猫巷
 * Email:catlane@foxmail.com
 * Date: 2018/12/6
 * Time: 10:43 AM
 */

namespace App\Home\Service;

use Grafika\Grafika;

class GifService extends Service {
    protected $editor;
    protected $storagePath;

    public function __construct () {
        $this->editor = Grafika::createEditor ();
        $this->storagePath = storage_path ( 'app/public/compression/' );
    }

    /**
     * 压缩图片
     * @param $request
     * @throws \Exception
     */
    public function compression ( $request ) {
        $result = [];
//        [
//            'index' => [
//                'status' => true,
//                'src' => '...gif' ,
//
//            ]
//        ];
        foreach ( $request->input ( 'files' ) as $k => $v ) {
            if ( ! $realPath = $this->fileExits ( $v ) ) {
                $result[ 'index' ][ 'status' ] = false;
                continue;
            }
            $this->switchCon ( $request , $realPath );


        }


    }


    /**
     * 检查文件是否存在
     * @param $file         文件
     * @return bool|string  不存在返回false,存在返回真实路径
     */
    public function fileExits ( $file ) {
        $realPath = storage_path ( str_replace ( '/storage' , 'app/public' , $file ) );
        if ( ! file_exists ( $realPath ) ) {
            return false;
        }
        return $realPath;
    }


    /**
     * 根据条件不同，执行不同的优化
     * @param $request
     */
    public function switchCon ( $request , $file ) {
        //首先判断是否选择尺寸
        switch ( $request->input ( 'presetWH' ) ) {
            case '0':
                //不变化，直接压缩
                break;
            case 'set':
                //如果宽高都有才固定尺寸
                if ( $request->ysW && $request->ysH ) {
                    $this->resizeExact ( $request->ysW , $request->ysH , $file );
                } else {
                    if ( $request->ysW ) {
                        $this->resizeExactWidth ( $request->ysW , $file );
                    } else if ( $request->ysH ) {
                        $this->resizeExactHeight ( $request->ysH , $file );
                    }
                }
                break;
            default:
                $this->resizeExactWidth ( $request->ysW , $file );
                break;
        }
    }

    /**
     * 固定尺寸
     * @param $width    宽
     * @param $height   高
     * @param $file     文件真实路径
     */
    public function resizeExact ( $width , $height , $file ) {

    }


    /**
     * 等宽缩放，等比例
     * @param $width    宽
     * @param $file     真实路径
     */
    public function resizeExactWidth ( $width , $file ) {
        $this->editor->open ( $image , $file );
        $this->editor->resizeExactWidth ( $image , 200 );
        $newPath = $this->saveFile ( $image , $file );
        return $newPath;
    }

    /**
     * 等高缩放，等比例
     * @param $width    宽
     * @param $file     真实路径
     */
    public function resizeExactHeight ( $height , $file ) {

    }


    /**
     * 保存文件
     * @param $image    图片
     * @param $file     真实文件路径
     * @return string   返回压缩后的文件真实路径
     */
    public function saveFile ( $image , $file ) {
        $newPath = $this->storagePath . $this->uniqName () . substr ( basename ( $file ) , strpos ( basename ( $file ) , '.' ) );
        $this->editor->save ( $image , $newPath );
        return $newPath;
    }


    /**
     * 获取唯一名称
     * @return int|mixed
     */
    public function uniqName () {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
        $string = time ();
        for ( $len = 30 ; $len >= 1 ; $len -- ) {
            $position = rand () % strlen ( $chars );
            $position2 = rand () % strlen ( $string );
            $string = substr_replace ( $string , substr ( $chars , $position , 1 ) , $position2 , 0 );
        }
        return $string;
    }
}