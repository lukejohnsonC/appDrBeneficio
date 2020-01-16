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

    public function cartaodetalhado() {
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

      return view('CartaoVirtual.cartaodetalhado', $data);
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
