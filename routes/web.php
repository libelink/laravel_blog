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

//Go to a post for unauth users
Route::get('/home/post/{article}', 'PostController@show')->name('post');

//Home route for login users
Route::get('/home/admin/posts', 'admin\ProfilController@showposts')->name('loggedinHome');

//Login and auth and user routes
Route::get('/login', 'LogController@index')->name('login');
Auth::routes();

//Go to Admin
Route::get('/home/admin/{id}', 'admin\ProfilController@show')->middleware('auth')->name('admin');

//## Route::get('/home/post/create','PostController@create')->middleware('auth')->name('createpost');
//## Route::post('/home/post/store','PostController@store')->middleware('auth')->name('store');
//## Route::get('/home/post/{article}/edit','PostController@edit')->middleware('auth')->name('editpost');;
//## Route::put('/home/post/{id}', 'PostController@update')->middleware('auth')->name('Update');
//## Route::get('/home/post/{id}/delete','PostController@delete')->middleware('auth');
//## Route::delete('/home/post/{id}', 'PostController@destroy')->middleware('auth')->name('delete');

//Go to page "A propos"
Route::view('/home/apropos', 'apropos');

//Admin routes routes
Route::get('/home/admin/{id}/posts', 'admin\PostController@index')->middleware('auth')->name('userarticles');
Route::get('/home/admin/{id}/my_comments', 'admin\ProfilController@showmycomments')->middleware('auth')->name('usercomments');
Route::get('/home/admin/{id}/my-articles_comments', 'admin\ProfilController@showmyarticles_comments')->middleware('auth')->name('userarticles_comments');
Route::get('home/admin/{id}/edit',  'admin\ProfilController@edit')->middleware('auth')->name('editprofil');
Route::patch('home/admin/{id}/update',  'admin\ProfilController@update')->middleware('auth')->name('updateprofil');

//Post CRUD (authentified)
Route::get('/home/admin/post/{post_id}/post', 'admin\PostController@show')->middleware('auth')->name('userarticle');
Route::get('/home/admin/post/create', 'admin\PostController@create')->middleware('auth')->name('createarticle');
Route::post('/home/admin/post/store', 'admin\PostController@store')->middleware('auth')->name('storearticle');
Route::get('/home/admin/post/{post_id}/edit', 'admin\PostController@edit')->middleware('auth')->name('editarticle');
Route::patch('/home/admin/post/{post_id}/update', 'admin\PostController@update')->middleware('auth')->name('updatearticle');
//Route::get('/home/admin/post/{post_id}/delete', 'admin\PostController@delete')->middleware('auth')->name('deletearticle');
Route::delete('/home/admin/post/{post_id}/destroy', 'admin\PostController@destroy')->middleware('auth')->name('destroyarticle');

//Comments Routes (authentified)
Route::get('/home/admin/comment/{post_id}', 'admin\PostController@show')->middleware('auth')->name('showcomment');
Route::get('/home/admin/comment/{post_id}/create', 'admin\PostController@create')->middleware('auth')->name('createcomment');
Route::post('/home/admin/comment/{post_id}/store', 'admin\CommentController@store')->middleware('auth')->name('storecomment');
Route::get('/home/admin/comment/{comment_id}/edit', 'admin\CommentController@edit')->middleware('auth')->name('editcomment');
Route::put('/home/admin/comment/{comment_id}/update', 'admin\CommentController@update')->middleware('auth')->name('updatecomment');;
Route::delete('/home/admin/comment/{comment_id}/delete', 'admin\CommentController@destroy')->middleware('auth')->name('destroycomment');;
//Route::delete('/home/admin/comment/{post_id}/destroy', 'admin\PostController@destroy')->middleware('auth')->name('destroycomment');
