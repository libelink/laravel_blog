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
Route::get('/home/admin/{id}', 'admin\ProfilController@show')->middleware('auth')->name('admin');

//Posts Routes
Route::get('/home/post/create','PostController@create')->middleware('auth')->name('createpost');
Route::post('/home/post/store','PostController@store')->middleware('auth')->name('store');

Route::get('/home/post/{article}', 'PostController@show')->name('post');

Route::get('/home/post/{article}/edit','PostController@edit')->middleware('auth')->name('editpost');;
Route::put('/home/post/{id}', 'PostController@update')->middleware('auth')->name('Update');

Route::get('/home/post/{id}/delete','PostController@delete')->middleware('auth');
Route::delete('/home/post/{id}', 'PostController@destroy')->middleware('auth')->name('delete');

Route::view('/home/apropos', 'apropos');


//Comments Routes
Route::post('/home/admin/comment/store/{id}', 'admin\CommentController@store')->middleware('auth');
Route::get('/home/admin/comment/{id}/edit', 'admin\CommentController@edit')->name('editcomment');
Route::put('/home/admin/comment/{id}', 'admin\CommentController@update')->middleware('auth');
Route::delete('/home/admin/comment/{id}', 'admin\CommentController@destroy')->middleware('auth');

//Admin routes routes
Route::get('/home/admin/{id}/posts', 'admin\PostController@index')->middleware('auth')->name('userarticles');
Route::get('/home/admin/{id}/my_comments', 'admin\ProfilController@showmycomments')->middleware('auth')->name('usercomments');
Route::get('/home/admin/{id}/my-articles_comments', 'admin\ProfilController@showmyarticles_comments')->middleware('auth')->name('userarticles_comments');
Route::get('home/admin/{id}/edit',  'admin\ProfilController@edit')->middleware('auth')->name('editprofil');
Route::patch('home/admin/{id}/update',  'admin\ProfilController@update')->middleware('auth')->name('updateprofil');
