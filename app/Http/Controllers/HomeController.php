<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{
    //首页
    public function index()
    {
        return view('pai.home.index');
    }
    //关于我们
    public function about()
    {
        return view('pai.home.about');
    }
}
