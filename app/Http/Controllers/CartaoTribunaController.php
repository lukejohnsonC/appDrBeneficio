<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    return view('CartaoTribuna.index', $return);
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

    public function logout()
    {
        $loginBloqueiaCards = Session::get('loginBloqueiaCards');
        Session::flush();
        Session::put('loginBloqueiaCards', $loginBloqueiaCards);
        //return redirect()->route('login.index')->with('message', 'Logout realizado com sucesso');
        return \Redirect::to('http://clube.atribuna.com.br/');
    }
}
