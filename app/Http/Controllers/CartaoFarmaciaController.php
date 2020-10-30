<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use Response;

class CartaoFarmaciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('CartaoFarmacia.index');
    }


    public function verCartaoFarmacia() {
        $data = [];
        $data['liberaBotoesTopo'] = 1;
        $data['nr_rd'] = DB::table('tb_producao_cliente')->where('id_producao_cliente', Session::get('admin_id'))->select('nr_rd')->first()->nr_rd;
        return view('CartaoFarmacia.verCartaoFarmacia', $data);
    }

    public function farmaciasCredenciadas() {
        $data = [];
        $data['defaultEstado'] = "SP";
        $data['defaultCidade'] = "SAO VICENTE";
        $data['defaultBairro'] = null;
        
        $data['listaEstados'] = $this->getEstados();
        $data['listaCidades'] = $this->getCidadesWithEstado($data['defaultEstado'])->original;
        $data['listaBairros'] = $this->getBairrosWithCidade($data['defaultCidade'])->original;
        $data['listaFarmacias'] = $this->postFarmacias($data['defaultEstado'], $data['defaultCidade'], $data['defaultBairro'])->original;
       
        $data['liberaBotoesTopo'] = 1;
        return view('CartaoFarmacia.farmaciasCredenciadas', $data);
    }

    public function getEstados() {
        $estados = DB::table('farmacias')
        ->groupby('uf')
        ->select('uf')
        ->get();

       return $estados;
   }

   public function getCidadesWithEstado($estado = null) {
       if($estado == null) {
          $data = request()->all();
          $estado = $data['estado'];
       }
       $cidades = DB::table('farmacias')
       ->where('uf', $estado)
       ->groupby('municipio')
       ->select('municipio')
       ->get();

      return Response::json($cidades);
  }

  public function getBairrosWithCidade($cidade = null) {
    if($cidade == null) {
        $data = request()->all();
        $cidade = $data['cidade'];
    }
   $data = request()->all();
   $bairro = DB::table('farmacias')
   ->where('municipio', $cidade)
   ->groupby('bairro')
   ->select('bairro')
   ->get();

  return Response::json($bairro);
}

   public function postFarmacias($estado = null, $cidade = null, $bairro = null) {
    if($estado == null) {
        $data = request()->all();
        $estado = $data['estado'];
        $cidade = $data['cidade'];
        $bairro = $data['bairro'];
     }

   if($bairro) {
       $farmacias = DB::table('farmacias')
       ->where('uf', $estado)
       ->where('municipio', $cidade)
       ->where('bairro', $bairro)
       ->get();
   } else {
       $farmacias = DB::table('farmacias')
       ->where('uf', $estado)
       ->where('municipio', $cidade)
       ->get();
   }    

  return Response::json($farmacias);
   }

   public function medicamentoManipulado() {
       return view('CartaoFarmacia.medicamentoManipulado.index');
   }

   public function medicamentoManipuladoWhats() {
    return view('CartaoFarmacia.medicamentoManipulado.whats');
    }

   public function medicamentoManipuladoTel() {
    return view('CartaoFarmacia.medicamentoManipulado.tel');
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
