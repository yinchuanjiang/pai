<?php

namespace App\Http\Controllers;


use App\Models\Enum\PhotoEnum;
use App\Models\Photo;

class HomeController extends Controller
{
    //首页
    public function index()
    {
        dd(Auth::guard('web')->user());
        $photos = Photo::where('status',PhotoEnum::CHECKED_PASS)->with(['user','category','images'])->paginate(10);
        return view('pai.home.index',compact('photos'));
    }
    //关于我们
    public function about()
    {
        return view('pai.home.about');
    }
}
