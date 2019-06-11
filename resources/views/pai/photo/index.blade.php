@extends("layout.main")
@section("content")
    <h3 class="demos-title">我要曝光</h3>
    <div class="weui-cells weui-cells_form" id="form">
        <div class="weui-cell">
            <div class="weui-cell__bd">
                <div class="weui-uploader">
                    <div class="weui-uploader__hd">
                        <p class="weui-uploader__title" style="color: #00cc99;font-size: 12px;font-weight: 400">
                            *图片上传</p>
                        <div class="weui-uploader__info">0/10</div>
                    </div>
                    <div class="weui-uploader__bd">
                        <ul class="weui-uploader__files" id="uploaderFiles">
                            {{--<li class="weui-uploader__file" style="background-image:url(./images/pic_160.png)"></li>--}}
                        </ul>
                        <div class="weui-uploader__input-box">
                            <input id="uploaderInput" class="weui-uploader__input" type="file" accept="image/*" multiple="">
                        </div>
                    </div>
                    <p class="tips">备注：请使用水印相机上传有时间、地点的曝光图片</p>
                </div>
            </div>
        </div>
        <div class="weui-cell weui-cell_select weui-cell_select-after">
            <div class="weui-cell__hd">
                <label for="" class="weui-label" style="color: #00cc99;font-size: 12px;font-weight: 400">*曝光类别</label>
            </div>
            <div class="weui-cell__bd">
                <select class="weui-select" name="select2" style="color: red;font-size: 12px;font-weight: 400">
                    <option value="" checked>请选择类别</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->cate_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="weui-cells weui-cells_form">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <textarea class="weui-textarea" placeholder="*请输入情况描述" rows="4"></textarea>
                    <div class="weui-textarea-counter"><span class="text-num">0</span>/1000</div>
                </div>
            </div>
            <div class="weui-cell weui-cell_switch">
                <div class="weui-cell__bd" style="color: #00cc99;font-size: 12px;font-weight: 400">匿名提交</div>
                <div class="weui-cell__ft">
                    <input class="weui-switch" type="checkbox">
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd">
                    <label for="" class="weui-label" style="color: #00cc99;font-size: 12px;font-weight: 400">*手机号</label>
                </div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="tel" name="mobile" pattern="[0-9]*" value="" placeholder="请输入手机号">
                </div>
            </div>
        </div>
        <button class="weui-btn" style="width: 60%;background-color: #00cc99;color: white">提交</button>
        <div class="br" style="position: relative;width: 100%;height: 53px;float: left"></div>
    </div>
@endsection
<style>
    textarea::-webkit-input-placeholder {
        color: #00cc99;
        font-size: 12px;
        font-weight: 400;
    }

    .tips {
        color: #9A9A9A;
        font-size: 12px;
        text-align: left;
        float: left;
        font-weight: 400;
        padding-left: 10px;
    }

    .demos-title {
        background-color: #00cc99;
        margin: 0 auto;
        height: 2rem;
        line-height: 2rem;
        text-align: center;
        color: white;
    }

    .weui-cells_form {
        margin-bottom: 53px;
    }

    #form:before {
        border-top: none;
    }

    #form:after {
        border-bottom: none;
    }
</style>
<script src="https://cdn.bootcss.com/jquery/1.12.0/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/axios/0.19.0/axios.min.js"></script>
<script>
    $(function () {
        var img = []; //创建一个空对象用来保存传入的图片
        var is_anonymous = -1;
        var content = '';
        $('#uploaderInput').change(function () {
            var file = this.files;
            if (img.length + file.length > 10) { //判断图片的数量，数量不能超过10张
                $.alert("最多上传10张图片");
                return;
            }
            var AllowImgFileSize = 10 * 1024; //10兆
            for (let i = 0; i < file.length; i++) {
                var curr = file[i].size;
                console.log(curr)
                if (curr > AllowImgFileSize * 1024) { //当图片大于1兆提示
                    $.alert("最多上传10张图片");
                    ("图片文件大小超过限制 请上传小于1M的文件");
                } else {
                    showImg(file[i], $('#uploaderFiles'))
                    img.push(file[i]); //将传入的图片push到空对象中
                }
            }
            $('.weui-uploader__info').html(`${img.length}/10`);
        })
        //匿名提交触发
        $('.weui-cell__ft').click(function () {
            if (is_anonymous == -1) {
                is_anonymous = 1;
            } else {
                is_anonymous = -1;
            }
        })
        //文本输入
        $('.weui-textarea').keyup(function () {
            if (content.length >= 1000) {
                $.alert("情况描述最多1000个字符");
                $(this).val(content);
            }
            content = $(this).val();
            $('.text-num').html(content.length)
        })
        //提交
        $('.weui-btn').click(function () {
            $.showLoading("数据提交中");
            var category = $('.weui-select').val();
            var mobile = $('input[name="mobile"]').val();
            var formdata = new FormData();
            for (var i = 0; i < img.length; i++) {
                formdata.append('files[]', img[i]);
            }
            formdata.append('is_anonymous', is_anonymous);
            formdata.append('content', content);
            formdata.append('category_id', category);
            formdata.append('mobile', mobile);
            axios.post('/submit', formdata).then(res => {
                $.hideLoading();
                if (res.data.status == 200) {
                    $.modal({
                        title: "提示",
                        text: "曝光成功",
                        buttons: [
                            {
                                text: "继续曝光", onClick: function () {
                                    window.location.href = '/photo'
                            }
                            },
                            {
                                text: "我的曝光", onClick: function () {
                                window.location.href = '/user/expose'
                            }
                            },
                        ]
                    });
                } else {
                    $.toast(res.data.msg, "forbidden");
                }
            }).catch(error => {
                $.hideLoading();
                $.each(error.response.data.errors, function (idx, obj) {
                    $.toast(obj[0], "forbidden");
                    return false;
                });
            })
        })
    })
    function showImg(file, ul) {
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function (a) {
            var html = (`<li class="weui-uploader__file" style="overflow: hidden"><img src="${reader.result}" alt="" style="width: 100%"></li>`);
            ul.append(html);
        };
    }
</script>