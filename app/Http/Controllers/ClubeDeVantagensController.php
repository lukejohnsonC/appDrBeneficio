<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;

class ClubeDeVantagensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];

        $data['vantagens'] =
            DB::table('areadocliente_cdv_vantagem as v')
            ->leftjoin('areadocliente_cdv_empresa as e', 'v.ID_EMPRESA', '=', 'e.ID_EMPRESA')
            ->select('v.*', 'e.NOME as EMPRESA_NOME', 'e.LOGO as EMPRESA_LOGO')
            ->where('v.PERMISSAO_ESPECIAL', 0)
            ->orderby('v.ORDEM','ASC')
            ->get();

            //dd($data['vantagens']);

            $pacote = DB::table('tb_pedido')->where('id_pedido', Session::get('admin_id_pedido'))->select('ID_PC_BENEF')->first();

            $especial = DB::table('areadocliente_cdv_vantagem_permissao as vp')
            ->leftjoin('areadocliente_cdv_vantagem as v', 'vp.ID_VANTAGEM', 'v.ID_VANTAGEM')
            ->leftjoin('areadocliente_cdv_empresa as e', 'v.ID_EMPRESA', '=', 'e.ID_EMPRESA')
            ->where('vp.ID_PC_BENEF', $pacote->ID_PC_BENEF)
            ->select('v.*', 'e.NOME as EMPRESA_NOME', 'e.LOGO as EMPRESA_LOGO')
            ->get();

            if($especial) {
              foreach($especial as $e) {
                $data['vantagens'][] = $e;
              }
            }

            /* CAPTURA CATEGORIAS */
            foreach($data['vantagens'] as $key => $v) {
                $cat = DB::table('areadocliente_cdv_cat_vant as cv')
                ->leftjoin('areadocliente_cdv_categoria as c', 'cv.ID_CATEGORIA', '=', 'c.ID_CATEGORIA')
                ->where('ID_VANTAGEM', $v->ID_VANTAGEM)
                ->select('c.*')
                ->get();
                $data['vantagens'][$key]->categorias = $cat;
            }

        return view('ClubeDeVantagens.novo', $data);
        //return view('ClubeDeVantagens.index'); OLD
    }

    public function clubedevantagensResgatar($id) {
        $data = [];
        $data['vantagem'] = DB::table('areadocliente_cdv_vantagem')
        ->where('ID_VANTAGEM', $id)
        ->first();

        return view('ClubeDeVantagens.resgatar', $data);
    }

    public function clubedevantagensNOVO() {

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
