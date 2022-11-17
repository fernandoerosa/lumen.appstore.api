<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api', 'as' => 'api.'], function () {

    Route::group(['prefix' => 'applications', 'as' => 'applications.'], function () {
        Route::get('/{id}', 'ApiController@get')->name('get');
        Route::get('/', 'ApiController@getAll')->name('get-all');
        Route::get('/apk/{id}', 'ApiController@getAppApk')->name('get-app-apk');
        Route::post('/create', 'ApiController@create')->name('create');
        Route::put('/update/{id}', 'ApiController@update')->name('update');
        Route::delete('/delete{id}', 'ApiController@delete')->name('delete');
    });

});

