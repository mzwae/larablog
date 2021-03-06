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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::get('/', 'HomeController@welcome')->name('welcome');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contact', 'ContactController@show')->name('contact');
Route::post('/contact', 'ContactController@store')->name('contact.post');

Route::get('/notify', 'NotifyController@show')->name('notify');
Route::post('/notify', 'NotifyController@store')->name('notify.post');


Route::get('notifications', 'UserNotificationsController@show')->name('notifications.show');


Route::get('/about', function () {

    $article = App\Article::take(3)->latest()->get();

    return view('about', ['articles' => $article]);
})->name('about');

Route::get('articles', 'ArticlesController@index')->name('articles.index');

Route::post('articles', 'ArticlesController@store')->name('articles.post')->middleware('auth');

Route::get('articles/create', 'ArticlesController@create')->name('articles.create')->middleware('auth');

Route::get('articles/{article}', 'ArticlesController@show')->name('articles.show');

Route::get('articles/{article}/edit', 'ArticlesController@edit')->name('articles.edit')->middleware('auth');

Route::delete('articles/{article}', 'ArticlesController@destroy')->name('articles.delete')->middleware('auth');

Route::put('articles/{article}', 'ArticlesController@update')->middleware('auth');

Route::get('articles/{article}/removetag/{tag}', 'ArticlesController@removeTag')->name('articles.removeTag')->middleware('auth');



Route::post('articles/{article}/comment', 'ArticlesController@storeComment')->name('comment.store')->middleware('auth');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('user.logout');