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
        $data['listaEstados'] = $this->getEstados();
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

   public function getCidadesWithEstado() {
       $data = request()->all();
       $cidades = DB::table('farmacias')
       ->where('uf', $data['estado'])
       ->groupby('municipio')
       ->select('municipio')
       ->get();

      return Response::json($cidades);
  }

  public function getBairrosWithCidade() {
   $data = request()->all();
   $bairro = DB::table('farmacias')
   ->where('municipio', $data['cidade'])
   ->groupby('bairro')
   ->select('bairro')
   ->get();

  return Response::json($bairro);
}

   public function postFarmacias() {
   $data = request()->all();
   if($data['bairro']) {
       $farmacias = DB::table('farmacias')
       ->where('uf', $data['estado'])
       ->where('municipio', $data['cidade'])
       ->where('bairro', $data['bairro'])
       ->get();
   } else {
       $farmacias = DB::table('farmacias')
       ->where('uf', $data['estado'])
       ->where('municipio', $data['cidade'])
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
