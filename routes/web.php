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
  Session::put('loginBloqueiaCards', 0);
  return redirect()->route('login.index');
});

Route::resource('login', 'LoginCPFController');
Route::get('/meucartaodebeneficios', 'LoginCPFController@login_meucartaodebeneficios')->name('meucartaodebeneficios');

Route::get('/acesso', 'LoginCPFController@loginSemCards')->name('loginSemCards');

Route::get('/formulario_google', 'FormGoogleController@formulario')->name('googleForm');


 


Route::get('/loginw/{pacote}', 'LoginCPFController@loginWhiteLabel')->name('loginWhiteLabel');

Route::get('/cssMain', 'TesteController@cssMain')->name('cssMain');


Route::post('/login/postLogin', 'LoginCPFController@postLogin')->name('postLogin');
Route::get('/logout', 'LoginCPFController@logout')->name('logout');
Route::get('/logoutw/{pacote}', 'LoginCPFController@logoutWhiteLabel')->name('logoutWhiteLabel');
Route::get('/centralAjuda', 'LoginCPFController@centralAjuda')->name('centralAjuda');

Route::middleware(['verifica.usuario.logado'])->group(function () {
    Route::resource('cliente', 'ClienteController');
    Route::get('/modal', 'ClienteController@modal')->name('cliente_modal');
    Route::get('/modal_seleciona_pedido/{id_pedido}', 'ClienteController@modal_seleciona_pedido')->name('modal_seleciona_pedido');
    Route::get('/turnoff', 'ClienteController@turnoff')->name('turnoff');

    /* MÓDULO CARTAO VIRTUAL */
    Route::resource('cartaovirtual', 'CartaoVirtualController');
    Route::get('/AfshYsaKJS', 'CartaoVirtualController@camps1')->name('cartaovirtual.camps1');
    Route::get('/solicitarSegundaVia', 'CartaoVirtualController@solicitarSegundaVia')->name('solicitarSegundaVia');
    /* MÓDULO CARTAO VIRTUAL */

    /* MÓDULO CARTAO FARMÁCIA */
    Route::resource('cartaofarmacia', 'CartaoFarmaciaController');
    Route::get('/verCartaoFarmacia', 'CartaoFarmaciaController@verCartaoFarmacia')->name('verCartaoFarmacia');
    Route::get('/farmaciasCredenciadas', 'CartaoFarmaciaController@farmaciasCredenciadas')->name('farmaciasCredenciadas');
    Route::get('/medicamentoManipulado', 'CartaoFarmaciaController@medicamentoManipulado')->name('medicamentoManipulado');
    Route::get('/medicamentoManipuladoWhats', 'CartaoFarmaciaController@medicamentoManipuladoWhats')->name('medicamentoManipuladoWhats');
    Route::get('/medicamentoManipuladoTel', 'CartaoFarmaciaController@medicamentoManipuladoTel')->name('medicamentoManipuladoTel');
    /* MÓDULO CARTAO FARMÁCIA */

    /* MÓDULO ASSISTENCIA FUNERAL */
    Route::resource('assistenciafuneral', 'AssistenciaFuneralController');
    /* MÓDULO ASSISTENCIA FUNERAL */

    /* MÓDULO CONSULTAS E EXAMES */
    Route::resource('consultasexames', 'ConsultasExamesController');
    Route::get('/redeCredenciadas', 'ConsultasExamesController@redeCredenciadas')->name('redeCredenciadas');
    Route::get('/redeCredenciadasAgendar', 'ConsultasExamesController@redeCredenciadasAgendar')->name('redeCredenciadasAgendar');
    /* MÓDULO CONSULTAS E EXAMES */
    
    
    /* MÓDULO SvcardVerCartao */
    Route::get('/svcard', 'SvcardVerCartaoController@index')->name('svcard');
    Route::get('/svcardVerCartao', 'SvcardVerCartaoController@verCartao')->name('svcardVerCartao');
    Route::get('/svcardConsultaSaldo', 'SvcardVerCartaoController@consultaSaldo')->name('svcardConsultaSaldo');
    
    
    
  Route::resource('solicitacaodependente', 'SolicitacaoDependenteController');
  
  Route::get('/solicitacaodependente', 'SolicitacaoDependenteController@form')->name('solicitacaoDependente'); 
  
  
  Route::post('/solicitacaodependentePOST', 'SolicitacaoDependenteController@solicitacaodependentePOST')->name('solicitacaodependentePOST');
  
  
  /* MÓDULO SORTEIOS MENSAIS 
    Route::resource('sorteiosmensais', 'SorteiosMensaisController');
    
    Route::get('/sorteiosmensais', 'SorteiosMensaisController@form')->name('sorteiosmensais'); 
    
     Route::post('/sorteiosmensaisPOST', 'SorteiosMensaisController@sorteiosmensaisPOST')->name('sorteiosmensaisPOST');
    /* MÓDULO SORTEIOS MENSAIS */
    

    /* MÓDULO DISK SAUDE */
    Route::resource('disksaude', 'DiskSaudeController');
    Route::get('/orientacaoMedica', 'DiskSaudeController@orientacaoMedica')->name('orientacaoMedica');
    Route::get('/orientacaoNutricional', 'DiskSaudeController@orientacaoNutricional')->name('orientacaoNutricional');
    /* MÓDULO DISK SAUDE */

    /* MÓDULO ODONTO */
    Route::resource('odonto', 'OdontoController');
    Route::get('/odontoRedeCredenciada', 'OdontoController@odontoRedeCredenciada')->name('odontoRedeCredenciada');
    Route::get('/odontoAgendar', 'OdontoController@odontoAgendar')->name('odontoAgendar');
    /* MÓDULO ODONTO */

    /* MÓDULO FALE CONOSCO */
    Route::resource('faleconosco', 'FaleConoscoController');
    Route::post('/faleconoscoPOST', 'FaleConoscoController@faleconoscoPOST')->name('faleconoscoPOST');
    /* MÓDULO FALE CONOSCO */

    /* MÓDULO CARTAO FARMÁCIA VIDALINK */
    Route::resource('cartaofarmaciavidalink', 'CartaoFarmaciaVidaLinkController');
    /* MÓDULO CARTAO FARMÁCIA VIDALINK */

    /* MÓDULO SEGURO DE VIDA PORTO SEGURO */
    Route::resource('segurodevidaportoseguro', 'SeguroDeVidaPortoSeguroController');
    /* MÓDULO SEGURO DE VIDA PORTO SEGURO */

    

    /* MÓDULO CHECKUP ANUAL */
    Route::resource('checkupanual', 'CheckupAnualController');
    Route::get('/checkup', 'CheckupAnualController@checkup')->name('checkup');
  Route::get('/checkupComoFunciona', 'CheckupAnualController@checkupComoFunciona')->name('checkupComoFunciona');
  Route::get('/checkupVale', 'CheckupAnualController@checkupVale')->name('checkupVale');
  Route::post('/checkupValePost', 'CheckupAnualController@checkupValePost')->name('checkupValePost');
    /* MÓDULO CHECKUP ANUAL */

    /* MÓDULO CLUBE DE VANTAGENS */
    Route::resource('clubedevantagens', 'ClubeDeVantagensController');
    Route::post('/clubedevantagensBusca', 'ClubeDeVantagensController@index')->name('clubedevantagensBusca');
    Route::get('/clubedevantagensResgatar/{id_vantagem}', 'ClubeDeVantagensController@clubedevantagensResgatar')->name('clubedevantagensResgatar');
    Route::get('/clubedevantagensNOVO', 'ClubeDeVantagensController@clubedevantagensNOVO')->name('clubedevantagensNOVO');
    Route::get('/clubedevantagens_rp', 'ClubeDeVantagensController@clubedevantagens_rede_parcerias')->name('clubedevantagens.rede_parcerias');
    Route::get('/clubedevantagens_rp_atrib', 'ClubeDeVantagensController@clubedevantagens_rede_parcerias_atrib')->name('clubedevantagens.rede_parcerias_atrib');
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
     Route::get('/agMockupsClonar', 'TesteController@agMockupsClonar')->name('agMockupsClonar');
     Route::post('/agMockupsClonarPost', 'TesteController@agMockupsClonarPost')->name('agMockupsClonarPost');
     Route::get('/agMockupsEditar/{id}', 'TesteController@agMockupsEditar')->name('agMockupsEditar');
     Route::get('/agMockupsItemExcluir/{id_mockup}/{id_menu}', 'TesteController@agMockupsItemExcluir')->name('agMockupsItemExcluir');
     Route::get('/agMockupsItemEditar/{id_mockup}/{id_menu}', 'TesteController@agMockupsItemEditar')->name('agMockupsItemEditar');
     Route::post('/agMockupsItemEditarPost', 'TesteController@agMockupsItemEditarPost')->name('agMockupsItemEditarPost');
     Route::post('/agMockupsEditarDadosPost', 'TesteController@agMockupsEditarDadosPost')->name('agMockupsEditarDadosPost');
     Route::post('/agMockupsEditarPost', 'TesteController@agMockupsEditarPost')->name('agMockupsEditarPost');

    /* ÁREA DO GESTOR - CRIAÇÃO DE MENUS */

    /* MODULO HTML */
    Route::get('/html/{id_menu}', 'ClienteController@verHTML')->name('verHTML');
    Route::get('/contato/{id_menu}', 'FaleConoscoController@verCONTATO')->name('verCONTATO');
    /* MODULO HTML */

    /* MODULO AFFINIBOX */
    Route::resource('affinibox', 'AffiniboxController');
    Route::get('/affiniboxVidalink', 'AffiniboxController@affiniboxVidalink')->name('affiniboxVidalink');
    Route::get('/affiniboxVidalinkGeraCartao', 'AffiniboxController@affiniboxVidalinkGeraCartao')->name('affiniboxVidalinkGeraCartao');
    /* MODULO AFFINIBOX */

    /* MODULO CINEMARK */
    Route::get('/cinemark', 'CinemarkController@index')->name('cinemark');
    /* MODULO CINEMARK */

    /* AUTENTICAÇÃO GESTORES */
    Route::prefix('gestor')->group(function () {
      Route::get('/', 'GestorController@index')->name('gestor.dashboard');
      Route::get('dashboard', 'GestorController@index')->name('gestor.dashboard');
      Route::post('postDashboard', 'GestorController@postDashboard')->name('gestor.postDashboard');
      Route::get('DrSuRegister', 'GestorController@create')->name('gestor.register');
      Route::post('register', 'GestorController@store')->name('gestor.register.store');
      Route::get('login', 'Auth\Gestor\LoginController@login')->name('gestor.auth.login');
      Route::post('login', 'Auth\Gestor\LoginController@loginGestor')->name('gestor.auth.loginGestor');
      Route::post('logout', 'Auth\Gestor\LoginController@logout')->name('gestor.auth.logout');
    });

    //Rotas para usuários logados na Área do Gestor
    Route::prefix('gestor')->middleware(['auth:gestor'])->group(function () {
      Route::get('vidas', 'GestorController@vidas')->name('gestor.vidas');
      Route::get('ProducaoClienteAPI', 'GestorController@ProducaoClienteAPI')->name('ProducaoClienteAPI');
      Route::post('/vidasExcluir', 'GestorController@vidasExcluir')->name('vidasExcluir');
      Route::post('/vidasEditar', 'GestorController@vidasEditar')->name('vidasEditar');
      Route::post('/vidasSegundaViaCartao', 'GestorController@vidasSegundaViaCartao')->name('vidasSegundaViaCartao');
    //  Route::post('/vidasCadastrar', 'GestorController@vidasCadastrar')->name('vidasCadastrar');
      Route::get('upload', 'GestorController@upload')->name('gestor.upload');
      Route::post('/uploadDocument', 'GestorController@uploadDocument')->name('uploadDocument');
      Route::get('alteraPedidoAtivo/{id_pedido}', 'GestorController@alteraPedidoAtivo')->name('gestor.alteraPedidoAtivo');
      Route::get('exportaBaseFull', 'GestorController@exportaBaseFull')->name('gestor.exportaBaseFull');
      Route::get('exportaLayout', 'GestorController@exportaLayout')->name('gestor.exportaLayout');
      Route::get('create', 'GestorController@create')->name('gestor.create');
    });
    /* AUTENTICAÇÃO GESTORES */




    /* MÓDULO CARTÃO A TRIBUNA */
    Route::get('cartaotribuna', 'CartaoTribunaController@index')->name('cartaotribuna.index');
    Route::get('cartaotribuna_logout', 'CartaoTribunaController@logout')->name('cartaotribuna.logout');
    Route::get('cartaotribuna_redeSaudeDrBeneficio', 'CartaoTribunaController@redeSaudeDrBeneficio')->name('cartaotribuna.redeSaudeDrBeneficio');
    Route::get('cartaotribuna_redeSaudeDrBeneficio_consulta', 'CartaoTribunaController@redeSaudeDrBeneficio_consulta')->name('cartaotribuna.redeSaudeDrBeneficio_consulta');
    Route::get('cartaotribuna_redeSaudeDrBeneficio_consulta_comousar', 'CartaoTribunaController@redeSaudeDrBeneficio_consulta_comousar')->name('cartaotribuna.redeSaudeDrBeneficio_consulta_comousar');
    Route::get('cartaotribuna_redeSaudeDrBeneficio__consulta_redemedica', 'CartaoTribunaController@redeSaudeDrBeneficio_consulta_redemedica')->name('cartaotribuna.redeSaudeDrBeneficio_consulta_redemedica');
    Route::get('cartaotribuna_redeSaudeDrBeneficio__consulta_redeodonto', 'CartaoTribunaController@redeSaudeDrBeneficio_consulta_redeodonto')->name('cartaotribuna.redeSaudeDrBeneficio_consulta_redeodonto');

    Route::get('cartaotribuna_redeSaudeDrBeneficio_raiaDrogasil', 'CartaoTribunaController@redeSaudeDrBeneficio_raiaDrogasil')->name('cartaotribuna.redeSaudeDrBeneficio_raiaDrogasil');
    Route::get('cartaotribuna_redeSaudeDrBeneficio_raiaDrogasil_comousar', 'CartaoTribunaController@redeSaudeDrBeneficio_raiaDrogasil_comousar')->name('cartaotribuna.redeSaudeDrBeneficio_raiaDrogasil_comousar');

    Route::get('cartaotribuna_redeSaudeDrBeneficio_aopharmaceutico', 'CartaoTribunaController@redeSaudeDrBeneficio_aopharmaceutico')->name('cartaotribuna.redeSaudeDrBeneficio_aopharmaceutico');
    Route::get('cartaotribuna_redeSaudeDrBeneficio_aopharmaceutico_comousar', 'CartaoTribunaController@redeSaudeDrBeneficio_aopharmaceutico_comousar')->name('cartaotribuna.redeSaudeDrBeneficio_aopharmaceutico_comousar');
    Route::get('cartaotribuna_redeSaudeDrBeneficio_aopharmaceutico_redecredenciada', 'CartaoTribunaController@redeSaudeDrBeneficio_aopharmaceutico_redecredenciada')->name('cartaotribuna.redeSaudeDrBeneficio_aopharmaceutico_redecredenciada');
    /* MÓDULO CARTÃO A TRIBUNA */


    /* MÓDULO FORM DINAMICO */
     Route::get('/form_dinamico/{id_menu}', 'FaleConoscoController@verFORM_DINAMICO')->name('verFORM_DINAMICO');
     Route::post('/form_dinamico_post', 'FaleConoscoController@form_dinamico_post')->name('FORM_DINAMICOPOST');
    /* MÓDULO FORM DINAMICO */




});

