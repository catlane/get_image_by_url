<?php
/**
 * Created by PhpStorm.
 * User: 猫巷
 * Email:catlane@foxmail.com
 * Date: 2018/11/30
 * Time: 2:49 PM
 */

namespace App\Home\Service;

use Chumper\Zipper\Zipper;
use Illuminate\Support\Facades\Storage;

class DownloadService extends Service {
    /**
     * 下载文件，所有文件的下载地址
     * @param Request $request
     * @return Response
     */
    public function downloadFile ( $file ) {
        $file = base64_decode ( $file );
        //验证
        //...
        return Storage::download ( str_replace ( '/storage/' , 'public/' , $file ) );
//        ( '/storage/www.lovyou.top/2018_11_30_09:01:22/890060b4cddfc1dd9c8b4af43b0f6131.jpg' );
    }


    /**
     * 验证文件
     * @param $request
     * @return mixed
     */
    public function downloadVerification ( $request ) {
        $url = $request->src;
        $request->src = str_replace ( 'storage' , 'public' , $request->src );
        return $url;
    }


    /**
     * 生成压缩包
     * @param $request  src中的是选中的文件路径
     * @return mixed    返回的是下载地址
     * @throws \Exception
     */
    public function makeZip ( $request ) {
        $zipper = new Zipper();
        foreach ( $request->src as $k => $v ) {
            $arr[] = storage_path ( str_replace ( '/storage' , 'app/public' , $v ) );
        }
        $name = date ( 'Y_m_d_H:i:s' ) . '_' . substr ( md5 ( time () ) , 0 , 5 ) . '.zip';
        $zipper->make ( storage_path ( 'app/public/' . $name ) )->add ( $arr )->close ();
        if ( Storage::disk ( 'local' )->exists ( '/public/' . $name ) ) {
            return Storage::url ( $name );
        }
        throw new \Exception ( '添加压缩文件失败，请刷新页面重试~谢谢' );
    }
}