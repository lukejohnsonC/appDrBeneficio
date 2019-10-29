<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use DB;
use Response;
use Session;
use Illuminate\Support\Facades\Validator;

class MockupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $data = [];
        $data['slug'] = $slug;
        return view('Mockups.login', $data);        
    }
    public function menuMockups($slug) {

        $mockup = DB::table('areadocliente_mockups')->where('SLUG', $slug)->first();

        $data = [];

        Session::put('admin_logo', null);

        $usuario = DB::table('tb_producao_cliente')
        ->where("id_producao_cliente", $mockup->USER_LOGADO)
        ->first();

        Session::put('admin_id', $usuario->id_producao_cliente);
        Session::put('admin_name', $usuario->nm_nome);
        Session::put('admin_cpf', $usuario->cd_cpf);
        Session::put('admin_dt_nasc', $usuario->cd_dt_nasc);    

        $data['menu'] = DB::table('areadocliente_mockups_menu')->where('ID_MOCKUP', '=', $mockup->ID_MOCKUP)->orderby('ORDEM')->get();
        
        if($mockup->LOGO) {
            Session::put('admin_logo', $mockup->LOGO);
        }        

        $data['liberaBotoesTopo'] = 1;

        $data['paginaAtual'] = "cliente";

        return view('Mockups.index', $data);

    }


    public function loginMockupsPost($slug) {
        return redirect()->route('menuMockups', $slug);
    }

    public function clienteMockup($slug) {
        
    }

    public function MockupsIndexLogado() {

    }







/*

 if($slug == null) {
            return redirect()->route('loginMockups');           
        }  
        

        $mockup = DB::table('areadocliente_mockups')->where('SLUG', $slug)->first();

        $data = [];

        Session::put('admin_logo', null);

        $data['menu'] = DB::table('areadocliente_mockups_menu')->where('ID_MOCKUP', '=', $mockup->ID_MOCKUP)->orderby('ORDEM')->get();
        
        if($mockup->LOGO) {
            Session::put('admin_logo', $mockup->LOGO);
        }        

        $data['liberaBotoesTopo'] = 1;

        $data['paginaAtual'] = "cliente";

        return view('Mockups.index', $data);

*/










    public function verHTMLMOCKUP($id_menu) {
        $menu = DB::table('areadocliente_mockups_menu')->where("ID_MENU", $id_menu)->first();
        // dd($menu);
         $data = [];
         $data['conteudo'] = $menu->CONTEUDO;
         return view('verHTML', $data);
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
