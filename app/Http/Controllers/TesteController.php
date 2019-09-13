<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;

class TesteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
/*
        $guzzle = new \GuzzleHttp\Client();
        $request = $guzzle->post('https://clubecore.convenia.com.br/clube/v1/authenticate/37dc10e0-6778-11e9-8a5d-7f551e5a000c', [
                'json' => [
                     'document' => '43089683806',
                     'name' => 'Marcos Bruno',
                     'birthday' => '1993-06-14',
                     'email' => 'marcosbruno.mb@gmail.com'
                ]
        ]);
        
        $data = json_decode($request->getBody()->getContents());
        
        $url = $data->data;

        dd($url); */

        return \redirect(route('agMenus'));
    }


    public function agMenus() {
        $data = [];
        $data['menus'] = DB::table('areadocliente_menu as am')
        ->leftjoin("tb_pacote_beneficio as pc", "am.ID_PC_BENEF", "=", "pc.ID_PC_BENEF")
        ->select("pc.*")
        ->groupby("am.ID_PC_BENEF")
        ->get();

        return view('ag.menus', $data);
    }

    public function agMenusNovo() {
        $data = [];
        $data["pacotes"] = DB::table('tb_pacote_beneficio as pb')
        ->leftjoin("areadocliente_menu as am", "pb.ID_PC_BENEF", "=", "am.ID_PC_BENEF")
        ->whereNull('am.ID_MENU')
        ->select("pb.*")
        ->orderby("pb.ID_PC_BENEF")
        ->get();

        return view('ag.MenuNovo', $data);
    }

    public function agMenusNovoPost() {
        $form = \Request::all();

        DB::table('areadocliente_menu')->insert(
            array('ID_PC_BENEF' => $form['pacote'], 'NOME' => $form['nome'], 'TIPO' => $form['tipo'], 'CONTEUDO' => $form['conteudo'], 'ICONE' => $form['icone'], 'ORDEM' => 0)
        );

        return \redirect(route('agMenusEditar', $form['pacote']));       
    }

    public function agMenusEditar($id_pacote) {
        $data = [];
        $data['itens'] = DB::table('areadocliente_menu')
        ->where('ID_PC_BENEF', $id_pacote)
        ->orderby('ORDEM')
        ->get();

        $data['pacote'] = $id_pacote;

        return view('ag.MenuEditar', $data);
    }

    public function agMenusEditarPost() {
        $form = \Request::all();

        $getOrdem = DB::table('areadocliente_menu')
        ->where('ID_PC_BENEF', $form['pacote'])
        ->orderby('ORDEM', 'DESC')
        ->select('ORDEM')
        ->first()
        ->ORDEM;

        $ordem = $getOrdem + 1;
        
        DB::table('areadocliente_menu')->insert(
            array('ID_PC_BENEF' => $form['pacote'], 'NOME' => $form['nome'], 'TIPO' => $form['tipo'], 'CONTEUDO' => $form['conteudo'], 'ICONE' => $form['icone'], 'ORDEM' => $ordem)
        );

        return \redirect(route('agMenusEditar', $form['pacote']));
    }

    public function agMenusAlteraOrdem() {
        $data = request()->all();
        $position = $data['position'];
       
        $i=0;
        foreach($position as $k=>$v){
            DB::table('areadocliente_menu')
            ->where('ID_MENU', $v)
            ->update(['ORDEM' => $i]);
            $i++;            
        }
        
        return "sucesso";
    }
    
    public function agMenusClonar() {
        $data = [];
        $data["pacotes"] = DB::table('tb_pacote_beneficio as pb')
        ->leftjoin("areadocliente_menu as am", "pb.ID_PC_BENEF", "=", "am.ID_PC_BENEF")
        ->whereNull('am.ID_MENU')
        ->select("pb.*")
        ->orderby("pb.ID_PC_BENEF")
        ->get();

        $data["menus_existentes"] = DB::table('areadocliente_menu as am')
        ->leftjoin("tb_pacote_beneficio as pb", "pb.ID_PC_BENEF", "=", "am.ID_PC_BENEF")
        ->select("pb.*")
        ->groupby("am.ID_PC_BENEF")
        ->orderby("am.ID_PC_BENEF")
        ->get();

        return view('ag.MenuClonar', $data);
    }
    
    public function agMenusClonarPost() {
        $form = \Request::all();

        $menus = DB::table('areadocliente_menu')
        ->where('ID_PC_BENEF', $form['pacote_existente'])
        ->get();

        foreach($menus as $m) {
            $m->ID_MENU = null;
            $m->ID_PC_BENEF = $form['pacote_novo'];
            $dados = array();
            foreach($m as $key => $value) {
                $dados[str_slug($key,'_')] = $value;
            }

            DB::table('areadocliente_menu')->insert($dados);
        }

        return \redirect(route('agMenusEditar', $form['pacote_novo']));       
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
