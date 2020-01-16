@extends('estrutura.master') 

@section('conteudo')

<section id="cartao_virtual">
        <div class='hasBg hasBene'>    
          <div class='card-verso'><!-- 
            <div>
              <span id='nome'>Nome Completo: <b>{{Session::get('admin_name')}}</b></span>
              <span id='tipo'>Tipo: <b>titular</b></span>
              <span id='cpf'>CPF: <b>{{formata_cpf(Session::get('admin_cpf'))}}</b></span>
              <ol>
                <li>acesse o site <a href="{{ url('/cliente') }}" target="_blank">www.drbeneficio.com.br</a><br>ou<br>aproxime sua câmera no qr code</li>
                <li>insira o seu CPF e data de nascimento</li>
                <li>aproveite seus benefícios</li>
              </ol>
              <a href="{{ url('/cliente') }}" target="_blank"><img src="{{asset('novo')}}/imgs/qrcode.png" alt="QR Code para nosso site"></a>
            </div>-->

            <div>
              <span id='nome'>Nome Completo: <b>{{Session::get('admin_name')}}</b></span>
              <span id='tipo'>nasc: <b>28/05/1994</b></span>
              <span id='cpf'>CPF: <b>{{formata_cpf(Session::get('admin_cpf'))}}</b></span>
              <ul>
                <li><b>Matricula: </b>13432</li>
                <li><b>N. Apolíce: </b>12926</li>
                <li><b>Telefone: </b>13974227566</li>
                <li><b>data emissão: </b>17/04/2018</li>
                <li><b>validade: </b>05/2019</li>
              </ul>
            </div>
      
          </div>
        </div>


        <div class="container">
          <!-- <a href="../public/novo/cartaoFarmacia/cliente.png" download='cartaoFarmacia.png' class="botao-laranja">clique aqui para fazer o download</a> -->
          <h3>
            <p>Você está vendo o seu CARTÃO DR. BENEFÍCIO, caso esteja procurando o CARTÃO FARMÁCIA clique no botão abaixo.</p>
          </h3>
            <a href="{{route('verCartaoFarmacia')}}" class='botao-laranja'>Veja aqui seu Cartão Farmácia</a>
        </div>
      </section>

@endsection