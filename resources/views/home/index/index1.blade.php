<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>
            这是简略的
        </title>
        <script src="/home/layui/layui.all.js">
        </script>
        <link rel="stylesheet" href="/home/layui/css/layui.css">
    </head>

    <body>
        <form class="layui-form" action="/url_get_img" method="post" style="margin-top: 100px;">
	         @csrf
	        <div class="layui-form-item">
                <label class="layui-form-label">
                    输入框
                </label>
                <div class="layui-input-block">
                    <input value="https://www.lovyou.top/post/146.html" type="text" name="article_url" required lay-verify="required|url" placeholder="请输入文章地址，将会自动采集图片"
                           autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">
                        立即提交
                    </button>
                    <button type="reset" class="layui-btn layui-btn-primary">
                        重置
                    </button>
                </div>
            </div>
        </form>
        <script>
            //Demo
            layui.use ( 'form' ,
                function () {
                    var form = layui.form;

                    //监听提交
                    form.on ( 'submit(formDemo)' ,
                        function ( data ) {
                            // layer.msg ( JSON.stringify ( data.field ) );
                            //然后提交数据
                        } );
                } );
        </script>
    </body>

</html>