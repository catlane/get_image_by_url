var layer;
layui.use ( ['layer' , 'form'] , function () {
    var layer = layui.layer ,
        form = layui.form;

    //注意进度条依赖 element 模块，否则无法进行正常渲染和功能性操作
    layui.use ( 'element' , function () {
        var element = layui.element;
    } );


    form.render ();
} );

function ajaxs ( url , type , data , success , error , async = true ) {
    $.ajax ( {
        headers: {
            'X-CSRF-TOKEN': $ ( 'meta[name="csrf-token"]' ).attr ( 'content' )
        } ,
        url: url ,
        type: type ,
        data: data ,
        dataType: "json" ,
        async: async ,
        beforeSend: function () {
            loader = layer.load ( 0 , {
                shade: [0.1]
                , scrollbar: false
            } );
        } ,
        success: function ( res ) {
            layer.close ( loader )
            if ( res.code == 200 ) {
                success ( res )
            } else {
                if ( error ) {
                    error ( res );
                } else {
                    layer.msg ( res.msg , function () {
                    } )
                }
            }
        } ,
        error: function ( err ) {
            layer.close ( loader )
            layer.msg ( '操作失败' , function () {
            } )
        }
    } );
}


/**
 * 换算单位长度，根据不同的大小，显示不同的单位
 * @param initial   初始值，默认为字节
 * @param result    根据大小往上转换，例如1024bt,那么就是1kb
 */
function printUnitLength ( initial , result = null ) {
    var size = "";
    initial = new Number ( initial );
    if( initial < 0.1 * 1024 ){ //如果小于0.1KB转化成B
        try {
            size = initial.toFixed(2) + "B";
        }catch ( e ) {
            console.log ( initial );
            console.log ( e );
            throw 1;
        }
    }else if(initial < 0.1 * 1024 * 1024 ){//如果小于0.1MB转化成KB
        size = (initial / 1024).toFixed(2) + "KB";
    }else if(initial < 0.1 * 1024 * 1024 * 1024){ //如果小于0.1GB转化成MB
        size = (initial / (1024 * 1024)).toFixed(2) + "MB";
    }else{ //其他转化成GB
        size = (initial / (1024 * 1024 * 1024)).toFixed(2) + "GB";
    }

    var sizestr = size + "";
    var len = sizestr.indexOf("\.");
    var dec = sizestr.substr(len + 1, 2);
    if(dec == "00"){//当小数点后为00时 去掉小数部分
        return sizestr.substring(0,len) + sizestr.substr(len + 3,2);
    }
    return sizestr;
    // return (initial / 1024).toFixed(2) + ' KB';
}


function downloadFiles(file) {
    file = btoa(file);
    window.open ( '/download_file/' + file)
    // res.data.src
    layer.alert ( '下载成功' );
}