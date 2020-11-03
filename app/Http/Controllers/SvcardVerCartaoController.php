<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use Response;

class SvcardVerCartaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index()
    {
        return view('SvcardVerCartao.index');
    }

    public function vercartao()
    {
        $pedido = DB::table('tb_pedido')->where('id_pedido', Session::get('admin_id_pedido'))->first();
        $data = [];
        $data['image'] = $pedido->capa_modal;
        return view('SvcardVerCartao.verCartao', $data);
    }
    
    public function consultaSaldo()
    {
        return view('SvcardVerCartao.consultaSaldo');
    }
    
}

/**

 * Criar public function igual alterar nome para exemplo:"VerCartao" e colocar
 * HTML dentro da blade

 */