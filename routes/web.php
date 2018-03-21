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

Route::get('/', 'Admin\IndexController@show')->name('welcome');

//Route::get('/form', function () {
//	//echo Route::current()->getName();
//	return view('form');
//
//});
/*
//Route::post('/comments', function () {
	echo "<pre>123";
	print_r($_POST);
	echo "</pre>";

});
*/
/*
Route::match(['get','post'], '/comments', function () {
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
});
*/

Route::group(['prefix' => 'admin', 'namespace'=>'Admin','middleware'=>['auth']], function () {

	Route::get('/', 'DashboardController@dashboard')->name('admin.index');

	Route::resource('/category', 'CategoryController', ['as'=>'admin']);

	


});

// Работа с контроллерами

//Route::get('/about', 'firstController@show');
//Route::get('/about/{id?}', 'firstController@show');

Route::get('/articles', ['uses'=>'Admin\CoreResource@getArticles', 'as'=>'articles']);
Route::get('/article/{page}', ['uses'=>'Admin\CoreResource@getArticle', 'middleware' => 'mymiddle', 'as'=>'article']);


// Админка. Маршруты закрытой части.
// Посредник проверок пользователя.

Route::group(['middleware'=>['web']], function(){

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
