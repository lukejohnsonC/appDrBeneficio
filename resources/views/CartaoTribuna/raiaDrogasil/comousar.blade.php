@extends('estrutura.master')

@section('conteudo')

@isset($nr_rd_nao_existe)
  <h2>ESTA MENSAGEM SÓ APARECE QUANDO O NR DO RD AINDA NÃO EXISTIR</h2>
@endisset

<section class='container' style="min-height:auto;">
<p>como usar raia drogasil
preencher aqui como usar


NUMERO DO RD: {{$nr_rd}}</p>
</section>

<section id="cartao_virtual" class=''>
@include('CartaoFarmacia.cartaofarmacia')
</section>



@endsection
