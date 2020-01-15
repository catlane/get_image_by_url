<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="author" content="yasuotu.com">
	<link rel="stylesheet" type="text/css" href="home/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/home/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="/home/layui/css/layui.css">
	<link rel="stylesheet" type="text/css" href="/home/common/style.css">
	<link rel="stylesheet" type="text/css" href="/home/common/demo.css">
	<link rel="stylesheet" type="text/css" href="/home/webuploader/webuploader.css">
	<link rel="stylesheet" type="text/css" href="/home/common/common.css">
	<link rel="stylesheet" type="text/css" href="https://unpkg.com/ionicons@4.4.8/dist/css/ionicons.min.css">
	<link rel="stylesheet" type="text/css" href="/home/common/styles.css">
	<link rel="stylesheet" type="text/css" href="/home/index/home.css">
	<link rel="stylesheet" type="text/css" href="/home/common/iconfont.css">
	<link href="/home/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="/home/common/navigation.css" rel="stylesheet" type="text/css">
	<script src="/home/common/hm.js"></script>{{--好像是统计代码--}}

	<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="/home/layui/layui.all.js"></script>
	<script type="text/javascript" src="/home/index/home.js"></script>
	<style type="text/css">
	    .toTop {
		    position: fixed;
		    bottom: 10px;
		    right: 10px;
		    top: 600px;
		    z-index: 999;
		    display: none;
		    font-size: 16px;
		    cursor: pointer;
		    overflow: hidden;
		    visibility: visible;
		    background-color: #fff;
		    border: 1px solid #d9d9d9;
		    color: #9c9c9c;
		    width: 48px;
		    height: 38px;
		    line-height: 38px;
		    text-align: center;
		    text-decoration: none;
		    _position: absolute;
	    }

	    .toTop:hover {
		    color: #fff;
		    text-decoration: none;
		    background-color: #999
	    }
        body blockquote{
            font-size: 14px;
        }
	</style>
    <title>@yield('title') -在线图片压缩工具(jpg、png、gif)无损压缩50% </title>
	<meta name="keywords" content="压缩图,图片大小压缩,图片压缩器,照片压缩,压缩图片像素,无损压缩,图片裁剪，图片去水印，图片加白边，修改图片尺寸大小">
	<meta name="description" content="压缩图是在线图片压缩工具，支持GIF压缩、PNG压缩、JPG压缩，还可以在线图片加水印、图片旋转、制作长图拼接、图片改颜色、图片添加文字、图片去底色、证件照换底色、转换格式、图片加边框、制作一寸、两寸证件照等">
	<link href="/home/lightbox2/css/lightbox.css" rel="stylesheet" type="text/css">
