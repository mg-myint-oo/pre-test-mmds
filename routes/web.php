<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/{home?}', function () {
    return redirect() -> to('articles');
}) -> where('home', 'home');

Auth::routes();

Route::resource('/articles', 'ArticleController');

Route::put('/articles/publish/{id}', 'ArticleController@publish')
        -> name('articles.publish');

Route::resource('/categories', 'CategoryController')
        -> only([
            'create', 'store'
        ]);

Route::resource('/tags', 'TagController')
        -> only([
            'create', 'store'
        ]);

Route::get('/user/profile', 'UserController@profile')
        -> name('user.profile');
