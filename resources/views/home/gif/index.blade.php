@extends('home.yasuo')
@section('title', '猫巷压缩')



@section('small_content')
	<div class="ys-gn-nr mgbt30">
        <div id="yasuoType" style="">
            <form class="layui-form" action="javascript:;" method="post">
                <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">
                        选择尺寸
                    </label>
                    <div class="layui-input-inline cc-style-first" style="width: 115px;">
                        <select name="presetWH" lay-verify="presetWH" lay-filter="presetWH">
                            <option value="0">保持原始尺寸</option>
                            <option value="480">适合手机，微信公众号尺寸</option>
                            <option value="640">适合电脑尺寸</option>
                            <option value="200|">适合微信表情尺寸（大）</option>
                            <option value="140|">适合微信表情尺寸（小）</option>
                            <option value="set">自定义</option>
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">
                        宽(像素)
                    </label>
                    <div class="layui-input-inline cc-style-other" style="width: 80px;">
                        <input type="text" name="ysW" placeholder="原比例" id="width" value="" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">
                        高(像素)
                    </label>
                    <div class="layui-input-inline cc-style-other" style="width: 80px;">
                        <input type="text" name="ysH" placeholder="原比例" id="height" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">
                        帧数抽取
                    </label>
                    <div class="layui-input-inline cc-style-first" style="width: 120px;">
                        <select name="frame" lay-filter="frame" id="frame" lay-filter="frame">
                            <option value="">保持原帧数</option>
                            <option value="10">去掉10%</option>
                            <option value="20">去掉20%</option>
                            <option value="30">去掉30%</option>
                            <option value="40%">去掉40%</option>
                            <option value="50%">去掉50%</option>
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">
                        压缩等级
                    </label>
                    <div id="level" class="layui-input-inline cc-style-other" style="width: 120px;">
                        <select id="quality" name="q" lay-filter="q" lay-filter="q">
                            @for($i = 98;$i >= 30;$i = $i -2)
		                        <option value="{{$i}}">{{$i}}</option>
	                        @endfor
                        </select>

                    </div>
                </div>
                <div class="layui-inline">
                    <button type="button" style="background-color: rgb(30, 159, 255);" class="layui-btn yasuoBtn layui-btn-normal layui-btn-radius" lay-submit lay-filter="beginCompression">
                        开始压缩
                    </button>
                </div>
            </div>
            </form>
	        <form class="layui-form" action="javascript:;" method="post">

                <blockquote class="layui-elem-quote">
						温馨提示：1.宽和高同时设置时，系统会自动计算最小宽高比进行压缩；2.会员单张图片最大支持50M。
                </blockquote>
		        @csrf
		        <div class="layui-upload-drag uploaderGif" id="uploader" style="width: 100%;padding: 90px 0;">
                    <img src="/image/gif.png" alt="" style="display: inline-block;">
                    <div style="margin-top: 20px;">
                        <button class="layui-btn layui-btn-lg layui-btn-normal" style="border-radius:5px;cursor:pointer;background-color: #00b8f4;" type="button">点击选择图片</button>
                    </div>
                    <p style="margin-top: 20px;">或将照片拖到这里</p>
                </div>
                <div class="layui-upload-drag img-list" style="display: none;width: 100%;padding: 10px 0;"></div>
                <div class="statusBar" style="display: none">
                    <div class="info">

                    </div>
                    <div class="btns">
                        <div class="btn_upload">
                            <div id="filePicker2" class="webuploader-container">
                                <div class="webuploader-pick uploaderGif">
                                    继续添加
                                </div>
                                <div class="state-ready uploadBtn">
                                    开始上传
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
	        </form>
            <form action="javascript:;" id="successFiles">

            </form>

        </div>
		<div id="uploader" class="wu-example">

		</div>
    </div>
	<script src="/home/gif/index.js"></script>
@endsection



{{--差一个，如果没有怎么办--}}
{{--checkIds.push ( { "id": thisId , "type": "organization" } );添加--}}
{{--checkIds.splice ( i , 1 );删除--}}










<script>
    upload.render ( {
        elem: '***'
        , url: '***'
        , headers: {
            'X-CSRF-TOKEN': ''
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
            console.log ( percent );//单个文件的上传进度百分比
            console.log ( index );//单个文件的唯一索引
        }
        , choose: function ( obj ) {
        }
        , before: function ( obj ) {
            //预读本地文件示例，不支持ie8

        }
        , done: function ( res , index , upload ) {
        }
        , allDone: function ( obj ) { //当文件全部被提交后，才触发
        }
        , error: function ( index , upload ) {
        }
    })
</script>