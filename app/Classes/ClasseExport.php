<?php

namespace App\Classes;
//use App\User;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
use Session;

class ClasseExport implements FromCollection,WithHeadings

{

    /**

    * @return \Illuminate\Support\Collection

    */

    public function collection() {
      return $this->select();
    }

    public function head() {
      $a = array();
      $base = $this->select();
      foreach($base[0] as $property => $value) {
        $a[] = $property;
      }
      return $a;
    }

    public function headings(): array
   {
        return $this->head();
   }

   public function select() {
     $dados = Session::get('dados');
     $tabela = $dados['tabela'];
     $pedido = explode(";", $dados['pedidos']);
     //dd($pedido);
    // return DB::connection('base')->table($tabela)->limit(5)->get();
    $retorno = [];
    foreach($pedido as $p) {

      switch ($tabela) {

        case 'tb_producao_cliente':
          $result = DB::table($tabela)
          ->where('id_pedido', $p)
          ->where('cd_status', 'ATIVO')
          ->select('id_producao_cliente as Matrícula', 'nm_nome as Nome', 'cd_cpf as CPF', 'cd_status as ATIVO/INATIVO', 'dt_ativacao as Data de Ativação', 'cd_sexo as Sexo', 'cd_dt_nasc as Data de Nascimento', 'cd_celular as (DDD) Celular', 'cd_email as E-mail', 'cd_cep as CEP', 'cd_endereco as Endereço', 'cd_end_numero as Número', 'cd_complemento_numero as Complemento', 'cd_bairro as Bairro', 'cd_cidade as Cidade', 'cd_estado as Estado')
          ->get();
        break;

        default:
          $result = DB::table($tabela)
          ->where('id_pedido', $p)
          ->where('cd_status', 'ATIVO')
          ->get();
        break;

      }

        foreach($result as $r) {
          $retorno[] = $r;
        }
    }

    return \collect($retorno);
     //return DB::connection('base')->table($tabela)->where('id_pedido', $pedido)->get();
   }

}
