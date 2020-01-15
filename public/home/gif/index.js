$ ( function () {


    layui.use ( ['form' , 'upload'] , function () {
        var form = layui.form ,
            layer = layui.layer ,
            upload = layui.upload ,
            element = layui.element;
        element.init ();
        $ ( '#article_url' ).on ( 'focus' , function () {
            layer.tips ( '请填写网页完整地址，如https://www.lovyou.top/post/146.html' , '#article_url' , {
                tips: [1 , '#0FA6D8'] //还可配置颜色
            } );
        } );

        var files = null;//所有选择的文件
        //创建监听函数
        var xhrOnProgress = function ( fun ) {
            xhrOnProgress.onprogress = fun; //绑定监听
            //使用闭包实现监听绑
            return function () {
                //通过$.ajaxSettings.xhr();获得XMLHttpRequest对象
                var xhr = $.ajaxSettings.xhr ();
                //判断监听函数是否为函数
                if ( typeof xhrOnProgress.onprogress !== 'function' )
                    return xhr;
                //如果有监听函数并且xhr对象支持绑定时就把监听函数绑定上去
                if ( xhrOnProgress.onprogress && xhr.upload ) {
                    xhr.upload.onprogress = xhrOnProgress.onprogress;
                }
                return xhr;
            }
        }
        uploader = upload.render ( {
            elem: '.uploaderGif'
            , url: '/upload/gif'
            , headers: {
                'X-CSRF-TOKEN': $ ( 'meta[name="csrf-token"]' ).attr ( 'content' )
            }
            , acceptMime: "image/gif"//打开类型
            , accept: 'image'//上传文件类型
            , exts: "gif"//文件后缀
            , auto: false//自动上传
            , bindAction: ".uploadBtn"//绑定上传按钮
            , size: "100000"//kb为单位
            , multiple: true//多文件上传
            , drag: true//是否允许拖拽
            //进度条
            , progress: function ( e , percent , index ) {
                $ ( '.filelist' ).find ( 'li[data-sort="' + index + '"]' ).find ( '.progress' ).show ()
                    .find ( '.percentage' ).css ( { "width": percent + '%' } )
            }
            , choose: function ( obj ) {
                obj.preview ( function ( index , file , result ) {
                    file['src'] = result;
                    files = obj.pushFile ();
                    var layer_index = Object.keys ( files ).length - 1;
                    //然后添加文件
                    if ( $ ( '.filelist' ).length == 0 ) {
                        $ ( '.img-list' ).show ().html ( '<ul class="filelist"></ul>' );
                    }
                    $ ( '.filelist' ).append ( '\t\t<li data-src="client" data-sort="' + index + '"\n' +
                        '\t\t               class="state-complete">\n' +
                        '\t\t                <div class="nr">\n' +
                        '\t\t                    <div class="fl">\n' +
                        '\t\t                        <div style="width: 130px;height: 150px;">\n' +
                        '\t\t                            <div class="pic mgbt10 imgWrap" style="line-height: 10;">\n' +
                        '\t\t                               <img class="gallery-img" style="transition:.7s;" layer-src="' + result + '" src="' + result + '" alt="' + file.name + '" src="' + result + '" layer-index="' + layer_index + '">\n' +
                        '\t\t                            </div>\n' +
                        '\t\t                        </div>\n' +
                        '\t\t                        <h3 class="text-c mgbt6 lg24">\n' +
                        '\t\t                            ' + file.name + '\n' +
                        '\t\t                        </h3>\n' +
                        '\t\t                    </div>\n' +
                        '\t\t                    <div class="info successInfo">\n' +
                        '\t\t                        <p>\n' +
                        '\t\t                            源文件：' + printUnitLength ( file.size ) + '\n' +
                        '\t\t                        </p>\n' +
                        '\t\t                    </div>\n' +
                        '\t\t                </div>\n' +
                        '\t\t                <p class="progress" style="display: none;">\n' +
                        '\t\t                    <span class="percentage" style="width: 0%; display: inline;">\n' +
                        '\t\t                    </span>\n' +
                        '\t\t                </p>\n' +
                        '<div class="file-panel hover-show" style="display:none;height: 35px;"><span class="cancel">删除</span><span class="rotateRight">向右旋转</span><span class="rotateLeft">向左旋转</span></div>' +
                        '\t\t            </li>\n' );

                    statusBar ( files );


                    //失败重传

                    $ ( '#yasuoType' ).on ( 'click' , '#resetBtn' + index , function () {
                        obj.upload ( index , file );
                    } );
                } );
            }
            , before: function ( obj ) {
                //预读本地文件示例，不支持ie8

            }
            , done: function ( res , index , upload ) {
                var This = $ ( '.filelist' ).find ( 'li[data-sort="' + index + '"]' );
                //先隐藏了
                This.find ( '.progress' ).hide ()
                    .find ( '.percentage' ).css ( { "width": '0%' } );
                //删除自己现在的成功或者失败状态
                This.find ( '.success,.error' ).remove ();
                if ( res.code == 200 ) {//成功
                    This.find ( '.nr .info' ).html (
                        '<p>源文件：' + printUnitLength ( files[index].size ) + '</p>' +
                        '<p>源尺寸：' + res.data.width + ' x ' + res.data.height + ' </p>' +
                        '<p> - </p>' +
                        '<p> - </p>' +
                        '<p>' +
                        '<a style="background-color: #00b7ee;float: left;" class="layui-btn layui-btn-sm btn-dowload savedowload" href="' + res.data.fileSrc + '" url="' + res.data.fileSrc + '" download="">保存图片</a>\n' +
                        '<a href="javascript:void(0);" class="yulan">查看预览</a>\n' +
                        '</p>'
                    );
                    This.append ( '<p class="success"></p>' );
                    //然后添加到成功表单中
                    $ ( '#successFiles' ).append ( '<input type="hidden" index="' + index + '" value="' + res.data.fileSrc + '" />' )

                    //添加成功状态
                    files[index]['status'] = "success";
                } else if ( res.code == 0 ) {
                    This.append ( '<p class="error">' + res.msg + '</p>' )
                }
            }
            , allDone: function ( obj ) { //当文件全部被提交后，才触发
                console.log ( files );
                //
                size = 0;
                for ( var i in files ) {
                    size += files[i].size
                }
                if ( obj.total == obj.successful ) {
                    //那么，提示压缩下载
                    $ ( '.statusBar .info' ).html (
                        '    共 ' + obj.total + ' 张（' + printUnitLength ( size ) + '），\n' +
                        '    <span id="msg_info">\n' +
                        '        已上传\n' +
                        '    </span>\n' +
                        '    ' + obj.total + ' 张\n' +
                        '    <span class="yasuoTip" style="color: #4EA0E6; margin-left: 15px;">\n' +
                        '    </span>\n' +
                        '    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n' +
                        '    <a href="javascript:void(0);" id="compressionImg" style="padding: 3px 6px;"\n' +
                        '    class="btn btn-success btn-small">\n' +
                        '        <i class="icon-download-alt icon-white">\n' +
                        '        </i>\n' +
                        '        打包下载.zip\n' +
                        '    </a>\n' +
                        '    <p>\n' +
                        // '        压缩后（3.43M），总压缩率 ： 40.43%\n' +
                        '    </p>\n'
                    );
                    //然后变为重新上传
                    $ ( '#filePicker2' ).find ( 'div' ).hide ()
                    $ ( '#filePicker2' ).append ( '<div class="resetBtn">重新上传</div>' )

                } else {
                    //那么，提示压缩下载
                    $ ( '.statusBar .info' ).html (
                        '    共 ' + obj.total + ' 张（' + printUnitLength ( size ) + '），\n' +
                        '    <span id="msg_info">\n' +
                        '        已上传\n' +
                        '    </span>\n' +
                        '    ' + obj.successful + ' 张\n' +
                        '    &nbsp;&nbsp;失败' + obj.aborted + '张' +
                        '    <span class="yasuoTip" style="color: #4EA0E6; margin-left: 15px;">\n' +
                        '    </span>\n' +
                        '    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n' +
                        '    <a href="javascript:void(0);" id="compressionImg" style="padding: 3px 6px;"\n' +
                        '    class="btn btn-success btn-small">\n' +
                        '        <i class="icon-download-alt icon-white">\n' +
                        '        </i>\n' +
                        '        打包下载.zip\n' +
                        '    </a>\n' +
                        '    <p>\n' +
                        // '        压缩后（3.43M），总压缩率 ： 40.43%\n' +
                        '    </p>\n'
                    );
                    //然后变为重新上传
                    $ ( '#filePicker2' ).find ( 'div' ).hide ();
                    console.log ( $ ( '#filePicker2' ).find ( '.uploadBtn' ) );
                    $ ( '#filePicker2' ).append ( '<div class="resetBtn">重新上传</div>' );
                }
            }
            , error: function ( index , upload ) {
                $ ( '.filelist' ).find ( 'li[data-sort="' + index + '"]' ).find ( '.progress' ).hide ()
                    .find ( '.percentage' ).css ( { "width": '0%' } );
                $ ( '.filelist' ).find ( 'li[data-sort="' + index + '"]' ).append ( '<p class="error">上传失败</p>' )
                $ ( '.filelist' ).find ( 'li[data-sort="' + index + '"]' ).find ( '.nr .info' ).html (
                    '<p> - </p>' +
                    '<p> - </p>' +
                    '<p> - </p>' +
                    '<p> - </p>' +
                    '<p>' +
                    '<a style="background-color: #00b7ee;float: left;" class="layui-btn layui-btn-sm" id="resetBtn' + index + '" href="javascript:;">重新上传</a>\n' +
                    '</p>'
                );
            }
        } );


        /**
         * 计算数量以及大小，并且赋值
         */
        function statusBar ( files ) {
            var length = 0;
            var size = 0;
            var successLen = 0;
            var errorLen = 0;
            for ( var i in files ) {
                size += files[i].size;
                length++;
                if ( files[i].status ) {
                    successLen++;
                } else {
                    errorLen++;
                }
            }
            if ( length != 0 ) {//有图片
                $ ( '#uploader' ).hide ();
                $ ( '.statusBar' ).show ();
                if ( $ ( "#successFiles input" ).length == 0 ) {
                    $ ( ".img-list" ).show ().siblings ( '.statusBar' ).find ( '.info' ).html ( '选中' + length + '张图片，共' + printUnitLength ( size ) + '.\n' );
                } else {

                    $ ( ".img-list" ).show ().siblings ( '.statusBar' ).find ( '.info' ).html ( '共 ' + length + ' 张（' + printUnitLength ( size ) + '），\n' +
                        '    <span id="msg_info">\n' +
                        '        已上传\n' +
                        '    </span>\n' +
                        '    ' + successLen + ' 张\n' +
                        '    &nbsp;&nbsp;失败' + errorLen + '张' +
                        '    <span class="yasuoTip" style="color: #4EA0E6; margin-left: 15px;">\n' +
                        '    </span>\n' +
                        '    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n' +
                        '    <a href="javascript:void(0);" id="compressionImg" style="padding: 3px 6px;"\n' +
                        '    class="btn btn-success btn-small">\n' +
                        '        <i class="icon-download-alt icon-white">\n' +
                        '        </i>\n' +
                        '        打包下载.zip\n' +
                        '    </a>' );
                }

            } else {
                $ ( '#uploader' ).show ();
                $ ( '.statusBar' ).hide ();
                $ ( '.img-list' ).hide ();
            }
            if ( $ ( "#successFiles input" ).length == 0 ) {//说明都是没上传的，或者是失败的
                $ ( '#filePicker2' ).find ( '.resetBtn' ).remove ();
                $ ( '#filePicker2' ).find ( 'div' ).show ();
            } else {//有上传成功的
                console.log ( files );

            }


        }

        /**
         * 移动上去显示按钮
         */
        $ ( '.container #yasuoType' ).on ( 'mouseenter' , '.state-complete' , function () {
            $ ( this ).find ( '.file-panel' ).slideDown ( 100 );
        } )
        $ ( '.container #yasuoType' ).on ( 'mouseleave' , '.state-complete' , function () {
            $ ( this ).find ( '.file-panel' ).slideUp ( 100 );
        } )


        /**
         * 向右旋转
         */

        $ ( '.container #yasuoType' ).on ( 'click' , '.rotateRight' , function () {
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

        $ ( '.container #yasuoType' ).on ( 'click' , '.rotateLeft' , function () {
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
        $ ( 'body .container #yasuoType' ).on ( 'click' , '.cancel' , function () {
            var index = $ ( this ).parents ( 'li.state-complete' ).attr ( 'data-sort' );
            delete files[index];

            $ ( this ).parents ( 'li.state-complete' ).remove ();


            //删除上传成功的
            if ( $ ( "#successFiles input[index='" + index + "']" ).length ) {
                $ ( "#successFiles input[index='" + index + "']" ).remove ();
            }

            statusBar ( files );
        } )

        /**
         * 放大图片
         */
        $ ( '#yasuoType' ).on ( 'click' , '.gallery-img' , function ( event ) {
            layer_index = $ ( this ).attr ( 'layer-index' );
            var data = {
                "title": "Gif上传" , //相册标题
                "id": 1 , //相册id
                "start": layer_index , //初始显示的图片序号，默认0
                "data": [   //相册包含的图片，数组格式

                ]
            };
            for ( var i in files ) {
                data['data'].push ( {
                    "alt": files[i].name ,
                    "pid": i ,
                    "src": files[i].src ,
                    "thumb": files[i].src
                } );
            }
            layer.photos ( {
                photos: data , //格式见API文档手册页
                area: ['300px'] ,
                anim: 5 , //0-6的选择，指定弹出图片动画类型，默认随机
            } );
            // event.stopPropagation ();
        } )

        $ ( '#yasuoType' ).on ( 'click' , '.yulan' , function ( event ) {
            $ ( this ).parents ( 'li' ).find ( '.gallery-img' ).click ()
            event.stopPropagation ();

        } )


        /**
         * 下载文件
         */
        $ ( '#yasuoType' ).on ( 'click' , '.savedowload' , function ( e ) {
            url = $ ( this ).attr ( 'url' );
            downloadFiles ( url );
            e.preventDefault ();
        } )


        /**
         * 压缩包下载
         */
        $ ( '#yasuoType' ).on ( 'click' , '#compressionImg' , function () {
            var allFilesInput = $ ( "#successFiles input" );
            var src = {};
            for ( var i = 0 ; i < allFilesInput.length ; i++ ) {
                // src[i] = images[i].local_path;
                src[i] = $ ( allFilesInput[i] ).val ();
            }
            // src = JSON.stringify ( src );
            // src = JSON.stringify ( src );
            ajaxs ( '/make_zip' , 'post' , { src: src } , function ( res ) {
                downloadFiles ( res.data.src );
            } )
        } )


        form.on ( 'select(presetWH)' , function ( data ) {
            width = parseInt ( data.value );
            if ( !width ) {
                width = '';
            }
            $ ( data.elem ).parents ( 'form' ).find ( 'input[name="ysW"]' ).val ( width );
        } );
        form.on ( 'submit(beginCompression)' , function ( data ) {
            //先判断是否上传照片了
            if ( $("#successFiles input").length == 0 ) {
                layer.alert ( '请上传Gif图片' );
                return false;
            }
            data.field['files'] = {};
            for ( var i = 0 ; i < $("#successFiles input").length ; i++ ) {
                // src[i] = images[i].local_path;
                data.field['files'][$ ( $("#successFiles input")[i] ).attr('index')] = $ ( $("#successFiles input")[i] ).val ();
            }
            ajaxs('/gif/compression','POST',data.field,function ( res ) {
                console.log ( res );
            })
            // console.log ( data.elem ) //被执行事件的元素DOM对象，一般为button对象
            // console.log ( data.form ) //被执行提交的form对象，一般在存在form标签时才会返回
            // console.log ( data.field ) //当前容器的全部表单字段，名值对形式：{name: value}
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        } );

    } );
} )