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

//Got to Admin
Route::get('/home/profil/{id}', 'UserController@show')->middleware('auth')->name('profil');

//Posts Routes
Route::get('/home/post/create','PostController@create')->middleware('auth')->name('createpost');
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

//Admin routes routes
Route::get('/home/profil/{id}/posts', 'UserpostController@index')->middleware('auth')->name('userarticles');
Route::get('/home/profil/{id}/my_comments', 'UserController@showmycomments')->middleware('auth')->name('usercomments');
Route::get('/home/profil/{id}/my-articles_comments', 'UserController@showmyarticles_comments')->middleware('auth')->name('userarticles_comments');
Route::get('home/profil/{id}/edit',  'UserController@edit')->middleware('auth')->name('editprofil');
Route::patch('home/profil/{id}/update',  'UserController@update')->middleware('auth')->name('updateprofil');
