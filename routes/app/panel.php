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


});