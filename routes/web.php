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

// Routes Auth
Auth::routes();

Route::get('confirmation/{token}', 'Auth\RegisterController@getConfirmation')
    ->name('registration.confirmation');


Route::middleware('invited')->namespace('Web')->group(function () {

    Route::get('/', 'WebController@index')->name('web.home');

    Route::get('contact', 'WebController@contact')->name('web.contact');

    Route::get('faq', 'WebController@faq')->name('web.faq');
    
    Route::prefix('products')->group(function () {
        
        Route::get('/', 'ProductController@index')->name('web.products.home');
        
        Route::get('categories', 'ProductController@categories')->name('web.products.categories');
        
        Route::get('single', 'ProductController@single')->name('web.products.single');
    });

    Route::prefix('blog')->group(function () {

        Route::get('/', 'BlogController@index')->name('web.blog.home');
        
        Route::get('post', 'BlogController@post')->name('web.blog.post');
    });

    Route::prefix('me')->middleware('client')->group(function () {

        Route::get('/', 'UserController@index')->name('web.me.home');

        Route::put('update/{user}', 'UserController@update')->name('web.me.update');

        Route::get('confirmation', 'UserController@confirmation')->name('web.me.confirmation');
    });

    Route::prefix('orders')->middleware('client')->group(function () {

        Route::get('/', 'OrderController@index')->name('web.orders.home');

    });

});