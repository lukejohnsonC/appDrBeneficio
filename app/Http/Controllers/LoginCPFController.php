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

        return view('logincpf');
    }

    public function loginSemCards()
    {
        if (Session::get('admin_id')) {
            return redirect()->route('cliente.index');
        }

        Session::put('loginBloqueiaCards', 1);

        return redirect()->route('login.index');
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
                return redirect()->back()->with(['message' => 'Infelizmente o seu usuário foi desativado. Entre em contato com os desenvolvedores.', 'message_type' => 'danger']);

            } elseif ($usuario->cd_status == 'ATIVO') {

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
            return redirect()->route('login.index')->with('message', 'Usuário não localizado');
        }
    }

    public function logout()
    {
        $loginBloqueiaCards = Session::get('loginBloqueiaCards');
        Session::flush();
        Session::put('loginBloqueiaCards', $loginBloqueiaCards);
        return redirect()->route('login.index')->with('message', 'Logout realizado com sucesso');
    }


    public function centralAjuda() {
        return view('centralAjuda');
    }

    


}