Route::middleware(['atribuna.verifica.usuario.logado'])->group(function () {

});



/* LOGIN A TRIBUNA*/
Route::get('atribuna_login', 'CartaoTribunaController@login')->name('cartaotribuna.login');
//Route::post('atribuna_loginPOST_ETAPA1', 'CartaoTribunaController@loginPOST_ETAPA1')->name('cartaotribuna.loginPOST_ETAPA1');
//Route::post('atribuna_loginPOST_ETAPA2', 'CartaoTribunaController@loginPOST_ETAPA2')->name('cartaotribuna.loginPOST_ETAPA2');
Route::post('atribuna_loginPOST_ETAPA3', 'CartaoTribunaController@loginPOST_ETAPA3')->name('cartaotribuna.loginPOST_ETAPA3');
/* LOGIN A TRIBUNA*/


Route::get('/mockups/{slug}', 'MockupsController@index')->name('MockupsIndex');
Route::get('/mockups/{slug}/menu', 'MockupsController@menuMockups')->name('menuMockups');
Route::post('/mockups/{slug}/loginMockupsPost', 'MockupsController@loginMockupsPost')->name('loginMockupsPost');
Route::get('/htmlmockup/{id_menu}', 'MockupsController@verHTMLMOCKUP')->name('verHTMLMOCKUP');




