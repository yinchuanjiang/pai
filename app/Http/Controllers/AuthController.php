<?php

namespace App\Http\Controllers;


class AuthController extends Controller
{
    protected $appid = 'wxac93997bb1f50b77';
    protected $secret = '7dc017eedadeb7d841ebb9b1192d4aea';
    //静默授权
    public function auth()
    {
        $id = input('id','');
        $appid = $this->appid;
        $url = route('home');
        $scope = 'snsapi_base';
        $state = $id;
        return $this->redirect("https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$url&response_type=code&scope=$scope&state=$state#wechat_redirect");
    }
    //非静默授权
    public function userAuth()
    {
        $appid = $this->appid;
        $url = route('auth.user');
        $scope = 'snsapi_userinfo';
        $state = '';
        return $this->redirect("https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$url&response_type=code&scope=$scope&state=$state#wechat_redirect");
    }
}
