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

$router->get('/cuentas', ['uses' => 'CCuentasBancariasController@index']);
$router->post('/cuentas', ['uses' => 'CCuentasBancariasController@CrearCuenta']);
$router->put('/cuentas/{id}', ['uses' => 'CCuentasBancariasController@ActualizaCuenta']);
$router->delete('/cuentas/{id}', ['uses' => 'CCuentasBancariasController@EliminaCuenta']);
$router->get('/cuentasBancos', ['uses' => 'CCuentasBancariasController@getCuentasBanco']);
$router->get('/ /{id}', ['uses' => 'CCuentasBancariasController@getCuenta']);

$router->get('/bancos', ['uses' => 'CBancoController@index']);

