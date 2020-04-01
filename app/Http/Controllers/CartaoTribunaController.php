<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use DB;
use Session;

class CartaoTribunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function cliente() {

    }

    public function index()
    {
    $return = $this->geraCartao();
    return view('CartaoTribuna.index', $return);
    }

    public function geraCartao() {

     $data = Session::get('cda_info');
     $validade = Session::get('cda_validade');
     $return = [];
     $return['validade'] = "";
     if ($validade) {
       $return['validade'] = formata_data($validade);
     }

//     $return['nr_rd'] = DB::table('atribuna_base')->where('cod', $data->nuCliente)->select('nr_rd')->first()->nr_rd;
     $return["data"] = $data;
     return $return;
    }

    public function redeSaudeDrBeneficio() {
      $data = [];
      $data['forceEnableWhats'] = true;
      return view('CartaoTribuna.redeSaudeDrBeneficio', $data);
    }

    public function redeSaudeDrBeneficio_consulta() {
      $data = [];
      $data['forceEnableWhats'] = true;
      return view('CartaoTribuna.consultaExame.index', $data);
    }

    public function redeSaudeDrBeneficio_consulta_comousar() {
      $data = [];
      $data['forceEnableWhats'] = true;
      return view('CartaoTribuna.consultaExame.comousar', $data);
    }

    public function redeSaudeDrBeneficio_consulta_redemedica() {
      $data = [];
      $data['forceEnableWhats'] = true;
      $data['ocultaAgendamento'] = false;
      $data['linkAgendamento'] = route('cartaotribuna.redeSaudeDrBeneficio_consulta_comousar');
      $data['textoAgendamento'] = "Como agendar?";
      return view('ConsultasExames.redeCredenciadas', $data);
    }

    public function redeSaudeDrBeneficio_consulta_redeodonto() {
      $data = [];
      $data['forceEnableWhats'] = true;
      $data['ocultaAgendamento'] = false;
      $data['linkAgendamento'] = route('cartaotribuna.redeSaudeDrBeneficio_consulta_comousar');
      $data['textoAgendamento'] = "Como agendar?";
      $redes = app('App\Http\Controllers\OdontoController')->getRedes();
      $data['redes'] = [];

      $order = array(
        0 => "SANTOS",
        1 => "SAO VICENTE",
        2 => "PRAIA GRANDE",
        3 => "GUARUJA",
        4 => "CUBATAO"
      );

      foreach ($order as $key => $value) {
        if(isset($redes[$value])) {
            $data['redes'][$value] = $redes[$value];
            unset($redes[$value]);
        }
      }

      if (count($redes) > 0) {
        foreach ($redes as $key => $value) {
          $data['redes'][$key] = $value;
        }
      }

      return view('Odonto.odontoRedeCredenciada', $data);
    }

    public function redeSaudeDrBeneficio_raiaDrogasil() {
      $data = [];
      $data['forceEnableWhats'] = true;
      return view('CartaoTribuna.raiaDrogasil.index', $data);
    }

    public function redeSaudeDrBeneficio_raiaDrogasil_comousar() {
      $data = [];
      //$data['nr_rd'] = DB::table('tb_producao_cliente')->where('id_producao_cliente', Session::get('admin_id'))->select('nr_rd')->first()->nr_rd;
      $cda_info = Session::get('cda_info');
      $data['nr_rd'] = DB::table('atribuna_base')->where('cod', $cda_info->nuCliente)->select('nr_rd')->first()->nr_rd;
      if (!$data['nr_rd']) {
        //$data['nr_rd'] = Session::get('admin_id_pedido') . $cda_info->nuCliente;
        $data['nr_rd_nao_existe'] = true;
      }
      $data['forceEnableWhats'] = true;
      return view('CartaoTribuna.raiaDrogasil.comousar', $data);
    }

    public function redeSaudeDrBeneficio_aopharmaceutico() {
      $data = [];
      $data['forceEnableWhats'] = true;
      return view('CartaoTribuna.aoPharmaceutico.index', $data);
    }

    public function redeSaudeDrBeneficio_aopharmaceutico_comousar() {
      $data = [];
      $data['forceEnableWhats'] = true;
      $cartao = $this->geraCartao();
      foreach ($cartao as $key => $value) {
        $data[$key] = $value;
      }
      return view('CartaoTribuna.aoPharmaceutico.comousar', $data);
    }

    public function redeSaudeDrBeneficio_aopharmaceutico_redecredenciada() {
      $data = [];
      $data["listaFarmacias"]["SANTOS"][] = array(
        "loja" => "Pedro Lessa",
        "endereco" => "Av. Dr. Pedro Lessa, 1504 - Embaré",
        "telefone" => "1332717200",
      );

      $data["listaFarmacias"]["SANTOS"][] = array(
        "loja" => "Galeão Carvalhal",
        "endereco" => "R. Dr. Galeão Carvalhal, 38 - Gonzaga",
        "telefone" => "1332895858",
      );

      $data["listaFarmacias"]["SANTOS"][] = array(
        "loja" => "Ana Costa",
        "endereco" => "Av. Ana Costa, 232 - Vila Matias",
        "telefone" => "1332232330",
      );

      $data["listaFarmacias"]["SANTOS"][] = array(
        "loja" => "Pinheiro Machado",
        "endereco" => "Av. Senador Pinheiro Machado, 633 - Campo Grande",
        "telefone" => "1321045858",
      );

      $data["listaFarmacias"]["SÃO VICENTE"][] = array(
        "loja" => "Presidente Wilson",
        "endereco" => "Av. Presidente Wilson, 1272 A - Itararé",
        "telefone" => "1321045858",
      );

      $data["listaFarmacias"]["SÃO VICENTE"][] = array(
        "loja" => "São Vicente",
        "endereco" => "R. Jacob Emmerich, 438 - Centro",
        "telefone" => "1334697411",
      );

      $data["listaFarmacias"]["GUARUJÁ"][] = array(
        "loja" => "Guarujá",
        "endereco" => "Av. Leomil, 421 - Pitangueiras",
        "telefone" => "1333876600",
      );


      $data["listaFarmacias"]["PRAIA GRANDE"][] = array(
        "loja" => "Praia Grande",
        "endereco" => "Av. Pres. Costa e Silva, 710 - Boqueirão",
        "telefone" => "1335915757",
      );



      $data['forceEnableWhats'] = true;

      return view('CartaoTribuna.aoPharmaceutico.redeCredenciada', $data);
    }


    public function login() {
      if (Session::get('admin_id')) {
          return redirect()->route('cliente.index');
      }

      $info = DB::table('areadocliente_info')->where('ID_PC_BENEF', 19)->first();

      if($info && $info->ID_GOOGLE_ANALYTICS) {
        Session::put('admin_ID_GOOGLE_ANALYTICS', $info->ID_GOOGLE_ANALYTICS);
      }

      if($info && $info->LOGO) {
          Session::put('admin_logo', $info->LOGO);
      }

      if($info && $info->LOGO_DRBEN) {
          Session::put('admin_LOGO_DRBEN', 0);
      }

      if ($info && $info->colors_primary) {
        $colors['#primary'] = $info->colors_primary;
        Session::put('barra_superior', false);
      }

      if ($info && $info->colors_secondary) {
        $colors['#secondary'] = $info->colors_secondary;
        Session::put('barra_superior', false);
      }

      if ($info && $info->favicon) {
        Session::put('admin_FAVICON', $info->favicon);
      }

      if ($info && $info->title) {
        Session::put('admin_TITLE', $info->title);
      }

      if ($info && $info->DESABILITA_WHATSAPP) {
        Session::put('admin_DESABILITA_WHATSAPP', $info->DESABILITA_WHATSAPP);
      }

      if ($info && $info->BOTAO_VOLTAR) {
          Session::put('admin_BOTAO_VOLTAR', $info->BOTAO_VOLTAR);
      }

      if (isset($colors)) {
        Session::put('colors', $colors);
      }


      return view('CartaoTribuna.login');
    }

    public function formataCPF($cpf) {
      $cpf = preg_replace('/\D/', '', $cpf);
      $cpf = substr($cpf, 0, -2).'-'.substr($cpf, -2);
      return $cpf;
    }

