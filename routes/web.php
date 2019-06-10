<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//自定义全局函数返回接口数据
if (! function_exists('show')) {
    /**
     * @param $status
     * @param string $msg
     * @param array $data
     * @return array
     */
    function show($status = 200, $msg = '',$data = [])
    {
        return new \Illuminate\Http\JsonResponse(compact('status','msg','data'));
    }
}

Route::get('/auth', 'AuthController@userAuth')->name('login');
Route::get('/auth/user', 'IndexController@authUser')->name('auth.user');

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/about', 'HomeController@about');
    Route::get('/contact', 'HomeController@contact');
    Route::get('/photo', 'PhotoController@index');
    Route::get('/user', 'UserController@index');
    Route::get('/user/expose', 'UserController@exposes');
    Route::get('/user/about', 'UserController@about');
    Route::post('/submit', 'SubmitController@index');
});