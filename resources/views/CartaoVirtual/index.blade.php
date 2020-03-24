@extends('estrutura.master')

@section('conteudo')

@if (\Session::has('success'))
    <div id="erro" style="background-color:green;color:white">{!! \Session::get('success') !!}</div>
@endif

@if (\Session::has('error'))
    <div id="erro">{!! \Session::get('error') !!}</div>
@endif


@include('CartaoVirtual.cartao')


      <section style="margin-top:25px;">
        <div class="container">
          <h3 style="text-align:center;">Solicitar segunda via do Cartão</h3>
          <a href="{{route('solicitarSegundaVia')}}" class="botao-laranja">Solicitar</a>
        </div>
      </section>

@endsection
