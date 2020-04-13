<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginCPFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if (Session::get('admin_id')) {
            return redirect()->route('cliente.index');
        }

        $this->processaCoresDrBeneficio();

        return view('logincpf');
    }

    public function loginSemCards()
    {
        if (Session::get('admin_id')) {
            return redirect()->route('cliente.index');
        }

        return redirect()->route('login.index');
    }

    public function loginWhiteLabel($pacote) {
      Session::put('loginBloqueiaCards', 1);
      if (Session::get('admin_id')) {
          return redirect()->route('cliente.index');
      }

      $data['postLogin'] = route('postLogin');

  /*    switch ($pacote) {
          case '19':
          $data['postLogin'] = route('cartaotribuna.login');
          break;
      } */

      $info = DB::table('areadocliente_info')->where('ID_PC_BENEF', $pacote)->first();

      if($info && $info->LOGO) {
          Session::put('admin_logo', $info->LOGO);
      }

      if($info && $info->LOGO_DRBEN) {
          Session::put('admin_LOGO_DRBEN', 0);
      }

      if ($info && $info->colors_primary) {
        $colors['#primary'] = $info->colors_primary;
        Session::put('barra_superior', false);
      }

      if ($info && $info->colors_secondary) {
        $colors['#secondary'] = $info->colors_secondary;
        Session::put('barra_superior', false);
      }

      if ($info && $info->favicon) {
        Session::put('admin_FAVICON', $info->favicon);
      }

      if ($info && $info->title) {
        Session::put('admin_TITLE', $info->title);
      }

      if ($info && $info->DESABILITA_WHATSAPP) {
        Session::put('admin_DESABILITA_WHATSAPP', $info->DESABILITA_WHATSAPP);
      }

      if ($info && $info->BOTAO_VOLTAR) {
          Session::put('admin_BOTAO_VOLTAR', $info->BOTAO_VOLTAR);
      }

      if (isset($colors)) {
        Session::put('colors', $colors);
      }

      $data['wlLogin'] = [];
      if ($info && $info->LOGINW_TITULO1) {
          $data['wlLogin']['LOGINW_TITULO1'] = $info->LOGINW_TITULO1;
      }

      if ($info && $info->LOGINW_TITULO2) {
          $data['wlLogin']['LOGINW_TITULO2'] = $info->LOGINW_TITULO2;
      }

      if ($info && $info->LOGINW_BOTAO_NAO_CONSEGUE_HABILITA) {
          $data['wlLogin']['LOGINW_BOTAO_NAO_CONSEGUE_HABILITA'] = $info->LOGINW_BOTAO_NAO_CONSEGUE_HABILITA;
      }

      if ($info && $info->LOGINW_BOTAO_NAO_CONSEGUE_TEXTO) {
          $data['wlLogin']['LOGINW_BOTAO_NAO_CONSEGUE_TEXTO'] = $info->LOGINW_BOTAO_NAO_CONSEGUE_TEXTO;
      }

      if ($info && $info->LOGINW_BOTAO_NAO_CONSEGUE_LINK) {
          $data['wlLogin']['LOGINW_BOTAO_NAO_CONSEGUE_LINK'] = $info->LOGINW_BOTAO_NAO_CONSEGUE_LINK;
      }

      $data['whitelabel'] = 1;

      return view('logincpf', $data);
    }

    public function processaCoresDrBeneficio() {
      $colors = app('App\Http\Controllers\ClienteController')->getPaletaDeCoresDrBeneficio();
      Session::put('colors', $colors);
      Session::put('admin_TITLE', null);
      Session::put('admin_FAVICON', null);
      Session::put('barra_superior', true);
      Session::put('admin_logo', null);
      Session::put('admin_LOGO_DRBEN', 1);
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

    public function postLogin()
    {

        $request = Request::all();
        $request["cpf"] = preg_replace('/[^A-Za-z0-9\-]/', '', $request["cpf"]);
        $request["cpf"] = str_replace('-', '', $request["cpf"]);
        $request["nascimento"] = str_replace('/', '-', $request["nascimento"] );
        $request["nascimento"] = date("Y-m-d", strtotime($request["nascimento"]));
        //$request["nascimento"]
        //dd($request);

        $validator = Validator::make($request,
            [
                'cpf' => 'required|string|max:11',
                'nascimento' => 'required',
            ]
        );

        if ($validator->fails()) {
            $message = $validator->errors()->all();
            return redirect()->back()->with(['message' => implode(', ', $message), 'message_type' => 'danger']);
        }

        $cpf = $request["cpf"];
        $nascimento = $request["nascimento"];

        /* SÓ PARA TESTES, REMOVER DEPOIS */
        // $cpf = '02357113227'; $nascimento = '2000-01-14';
        /* SÓ PARA TESTES, REMOVER DEPOIS */

        $usuario = DB::table('tb_producao_cliente')
            ->where("cd_cpf", $cpf)
            ->where("cd_dt_nasc", $nascimento)
            ->first();

        if ($usuario) {

            if ($usuario->cd_status == 'INATIVO') {
                return redirect()->back()->with(['message' => 'Infelizmente o seu usuário foi desativado. Entre em contato com o nosso atendimento.', 'message_type' => 'danger']);

            } elseif ($usuario->cd_status == 'ATIVO') {

                //Verifica botao área do Gestor
                $gestor = DB::table('areadocliente_gestores_users')->where('email', $usuario->cd_email)->first();
                if($gestor) {
                Session::put('admin_gestor_id', $gestor->id);
                }

                Session::put('admin_id', $usuario->id_producao_cliente);
                Session::put('admin_name', $usuario->nm_nome);
                Session::put('admin_cpf', $cpf);
                Session::put('admin_dt_nasc', $usuario->cd_dt_nasc);

                //Verifica se há mais de um pedido
                $pedidos = DB::table('tb_producao_titularidade')->where('id_producao_cliente', $usuario->id_producao_cliente)->get();
                Session::put('admin_qtd_pedido', count($pedidos));

                if(count($pedidos) > 1) {
                    return redirect()->route('cliente_modal');
                }

                Session::put('admin_id_pedido', $usuario->id_pedido);
                return redirect()->route('cliente.index');
            }
        } else {
            //return redirect()->route('login.index')->with('message', 'Usuário não localizado');
            return redirect()->back()->with('message', 'Usuário não localizado');
        }
    }

    public function logout()
    {
        $loginBloqueiaCards = Session::get('loginBloqueiaCards');
        Session::flush();
        Session::put('loginBloqueiaCards', $loginBloqueiaCards);
        return redirect()->route('login.index')->with('message', 'Logout realizado com sucesso');
    }

    public function logoutWhiteLabel($pacote) {
        $loginBloqueiaCards = Session::get('loginBloqueiaCards');
        Session::flush();
        Session::put('loginBloqueiaCards', $loginBloqueiaCards);
//        $this->loginWhiteLabel($pacote);
        return redirect()->route('loginWhiteLabel', $pacote)->with('message', 'Logout realizado com sucesso');
    }


    public function centralAjuda() {
        return view('centralAjuda');
    }




}
