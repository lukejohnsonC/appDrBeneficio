<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gestor;
use DB;
use App\Producao_Cliente;
use DataTables;
use Session;
use Route;
use Excel;
use App\Classes\ClasseExport;
use App\Classes\ClasseExportLayout;

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


     public function alteraPedidoAtivo($id_pedido) {
       $pedido = DB::table('tb_pedido')->where('id_pedido', $id_pedido)->first();
       Session::put('gestor_pedido_selecionado', $pedido);

       if(url()->previous() == route('gestor.postDashboard')) {
         return redirect(route('gestor.dashboard'));
       }
       return redirect()->back();
     }


    public function index()
    {
      $arrayPedidos = array(Session::get('gestor_pedido_selecionado')->id_pedido);

      $data = [];
      $data['total'] = $this->grafico_qtd_total($arrayPedidos);
      $data['grafico_qtd_mes'] = $this->grafico_qtd_mes($arrayPedidos);
      $data['retornaPedidosSelecionados'] = $this->retornaPedidosSelecionados($arrayPedidos);
      $data['grafico_movimentacao_mensal'] = $this->grafico_movimentacao_mensal($arrayPedidos);
      $data['ano_atual'] = date("Y");

      return view('gestor.dashboard', $data);
    }

    public function postDashboard(Request $request) {
      if(!isset($request->all()['pedidos'])) {
        return redirect(route('gestor.dashboard'));
      }

      $arrayPedidos = $request->all()['pedidos'];

      $data = [];
      $data['total'] = $this->grafico_qtd_total($arrayPedidos);
      $data['grafico_qtd_mes'] = $this->grafico_qtd_mes($arrayPedidos);
      $data['retornaPedidosSelecionados'] = $this->retornaPedidosSelecionados($arrayPedidos);
      $data['grafico_movimentacao_mensal'] = $this->grafico_movimentacao_mensal($arrayPedidos);
      $data['ano_atual'] = date("Y");

      return view('gestor.dashboard', $data);
    }



















    public function grafico_movimentacao_mensal($pedidos) {
      $data['grafico_qtd_mes'] = [];

      /*  for ($i = 0; $i <= 12; $i++) {
            $months[] = date("Y-m", strtotime( date( 'Y-m-01' )." -$i months"));
        }
        $months = array_reverse($months);
      */

      $ano_atual = date("Y");
      $months = [];
      for ($i=01; $i < 13 ; $i++) {
        $months[] = $ano_atual . "-" . str_pad($i, 2, '0', STR_PAD_LEFT);
      }

      foreach($months as $m) {
        /*$qtd_entradas_mes = DB::table('tb_producao_cliente')
        ->where('dt_ativacao', '>=', $m . '-01')
        ->where('dt_ativacao', '<=', $m . '-31')
        ->whereIn('id_pedido', $pedidos)
        ->count();*/

        $qtd_entradas_mes = DB::table('tb_mov_entrada as me')
        ->leftjoin('tb_producao_cliente as pc', 'me.id_producao_cliente', 'pc.id_producao_cliente')
        ->where('me.data', '>=', $m . '-00')
        ->where('me.data', '<=', $m . '-31')
        ->whereIn('pc.id_pedido', $pedidos)
        ->count();



    /*    $qtd_saidas_mes = DB::table('tb_producao_cliente')
        ->where('dt_cancelamento', '>=', $m . '-01')
        ->where('dt_cancelamento', '<=', $m . '-31')
        ->whereIn('id_pedido', $pedidos)
        ->count(); */

        $qtd_saidas_mes = DB::table('tb_mov_saida as ms')
        ->leftjoin('tb_producao_cliente as pc', 'ms.id_producao_cliente', 'pc.id_producao_cliente')
        ->where('ms.data', '>=', $m . '-00')
        ->where('ms.data', '<=', $m . '-31')
        ->whereIn('pc.id_pedido', $pedidos)
        ->count();

        //dd($qtd_saidas_mes);

        $data['grafico_qtd_mes'][formata_data_sem_dia($m)]['entradas'] = $qtd_entradas_mes;
        $data['grafico_qtd_mes'][formata_data_sem_dia($m)]['saidas'] = $qtd_saidas_mes;
      }

      return $data['grafico_qtd_mes'];
    }



























    public function grafico_qtd_total($pedidos) {
      return DB::table('tb_producao_cliente')
      ->whereIn('id_pedido', $pedidos)
      ->where('cd_status', 'ATIVO')
      ->count();
    }

    public function grafico_qtd_mes($pedidos) {
      $data['grafico_qtd_mes'] = [];

    /*  for ($i = 0; $i <= 12; $i++) {
          $months[] = date("Y-m", strtotime( date( 'Y-m-01' )." -$i months"));
      }
      $months = array_reverse($months);
    */

    $ano_atual = date("Y");
    $months = [];
    for ($i=01; $i < 13 ; $i++) {
      $months[] = $ano_atual . "-" . str_pad($i, 2, '0', STR_PAD_LEFT);
    }

    $dataStart = "2019-12";

      foreach($months as $m) {
  /*      if($m . "-01" <= date("Y-m") . "-31") {
          $qtd_months_todos = DB::table('tb_producao_cliente')
          //->where('created_at', '>=', $m . '-01')
          ->where('dt_ativacao', '<=', $m . '-31')
          //->where('cd_status', 'ATIVO')
          //->where('id_pedido', Session::get('gestor_pedido_selecionado')->id_pedido)
          ->whereIn('id_pedido', $pedidos)
          ->count();

          $qtd_months_inativos = DB::table('tb_producao_cliente')
          //->where('created_at', '>=', $m . '-01')
          ->where('dt_cancelamento', '<=', $m . '-31')
          //->where('cd_status', 'ATIVO')
          //->where('id_pedido', Session::get('gestor_pedido_selecionado')->id_pedido)
          ->whereIn('id_pedido', $pedidos)
          ->count();

          $qtd_months = $qtd_months_todos - $qtd_months_inativos;
          $data['grafico_qtd_mes'][formata_data_sem_dia($m)] = $qtd_months;
        } else {
          $data['grafico_qtd_mes'][formata_data_sem_dia($m)] = 0;
        } */

        if($m . "-01" <= date("Y-m") . "-31") {
          //dd($pedidos);
          $qtd = DB::table('tb_mov_total')
          ->where('data', '>=', $m . '-00')
          ->where('data', '<=', $m . '-31')
          ->whereIn('id_pedido', $pedidos)
          ->select('qtd')
          ->first();

          if ($qtd) {
            $qtd = $qtd->qtd;
          } else {
            $qtd = 0;
          }

          //dd($qtd->qtd);

          $data['grafico_qtd_mes'][formata_data_sem_dia($m)] = $qtd;
        } else {
          $data['grafico_qtd_mes'][formata_data_sem_dia($m)] = 0;
        }




      }

      return $data['grafico_qtd_mes'];
    }


    public function retornaPedidosSelecionados($pedidos) {
      $selecionados = [];
      foreach($pedidos as $p) {
        $selecionados[$p] = true;
      }
      return $selecionados;
    }



    public function vidas() {
        return view('gestor.vidas');
    }

    public function ProducaoClienteAPI() {
        return DataTables::of(
            Producao_Cliente::query()
            ->where('id_pedido', Session::get('gestor_pedido_selecionado')->id_pedido)
            ->where('cd_status', 'ATIVO')
          )->make(true);
    }

    public function vidasExcluir() {
        $data = request()->all();
        $info_email = [];
        $info_email['assunto'] = "Vida excluida na Área do Gestor";

        $data['dt_zendesk_sync'] = null;
        $data['ie_zendesk_sync'] = null;

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
        $info_email['mensagem'] .= Session::get('gestor')->name;
        $info_email['mensagem'] .= "<br />";

        $info_email['mensagem'] .= "<b>Data e hora da exclusão: </b>";
        $info_email['mensagem'] .= formata_data(NOW()) . " as " . formata_hora(NOW());
        $info_email['mensagem'] .= "<br />";

      $this->dispara_email_alerta($info_email);



      $info_email_gestor = [];
      $info_email_gestor['assunto'] = "DR. BENEFÍCIO: ALTERAÇÃO PORTAL DO GESTOR";
      $info_email_gestor['mensagem'] = "Prezado " . Session::get('gestor')->name . ",";
      $info_email_gestor['mensagem'] .= "<br />";
      $info_email_gestor['mensagem'] .= "Foi removido um registro no contrato " . $data['id_pedido'] . " - " . $pedido->cd_pedido;
      $info_email_gestor['mensagem'] .= "<br />";
      $info_email_gestor['mensagem'] .= "<br />";

      $info_email_gestor['mensagem'] .= "<b>Registro excluído: </b>";
      $info_email_gestor['mensagem'] .= $data['nm_nome'];
      $info_email_gestor['mensagem'] .= "<br />";

      $info_email_gestor['mensagem'] .= "<b>ID: </b>";
      $info_email_gestor['mensagem'] .= $data['id_producao_cliente'];
      $info_email_gestor['mensagem'] .= "<br />";

      $info_email_gestor['mensagem'] .= "<br />";

      $info_email_gestor['mensagem'] .= "<b>Excluída por: </b>";
      $info_email_gestor['mensagem'] .= Session::get('gestor')->name;
      $info_email_gestor['mensagem'] .= "<br />";

      $info_email_gestor['mensagem'] .= "<b>Data e hora da exclusão: </b>";
      $info_email_gestor['mensagem'] .= formata_data(NOW()) . " as " . formata_hora(NOW());
      $info_email_gestor['mensagem'] .= "<br />";

      $info_email_gestor['mensagem'] .= "<br />";

      $info_email_gestor['mensagem'] .= "Caso você não tenha realizado essas alterações, por favor entrar em contato através do telefone 1332261111 ou do email suporte@drbeneficio.com.br.";
      $info_email_gestor['mensagem'] .= "<br />";
      $info_email_gestor['mensagem'] .= "<br />";
      $info_email_gestor['mensagem'] .= "Dúvidas estamos a disposição.";
      $info_email_gestor['mensagem'] .= "<br />";
      $info_email_gestor['mensagem'] .= "<br />";
      $info_email_gestor['mensagem'] .= "Obrigado.";

      $this->dispara_email_gestor($info_email_gestor);

      return ["status" => "sucesso", "mensagem" => "Registro ".$data['nm_nome']." excluído com sucesso."];
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

        $data['dt_zendesk_sync'] = null;
        $data['ie_zendesk_sync'] = null;

        DB::table('tb_producao_cliente')
        ->where('id_producao_cliente', $data['id_producao_cliente'])
        ->update($data);

        $info_email = [];
        $info_email['assunto'] = "Vida editada na Área do Gestor";

        $pedido = Session::get('gestor_pedido_selecionado');

        $info_email['mensagem'] = "Uma vida foi editada na base.";
        $info_email['mensagem'] .= "<br />";
        $info_email['mensagem'] .= "<br />";

        $info_email['mensagem'] .= "<b>Vida editada: </b>";
        $info_email['mensagem'] .= $data['nm_nome'];
        $info_email['mensagem'] .= "<br />";

        $info_email['mensagem'] .= "<b>ID Produção Cliente: </b>";
        $info_email['mensagem'] .= $data['id_producao_cliente'];
        $info_email['mensagem'] .= "<br />";

        $info_email['mensagem'] .= "<b>Pedido: </b>";
        $info_email['mensagem'] .= "#".$pedido->id_pedido . " - " . $pedido->cd_pedido;
        $info_email['mensagem'] .= "<br />";

        $info_email['mensagem'] .= "<br />";

        $info_email['mensagem'] .= "<b>Editada por: </b>";
        $info_email['mensagem'] .= Session::get('gestor')->name;
        $info_email['mensagem'] .= "<br />";

        $info_email['mensagem'] .= "<b>Data e hora da edição: </b>";
        $info_email['mensagem'] .= formata_data(NOW()) . " as " . formata_hora(NOW());
        $info_email['mensagem'] .= "<br />";

        $this->dispara_email_alerta($info_email);

        $info_email_gestor = [];
        $info_email_gestor['assunto'] = "DR. BENEFÍCIO: ALTERAÇÃO PORTAL DO GESTOR";
        $info_email_gestor['mensagem'] = "Prezado " . Session::get('gestor')->name . ",";
        $info_email_gestor['mensagem'] .= "<br />";
        $info_email_gestor['mensagem'] .= "Foi editado um registro no contrato " . $pedido->id_pedido . " - " . $pedido->cd_pedido;
        $info_email_gestor['mensagem'] .= "<br />";
        $info_email_gestor['mensagem'] .= "<br />";

        $info_email_gestor['mensagem'] .= "<b>Registro editado: </b>";
        $info_email_gestor['mensagem'] .= $data['nm_nome'];
        $info_email_gestor['mensagem'] .= "<br />";

        $info_email_gestor['mensagem'] .= "<b>ID: </b>";
        $info_email_gestor['mensagem'] .= $data['id_producao_cliente'];
        $info_email_gestor['mensagem'] .= "<br />";

        $info_email_gestor['mensagem'] .= "<br />";

        $info_email_gestor['mensagem'] .= "<b>Editado por: </b>";
        $info_email_gestor['mensagem'] .= Session::get('gestor')->name;
        $info_email_gestor['mensagem'] .= "<br />";

        $info_email_gestor['mensagem'] .= "<b>Data e hora da edição: </b>";
        $info_email_gestor['mensagem'] .= formata_data(NOW()) . " as " . formata_hora(NOW());
        $info_email_gestor['mensagem'] .= "<br />";

        $info_email_gestor['mensagem'] .= "<br />";

        $info_email_gestor['mensagem'] .= "Caso você não tenha realizado essas alterações, por favor entrar em contato através do telefone 1332261111 ou do email suporte@drbeneficio.com.br.";
        $info_email_gestor['mensagem'] .= "<br />";
        $info_email_gestor['mensagem'] .= "<br />";
        $info_email_gestor['mensagem'] .= "Dúvidas estamos a disposição.";
        $info_email_gestor['mensagem'] .= "<br />";
        $info_email_gestor['mensagem'] .= "<br />";
        $info_email_gestor['mensagem'] .= "Obrigado.";

        $this->dispara_email_gestor($info_email_gestor);

        return ["status" => "sucesso", "mensagem" => "Registro editado com sucesso"];
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
        if(isset(Session::get('gestor')->su) && Session::get('gestor')->su == 1) {
          $data = [];
          $data['pedidos'] = DB::table('tb_pedido')->get();

          return view('gestor.auth.register', $data);
        }

        return redirect(route('gestor.dashboard'))->with('error', "Você não tem permissão para acessar esta área.");
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
        $rules = [
          'name'          => 'required',
          'email'         => 'required|unique:areadocliente_gestores_users,email',
          'password'      => 'required|confirmed|min:6',
          'pedidos'       => 'required'
        ];

        $customMessages = [
            'required' => 'O campo :attribute é obrigatório',
            'confirmed' => 'As senhas são diferentes.',
            'min' => 'A senha precisa conter pelo menos 6 caracteres',
            'unique' => 'O e-mail já está cadastrado.'
        ];

        $this->validate($request, $rules, $customMessages);

        // store in the database
        $gestores = new Gestor;
        $gestores->name = $request->name;
        $gestores->email = $request->email;
        $gestores->su = $request->su;
        $gestores->password=bcrypt($request->password);

        $gestores->save();

        foreach($request->pedidos as $p) {
          DB::table('areadocliente_gestores_pedidos')->insert(
              ['ID_GESTOR' => $gestores->id, 'ID_PEDIDO' => $p]
          );
        }

        return redirect()->route('gestor.dashboard')->with('success', "Gestor criado com sucesso.");
    }

    public function upload() {
      $data = [];
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

    $info_email = [];
    $info_email['document'] = $document;
    $info_email['assunto'] = "Base enviada via Área do Gestor";

    $pedido = Session::get('gestor_pedido_selecionado');

    $info_email['mensagem'] = "Base de dados enviada via Área do Gestor.";
    $info_email['mensagem'] .= "<br />";
    $info_email['mensagem'] .= "<br />";

    $info_email['mensagem'] .= "<b>Tipo da base: </b>";
    $info_email['mensagem'] .= $request->input('tipo')[0];
    $info_email['mensagem'] .= "<br />";

    $info_email['mensagem'] .= "<b>Pedido: </b>";
    $info_email['mensagem'] .= "#".$pedido->id_pedido . " - " . $pedido->cd_pedido;
    $info_email['mensagem'] .= "<br />";

    $info_email['mensagem'] .= "<br />";

    $info_email['mensagem'] .= "<b>Enviada por: </b>";
    $info_email['mensagem'] .= Session::get('gestor')->name;
    $info_email['mensagem'] .= "<br />";

    $info_email['mensagem'] .= "<b>Data e hora do envio: </b>";
    $info_email['mensagem'] .= formata_data(NOW()) . " as " . formata_hora(NOW());
    $info_email['mensagem'] .= "<br />";

    $this->dispara_email_anexo($info_email);

    return redirect()->back()->with('success', "Base de dados enviada com sucesso.");
}

