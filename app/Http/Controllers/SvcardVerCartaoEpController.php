<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use Response;

class SvcardVerCartaoEpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('SvcardVerCartaoEp.index');
    }
    


public function vercartaoep()
    {
        return view('SvcardVerCartaoEp.verCartaoEp');
        
    }
    
    public function consultasaldoep()
    {
        return view('SvcardVerCartaoEp.consultaSaldoEp');
    }
    
}

/**

 * Criar public function igual alterar nome para exemplo:"VerCartao" e colocar
 * HTML dentro da blade

 */