<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GestaoController extends Controller
{

 public function __construct()
 {
 app('App\Http\Controllers\LoginCPFController')->processaCoresDrBeneficio();
 }
 /**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
 public function index()
 {
 // return view('gestao.login');
 return view('gestao.auth.login');
 }

 public function login() {
    //return view('gestao.auth.login');
 }

 public function logar() {
     dd("Área do Gestor aqui!");
 }

}
