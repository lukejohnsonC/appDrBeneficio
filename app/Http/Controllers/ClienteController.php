<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Session;
use Response;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function modal() {
        $data = [];
        //Verifica se há mais de um pedido
        $data['pedidos'] = DB::table('tb_producao_titularidade as pt')
        ->leftjoin('tb_pedido as p', 'pt.id_pedido', '=', 'p.id_pedido')
        ->where('pt.id_producao_cliente', Session::get('admin_id'))
        ->select('p.*')
        ->get();

        $data['liberaBotoesTopo'] = 1;

        if(count($data['pedidos']) == 1) {
            return redirect()->route('cliente.index');
        }

        Session::put('admin_id_pedido', null);

        return view('modal', $data);
     }

     public function modal_seleciona_pedido($id_pedido) {
        //Seguraça, verifica se este usuário tem permissão para acessar este pedido
        $pedido = DB::table('tb_producao_titularidade as pt')
        ->leftjoin('tb_pedido as p', 'pt.id_pedido', '=', 'p.id_pedido')
        ->where('pt.id_producao_cliente', Session::get('admin_id'))
        ->where('pt.id_pedido', $id_pedido)
        ->select('p.*')
        ->first();

        if($pedido) {
            Session::put('admin_id_pedido', $id_pedido);
            return redirect()->route('cliente.index');
        }

        return redirect()->route('cliente_modal')->with('message', 'Você não tem permissão para acessar este pedido. Por favor, escolha um dos pedidos abaixo');
    }


    public function index()
    {
        Session::put('admin_logo', null);
        Session::put('admin_LOGO_DRBEN', null);

        if(Session::get('admin_id_pedido') == null) {
            return redirect()->route('cliente_modal');
        }

        $pedido = DB::table('tb_pedido')->where('id_pedido', Session::get('admin_id_pedido'))->first();
        $pacote_beneficios = DB::table('tb_pacote_beneficio')->where('ID_PC_BENEF', $pedido->ID_PC_BENEF)->first();

        if(!$pacote_beneficios) {
            //Verifica se há mais de um pedido
                $data['pedidos'] = DB::table('tb_producao_titularidade as pt')
                ->leftjoin('tb_pedido as p', 'pt.id_pedido', '=', 'p.id_pedido')
                ->where('pt.id_producao_cliente', Session::get('admin_id'))
                ->select('p.*')
                ->get();

                if(count($data['pedidos']) == 1) {
                    Session::flush();
                    return redirect()->route('login.index')->with('message', 'Este pedido não possui nenhum benefício');
                } else {
                    return redirect()->route('cliente_modal')->with('message', 'Este pedido não possui nenhum benefício');
                }
        }

        $data['menu'] = DB::table('areadocliente_menu')->where('ID_PC_BENEF', '=', $pacote_beneficios->ID_PC_BENEF)->orderby('ORDEM')->get();
        $info = DB::table('areadocliente_info')->where('ID_PC_BENEF', $pedido->ID_PC_BENEF)->first();
        if($info && $info->LOGO) {
            Session::put('admin_logo', $info->LOGO);
        }

        if($info && $info->LOGO_DRBEN) {
            Session::put('admin_LOGO_DRBEN', 0);
        }

        if($info && $info->ID_GOOGLE_ANALYTICS) {
          Session::put('admin_ID_GOOGLE_ANALYTICS', $info->ID_GOOGLE_ANALYTICS);
        }

        //Session::put('admin_logo', $cpf);

        //dd($data['menu']);





        /*

        $beneficios_permitidos =
            DB::table('tb_juncao_pc_bn as aa')
            ->leftjoin('tb_beneficios as bb', 'aa.ID_BN', '=', 'bb.ID_BENEF')
            ->where('aa.ID_PC', $pacote_beneficios->ID_PC_BENEF)
            ->select('bb.*')
            ->orderby('bb.NM_BENEF')
            ->get();

           // dd($beneficios_permitidos);

        $mostrar_todos_beneficios = 1; //0 = desativado, 1 = ativado

        $data = [];

        if($mostrar_todos_beneficios == 1) {
            $data['beneficios'] = DB::table('tb_beneficios')->get();
        } else {
            $data['beneficios'] = $beneficios_permitidos;
        }


        foreach ($data['beneficios'] as $key => $b) {

            if($mostrar_todos_beneficios == 1) {
                foreach ($beneficios_permitidos as $bp) {
                    if ($b->ID_BENEF == $bp->ID_BENEF) {
                        $data['beneficios'][$key]->PERMITIDO = 1;
                    }
                }
            }

            switch ($b->NM_BENEF) {
                case "ASSISTENCIA FUNERAL 24H":
                $data['beneficios'][$key]->ICONE = "img-funeral";
                $data['beneficios'][$key]->TITULO_HTML = "Assistência Funeral 24h";
                break;

                case "CLUBE DE VANTAGENS":
                $data['beneficios'][$key]->ICONE = "img-vantagens";
                $data['beneficios'][$key]->TITULO_HTML = "Clube de Vantagens";
                break;

                case "CONSULTAS E EXAMES":
                $data['beneficios'][$key]->ICONE = "img-consultas";
                $data['beneficios'][$key]->TITULO_HTML = "Consultas, exames e odonto";
                break;

                case "DISK SAUDE":
                $data['beneficios'][$key]->ICONE = "img-saude";
                $data['beneficios'][$key]->TITULO_HTML = "Disk Saúde";
                break;

                case "CARTÃO FARMACIA":
                $data['beneficios'][$key]->ICONE = "img-cartao_farmacia";
                $data['beneficios'][$key]->TITULO_HTML = "Cartão Farmácia";
                break;

                case "ODONTO":
                $data['beneficios'][$key]->ICONE = "img-odonto";
                $data['beneficios'][$key]->TITULO_HTML = "Odonto";
                break;
            }
        }

        */

        $data['cpf'] = Session::get('admin_cpf');

       // $data['mostrar_todos_beneficios'] = $mostrar_todos_beneficios;

        $data['liberaBotoesTopo'] = 1;

        $data['paginaAtual'] = "cliente";

        return view('cliente', $data);
    }



    public function turnoff() {
        $data = [];
        $data['liberaBotoesTopo'] = 1;
        return view('turnoff', $data);
    }


        public function verHTML($id_menu) {
            $menu = DB::table('areadocliente_menu')->where("ID_MENU", $id_menu)->first();
           // dd($menu);
            $data = [];
            $data['conteudo'] = $menu->CONTEUDO;
            return view('verHTML', $data);
        }




}