Route::resource('convenia', 'ConveniaController');

Route::post('/getCidadesWithEstado', 'CartaoFarmaciaController@getCidadesWithEstado')->name('getCidadesWithEstado');
Route::post('/getBairrosWithCidade', 'CartaoFarmaciaController@getBairrosWithCidade')->name('getBairrosWithCidade');
Route::post('/farmacias', 'CartaoFarmaciaController@postFarmacias')->name('postFarmacias');

Route::post('/redeCredenciadaCarregaTipo', 'ConsultasExamesController@redeCredenciadaCarregaTipo')->name('redeCredenciadaCarregaTipo');
Route::post('/postRedesCredenciadas', 'ConsultasExamesController@postRedesCredenciadas')->name('postRedesCredenciadas');


Route::post('/agMenusAlteraOrdem', 'TesteController@agMenusAlteraOrdem')->name('agMenusAlteraOrdem');
Route::post('/agMockupsAlteraOrdem', 'TesteController@agMockupsAlteraOrdem')->name('agMockupsAlteraOrdem');

Route::get('/testGET', 'TesteController@testGET')->name('testGET');
Route::get('/testPOST', 'TesteController@testPOST')->name('testPOST');

/* CSS */
Route::get('/main.css', function() {
    $info = colors();
    $colors = $info['colors'];
    $assets = $info['assets'];

    $data = [];
    $data['primary'] = $colors['#primary'];
    $data['secondary'] = $colors['#secondary'];
    $data['ASSET_IMGS'] = $assets['ASSET_IMGS'];
    return response(view('css.main', $data))->header('Content-Type', 'text/css');
})->name('cssMain');

