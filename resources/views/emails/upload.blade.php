@extends('emails.layout.master')

@section('conteudo')
<p>Pedido: {{$id_pedido}}</p>
<p>Nome: {{$nome}}</p>
@endsection
