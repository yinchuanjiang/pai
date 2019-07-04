<?php

namespace App\Http\Controllers;


use App\Models\Enum\PhotoEnum;
use App\Models\Photo;

class HomeController extends BaseController
{
    //首页
    public function index()
    {
        $photos = Photo::where('status', PhotoEnum::CHECKED_PASS)->with(['user', 'category', 'images'])->paginate(15);
        return view('pai.home.index', compact('photos'));
    }

    //关于我们
    public function began()
    {
        return view('pai.home.began', ['signPackage' => $this->signPackage]);
    }
}
