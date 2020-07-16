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

//Basic redirections
Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home/login', function () {
    return redirect('/login');
});

Route::get('/home/register', function () {
    return redirect('/register');
});


//Home route
Route::get('/home', 'PostsController@show')->name('home');

//Login and auth and user routes
Route::get('/login', 'LogController@index')->name('login');
Auth::routes();

//Profile
Route::get('/home/profile/{id}', 'UserController@show')->middleware('auth');

//Posts Routes
Route::get('/home/post/create','PostController@create')->name('createpost');;
Route::post('/home/post/store','PostController@store')->name('store');

Route::get('/home/post/{id}', 'PostController@show')->name('post');

Route::get('/home/post/{id}/edit','PostController@edit')->name('editpost');;
Route::put('/home/post/{id}', 'PostController@update')->name('Update');

Route::get('/home/post/{id}/delete','PostController@delete');
Route::delete('/home/post/{id}', 'PostController@destroy')->name('delete');

//Comments Routes
Route::post('/home/comment/store/{id}', 'CommentController@store');
Route::get('/home/comment/{id}/edit', 'CommentController@edit')->name('editcomment');
Route::put('/home/comment/{id}', 'CommentController@update');
Route::delete('/home/comment/{id}', 'CommentController@destroy');


