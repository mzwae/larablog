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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {

    $article = App\Article::take(3)->latest()->get();

    return view('about', ['articles' => $article]);
});



Route::get('articles', 'ArticlesController@index')->name('articles.index');

Route::post('articles', 'ArticlesController@store');

Route::get('articles/create', 'ArticlesController@create');

Route::get('articles/{article}', 'ArticlesController@show')->name('articles.show');

Route::get('articles/{article}/edit', 'ArticlesController@edit')->name('articles.edit');

Route::put('articles/{article}', 'ArticlesController@update');
