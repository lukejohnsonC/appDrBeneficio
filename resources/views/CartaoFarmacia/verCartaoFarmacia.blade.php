@extends('estrutura.master') 

@section('conteudo')
<section id="cartao_virtual" class=''>
        <div id='hasBg'>
          <div id="card-verso">
            <label class='col3'>
              <span>Número de Identificação:</span>
              <span><b>{{$nr_rd}}</b></span>
            </label>      
            <img src="{{asset('novo')}}/imgs/partners-2.png">
            <label for="" class="col3"><span style='position: relative;top:-3rem;'>Válido em todas as farmácias da rede:</span></label>
          </div>
        </div>
        <div class="container">
          <p>Apresente esse cartão no balcão ou caixa da farmácia e solicite seu desconto. Em caso de dúvidas, mostre as orientações abaixo ao atendente.</p>

          <p><b>Sr. Farmacêutico</b>, o portador desse cartão é beneficiário do programa UNIVERS e seu código de identificação está informado no cartão acima (CPF do portador). Em caso de dúvidas, favor contatar a Central de Atendimento UNIVERS.</p>

          <p><b>Caro usuário</b>, você está na página CARTÃO FARMÁCIA. caso esteja procurando o CARTÃO SIDESC clique no botão abaixo.</p>
        </div>
        <div class="container">
            <a href="{{route('cartaovirtual.index')}}" class='botao-laranja'>Veja aqui seu Cartão Dr. Benefício</a>
        </div>
      </section>

@endsection