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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blogs', 'BlogController@index');

Route::get('/blogs/{blog}', 'CommentController@index');

Auth::routes();

Route::get('/blogs/{blog}/addcomment', 'CommentController@create');

Route::post('/blogs/{blog}/savecomment', 'CommentController@store');

Route::get('/blog/myblogs', 'BlogController@search');

Route::get('/blog/create', 'BlogController@create');

Route::post('/blog/store', 'BlogController@store');

Route::get('/blog/delete/{blog}', 'BlogController@remove');

Route::get('/home', 'HomeController@index')->name('home');
