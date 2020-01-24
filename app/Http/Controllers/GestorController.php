<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gestor;
use DB;
use App\Producao_Cliente;
use DataTables;
use Session;

class GestorController extends Controller

{

    public function __construct()
    {
        $this->middleware('auth:gestor',['only' => 'index','edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
      $data = [];

      $data['total'] = DB::table('tb_producao_cliente')
      ->where('id_pedido', Session::get('admin_id_pedido'))
      ->where('cd_status', 'ATIVO')
      ->count();

      $data['grafico_qtd_mes'] = [];

      for ($i = 0; $i <= 12; $i++) {
          $months[] = date("Y-m", strtotime( date( 'Y-m-01' )." -$i months"));
      }
      $months = array_reverse($months);
      //dd($months);

      foreach($months as $m) {
        $qtd_months = DB::table('tb_producao_cliente')
        ->where('dt_ativacao', '>=', $m . '-01')
        ->where('dt_ativacao', '<=', $m . '-31')
        ->where('cd_status', 'ATIVO')
        ->where('id_pedido', Session::get('admin_id_pedido'))
        ->count();
        $data['grafico_qtd_mes'][formata_data_sem_dia($m)] = $qtd_months;
      }

      return view('gestor.dashboard', $data);
    }

    public function vidas() {
        return view('gestor.vidas');
    }

    public function ProducaoClienteAPI() {
        return DataTables::of(
            Producao_Cliente::query()
            ->where('id_pedido', Session::get('admin_id_pedido'))
            ->where('cd_status', 'ATIVO')
          )->make(true);
    }

    public function vidasExcluir() {
        $data = request()->all();
        $info_email = [];
        $info_email['assunto'] = "Vida excluida na Área do Gestor";

        DB::table('tb_producao_cliente')
        ->where('id_producao_cliente', $data['id_producao_cliente'])
        ->update(['cd_status' => 'INATIVO']);

        $pedido = DB::table('tb_pedido')->where('id_pedido', $data['id_pedido'])->first();

        $info_email['mensagem'] = "Uma vida foi excluida da base.";
        $info_email['mensagem'] .= "<br />";
        $info_email['mensagem'] .= "<br />";

        $info_email['mensagem'] .= "<b>Vida excluída: </b>";
        $info_email['mensagem'] .= $data['nm_nome'];
        $info_email['mensagem'] .= "<br />";

        $info_email['mensagem'] .= "<b>ID Produção Cliente: </b>";
        $info_email['mensagem'] .= $data['id_producao_cliente'];
        $info_email['mensagem'] .= "<br />";

        $info_email['mensagem'] .= "<b>Pedido: </b>";
        $info_email['mensagem'] .= "#".$data['id_pedido'] . " - " . $pedido->cd_pedido;
        $info_email['mensagem'] .= "<br />";

        $info_email['mensagem'] .= "<br />";

        $info_email['mensagem'] .= "<b>Excluída por: </b>";
        $info_email['mensagem'] .= Session::get('admin_name') . " (ID #".Session::get('admin_id').")";
        $info_email['mensagem'] .= "<br />";

        $info_email['mensagem'] .= "<b>Data e hora da exclusão: </b>";
        $info_email['mensagem'] .= formata_data(NOW()) . " as " . formata_hora(NOW());
        $info_email['mensagem'] .= "<br />";

        $this->dispara_email_alerta($info_email);

        return ["status" => "sucesso", "mensagem" => "Vida ".$data['nm_nome']." excluída com sucesso."];
    }

    public function vidasEditar() {
        $data = request()->all();
        if($data['cd_cpf']) {
            $data["cd_cpf"] = preg_replace('/[^A-Za-z0-9\-]/', '', $data["cd_cpf"]);
            $data["cd_cpf"] = str_replace('-', '', $data["cd_cpf"]);
        }

        if($data['cd_dt_nasc']) {
            $data["cd_dt_nasc"] = str_replace('/', '-', $data["cd_dt_nasc"] );
            $data["cd_dt_nasc"] = date("Y-m-d", strtotime($data["cd_dt_nasc"]));
        }


        DB::table('tb_producao_cliente')
        ->where('id_producao_cliente', $data['id_producao_cliente'])
        ->update($data);

        return ["status" => "sucesso", "mensagem" => "Vida editada com sucesso"];
        //return $data;
    }

/*
    public function vidasCadastrar() {
        $data = request()->all();

        if($data['cd_cpf']) {
            $data["cd_cpf"] = preg_replace('/[^A-Za-z0-9\-]/', '', $data["cd_cpf"]);
            $data["cd_cpf"] = str_replace('-', '', $data["cd_cpf"]);
        }

        if($data['cd_dt_nasc']) {
            $data["cd_dt_nasc"] = str_replace('/', '-', $data["cd_dt_nasc"] );
            $data["cd_dt_nasc"] = date("Y-m-d", strtotime($data["cd_dt_nasc"]));
        }

        DB::table('tb_producao_cliente')
        ->insert($data);

        return $data;


    } */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestor.auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // validate the data
        $this->validate($request, [
          'name'          => 'required',
          'email'         => 'required',
          'password'      => 'required'

        ]);

        // store in the database
        $gestores = new Gestor;
        $gestores->name = $request->name;
        $gestores->email = $request->email;
        $gestores->password=bcrypt($request->password);

        $gestores->save();


        return redirect()->route('gestor.auth.login');

    }

    public function upload() {
      $data = [];
      $data['pedido'] = DB::table('tb_pedido')->where('id_pedido', Session::get('admin_id_pedido'))->first();
      return view('gestor.upload', $data);
    }




    public function uploadDocument(Request $request) {

    //$title = $request->file('title');

    // Get the uploades file with name document
    $document = $request->file('document');

    // Required validation
    $request->validate([
        'document' => 'required'
    ]);

    // Check if uploaded file size was greater than
    // maximum allowed file size
    if ($document->getError() == 1) {
        $max_size = $document->getMaxFileSize() / 1024 / 1024;  // Get size in Mb
        $error = 'O documento é maior do que ' . $max_size . 'Mb.';
        return redirect()->back()->with('error', $error);
    }

    $data = [
        'document' => $document
    ];

    $this->dispara_email_upload($data);

    return redirect()->back()->with('success', "Base de dados enviada com sucesso.");
}


public function dispara_email_upload($data) {
  // If upload was successful
  // send the email
  $to_email = [];
  //$to_email[0] = "lemos@drbeneficio.com.br";
  //$to_email[1] = "adriana@drbeneficio.com.br";
  $to_email[0] = "suporte@elaboraweb.com.br";

  \Mail::to($to_email)->send(new \App\Mail\Upload($data));
}

public function dispara_email_alerta($data) {
  // If upload was successful
  // send the email
  $to_email = [];
//  $to_email[0] = "lemos@drbeneficio.com.br";
//  $to_email[1] = "adriana@drbeneficio.com.br";
  $to_email[0] = "suporte@elaboraweb.com.br";

  //dd($data);

  \Mail::to($to_email)->send(new \App\Mail\GenericoSemAnexo($data));
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
