<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/contact', 'PagesController@getContact');
Route::get('/about', 'PagesController@getAbout');
Route::get('/', 'PagesController@getIndex');

Route::resource('posts','PostController');
<<<<<<< HEAD
=======
Route::get('blog/{slug}',['uses' => 'BlogController@getSingle', 'as' => 'blog.single'])->where('slug', '[\w\d\-\_]+');
Route::get('blog',['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
>>>>>>> refs/remotes/origin/master
