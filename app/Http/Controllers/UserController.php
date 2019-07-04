<?php

namespace App\Http\Controllers;

use App\Models\Enum\ConfigEnum;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    //个人中心页面
    public function index()
    {
        return view('pai.user.index');
    }
    //我的曝光
    public function exposes()
    {
        /** @var User $user */
        $user = Auth::guard('web')->user();
        $status = request('status',-2);
        if($status != -2){
            $alls = Photo::where('user_id',$user->id)->where('status',$status)->with(['user','category','images'])->paginate(10);
        }else{
            $alls = Photo::where('user_id',$user->id)->with(['user','category','images'])->paginate(10);
        }
        return view('pai.user.expose',compact('alls'));
    }
    //关于我们
    public function about()
    {
        $about = ConfigEnum::getValue('COMPANY_ABOUT_US');
        return view('pai.user.about',compact('about'));
    }
}
