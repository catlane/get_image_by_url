@extends('home.big_common')




@section('content')
	<section class="content mgbt30">
            <input type="hidden" value="" id="download_all_md5">
            <input type="hidden" value="index" id="method">
            <div class="container">
                <div class="ys-tabs cl ft14">
                    <ul>
                        <li>
                            <a href="/" @if (trim (request ()->getPathInfo (),'/') == '') class="active" @endif>
                                网址一键获取
                            </a>
                        </li>
                        <li>
                            <a href="/gif" @if(strpos (trim (request ()->getPathInfo (),'/'),'gif') !== false) class="active"  @endif>
                                GIF压缩
                            </a>
                        </li>
                        <li>
                            <a href="https://www.yasuotu.com/png">
                                PNG压缩
                            </a>
                        </li>
                        <li>
                            <a href="https://www.yasuotu.com/jpg">
                                JPG压缩
                            </a>
                        </li>
                        <li>
                            <a href="https://www.yasuotu.com/zjz">
                                证件照压缩
                            </a>
                        </li>

                        <li style="position: relative;">
                            <a href="https://www.yasuotu.com/baibian">
                                加边框
                            </a>
                        </li>
                        <li>
                            <a href="https://www.yasuotu.com/shuiyin">
                                加水印
                            </a>
                        </li>
                        <li>
                            <a href="https://www.yasuotu.com/geshi">
                                转格式
                            </a>
                        </li>
                        <li>
                            <a href="https://www.yasuotu.com/editor">
                                图片裁剪
                            </a>
                        </li>
                        <li style="position: relative;">
                            <a href="https://www.yasuotu.com/size">
                                图片改大小
                            </a>
                        </li>
                    </ul>
                </div>
                @yield('small_content')
                <div style="text-align: center;margin-top: -15px;">
                    <a href="https://www.yasuotu.com/zt">
                        <img src="/home/common/new_gg.jpg">
                    </a>
                </div>
                <div class="ys-content cl">
                    <div class="fl ys-list text-c">
                        <p class="mgbt10">
                            <img src="/home/common/th-pic1.png">
                        </p>
                        <h3 class="ft16 mgbt10 ftbold">
                            文件保密
                        </h3>
                        <p class="col6 ft14 lg26">
                            压缩完成一个小时后，文件便会永久从网站的服务器删除。100%保障你的隐私。
                        </p>
                    </div>
                    <div class="fl ys-list text-c ys-pd">
                        <p class="mgbt10">
                            <img src="/home/common/th-pic2.png">
                        </p>
                        <h3 class="ft16 mgbt10 ftbold">
                            高清晰度
                        </h3>
                        <p class="col6 ft14 lg26">
                            经过压缩的图片可能只有原来的1/10的大小，但是质量却完美无瑕。
                        </p>
                    </div>
                    <div class="fl ys-list text-c">
                        <p class="mgbt10">
                            <img src="/home/common/th-pic3.png">
                        </p>
                        <h3 class="ft16 mgbt10 ftbold">
                            无须安装
                        </h3>
                        <p class="col6 ft14 lg26">
                            图片压缩在云端进行，您不需要安装任何软件，不用担心中毒。
                        </p>
                    </div>
                </div>
                <div class="box-links">
                    <div class="links panel">
                        <div class="panel-heading" id="top-links">
                            <i class="fa fa-bookmark-o">
                            </i>
                            常用工具
                        </div>
                        <div class="panel-body">
                            <dl class="row">
                                <dd class="col-sm-3 col-md-2 col-xs-4 behance">
                                    <a href="https://www.yasuotu.com/" target="_blank">
                                        <i class="link-logo">
                                        </i>
                                        <span class="link-title">
                                            图片压缩
                                        </span>
                                        <span class="link-info">
                                            支持GIF、PNG、JPG格式图片压缩，无损压缩。
                                        </span>
                                    </a>
                                </dd>
                                <dd class="col-sm-3 col-md-2 col-xs-4 behance">
                                    <a href="https://www.yasuotu.com/size" target="_blank">
                                        <i class="link-logo">
                                        </i>
                                        <span class="link-title">
                                            图片改大小
                                        </span>
                                        <span class="link-info">
                                            修改图片尺寸，可自定义图片大小。
                                        </span>
                                    </a>
                                </dd>
                                <dd class="col-sm-3 col-md-2 col-xs-4 behance">
                                    <a href="https://www.yasuotu.com/geshi" target="_blank">
                                        <i class="link-logo">
                                        </i>
                                        <span class="link-title">
                                            转格式
                                        </span>
                                        <span class="link-info">
                                            JPG、PNG、WEBP、BMP图片格式互转。
                                        </span>
                                    </a>
                                </dd>
                                <dd class="col-sm-3 col-md-2 col-xs-4 behance">
                                    <a href="https://www.yasuotu.com/face" target="_blank">
                                        <i class="link-logo">
                                        </i>
                                        <span class="link-title">
                                            表情压缩
                                        </span>
                                        <span class="link-info">
                                            GIF动图、照片压缩为表情大小。
                                        </span>
                                    </a>
                                </dd>
                                <dd class="col-sm-3 col-md-2 col-xs-4 behance">
                                    <a href="https://www.yasuotu.com/zjz" target="_blank">
                                        <i class="link-logo">
                                        </i>
                                        <span class="link-title">
                                            证件照压缩
                                        </span>
                                        <span class="link-info">
                                            可以将图片改为1寸、2寸大小，并压缩KB数。
                                        </span>
                                    </a>
                                </dd>
                                <dd class="col-sm-3 col-md-2 col-xs-4 behance">
                                    <a href="https://www.yasuotu.com/shuiyin" target="_blank">
                                        <i class="link-logo">
                                        </i>
                                        <span class="link-title">
                                            加水印
                                        </span>
                                        <span class="link-info">
                                            给图片加上水印，可控制水印位置大小。
                                        </span>
                                    </a>
                                </dd>
                                <dd class="col-sm-3 col-md-2 col-xs-4 behance">
                                    <a href="https://www.yasuotu.com/taobao" target="_blank">
                                        <i class="link-logo">
                                        </i>
                                        <span class="link-title">
                                            淘宝店图
                                        </span>
                                        <span class="link-info">
                                            给图片加上纯色边，适合淘宝店图。
                                        </span>
                                    </a>
                                </dd>
                                <dd class="col-sm-3 col-md-2 col-xs-4 behance">
                                    <a href="https://www.yasuotu.com/editor" target="_blank">
                                        <i class="link-logo">
                                        </i>
                                        <span class="link-title">
                                            图片裁剪
                                        </span>
                                        <span class="link-info">
                                            任意比例剪切图片像素大小。
                                        </span>
                                    </a>
                                </dd>
                                <dd class="col-sm-3 col-md-2 col-xs-4 behance">
                                    <a href="https://www.yasuotu.com/gifcaijian" target="_blank">
                                        <i class="link-logo">
                                        </i>
                                        <span class="link-title">
                                            GIF 裁剪
                                        </span>
                                        <span class="link-info">
                                            任意尺寸裁剪GIF动图。
                                        </span>
                                    </a>
                                </dd>
                                <dd class="col-sm-3 col-md-2 col-xs-4 behance">
                                    <a href="https://www.yasuotu.com/gifhecheng" target="_blank">
                                        <i class="link-logo">
                                        </i>
                                        <span class="link-title">
                                            多图合成 GIF
                                        </span>
                                        <span class="link-info">
                                            多张连续图片生成为GIF动图。
                                        </span>
                                    </a>
                                </dd>
                                <dd class="col-sm-3 col-md-2 col-xs-4 behance">
                                    <a href="https://www.yasuotu.com/zhuangif" target="_blank">
                                        <i class="link-logo">
                                        </i>
                                        <span class="link-title">
                                            视频转GIF
                                        </span>
                                        <span class="link-info">
                                            本地视频、腾讯视频转为GIF动图。
                                        </span>
                                    </a>
                                </dd>
                                <dd class="col-sm-3 col-md-2 col-xs-4 behance">
                                    <a href="https://www.yasuotu.com/baibian" target="_blank">
                                        <i class="link-logo">
                                        </i>
                                        <span class="link-title">
                                            加边框
                                        </span>
                                        <span class="link-info">
                                            可自定义边框颜色和大小
                                        </span>
                                    </a>
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <hr id="design-resources">
                    <div class="links panel">
                        <div class="panel-heading" id="top-links">
                            <i class="fa fa-clone">
                            </i>
                            图片调色
                        </div>
                        <div class="panel-body">
                            <dl class="row">
                                <dd class="col-sm-3 col-md-2 col-xs-4 behance">
                                    <a href="https://www.yasuotu.com/buttonColor" target="_blank">
                                        <i class="link-logo">
                                        </i>
                                        <span class="link-title">
                                            图片去底色
                                        </span>
                                        <span class="link-info">
                                            可将图片纯色底去掉，输出PNG格式。
                                        </span>
                                    </a>
                                </dd>
                                <dd class="col-sm-3 col-md-2 col-xs-4 behance">
                                    <a href="https://www.yasuotu.com/liangdu" target="_blank">
                                        <i class="link-logo">
                                        </i>
                                        <span class="link-title">
                                            亮度对比度调整
                                        </span>
                                        <i class="Hui-iconfont" style="position: absolute;left: 136px;top:-15px;font-size: 30px;color: red;">
                                            
                                        </i>
                                        <span class="link-info">
                                            图片亮度对比度调整
                                        </span>
                                    </a>
                                </dd>
                                <dd class="col-sm-3 col-md-2 col-xs-4 behance">
                                    <a href="https://www.yasuotu.com/fanse" target="_blank">
                                        <i class="link-logo">
                                        </i>
                                        <span class="link-title">
                                            图片反色处理
                                        </span>
                                        <i class="Hui-iconfont" style="position: absolute;left: 120px;top:-15px;font-size: 30px;color: red;">
                                            
                                        </i>
                                        <span class="link-info">
                                            图片反色处理
                                        </span>
                                    </a>
                                </dd>
                                <dd class="col-sm-3 col-md-2 col-xs-4 behance">
                                    <a href="https://www.yasuotu.com/mohu" target="_blank">
                                        <i class="link-logo">
                                        </i>
                                        <span class="link-title">
                                            图片模糊处理
                                        </span>
                                        <i class="Hui-iconfont" style="position: absolute;left: 120px;top:-15px;font-size: 30px;color: red;">
                                            
                                        </i>
                                        <span class="link-info">
                                            支持图片局部模糊
                                        </span>
                                    </a>
                                </dd>
                                <dd class="col-sm-3 col-md-2 col-xs-4 behance">
                                    <a href="https://www.yasuotu.com/coloreplace" target="_blank">
                                        <i class="link-logo">
                                        </i>
                                        <span class="link-title">
                                            证件照换背景
                                        </span>
                                        <span class="link-info">
                                            一键换证件照背景颜色。
                                        </span>
                                    </a>
                                </dd>
                                <dd class="col-sm-3 col-md-2 col-xs-4 behance">
                                    <a href="https://www.yasuotu.com/hd" target="_blank">
                                        <i class="link-logo">
                                        </i>
                                        <span class="link-title">
                                            图片变黑白
                                        </span>
                                        <i class="Hui-iconfont" style="position: absolute;left: 105px;top:-15px;font-size: 30px;color: red;">
                                            
                                        </i>
                                        <span class="link-info">
                                            可调整图片灰度
                                        </span>
                                    </a>
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <hr id="design-resources">
                    <div class="links panel">
                        <div class="panel-heading" id="top-links">
                            <i class="fa fa-clone">
                            </i>
                            色彩搭配
                        </div>
                        <div class="panel-body">
                            <dl class="row">
                                <dd class="col-sm-3 col-md-2 col-xs-4 behance">
                                    <a href="https://www.yasuotu.com/dapei" target="_blank">
                                        <i class="link-logo">
                                        </i>
                                        <span class="link-title">
                                            色彩搭配
                                        </span>
                                        <span class="link-info">
                                            海量颜色组合搭配示例。
                                        </span>
                                    </a>
                                </dd>
                                <dd class="col-sm-3 col-md-2 col-xs-4 behance">
                                    <a href="https://www.yasuotu.com/chuantong" target="_blank">
                                        <i class="link-logo">
                                        </i>
                                        <span class="link-title">
                                            中日传统色彩
                                        </span>
                                        <span class="link-info">
                                            常用的中日两国传统色彩配色表。
                                        </span>
                                    </a>
                                </dd>
                                <dd class="col-sm-3 col-md-2 col-xs-4 behance">
                                    <a href="https://www.yasuotu.com/changyong" target="_blank">
                                        <i class="link-logo">
                                        </i>
                                        <span class="link-title">
                                            网页常用测试
                                        </span>
                                        <span class="link-info">
                                            网页设计常用颜色搭配表。
                                        </span>
                                    </a>
                                </dd>
                                <dd class="col-sm-3 col-md-2 col-xs-4 behance">
                                    <a href="https://www.yasuotu.com/sehuan" target="_blank">
                                        <i class="link-logo">
                                        </i>
                                        <span class="link-title">
                                            色环搭配
                                        </span>
                                        <span class="link-info">
                                            互补色、三角形搭配、矩形搭配等色环。
                                        </span>
                                    </a>
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <hr id="design-resources">
                </div>
                <script type="text/javascript">
                    var os = function() {
                        var ua = navigator.userAgent,
                            isWindowsPhone = /(?:Windows Phone)/.test(ua),
                            isSymbian = /(?:SymbianOS)/.test(ua) || isWindowsPhone,
                            isAndroid = /(?:Android)/.test(ua),
                            isFireFox = /(?:Firefox)/.test(ua),
                            isChrome = /(?:Chrome|CriOS)/.test(ua),
                            isTablet = /(?:iPad|PlayBook)/.test(ua) || (isAndroid && !/(?:Mobile)/.test(ua)) || (isFireFox && /(?:Tablet)/.test(ua)),
                            isPhone = /(?:iPhone)/.test(ua) && !isTablet,
                            isPc = !isPhone && !isAndroid && !isSymbian;
                        return {
                            isTablet: isTablet,
                            isPhone: isPhone,
                            isAndroid: isAndroid,
                            isPc: isPc
                        };
                    } ();
                    if (os.isAndroid || os.isPhone) {
                        $('.box-links').hide();
                    } else {
                        $('.box-links').show();
                    }
                </script>
            </div>
            <div class="container pl-content">
                <div class="pl-form fr">
                    <form id="message_from" action="https://www.yasuotu.com/message" method="post">
                        <input type="hidden" name="_token" value="693182wtOhzOzkGyCJGtGqGk1AqmbIYtjuK65IGj">
                        <div class="text-c colty ft24 mgbt20 my-say">
                            <img src="/home/common/icon-1.png">
                            &nbsp;&nbsp;我说一句：
                        </div>
                        <div class="col9 text-c mgbt20 my-tips">
                            看看讨论区大家都在说什么？想说什么，想问什么，都赶紧加入他们一起讨论吧！
                        </div>
                        <div class="text-area mgbt20">
                            <textarea name="content" id="content" placeholder="请在此此处发表评论">
                            </textarea>
                        </div>
                        <div class="pl-btn">
                            <button type="button" id="btn_bbs_submit" class="ft20">
                                发&nbsp;&nbsp;&nbsp;表
                            </button>
                        </div>
                    </form>
                </div>
                <div class="pl-lists">
                    <a href="https://www.yasuotu.com/bbs">
                        <div class="pl-hed ft24 mgbt20">
                            <img src="/home/common/icon-2.png">
                            &nbsp;&nbsp;讨论区大家在说：
                        </div>
                    </a>
                    <ul>
                        <li class="first">
                            <span class="fl">
                                <img style="border-radius:50%;" width="30" onerror="this.src=&#39;https://www.yasuotu.com/img/touxiang.png&#39;"
                                     src="/home/common/132">
                            </span>
                            <div class="pl-info" style="margin-left: -15px;">
                                <a target="_blank" href="https://www.yasuotu.com/bbs/q/67">
                                </a>
                                <div class="title ft15 mgbt6">
                                    <a target="_blank" href="https://www.yasuotu.com/bbs/q/67">
                                        【阿谷】
                                        <span class="colred">
                                            （按个数付费）
                                        </span>
                                        <span class="col9">
                                            1天前
                                        </span>
                                    </a>
                                    <a href="javascript:void(0)" msg_id="67" class="zan  zan_btn  ">
                                        0
                                    </a>
                                </div>
                                <a target="_blank" href="https://www.yasuotu.com/bbs/q/67">
                                    <div class="nr ft14">
                                        不小心下载了两次，可以给退吗？毕竟你们这个不便宜
                                        <span class="ft12" style="color: red;margin-left: 10px;">
                                            1个回复
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li class="first">
                            <span class="fl">
                                <img style="border-radius:50%;" width="30" onerror="this.src=&#39;https://www.yasuotu.com/img/touxiang.png&#39;"
                                     src="/home/common/132(1)">
                            </span>
                            <div class="pl-info" style="margin-left: -15px;">
                                <a target="_blank" href="https://www.yasuotu.com/bbs/q/66">
                                </a>
                                <div class="title ft15 mgbt6">
                                    <a target="_blank" href="https://www.yasuotu.com/bbs/q/66">
                                        【Ann】
                                        <span class="colred">
                                        </span>
                                        <span class="col9">
                                            8天前
                                        </span>
                                    </a>
                                    <a href="javascript:void(0)" msg_id="66" class="zan  zan_btn  ">
                                        0
                                    </a>
                                </div>
                                <a target="_blank" href="https://www.yasuotu.com/bbs/q/66">
                                    <div class="nr ft14">
                                        可以不要有水印吗？
                                        <span class="ft12" style="color: red;margin-left: 10px;">
                                            1个回复
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li class="first">
                            <span class="fl">
                                <img style="border-radius:50%;" width="30" onerror="this.src=&#39;https://www.yasuotu.com/img/touxiang.png&#39;"
                                     src="/home/common/touxiang.png">
                            </span>
                            <div class="pl-info" style="margin-left: -15px;">
                                <a target="_blank" href="https://www.yasuotu.com/bbs/q/65">
                                </a>
                                <div class="title ft15 mgbt6">
                                    <a target="_blank" href="https://www.yasuotu.com/bbs/q/65">
                                        【c1975l1956@gmail.com】
                                        <span class="colred">
                                        </span>
                                        <span class="col9">
                                            9天前
                                        </span>
                                    </a>
                                    <a href="javascript:void(0)" msg_id="65" class="zan  zan_btn  ">
                                        0
                                    </a>
                                </div>
                                <a target="_blank" href="https://www.yasuotu.com/bbs/q/65">
                                    <div class="nr ft14">
                                        可否增加其他支付方式，如信用卡
                                        <span class="ft12" style="color: red;margin-left: 10px;">
                                            2个回复
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li class="first">
                            <span class="fl">
                                <img style="border-radius:50%;" width="30" onerror="this.src=&#39;https://www.yasuotu.com/img/touxiang.png&#39;"
                                     src="/home/common/100">
                            </span>
                            <div class="pl-info" style="margin-left: -15px;">
                                <a target="_blank" href="https://www.yasuotu.com/bbs/q/63">
                                </a>
                                <div class="title ft15 mgbt6">
                                    <a target="_blank" href="https://www.yasuotu.com/bbs/q/63">
                                        【技术5-江苏华招网信息技术】
                                        <span class="colred">
                                        </span>
                                        <span class="col9">
                                            24天前
                                        </span>
                                    </a>
                                    <a href="javascript:void(0)" msg_id="63" class="zan  zan_btn  ">
                                        0
                                    </a>
                                </div>
                                <a target="_blank" href="https://www.yasuotu.com/bbs/q/63">
                                    <div class="nr ft14">
                                        111
                                        <span class="ft12" style="color: red;margin-left: 10px;">
                                            1个回复
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li class="first">
                            <span class="fl">
                                <img style="border-radius:50%;" width="30" onerror="this.src=&#39;https://www.yasuotu.com/img/touxiang.png&#39;"
                                     src="/home/common/touxiang.png">
                            </span>
                            <div class="pl-info" style="margin-left: -15px;">
                                <a target="_blank" href="https://www.yasuotu.com/bbs/q/62">
                                </a>
                                <div class="title ft15 mgbt6">
                                    <a target="_blank" href="https://www.yasuotu.com/bbs/q/62">
                                        【13710847113】
                                        <span class="colred">
                                            （按个数付费）
                                        </span>
                                        <span class="col9">
                                            27天前
                                        </span>
                                    </a>
                                    <a href="javascript:void(0)" msg_id="62" class="zan  zan_btn  ">
                                        2
                                    </a>
                                </div>
                                <a target="_blank" href="https://www.yasuotu.com/bbs/q/62">
                                    <div class="nr ft14">
                                        压缩后怎么保存图片到相册
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li class="first">
                            <span class="fl">
                                <img style="border-radius:50%;" width="30" onerror="this.src=&#39;https://www.yasuotu.com/img/touxiang.png&#39;"
                                     src="/home/common/userphoto_13806.jpg">
                            </span>
                            <div class="pl-info" style="margin-left: -15px;">
                                <a target="_blank" href="https://www.yasuotu.com/bbs/q/61">
                                </a>
                                <div class="title ft15 mgbt6">
                                    <a target="_blank" href="https://www.yasuotu.com/bbs/q/61">
                                        【HDST4】
                                        <span class="colred">
                                        </span>
                                        <span class="col9">
                                            29天前
                                        </span>
                                    </a>
                                    <a href="javascript:void(0)" msg_id="61" class="zan  zan_btn  ">
                                        0
                                    </a>
                                </div>
                                <a target="_blank" href="https://www.yasuotu.com/bbs/q/61">
                                    <div class="nr ft14">
                                        很好用(✪▽✪)
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li class="first">
                            <span class="fl">
                                <img style="border-radius:50%;" width="30" onerror="this.src=&#39;https://www.yasuotu.com/img/touxiang.png&#39;"
                                     src="/home/common/100(1)">
                            </span>
                            <div class="pl-info" style="margin-left: -15px;">
                                <a target="_blank" href="https://www.yasuotu.com/bbs/q/59">
                                </a>
                                <div class="title ft15 mgbt6">
                                    <a target="_blank" href="https://www.yasuotu.com/bbs/q/59">
                                        【另边】
                                        <span class="colred">
                                        </span>
                                        <span class="col9">
                                            2018月10月24日 21:55
                                        </span>
                                    </a>
                                    <a href="javascript:void(0)" msg_id="59" class="zan  zan_btn  ">
                                        1
                                    </a>
                                </div>
                                <a target="_blank" href="https://www.yasuotu.com/bbs/q/59">
                                    <div class="nr ft14">
                                        信息保密吗
                                        <span class="ft12" style="color: red;margin-left: 10px;">
                                            1个回复
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li class="first">
                            <span class="fl">
                                <img style="border-radius:50%;" width="30" onerror="this.src=&#39;https://www.yasuotu.com/img/touxiang.png&#39;"
                                     src="/home/common/132(2)">
                            </span>
                            <div class="pl-info" style="margin-left: -15px;">
                                <a target="_blank" href="https://www.yasuotu.com/bbs/q/57">
                                </a>
                                <div class="title ft15 mgbt6">
                                    <a target="_blank" href="https://www.yasuotu.com/bbs/q/57">
                                        【袁轶】
                                        <span class="colred">
                                            （按时间付费）
                                        </span>
                                        <span class="col9">
                                            2018月10月21日 19:40
                                        </span>
                                    </a>
                                    <a href="javascript:void(0)" msg_id="57" class="zan  zan_btn  ">
                                        0
                                    </a>
                                </div>
                                <a target="_blank" href="https://www.yasuotu.com/bbs/q/57">
                                    <div class="nr ft14">
                                        怎么去水印啊
                                        <span class="ft12" style="color: red;margin-left: 10px;">
                                            1个回复
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li class="first">
                            <span class="fl">
                                <img style="border-radius:50%;" width="30" onerror="this.src=&#39;https://www.yasuotu.com/img/touxiang.png&#39;"
                                     src="/home/common/132(3)">
                            </span>
                            <div class="pl-info" style="margin-left: -15px;">
                                <a target="_blank" href="https://www.yasuotu.com/bbs/q/56">
                                </a>
                                <div class="title ft15 mgbt6">
                                    <a target="_blank" href="https://www.yasuotu.com/bbs/q/56">
                                        【砚之蔚】
                                        <span class="colred">
                                            （按个数付费）
                                        </span>
                                        <span class="col9">
                                            2018月10月21日 18:58
                                        </span>
                                    </a>
                                    <a href="javascript:void(0)" msg_id="56" class="zan  zan_btn  ">
                                        0
                                    </a>
                                </div>
                                <a target="_blank" href="https://www.yasuotu.com/bbs/q/56">
                                    <div class="nr ft14">
                                        请问可以开发票吗？
                                        <span class="ft12" style="color: red;margin-left: 10px;">
                                            2个回复
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li class="first">
                            <span class="fl">
                                <img style="border-radius:50%;" width="30" onerror="this.src=&#39;https://www.yasuotu.com/img/touxiang.png&#39;"
                                     src="/home/common/userphoto_12423.gif">
                            </span>
                            <div class="pl-info" style="margin-left: -15px;">
                                <a target="_blank" href="https://www.yasuotu.com/bbs/q/55">
                                </a>
                                <div class="title ft15 mgbt6">
                                    <a target="_blank" href="https://www.yasuotu.com/bbs/q/55">
                                        【aqazz@qq.com】
                                        <span class="colred">
                                        </span>
                                        <span class="col9">
                                            2018月10月19日 16:22
                                        </span>
                                    </a>
                                    <a href="javascript:void(0)" msg_id="55" class="zan  zan_btn  ">
                                        1
                                    </a>
                                </div>
                                <a target="_blank" href="https://www.yasuotu.com/bbs/q/55">
                                    <div class="nr ft14">
                                        希望能有个表情包分享区域
                                        <span class="ft12" style="color: red;margin-left: 10px;">
                                            1个回复
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li class="first">
                            <a href="https://www.yasuotu.com/bbs" style="color: #00abde;">
                                查看更多&gt;&gt;
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <script type="text/javascript">
                var uid = "0";
                $(function() {
                    //点赞
                    var zan_disabled = true;
                    var sub_disabled = true;
                    $('.zan_btn').on('click',
                        function() {
                            if (zan_disabled === true) {
                                zan_disabled = false;
                                if (uid > 0) {
                                    var obj = $(this);
                                    var id = $(this).attr('msg_id');
                                    var str = parseInt($(this).html());
                                    var token = "693182wtOhzOzkGyCJGtGqGk1AqmbIYtjuK65IGj";
                                    $.ajax({
                                        cache: true,
                                        type: "POST",
                                        url: 'https://www.yasuotu.com/thumb',
                                        data: {
                                            'id': id,
                                            '_token': token
                                        },
                                        //
                                        async: false,
                                        error: function(request) {
                                            layer.msg("Connection error");
                                            zan_disabled = true;
                                        },
                                        success: function(data) {
                                            if (data.status == 1) {
                                                layer.msg(data.info, {
                                                    icon: 1
                                                });
                                                setTimeout(function() { //两秒后执行
                                                        window.location.reload() //刷新当前页面
                                                    },
                                                    2000);
								                /*  obj.html( str + 1);
								                 obj.removeClass('zan_btn');
								                 obj.addClass('zanhover');*/
                                            } else {
                                                layer.msg(data.info);
                                            }
                                            zan_disabled = true;
                                        }
                                    });

                                } else {
                                    //iframe层 登陆
                                    layer.open({
                                        type: 2,
                                        title: '微信登陆',
                                        area: ['400px', '470px'],
                                        fixed: false,
                                        //不固定
                                        maxmin: true,
                                        content: "https://www.yasuotu.com/auth/ajaxWechat"
                                    });
                                    zan_disabled = true;
                                }
                            }

                        });
                    //发布消息
                    $('#btn_bbs_submit').on('click',
                        function() {
                            if (uid > 0) {
                                var test = $('#content').val();
                                if (test) {
                                    if (sub_disabled === true) {
                                        sub_disabled = false;
                                        $.ajax({
                                            cache: true,
                                            type: "POST",
                                            url: $('#message_from').attr('action'),
                                            data: $('#message_from').serialize(),
                                            // 你的formid
                                            async: false,
                                            error: function(request) {
                                                layer.msg("Connection error");
                                                sub_disabled = true;
                                            },
                                            success: function(data) {
                                                if (data.status == 1) {
                                                    layer.msg(data.info, {
                                                        icon: 1
                                                    });
                                                    setTimeout(function() { //两秒后执行
                                                            sub_disabled = true;
                                                            window.location.reload() //刷新当前页面
                                                        },
                                                        1000);
                                                } else {
                                                    layer.msg(data.info);
                                                }
                                            }
                                        });
                                    }
                                } else {
                                    layer.msg('发布内容不能为空', {
                                        'icon': 2
                                    });
                                }

                            } else {
                                //iframe层 登陆
                                layer.open({
                                    type: 2,
                                    title: '微信登陆',
                                    area: ['400px', '470px'],
                                    fixed: false,
                                    //不固定
                                    maxmin: true,
                                    content: "https://www.yasuotu.com/auth/ajaxWechat"
                                });
                            }

                        });
                });
            </script>
            <div class="container mbt50">
                <div class="singlePageContainer onlineTools clearfix phone600Hide">
                    <h2>
                        <a class="f18" style="color: #00abde;" href="https://www.yasuotu.com/yst">
                            压缩图在线版
                        </a>
                        <span class="phone800Hide f18">
                            ,无需下载安装。我们让图片压缩更简单！
                        </span>
                    </h2>
                    <ul class="clearfix">
                        <li class="toolImage">
                            <a title="在线图片压缩软件" class="toolImage " target="_top" href="https://www.yasuotu.com/yst">
                                <i>
                                </i>
                                <h3>
                                    在线图片压缩
                                </h3>
                                <p>
                                    可以设置尺寸，大小。图片瘦身10倍，保持清晰。
                                </p>
                            </a>
                        </li>
                        <li class="toolZip">
                            <a title="在线图片压缩工具，把目录打包成ZIP或者RAR，上传就可以压缩其中的图片" class="toolZip" target="_top"
                               href="https://www.yasuotu.com/">
                                <i>
                                </i>
                                <h3>
                                    海量图片压缩
                                </h3>
                                <p>
                                    压缩后保留目录层级，仅压缩图片，其他文件保持不变
                                </p>
                            </a>
                        </li>
                        <li class="toolGif">
                            <a title="GIF压缩" class="toolGif" target="_top" href="https://www.yasuotu.com/gif">
                                <i>
                                </i>
                                <h3>
                                    GIF 压缩
                                </h3>
                                <p>
                                    视频模式，设计模式。两种压缩模式，尽可能缩小 GIF。
                                </p>
                            </a>
                        </li>
                        <li class="toolAvatar">
                            <a title="在线证件照压缩" class="toolAvatar" target="_top" href="https://www.yasuotu.com/zjz">
                                <i>
                                </i>
                                <h3>
                                    证件照压缩
                                </h3>
                                <p>
                                    一寸照，二寸照，护照，学历，证书，轻松压缩裁剪。
                                </p>
                            </a>
                        </li>
                        <li class="toolWatermark">
                            <a title="在线图片加水印软件" class="toolWatermark " target="_top" href="https://www.yasuotu.com/shuiyin">
                                <i>
                                </i>
                                <h3>
                                    图片加水印
                                </h3>
                                <p>
                                    支持批量图片添加水印。支持艺术文字。支持图片水印。
                                </p>
                            </a>
                        </li>
                        <li class="toolConvert">
                            <a title="在线图片格式转换工具" class="toolConvert" target="_top" href="https://www.yasuotu.com/geshi">
                                <i>
                                </i>
                                <h3>
                                    图片格式转换
                                </h3>
                                <p>
                                    支持批量图片格式转换。可转成JPG，PNG，GIF格式。
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="singlePageContainer cdnzip clearfix phone600Hide">
                    <h2>
                        <span class="phone800Hide f18">
                            让网站和App的图片速度飞起来！
                        </span>
                    </h2>
                    <ul class="clearfix">
                        <li>
                            <a class="question1" href="https://www.yasuotu.com/yst">
                                <img src="/home/common/question-1.jpg" alt=""
                                     class="case_sm">
                                <span class="caseBg">
                                </span>
                                <span class="case_title">
                                    <b>
                                        图片打开很慢吗？
                                    </b>
                                    <i>
                                        编辑把手机或相机拍摄的图直接上传
                                    </i>
                                    <i>
                                        编辑不擅长图片压缩
                                    </i>
                                    <i>
                                        程序员该使用小图的地方调用了大图
                                    </i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a class="question2" href="https://www.yasuotu.com/yst">
                                <img src="/home/common/question-2.jpg" alt=""
                                     class="case_sm">
                                <span class="caseBg">
                                </span>
                                <span class="case_title">
                                    <b>
                                        手机打开更慢？
                                    </b>
                                    <i>
                                        3G网络信号不稳定，图片打开很慢
                                    </i>
                                    <i>
                                        2G基本打不开图片
                                    </i>
                                    <i>
                                        浪费了用户宝贵的流量费
                                    </i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a class="question4" href="https://www.yasuotu.com/yst">
                                <img src="/home/common/question-4.jpg" alt=""
                                     class="case_sm" style="top: 0px;">
                                <span class="caseBg" style=" top: 174px; display: none;">
                                </span>
                                <span class="case_title" style="">
                                    <b>
                                        机房带宽很贵？
                                    </b>
                                    <i>
                                        IDC和云主机的带宽昂贵
                                    </i>
                                    <i>
                                        带宽买少了不够用，买多了用不完
                                    </i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a class="question6" href="https://www.yasuotu.com/yst">
                                <img src="/home/common/question-6.jpg" alt=""
                                     class="case_sm" style="top: 0px;">
                                <span class="caseBg" style="top: 174px; display: none;">
                                </span>
                                <span class="case_title" style="">
                                    <b>
                                        完美压缩图片
                                    </b>
                                    <i>
                                        节省约50％带宽，速度提升约两倍
                                    </i>
                                    <i>
                                        同一图片可生成任意大小的缩略图
                                    </i>
                                    <i>
                                        压缩PNG图片，GIF动画10倍以上压缩
                                    </i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="hc-content cl">
                <div class="container">
                    <div class="hc-list fl mgbt50">
                        <div class="top cl mgbt15">
                            <span class="fl">
                                <img src="/home/common/yw.png">
                            </span>
                            <div class="info">
                                <h3 class="ft18 mgbt6">
                                    压缩图片大小有什么作用？
                                </h3>
                            </div>
                        </div>
                        <div class="hc-nr ft15 lg30 col6">
                            <p>
                                1、使用交错GIF、交错PNG或渐进JPEG提高图片体验，让图像能够更快地显示
                            </p>
                            <p>
                                2、突破上传到微信最大支持2M限制，你的图片若超出2M，可以先压缩一下
                            </p>
                            <p>
                                3、减小体积，可以便于传输，使网站更快加载图片，降低服务器带宽成本
                            </p>
                        </div>
                    </div>
                    <div class="hc-list fr mgbt50">
                        <div class="top cl mgbt15">
                            <span class="fl">
                                <img src="/home/common/yw.png">
                            </span>
                            <div class="info">
                                <h3 class="ft18 mgbt6">
                                    压缩图片大小有什么坏处？
                                </h3>
                            </div>
                        </div>
                        <div class="hc-nr ft15 lg30 col6">
                            <p>
                                1、图片压缩后对比原文件是有损的，相对肉眼查看几乎没分别
                            </p>
                            <p>
                                2、如果你用来打印，尽量不要压缩，因为它会把部分图片信息去除，只是肉眼看不见
                            </p>
                            <p>
                                3、如果你用于保存摄影作品原图，请使用WinRAR、快压等软件进行压缩保存才是正常方法
                            </p>
                        </div>
                    </div>
                    <div class="hc-list fl mgbt50">
                        <div class="top cl mgbt15">
                            <span class="fl">
                                <img src="/home/common/yw.png">
                            </span>
                            <div class="info">
                                <h3 class="ft18 mgbt6">
                                    压缩图使用了什么算法确保图片不失真？
                                </h3>
                            </div>
                        </div>
                        <div class="hc-nr ft15 lg30 col6">
                            <p>
                                1、与其它网站不同，我们不牺牲和改变图片质量获取压缩率，并将图像分辨率调整至最佳大小
                            </p>
                            <p>
                                2、压缩前我们将图片备注等与图片显示无关相关信息删除掉
                            </p>
                            <p>
                                3、使用标准zlib提供的数据压缩函式库
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection

