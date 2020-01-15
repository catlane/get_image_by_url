@extends('home.yasuo')
@section('title', '猫巷压缩')



@section('small_content')
	<div class="ys-gn-nr mgbt30">
        <div id="yasuoType" style="">
	        <form class="layui-form" action="/article_url_get_img" method="post">
	            @csrf
		        <div class="layui-form-item">
	                <label class="layui-form-label">
	                    网页地址
	                </label>
	                <div class="layui-input-block">
	                    <input value="" id="article_url" type="text" name="article_url" required lay-verify="required|url" placeholder="请输入网页地址，将会自动采集图片"
	                           autocomplete="off" class="layui-input">
	                </div>
	            </div>
	            <div class="layui-form-item">
	                <div class="layui-input-block">
	                    <button class="layui-btn layui-btn-normal" lay-submit lay-filter="form_btn">
	                        立即提交
	                    </button>
	                </div>
	            </div>
	        </form>

        </div>
		<div id="uploader" class="wu-example">

		</div>
    </div>
	<script type="text/javascript">
        $ ( function () {


            layui.use ( ['form'] , function () {
                var form = layui.form ,
                    layer = layui.layer;
                $ ( '#article_url' ).on ( 'focus' , function () {
                    layer.tips ( '请填写网页完整地址，如https://www.lovyou.top/post/146.html' , '#article_url' , {
                        tips: [1 , '#0FA6D8'] //还可配置颜色
                    } );
                } );


                var images = [];
                /**
                 * 提交数据
                 */
                form.on ( 'submit(form_btn)' , function ( data ) {
                    console.log ( data.field );
                    ajaxs ( '/article_url_get_img' , 'post' , data.field , function ( res ) {
                        images = res.data;
                        getImageDataOk ( images );
                    } );
                    return false;
                } );


                /**
                 * 移动上去显示按钮
                 */
                $ ( '.container #uploader' ).on ( 'mouseenter' , '.state-complete' , function () {
                    $ ( this ).find ( '.file-panel' ).slideDown ( 100 );
                } )
                $ ( '.container #uploader' ).on ( 'mouseleave' , '.state-complete' , function () {
                    $ ( this ).find ( '.file-panel' ).slideUp ( 100 );
                } )

                /**
                 * 向右旋转
                 */

                $ ( '.container #uploader' ).on ( 'click' , '.rotateRight' , function () {
                    if ( $ ( this ).parents ( '.state-complete' ).find ( 'img.gallery-img' ).css ( "transform" ) == 'none' ) {
                        rotate = 0;
                    } else {
                        rotate = parseInt ( $ ( this ).parents ( '.state-complete' ).find ( 'img.gallery-img' ).attr ( 'rotate' ) );
                    }
                    rotate = rotate + 90;
                    // if ( rotate == 360 ) {
                    //     rotate = 0;
                    // }
                    $ ( this ).parents ( '.state-complete' ).find ( 'img.gallery-img' ).css ( "transform" , 'rotate(' + rotate + 'deg)' );
                    $ ( this ).parents ( '.state-complete' ).find ( 'img.gallery-img' ).attr ( 'rotate' , rotate )
                } )
                /**
                 * 向左旋转
                 */

                $ ( '.container #uploader' ).on ( 'click' , '.rotateLeft' , function () {
                    if ( $ ( this ).parents ( '.state-complete' ).find ( 'img.gallery-img' ).css ( "transform" ) == 'none' ) {
                        rotate = 0;
                    } else {
                        rotate = parseInt ( $ ( this ).parents ( '.state-complete' ).find ( 'img.gallery-img' ).attr ( 'rotate' ) );
                    }
                    rotate = rotate - 90;
                    // if ( rotate == 0 ) {
                    //     rotate = 360;
                    // }
                    $ ( this ).parents ( '.state-complete' ).find ( 'img.gallery-img' ).css ( "transform" , 'rotate(' + rotate + 'deg)' );
                    $ ( this ).parents ( '.state-complete' ).find ( 'img.gallery-img' ).attr ( 'rotate' , rotate )
                } )

                /**
                 * 删除图片
                 */
                $ ( '.container #uploader' ).on ( 'click' , '.cancel' , function () {
                    //然后检测li的个数，如果只剩下一个，那么就全部都删除了
                    if ( $ ( 'li.state-complete' ).length == 1 ) {
                        $ ( this ).parents ( '#uploader' ).html ( '' );
                        images = [];
                    } else {
                        var index = parseInt ( $ ( this ).parents ( 'li.state-complete' ).attr ( 'data-sort' ) );
                        $ ( this ).parents ( 'li.state-complete' ).remove ();
                        images.splice ( index , 1 );
                        getImageDataOk ( images );
                    }
                } )

                /**
                 * 放大图片
                 */
                $ ( '#uploader' ).on ( 'click' , '.gallery-img' , function () {
                    layer.photos ( {
                        photos: '#uploader' , //格式见API文档手册页
                        area: ['300px'] ,
                        anim: 5 , //0-6的选择，指定弹出图片动画类型，默认随机
                    } );
                } )

                $ ( '#uploader' ).on ( 'click' , '.yulan' , function () {
                    $ ( this ).parents ( 'li' ).find ( '.gallery-img' ).click ()
                } )


                /**
                 * 下载文件
                 */
                $ ( '#uploader' ).on ( 'click' , '.savedowload' , function ( e ) {
                    url = $ ( this ).attr ( 'url' );
                    downloadFiles ( url );
                    e.preventDefault ();
                    // var This = this;
                    // ajaxs ( '/download_verification' , 'post' , { src: url } , function ( res ) {
                    // } , function ( res ) {
                    //     layer.msg ( res.msg );
                    //
                    // } );
                } )


                /**
                 * 压缩包下载
                 */
                $ ( '#uploader' ).on ( 'click' , '#compressionImg' , function () {
                    var src = {};
                    for ( var i = 0 ; i < images.length ; i++ ) {
                        src[i] = images[i].local_path;
                    }
                    console.log ( src );
                    // src = JSON.stringify ( src );
                    // src = JSON.stringify ( src );
                    ajaxs ( '/make_zip' , 'post' , { src: src } , function ( res ) {
                        downloadFiles ( res.data.src );
                    } )
                } )
            } );
        } )


        /**
         * 获取数据成功后，组成html
         * @param data
         */
        function getImageDataOk ( data ) {
            var totalSize = 0;//总大小
            var total = data.length;//图片张数
            if ( !total ) {
                var html = '<blockquote class="layui-elem-quote" style="font-size: 14px;">\n' +
                    '\t\t\t\t温馨提示：无图片\n' +
                    '\t\t\t</blockquote>';

            } else {
                var html = '<blockquote class="layui-elem-quote" style="font-size: 14px;">\n' +
                    '\t\t\t\t温馨提示：打包压缩只会压缩没有被删除的图片哦！😊\n' +
                    '\t\t\t</blockquote>\n' +
                    '\t\t    <div class="queueList filled">\n' +
                    '\t\t        <div id="dndArea" class="placeholder element-invisible">\n' +
                    '\t\t            <div class="mgbt20">\n' +
                    '\t\t                <img src="https://www.yasuotu.com/yasuotu/images/jpg.png">\n' +
                    '\t\t                <img src="https://www.yasuotu.com/yasuotu/images/png.png">\n' +
                    '\t\t                <img src="https://www.yasuotu.com/yasuotu/images/gif.png">\n' +
                    '\t\t            </div>\n' +
                    '\t\t            <div id="filePicker" class="webuploader-container">\n' +
                    '\t\t                <div class="webuploader-pick">\n' +
                    '\t\t                    点击选择图片\n' +
                    '\t\t                </div>\n' +
                    '\t\t                <div id="rt_rt_1ctfd8qea84i1sqdhgn1rbthc71" style="position: absolute; top: 0px; left: 18px; width: 168px; height: 44px; overflow: hidden; bottom: auto; right: auto;">\n' +
                    '\t\t                    <input type="file" name="file" class="webuploader-element-invisible" multiple="multiple"\n' +
                    '\t\t                           accept="image/*">\n' +
                    '\t\t                    <label style="opacity: 0; width: 100%; height: 100%; display: block; cursor: pointer; background: rgb(255, 255, 255);">\n' +
                    '\t\t                    </label>\n' +
                    '\t\t                </div>\n' +
                    '\t\t            </div>\n' +
                    '\t\t            <p>\n' +
                    '\t\t                或将照片拖到这里\n' +
                    '\t\t            </p>\n' +
                    '\t\t        </div>\n' +
                    '\t\t        <div id="loading" style="width: 100px;height: 160px; text-align: center; background-color: #9A5353; border-radius:8px;margin-left: 500px;display: none;">\n' +
                    '\t\t            <img style="border-radius:8px;" width="100" src="https://www.yasuotu.com/images/In_the_compression.gif">\n' +
                    '\t\t            <p style="background-color:#9A5353;color: #FAB1B4; border-radius:8px;font-size: 14px;">\n' +
                    '\t\t                正在压缩...\n' +
                    '\t\t            </p>\n' +
                    '\t\t        </div>\n' +
                    '\t\t        <ul class="filelist">\n';


                for ( var i = 0 ; i < total ; i++ ) {
                    totalSize += parseInt ( data[i].size );
                    html += '\t\t            <li data-src="client" data-sort="' + i + '"\n' +
                        '\t\t               class="state-complete">\n' +
                        '\t\t                <div class="nr">\n' +
                        '\t\t                    <div class="fl">\n' +
                        '\t\t                        <div style="width: 130px;height: 150px;">\n' +
                        '\t\t                            <div class="pic mgbt10 imgWrap" style="line-height: 10;">\n' +
                        '\t\t                               <img class="gallery-img" style="transition:.7s;" layer-src="' + data[i].local_path + '" src="' + data[i].local_path + '" alt="' + data[i].name + '" src="' + data[i].local_path + '">\n' +
                        '\t\t                            </div>\n' +
                        '\t\t                        </div>\n' +
                        '\t\t                        <h3 class="text-c mgbt6 lg24">\n' +
                        '\t\t                            ' + data[i].name + '\n' +
                        '\t\t                        </h3>\n' +
                        '\t\t                    </div>\n' +
                        '\t\t                    <div class="info successInfo">\n' +
                        '\t\t                        <p>\n' +
                        '\t\t                            源文件：' + printUnitLength ( data[i].size ) + '\n' +
                        '\t\t                        </p>\n' +
                        '\t\t                        <p>\n' +
                        '\t\t                            源尺寸：674 x 507\n' +
                        '\t\t                        </p>\n' +
                        '\t\t                        <p>\n' +
                        '\t\t                            --\n' +
                        '\t\t                        </p>\n' +
                        '\t\t                        <p>\n' +
                        '\t\t                            --\n' +
                        '\t\t                        </p>\n' +
                        '\t\t                        <p>\n' +
                        '\t\t                            <a style="background-color: #00b7ee;float: left;" class="layui-btn layui-btn-sm btn-dowload savedowload"\n' +
                        '\t\t                               href="' + data[i].local_path + '" \n' +
                        '\t\t                               url="' + data[i].local_path + '" download>\n' +
                        '\t\t                                保存图片\n' +
                        '\t\t                            </a>\n' +
                        '\t\t                            <a href="javascript:void(0);" class="yulan">\n' +
                        '\t\t                                查看预览\n' +
                        '\t\t                            </a>\n' +
                        '\t\t                        </p>\n' +
                        '\t\t                    </div>\n' +
                        '\t\t                </div>\n' +
                        '\t\t                <p class="progress" style="display: none;">\n' +
                        '\t\t                    <span class="percentage" style="width: 100%; display: inline;">\n' +
                        '\t\t                    </span>\n' +
                        '\t\t                </p>\n' +
                        '\t\t                <p class="success">\n' +
                        '\t\t                </p>\n' +
                        '<div class="file-panel hover-show" style="height: 35px;display: none;"><span class="cancel">删除</span><span class="rotateRight">向右旋转</span><span class="rotateLeft">向左旋转</span></div>' +
                        '\t\t            </li>\n'
                }


                html += '\t\t        </ul>\n' +
                    '\t\t    </div>\n' +
                    '\t\t    <div class="statusBar" style="">\n' +
                    '\t\t        <div class="info">\n' +
                    '\t\t            共 ' + total + ' 张（' + printUnitLength ( totalSize ) + '）\n' +
                    '\t\t        </div>\n' +
                    '\t\t        <div class="btns">\n' +
                    '\t\t            <div style="background-color: #3e8f3e;" class="layui-btn layui-btn-radius layui-btn-normal" id="compressionImg">\n' +
                    '\t\t                打包压缩.zip\n' +
                    '\t\t            </div>\n' +
                    '\t\t            <div class="btn_upload" style="display: none;">\n' +
                    '\t\t                <div id="filePicker2" class="webuploader-container">\n' +
                    '\t\t                    <div class="webuploader-pick">\n' +
                    '\t\t                        继续添加\n' +
                    '\t\t                    </div>\n' +
                    '\t\t                    <div id="rt_rt_1ctfd8qeeem1po315bhauf1hm46" style="position: absolute; top: 0px; left: 10px; width: 94px; height: 42px; overflow: hidden; bottom: auto; right: auto;">\n' +
                    '\t\t                        <input type="file" name="file" class="webuploader-element-invisible" multiple="multiple"\n' +
                    '\t\t                               accept="image/*">\n' +
                    '\t\t                        <label style="opacity: 0; width: 100%; height: 100%; display: block; cursor: pointer; background: rgb(255, 255, 255);">\n' +
                    '\t\t                        </label>\n' +
                    '\t\t                    </div>\n' +
                    '\t\t                </div>\n' +
                    '\t\t                <div id="uploadBtn" class="uploadBtn state-finish">\n' +
                    '\t\t                    开始上传\n' +
                    '\t\t                </div>\n' +
                    '\t\t            </div>\n' +
                    '\t\t        </div>\n' +
                    '\t\t    </div>';
            }
            $ ( '#uploader' ).html ( html );
        }
    </script>
@endsection



{{--差一个，如果没有怎么办--}}
{{--checkIds.push ( { "id": thisId , "type": "organization" } );添加--}}
{{--checkIds.splice ( i , 1 );删除--}}