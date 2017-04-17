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

    Route::post('contact', 'WebController@contact_email')->name('web.contact');

    Route::get('faq', 'WebController@faq')->name('web.faq');

    Route::prefix('blog')->group(function () {

        Route::get('/', 'BlogController@index')->name('web.blog.home');
        
        Route::get('post', 'BlogController@post')->name('web.blog.post');
    });

    Route::prefix('me')->middleware('client')->group(function () {

        Route::get('/', 'UserController@index')->name('web.me.home');

        Route::put('update/{user}', 'UserController@update')->name('web.me.update');

        Route::get('confirmation', 'UserController@confirmation')->name('web.me.confirmation');
    });

    Route::namespace('Shop')->group(function () {

        Route::prefix('products')->group(function () {

            Route::get('/', 'ProductController@index')->name('web.products.home');
        });

        Route::prefix('orders')->middleware('client')->group(function () {

            Route::get('/', 'OrderController@index')->name('web.orders.home');

            Route::get('show/{order}', 'OrderController@show')->name('web.orders.show');
            
            Route::delete('cancel/{order}', 'OrderController@destroy')->name('web.orders.destroy');

        });

        Route::prefix('car')->middleware('client')->group(function () {

            Route::get('/', 'CarController@index')->name('web.car.home');
            
            Route::post('add', 'CarController@add')->name('web.car.add');
            
            Route::post('remove', 'CarController@remove')->name('web.car.remove');
            
            Route::get('designer/{orderDetail}', 'CarController@designer')->name('web.car.designer');
            
            Route::post('designer/{orderDetail}/save', 'CarController@save')->name('web.car.designer.save');

            Route::post('designer/{orderDetail}/load', 'CarController@load')->name('web.car.designer.load');

            Route::post('process/{order}', 'CarController@process')->name('web.car.process');
        });

    });

});