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

// Вывод новостей на сайте

Route::get('/blog/category/{slug?}', 'BlogController@category')->name('category');
Route::get('/blog/article/{slug?}', 'BlogController@article')->name('article');

// Админка

Route::group(['prefix' => 'admin', 'namespace'=>'Admin','middleware'=>['auth','Admin']], function () {

	Route::get('/', 'DashboardController@dashboard')->name('admin.index');

	Route::resource('/category', 'CategoryController', ['as'=>'admin']);

	Route::resource('/article', 'ArticleController', ['as'=>'admin']);

	Route::group(['prefix' => 'user_managment', 'namespace' => 'UserManagment'], function () {
		Route::resource('/user', 'UserController', ['as' => 'admin.user_managment']);
	});

});

Route::get('/', function () {
	return view('blog.home');
});

Route::group(['middleware' => ['auth']], function () {

	Route::post('/comments/create', 'CommentsController@create')->name('comments.create');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
