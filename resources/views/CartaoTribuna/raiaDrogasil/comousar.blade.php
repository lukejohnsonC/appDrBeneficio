@extends('estrutura.master')

@section('conteudo')

<section class='container' style="min-height:auto;display:none;">
<p>como usar raia drogasil
preencher aqui como usar


NUMERO DO RD: {{$nr_rd}}</p>
</section>

@isset($nr_rd_nao_existe)
  <div class="container">
    <h3>Prezado Usuário, o seu Cartão de Descontos para as Redes Drogasil e Raia, está sendo processado em nossos sistemas. Em breve o seu cartão estará disponível. Obrigado!</h3>
  </div>
@else
<section id="cartao_virtual" class=''>
  @include('CartaoFarmacia.cartaofarmacia')
</section>
@endisset



@endsection
