<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;

class PropostaVendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      app('App\Http\Controllers\LoginCPFController')->processaCoresDrBeneficio();
      return view('PropostaVenda.index');
    }
    public function dispara() {
      $data = request()->all();
      $info_email = [];
      $info_email['assunto'] = "Nova proposta de venda";
      $info_email['mensagem'] = "";

      foreach ($data as $key => $value) {
        if (!is_array($value)) {
          $info_email['mensagem'] .= "<b>".$key.":</b> " . $value;
          $info_email['mensagem'] .= "<br />";
        }

        if ($key == "dadosTitular") {
          $info_email['mensagem'] .= "<br />";
          $info_email['mensagem'] .= "<b>DADOS DO TITULAR</b>";
          $info_email['mensagem'] .= "<br />";
          $info_email['mensagem'] .= "<br />";
          foreach ($value as $key2 => $value2) {
            $info_email['mensagem'] .= "<b>".$key2.":</b> " . $value2;
            $info_email['mensagem'] .= "<br />";
          }
        }

        if ($key == "dadosDependentes") {
          $info_email['mensagem'] .= "<br />";
          $info_email['mensagem'] .= "<b>DADOS DOS DEPENDENTES</b>";
          $info_email['mensagem'] .= "<br />";
          $info_email['mensagem'] .= "<br />";

          foreach ($value as $key3 => $value3) {
            $info_email['mensagem'] .= "<br />";
            $info_email['mensagem'] .= "<b>DEPENDENTE</b>";
            $info_email['mensagem'] .= "<br />";
            foreach ($value3 as $key4 => $value4) {
              $info_email['mensagem'] .= "<b>".$key4.":</b> " . $value4;
              $info_email['mensagem'] .= "<br />";
            }
          }

        }

      }

      $to_email = [];
      $to_email[0] = "miyashiro@drbeneficio.com.br";
      $to_email[1] = "freitas@drbeneficio.com.br";
      $to_email[2] = "montoro@drbeneficio.com.br";
      $to_email[3] = "lemos@drbeneficio.com.br";
      $to_email[4] = "adriana@drbeneficio.com.br";
      $to_email[5] = "marcos@drbeneficio.com.br";

      try {
      \Mail::to($to_email)->send(new \App\Mail\GenericoSemAnexo($info_email));
      return ["status" => "sucesso"];
      } catch (\Exception $e) {
        return $e;
      }
    }

}
