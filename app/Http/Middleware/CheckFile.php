<?php

namespace App\Http\Middleware;

use App\Response;
use Closure;

class CheckFile {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle ( $request , Closure $next ) {
        $url = trim ( $request->getPathInfo () , '/' );
        switch ( $url ) {
            case 'upload/gif':
                $mimeType = 'image/gif';
                $type = 'gif';
                break;
            default:
                $mimeType = '';
                $type = '';
                break;
        }
        $uploadMimeType = $request->file ( 'file' )->getMimeType ();
        if ( $uploadMimeType != $mimeType ) {
            return Response::json ( 0 , '类型不正确,请上传' . $type . '格式图片' );
        }
        return $next( $request );
    }
}
