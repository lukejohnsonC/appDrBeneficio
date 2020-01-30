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
      $result = DB::table($tabela)
        ->where('id_pedido', $p)
        ->where('cd_status', 'ATIVO')
        ->get();

        foreach($result as $r) {
          $retorno[] = $r;
        }
    }
    
    return \collect($retorno);
     //return DB::connection('base')->table($tabela)->where('id_pedido', $pedido)->get();
   }

}
