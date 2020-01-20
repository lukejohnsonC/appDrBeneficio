<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gestor;
use DB;
use App\Producao_Cliente;
use DataTables;
use Session;

class GestorController extends Controller

{

    public function __construct()
    {
        $this->middleware('auth:gestor',['only' => 'index','edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
      $data = [];

      $data['masculino'] = DB::table('tb_producao_cliente')
      ->where('id_pedido', Session::get('admin_id_pedido'))
      ->where('cd_sexo', 'MASCULINO')
      ->where('cd_status', 'ATIVO')
      ->count();

      $data['feminino'] = DB::table('tb_producao_cliente')
      ->where('id_pedido', Session::get('admin_id_pedido'))
      ->where('cd_sexo', 'FEMININO')
      ->where('cd_status', 'ATIVO')
      ->count();

      $data['sem_sexo'] = DB::table('tb_producao_cliente')
      ->where('id_pedido', Session::get('admin_id_pedido'))
      ->where('cd_sexo', '!=', 'MASCULINO')
      ->where('cd_sexo', '!=', 'FEMININO')
      ->where('cd_status', 'ATIVO')
      ->count();

      $data['total'] = $data['masculino'] + $data['feminino'] + $data['sem_sexo'];

      $data['perc_masculino'] = number_format((100 * $data['masculino'])/$data['total']);
      $data['perc_feminino'] = number_format((100 * $data['feminino'])/$data['total']);

      //select calcular idade
      //SELECT TIMESTAMPDIFF(YEAR, cd_dt_nasc, CURDATE()) AS age from tb_producao_cliente where cd_cpf = "43089683806"

      $data['grafico_idade'] =
      DB::select("
      SELECT
      SUM(IF(TIMESTAMPDIFF(YEAR, cd_dt_nasc, CURDATE()) < 18,1,0)) as 'Menores de 18 anos',
      SUM(IF(TIMESTAMPDIFF(YEAR, cd_dt_nasc, CURDATE()) BETWEEN 18 and 24,1,0)) as '18 - 24',
      SUM(IF(TIMESTAMPDIFF(YEAR, cd_dt_nasc, CURDATE()) BETWEEN 25 and 39,1,0)) as '25 - 39',
      SUM(IF(TIMESTAMPDIFF(YEAR, cd_dt_nasc, CURDATE()) BETWEEN 40 and 59,1,0)) as '40 - 49',
      SUM(IF(TIMESTAMPDIFF(YEAR, cd_dt_nasc, CURDATE()) >= 60,1,0)) as '60+'
      FROM tb_producao_cliente
      WHERE id_pedido = ".Session::get('admin_id_pedido')."
      AND cd_sexo IS NOT NULL
      AND cd_status = 'ATIVO'");


      $data['grafico_idade'] = $data['grafico_idade'][0];



    /*  $data['grafico_qtd_mes'] = DB::select("
      SELECT MONTH(dt_ativacao) as mes, YEAR(dt_ativacao) as ano, COUNT(*) as qtd
      FROM `tb_producao_cliente`
      WHERE dt_ativacao > DATE_SUB(now(), INTERVAL 12 MONTH)
      AND id_pedido = ".Session::get('admin_id_pedido')."
      AND cd_sexo IS NOT NULL
      AND cd_status = 'ATIVO'
      GROUP BY YEAR(dt_ativacao), MONTH(dt_ativacao)");*/

      $data['grafico_qtd_mes'] = [];

      for ($i = 0; $i <= 12; $i++) {
          $months[] = date("Y-m", strtotime( date( 'Y-m-01' )." -$i months"));
      }
      $months = array_reverse($months);
      //dd($months);

      foreach($months as $m) {
        $qtd_months = DB::table('tb_producao_cliente')
        ->where('dt_ativacao', '>=', $m . '-01')
        ->where('dt_ativacao', '<=', $m . '-31')
        ->where('cd_status', 'ATIVO')
        ->where('id_pedido', Session::get('admin_id_pedido'))
        ->count();
        $data['grafico_qtd_mes'][formata_data_sem_dia($m)] = $qtd_months;
      }

      $pedido = DB::table('tb_pedido')->where('id_pedido', Session::get('admin_id_pedido'))->first();
      $pacote_beneficios = DB::table('tb_pacote_beneficio')->where('ID_PC_BENEF', $pedido->ID_PC_BENEF)->first();

      $data['beneficios'] =
          DB::table('tb_juncao_pc_bn as aa')
          ->leftjoin('tb_beneficios as bb', 'aa.ID_BN', '=', 'bb.ID_BENEF')
          ->where('aa.ID_PC', $pacote_beneficios->ID_PC_BENEF)
          ->select('bb.*')
          ->orderby('bb.NM_BENEF')
          ->get();

        $data['ativo_inativo'] = DB::select("
        SELECT COUNT(*) as Ativos,
          (SELECT COUNT(*)
          FROM `tb_producao_cliente` WHERE cd_status = 'INATIVO'
          AND id_pedido = ".Session::get('admin_id_pedido')."
          AND cd_sexo IS NOT NULL) as Inativos
        FROM `tb_producao_cliente` WHERE cd_status = 'ATIVO'
        AND id_pedido = ".Session::get('admin_id_pedido')."
        AND cd_sexo IS NOT NULL
        ")[0];

      return view('gestor.dashboard', $data);
    }

    public function vidas() {
        return view('gestor.vidas');
    }

    public function ProducaoClienteAPI() {
        return DataTables::of(Producao_Cliente::query()->where('id_pedido', Session::get('admin_id_pedido')))->make(true);
    }

    public function vidasAlteraStatus() {
        $data = request()->all();
        if($data['cd_status'] == "ATIVO") {
            DB::table('tb_producao_cliente')
            ->where('id_producao_cliente', $data['id_producao_cliente'])
            ->update(['cd_status' => 'INATIVO']);

            return ["status" => "sucesso", "mensagem" => "Status alterado com sucesso"];
        }

        if($data['cd_status'] == "INATIVO") {
            DB::table('tb_producao_cliente')
            ->where('id_producao_cliente', $data['id_producao_cliente'])
            ->update(['cd_status' => 'ATIVO']);

            return ["status" => "sucesso", "mensagem" => "Status alterado com sucesso"];
        }

       return ["status" => "erro", "mensagem" => "Por favor, contate nossos desenvolvedores."];
    }

    public function vidasEditar() {
        $data = request()->all();
        if($data['cd_cpf']) {
            $data["cd_cpf"] = preg_replace('/[^A-Za-z0-9\-]/', '', $data["cd_cpf"]);
            $data["cd_cpf"] = str_replace('-', '', $data["cd_cpf"]);
        }

        if($data['cd_dt_nasc']) {
            $data["cd_dt_nasc"] = str_replace('/', '-', $data["cd_dt_nasc"] );
            $data["cd_dt_nasc"] = date("Y-m-d", strtotime($data["cd_dt_nasc"]));
        }


        DB::table('tb_producao_cliente')
        ->where('id_producao_cliente', $data['id_producao_cliente'])
        ->update($data);

        return ["status" => "sucesso", "mensagem" => "Vida editada com sucesso"];
        //return $data;
    }

    public function vidasCadastrar() {
        $data = request()->all();

        if($data['cd_cpf']) {
            $data["cd_cpf"] = preg_replace('/[^A-Za-z0-9\-]/', '', $data["cd_cpf"]);
            $data["cd_cpf"] = str_replace('-', '', $data["cd_cpf"]);
        }

        if($data['cd_dt_nasc']) {
            $data["cd_dt_nasc"] = str_replace('/', '-', $data["cd_dt_nasc"] );
            $data["cd_dt_nasc"] = date("Y-m-d", strtotime($data["cd_dt_nasc"]));
        }

        DB::table('tb_producao_cliente')
        ->insert($data);

        return $data;

     /*


        DB::table('tb_producao_cliente')
        ->insert($data);

        return ["status" => "sucesso", "mensagem" => "Vida editada com sucesso"]; */
    }

    public function beneficios() {

      $pedido = DB::table('tb_pedido')->where('id_pedido', Session::get('admin_id_pedido'))->first();
      $pacote_beneficios = DB::table('tb_pacote_beneficio')->where('ID_PC_BENEF', $pedido->ID_PC_BENEF)->first();

      $data = [];
      $data['beneficios'] =
          DB::table('tb_juncao_pc_bn as aa')
          ->leftjoin('tb_beneficios as bb', 'aa.ID_BN', '=', 'bb.ID_BENEF')
          ->where('aa.ID_PC', $pacote_beneficios->ID_PC_BENEF)
          ->select('bb.*')
          ->orderby('bb.NM_BENEF')
          ->get();

      return view('gestor.beneficios', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestor.auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // validate the data
        $this->validate($request, [
          'name'          => 'required',
          'email'         => 'required',
          'password'      => 'required'

        ]);

        // store in the database
        $gestores = new Gestor;
        $gestores->name = $request->name;
        $gestores->email = $request->email;
        $gestores->password=bcrypt($request->password);

        $gestores->save();


        return redirect()->route('gestor.auth.login');

    }

    public function upload() {
      $data = [];
      $data['pedido'] = DB::table('tb_pedido')->where('id_pedido', Session::get('admin_id_pedido'))->first();
      return view('gestor.upload', $data);
    }




    public function uploadDocument(Request $request) {

    //$title = $request->file('title');

    // Get the uploades file with name document
    $document = $request->file('document');

    // Required validation
    $request->validate([
        'document' => 'required'
    ]);

    // Check if uploaded file size was greater than
    // maximum allowed file size
    if ($document->getError() == 1) {
        $max_size = $document->getMaxFileSize() / 1024 / 1024;  // Get size in Mb
        $error = 'O documento é maior do que ' . $max_size . 'Mb.';
        return redirect()->back()->with('error', $error);
    }

    $data = [
        'document' => $document
    ];

    // If upload was successful
    // send the email
    $to_email = [];
    $to_email[0] = "suporte@elaboraweb.com.br";
    //$to_email[0] = "marcosbruno.mb@gmail.com";
    //$to_email[1] = "marcos@drbeneficio.com.br";

    \Mail::to($to_email)->send(new \App\Mail\Upload($data));
    //dd("teste");
    return redirect()->back()->with('success', "Base de dados enviada com sucesso.");
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
