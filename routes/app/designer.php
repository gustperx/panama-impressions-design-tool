<?php

Route::prefix('designer')->namespace('Designer')->group(function (){

    Route::prefix('admin')->middleware('admin')->group(function (){

        Route::get('/', 'DesignerController@index')->name('designer.admin.home');

    });

    Route::prefix('client')->middleware('client')->group(function (){

        Route::get('/', 'DesignerController@index')->name('designer.client.home');

    });

});