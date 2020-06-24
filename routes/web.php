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

Route::get('/', 'PostsController@show')->name('Posts');

Route::get('/home', 'PostsController@show')->name('Posts');

Auth::routes();

Route::get('/home/login', 'LoginController@index')->name('login');

Route::get('/home/post/{id}', 'PostController@show')->name('Post');

