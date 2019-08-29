<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class ConveniaController extends Controller
{
    

    public function index()
    {
        $tokenEmpresa = '37dc10e0-6778-11e9-8a5d-7f551e5a000c';
        $tokenUsuario = $this->getTokenUsuarioLogado($tokenEmpresa, Session::get('admin_cpf'));
        $getParceiros = $this->getParceiros($tokenEmpresa, $tokenUsuario);


        dd($getParceiros);


        foreach($getParceiros as $p) {
           //echo $p->name . " <b>VOUCHER: " . $p->voucher . "</b>";
            echo $p->name;
            echo "<br />";
            echo "<img src='".$p->logo."' />";
        }
        
    }

    public function getTokenUsuarioLogado($tokenEmpresa, $cpf) {
        $guzzle = new \GuzzleHttp\Client();
        $request = $guzzle->post('https://clubecore.convenia.com.br/clube/v1/authenticate/' . $tokenEmpresa, [
                'json' => [
                     'document' => $cpf,
                ]
        ]);
        
        $data = json_decode($request->getBody()->getContents());
        
        $url = $data->data;

        $divide = explode("token=", $url);
        $token = explode("&company=", $divide[1]);

        return $token[0];
    }

    public function getParceiros($tokenEmpresa, $tokenUsuarioLogado) {
        $client = new \GuzzleHttp\Client(['base_uri' => 'https://clubecore.convenia.com.br/clube/v1/company/'.$tokenEmpresa.'/perks']);
        $headers = [
            'Authorization' => 'Bearer ' . $tokenUsuarioLogado,        
            'Accept'        => 'application/json',
        ];
        $request = $client->request('GET', '', [
            'headers' => $headers
        ]);
        
        $data = json_decode($request->getBody()->getContents());
          //  dd($data);
        return $data->data->data;
    }


}
