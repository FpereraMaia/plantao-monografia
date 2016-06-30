
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::auth();

Route::group(['middleware' => ['auth']], function () {
    Route::get('home', 'HomeController@index');

    Route::resource('usuarios/funcionarios', 'FunctionariesController');
    Route::resource('usuarios/corretores', 'BrokersController');
    Route::resource('empreendimentos', 'EnterpriseController');
    Route::resource('quadras', 'BlocksController');
    Route::resource('lotes', 'LotsController');
    Route::resource('vendas', 'SalesController');
    Route::resource('status', 'StatusController');
    Route::post('corretor/venda', 'SalesController@storeBrokerSale');
});
