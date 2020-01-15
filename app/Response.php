<?php
/**
 * Created by PhpStorm.
 * User: 猫巷
 * Email:catlane@foxmail.com
 * Date: 18-7-31
 * Time: 下午1:31
 */

namespace App;
class Response {
    static public function error ( $exception , $code = null ) {
        return view ( 'error.error' )->with ( [
            'code' => $code ? : $exception->getCode () ,
            'msg' => $exception->getMessage () ? : '错误' ,
        ] );
    }

    public static function json ( int $code = 0 , string $msg = '' , array $data = [] ) {
        return response ()->json ( [
            'code' => $code ,
            'msg' => $msg ,
            'data' => $data
        ] );
    }

    public static function errorCode ( int $code , string $msg ) {
        return response ( $msg , $code );
    }
}


