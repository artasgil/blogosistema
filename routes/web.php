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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('post')->group(function () {

    Route::get('','PostController@index')->name('post.index')->middleware("auth");
    Route::get('create', 'PostController@create')->name('post.create')->middleware("auth");
    Route::post('store', 'PostController@store')->name('post.store')->middleware("auth");
    Route::get('edit/{post}', 'PostController@edit')->name('post.edit')->middleware("auth");
    Route::post('update/{post}', 'PostController@update')->name('post.update')->middleware("auth");
    Route::post('delete/{post}', 'PostController@destroy')->name('post.destroy')->middleware("auth");
    Route::get('show/{post}', 'PostController@show')->name('post.show')->middleware("auth");
    Route::post('deleteAjax/{post}', 'PostController@destroyAjax')->name('post.destroyAjax')->middleware("auth");

    // Route::post('indexstore', 'ProductController@indexstore')->name('product.indexstore')->middleware("auth");


});

Route::prefix('category')->group(function () {

    Route::get('','CategoryController@index')->name('category.index')->middleware("auth");
    Route::get('create', 'CategoryController@create')->name('category.create')->middleware("auth");
    Route::post('store', 'CategoryController@store')->name('category.store')->middleware("auth");
    Route::get('edit/{category}', 'CategoryController@edit')->name('category.edit')->middleware("auth");
    Route::post('update/{category}', 'CategoryController@update')->name('category.update')->middleware("auth");
    Route::post('delete/{category}', 'CategoryController@destroy')->name('category.destroy')->middleware("auth");
    Route::get('show/{category}', 'CategoryController@show')->name('category.show')->middleware("auth");
    // Route::post('indexstore', 'CategoryController@indexstore')->name('category.indexstore')->middleware("auth");

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
