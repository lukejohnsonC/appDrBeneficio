@extends('estrutura.master') 

@section('conteudo')

<section id="cartao_virtual">
        <div class='hasBg hasBene'>    
          <div class='card-verso'>
            <!-- <label class="col3">        
              <span>Nome:</span>
              <span style='text-transform:capitalize;'>José Roberto Montoro</span>
            </label>
            <label class='col3'>
              <span>Código de Identificação:</span>
              <span>xxx.xxx.xxx-xx</span>
            </label> -->
      
            <div>
              <span>Nome Completo: <b>{{Session::get('admin_name')}}</b></span>
              <span>CPF: <b>{{formata_cpf(Session::get('admin_cpf'))}}</b></span>
              <ul>
                @foreach ($beneficios as $b)
                <li>{{$b->NM_BENEF}}</li>
                @endforeach
              </ul>
            </div>
      
          </div>
        </div>
        <div class="container">
          <h3>
            <p>Você está vendo o seu CARTÃO DR. BENEFÍCIO, caso esteja procurando o CARTÃO FARMÁCIA clique no botão abaixo.</p>
          </h3>
            <a href="{{route('verCartaoFarmacia')}}" class='botao-laranja'>Veja aqui seu Cartão Farmácia</a>
        </div>
      </section>

@endsection