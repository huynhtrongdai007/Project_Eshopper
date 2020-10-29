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
Route::get('/404','HomeController@notFound404')->name('404');
Route::get('/contact-us','HomeController@contactUs')->name('contact-us');
Route::get('product_details/{id}','HomeController@productDetails')->name('product_details');
//----------------Home----------------------------------------------------------------------------
Route::get('/search', 'HomeController@search')->name('search');
//----------------login----------------------------------------------------------------------------
Route::get('login','LoginController@index')->name('login');
Route::post('create_account','LoginController@store')->name('create_account');
Route::post('login-customer','LoginController@login')->name('login-customer');
Route::get('logout','LoginController@logout')->name('logout');
//----------------------------------------------------------------------------------------------
//----------------Shop----------------------------------------------------------------------------
Route::get('shop','HomeController@Viewshop')->name('shop');
Route::get('get_ajax_data', 'HomeController@get_ajax_data');
//----------------Cart----------------------------------------------------------------------------
Route::get('AddCart/{id}','CartController@AddCart');
Route::get('AddCartDetail/{id}','CartController@AddCartDetail')->name('AddCartDetail');
Route::get('/delete-item-cart/{id}','CartController@deleteCart');

Route::get('cart','CartController@viewCart')->name('view_cart');
// Route::post('add-to-cart','CartController@addToCart')->name('add-to-cart');
Route::get('save-list-item-cart/{id}/{quantity}','CartController@SaveListItemCart')->name('save-list-item-cart');

// Route::get('update-cart','CartController@updateCart')->name('update-cart');
// Route::post('destroy-cart','CartController@deleteItemCart')->name('destroy-cart');
Route::get('destroy-all-cart','CartController@deleteAllCart')->name('destroy-all-cart');
//----------------Cart----------------------------------------------------------------------------

//----------------checkout----------------------------------------------------------------------------
Route::get('checkout','ControllerCheckOut@index')->name('view-checkout');
Route::post('save-checkout','ControllerCheckOut@store')->name('save-checkout');

//----------------checkout----------------------------------------------------------------------------
//----------------comment----------------------------------------------------------------------------
Route::post('add-comment','CommentController@store')->name('add-comment');
Route::post('showComment','HomeController@showComment')->name('showComment');
//----------------comment----------------------------------------------------------------------------
//----------------wishlist----------------------------------------------------------------------------
Route::get('wishlist','HomeController@wishlist')->name('wishlist');
Route::post('add-wishlist','HomeController@addWishlist')->name('add-wishlist');
Route::post('check-wishlist','HomeController@checkWishList')->name('check-wishlist');
//----------------wishlist----------------------------------------------------------------------------

Route::post('showReviews','HomeController@showReviews')->name('showReviews');

//----------------post----------------------------------------------------------------------------
Route::get('blog_list','HomeController@blog')->name('blog_list');
Route::get('blog-single/{title}/{id}','HomeController@blogSingle')->name('blog-single');
// reviews
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
	Route::post('add-reviews','ReviewController@store')->name('add-reviews');
	Route::prefix('reviews')->name('reviews.')->group(function() {	
		Route::get('index','ReviewController@index')->name('index');
		Route::get('show','ReviewController@show')->name('show');
		Route::get('destroy/{id}','ReviewController@destroy')->name('destroy');
	});
});




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

	Route::prefix('contact')->name('contact.')->group(function(){
	 	Route::get('index','ContactController@index')->name('index');
	 	Route::post('store','ContactController@store')->name('store');	
	 	Route::get('show/{id}','ContactController@show')->name('show');
		Route::get('destroy/{id}','ContactController@destroy')->name('destroy');

	 });

	Route::prefix('warehouse')->name('warehouse.')->group(function(){

		Route::get('index','WareHouseController@index')->name('index');
		Route::get('importgoods/{id}','WareHouseController@importgoods')->name('importgoods');
		Route::post('storeimportgoods/{id}','WareHouseController@storeimportgoods')->name('storeimportgoods');

	});

  });
	
});
