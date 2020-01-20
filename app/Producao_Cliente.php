<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producao_Cliente extends Model
{
    protected $table = 'tb_producao_cliente';
    protected $primaryKey = 'id_producao_cliente';

    protected $fillable = [
        'nm_nome', 'cd_cpf', 'cd_status',
    ];
}