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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});



Route::group(['middleware' => 'auth'], function () {

    Route::resource('/category', 'CategoryController');
    Route::resource('/tag', 'TagController');
    Route::get('/post/trash', 'PostController@trash')->name('post.trash');
    Route::get('/post/{id}/restore', 'PostController@restore')->name('post.restore');
    Route::delete('/post/{id}/delete', 'PostController@delete')->name('post.delete');
    Route::resource('/post', 'PostController');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/user', 'UserController');
});
