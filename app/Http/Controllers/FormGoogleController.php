<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use DB;

class FormGoogleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function formulario()
    {
        return view('googleForm');
    }
}
