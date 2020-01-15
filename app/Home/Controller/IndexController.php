<?php
/**
 * Created by PhpStorm.
 * User: 猫巷
 * Email:catlane@foxmail.com
 * Date: 2018/11/29
 * Time: 2:11 PM
 */

namespace App\Home\Controller;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller {
    public function index () {
//        $client = new Client();
//        $url = 'http://api.btstu.cn/sjbz/?lx=meizi';
//        for ( $i = 0 ; $i < 100 ; $i ++ ) {
//            try {
//                $res = $client->request ( 'GET' , $url );
//                if ( $res->getStatusCode () == 200 ) {
//                    $content = $res->getBody ()->getContents ();
//                    if ( is_array ( $type = $res->getHeader ( 'Content-Type' ) ) && strpos ( $type[ 0 ] , 'image' ) !== false ) {//有请求信息
//                        $suffix = trim ( substr ( $type[ 0 ] , strrpos ( $type[ 0 ] , '/' ) ) , '/' );
//                        $name = substr ( md5 ( time () ) , 0 , 10 );
//                        $dir = "public/getImages/";
//                        $allName = $dir . $name . '.' . $suffix;
//                        $result = Storage::disk ( 'local' )->put ( $allName , $content );
//                        var_dump ( $result );
//                        echo '<br/>';
//                    }
//                }
//            } catch ( RequestException $requestException ) {
//                continue;
//            }
//        }
//
//        die;
        return view ( 'home.index.index' );
    }
}
