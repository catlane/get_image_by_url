<?php
/**
 * Created by PhpStorm.
 * User: 猫巷
 * Email:catlane@foxmail.com
 * Date: 2018/11/30
 * Time: 2:45 PM
 */

namespace App\Home\Controller;

use App\Home\Service\DownloadService;
use App\Http\Controllers\Controller;
use App\Response;
use Illuminate\Http\Request;

class UploadController extends Controller {
    protected $service;

    public function __construct ( DownloadService $service ) {
        $this->service = $service;
    }

    //上传gif
    public function uploadGif ( Request $request ) {
        try {
            if ( $_FILES[ 'file' ][ 'name' ] == '9.gif' ) {
                throw new \Exception ( '测试失败' );
            }
            $time = date ( 'Y_m_d_H' , time () );
            $fileSrc = $request->file ( 'file' )->store ( 'public/gif/' . $time );
            if ( ! $fileSrc ) {
                throw new \Exception ( '上传失败' );
            }
            $fileSrc = str_replace ( 'public/' , '/storage/' , $fileSrc );
            list( $width , $height ) = getimagesize ( $request->file ( 'file' )->getRealPath () );
            return Response::json ( 200 , '上传成功' , [ 'fileSrc' => $fileSrc , 'width' => $width , 'height' => $height ] );
        } catch ( \Exception $exception ) {
            $errMsg = $exception->getMessage ();
            if ( strpos ( $errMsg , 'Permission denied' ) ) {
                $errMsg = '当前上传文件夹无权限访问，请联系管理员';
            }
//            return Response::json ( 0 , $errMsg );
            return Response::errorCode ( 500 , $errMsg );
        }
    }
}