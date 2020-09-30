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

//  Route::get('/', function () {
//      return view('pages.master');
// });

//----------------Home----------------------------------------------------------------------------
Route::get('/','HomeController@index');
Route::get('/home','HomeController@index')->name('home');
Route::get('product_details/{id}','HomeController@productDetails')->name('product_details');
//----------------Home----------------------------------------------------------------------------

//----------------login----------------------------------------------------------------------------
Route::get('login','LoginController@index')->name('login');
Route::post('create_account','LoginController@store')->name('create_account');
Route::post('login-customer','LoginController@login')->name('login-customer');
Route::get('logout','LoginController@logout')->name('logout');
//----------------------------------------------------------------------------------------------

//----------------Cart----------------------------------------------------------------------------

Route::get('cart','CartController@viewCart')->name('view_cart');
Route::post('add-to-cart','CartController@addToCart')->name('add-to-cart');
Route::post('update-cart','CartController@updateCart')->name('update-cart');
Route::post('destroy-cart','CartController@deleteItemCart')->name('destroy-cart');
Route::get('destroy-all-cart','CartController@deleteAllCart')->name('destroy-all-cart');
//----------------Cart----------------------------------------------------------------------------

//----------------checkout----------------------------------------------------------------------------
Route::get('checkout','ControllerCheckOut@index')->name('view-checkout');
Route::post('save-checkout','ControllerCheckOut@store')->name('save-checkout');

//----------------checkout----------------------------------------------------------------------------


Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::get('/','LoginController@index')->name('login');
    Route::post('progressLogin','LoginController@progressLogin')->name('progressLogin');
    Route::get('register','RegisterController@index')->name('register');
    Route::post('store','RegisterController@register')->name('store');

    Route::get('logout','LoginController@logout')->name('logout');


  Route::middleware('check_login')->group(function() {
  	Route::get('checkout','ControllerCheckOut@index')->name('checkout');
   //---------------- Admin contron-----------------------------------

  	Route::prefix('user')->name('user.')->group(function() {
  		Route::get('index','UserController@index')->name('index');
  		Route::get('create','UserController@create')->name('create');
		Route::post('store','UserController@store')->name('store');

		Route::get('edit/{id}','UserController@edit')->name('edit');
		Route::post('update/{id}','UserController@update')->name('update');

		Route::get('destroy/{id}','UserController@destroy')->name('destroy');
  	});

	Route::prefix('category')->name('category.')->group(function(){
		Route::get('index','CategoryController@index')->name('index');


		Route::get('create','CategoryController@create')->name('create');
		Route::post('store','CategoryController@store')->name('store');

		Route::get('edit/{id}','CategoryController@edit')->name('edit');
		Route::post('update/{id}','CategoryController@update')->name('update');

		Route::get('destroy/{id}','CategoryController@destroy')->name('destroy');

		Route::post('update_status_untive','CategoryController@updateUntive')->name('update_status_untive');

		Route::post('update_status_active','CategoryController@updateActive')->name('update_status_active');
	});


	Route::prefix('brand')->name('brand.')->group(function(){
		Route::get('index','BrandController@index')->name('index');

		Route::get('create','BrandController@create')->name('create');
		Route::post('store','BrandController@store')->name('store');

		Route::get('edit/{id}','BrandController@edit')->name('edit');
		Route::post('update/{id}','BrandController@update')->name('update');

		Route::get('destroy/{id}','BrandController@destroy')->name('destroy');

		Route::post('update_status_untive','BrandController@updateUntive')->name('update_status_untive');

		Route::post('update_status_active','BrandController@updateActive')->name('update_status_active');
	});


	Route::prefix('slider')->name('slider.')->group(function(){
		Route::get('index','SliderController@index')->name('index');
		Route::get('create','SliderController@create')->name('create');
		Route::post('store','SliderController@store')->name('store');

		Route::get('edit/{id}','SliderController@edit')->name('edit');
		Route::post('update/{id}','SliderController@update')->name('update');

		Route::get('destroy/{id}','SliderController@destroy')->name('destroy');

		Route::post('update_status_untive','SliderController@updateUntive')->name('update_status_untive');

		Route::post('update_status_active','SliderController@updateActive')->name('update_status_active');
	});


	Route::prefix('product')->name('product.')->group(function(){
		Route::get('index','ProductController@index')->name('index');
		Route::get('create','ProductController@create')->name('create');
		Route::post('store','ProductController@store')->name('store');

		Route::get('edit/{id}','ProductController@edit')->name('edit');
		Route::post('update/{id}','ProductController@update')->name('update');

		Route::get('destroy/{id}','ProductController@destroy')->name('destroy');

		Route::post('update_status_untive','ProductController@updateUntive')->name('update_status_untive');

		Route::post('update_status_active','ProductController@updateActive')->name('update_status_active');
	});

	 Route::prefix('orders')->name('orders.')->group(function(){
		Route::get('index','OrderController@index')->name('index');
		Route::get('show/{id}/{shipping_id}','OrderController@show')->name('show');

	});

	 Route::prefix('category_posts')->name('category_posts.')->group(function(){
	 	Route::get('index','CategoryPostController@index')->name('index');
	 	Route::get('create','CategoryPostController@create')->name('create');
		Route::post('store','CategoryPostController@store')->name('store');
		Route::get('edit/{id}','CategoryPostController@edit')->name('edit');
		Route::post('update','CategoryPostController@update')->name('update');
		Route::get('destroy','CategoryPostController@destroy')->name('destroy');
		Route::post('update_status_untive','CategoryPostController@updateUntive')->name('update_status_untive');
		Route::post('update_status_active','CategoryPostController@updateActive')->name('update_status_active');
	 });

 	Route::prefix('post')->name('post.')->group(function(){
	 	Route::get('index','PostController@index')->name('index');
	 	Route::get('create','PostController@create')->name('create');
		Route::post('store','PostController@store')->name('store');
		Route::get('edit/{id}','PostController@edit')->name('edit');
		Route::post('update/{id}','PostController@update')->name('update');
		Route::get('destroy/{id}','PostController@destroy')->name('destroy');
		Route::post('update_status_untive','PostController@updateUntive')->name('update_status_untive');
		Route::post('update_status_active','PostController@updateActive')->name('update_status_active');
	 });



  });
	
});
