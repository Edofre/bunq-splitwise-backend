<?php

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//$router->group(['prefix' => ''])

$router->group(['prefix' => 'bunq'], function () use ($router) {

    // Oath2
    $router->get('/oauth', ['uses' => 'Bunq\AuthController@oauth']);
    $router->get('/redirect', ['uses' => 'Bunq\AuthController@processRedirect']);
    $router->get('/token', ['uses' => 'Bunq\AuthController@token']);


    $router->get('/monetary-accounts', ['uses' => 'Bunq\MonetaryAccountController@index']);
    $router->get('/monetary-accounts/{itemId}', ['uses' => 'Bunq\MonetaryAccountController@show']);

    $router->get('/payments/week/{week}/{year}', ['uses' => 'Bunq\PaymentController@week']);
    $router->get('/payments/month/{month}/{year}', ['uses' => 'Bunq\PaymentController@month']);
});

