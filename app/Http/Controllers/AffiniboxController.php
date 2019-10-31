<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use DateTime;
use Illuminate\Support\Facades\Validator;

class AffiniboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $this->affiniboxRegisterUser();

      // dd($data['beneficios']);



     /*   LISTAR BENEFICIOS 
     
        $token = $this->affiniboxGetToken();
        $guzzle = new \GuzzleHttp\Client();
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept'        => 'application/json',        
        ];

        $request = $guzzle->get('https://api.affinibox.com.br/associacao/our-benefits?page=1&limit=50', [
                'headers' => $headers
        ]);
        
       $resposta = json_decode($request->getBody()->getContents());

       $data = [];
       $data['beneficios'] = $resposta->data;

      // dd($data['beneficios']);
        
        return view('Affinibox.beneficios', $data); */
    }

    public function affiniboxVidalink() {
        $data = [];
        $limiteHoras = 48;
        $data['cartao'] = DB::table('areadocliente_cdv_vidalink')
        ->where('ID_CLIENTE', Session::get('admin_id'))
        ->first();
        
        $data['cliente'] = DB::table('tb_producao_cliente')
        ->where('id_producao_cliente', Session::get('admin_id'))
        ->first();

        if($data['cartao']) {
            $start_date = new DateTime($data['cartao']->created_at);
            $since_start = $start_date->diff(new DateTime(now()));
            //echo $since_start->days.' days total<br>';       

            $minutes = $since_start->days * 24 * 60;
            $minutes += $since_start->h * 60;
            $minutes += $since_start->i;
            //echo $minutes.' minutes';
            $data['horas'] = $minutes/60;
            $data['horas_restantes'] = ceil($limiteHoras - $data['horas']);

            /* DATA DE LIBERAÇÃO */
            $data_final = new DateTime($data['cartao']->created_at);
            $data_final->modify('+ 48 hour');
            $data['data_inicial'] = $start_date->format('M d, Y H:i:s');
            $data['data_final'] = $data_final->format('M d, Y H:i:s');            
        }
        
        if($data['cartao']) {    
                    if($data['horas'] >= $limiteHoras) {
                        //MOSTRAR NUMERO DO CARTAO E INSTRUÇÕES AQUI
                        return view('Affinibox.Vidalink.instrucoes', $data);
                        
                    } else {
                        //MOSTRAR AVISO PARA AGUARDAR 48 HORAS AQUI
                        return view('Affinibox.Vidalink.aguarde', $data);
                        
                    }
        } else {
                    //MOSTRAR BOTAO DE GERAR CARTÃO AQUI
                    return view('Affinibox.Vidalink.solicitar', $data);
                    
        }

    }



    public function affiniboxVidalinkGeraCartao() {
        $cliente = DB::table("tb_producao_cliente")->where("id_producao_cliente", Session::get('admin_id'))->first();
        $guzzle = new \GuzzleHttp\Client();
        $request = $guzzle->post('https://www.vidalink.com.br/services/api/vida/cadastrar', [
                'json' => [
                    'LOGIN' => 'RH35036',
                    'SENHA' => 'APIAFFIN01',
                    //'NUMERO_VIDALINK' => $cliente->id_producao_cliente,
                    'NUMERO_VIDALINK' => "CT000621",
                    'CPF' => $cliente->cd_cpf,
                    'AREA' => "AFFINIBOX",
                    'SUBAREA' => "AFFINIBOX",
                    'DATA_INI_BENEFICIO' => date('Ymd'),
                    'DATA_FIM_BENEFICIO' => date('Ymd', strtotime('+1 year')),
                    'TITULARIDADE' => "1",
                    'MATRICULA' => $cliente->cd_cpf,
                    'DATA_NASCIMENTO' => str_replace('-','',$cliente->cd_dt_nasc),
                    'NOME' => $cliente->nm_nome
                ]
        ]);
        
       $data = json_decode($request->getBody()->getContents()); 

       if($data->NUM_CARTAO) {
        DB::table('areadocliente_cdv_vidalink')->insert(
            array('ID_CLIENTE' => $cliente->id_producao_cliente, 'CODIGO_CARTAO' => $data->NUM_CARTAO, 'DATA_INI_BENEFICIO' => date('Y-m-d'), 'DATA_FIM_BENEFICIO' => date('Y-m-d', strtotime('+1 year')), 'created_at' => now(), 'updated_at' => now())
        );
           return redirect()->route('affiniboxVidalink');
       } else {
           return redirect()->route('affiniboxVidalink')->with('message', $data->MENSAGEM);
       }
    }
    

        public function affiniboxOpenLoginLink() {
            $guzzle = new \GuzzleHttp\Client();
        $request = $guzzle->post('https://api.affinibox.com.br/associacao/openLoginLink', [
                'json' => [
                    'api_key' => 'b14d03695ae0144eb0929e7ee8d823d1',
                    'secret_token' => '00c448024047424ce47eceb9413887bc',
                    'email' => 'marcos@drbeneficio.com.br',
                    'password' => '123456'
                ]
        ]);
        
       $data = json_decode($request->getBody()->getContents());
        dd($data);
       return $data->access_token;
        }


    public function affiniboxGetToken() {
        $guzzle = new \GuzzleHttp\Client();
        $request = $guzzle->post('https://api.affinibox.com.br/associacao/auth/get-benefits-token', [
                'json' => [
                     'api_key' => 'b14d03695ae0144eb0929e7ee8d823d1',
                     'secret_token' => '00c448024047424ce47eceb9413887bc'
                ]
        ]);
        
       $data = json_decode($request->getBody()->getContents());

       return $data->access_token;
    }





    public function affiniboxRegisterUser() {
        $cliente = DB::table("tb_producao_cliente")->where("id_producao_cliente", Session::get('admin_id'))->first();
       // dd($cliente);

        $guzzle = new \GuzzleHttp\Client();
        $request = $guzzle->post('https://api.affinibox.com.br/associacao/integration/register', [
                'json' => [
                     'code' => "43089683806",
                     'email' => "marcos@drbeneficio.com.br",
                     'password' => "123456",
                     'name' => "Marcos Bruno Santos Barroso",

                ]
        ]);
        
       $data = json_decode($request->getBody()->getContents());
        dd($data);
       return $data->access_token;
    }


    public function affiniboxOutBenefits() {
    

       //return $data->access_token;
        
        
    }





    public function vidalinkExterno() {
        return view('Affinibox.VidalinkExterno.index');
    }

    public function vidalinkExternoPost() {
        $request = \Request::all();

        //dd($request['cpf']);

        $request["cpf"] = preg_replace('/[^A-Za-z0-9\-]/', '', $request["cpf"]);
        $request["cpf"] = str_replace('-', '', $request["cpf"]);
        $request["nascimento"] = str_replace('/', '-', $request["nascimento"] );
        $request["nascimento"] = date("Y-m-d", strtotime($request["nascimento"]));

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
        $nome = "SIDESC NOME";

        //dd(str_replace('-','',$nascimento));


       // $cliente = DB::table("tb_producao_cliente")->where("id_producao_cliente", Session::get('admin_id'))->first();
        $guzzle = new \GuzzleHttp\Client();
        $request = $guzzle->post('https://www.vidalink.com.br/services/api/vida/cadastrar', [
                'json' => [
                    'LOGIN' => 'RH35036',
                    'SENHA' => 'APIAFFIN01',
                    //'NUMERO_VIDALINK' => $cliente->id_producao_cliente,
                    'NUMERO_VIDALINK' => "CT000621",
                    'CPF' => $cpf,
                    'AREA' => "AFFINIBOX",
                    'SUBAREA' => "AFFINIBOX",
                    'DATA_INI_BENEFICIO' => date('Ymd'),
                    'DATA_FIM_BENEFICIO' => date('Ymd', strtotime('+1 year')),
                    'TITULARIDADE' => "1",
                    'MATRICULA' => $cpf,
                    'DATA_NASCIMENTO' => str_replace('-','',$nascimento),
                    'NOME' => $nome
                ]
        ]);
        
       $data = json_decode($request->getBody()->getContents()); 

       if($data->NUM_CARTAO) {
        DB::table('vidalink_externo')->insert(
            array('NOME' => $nome, 'DATA_NASCIMENTO' => $nascimento, 'CPF' => $cpf, 'CODIGO_CARTAO' => $data->NUM_CARTAO, 'DATA_INI_BENEFICIO' => date('Y-m-d'), 'DATA_FIM_BENEFICIO' => date('Y-m-d', strtotime('+1 year')), 'created_at' => now(), 'updated_at' => now())
        );
           return redirect()->route('vidalinkExterno')->with('message', 'Solicitação de Cartão Vidalink realizada com sucesso');
       } else {
           return redirect()->route('vidalinkExterno')->with('message', $data->MENSAGEM);
       }


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
}
