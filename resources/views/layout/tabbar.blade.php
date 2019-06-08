<div class="weui-tabbar">
    <a href="/home" class="weui-tabbar__item {{Illuminate\Support\Str::contains(Request::getPathInfo(),'/home')?'weui-bar__item--on':''}}">
        <div class="weui-tabbar__icon">
            <i class="fa fa-home fa-4x"></i>
        </div>
        <p class="weui-tabbar__label">首页</p>
    </a>
    <a href="/photo" class="weui-tabbar__item {{Illuminate\Support\Str::contains(Request::getPathInfo(),'/photo')?'weui-bar__item--on':''}}">
        <div class="weui-tabbar__icon">
            <i class="fa fa-image fa-4x"></i>
        </div>
        <p class="weui-tabbar__label">我要曝光</p>
    </a>
    <a href="/user" class="weui-tabbar__item {{Illuminate\Support\Str::contains(Request::getPathInfo(),'/user')?'weui-bar__item--on':''}}">
        <div class="weui-tabbar__icon">
            <i class="fa fa-user fa-4x"></i>
        </div>
        <p class="weui-tabbar__label">个人中心</p>
    </a>
</div>
<style>
    .weui-bar__item--on .weui-tabbar__icon i{
        color: #04BE02;
    }
    .weui-tabbar{
        position: fixed;
        left: 0;
        bottom: 0;
    }
</style>