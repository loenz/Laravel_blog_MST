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

//Route::get('/', ['as' => 'home', 'middleware'=>'auth', 'uses'=>'Admin\IndexController@show']);

Route::get('/', 'Admin\IndexController@show')->name('welcome');

// Route::get('/article/{id}', ['as'=>'article', function ($id) {	echo $id; }]);

Route::get('/page/{param?}/{id?}', function ($param = null, $id = null) {

	return 'Вы на странице: ' . $param;

})->where(['param' => '[0-9]+', 'id' => '[A-Za-z]+']);


Route::get('/form', function () {
	//echo Route::current()->getName();
	return view('form');

});

Route::post('/comments', function () {
	echo "<pre>123";
	print_r($_POST);
	echo "</pre>";

});

/*
Route::match(['get','post'], '/comments', function () {
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
});
*/

Route::group(['prefix' => 'admin', 'namespace'=>'Admin','middleware'=>['auth']], function () {

	Route::get('/', 'DashboardController@dashboard')->name('admin.index');

	// List pages. RESTful !
	Route::resource('/category', 'CategoryController', ['as'=>'admin']);

	Route::get('/create/{var?}/{id?}', function ($id = 5, $var = null) {
		//return redirect()->route('article', array('id'=>25));

		print_r (Route::current()->parameters());
		return 'Вы на странице: ' . $id;

	});

	Route::get('/edit', function () {
		echo 'page/edit';
	});

	Route::get('/delete', function () {
		echo 'page/delete';
	});

});

// Работа с контроллерами

//Route::get('/about', 'firstController@show');
Route::get('/about/{id?}', 'firstController@show');

Route::get('/articles', ['uses'=>'Admin\CoreResource@getArticles', 'as'=>'articles']);
Route::get('/article/{page}', ['uses'=>'Admin\CoreResource@getArticle', 'middleware' => 'mymiddle', 'as'=>'article']);


// Админка. Маршруты закрытой части.
// Посредник проверок пользователя.

Route::group(['middleware'=>['web']], function(){

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
