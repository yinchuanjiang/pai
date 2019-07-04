<?php

namespace App\Http\Controllers;

use App\Models\Category;

class PhotoController extends BaseController
{
    public function index()
    {
        $categories = Category::all();
        return view('pai.photo.index',compact('categories'));
    }
}
