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

    $retorno[] = $result;

    return \collect($retorno);
   }

}
