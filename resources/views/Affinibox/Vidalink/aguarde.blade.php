@extends('estrutura.master') 

@section('conteudo')

@if ( Session::get('message') != '' )
      <div id="erro">{{ Session::get('message') }}</div>
@endif

<section id="vantagens" class="">
        <div class="container">
                <img src="{{asset('novo')}}/imgs/vidalink.png" alt="Logo Vidalink" style="margin: 0 auto;display: block;margin-bottom:15px;">
            <h1 style="text-align: center">Recebemos a sua solicitação.</h1>
            <p style="text-align: center">O seu cartão farmácia Vidalink estará liberado em {{$horas_restantes}} horas.</p>
        </div>
</section>
   
@endsection