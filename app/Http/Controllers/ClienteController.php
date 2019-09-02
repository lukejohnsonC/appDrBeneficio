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

        if(Session::get('admin_id_pedido') == null) {
            return redirect()->route('cliente_modal');
        }

        $pedido = DB::table('tb_pedido')->where('id_pedido', Session::get('admin_id_pedido'))->first();

        $pacote_beneficios = DB::table('tb_pacote_beneficio')->where('ID_PC_BENEF', $pedido->ID_PC_BENEF)->first();

        if(!$pacote_beneficios) {
            return redirect()->route('cliente_modal')->with('message', 'Este pedido não possui nenhum benefício');
        }

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

        $data['cpf'] = Session::get('admin_cpf');

        $data['mostrar_todos_beneficios'] = $mostrar_todos_beneficios;

        $data['liberaBotoesTopo'] = 1;

        $data['paginaAtual'] = "cliente";

        return view('cliente', $data);
    }

    public function getEstados() {
         $estados = DB::table('farmacias')
         ->groupby('uf')
         ->select('uf')
         ->get();

        return $estados;
    }

    public function getCidadesWithEstado() {
        $data = request()->all();
        $cidades = DB::table('farmacias')
        ->where('uf', $data['estado'])
        ->groupby('municipio')
        ->select('municipio')
        ->get();

       return Response::json($cidades);
   }

   public function getBairrosWithCidade() {
    $data = request()->all();
    $bairro = DB::table('farmacias')
    ->where('municipio', $data['cidade'])
    ->groupby('bairro')
    ->select('bairro')
    ->get();

   return Response::json($bairro);
}

    public function postFarmacias() {
    $data = request()->all();
    if($data['bairro']) {
        $farmacias = DB::table('farmacias')
        ->where('uf', $data['estado'])
        ->where('municipio', $data['cidade'])
        ->where('bairro', $data['bairro'])
        ->get();
    } else {
        $farmacias = DB::table('farmacias')
        ->where('uf', $data['estado'])
        ->where('municipio', $data['cidade'])
        ->get();
    }    

   return Response::json($farmacias);
    }

    public function turnoff() {
        $data = [];
        $data['liberaBotoesTopo'] = 1;
        return view('turnoff', $data);
    }

    public function verCartaoFarmacia() {
        $data = [];
        $data['liberaBotoesTopo'] = 1;

        $data['nr_rd'] = DB::table('tb_producao_cliente')->where('id_producao_cliente', Session::get('admin_id'))->select('nr_rd')->first()->nr_rd;
        return view('verCartaoFarmacia', $data);
    }

    public function farmaciasCredenciadas() {
        $data = [];
        $data['listaEstados'] = $this->getEstados();
        $data['liberaBotoesTopo'] = 1;
        return view('farmaciasCredenciadas', $data);
    }

    public function redeCredenciadas() {
        $data = [];
        $data['liberaBotoesTopo'] = 1;
        return view('redeCredenciadas', $data);
    }

    public function redeCredenciadaCarregaTipo() {
        $data = request()->all();
        $tipo = DB::table('tb_beneficio')
        ->where('tipo_01', $data['servico'])
        ->where('cd_status','ATIVO')
        ->where('cd_front','SHOW')
        ->select('id_beneficio', 'cd_descr_servico')
        ->orderby('cd_descr_servico')
        ->get();

        return Response::json($tipo);
    }

    public function postRedesCredenciadas() {
        $data = request()->all();

        $busca = DB::table('tb_beneficio_fornecedor as aa')
        ->leftjoin('tb_fornecedor as bb', 'aa.id_fornecedor', '=', 'bb.id_fornecedor')
        ->where('aa.id_beneficio', $data['tipo'])
        ->get();

        return Response::json($busca);
    }


        public function redeCredenciadasAgendar() {
            $data = [];
            $data['liberaBotoesTopo'] = 1;
            return view('redeCredenciadasAgendar', $data);
        }

        public function checkup() {
            $data = [];
            $data['liberaBotoesTopo'] = 1;
            return view('checkup', $data);
        }
    
            public function checkupComoFunciona() {
                $data = [];
                $data['liberaBotoesTopo'] = 1;
                return view('checkupComoFunciona', $data);
            }

            public function checkupVale() {
                $data = [];
                $data['liberaBotoesTopo'] = 1;

                $data['vale'] = DB::table('tb_producao_cliente')
                ->where('id_producao_cliente', Session::get('admin_id'))
                ->first()
                ->cd_celular_checkup;

                return view('checkupVale', $data);
            }

            public function checkupValePost() {
                $data = request()->all();

                DB::table('tb_producao_cliente')
                ->where('id_producao_cliente', Session::get('admin_id'))
                ->update(['cd_celular_checkup' => $data['cel']]);

                return redirect()->route('checkupVale')->with('message', 'Vale Checkup resgatado com sucesso');
            }

                public function odontoRedeCredenciada() {
                    $tipo = DB::table('tb_beneficio')
                    ->where('tipo_01', 'ODONTO')
                    ->where('cd_status','ATIVO')
                    ->where('cd_front','SHOW')
                    ->select('id_beneficio', 'cd_descr_servico')
                    ->orderby('cd_descr_servico')
                    ->first()
                    ->id_beneficio;

                    $data = [];
                    $data['liberaBotoesTopo'] = 1;
                     $data['redes'] = DB::table('tb_beneficio_fornecedor as aa')
                    ->leftjoin('tb_fornecedor as bb', 'aa.id_fornecedor', '=', 'bb.id_fornecedor')
                    ->where('aa.id_beneficio', $tipo)
                    ->get();

                    return view('odontoRedeCredenciada', $data);

                }

                public function odontoAgendar() {
                    $data = [];
                    $data['liberaBotoesTopo'] = 1;
                    

                    return view('odontoAgendar', $data);
                }

                public function orientacaoMedica() {
                    $data = [];
                    $data['liberaBotoesTopo'] = 1;                   

                    return view('orientacaoMedica', $data);

                }

                public function orientacaoNutricional() {
                    $data = [];
                    $data['liberaBotoesTopo'] = 1;                   

                    return view('orientacaoNutricional', $data);

                }

                
}
