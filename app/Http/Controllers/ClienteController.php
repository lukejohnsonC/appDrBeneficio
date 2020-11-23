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

    public function getPaletaDeCoresDrBeneficio() {
      $colors = array(
          "#primary" => "#002561",
          "#secondary" => "#F36F21",
      );
      return $colors;
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
        } else {
            Session::put('admin_logo', null);
        }

        if($info && $info->LOGO_DRBEN) {
          Session::put('admin_LOGO_DRBEN', 0);
        } else {
          Session::put('admin_LOGO_DRBEN', null);
        }

        if($info && $info->ID_GOOGLE_ANALYTICS) {
          Session::put('admin_ID_GOOGLE_ANALYTICS', $info->ID_GOOGLE_ANALYTICS);
        } else {
          Session::put('admin_ID_GOOGLE_ANALYTICS', null);
        }

        //Paleta de cores padrão (Dr Beneficio)
        $colors = $this->getPaletaDeCoresDrBeneficio();
        Session::put('barra_superior', true);

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
        } else {
          Session::put('admin_FAVICON', null);
        }

        if ($info && $info->custom_css) {
          Session::put('admin_CUSTOM_CSS', $info->custom_css);
        } else {
          Session::put('admin_CUSTOM_CSS', null);
        }

        if ($info && $info->title) {
          Session::put('admin_TITLE', $info->title);
        } else {
          Session::put('admin_TITLE', null);
        }

        if ($info && $info->DESABILITA_WHATSAPP) {
          Session::put('admin_DESABILITA_WHATSAPP', $info->DESABILITA_WHATSAPP);
        } else {
          Session::put('admin_DESABILITA_WHATSAPP', null);
        }

        if ($info && $info->BOTAO_VOLTAR) {
            Session::put('admin_BOTAO_VOLTAR', $info->BOTAO_VOLTAR);
        } else {
          Session::put('admin_BOTAO_VOLTAR', null);
        }

        if ($info && $info->NUMERO_WHATSAPP) {
          Session::put('admin_NUMERO_WHATSAPP', $info->NUMERO_WHATSAPP);
        } else {
          Session::put('admin_NUMERO_WHATSAPP', null);
        }
        
        Session::put('colors', $colors);

        Session::put('admin_id_pacote', (int)$pedido->ID_PC_BENEF);

        $data['cpf'] = Session::get('admin_cpf');

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
