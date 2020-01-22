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

    public function testGET() {
      dd(formata_hora(now()));

    }

    public function testPOST() {
      dd("testPOST");
    }

    public function dispara_email_alerta($data) {
      // If upload was successful
      // send the email
      $to_email = [];
      $to_email[0] = "suporte@elaboraweb.com.br";
      //$to_email[0] = "marcosbruno.mb@gmail.com";
      //$to_email[1] = "marcos@drbeneficio.com.br";

    //  dd($data);

      \Mail::to($to_email)->send(new \App\Mail\GenericoSemAnexo($data));
    }


    public function agMenus() {
        $data = [];
        $data['menus'] = DB::table('areadocliente_menu as am')
        ->leftjoin("tb_pacote_beneficio as pc", "am.ID_PC_BENEF", "=", "pc.ID_PC_BENEF")
        ->select("pc.*")
        ->groupby("am.ID_PC_BENEF")
        ->get();


        $data['mockups'] = DB::table('areadocliente_mockups')
        ->get();

        return view('Ag.menus', $data);
    }

    public function agMenusNovo() {
        $data = [];
        $data["pacotes"] = DB::table('tb_pacote_beneficio as pb')
        ->leftjoin("areadocliente_menu as am", "pb.ID_PC_BENEF", "=", "am.ID_PC_BENEF")
        ->whereNull('am.ID_MENU')
        ->select("pb.*")
        ->orderby("pb.ID_PC_BENEF")
        ->get();

        return view('Ag.MenuNovo', $data);
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

        return view('Ag.MenuEditar', $data);
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

        return view('Ag.MenuClonar', $data);
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

    public function agMenusPedidos($id_pacote) {
        $data = [];
        $data["pacote"] = $id_pacote;
        $data["pedidosAtivos"] = DB::table("tb_pedido")
        ->where("ID_PC_BENEF", $id_pacote)
        ->get();

        $data["pedidos"] = DB::table("tb_pedido")
        ->where("ID_PC_BENEF", "!=" , $id_pacote)
        ->get();


        return view('Ag.MenuPedidos', $data);
    }

    public function agMenusPedidosPost() {
        $form = \Request::all();

       foreach ($form["pedidos"] as $p) {
           DB::table('tb_pedido')
            ->where('id_pedido', $p)
            ->update(['ID_PC_BENEF' => $form["pacote"]]);
       }
        return \redirect(route('agMenusPedidos', $form['pacote']));
    }

    public function agMenusItemExcluir($id_pacote, $id_menu) {
        DB::table('areadocliente_menu')->where('ID_MENU', '=', $id_menu)->delete();
        return \redirect(route('agMenusEditar', $id_pacote));
    }

    public function agMenusItemEditar($id_pacote, $id_menu) {
        $data = [];
        $data['item'] = DB::table('areadocliente_menu')->where('ID_MENU', $id_menu)->first();
        $data['pacote'] = $id_pacote;
        $data['menu'] = $id_menu;
        return view('Ag.MenusItemEditar', $data);
    }

    public function agMenusItemEditarPost() {
        $form = \Request::all();

        DB::table('areadocliente_menu')
        ->where('ID_MENU', $form['menu'])
        ->update(
            array('NOME' => $form['nome'], 'TIPO' => $form['tipo'], 'CONTEUDO' => $form['conteudo'], 'ICONE' => $form['icone'])
        );

        return \redirect(route('agMenusEditar', $form['pacote']));
    }

    public function agMockupsClonar() {
        $data = [];

        $data["menus_existentes"] = DB::table('areadocliente_menu as am')
        ->leftjoin("tb_pacote_beneficio as pb", "pb.ID_PC_BENEF", "=", "am.ID_PC_BENEF")
        ->select("pb.*")
        ->groupby("am.ID_PC_BENEF")
        ->orderby("am.ID_PC_BENEF")
        ->get();

        return view('Ag.MockupsClonar', $data);
    }

    public function agMockupsClonarPost() {
        $form = \Request::all();
       //dd($form);

        $novoMockup = DB::table('areadocliente_mockups')->insertGetId(
            array('NOME' => $form['nome'], 'LOGO' => $form['logo'], 'SLUG' => $form['slug'], 'USER_LOGADO' => $form['user_logado'] )
        );

        $menus = DB::table('areadocliente_menu')
        ->where('ID_PC_BENEF', $form['pacote_existente'])
        ->get();

        foreach($menus as $m) {
            $m->ID_MENU = null;
            $m->ID_MOCKUP = $novoMockup;
            $dados = array();
            foreach($m as $key => $value) {
                $dados[str_slug($key,'_')] = $value;
            }

            unset($dados['id_pc_benef']);

            DB::table('areadocliente_mockups_menu')->insert($dados);
        }

        return \redirect(route('agMenus'));
    }

    public function agMockupsEditar($id) {
        $data = [];

        $data['dados_mockup'] = DB::table('areadocliente_mockups')->where('ID_MOCKUP', $id)->first();

        $data['itens'] = DB::table('areadocliente_mockups_menu')
        ->where('ID_MOCKUP', $id)
        ->orderby('ORDEM')
        ->get();

        $data['mockup'] = $id;

        return view('Ag.MockupsEditar', $data);
    }

    public function agMockupsEditarPost() {
        $form = \Request::all();

        $getOrdem = DB::table('areadocliente_mockups_menu')
        ->where('ID_MOCKUP', $form['mockup'])
        ->orderby('ORDEM', 'DESC')
        ->select('ORDEM')
        ->first()
        ->ORDEM;

        $ordem = $getOrdem + 1;

        DB::table('areadocliente_mockups_menu')->insert(
            array('ID_MOCKUP' => $form['mockup'], 'NOME' => $form['nome'], 'TIPO' => $form['tipo'], 'CONTEUDO' => $form['conteudo'], 'ICONE' => $form['icone'], 'ORDEM' => $ordem)
        );

        return \redirect(route('agMockupsEditar', $form['mockup']));
    }


    public function agMockupsEditarDadosPost() {
        $form = \Request::all();

        //dd($form);

        DB::table('areadocliente_mockups')
        ->where('ID_MOCKUP', $form['mockup'])
        ->update(
            array('NOME' => $form['nome'], 'LOGO' => $form['logo'], 'SLUG' => $form['slug'], 'USER_LOGADO' => $form['user_logado'])
        );

        return \redirect(route('agMockupsEditar', $form['mockup']));
    }



    public function agMockupsItemExcluir($id_mockup, $id_menu) {
        DB::table('areadocliente_mockups_menu')->where('ID_MENU', '=', $id_menu)->delete();
        return \redirect(route('agMockupsEditar', $id_mockup));
    }

    public function agMockupsItemEditar($id_mockup, $id_menu) {
        $data = [];
        $data['item'] = DB::table('areadocliente_mockups_menu')->where('ID_MENU', $id_menu)->first();
        $data['mockup'] = $id_mockup;
        $data['menu'] = $id_menu;
        return view('Ag.MockupsItemEditar', $data);
    }

    public function agMockupsItemEditarPost() {
        $form = \Request::all();

        DB::table('areadocliente_mockups_menu')
        ->where('ID_MENU', $form['menu'])
        ->update(
            array('NOME' => $form['nome'], 'TIPO' => $form['tipo'], 'CONTEUDO' => $form['conteudo'], 'ICONE' => $form['icone'])
        );

        return \redirect(route('agMockupsEditar', $form['mockup']));
    }

    public function agMockupsAlteraOrdem() {
        $data = request()->all();
        $position = $data['position'];

        $i=0;
        foreach($position as $k=>$v){
            DB::table('areadocliente_mockups_menu')
            ->where('ID_MENU', $v)
            ->update(['ORDEM' => $i]);
            $i++;
        }

        return "sucesso";
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
