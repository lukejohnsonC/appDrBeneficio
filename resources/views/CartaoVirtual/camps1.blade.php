@extends('estrutura.master')

@section('conteudo')

<section id="cartao_virtual">
        <div class='hasBg hasBene'>
          <div class='card-verso'>


            <div>
              <span id='nome'>Nome Completo: <b>{{Session::get('admin_name')}}</b></span>
              <span id='tipo'>Nasc: <b>{{formata_data($cliente->cd_dt_nasc)}}</b></span>
              <span id='cpf'>CPF: <b>{{formata_cpf(Session::get('admin_cpf'))}}</b></span>
              <ul>
              {{--  <li><b>Matricula: </b>13432</li>
                <li><b>N. Apolíce: </b>12926</li> --}}
                <li><b>Telefone: </b> @if($cliente->cd_telefone) {{$cliente->cd_telefone}} @elseif($cliente->cd_celular) {{$cliente->cd_celular}} @elseif($cliente->cd_celular_numero) {{$cliente->cd_celular_numero}} @endif</li>
              {{--  <li><b>Data Emissão: </b>10/10/1900</li>
                <li><b>Validade: </b>05/2019</li> --}}
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
