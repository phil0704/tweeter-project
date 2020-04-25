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

Route::get('users', 'HomeController@users')->name('users');
Route::get('user/{id}', 'HomeController@user')->name('user.view');
Route::get('tweets', 'HomeController@posts')->name('tweets');
Route::get('/p/create', 'TweetController@create')->name('profile.create');

Route::resource('tweets', 'TweetController');
Route::resource('comment', 'CommentController');
Route::resource('profile', 'ProfileController');

Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');
Route::post('/p', 'TweetController@store')->name('tweets.store');
Route::post('follow', 'HomeController@follwUserRequest')->name('follow');
Route::post('like', 'HomeController@LikePost')->name('like');
