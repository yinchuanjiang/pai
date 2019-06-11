<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=yes"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>安全隐患随手拍</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- head 中 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/weui/1.1.3/style/weui.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/jquery-weui/1.2.1/css/jquery-weui.min.css">
    <script src="http://res.wx.qq.com/open/js/jweixin-1.4.0.js"></script>
    <script>

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
        <p style="margin-left: 20px;text-align: left;color: red;font-size: 16px;font-weight: 700;position: relative;z-index: 2">
            主办单位：六安市应急管理局
        </p>
        <p style="margin-left: 20px;text-align: left;color: red;font-size: 16px;font-weight: 700;z-index: 2;position: relative">
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
