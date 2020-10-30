<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;

class CartaoVirtualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedido = DB::table('tb_pedido')->where('id_pedido', Session::get('admin_id_pedido'))->first();
        $pacote_beneficios = DB::table('tb_pacote_beneficio')->where('ID_PC_BENEF', $pedido->ID_PC_BENEF)->first();

        $data = [];
        $data['beneficios'] =
            DB::table('tb_juncao_pc_bn as aa')
            ->leftjoin('tb_beneficios as bb', 'aa.ID_BN', '=', 'bb.ID_BENEF')
            ->where('aa.ID_PC', $pacote_beneficios->ID_PC_BENEF)
            ->select('bb.*')
            ->orderby('bb.NM_BENEF')
            ->get();


        return view('CartaoVirtual.index', $data);
    }

    public function camps1() {
      $pedido = DB::table('tb_pedido')->where('id_pedido', Session::get('admin_id_pedido'))->first();
      $pacote_beneficios = DB::table('tb_pacote_beneficio')->where('ID_PC_BENEF', $pedido->ID_PC_BENEF)->first();

      $data = [];
      $data['beneficios'] =
          DB::table('tb_juncao_pc_bn as aa')
          ->leftjoin('tb_beneficios as bb', 'aa.ID_BN', '=', 'bb.ID_BENEF')
          ->where('aa.ID_PC', $pacote_beneficios->ID_PC_BENEF)
          ->select('bb.*')
          ->orderby('bb.NM_BENEF')
          ->get();

      $data['cliente'] = DB::table('tb_producao_cliente')->where('id_producao_cliente', Session::get('admin_id'))->first();

    //  dd($data['cliente']);

      return view('CartaoVirtual.camps1', $data);
    }

    public function solicitarSegundaVia() {

      try {
        $info_email = [];
        $info_email['assunto'] = "Segunda via do cartão solicitada";

        $info_email['mensagem'] = "Segunda via do cartão foi solicitada.";
        $info_email['mensagem'] .= "<br />";
        $info_email['mensagem'] .= "<br />";

        $info_email['mensagem'] .= "<b>Solicitada por: </b>";
        $info_email['mensagem'] .= Session::get('admin_name') . " (#".Session::get('admin_id').")";
        $info_email['mensagem'] .= "<br />";

        $info_email['mensagem'] .= "<b>CPF: </b>";
        $info_email['mensagem'] .= formata_cpf(Session::get('admin_cpf'));
        $info_email['mensagem'] .= "<br />";

        $info_email['mensagem'] .= "<b>Pedido: </b>";
        $info_email['mensagem'] .= Session::get('admin_id_pedido');
        $info_email['mensagem'] .= "<br />";

        $info_email['mensagem'] .= "<b>Data e hora da solicitação: </b>";
        $info_email['mensagem'] .= formata_data(NOW()) . " as " . formata_hora(NOW());
        $info_email['mensagem'] .= "<br />";

        $to_email = [];

        $to_email[0] = "lemos@drbeneficio.com.br";
        $to_email[1] = "adriana@drbeneficio.com.br";
        $to_email[2] = "atendimento@drbeneficio.com.br";
        $to_email[3] = "montoro@drbeneficio.com.br";
       

        \Mail::to($to_email)->send(new \App\Mail\GenericoSemAnexo($info_email));
        return redirect(route('cartaovirtual.index'))->with('success', "Segunda via do cartão solicitada com sucesso.");
      } catch (\Exception $e) {
        return redirect(route('cartaovirtual.index'))->with('error', "Ocorreu um erro na sua solicitação. Por favor, tente novamente mais tarde.");
      }

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
