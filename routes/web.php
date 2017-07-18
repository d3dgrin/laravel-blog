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


Route::get('/', 'PostController@index')->name('home');
Route::get('/posts/{post}', 'PostController@show')->name('show.post');

//Auth::routes();

Route::get('/login', 'SessionController@create')->name('login');
Route::post('/login', 'SessionController@store');
Route::post('/logout', 'SessionController@destroy')->name('logout');

Route::prefix('admin')->middleware('auth')->group(function() {

	Route::get('/', 'AdminController@index')->name('admin.panel'); // admin panel

	Route::get('/posts', 'AdminPostController@index')->name('admin.posts'); // Show all posts
	Route::get('/posts/create', 'AdminPostController@create')->name('admin.create.post'); // Show create form post
	Route::post('/posts', 'AdminPostController@store')->name('admin.store.post'); // Add post
	Route::get('/posts/{post}/edit', 'AdminPostController@edit'); // Show edit form post
	Route::patch('/posts/{post}', 'AdminPostController@update'); // Update post
	Route::delete('/posts/{post}', 'AdminPostController@destroy'); // Delete post

});
