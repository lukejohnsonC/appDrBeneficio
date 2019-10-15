@extends('estrutura.master') 

@section('conteudo')

@if ( Session::get('message') != '' )
      <div id="erro">{{ Session::get('message') }}</div>
@endif
<section id="funeral" class='ativeVantagens'>
<div class="container">
        <h1>Falta Pouco!</h1>
    
        <p>Para que possamos finalizar, precisamos ativar seu cadastro, basta clicar no botão laranja abaixo e aguardar por 48 horas.</p>
    
        <a href="{{route('affiniboxVidalinkGeraCartao')}}" class="pattern">clique aqui</a><br>
    
        <a href="javascript:history.back()" class='pattern'><span><i class="fas fa-undo-alt"></i> voltar ao menu principal</span></a>
    </div>
</section>

@endsection