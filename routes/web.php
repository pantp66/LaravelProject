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

Route::get('/about', function () {
    return view('about',[
        'articles'=>App\Article::take(3)->latest()->get()
    ]);
});

ROute::get('/article', 'ArticleController@index');
ROute::get('/articles/{article}', 'ArticleController@show')->name('article.show');