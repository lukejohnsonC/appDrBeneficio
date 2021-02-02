<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('token_rd')->post('/getVidasRD', function (Request $request) {
    $CPFs = DB::table('tb_producao_cliente as pc')
    ->leftjoin('tb_producao_titularidade as pt', 'pc.id_producao_cliente', '=', 'pt.id_producao_cliente')
    ->select(
    'pc.nm_nome as Nome',
    'pc.cd_cpf as Cpf',
    DB::raw('(CASE WHEN pt.cd_titularidade = "TITULAR" THEN 1 WHEN pt.cd_titularidade = "DEPENDENTE" THEN 0 END) AS Titularidade'),
    DB::raw('8 as Parentesco'),
    DB::raw('1 as Operação'),
    DB::raw('0 as Limite')
    )
    //  ->where('importacao_rd', null); //descomentar
    ->where('cd_status', 'ATIVO')
    ->limit(10) //remover
    ->get();
    //DB::raw($num_identificacao . " as Nr_identificacao"),

    $plano = 999999; //Número será enviado pela univers
    $num_identificacao = (int)DB::table('tb_producao_cliente')->select('nr_rd')->orderby('nr_rd', 'desc')->first()->nr_rd;
    foreach ($CPFs as $key => $value) {
      $num_identificacao = $num_identificacao + 1;

      $CPFs[$key]->Plano = $plano;      
      $CPFs[$key]->Nr_Identificacao = $num_identificacao;
    }

    //fazer o update aqui

    return Response::json($CPFs);

});
