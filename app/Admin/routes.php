<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    //$router->get('/', 'HomeController@index')->name('admin.home');
    $router->get('/',function (){
        redirect('/admin/banners');
    });
    $router->resource('category', CategoryController::class);
    $router->resource('photos', PhotoController::class);
    $router->get('/photos/check/{photo}/{status}', 'PhotoController@check')->name('admin.photo.check');
    $router->resource('users', UserController::class);
    $router->resource('configs', ConfigController::class);
});
