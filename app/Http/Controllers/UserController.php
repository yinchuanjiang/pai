<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('pai.user.expose');
    }
}
