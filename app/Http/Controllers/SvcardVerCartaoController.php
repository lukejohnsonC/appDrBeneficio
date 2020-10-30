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
        return view('SvcardVerCartao.verCartao');
        
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