<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Enum\ConfigEnum;
use App\Models\Enum\PhotoEnum;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
        $alls = Photo::where('user_id',$user->id)->with(['user','category','images'])->paginate(1);
        $passes = Photo::where('user_id',$user->id)->where('status',PhotoEnum::CHECKING)->with(['user','category','images'])->paginate(1,['*'],'ppage');
        $refuses = Photo::where('user_id',$user->id)->where('status',PhotoEnum::CHECKED_REFUSE)->with(['user','category','images'])->paginate(1,['*'],'rpage');
        return view('pai.user.expose',compact('alls','passes','refuses'));
    }
    //关于我们
    public function about()
    {
        $about = ConfigEnum::getValue('COMPANY_ABOUT_US');
        return view('pai.user.about',compact('about'));
    }
}
