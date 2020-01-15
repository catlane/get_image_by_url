<?php
/**
 * Created by PhpStorm.
 * User: 猫巷
 * Email:catlane@foxmail.com
 * Date: 2018/12/4
 * Time: 10:25 AM
 */

namespace App\Home\Controller;

use App\Home\Service\GifService;
use App\Http\Controllers\Controller;
use App\Response;
use Illuminate\Http\Request;

class GifController extends Controller {
    protected $service;

    public function __construct ( GifService $service ) {
        $this->service = $service;
    }

    public function index () {
//        $time = '1544091304';//1544091304
//        $token = '7d93995f1d67caea135e80bb66c0b2fc';
//        $user_id = '10000';
//        dd ( base64_encode ( 'b09996f9951ceb7238df53d51bc0b25d/1544091304/10000' ) );

        $baseToken = 'YjA5OTk2Zjk5NTFjZWI3MjM4ZGY1M2Q1MWJjMGIyNWQvMTU0NDA5MTMwNC8xMDAwMA==';
        //            var_dump (base64_encode (
//                'a13651ba1a578b9bf1283f875ce0fe48/1534922322/103087'));die;
//            var_dump ( 1 );die;

        $urlParam = base64_decode ( $baseToken );

        $urlParam = explode ( '/' , $urlParam );//token/time/user_id
        if(count ($urlParam) != 3){
            throw new \Exception ( '请求错误' );
        }

        //先计算token
        $thisToken = md5 ( 'hGHF0IjHzPZpLwgomNT4eFnG6ywRfpQ5' . $urlParam[2] . $urlParam[1] );//ak+用户ID+时间戳

//          echo '输出之前：' . 'hGHF0IjHzPZpLwgomNT4eFnG6ywRfpQ5' . $urlParam[ 2 ] . $urlParam[ 1 ];
//          echo '<pre>';
//          print_r ( $urlParam );
//          echo '<br>';
//          echo '请求token:' . $urlParam[ 0 ];
//          echo '<br>';
//          echo 'ThisToken:' . $thisToken;
//          die;


        if($thisToken != $urlParam[0]){
            throw new \Exception ( '签名不正确' );
        }



        return view ( 'home.gif.index' );
    }

    /**
     * 压缩gif
     */
    public function compression ( Request $request ) {
        try {
            if ( ! $request->input ('files') ) {
                throw new \Exception ( '请上传Gif图片' );
            }
            $this->service->compression ( $request );
        } catch ( \Exception $exception ) {
            return Response::json ( 0 , $exception->getMessage () );
        }
    }


}
