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

Route::resource('ag', 'TesteController');

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
    
    /* MÓDULO CARTAO VIRTUAL */
    Route::resource('cartaovirtual', 'CartaoVirtualController');
    /* MÓDULO CARTAO VIRTUAL */

    /* MÓDULO CARTAO FARMÁCIA */
    Route::resource('cartaofarmacia', 'CartaoFarmaciaController');
    Route::get('/verCartaoFarmacia', 'CartaoFarmaciaController@verCartaoFarmacia')->name('verCartaoFarmacia');  
    Route::get('/farmaciasCredenciadas', 'CartaoFarmaciaController@farmaciasCredenciadas')->name('farmaciasCredenciadas');  
    /* MÓDULO CARTAO FARMÁCIA */

    /* MÓDULO ASSISTENCIA FUNERAL */
    Route::resource('assistenciafuneral', 'AssistenciaFuneralController');
    /* MÓDULO ASSISTENCIA FUNERAL */

    /* MÓDULO CONSULTAS E EXAMES */
    Route::resource('consultasexames', 'ConsultasExamesController');
    Route::get('/redeCredenciadas', 'ConsultasExamesController@redeCredenciadas')->name('redeCredenciadas');  
    Route::get('/redeCredenciadasAgendar', 'ConsultasExamesController@redeCredenciadasAgendar')->name('redeCredenciadasAgendar');  
    /* MÓDULO CONSULTAS E EXAMES */

    /* MÓDULO DISK SAUDE */
    Route::resource('disksaude', 'DiskSaudeController');
    Route::get('/orientacaoMedica', 'DiskSaudeController@orientacaoMedica')->name('orientacaoMedica');
    /* MÓDULO DISK SAUDE */

    /* MÓDULO ODONTO */
    Route::resource('odonto', 'OdontoController');
    Route::get('/odontoRedeCredenciada', 'OdontoController@odontoRedeCredenciada')->name('odontoRedeCredenciada'); 
    Route::get('/odontoAgendar', 'OdontoController@odontoAgendar')->name('odontoAgendar'); 
    /* MÓDULO ODONTO */

    /* MÓDULO FALE CONOSCO */
    Route::resource('faleconosco', 'FaleConoscoController');
    /* MÓDULO FALE CONOSCO */

    /* MÓDULO CARTAO FARMÁCIA VIDALINK */
    Route::resource('cartaofarmaciavidalink', 'CartaoFarmaciaVidaLinkController');  
    /* MÓDULO CARTAO FARMÁCIA VIDALINK */

    /* MÓDULO ORIENTAÇÃO NUTRICIONAL */
    Route::resource('orientacaonutricional', 'OrientacaoNutricionalController');  
    /* MÓDULO ORIENTAÇÃO NUTRICIONAL */

    /* MÓDULO SEGURO DE VIDA PORTO SEGURO */
    Route::resource('segurodevidaportoseguro', 'SeguroDeVidaPortoSeguroController');  
    /* MÓDULO SEGURO DE VIDA PORTO SEGURO */

    /* MÓDULO SORTEIOS MENSAIS */
    Route::resource('sorteiosmensais', 'SorteiosMensaisController');  
    /* MÓDULO SORTEIOS MENSAIS */

    /* MÓDULO CHECKUP ANUAL */
    Route::resource('checkupanual', 'CheckupAnualController');  
    Route::get('/checkup', 'CheckupAnualController@checkup')->name('checkup');  
  Route::get('/checkupComoFunciona', 'CheckupAnualController@checkupComoFunciona')->name('checkupComoFunciona'); 
  Route::get('/checkupVale', 'CheckupAnualController@checkupVale')->name('checkupVale'); 
  Route::post('/checkupValePost', 'CheckupAnualController@checkupValePost')->name('checkupValePost');
    /* MÓDULO CHECKUP ANUAL */

    /* MÓDULO CLUBE DE VANTAGENS */
    Route::resource('clubedevantagens', 'ClubeDeVantagensController');  
    Route::get('/clubedevantagensResgatar', 'ClubeDeVantagensController@clubedevantagensResgatar')->name('clubedevantagensResgatar'); 
    /* MÓDULO CLUBE DE VANTAGENS */

    /* MÓDULO ASSISTENCIA FUNERAL UNION */
    Route::resource('assistenciafuneralunion', 'AssistenciaFuneralUnionController');  
    /* MÓDULO ASSISTENCIA FUNERAL UNION */

    /* ÁREA DO GESTOR - CRIAÇÃO DE MENUS */
    //Futuramente essas rotas e funções sairão daqui e irão para o sistema AG Dr Beneficio
     Route::get('/agMenus', 'TesteController@agMenus')->name('agMenus');
     Route::get('/agMenusNovo', 'TesteController@agMenusNovo')->name('agMenusNovo');  
     Route::post('/agMenusNovoPost', 'TesteController@agMenusNovoPost')->name('agMenusNovoPost');
     Route::get('/agMenusEditar/{id_pacote}', 'TesteController@agMenusEditar')->name('agMenusEditar');  
     Route::post('/agMenusEditarPost', 'TesteController@agMenusEditarPost')->name('agMenusEditarPost');
     Route::get('/agMenusClonar', 'TesteController@agMenusClonar')->name('agMenusClonar');  
     Route::post('/agMenusClonarPost', 'TesteController@agMenusClonarPost')->name('agMenusClonarPost');
     Route::get('/agMenusPedidos/{id_pacote}', 'TesteController@agMenusPedidos')->name('agMenusPedidos');  
     Route::post('/agMenusPedidosPost', 'TesteController@agMenusPedidosPost')->name('agMenusPedidosPost');
     Route::get('/agMenusItemExcluir/{id_pacote}/{id_menu}', 'TesteController@agMenusItemExcluir')->name('agMenusItemExcluir');
     Route::get('/agMenusItemEditar/{id_pacote}/{id_menu}', 'TesteController@agMenusItemEditar')->name('agMenusItemEditar');     
     Route::post('/agMenusItemEditarPost', 'TesteController@agMenusItemEditarPost')->name('agMenusItemEditarPost');
    /* ÁREA DO GESTOR - CRIAÇÃO DE MENUS */

    /* MODULO HTML */ 
    Route::get('/html/{id_menu}', 'ClienteController@verHTML')->name('verHTML');  
    /* MODULO HTML */ 

});

Route::resource('convenia', 'ConveniaController');

Route::post('/getCidadesWithEstado', 'CartaoFarmaciaController@getCidadesWithEstado')->name('getCidadesWithEstado');
Route::post('/getBairrosWithCidade', 'CartaoFarmaciaController@getBairrosWithCidade')->name('getBairrosWithCidade');
Route::post('/farmacias', 'CartaoFarmaciaController@postFarmacias')->name('postFarmacias');

Route::post('/redeCredenciadaCarregaTipo', 'ConsultasExamesController@redeCredenciadaCarregaTipo')->name('redeCredenciadaCarregaTipo');
Route::post('/postRedesCredenciadas', 'ConsultasExamesController@postRedesCredenciadas')->name('postRedesCredenciadas');


Route::post('/agMenusAlteraOrdem', 'TesteController@agMenusAlteraOrdem')->name('agMenusAlteraOrdem');
