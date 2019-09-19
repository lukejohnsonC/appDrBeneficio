<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;

class CheckupAnualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['liberaBotoesTopo'] = 1;
        return view('CheckupAnual.checkup', $data);
    }

        public function checkupComoFunciona() {
            $data = [];
            $data['liberaBotoesTopo'] = 1;
            return view('CheckupAnual.checkupComoFunciona', $data);
        }

        public function checkupVale() {
            $data = [];
            $data['liberaBotoesTopo'] = 1;

            $data['vale'] = DB::table('tb_producao_cliente')
            ->where('id_producao_cliente', Session::get('admin_id'))
            ->first()
            ->cd_celular_checkup;

            return view('CheckupAnual.checkupVale', $data);
        }

        public function checkupValePost() {
            $data = request()->all();

            DB::table('tb_producao_cliente')
            ->where('id_producao_cliente', Session::get('admin_id'))
            ->update(['cd_celular_checkup' => $data['cel']]);

            return redirect()->route('checkupVale')->with('message', 'Vale Checkup resgatado com sucesso');
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
