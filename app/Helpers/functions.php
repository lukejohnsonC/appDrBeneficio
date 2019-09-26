<?php

use Illuminate\Support\Facades\Session;


function formata_data($data) {
    //$data = str_replace("/", "-", $data);
	$date = new DateTime($data);
	return $date->format('d/m/Y');
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

?>