public function exportaBaseFull() {
    $envia = [];
    $envia['tabela'] = "tb_producao_cliente";

    //A lógica de baixar a base de multiplos pedidos já está pronta, basta passar na variavel abaixo o id dos pedidos separados por ;
    $envia['pedidos'] = Session::get('gestor_pedido_selecionado')->id_pedido;
    Session::put('dados', $envia);
    $nome_arquivo = "BASE_FULL__" . str_replace(" ", "_",Session::get('gestor_pedido_selecionado')->cd_pedido) . "__" . str_replace("/", "_",formata_data(now())) . "__" . str_replace(":", "_",formata_hora(now())) . ".xlsx";
    return Excel::download(new ClasseExport, $nome_arquivo);

    return redirect()->back()->with('success', "Base full gerada com sucesso.");
}

public function exportaLayout() {
  //dd("exportaLayout");
  $envia = [];
  $envia['tabela'] = "tb_producao_cliente";
  Session::put('dados', $envia);
  $nome_arquivo = "LAYOUT__" . str_replace(" ", "_",Session::get('gestor_pedido_selecionado')->cd_pedido) . "__" . str_replace("/", "_",formata_data(now())) . "__" . str_replace(":", "_",formata_hora(now())) . ".xlsx";
  return Excel::download(new ClasseExportLayout, $nome_arquivo);

  return redirect()->back()->with('success', "Layout gerado com sucesso.");
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


    public function dispara_email_anexo($data) {
      // If upload was successful
      // send the email
      $to_email = [];
      $to_email[0] = "lemos@drbeneficio.com.br";
      $to_email[1] = "adriana@drbeneficio.com.br";
      //$to_email[0] = "suporte@elaboraweb.com.br";

      \Mail::to($to_email)->send(new \App\Mail\Anexo($data));
    }

    public function dispara_email_alerta($data) {
      // If upload was successful
      // send the email
      $to_email = [];
      $to_email[0] = "lemos@drbeneficio.com.br";
      $to_email[1] = "adriana@drbeneficio.com.br";
      //$to_email[0] = "suporte@elaboraweb.com.br";

      //dd($data);

      \Mail::to($to_email)->send(new \App\Mail\GenericoSemAnexo($data));
    }

    public function dispara_email_gestor($data) {
      // If upload was successful
      // send the email
      $to_email = [];
      $to_email[0] = Session::get('gestor')->email;
      //$to_email[0] = "suporte@elaboraweb.com.br";

      //dd($data);

      \Mail::to($to_email)->send(new \App\Mail\GenericoSemAnexo($data));
    }




}
