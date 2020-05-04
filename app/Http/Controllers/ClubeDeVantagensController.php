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
        $data['vantagens'] = array();
        $busca = request()->all();

        if($busca) {
          $busca = $busca['busca'];
          $data['busca'] = $busca;
        }


        $pedido = DB::table('tb_pedido')->where('id_pedido', Session::get('admin_id_pedido'))->first();
        $pacote_beneficios = DB::table('tb_pacote_beneficio')->where('ID_PC_BENEF', $pedido->ID_PC_BENEF)->first();
        $info = DB::table('areadocliente_info')->where('ID_PC_BENEF', $pedido->ID_PC_BENEF)->first();
        $liberaTodasVantagens = true;

        if($info && $info->VANTAGEM_SOMENTE_ESPECIAL == 1) {
          $liberaTodasVantagens = false;
        }

        if ($liberaTodasVantagens) {
          $data['vantagens'] =
               DB::table('areadocliente_cdv_vantagem as v')
              ->leftjoin('areadocliente_cdv_empresa as e', 'v.ID_EMPRESA', '=', 'e.ID_EMPRESA')
              ->select('v.*', 'e.NOME as EMPRESA_NOME', 'e.LOGO as EMPRESA_LOGO')
              ->where('v.PERMISSAO_ESPECIAL', 0);
              if($busca) {
                $data['vantagens'] = $data['vantagens']
                ->where(function($q) use($busca) {
                      $q->where('e.NOME', 'LIKE', '%'.$busca.'%')
                      ->orWhere('v.NOME', 'LIKE', '%'.$busca.'%')
                      ->orWhere('v.DETALHES', 'LIKE', '%'.$busca.'%');
                  });
              }
              $data['vantagens'] = $data['vantagens']
              ->orderby('v.ORDEM','ASC')
              ->get();
        }

            $pacote = $pedido->ID_PC_BENEF;

            $especial = DB::table('areadocliente_cdv_vantagem_permissao as vp')
            ->leftjoin('areadocliente_cdv_vantagem as v', 'vp.ID_VANTAGEM', 'v.ID_VANTAGEM')
            ->leftjoin('areadocliente_cdv_empresa as e', 'v.ID_EMPRESA', '=', 'e.ID_EMPRESA')
            ->where('vp.ID_PC_BENEF', $pacote);

            if($busca) {
            $especial = $especial
              ->where(function($q) use($busca) {
                    $q->where('e.NOME', 'LIKE', '%'.$busca.'%')
                    ->orWhere('v.NOME', 'LIKE', '%'.$busca.'%')
                    ->orWhere('v.DETALHES', 'LIKE', '%'.$busca.'%');
                });
            }

            $especial = $especial
            ->select('v.*', 'e.NOME as EMPRESA_NOME', 'e.LOGO as EMPRESA_LOGO')
            ->get();


            if($especial) {
              foreach($especial as $e) {
                $data['vantagens'][] = $e;
              }
            }

            /* CAPTURA CATEGORIAS */
            if($data['vantagens']) {
              foreach($data['vantagens'] as $key => $v) {
                  $cat = DB::table('areadocliente_cdv_cat_vant as cv')
                  ->leftjoin('areadocliente_cdv_categoria as c', 'cv.ID_CATEGORIA', '=', 'c.ID_CATEGORIA')
                  ->where('ID_VANTAGEM', $v->ID_VANTAGEM)
                  ->select('c.*')
                  ->get();
                  $data['vantagens'][$key]->categorias = $cat;
              }
            }


        return view('ClubeDeVantagens.novo', $data);
        //return view('ClubeDeVantagens.index'); OLD
    }

    public function clubedevantagensResgatar($id) {
        $data = [];
        $data['vantagem'] = DB::table('areadocliente_cdv_vantagem as v')
        ->leftjoin('areadocliente_cdv_empresa as e', 'v.ID_EMPRESA', '=', 'e.ID_EMPRESA')
        ->where('v.ID_VANTAGEM', $id)
        ->select('v.*', 'e.LOGO')
        ->first();

        return view('ClubeDeVantagens.resgatar', $data);
    }

    public function clubedevantagens_rede_parcerias() {
      return view('ClubeDeVantagens.redeParcerias');
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
