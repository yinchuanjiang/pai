@extends("layout.main")
@section("content")
    <h3 class="demos-title">我的曝光</h3>
    <div style="position: relative">
        <div class="weui-navbar">
            <a class="weui-navbar__item weui-bar__item--on" href="#tab1">
                全部
            </a>
            <a class="weui-navbar__item" href="#tab2">
                待审核
            </a>
            <a class="weui-navbar__item" href="#tab3">
                审核失败
            </a>
        </div>
        <div class="weui-tab__bd" style="height: 80%">
            <div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active">
                <div class="weui-loadmore weui-loadmore_line">
                    <span class="weui-loadmore__tips">暂无数据</span>
                </div>
                <div class="weui-panel weui-panel_access">
                    <div class="weui-panel__bd">
                        <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                            <div class="weui-media-box__bd">
                                <div class="avatar">
                                    <img class="weui-media-box__thumb" src="/images/avatar.jpg">
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
                                    <img src="/images/swiper-1.jpg" alt="">
                                    <img src="/images/swiper-2.jpg" alt="">
                                    <img src="/images/swiper-3.jpg" alt="">
                                </div>
                                <p class="tips">文盛街文盛街与东大街交口向南路西侧有无照经营游商(卖鱼虾的)(黑毛猪专卖门前)</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div id="tab2" class="weui-tab__bd-item">
                <div class="weui-panel weui-panel_access">
                    <div class="weui-panel__bd">
                        <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                            <div class="weui-media-box__bd">
                                <div class="avatar">
                                    <img class="weui-media-box__thumb" src="/images/avatar.jpg">
                                </div>
                                <div class="title_div">
                                    <p>
                                        <span class="title_anonymous">匿名曝光</span> |
                                        <span class="title_status">等待审核</span>
                                        <span class="title_cate">乱摆摊点</span>
                                    </p>
                                    <p class="title_time">曝光时间:2019/5/16 11:21:59</p>
                                </div>
                                <div class="photo-lists">
                                    <img src="/images/swiper-1.jpg" alt="">
                                    <img src="/images/swiper-2.jpg" alt="">
                                    <img src="/images/swiper-3.jpg" alt="">
                                </div>
                                <p class="tips">文盛街文盛街与东大街交口向南路西侧有无照经营游商(卖鱼虾的)(黑毛猪专卖门前)</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div id="tab3" class="weui-tab__bd-item">
                <div class="weui-panel weui-panel_access">
                    <div class="weui-panel__bd">
                        <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                            <div class="weui-media-box__bd">
                                <div class="avatar">
                                    <img class="weui-media-box__thumb" src="/images/avatar.jpg">
                                </div>
                                <div class="title_div">
                                    <p>
                                        <span class="title_anonymous">匿名曝光</span> |
                                        <span class="title_status">审核不通过</span>
                                        <span class="title_cate">乱摆摊点</span>
                                    </p>
                                    <p class="title_time">曝光时间:2019/5/16 11:21:59</p>
                                </div>
                                <div class="photo-lists">
                                    <img src="/images/swiper-1.jpg" alt="">
                                    <img src="/images/swiper-2.jpg" alt="">
                                    <img src="/images/swiper-3.jpg" alt="">
                                </div>
                                <p class="tips">文盛街文盛街与东大街交口向南路西侧有无照经营游商(卖鱼虾的)(黑毛猪专卖门前)</p>
                                <p class="remark">备注：图片不符合要求</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .demos-title {
        background-color: #00cc99;
        margin: 0 auto;
        height: 2rem;
        line-height: 2rem;
        text-align: center;
        color: white;
    }
    .avatar {
        width: 20%;
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
        width: 70%;
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
    .remark{
        float: left;
        font-size: 12px;
        font-weight: 400;
        color: red;
        text-align: left;
        padding: .3rem;
    }
</style>