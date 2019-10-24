@extends('estrutura.master') 

@section('conteudo')


@if(Route::has('gestores.login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('gestores.login') }}">Gestores Login</a>
                        <a href="{{ route('gestores.home') }}">Gestores Home</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
@endif


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