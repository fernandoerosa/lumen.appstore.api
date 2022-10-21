<?php

/** @var Router $router */

use App\Http\Controllers\ApiController;
use Laravel\Lumen\Routing\Router;

$router = app(Router::class);

$router-> group(['prefix' => 'apps', 'as' => 'apps.'], function () use ($router) {
    $router->get('/','ApiController@getAllApps');
    $router->post('/create','ApiController@createApp');
    $router->put('/update/{id}','ApiController@updateApp');
    $router->delete('/delete{id}','ApiController@deleteApp');
    $router->get('/{id}','ApiController@getApp');
    $router->get('/apk/{packageName}', 'ApiController@getAppApk');
}) ;

