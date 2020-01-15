@extends('home.yasuo')
@section('title', '猫巷压缩')



@section('small_content')
	<div class="ys-gn-nr mgbt30">
                    <div id="yasuoType" style="">
                        <form id="formid" class="layui-form" action="https://www.yasuotu.com/fileupload/compression"
                              method="post">
                            <input type="hidden" name="_token" value="693182wtOhzOzkGyCJGtGqGk1AqmbIYtjuK65IGj">
                            <div id="imageurl">
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-inline">
                                    <label class="layui-form-label">
                                        选择尺寸
                                    </label>
                                    <div class="layui-input-inline cc-style-first">
                                        <select name="presetWH" lay-filter="presetWH">
                                            <option value="|">
                                                保持原始尺寸
                                            </option>
                                            <option value="1024|">
                                                适合电脑尺寸
                                            </option>
                                            <option value="480|">
                                                适合手机尺寸
                                            </option>
                                            <option value="200|">
                                                适合微信表情尺寸（大）
                                            </option>
                                            <option value="140|">
                                                适合微信表情尺寸（小）
                                            </option>
                                            <option value="295|413">
                                                证件 1 寸照
                                            </option>
                                            <option value="413|626">
                                                证件 2 寸照
                                            </option>
                                            <option value="set">
                                                自定义
                                            </option>
                                        </select>
                                        <div class="layui-unselect layui-form-select">
                                            <div class="layui-select-title">
                                                <input type="text" placeholder="请选择" value="保持原始尺寸" readonly="" class="layui-input layui-unselect">
                                                <i class="layui-edge">
                                                </i>
                                            </div>
                                            <dl class="layui-anim layui-anim-upbit">
                                                <dd lay-value="|" class="layui-this">
                                                    保持原始尺寸
                                                </dd>
                                                <dd lay-value="1024|" class="">
                                                    适合电脑尺寸
                                                </dd>
                                                <dd lay-value="480|" class="">
                                                    适合手机尺寸
                                                </dd>
                                                <dd lay-value="200|" class="">
                                                    适合微信表情尺寸（大）
                                                </dd>
                                                <dd lay-value="140|" class="">
                                                    适合微信表情尺寸（小）
                                                </dd>
                                                <dd lay-value="295|413" class="">
                                                    证件 1 寸照
                                                </dd>
                                                <dd lay-value="413|626" class="">
                                                    证件 2 寸照
                                                </dd>
                                                <dd lay-value="set" class="">
                                                    自定义
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <label class="layui-form-label">
                                        宽(像素)
                                    </label>
                                    <div class="layui-input-inline cc-style-other">
                                        <input type="text" name="ysW" placeholder="原比例" id="width" value="" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <label class="layui-form-label">
                                        高(像素)
                                    </label>
                                    <div class="layui-input-inline cc-style-other">
                                        <input type="text" name="ysH" placeholder="原比例" id="height" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <label class="layui-form-label">
                                        压缩等级
                                    </label>
                                    <div id="level" class="layui-input-inline cc-style-other">
                                        <select id="quality" name="q" lay-filter="q">
                                            <option value="98">
                                                98
                                            </option>
                                            <option value="96">
                                                96
                                            </option>
                                            <option value="94">
                                                94
                                            </option>
                                            <option value="92">
                                                92
                                            </option>
                                            <option value="90">
                                                90
                                            </option>
                                            <option value="88">
                                                88
                                            </option>
                                            <option value="86">
                                                86
                                            </option>
                                            <option value="84">
                                                84
                                            </option>
                                            <option value="82">
                                                82
                                            </option>
                                            <option value="80">
                                                80
                                            </option>
                                            <option value="78">
                                                78
                                            </option>
                                            <option value="76">
                                                76
                                            </option>
                                            <option value="74">
                                                74
                                            </option>
                                            <option value="72">
                                                72
                                            </option>
                                            <option selected="" value="70">
                                                70 （推荐等级）
                                            </option>
                                            <option value="68">
                                                68
                                            </option>
                                            <option value="66">
                                                66
                                            </option>
                                            <option value="64">
                                                64
                                            </option>
                                            <option value="62">
                                                62
                                            </option>
                                            <option value="60">
                                                60
                                            </option>
                                            <option value="58">
                                                58
                                            </option>
                                            <option value="56">
                                                56
                                            </option>
                                            <option value="54">
                                                54
                                            </option>
                                            <option value="52">
                                                52
                                            </option>
                                            <option value="50">
                                                50
                                            </option>
                                            <option value="48">
                                                48
                                            </option>
                                            <option value="46">
                                                46
                                            </option>
                                            <option value="44">
                                                44
                                            </option>
                                            <option value="42">
                                                42
                                            </option>
                                            <option value="40">
                                                40
                                            </option>
                                            <option value="38">
                                                38
                                            </option>
                                            <option value="36">
                                                36
                                            </option>
                                            <option value="34">
                                                34
                                            </option>
                                            <option value="32">
                                                32
                                            </option>
                                            <option value="30">
                                                30
                                            </option>
                                        </select>
                                        <div class="layui-unselect layui-form-select">
                                            <div class="layui-select-title">
                                                <input type="text" placeholder="请选择" value="70 （推荐等级）" readonly="" class="layui-input layui-unselect">
                                                <i class="layui-edge">
                                                </i>
                                            </div>
                                            <dl class="layui-anim layui-anim-upbit">
                                                <dd lay-value="98" class="">
                                                    98
                                                </dd>
                                                <dd lay-value="96" class="">
                                                    96
                                                </dd>
                                                <dd lay-value="94" class="">
                                                    94
                                                </dd>
                                                <dd lay-value="92" class="">
                                                    92
                                                </dd>
                                                <dd lay-value="90" class="">
                                                    90
                                                </dd>
                                                <dd lay-value="88" class="">
                                                    88
                                                </dd>
                                                <dd lay-value="86" class="">
                                                    86
                                                </dd>
                                                <dd lay-value="84" class="">
                                                    84
                                                </dd>
                                                <dd lay-value="82" class="">
                                                    82
                                                </dd>
                                                <dd lay-value="80" class="">
                                                    80
                                                </dd>
                                                <dd lay-value="78" class="">
                                                    78
                                                </dd>
                                                <dd lay-value="76" class="">
                                                    76
                                                </dd>
                                                <dd lay-value="74" class="">
                                                    74
                                                </dd>
                                                <dd lay-value="72" class="">
                                                    72
                                                </dd>
                                                <dd lay-value="70" class="layui-this">
                                                    70 （推荐等级）
                                                </dd>
                                                <dd lay-value="68" class="">
                                                    68
                                                </dd>
                                                <dd lay-value="66" class="">
                                                    66
                                                </dd>
                                                <dd lay-value="64" class="">
                                                    64
                                                </dd>
                                                <dd lay-value="62" class="">
                                                    62
                                                </dd>
                                                <dd lay-value="60" class="">
                                                    60
                                                </dd>
                                                <dd lay-value="58" class="">
                                                    58
                                                </dd>
                                                <dd lay-value="56" class="">
                                                    56
                                                </dd>
                                                <dd lay-value="54" class="">
                                                    54
                                                </dd>
                                                <dd lay-value="52" class="">
                                                    52
                                                </dd>
                                                <dd lay-value="50" class="">
                                                    50
                                                </dd>
                                                <dd lay-value="48" class="">
                                                    48
                                                </dd>
                                                <dd lay-value="46" class="">
                                                    46
                                                </dd>
                                                <dd lay-value="44" class="">
                                                    44
                                                </dd>
                                                <dd lay-value="42" class="">
                                                    42
                                                </dd>
                                                <dd lay-value="40" class="">
                                                    40
                                                </dd>
                                                <dd lay-value="38" class="">
                                                    38
                                                </dd>
                                                <dd lay-value="36" class="">
                                                    36
                                                </dd>
                                                <dd lay-value="34" class="">
                                                    34
                                                </dd>
                                                <dd lay-value="32" class="">
                                                    32
                                                </dd>
                                                <dd lay-value="30" class="">
                                                    30
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <button type="button" disabled="" style="background-color: #7a7a7a" class="layui-btn yasuoBtn layui-btn-normal layui-btn-radius">
                                        开始压缩
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="uploader" class="wu-example">
                        <blockquote class="layui-elem-quote">
                            温馨提示：1.Gif可支持
                            <a style="color: #00a7d0;" href="https://www.yasuotu.com/gif">
                                帧数抽取
                            </a>
                            ,抽取后可压缩的更小。
                            <a style="color: #00a7d0;" href="https://www.yasuotu.com/gif">
                                点击抽取
                            </a>
                            2.会员单张图片最大支持50M。
                        </blockquote>
                        <div class="queueList">
                            <div id="dndArea" class="placeholder">
                                <div class="mgbt20">
                                    <img src="./压缩图 -在线图片压缩工具(jpg、png、gif)无损压缩50%_files/jpg.png">
                                    <img src="./压缩图 -在线图片压缩工具(jpg、png、gif)无损压缩50%_files/png.png">
                                    <img src="./压缩图 -在线图片压缩工具(jpg、png、gif)无损压缩50%_files/gif.png">
                                </div>
                                <div id="filePicker" class="webuploader-container">
                                    <div class="webuploader-pick">
                                        点击选择图片
                                    </div>
                                    <div id="rt_rt_1ctf9cmb86r0lu3192815fepbq1" style="position: absolute; top: 0px; left: 466px; width: 168px; height: 44px; overflow: hidden; bottom: auto; right: auto;">
                                        <input type="file" name="file" class="webuploader-element-invisible" multiple="multiple"
                                               accept="image/*">
                                        <label style="opacity: 0; width: 100%; height: 100%; display: block; cursor: pointer; background: rgb(255, 255, 255);">
                                        </label>
                                    </div>
                                </div>
                                <p>
                                    或将照片拖到这里
                                </p>
                            </div>
                            <div id="loading" style="width: 100px;height: 160px; text-align: center; background-color: #9A5353; border-radius:8px;margin-left: 500px;display: none;">
                                <img style="border-radius:8px;;" width="100" src="./压缩图 -在线图片压缩工具(jpg、png、gif)无损压缩50%_files/In_the_compression.gif">
                                <p style="background-color:#9A5353;color: #FAB1B4; border-radius:8px;font-size: 14px;">
                                    正在压缩...
                                </p>
                            </div>
                            <ul class="filelist">
                            </ul>
                        </div>
                        <div class="statusBar" style="display:none">
                            <div class="info">
                                共 0 张（0B），
                                <span id="msg_info">
                                    已上传
                                </span>
                                0 张
                                <span class="yasuoTip" style="color: #4EA0E6; margin-left: 15px;">
                                </span>
                                <p>
                                </p>
                            </div>
                            <div class="btns">
                                <div style="display: none;" class="resetBtn  state-pedding">
                                    重新上传
                                </div>
                                <div class="btn_upload">
                                    <div id="filePicker2" class="webuploader-container">
                                        <div class="webuploader-pick">
                                            继续添加
                                        </div>
                                        <div id="rt_rt_1ctf9cmbb1toc2sdpjqjlsni76" style="position: absolute; top: 0px; left: 0px; width: 1px; height: 1px; overflow: hidden;">
                                            <input type="file" name="file" class="webuploader-element-invisible" multiple="multiple"
                                                   accept="image/*">
                                            <label style="opacity: 0; width: 100%; height: 100%; display: block; cursor: pointer; background: rgb(255, 255, 255);">
                                            </label>
                                        </div>
                                    </div>
                                    <div id="uploadBtn" class="uploadBtn state-pedding">
                                        开始上传
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection