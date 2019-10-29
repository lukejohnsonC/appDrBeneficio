<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use Session;

class MockupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
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
    }

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
