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

// Route::get('/', function () {
//     return view('pages.master');
// });

// //home

Route::get('/','HomeController@index')->name('home');

// login
// admin

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){

    Route::get('/','LoginController@index')->name('login');
    Route::post('progressLogin','LoginController@progressLogin')->name('progressLogin');
    Route::get('register','RegisterController@index')->name('register');
    Route::post('store','RegisterController@register')->name('store');
  
	Route::prefix('category')->name('category.')->group(function(){
		Route::get('index','CategoryController@index')->name('index');

		Route::get('create','CategoryController@create')->name('create');
		Route::post('store','CategoryController@store')->name('store');

		Route::get('edit/{id}','CategoryController@edit')->name('edit');
		Route::post('update/{id}','CategoryController@update')->name('update');

		Route::get('destroy/{id}','CategoryController@destroy')->name('destroy');
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

	 
});
