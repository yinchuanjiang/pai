@extends("layout.main")
@section("content")
    <h3 class="demos-title">曝光社区</h3>
    <div class="weui-panel weui-panel_access">
        <div class="weui-panel__bd">
            <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                <div class="weui-media-box__bd">
                    <div class="avatar">
                        <img class="weui-media-box__thumb" src="./images/avatar.jpg">
                    </div>
                    <div class="title_div">
                        <p>
                            <span class="title_anonymous">匿名曝光</span> |
                            <span class="title_status">已审核</span>
                            <span class="title_cate">乱摆摊点</span>
                        </p>
                        <p class="title_time">曝光时间:2019/5/16 11:21:59</p>
                    </div>
                    <div class="photo-lists">
                        <img src="./images/swiper-1.jpg" alt="">
                        <img src="./images/swiper-2.jpg" alt="">
                        <img src="./images/swiper-3.jpg" alt="">
                    </div>
                    <p class="tips">文盛街文盛街与东大街交口向南路西侧有无照经营游商(卖鱼虾的)(黑毛猪专卖门前)</p>
                </div>
            </a>
        </div>
    </div>
    <style>
        .avatar {
            width: 50px;
            float: left;
            border-radius: 100%;
            overflow: hidden;
        }
        .tips{
            color: #9A9A9A;
            font-size: 12px;
            text-align: left;
            float: left;
            font-weight: 400;
            padding-left: 10px;
        }
        .avatar img {
            width: 100%;
        }

        .title_div {
            width: 80%;
            float: left;
        }

        .title_div p {
            margin-left: 1rem;
        }

        .demos-title {
            background-color: #00cc99;
            margin: 0 auto;
            height: 2rem;
            line-height: 2rem;
            text-align: center;
            color: white;
        }

        .photo-lists {
            width: 80%;
            margin-top: 10px;
            float: left;
        }

        .photo-lists img {
            width: 100%;
        }

        .title_anonymous {
            font-weight: 700;
            color: #696969;
        }

        .title_status {
            font-size: 10px;
            color: red;
        }

        .title_cate {
            color: #696969;
            font-weight: 400;
        }

        .title_time {
            color: #696969;
            font-size: 10px;
        }
    </style>
@endsection