<?php

use Illuminate\Support\Facades\Session;


function formata_data($data) {
    //$data = str_replace("/", "-", $data);
	$date = new DateTime($data);
	return $date->format('d/m/Y');
}

function formata_data_sem_dia($data) {
    //$data = str_replace("/", "-", $data);
	$date = new DateTime($data);
	return $date->format('m/y');
}

function formata_cpf($data) {
    if ($data) {
        $data = mascaras_formata($data,'###.###.###-##');
        return $data;
    }
}

function mascaras_formata($val, $mask) {
    $maskared = '';
    $k = 0;
    for($i = 0; $i<=strlen($mask)-1; $i++)
    {
        if($mask[$i] == '#')
        {
            if(isset($val[$k]))
                $maskared .= $val[$k++];
        }
        else
        {
            if(isset($mask[$i]))
                $maskared .= $mask[$i];
        }
    }
    return $maskared;
}

function checkTitularidade() {
	$return = DB::table('tb_producao_titularidade')->where('id_producao_cliente', Session::get('admin_id'))->first()->cd_titularidade;
	return $return;
}

?>
