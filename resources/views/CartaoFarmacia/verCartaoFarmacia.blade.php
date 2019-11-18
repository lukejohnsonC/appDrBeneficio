@extends('estrutura.master') 

@section('conteudo')
<section id="cartao_virtual" class=''>
        <div id='hasBg'>
          <div id="card-verso">
            <label class='col3'>
              <span><b>Número de Identificação:</b></span>
              <a class='pattern' style='cursor:default;margin:0;'><b>{{$nr_rd}}</b></a>
            </label>      
            <img src="{{asset('novo')}}/imgs/partners-2.png">
            <label for="" class="col3"><span style='position: relative;top:-3rem;'>Válido em todas as farmácias da rede:</span></label>
          </div>
        </div>
        <div class="container">
          <!-- <a href="../public/novo/cartaoFarmacia/cartaofarmacia.png" download='cartaoFarmacia.png' class="botao-laranja">clique aqui para fazer o download</a> -->
          <p>Apresente esse cartão no balcão ou caixa da farmácia e solicite seu desconto. Em caso de dúvidas, mostre as orientações abaixo ao atendente.</p>

          <p><b>Sr. Farmacêutico</b>, o portador desse cartão é beneficiário do programa UNIVERS e seu código de identificação está informado no cartão acima (CPF do portador). Em caso de dúvidas, favor contatar a Central de Atendimento UNIVERS.</p>

          <p><b>Caro usuário</b>, você está na página CARTÃO FARMÁCIA. caso esteja procurando o CARTÃO DR. BENEFÍCIO clique no botão abaixo.</p>
        </div>
        <div class="container">
            <a href="{{route('cartaovirtual.index')}}" class='botao-laranja'>Veja aqui seu Cartão Dr. Benefício</a>
        </div>
      </section>

@endsection