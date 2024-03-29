<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends BaseController
{

    //首页
    public function index()
    {
        $appid = config('app.wx_appid');
        $secret = config('app.wx_secret');
        $code = request('code');
        $data = json_decode(file_get_contents("https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code"), true);
        if (!isset($data['openid']))
            abort(404);
        $openid = $data['openid'];
        $this->saveUser($openid);
        return redirect(route('home'));
    }

    private function saveUser($openid, $avatar, $nickname)
    {
        $user = User::where('openid', $openid)->first();
        if (!$user) {
            $user = new User();
            $user->openid = $openid;
            $user->avatar = $avatar;
            $user->nickname = $nickname;
            $user->save();
        }
        Auth::guard('web')->login($user);
    }

    //保存用户信息
    public function authUser()
    {
        $appid = config('app.wx_appid');
        $secret = config('app.wx_secret');
        $code = request('code');
        $data = json_decode(file_get_contents("https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code"), true);
        if (!isset($data['openid']) || !isset($data['access_token']))
            abort(404);
        $openid = $data['openid'];
        $access_token = $data['access_token'];
        $info = json_decode(file_get_contents("https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN "), true);
        if (!isset($info['openid']) || !isset($info['headimgurl']) || !isset($info['nickname']))
            abort(404);
        $this->saveUser($openid, $info['headimgurl'], $info['nickname']);
        return redirect(route('began'));
    }
}
