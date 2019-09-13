@extends('estrutura.master') 

@section('conteudo') 

<h2>Lista de pedidos vinculados a este menu</h2>
<br />
<ul>
    @foreach($pedidosAtivos as $pa)
    <li>#{{$pa->id_pedido}} - {{$pa->cd_pedido}}</li>
    @endforeach
</ul>

<h2>Vincular pedidos a este menu</h2>
<form action="{{route('agMenusPedidosPost')}}" method="post" style="text-align: left">
    <input type="submit" value="Enviar" />
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="pacote" value="{{$pacote}}" />
    @foreach($pedidos as $p)
    <div style="width:100%;float:left;">
        <label><input type="checkbox" name="pedidos[]" value="{{$p->id_pedido}}" /> {{$p->cd_pedido}} (Pacote atual: {{$p->ID_PC_BENEF}} )</label>
    </div>
    @endforeach
</form>
@endsection