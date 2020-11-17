@extends('estrutura.master')

@section('conteudo')
<section id="cartao_virtual" class=''>
        @include('CartaoFarmacia.cartaofarmacia')
        <div class="container">
          <!-- <a href="../public/novo/cartaoFarmacia/cartaofarmacia.png" download='cartaoFarmacia.png' class="botao-laranja">clique aqui para fazer o download</a> -->
          <p>Apresente esse cartão no balcão ou caixa da farmácia e solicite seu benefício. Em caso de dúvidas, mostre as orientações abaixo ao atendente.</p>

          <p><b>Sr. Farmacêutico</b>, o portador desse cartão é beneficiário do programa UNIVERS e seu código de identificação está informado no cartão acima (CPF do portador). Em caso de dúvidas, favor contatar a Central de Atendimento UNIVERS.</p>

      </section>

@endsection
