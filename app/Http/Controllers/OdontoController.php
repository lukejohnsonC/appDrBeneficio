<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use Response;

class OdontoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Odonto.index');
    }

    public function odontoRedeCredenciada() {
      $data = [];
      $data['liberaBotoesTopo'] = 1;
      $data['redes'] = $this->getRedes();

      return view('Odonto.odontoRedeCredenciada', $data);
    }

    public function getRedes() {
      $tipo = DB::table('tb_beneficio')
      ->where('tipo_01', 'ODONTO')
      ->where('cd_status','ATIVO')
      ->where('cd_front','SHOW')
      ->select('id_beneficio', 'cd_descr_servico')
      ->orderby('cd_descr_servico')
      ->first()
      ->id_beneficio;

      $redes = DB::table('tb_beneficio_fornecedor as aa')
     ->leftjoin('tb_fornecedor as bb', 'aa.id_fornecedor', '=', 'bb.id_fornecedor')
     ->where('aa.id_beneficio', $tipo)
     ->orderby('cd_cidade', 'ASC')
     ->get()
     ->groupBy('cd_cidade');

     return $redes;
    }



    public function odontoAgendar() {
        $data = [];
        $data['liberaBotoesTopo'] = 1;


        return view('Odonto.odontoAgendar', $data);
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
