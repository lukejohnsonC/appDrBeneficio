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
          <p>Sr. Farmacêutico, o portador desse cartão é beneficiário do programa UNIVERS e seu código de identificação está informado no cartão acima. Em caso de dúvidas, favor contatar a Central de Atendimento UNIVERS.</p>
          <h3>
            <p  style="display:none">Você está na página CARTÃO FARMÁCIA. Quer voltar ao menu anterior ou acessar seu cartão Dr. Benefício, clique no botão abaixo.</p>
          </h3>
        </div>
        <div class="container">
            <a href="{{route('cartaovirtual.index')}}" class='botao-laranja'>Veja aqui seu Cartão Dr. Benefício</a>
        </div>
      </section>

@endsection