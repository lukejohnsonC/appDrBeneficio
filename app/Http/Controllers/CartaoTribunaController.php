<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;

class CartaoTribunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = "2")
    {
      $guzzle = new \GuzzleHttp\Client();
      $request = $guzzle->get('http://aspin.atribuna.com.br:8081/ScapSOA/service/find/client?id=' . $id, [
      ]);

     $data = json_decode($request->getBody()->getContents());
     $data = $data[0];
     dd($data);
    }

    public function logout()
    {
        $loginBloqueiaCards = Session::get('loginBloqueiaCards');
        Session::flush();
        Session::put('loginBloqueiaCards', $loginBloqueiaCards);
        //return redirect()->route('login.index')->with('message', 'Logout realizado com sucesso');
        return \Redirect::to('http://clube.atribuna.com.br/');
    }
}
