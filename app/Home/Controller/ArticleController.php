<?php
/**
 * Created by PhpStorm.
 * User: 猫巷
 * Email:catlane@foxmail.com
 * Date: 2018/11/29
 * Time: 2:41 PM
 */

namespace App\Home\Controller;

use App\Http\Controllers\Controller;
use App\Response;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller {

    protected $client;
    protected $article_url;

    public function __construct ( Client $client ) {
        $this->client = $client;
    }

    /**
     * 链接获取url
     */
    public function urlGetImg ( Request $request ) {
        try {
            $article_content = $this->verifyUrl ( $request->article_url );
            $this->article_url = $request->article_url;
            $image = $this->getArticleImgs ( $article_content );
            $image = $this->saveImage ( $image );
            return Response::json ( 200 , '获取成功' , $image );
        } catch ( \Exception $exception ) {
            var_dump($exception->getLine());
            var_dump($exception->getMessage ());
            die;
            return Response::json ( 0 , $exception->getMessage () );
        }
    }


    /**
     * 获取主域名，用来当文件夹
     */
    protected function getDomain () {
        return parse_url ( $this->article_url );
//        array:3 [▼
//                  "scheme" => "https"
//                  "host" => "mp.weixin.qq.com"
//                  "path" => "/s/AUNnuJQQSb8b2CTtH0svOg"
//        ]
    }

    /**
     * 验证地址是否正确
     */
    protected function verifyUrl ( $article_url ) {
        if ( ! $article_url ) {
            throw new \Exception ( '请填写url地址' );
        }
        $res = $this->client->get ( $article_url) ;
        if ( $res->getStatusCode () != 200 ) {
            throw new \Exception ( '当前地址请求无效' );
        }

        return file_get_contents ($article_url);
    }

    /**
     * 获取文章的所有图片
     * @param $content  文章内容，整个网页内容
     */
    protected function getArticleImgs ( $content ) {

        $images = array ();
        preg_match_all ( '/(img|src)=("|\')[^"\'>]+/i' , $content , $media );
        $data = preg_replace ( '/(img|src)("|\'|="|=\')(.*)/i' , "$3" , $media[ 0 ] );

        foreach ( $data as $url ) {
            try {
                if (strrpos ($url,'//') === false) {
                    $url = 'http:' . $url;
                }
                $res = $this->client->request ( 'GET' , $url );
            } catch ( RequestException $requestException ) {
                continue;
            }
            if ( $res->getStatusCode () == 200 ) {//请求成功
                $type = $res->getHeader('Content-Type');
                if ( is_array ( $type ) && !empty($type[0]) && strpos ( $type[ 0 ] , 'image' ) !== false ) {//有请求信息
                    $suffix = trim ( substr ( $type[ 0 ] , strrpos ( $type[ 0 ] , '/' ) ) , '/' );
                    $images[] = [
                        'img' => $url ,
                        'type' => $type[ 0 ] ,
                        'name' => '' ,
                        'content' => $res->getBody ()->getContents () ,
                        'suffix' => $suffix == 'jpeg' ? 'jpg' : $suffix ,
                        'size' => isset( $res->getHeader ( 'Content-Length' )[ 0 ] ) ? $res->getHeader ( 'Content-Length' )[ 0 ] : 0
                    ];
                }
            }
        }
        return $images;
    }

    /**
     * 保存图片
     * @param $image
     * @return mixed
     */
    protected function saveImage ( $image ) {
        $time = date ( 'Y_m_d_H:i:s' );
        foreach ( $image as $k => $v ) {
//            $name = md5 ( time () . rand ( 100 , 200 ) );
            $name = $k + 1;
            $dir = "public/{$this->getDomain ()['host']}/{$time}/";
            $result = Storage::disk ( 'local' )->put ( $dir . $name . '.' . $v[ 'suffix' ] , $v[ 'content' ] );
            if ( $result ) {
                unset( $image[ $k ][ 'content' ] );
//                $image[$k]['local_path'] = asset ( $dir  . $name . '.' . $v[ 'suffix' ]);
                $image[ $k ][ 'local_path' ] = Storage::url ( $dir . $name . '.' . $v[ 'suffix' ] );
                $image[ $k ][ 'name' ] = $name;
            } else {//找个东西记录起来

            }
        }
        return $image;
    }

}































