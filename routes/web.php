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
Route::get('/p/create', 'TweetController@create')->name('profile.create');
Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show');
Route::get('/edit/{user}', 'EditController@index')->name('user.edit');
Route::get('post/like/{id}', ['as' => 'post.like', 'uses' => 'LikeController@likePost']);
Route::get('comment/like/{id}', ['as' => 'comment.like', 'uses' => 'LikeController@likeComment']);


Route::resource('tweets', 'TweetController');
Route::resource('comment', 'CommentController');

Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');
Route::post('/p', 'TweetController@store')->name('tweets.store');
