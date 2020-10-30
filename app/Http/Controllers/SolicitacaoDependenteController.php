<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use DB;

class SolicitacaoDependenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        return view('SolicitacaoDependente.solicitacaoDependente');
    }
    
     public function solicitacaodependentePOST(Request $request) {
      $info_email = [];
      $data = request()->all();
      $info_email['assunto'] = "Solicitação Dependente ASPMPG";
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

      $info_email['mensagem'] .= "<b>CPF:</b> " . $data['cpf'];
      $info_email['mensagem'] .= "<br />";

      $info_email['mensagem'] .= "<b>Nome:</b> " . $data['nome'];
      $info_email['mensagem'] .= "<br />";
      
        $info_email['mensagem'] .= "<b>Data Nascimento:</b> " . $data['dt_nasc'];
      $info_email['mensagem'] .= "<br />";
      
       $info_email['mensagem'] .= "<b>Parentesco:</b> " . $data['parentesco'];
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

}
