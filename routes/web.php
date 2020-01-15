<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::namespace ( '\App\Home\Controller' )->group ( function ( $route ) {
    /**
     * 主页
     */
    $route::get ( '/' , 'IndexController@index' );

    /**
     * 文章链接获取图片
     */
    $route::post ( '/article_url_get_img' , 'ArticleController@urlGetImg' );


    /**
     * gif压缩
     */
    $route::get ( '/gif' , 'GifController@index' );
    $route::post ( '/gif/compression' , 'GifController@compression' );


    /**
     * 全局下载图片（单个）
     */
    $route::post ( '/download_img' , 'DownloadController@downloadImg' );
//    $route::post ( '/download_verification' , 'DownloadController@downloadVerification' );
    $route::post ( '/make_zip' , 'DownloadController@makeZip' );
    //get下载文件，如果有问题反馈，直接跳出页面来
    $route::get ( '/download_file/{file}' , 'DownloadController@downloadFile' );
    //上传文件
    $route::middleware ( [ 'checkfile' ] )->post ( '/upload/gif' , 'UploadController@uploadGif' );


} );