<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=yes"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <title>安全隐患随手拍</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- head 中 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/weui/1.1.3/style/weui.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/jquery-weui/1.2.1/css/jquery-weui.min.css">
    <script src="http://res.wx.qq.com/open/js/jweixin-1.4.0.js"></script>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.4.0.js"></script>
    <script>
        wx.config({
            debug: false,
            appId: "{{$signPackage['appid']}}", // 必填，公众号的唯一标识
            timestamp: "{{$signPackage['timestamp']}}", // 必填，生成签名的时间戳
            nonceStr: "{{$signPackage['noncestr']}}", // 必填，生成签名的随机串
            signature: "{{$signPackage['signature']}}", // 必填，签名，见附录1
            jsApiList: [
                'previewImage',
                'hideAllNonBaseMenuItem',
                'showMenuItems',
                'onMenuShareTimeline',
                'onMenuShareAppMessage',
                'chooseWXPay'
            ] // 必填，需要使用的 JS 接口列表，所有JS接口列表见附录2
        })
        wx.ready(() => {
            const share_title = "{{$signPackage['title']}}";
            const share_desc = "{{$signPackage['desc']}}";
            const share_link = "{{$signPackage['url']}}";
            const share_img = "{{$signPackage['img_url']}}";
            wx.showOptionMenu()
            wx.onMenuShareTimeline({
                title: share_title, // 分享标题
                link: share_link, // 分享链接
                imgUrl: share_img, // 分享图标
            })
            wx.onMenuShareAppMessage({
                title: share_title, // 分享标题
                desc: share_desc, // 分享描述
                link: share_link, // 分享链接
                imgUrl: share_img, // 分享图标
            })
        })
    </script>
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        .weui-panel_access {
            margin-bottom: 53px;
        }
        .pages{
            margin-left: 20%;
            width: 90%;
        }
        .pages .pagination li{
            text-align: center;
            list-style: none;
            float: left;
            padding: 5px;
        }
        .content .pages .pagination{
            width: 100%;
            margin: 0 auto;
        }
        .pages .pagination li.active{
            color: red;
        }
    </style>
</head>
<body>
<div class="weui-tab">
    <div>
        <img src="/images/top.jpg" alt="" style="width: 100%">
    </div>
    <div>
        <a href="/photo"><img src="/images/logo1.png" alt="" style="width: 80px;margin: 0 auto;display: block"></a>
    </div>
    <p style="margin: 5px auto;text-align: center">
        <a href="/home" style="margin-right: 5px;font-size: 16px;color: #1F5695;font-weight: 700">曝光台</a>
        <a href="/photo" style="font-size: 16px;color: #1F5695;font-weight: 700">我要曝光</a>
    </p>
    <div style="position: relative">
        <p style="text-align: center;color: red;font-size: 14px;font-weight: 700;position: relative;z-index: 2">
            主办单位：六安市应急管理局
        </p>
        <p style="text-align: center;color: red;font-size: 14px;font-weight: 700;z-index: 2;position: relative">
            曝光平台：六安市应急管理局发布
        </p>
        <img src="/images/logo1.jpg" alt="" style="width: 100%;position: absolute;left: 0;top: 20px;">
    </div>
</div>
</body>
<!-- body 最后 -->
<script src="https://cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/jquery-weui/1.2.1/js/jquery-weui.min.js"></script>
<!-- 如果使用了某些拓展插件还需要额外的JS -->
<script src="https://cdn.bootcss.com/jquery-weui/1.2.1/js/swiper.min.js"></script>
<script src="https://cdn.bootcss.com/jquery-weui/1.2.1/js/city-picker.min.js"></script>
</html>
