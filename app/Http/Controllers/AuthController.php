<?php

namespace App\Http\Controllers;


class AuthController extends Controller
{
    //静默授权
    public function auth()
    {
        $id = input('id','');
        $appid = config('app.wx_appid');
        $url = route('home');
        $scope = 'snsapi_base';
        $state = $id;
        return redirect("https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$url&response_type=code&scope=$scope&state=$state#wechat_redirect");
    }
    //非静默授权
    public function userAuth()
    {
        $appid = config('app.wx_appid');
        $url = route('auth.user');
        $scope = 'snsapi_userinfo';
        $state = '';
        return redirect("https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$url&response_type=code&scope=$scope&state=$state#wechat_redirect");
    }
}
