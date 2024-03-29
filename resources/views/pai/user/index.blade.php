@extends("layout.main")
@section("content")
    <h3 class="demos-title">个人中心</h3>
    <div class="avatar">
        <div class="center">
            <img src="{{auth()->user()->avatar}}" alt="">
        </div>
        <p class="nickname">{{auth()->user()->nickname}}</p>
    </div>
    <div class="weui-cells">
        <a class="weui-cell weui-cell_access" href="/user/expose">
            <div class="weui-cell__bd">
                <p>我的曝光</p>
            </div>
            <div class="weui-cell__ft">
            </div>
        </a>
        <a class="weui-cell weui-cell_access" href="/user/about">
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
            <div class="weui-cell__ft"><a href="tel:{{\App\Models\Enum\ConfigEnum::getValue('COMPANY_TEL')}}"><i class="fa fa-phone fa-1x"></i>{{\App\Models\Enum\ConfigEnum::getValue('COMPANY_TEL')}}</a></div>
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