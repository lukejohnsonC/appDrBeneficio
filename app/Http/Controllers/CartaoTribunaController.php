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
    public function index($id = "2")
    {
    $return = $this->geraCartao($id);
    return view('CartaoTribuna.index', $return);
    }

    public function geraCartao($id = "2") {
      $guzzle = new \GuzzleHttp\Client();
      $request = $guzzle->get('http://aspin.atribuna.com.br:8081/ScapSOA/service/find/client?id=' . $id, [
      ]);

     $data = json_decode($request->getBody()->getContents());
     $data = $data[0];
     //dd($data);

     $return = [];
     $return["data"] = $data;

     $request2 = $guzzle->get('http://aspin.atribuna.com.br:8081/ScapSOA/service/check/login/signature/login/'.$data->nmEmail.'/password/' . $data->nmSenhaSite, []);

      $return['validade'] = "";
      $return['nr_rd'] = DB::table('tb_producao_cliente')->where('id_producao_cliente', Session::get('admin_id'))->select('nr_rd')->first()->nr_rd;

     if($request2) {
      $data2 = json_decode($request2->getBody()->getContents());
      if ($data2) {
        $return['validade'] = formata_data($data2->dtValidade);
      }
    }

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
      $data['nr_rd'] = DB::table('tb_producao_cliente')->where('id_producao_cliente', Session::get('admin_id'))->select('nr_rd')->first()->nr_rd;
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
      $data["listaFarmacias"][] = array(
        "loja" => "Loja 1",
        "endereco" => "Av dos testes 1",
        "bairro" => "Bairro dos testes 1",
      );

      $data["listaFarmacias"][] = array(
        "loja" => "Loja 2",
        "endereco" => "Av dos testes 2",
        "bairro" => "Bairro dos testes 2",
      );

      $data["listaFarmacias"][] = array(
        "loja" => "Loja 3",
        "endereco" => "Av dos testes 3",
        "bairro" => "Bairro dos testes 3",
      );

      $data['forceEnableWhats'] = true;

      return view('CartaoTribuna.aoPharmaceutico.redeCredenciada', $data);
    }


    public function login() {
      dd("post login");
      $request = Request::all();
      $request["cpf"] = preg_replace('/[^A-Za-z0-9\-]/', '', $request["cpf"]);
      $request["cpf"] = str_replace('-', '', $request["cpf"]);
      $request["nascimento"] = str_replace('/', '-', $request["nascimento"] );
      $request["nascimento"] = date("Y-m-d", strtotime($request["nascimento"]));
      //$request["nascimento"]
      //dd($request);

      $validator = Validator::make($request,
          [
              'cpf' => 'required|string|max:11',
              'nascimento' => 'required',
          ]
      );

      if ($validator->fails()) {
          $message = $validator->errors()->all();
          return redirect()->back()->with(['message' => implode(', ', $message), 'message_type' => 'danger']);
      }

      $cpf = $request["cpf"];
      $nascimento = $request["nascimento"];

      dd($cpf);
      dd($nascimento);
      //pos login

      /*
      Session::put('admin_id', $usuario->id_producao_cliente);
      Session::put('admin_name', $usuario->nm_nome);
      Session::put('admin_cpf', $cpf);
      Session::put('admin_dt_nasc', $usuario->cd_dt_nasc);

      //Verifica se há mais de um pedido
      $pedidos = DB::table('tb_producao_titularidade')->where('id_producao_cliente', $usuario->id_producao_cliente)->get();
      Session::put('admin_qtd_pedido', count($pedidos));

      if(count($pedidos) > 1) {
          return redirect()->route('cliente_modal');
      }

      Session::put('admin_id_pedido', $usuario->id_pedido);
      return redirect()->route('cliente.index');

      */
    }






    public function logout()
    {
        $loginBloqueiaCards = Session::get('loginBloqueiaCards');
        Session::flush();
        Session::put('loginBloqueiaCards', $loginBloqueiaCards);
        //return redirect()->route('login.index')->with('message', 'Logout realizado com sucesso');
        return \Redirect::to('http://clube.atribuna.com.br/');
    }
}