Route::get('/content.css', function() {
    $info = colors();
    $colors = $info['colors'];
    $assets = $info['assets'];

    $data = [];
    $data['primary'] = $colors['#primary'];
    $data['secondary'] = $colors['#secondary'];
    $data['ASSET_IMGS'] = $assets['ASSET_IMGS'];
    return response(view('css.content', $data))->header('Content-Type', 'text/css');
})->name('cssContent');

Route::get('/edit.css', function() {
    $info = colors();
    $colors = $info['colors'];
    $assets = $info['assets'];

    $data = [];
    $data['primary'] = $colors['#primary'];
    $data['secondary'] = $colors['#secondary'];
    $data['ASSET_IMGS'] = $assets['ASSET_IMGS'];
    return response(view('css.edit', $data))->header('Content-Type', 'text/css');
})->name('cssEdit');


/* CSS */



/* SOLICITAR VIDALINK EXTERNO */

Route::prefix('vidalink')->group(function () {
  Route::get('/', 'AffiniboxController@vidalinkExterno')->name('vidalinkExterno');
  Route::post('/vidalinkExternoPost', 'AffiniboxController@vidalinkExternoPost')->name('vidalinkExternoPost');
  //Route::get('dashboard', 'GestorController@index')->name('gestor.dashboard');
});

