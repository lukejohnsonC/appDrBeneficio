<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atendente;
use DB;

class ValidadorController extends Controller
{

 public function __construct()
 {
 app('App\Http\Controllers\LoginCPFController')->processaCoresDrBeneficio();
 }
 /**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
 public function index()
 {
   return view('validador.dashboard');
 }

 public function busca() {
   $busca = request()->all();
   $buscaConteudo = $busca["buscaConteudo"];
     $buscaConteudo = preg_replace('/[^A-Za-z0-9\-]/', '', $buscaConteudo);
     $buscaConteudo = str_replace('-', '', $buscaConteudo);

   switch ($busca['base']) {
     case 'DRBEN':
        $return = DB::table("tb_producao_cliente")
        ->where("cd_cpf", $buscaConteudo)
        ->where("cd_status", 'ATIVO')
        ->first();

        if (!$return) {
          $return = DB::table("tb_producao_cliente")
          ->where("cd_cpf", $buscaConteudo)
          ->where("cd_status", 'INATIVO')
          ->first();
        }

     break;

       case 'ATRIB':
        $cpf = $this->formataCPF($buscaConteudo);
        $return = DB::table('atribuna_base')
        ->where('cpf', $cpf)
        ->first();
       break;
   }

   $data = [];
   $data['base'] = $busca['base'];
   $data['buscaConteudo'] = $busca['buscaConteudo'];
   $data['return'] = $return;
   $data['returnPOST'] = true;

   return view('validador.dashboard', $data);

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
