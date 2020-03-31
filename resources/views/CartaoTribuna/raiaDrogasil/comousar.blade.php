@extends('estrutura.master')

@section('conteudo')




@isset($nr_rd_nao_existe)
  <div class="container">
    <h3>Prezado Usuário, o seu Cartão de Descontos para as Redes Drogasil e Raia, está sendo processado em nossos sistemas. Em breve o seu cartão estará disponível. Obrigado!</h3>
  </div>
@else
<section class='container' style="min-height:auto;">
  <p>Caro ASSINANTE, apresente o cartão abaixo em qualquer farmácia da rede DROGA RAIA ou DROGASIL para obter desconto em seu medicamento (se solicitado, informe também seu CPF).
<br /><br />
  NÃO ESQUEÇA DE MENCIONAR AO BALCONISTA/FARMACÊUTICO que você é um cliente DR. BENEFÍCIO, que faz parte da rede UNIVERSE. Caso o problema persista, peça para ele contatar a central de atendimento UNIVERSE.
<br /><br />
  IMPORTANTE: Benefício válido somente para o ASSINANTE titular (não extensivo para familiares e dependentes).</p>
</section>
<section id="cartao_virtual" class=''>
  @include('CartaoFarmacia.cartaofarmacia')
</section>
@endisset



@endsection
