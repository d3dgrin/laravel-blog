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


Route::get('/', 'HomeController@index')->name('home');
Route::get('/posts', 'PostController@index');
Route::get('/posts/search', 'PostController@search');
Route::get('/posts/{slug}', 'PostController@show')->name('show.post');
Route::get('/posts/author/{author}', 'PostController@author');

Route::get('/login', 'SessionController@create')->name('login');
Route::post('/login', 'SessionController@store');
Route::post('/logout', 'SessionController@destroy')->name('logout');

Route::prefix('admin')->middleware('auth')->group(function() {

	Route::get('/', 'AdminController@index')->name('admin.panel'); // admin panel

	// Posts
	Route::get('/posts', 'AdminPostController@index')->name('admin.posts'); // Show all posts
	Route::get('/posts/create', 'AdminPostController@create')->name('admin.create.post'); // Show create post form
	Route::post('/posts', 'AdminPostController@store')->name('admin.store.post'); // Add post
	Route::get('/posts/{post}/edit', 'AdminPostController@edit'); // Show edit post form
	Route::patch('/posts/{post}', 'AdminPostController@update'); // Update post
	Route::delete('/posts/{post}', 'AdminPostController@destroy'); // Delete post
	
	Route::middleware('role:admin')->group(function(){

		// Users
		Route::get('/users', 'AdminUsersController@index')->name('admin.users'); // Show all users
		Route::get('/users/create', 'AdminUsersController@create')->name('admin.create.user'); // Show create user form
		Route::post('/users', 'AdminUsersController@store')->name('admin.store.user'); // Add user
		Route::get('/users/{user}/edit', 'AdminUsersController@edit'); // Show edit user form
		Route::patch('/users/{user}', 'AdminUsersController@update'); // Update user
		Route::delete('/users/{user}', 'AdminUsersController@destroy'); // Delete user

	});
	
});
