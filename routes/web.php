<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('teste', 'TesteController');

Route::get('/', function () {
  return redirect()->route('login.index');
});

Route::resource('login', 'LoginCPFController');

Route::post('/login/postLogin', 'LoginCPFController@postLogin')->name('postLogin');
Route::get('/logout', 'LoginCPFController@logout')->name('logout');
Route::get('/centralAjuda', 'LoginCPFController@centralAjuda')->name('centralAjuda');

Route::middleware(['verifica.usuario.logado'])->group(function () {
    Route::resource('cliente', 'ClienteController');
    Route::get('/modal', 'ClienteController@modal')->name('cliente_modal');     
    Route::get('/modal_seleciona_pedido/{id_pedido}', 'ClienteController@modal_seleciona_pedido')->name('modal_seleciona_pedido');   
    Route::get('/turnoff', 'ClienteController@turnoff')->name('turnoff');  
    Route::get('/verCartaoFarmacia', 'ClienteController@verCartaoFarmacia')->name('verCartaoFarmacia');  
    Route::get('/farmaciasCredenciadas', 'ClienteController@farmaciasCredenciadas')->name('farmaciasCredenciadas');  
    Route::get('/redeCredenciadas', 'ClienteController@redeCredenciadas')->name('redeCredenciadas');  
    Route::get('/redeCredenciadasAgendar', 'ClienteController@redeCredenciadasAgendar')->name('redeCredenciadasAgendar');  
    Route::get('/checkup', 'ClienteController@checkup')->name('checkup');  
    Route::get('/checkupComoFunciona', 'ClienteController@checkupComoFunciona')->name('checkupComoFunciona'); 
    Route::get('/checkupVale', 'ClienteController@checkupVale')->name('checkupVale'); 
    Route::post('/checkupValePost', 'ClienteController@checkupValePost')->name('checkupValePost');
    Route::get('/odontoRedeCredenciada', 'ClienteController@odontoRedeCredenciada')->name('odontoRedeCredenciada'); 
    Route::get('/odontoAgendar', 'ClienteController@odontoAgendar')->name('odontoAgendar'); 
    Route::get('/orientacaoMedica', 'ClienteController@orientacaoMedica')->name('orientacaoMedica'); 
    Route::get('/orientacaoNutricional', 'ClienteController@orientacaoNutricional')->name('orientacaoNutricional'); 
});

Route::resource('convenia', 'ConveniaController');

Route::post('/getCidadesWithEstado', 'ClienteController@getCidadesWithEstado')->name('getCidadesWithEstado');
Route::post('/getBairrosWithCidade', 'ClienteController@getBairrosWithCidade')->name('getBairrosWithCidade');
Route::post('/redeCredenciadaCarregaTipo', 'ClienteController@redeCredenciadaCarregaTipo')->name('redeCredenciadaCarregaTipo');
Route::post('/postRedesCredenciadas', 'ClienteController@postRedesCredenciadas')->name('postRedesCredenciadas');
Route::post('/farmacias', 'ClienteController@postFarmacias')->name('postFarmacias');