</head>

    <body>
        @section('header')
	        <div id="head_title" style="background: #ebf7fe;">
            <div class="container" style="height: 32px;line-height: 32px;font-size: 12px;">
                <a class="fl fsqun" target="_blank" href="https://shang.qq.com/wpa/qunwpa?idkey=49c51489468813896571b7fcbb19d0c1021ac8a028c83cdf4676b5b16158102c"
                   style=" height: 30px;margin-left: 15px;">
                    <i style="color: #1E9FFF;" class="layui-icon">
                        
                    </i>
                    压缩图粉丝群
                </a>
                <div class="fr user-cz ft14" style="color: #7a7a7a;font-size: 12px;margin-right: 15px;">
                    <span id="loginBtn">
                        <a href="https://www.yasuotu.com/auth/wechat">
                            登陆
                        </a>
                        |
                        <a href="https://www.yasuotu.com/register">
                            注册
                        </a>
                    </span>
                </div>
            </div>
        </div>
	        <header class="header mgbt30">
            <div class="container cl pos_pre">
                <div class="fl logo">
                    <a href="https://www.yasuotu.com/">
                        <img src="/home/common/logo.png">
                    </a>
                </div>
                <div class="fl menu ft16">
                    <a href="https://www.yasuotu.com/" class="active">
                        在线压缩图片
                    </a>
                    <a style="position: relative;" href="https://www.yasuotu.com/jingdian">
                        <i class="Hui-iconfont" style="position: absolute;left: 126px;top:-22px;font-size: 30px;color: red;background-image: url(&#39;https://www.yasuotu.com/images/hot.png&#39;);width: 25px;height: 25px;">
                        </i>
                        在线字体生成
                    </a>
                    <a style="position: relative;" href="https://www.yasuotu.com/batch" target="_blank">
                        批量云端压缩
                    </a>
                    <a href="https://www.yasuotu.com/bbs">
                        留言区
                    </a>
                    <a href="https://www.yasuotu.com/price">
                        升级会员
                    </a>
                </div>
                <div class="fr nav" id="nav">
                    <span class="line1">
                    </span>
                    <span class="line2">
                    </span>
                    <span class="line3">
                    </span>
                </div>
                <div class="phone-menu text-c ft15">
                    <p>
                        <a href="https://www.yasuotu.com/" class="active">
                            在线压缩图片
                        </a>
                    </p>
                    <p>
                        <a href="https://www.yasuotu.com/gifcaijian">
                            GIF制作
                        </a>
                    </p>
                    <p>
                        <a href="https://www.yasuotu.com/bbs">
                            留言区
                        </a>
                    </p>
                    <p>
                        <a href="https://www.yasuotu.com/price">
                            升级会员
                        </a>
                    </p>
                </div>
            </div>
        </header>
        @show

        @yield('content')

        @section('footer')
	        <div class="container">
            <div class="link">
                <p>
                    友情链接：&nbsp;
                    <a href="http://www.17ukulele.com/" title="尤克里里谱" target="_blank">
                        尤克里里谱
                    </a>
                    <a href="http://www.kuguapi.com/" title="尤克里里视频教程" target="_blank">
                        尤克里里视频教程
                    </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a style="color: #FFF;" href="http://www.popziti.com/" title="pop字体" target="_blank">
                        美术字
                    </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a style="color: #FFF;" href="http://www.topdodo.com/" title="嘟嘟网" target="_blank">
                        嘟嘟网
                    </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a style="color: #FFF;" href="http://www.meishuzi.cn/" title="美术字" target="_blank">
                        美术字
                    </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </p>
            </div>
        </div>
	        <div id="relation_div" onmouseover="over()" onmouseout="out()">
            <span class="relation_span">
            </span>
            <div class="moddle_box">
                <p>
                    <i class="qq">
                    </i>
                    QQ客服咨询
                </p>
                <p>
                    客服1：
                    <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=631745850&amp;site=qq&amp;menu=yes"
                       target="_blank">
                        <i>
                        </i>
                        631745850
                    </a>
                </p>
                <p>
                    <i class="phone">
                    </i>
                    联系电话
                </p>
                <p>
                    田先生： 17721888895
                </p>
                <p>
                    ( 周一至周六
                    <font color="red">
                        08:30-21:00
                    </font>
                    )
                </p>
            </div>
        </div>
	        <footer class="footer cl">
            <div class="container">
                <div class="fl">
                    <p>
                        请联系客服QQ:
                        <span class="colred">
                            631745850
                        </span>
                        服务热线：177-2188-8895
                    </p>
                </div>
                <div class="fr">
                    <p>
                        Copyright 2016 压缩图 All Rights Reserved.
                    </p>
                    <p>
                        绵阳法蓝玛科技有限公司
                    </p>
                    <p>
                        蜀ICP备16013658号-4
                    </p>
                </div>
            </div>
        </footer>
	        <script>
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
                $('#relation_div').hide();
            } else {
                var $backToTopEle = $('<a href="javascript:void(0)" class="Hui-iconfont toTop" title="返回顶部" alt="返回顶部" style="display:none">&#xe684;返回顶部</a>').appendTo($("body")).click(function() {
                    $("html, body").animate({
                            scrollTop: 0
                        },
                        120);
                });
                $(window).scroll(function() {
                    if ($(window).scrollTop() >= 500) {
                        $('.toTop').fadeIn();
                    } else {
                        $('.toTop').fadeOut();
                    }
                });
            }

            function over() {
                $('.moddle_box').show();
            }

            function out() {
                $('.moddle_box').hide();
            }

            var _hmt = _hmt || []; (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?14bd207265b6106d92d25b27c67b4b64";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();

            //手机端导航样式
            $('.nav').click(function() {
                $(this).toggleClass("clickactive");
                //$(this).siblings().removeClass("clickactive");
                if ($("#nav").attr('class') == "fr nav clickactive") {
                    $('body').append('<div class="mask" id="mask"></div>');
                    $('#mask').css('height', $(window).height());
                    $(".phone-menu").stop().animate({
                            left: "0"
                        },
                        500);
                } else if ($("#nav").attr('class') == "fr nav") {
                    $('#mask').remove();
                    $(".phone-menu").stop().animate({
                            left: "-160px"
                        },
                        500);
                }
                $('#mask').click(function() {
                    $(this).remove();
                    $("#nav").removeClass('clickactive');
                    $(".phone-menu").stop().animate({
                            left: "-160px"
                        },
                        500);
                });
            });
        </script>
	        <a href="javascript:void(0)" class="Hui-iconfont toTop" title="返回顶部" alt="返回顶部"
	           style="display: inline;">
            返回顶部
        </a>
	        <script type="text/javascript" src="/home/lightbox2/js/lightbox.min.js">
        </script>
	        <div id="lightboxOverlay" class="lightboxOverlay" style="display: none;">
        </div>
	        <div id="lightbox" class="lightbox" style="display: none;">
            <div class="lb-outerContainer">
                <div class="lb-container">
                    <img class="lb-image" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                    <div class="lb-nav">
                        <a class="lb-prev" href="https://www.yasuotu.com/">
                        </a>
                        <a class="lb-next" href="https://www.yasuotu.com/">
                        </a>
                    </div>
                    <div class="lb-loader">
                        <a class="lb-cancel">
                        </a>
                    </div>
                </div>
            </div>
            <div class="lb-dataContainer">
                <div class="lb-data">
                    <div class="lb-details">
                        <span class="lb-caption">
                        </span>
                        <span class="lb-number">
                        </span>
                    </div>
                    <div class="lb-closeContainer">
                        <a class="lb-close">
                        </a>
                    </div>
                </div>
            </div>
        </div>
	        <script type="text/javascript" src="/home/bootstrap/js/bootstrap.min.js">
            </script>
	        <script type="text/javascript" src="/home/webuploader/webuploader.js">
            </script>

        @show
    </body>
<script src="/home/common/common.js"></script>
</html>