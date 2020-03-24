@extends('estrutura.master')

@section('conteudo')

<section id="cartao_virtual" class=''>
@include('CartaoFarmacia.cartaofarmacia')
</section>

	<section class='container'>
<p>como usar raia drogasil
preencher aqui como usar


NUMERO DO RD: {{$nr_rd}}</p>
</section>

@endsection
