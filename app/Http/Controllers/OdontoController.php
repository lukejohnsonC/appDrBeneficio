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
        return view('odonto.index');
    }

    public function odontoRedeCredenciada() {
        $tipo = DB::table('tb_beneficio')
        ->where('tipo_01', 'ODONTO')
        ->where('cd_status','ATIVO')
        ->where('cd_front','SHOW')
        ->select('id_beneficio', 'cd_descr_servico')
        ->orderby('cd_descr_servico')
        ->first()
        ->id_beneficio;

        $data = [];
        $data['liberaBotoesTopo'] = 1;
         $data['redes'] = DB::table('tb_beneficio_fornecedor as aa')
        ->leftjoin('tb_fornecedor as bb', 'aa.id_fornecedor', '=', 'bb.id_fornecedor')
        ->where('aa.id_beneficio', $tipo)
        ->get();

        return view('odonto.odontoRedeCredenciada', $data);

    }

    public function odontoAgendar() {
        $data = [];
        $data['liberaBotoesTopo'] = 1;
        

        return view('odonto.odontoAgendar', $data);
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
