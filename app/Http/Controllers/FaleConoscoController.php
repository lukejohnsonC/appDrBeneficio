<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use DB;

class FaleConoscoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('FaleConosco.index');
    }

    public function verCONTATO($id_menu) {
        $menu = DB::table('areadocliente_menu')->where("ID_MENU", $id_menu)->first();
       // dd($menu);
        $data = [];
        $data['conteudo'] = $menu->CONTEUDO;
        return view('FaleConosco.verContato', $data);
    }

    public function faleconoscoPOST(Request $request) {
      $info_email = [];
      $data = request()->all();
      $info_email['assunto'] = "Mensagem Fale Conosco Área do Cliente";
      $info_email['mensagem'] = "";

      $info_email['mensagem'] .= "<b>USUÁRIO</b>";
      $info_email['mensagem'] .= "<br />";

      $info_email['mensagem'] .= "<b>Nome:</b> " . Session::get('admin_name');
      $info_email['mensagem'] .= "<br />";

      $checkAtribuna = Session::get('cda_info');

      if ($checkAtribuna) {
        $info_email['mensagem'] .= "<b>Código do Assinante:</b> " . $checkAtribuna->nuCliente;
        $info_email['mensagem'] .= "<br />";
        if ($checkAtribuna->tpLogin == "T") {
          $info_email['mensagem'] .= "<b>Tipo do Assinante:</b> Titular";
          $info_email['mensagem'] .= "<br />";
        }
        if ($checkAtribuna->tpLogin == "D") {
          $info_email['mensagem'] .= "<b>Tipo do Assinante:</b> Dependente";
          $info_email['mensagem'] .= "<br />";
        }
      } else {
        $info_email['mensagem'] .= "<b>ID Produção Cliente:</b> " . Session::get('admin_id');
        $info_email['mensagem'] .= "<br />";
      }

      $info_email['mensagem'] .= "<b>CPF:</b> " . Session::get('admin_cpf');
      $info_email['mensagem'] .= "<br />";

      $info_email['mensagem'] .= "<b>Pedido:</b> " . Session::get('admin_id_pedido');
      $info_email['mensagem'] .= "<br />";

      $info_email['mensagem'] .= "<br />";

      $info_email['mensagem'] .= "<b>Tipo:</b> " . $data['tipoErro'];
      $info_email['mensagem'] .= "<br />";

      $info_email['mensagem'] .= "<b>Mensagem:</b> " . $data['conteudo'];
      $info_email['mensagem'] .= "<br />";

      $to_email = [];
      $to_email[] = "adriana@drbeneficio.com.br";
      $to_email[] = "atendimento@drbeneficio.com.br";
      $to_email[] = "lemos@drbeneficio.com.br";
      $to_email[] = "montoro@drbeneficio.com.br";
      $to_email[] = "freitas@drbeneficio.com.br";

      //Verifica se há anexo
      $document = $request->file('document');

      if ($document) {
        //Com anexo
        if ($document->getError() == 1) {
            $max_size = $document->getMaxFileSize() / 1024 / 1024;  // Get size in Mb
            $error = 'O documento é maior do que ' . $max_size . 'Mb.';
            return redirect()->back()->with('error', $error);
        }
        $info_email['document'] = $document;
        try {
          \Mail::to($to_email)->send(new \App\Mail\Anexo($info_email));
        } catch (\Exception $e) {
          return redirect()->back()->with('message', $e);
        }
        return redirect()->back()->with('message', 'Email enviado com sucesso.');
      } else {
        // Sem anexo
        try {
          \Mail::to($to_email)->send(new \App\Mail\GenericoSemAnexo($info_email));
        } catch (\Exception $e) {
          return redirect()->back()->with('message', 'Email enviado com sucesso.');
        }
        return redirect()->back()->with('message', 'Email enviado com sucesso.');
      }

    }


    public function verFORM_DINAMICO($id_menu) {
       $menu = DB::table('areadocliente_menu')->where("ID_MENU", $id_menu)->first();
       $data = [];
       $data['conteudo'] = $menu->CONTEUDO;
       return view('FaleConosco.verFORM_DINAMICO', $data);
    }

    public function form_dinamico_post(Request $request) {      
      $data = request()->all();

      if(!isset($data['_destinatario'])) {
        return redirect()->back()->with('message', 'O seu formulário dinâmico está errado. Você precisa inserir esse campo na criação do html: <input type="hidden" name="_destinatario" value="ENDERECO_DE_EMAIL_DO_DESTINATARIO" required />');
      }
      
      if(!isset($data['_assunto'])) {
        return redirect()->back()->with('message', 'O seu formulário dinâmico está errado. Você precisa inserir esse campo na criação do html: <input type="hidden" name="_assunto" value="ASSUNTO" required />');
      }
      
      if(!isset($data['_msg_anterior'])) {
        return redirect()->back()->with('message', 'O seu formulário dinâmico está errado. Você precisa inserir esse campo na criação do html: <input type="hidden" name="_msg_anterior" value="Mensagem que aparecerá antes dos campos do formulário. Deixar em branco para que essa mensagem não apareça." />');
      }

      if(!isset($data['_msg_posterior'])) {
        return redirect()->back()->with('message', 'O seu formulário dinâmico está errado. Você precisa inserir esse campo na criação do html: <input type="hidden" name="_msg_posterior" value="Mensagem que aparecerá após os campos do formulário. Deixar em branco para que essa mensagem não apareça." />');
      }

      $info_email['assunto'] = $data['_assunto'];
      $info_email['mensagem'] = "";

      if($data['_msg_anterior'] != "NADA") {
        $info_email['mensagem'] .= $data['_msg_anterior'];
      }
      

      $info_email['mensagem'] .= "<br />";
      $info_email['mensagem'] .= "<br />";     
      
      foreach ($data as $key => $d) {        
        if(substr($key, 0, 1) != "_") {
          $info_email['mensagem'] .= "<b>".$key.":</b> " . $d;
          $info_email['mensagem'] .= "<br />";     
        }
      }

      $info_email['mensagem'] .= "<br />";     
      
      if($data['_msg_posterior'] != "NADA") {
        $info_email['mensagem'] .= $data['_msg_posterior'];
      }
      
      $to_email = explode(";", $data['_destinatario']);
    
      try {
        \Mail::to($to_email)->send(new \App\Mail\GenericoSemAnexo($info_email));
      } catch (\Exception $e) {
          //dd($e);
        return redirect()->back()->with('message', 'Erro no disparo de email.');
      }

      return redirect()->back()->with('message', 'Email enviado com Sucesso!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
