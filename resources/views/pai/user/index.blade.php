@extends("layout.main")
@section("content")
    <h3 class="demos-title">个人中心</h3>
    <div class="avatar">
        <div class="center">
            <img src="/images/avatar.jpg" alt="">
        </div>
        <p class="nickname">安小游、</p>
    </div>
    <div class="weui-cells">
        <a class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd">
                <p>我的曝光</p>
            </div>
            <div class="weui-cell__ft">
            </div>
        </a>
        <a class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd">
                <p>关于我们</p>
            </div>
            <div class="weui-cell__ft">
            </div>
        </a>
        <div class="weui-cell">
            <div class="weui-cell__bd">
                <p>联系我们</p>
            </div>
            <div class="weui-cell__ft"><a href="tel:400-0000-688"><i class="fa fa-phone fa-1x"></i> 4008988288282</a></div>
        </div>
    </div>
@endsection
<style>
    .fa-phone{
        color: #00cc99;
    }
    .weui-cell__ft a{
        color: #00cc99;
    }
    .demos-title {
        background-color: #00cc99;
        margin: 0 auto;
        height: 2rem;
        line-height: 2rem;
        text-align: center;
        color: white;
    }
    .avatar{
        margin-top: 1rem;
    }
    .center{
        width: 100px;
        height: 100px;
        margin: 0 auto;
        border-radius: 100px;
        overflow: hidden;
    }
    .center img{
        width: 100%;
    }
    .nickname{
        text-align: center;
        margin-top: .5rem;
    }
</style>