/* SOLICITAR VIDALINK EXTERNO */



/* PROPOSTA DE VENDA */
Route::get('/propostaVenda', 'PropostaVendaController@index')->name('propostaVenda.index');
Route::post('/propostaVenda/dispara', 'PropostaVendaController@dispara')->name('propostaVenda.dispara');
/* PROPOSTA DE VENDA */



/* CENTRAL DE ATENDIMENTO */
Route::prefix('atendente')->group(function () {
 Route::get('/', 'AtendenteController@index')->name('atendente.dashboard');
 Route::get('dashboard', 'AtendenteController@index')->name('atendente.dashboard');
 Route::get('register', 'AtendenteController@create')->middleware(['auth:atendente'])->name('atendente.register');
 Route::post('register', 'AtendenteController@store')->name('atendente.register.store');
 Route::get('login', 'Auth\Atendente\LoginController@login')->name('atendente.auth.login');
 Route::post('login', 'Auth\Atendente\LoginController@loginAtendente')->name('atendente.auth.loginAtendente');
 Route::get('logout', 'Auth\Atendente\LoginController@logout')->name('atendente.auth.logout');
 Route::post('busca', 'AtendenteController@busca')->name('atendente.busca');
});
/* CENTRAL DE ATENDIMENTO */

/* VALIDADOR */
Route::prefix('validador')->group(function () {
 Route::get('/', 'ValidadorController@index')->name('validador.dashboard');
 Route::get('dashboard', 'ValidadorController@index')->name('validador.dashboard');
 Route::post('busca', 'ValidadorController@busca')->name('validador.busca');
});
/* VALIDADOR */

Route::prefix('gestao')->group(function () {
  Route::get('/', 'GestaoController@index')->name('gestao.dashboard');
  Route::post('logar', 'GestaoController@logar')->name('gestao.logar');
 // Route::get('login', 'GestaoController@login')->name('gestao.login');
});

