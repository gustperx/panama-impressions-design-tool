<?php

Route::prefix('designer')->namespace('Designer')->group(function (){
    
    Route::middleware('admin')->namespace('Admin')->group(function () {
        
        Route::get('{productView}', 'DesignerController@index')->name('designer.admin.layer.home');

        Route::post('save/{productView}', 'DesignerController@save')->name('designer.admin.layer.save');

        //Route::post('load/{view}', 'DesignerController@load')->name('designer.admin.layer.load');

        Route::get('load/{product}', 'DesignerController@load')->name('designer.admin.layer.load');

    });
    

    Route::prefix('client')->middleware('client')->group(function (){

        Route::get('/', 'DesignerController@index')->name('designer.client.home');

    });

});