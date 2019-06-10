<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public function __construct()
    {
        $signPackage = $this->getSignPackage();
        view()->composer('layout.main',function ($view) use ($signPackage){
            $view->with('signPackage',$signPackage);
        });
        Auth::guard('web')->loginUsingId(2);
    }


    /**
     * 初始化方法 判断是否登录 未登录跳转到登录页
     */

    private function getSignPackage()
    {
        $jsapiTicket = $this->getJsApiTicket();


        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

        // 注意 URL 一定要动态获取，不能 hardcode.
        $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


        $timestamp = time();
        $nonceStr = $this->createNonceStr();

        // 这里参数的顺序要按照 key 值 ASCII 码升序排序
        $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";

        $signature = sha1($string);

        $signPackage = array(
            "appid" => config('app.wx_appid'),
            "noncestr" => $nonceStr,
            "timestamp" => $timestamp,
            "url" => "$protocol$_SERVER[HTTP_HOST]"."/auth",
            'img_url' => "$protocol$_SERVER[HTTP_HOST]"."/images/logo1.png",
            "signature" => $signature,
            "rawString" => $string,
            "title" => '文明六安',
            "desc" => '描述文案'
        );
        return $signPackage;
    }

    private function getJsApiTicket()
    {
        $accessToken = \GuzzleHttp\json_decode(file_get_contents('https://lets.gaojb.com/h5/token/token'),true);
        $accessToken = $accessToken['data']['access_token'];
        // 如果是企业号用以下 URL 获取 ticket
        //$url = "https://qyapi.weixin.qq.com/cgi-bin/get_jsapi_ticket?access_token=$accessToken";
        $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
        $res = json_decode($this->httpGet($url));
        $ticket = $res->ticket;
        return $ticket;
    }

    private function httpGet($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 500);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_URL, $url);

        $res = curl_exec($curl);
        curl_close($curl);

        return $res;
    }

    private function createNonceStr($length = 16)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }
}
