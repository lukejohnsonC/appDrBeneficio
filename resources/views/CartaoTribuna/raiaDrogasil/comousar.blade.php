@extends('estrutura.master')

@section('conteudo')

<section class='container' style="min-height:auto;">
<p>como usar raia drogasil
preencher aqui como usar


NUMERO DO RD: {{$nr_rd}}</p>
</section>

<section id="cartao_virtual" class=''>
@include('CartaoFarmacia.cartaofarmacia')
</section>



@endsection
