
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

Route::auth();

Route::group(['middleware' => ['auth']], function () {

  Route::group(['middleware' => ['personalPermission']], function () {
    Route::get('/', 'SalesController@index');
    Route::get('home', 'SalesController@index');
    Route::get('log', 'ReportsController@log');
    Route::resource('usuarios/funcionarios', 'FunctionariesController');
    Route::resource('usuarios/corretores', 'BrokersController');
    Route::resource('empreendimentos', 'EnterpriseController');
    Route::resource('quadras', 'BlocksController');
    Route::resource('lotes', 'LotsController');
    Route::resource('vendas', 'SalesController');
    Route::resource('status', 'StatusController');
    Route::post('corretor/venda', 'SalesController@storeBrokerSale');
    Route::post('venda/salvar-preco', 'SalesController@savePrice');
    Route::post('venda/salvar-porcentagem', 'SalesController@savePercentage');
    Route::group(['prefix' => 'relatorios'], function(){
      Route::get('corretores', 'BrokersController@showReportsList');
      Route::get('financeiro', 'ReportsController@financial');
      Route::get('lotes', 'ReportsController@lots');
      Route::get('ranking/corretores', 'ReportsController@brokerRank');
    });
  });
  Route::get('relatorios/corretores/{id}', 'ReportsController@showBrokerReport');
});
