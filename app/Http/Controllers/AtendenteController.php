<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atendente;
use DB;

class AtendenteController extends Controller
{

 public function __construct()
 {
 app('App\Http\Controllers\LoginCPFController')->processaCoresDrBeneficio();
 $this->middleware('auth:atendente',['only' => 'index','edit']);
 }
 /**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
 public function index()
 {
   return view('atendente.dashboard');
 }

 public function busca() {
   $busca = request()->all();

   //dd($busca);

   $buscaConteudo = $busca["buscaConteudo"];

   if ($busca['buscaTipo'] == "CPF") {
     $buscaConteudo = preg_replace('/[^A-Za-z0-9\-]/', '', $buscaConteudo);
     $buscaConteudo = str_replace('-', '', $buscaConteudo);
   }

   switch ($busca['base']) {
     case 'DRBEN':
        $CPFs = DB::table('tb_producao_cliente as pc')
        ->leftjoin('tb_producao_titularidade as pt', 'pc.id_producao_cliente', '=', 'pt.id_producao_cliente');

        switch ($busca['buscaTipo']) {
          case 'CPF':
          $CPFs = $CPFs
          ->where('pc.cd_cpf', $buscaConteudo);
          break;

          case 'PEDIDO':
          $CPFs = $CPFs
          ->leftjoin('tb_pedido as p', 'pc.id_pedido', '=', 'p.id_pedido')
          ->where('pc.id_pedido', $buscaConteudo)
          ->where('p.nm_plano', 'NOT LIKE', '%PME%')
          ->where('p.nm_plano', 'NOT LIKE', '%CORP%');
          break;

          case 'NOME':
          $CPFs = $CPFs
          ->where('pc.nm_nome', 'LIKE', '%' . $buscaConteudo . '%');
          break;
        }

        $CPFs = $CPFs
        ->select('pc.*', 'pt.cd_titularidade')
        ->get();

        foreach ($CPFs as $key => $value) {

          //Captura dependentes
          if ($value->cd_titularidade == "TITULAR") {
            $dependentes = DB::table('tb_producao_titularidade as pt')
            ->leftjoin('tb_producao_cliente as pc', 'pt.id_producao_cliente', '=', 'pc.id_producao_cliente')
            ->where('pt.cd_titularidade', 'DEPENDENTE')
            ->where('pt.id_pedido', $value->id_pedido)
            ->where(function($q) use($value) {
                $q->where('pt.id_producao_cliente_dependente', null)
                  ->orWhere('pt.id_producao_cliente_dependente', $value->id_producao_cliente);
            })
            ->select('pc.nm_nome', 'pc.cd_cpf')
            ->get();

            if ($dependentes->count() > 0) {
              $CPFs[$key]->dependentes = $dependentes;
            }
          }

          //Captura informações do pedido
          $pedido = DB::table('tb_pedido')
          ->where('id_pedido', $value->id_pedido)
          ->first();

          $coberturas = DB::table('tb_juncao_pc_bn as j')
          ->leftjoin('tb_beneficios as b', 'j.ID_BN', '=', 'b.ID_BENEF')
          ->where('j.ID_PC', $pedido->ID_PC_BENEF)
          ->select('b.*')
          ->get();

          $pedido->coberturas = $coberturas;

          $CPFs[$key]->pedidoDetalhes = $pedido;

        }

     break;

       case 'ATRIB':
         // code...

         if ($busca['buscaTipo'] == "CPF") {
           $cpf = $this->formataCPF($buscaConteudo);
         }

         $CPFs = DB::table('atribuna_base');

        switch ($busca['buscaTipo']) {
          case "CPF":
          $CPFs = $CPFs
          ->where('cpf', $cpf);
          break;

          case "NOME":
          $CPFs = $CPFs
          ->where('nome', 'LIKE', '%' . $buscaConteudo . '%');
          break;

        }

         $CPFs = $CPFs
         ->get();

         foreach ($CPFs as $key => $value) {
           $cpfRemoveChars = preg_replace('/[^A-Za-z0-9\-]/', '', $value->cpf);
           $cpfRemoveChars = str_replace('-', '', $value->cpf);
           $CPFs[$key]->cpf = $cpfRemoveChars;

           //Captura informações do pedido
           $pedido = DB::table('tb_pedido')
           ->where('id_pedido', 2176)
           ->first();

           $coberturas = DB::table('tb_juncao_pc_bn as j')
           ->leftjoin('tb_beneficios as b', 'j.ID_BN', '=', 'b.ID_BENEF')
           ->where('j.ID_PC', $pedido->ID_PC_BENEF)
           ->select('b.*')
           ->get();

           $pedido->coberturas = $coberturas;

           $CPFs[$key]->pedidoDetalhes = $pedido;
         }

       break;
   }

   $data = [];
   $data['existe'] = 0;
   if ($CPFs->count() > 0) {
    $data['existe'] = 1;
   }
   $data['vida'] = $CPFs;
   $data['base'] = $busca['base'];
   $data['buscaConteudo'] = $busca['buscaConteudo'];
   $data['buscaTipo'] = $busca['buscaTipo'];

   return view('atendente.dashboard', $data);

 }

 public function formataCPF($cpf) {
   $cpf = preg_replace('/\D/', '', $cpf);
   $cpf = substr($cpf, 0, -2).'-'.substr($cpf, -2);
   return $cpf;
 }

 /**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
 public function create()
 {
   return view('atendente.auth.register');
 }

 /**
 * Store a newly created resource in storage.
 *
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\Http\Response
 */
 public function store(Request $request)
 {

 // validate the data
 $this->validate($request, [
 'name' => 'required',
 'email' => 'required',
 'password' => 'required'

 ]);

 // store in the database
 $atendentes = new Atendente;
 $atendentes->name = $request->name;
 $atendentes->email = $request->email;
 $atendentes->password=bcrypt($request->password);

 $atendentes->save();


 return redirect()->route('atendente.auth.login');

 }

 /**
 * Display the specified resource.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
 public function show($id)
 {
 //
 }

 /**
 * Show the form for editing the specified resource.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
 public function edit($id)
 {
 //
 }

 /**
 * Update the specified resource in storage.
 *
 * @param \Illuminate\Http\Request $request
 * @param int $id
 * @return \Illuminate\Http\Response
 */
 public function update(Request $request, $id)
 {
 //
 }

 /**
 * Remove the specified resource from storage.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
 public function destroy($id)
 {
 //
 }
}
