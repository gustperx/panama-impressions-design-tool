<?php

Route::prefix('panel')->middleware('admin')->namespace('Panel')->group(function (){

    Route::get('/', 'PanelController@index')->name('panel.home');

    Route::prefix('users')->namespace('Users')->group(function () {

        // Users Admin
        Route::prefix('admin')->middleware(['root'])->group(function () {

            Route::get('/', 'AdminController@index')->name('users.admin.home');

            Route::get('create', 'AdminController@create')->name('users.admin.create');

            Route::post('create', 'AdminController@store')->name('users.admin.create');

            Route::get('show/{user}', 'AdminController@show')->name('users.admin.show');

            Route::get('edit/{user}', 'AdminController@edit')->name('users.admin.edit');

            Route::put('update/{user}', 'AdminController@update')->name('users.admin.update');

            Route::get('recycled', 'AdminController@recycled')->name('users.admin.recycled');

            Route::post('restore', 'AdminController@restore')->name('users.admin.restore');

            Route::delete('destroy', 'AdminController@destroy')->name('users.admin.destroy');

            Route::delete('trash', 'AdminController@trash')->name('users.admin.trash');

            Route::post('banned', 'AdminController@banned')->name('users.admin.banned');

            Route::post('permitted', 'AdminController@permitted')->name('users.admin.permitted');
        });

        // Users Client
        Route::prefix('client')->group(function () {

            Route::get('/', 'ClientController@index')->name('users.client.home');

            Route::get('create', 'ClientController@create')->name('users.client.create');

            Route::post('create', 'ClientController@store')->name('users.client.create');

            Route::get('show/{user}', 'ClientController@show')->name('users.client.show');

            Route::get('edit/{user}', 'ClientController@edit')->name('users.client.edit');

            Route::put('update/{user}', 'ClientController@update')->name('users.client.update');

            Route::get('recycled', 'ClientController@recycled')->name('users.client.recycled');

            Route::post('restore', 'ClientController@restore')->name('users.client.restore');

            Route::delete('destroy', 'ClientController@destroy')->name('users.client.destroy');

            Route::delete('trash', 'ClientController@trash')->name('users.client.trash');

            Route::post('banned', 'ClientController@banned')->name('users.client.banned');

            Route::post('permitted', 'ClientController@permitted')->name('users.client.permitted');
        });
        
    });


    Route::prefix('products')->namespace('Products')->group(function () {

        Route::prefix('store')->group(function () {

            Route::get('/', 'ProductController@index')->name('products.store.home');

            Route::get('create', 'ProductController@create')->name('products.store.create');

            Route::post('create', 'ProductController@store')->name('products.store.create');

            Route::get('show/{product}', 'ProductController@show')->name('products.store.show');

            Route::get('load/{product}', 'ProductController@load')->name('products.store.load');
            
            Route::get('edit/{product}', 'ProductController@edit')->name('products.store.edit');

            Route::put('update/{product}', 'ProductController@update')->name('products.store.update');

            Route::post('publish', 'ProductController@publish')->name('products.store.publish');

            Route::post('draft', 'ProductController@draft')->name('products.store.draft');

            Route::delete('delete', 'ProductController@destroy')->name('products.store.destroy');

        });
        
        
        Route::prefix('views')->group(function () {

            Route::get('{product}', 'ViewController@index')->name('products.view.home');

            Route::get('create/{product}', 'ViewController@create')->name('products.view.create');

            Route::post('create', 'ViewController@store')->name('products.view.store');

            Route::get('show/{productView}', 'ViewController@show')->name('products.view.show');
            
            //Route::get('edit', 'ViewController@edit')->name('products.view.edit');

            //Route::put('update', 'ViewController@update')->name('products.view.update');

            Route::delete('destroy', 'ViewController@destroy')->name('products.view.destroy');
            
        });

        Route::prefix('categories')->group(function () {

            Route::get('/', 'CategoryController@index')->name('products.categories.home');

            Route::get('create', 'CategoryController@create')->name('products.categories.create');

            Route::post('create', 'CategoryController@store')->name('products.categories.create');

            Route::get('edit/{category}', 'CategoryController@edit')->name('products.categories.edit');

            Route::put('update/{category}', 'CategoryController@update')->name('products.categories.update');

            Route::delete('destroy', 'CategoryController@destroy')->name('products.categories.destroy');

        });

    });




});