@extends('estrutura.master') 

@section('conteudo')

<a href="{{route('agMenusNovo')}}" class="btn btn-success">Novo menu</a>
<a href="{{route('agMenusClonar')}}" class="btn btn-success">Clonar menu</a>

<br /><br />
Lista dos menus para editar ou excluir aqui

<table border="1">
    <thead>
        <th>Menu</th>
    </thead>
    <tbody>
        @foreach($menus as $m)
        <tr>
            <td>{{$m->NM_PC_BENEFI}} ({{$m->DESCRITIVO}}) <a href="{{route('agMenusEditar', $m->ID_PC_BENEF)}}">Editar</a> || <a href="{{route('agMenusPedidos', $m->ID_PC_BENEF)}}">Pedidos vinculados a este pacote</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection