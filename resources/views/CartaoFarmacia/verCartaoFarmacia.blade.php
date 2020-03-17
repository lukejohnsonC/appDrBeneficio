@extends('estrutura.master') 

@section('conteudo')
<section id="cartao_virtual" class=''>
        <div id='hasBg'>
          <div id="card-verso">
            <span><b>Número de Identificação:</b></span>
            <span><a class='pattern'>{{$nr_rd}}</a></span>
            <span style='margin-top:3rem;'>Válido em todas as farmácias da rede:</span>
            <img src="{{asset('novo')}}/imgs/partners-2.png">
          </div>
        </div>
        <div class="container">
          <!-- <a href="../public/novo/cartaoFarmacia/cartaofarmacia.png" download='cartaoFarmacia.png' class="botao-laranja">clique aqui para fazer o download</a> -->
          <p>Apresente esse cartão no balcão ou caixa da farmácia e solicite seu desconto. Em caso de dúvidas, mostre as orientações abaixo ao atendente.</p>

          <p><b>Sr. Farmacêutico</b>, o portador desse cartão é beneficiário do programa UNIVERS e seu código de identificação está informado no cartão acima (CPF do portador). Em caso de dúvidas, favor contatar a Central de Atendimento UNIVERS.</p>

      </section>

@endsection