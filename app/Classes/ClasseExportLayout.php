<?php

namespace App\Classes;
//use App\User;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
use Session;
use Schema;

class ClasseExportLayout implements FromCollection,WithHeadings

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
     $retorno = [];
     $result = Schema::getColumnListing($tabela);

     switch ($tabela) {

       case 'tb_producao_cliente':
           $tb_producao_cliente = [];
           $tb_producao_cliente['id_producao_cliente'] = "Matrícula";
           $tb_producao_cliente['nm_nome'] = "Nome";
           $tb_producao_cliente['cd_cpf'] = "CPF";
           $tb_producao_cliente['cd_status'] = "ATIVO/INATIVO";
           $tb_producao_cliente['dt_ativacao'] = "Data de Ativação";
           $tb_producao_cliente['cd_sexo'] = "Sexo";
           $tb_producao_cliente['cd_dt_nasc'] = "Data de Nascimento";
           $tb_producao_cliente['cd_celular'] = "(DDD) Celular";
           $tb_producao_cliente['cd_email'] = "E-mail";
           $tb_producao_cliente['cd_cep'] = "CEP";
           $tb_producao_cliente['cd_endereco'] = "Endereço";
           $tb_producao_cliente['cd_end_numero'] = "Número";
           $tb_producao_cliente['cd_complemento_numero'] = "Complemento";
           $tb_producao_cliente['cd_bairro'] = "Bairro";
           $tb_producao_cliente['cd_cidade'] = "Cidade";
           $tb_producao_cliente['cd_estado'] = "Estado";

          foreach($result as $r) {
             if(isset($tb_producao_cliente[$r])) {
                 $retorno[0][] = $tb_producao_cliente[$r];
             }
           }

       break;

       default:
          $retorno[] = $result;
       break;

     }

    return \collect($retorno);
   }

}
