@extends('estrutura.master')

@section('conteudo')

<section id="cartao_virtual">
        <div class='hasBg hasBene'>
          <div class='card-verso'>

            <div>
              <span id='nome'>Nome Completo: <b>{{Session::get('admin_name')}}</b></span>
              <span id='tipo'>Tipo: <b>{{checkTitularidade()}}</b></span>
              <span id='cpf'>CPF: <b>{{formata_cpf(Session::get('admin_cpf'))}}</b></span>
              <ol>
                <li>acesse o site <a href="{{ url('/cliente') }}" target="_blank">www.drbeneficio.com.br</a><br>ou<br>aproxime sua câmera no qr code</li>
                <li>insira o seu CPF e data de nascimento</li>
                <li>aproveite seus benefícios</li>
              </ol>
              <a href="{{ url('/cliente') }}" target="_blank"><img src="{{asset('novo')}}/imgs/qrcode.png" alt="QR Code para nosso site"></a>
            </div>

          </div>
        </div>

        <!-- <a href="../public/novo/cartaoFarmacia/cliente.png" download='cartaoFarmacia.png' class="botao-laranja">clique aqui para fazer o download</a> -->

      </section>

@endsection
