<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

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
            ->orderby('v.ORDEM','ASC')
            ->get();

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

    public function clubedevantagensResgatar() {
        return view('ClubeDeVantagens.resgatar');
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
