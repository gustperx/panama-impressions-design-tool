<?php

Route::prefix('panel')->middleware('admin')->namespace('Panel')->group(function (){

    Route::get('/', 'PanelController@index')->name('panel.home');


    Route::prefix('config')->namespace('Config')->group(function () {

        Route::prefix('basic')->namespace('Basic')->group(function () {

            Route::get('/', 'BasicController@index')->name('config.basic.home');

            Route::put('update/{config}', 'BasicController@update')->name('config.basic.update');

        });

        Route::prefix('general')->namespace('General')->group(function () {

            Route::get('/', 'GeneralController@index')->name('config.general.home');

            Route::put('update/{general}', 'GeneralController@update')->name('config.general.update');

        });
        
        Route::prefix('banks')->namespace('Banks')->group(function () {

            Route::get('/', 'BankController@index')->name('config.bank.home');

            Route::get('create', 'BankController@create')->name('config.bank.create');

            Route::post('create', 'BankController@store')->name('config.bank.create');

            Route::get('edit/{bank}', 'BankController@edit')->name('config.bank.edit');

            Route::put('update/{bank}', 'BankController@update')->name('config.bank.update');

            Route::delete('destroy', 'BankController@destroy')->name('config.bank.destroy');
        });

        Route::prefix('faq')->namespace('Faq')->group(function () {

            Route::get('/', 'FaqController@index')->name('config.faq.home');

            Route::get('create', 'FaqController@create')->name('config.faq.create');

            Route::post('create', 'FaqController@store')->name('config.faq.create');

            Route::get('edit/{faq}', 'FaqController@edit')->name('config.faq.edit');

            Route::put('update/{faq}', 'FaqController@update')->name('config.faq.update');

            Route::delete('destroy', 'FaqController@destroy')->name('config.faq.destroy');
        });

        Route::prefix('measure')->namespace('Measure')->group(function () {

            Route::get('/', 'MeasureController@index')->name('config.measure.home');

            Route::get('create', 'MeasureController@create')->name('config.measure.create');

            Route::post('create', 'MeasureController@store')->name('config.measure.create');

            Route::get('edit/{measure}', 'MeasureController@edit')->name('config.measure.edit');

            Route::put('update/{measure}', 'MeasureController@update')->name('config.measure.update');

            Route::delete('destroy', 'MeasureController@destroy')->name('config.measure.destroy');
        });

        Route::prefix('method')->namespace('Method')->group(function () {

            Route::get('/', 'MethodController@index')->name('config.method.home');

            Route::get('create', 'MethodController@create')->name('config.method.create');

            Route::post('create', 'MethodController@store')->name('config.method.create');

            //Route::get('edit/{method}', 'MethodController@edit')->name('config.method.edit');

            //Route::put('update/{method}', 'MethodController@update')->name('config.method.update');

            Route::post('publish', 'MethodController@publish')->name('config.method.publish');

            Route::post('draft', 'MethodController@draft')->name('config.method.draft');
            
            Route::delete('destroy', 'MethodController@destroy')->name('config.method.destroy');
        });

    });


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
        
        Route::prefix('models')->group(function () {

            Route::get('{product}', 'ModelController@index')->name('products.model.home');

            Route::get('create/{product}', 'ModelController@create')->name('products.model.create');

            Route::post('create', 'ModelController@store')->name('products.model.store');

            Route::get('design/{productModel}', 'ModelController@show')->name('products.model.show');
            
            Route::get('edit/{productModel}', 'ModelController@edit')->name('products.model.edit');

            Route::put('update/{productModel}', 'ModelController@update')->name('products.model.update');

            Route::post('save/{productModel}', 'ModelController@save')->name('products.model.save');

            Route::post('publish', 'ModelController@publish')->name('products.model.publish');

            Route::post('draft', 'ModelController@draft')->name('products.model.draft');
            
            Route::delete('destroy', 'ModelController@destroy')->name('products.model.destroy');
            
        });

        Route::prefix('designs')->group(function () {

            Route::get('/', 'DesignController@index')->name('products.design.home');

            Route::get('create', 'DesignController@create')->name('products.design.create');

            Route::post('create', 'DesignController@store')->name('products.design.create');

            //Route::get('edit/{product}', 'DesignController@edit')->name('products.design.edit');

            //Route::put('update/{product}', 'DesignController@update')->name('products.design.update');

            Route::delete('delete', 'DesignController@destroy')->name('products.design.destroy');

        });

        Route::prefix('categories')->group(function () {

            Route::get('/', 'CategoryController@index')->name('products.categories.home');

            Route::get('create', 'CategoryController@create')->name('products.categories.create');

            Route::post('create', 'CategoryController@store')->name('products.categories.create');

            Route::get('edit/{category}', 'CategoryController@edit')->name('products.categories.edit');

            Route::put('update/{category}', 'CategoryController@update')->name('products.categories.update');

            Route::delete('destroy', 'CategoryController@destroy')->name('products.categories.destroy');

        });

        Route::prefix('measure')->group(function () {

            Route::get('/{product}', 'MeasureController@index')->name('products.measure.home');

            Route::get('create/{product}', 'MeasureController@create')->name('products.measure.create');

            Route::put('create/{product}', 'MeasureController@store')->name('products.measure.store');

            //Route::get('edit/{relation}', 'MeasureController@edit')->name('products.measure.edit');

            //Route::put('update/{relation}', 'MeasureController@update')->name('products.measure.update');

            Route::delete('destroy/{product}', 'MeasureController@destroy')->name('products.measure.destroy');

        });

    });

    Route::prefix('orders')->namespace('Orders')->group(function () {

        Route::get('/', 'OrderController@index')->name('orders.admin.home');

        Route::post('cancel/{order}', 'OrderController@cancel')->name('orders.admin.cancel');
        
        Route::post('approved/{order}', 'OrderController@approved')->name('orders.admin.approved');

        Route::post('process/{order}', 'OrderController@process')->name('orders.admin.process');

        Route::post('send/{order}', 'OrderController@send')->name('orders.admin.send');

        Route::post('received/{order}', 'OrderController@received')->name('orders.admin.received');
        
    });

    Route::prefix('payments')->namespace('Payments')->group(function () {

        Route::get('/', 'PaymentController@index')->name('payments.admin.home');

        Route::get('create', 'PaymentController@create')->name('payments.admin.create');

        Route::post('create', 'PaymentController@store')->name('payments.admin.create');

        Route::post('approved/{payment}', 'PaymentController@approved')->name('payments.admin.approved');

        Route::post('rejected/{payment}', 'PaymentController@rejected')->name('payments.admin.rejected');

    });

});