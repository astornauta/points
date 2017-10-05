<?php

$api = app('Dingo\Api\Routing\Router');

header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$api->version('v1', function ($api) {
    // $api->get('/', function () use ($router) {
    //     return $router->app->version();
    // });
    $api->get('users', 'App\Http\Controllers\UserController@index');
    $api->post('users', 'App\Http\Controllers\UserController@store');
    $api->get('users/{id}', 'App\Http\Controllers\UserController@show');
    $api->put('users/{id}', 'App\Http\Controllers\UserController@update');
    $api->delete('users/{id}', 'App\Http\Controllers\UserController@delete');

    $api->get('points', 'App\Http\Controllers\PointController@index');
    $api->post('points', 'App\Http\Controllers\PointController@store');
    $api->get('points/{id}', 'App\Http\Controllers\PointController@show');
    $api->put('points/{id}', 'App\Http\Controllers\PointController@update');
    $api->delete('points/{id}', 'App\Http\Controllers\PointController@delete');
});
