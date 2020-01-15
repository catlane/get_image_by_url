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

class DownloadController extends Controller {
    protected $service;

    public function __construct ( DownloadService $service ) {
        $this->service = $service;
    }

    public function downloadVerification ( Request $request ) {
        try {
            $result = $this->service->downloadVerification ( $request );
            return Response::json ( 200 , '验证成功' , [ 'download_url' => $result ] );
        } catch ( \Exception $exception ) {
            return Response::json ( 0 , $exception->getMessage () );
        }
    }

    public function makeZip (Request $request) {
        try {
            $result = $this->service->makeZip ( $request);
            return Response::json ( 200 , '压缩成功' , [ 'src' => $result ] );
        } catch (\Exception $exception) {
            return Response::json ( 0 , $exception->getMessage () );
        }

        //解压
//        $zip = new Zipper();
//        $zip->make(压缩的文件目录)->extractTo(压缩之后的目录);
    }

    /**
     * 下载文件，所有文件的下载地址
     * @param Request $request
     * @return Response
     */
    public function downloadFile ($file) {
        try {
            return $this->service->downloadFile ($file);
        } catch (\Exception $exception) {
            return Response::error ( $exception , 500 );
        }
    }



}