/*
    public function loginPOST_ETAPA1() {
      $data = request()->all();
      //$nascimento = $data['nascimento'];
      $cpfcnpj = $data['cpfcnpj'];
      if ($data['tipo'] == "cpf") {
        $cpfcnpj = $this->formataCPF($cpfcnpj);
      }

      $checkCPFCNPJ = DB::table('atribuna_base')->where('cpf', $cpfcnpj)->first();
      if (!empty($checkCPFCNPJ)) {
        $return = ["status" => "sucesso", "content" => $checkCPFCNPJ];
      } else {
        $return = ["status" => "vazio"];
      }

      return $return;
      //return \Response::json($checkCPFCNPJ);
    }

    public function loginPOST_ETAPA2() {
      $data = request()->all();
      $nascimento = $data['nascimento'];
      $nascimento =  formata_data_db($nascimento);
      $cpfcnpj = $data['cpfcnpj'];
      if ($data['tipo'] == "cpf") {
        $cpfcnpj = $this->formataCPF($cpfcnpj);
      }

      $checkCPFCNPJ = DB::table('atribuna_base')
      ->where('cpf', $cpfcnpj)
      ->where('nascimento', $nascimento)
      ->first();
      if (!empty($checkCPFCNPJ)) {
        //Logar
        Session::put('admin_id', 99999999);
        Session::put('admin_id_pedido', 2176);
        Session::put('admin_name', $checkCPFCNPJ->nome);
        Session::put('admin_cpf', $checkCPFCNPJ->cpf);
        Session::put('admin_dt_nasc', $checkCPFCNPJ->nascimento);
        Session::put('admin_id_clube_assinante', $checkCPFCNPJ->cod);

        $return = ["status" => "sucesso", "content" => $checkCPFCNPJ];
      } else {
        $return = ["status" => "vazio"];
      }

      return $return;
      //return \Response::json($checkCPFCNPJ);
    } */

    public function loginPOST_ETAPA3() {
      $data = request()->all();
      $guzzle = new \GuzzleHttp\Client();
      $request = $guzzle->get('http://aspin.atribuna.com.br:8081/ScapSOA/service/check/login/signature/login/'.$data["email"].'/password/' . $data["senha"], []);

     $data = json_decode($request->getBody()->getContents());

     if ($data && $data->nuCliente) {
       $request2 = $guzzle->get('http://aspin.atribuna.com.br:8081/ScapSOA/service/find/client?id=' . $data->nuCliente, []);
       $data2 = json_decode($request2->getBody()->getContents());
       $data2 = $data2[0];

       //Logar
       Session::put('admin_id', 99999999);
       Session::put('admin_id_pedido', 2176);
       Session::put('admin_name', $data->nmCliente);
       Session::put('admin_cpf', $data2->nuCpfCnpj);
       Session::put('admin_dt_nasc', $data2->dtNasc);
       //Session::put('admin_id_clube_assinante', $data->nuCliente);
       Session::put('cda_info', $data2);
       Session::put('cda_validade', $data->dtValidade);

       $return = ["status" => "sucesso", "content" => $data];
     } else {
        $return = ["status" => "vazio"];
     }
      return $return;
    }








    public function logout()
    {
        $loginBloqueiaCards = Session::get('loginBloqueiaCards');
        Session::flush();
        Session::put('loginBloqueiaCards', $loginBloqueiaCards);
        //return redirect()->route('login.index')->with('message', 'Logout realizado com sucesso');
        return \Redirect::to('https://www.atribuna.com.br/clube/');
    }
}
