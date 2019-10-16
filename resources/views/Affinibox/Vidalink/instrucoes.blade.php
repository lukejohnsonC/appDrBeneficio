@extends('estrutura.master') 

@section('conteudo')

@if ( Session::get('message') != '' )
      <div id="erro">{{ Session::get('message') }}</div>
@endif

<section id="funeral" class='ativeVantagens'>
        <div class="container">
            <h1>Primeiros Passos!</h1>
        
            <img src="{{asset('novo')}}/imgs/vidalink.png" alt="Logo Vidalink">
        
            <h3>Até 20% de desconto nas principais farmácias do Brasil</h3>
        
            <div>
                <span>Nome: {{$cliente->nm_nome}}</span><br>
                <span id='vidalink'>NÚMERO VIDALINK: {{$cartao->CODIGO_CARTAO}}</span><br>
                <span>CPF: {{formata_cpf($cliente->cd_cpf)}}</span><br>
                <span>Data de nascimento: {{formata_data($cliente->cd_dt_nasc)}}</span>
            </div>
        
            <p>O Vidalink é um plano de medicamento exclusivo para membros e dependentes desse clube. Confira as principais vantagens:</p>
        
            <p>
                - Acesso a mais de 20.000 farmácias credenciadas em todo o Brasil (<a href=''>Clique aqui para consultar as unidades credenciadas</a>).<br>
                - Preços diferenciados em mais de 8.000 remédios, cobrindo mais de 95% de patologias.
            </p>
        
            <h3>Regras de utilização</h3>
        
            <p>
                - Esse benefício não é cumulativo com quaisquer outros descontos disponíveis na farmácia, como de planos de saúde.<br>
                - A liberação do descnoto pelo clube tem validade de 30 dias. Após esse período, é necessário ativar novamente através do link indicado.
            </p>
        
            <h3>Como utilizar:</h3>
        
            <ul>
                <li>Na farmácia credenciada escolhida, informe ao balconista seu CPF e que você possui o benefício Vidalink;</li>
                <li>O balconista checará o plano e aplicará os descontos nos produtos elegíveis;</li>
            </ul>
        
            <a href="javascript:history.back()" class='pattern'><span><i class="fas fa-undo-alt"></i> voltar ao menu principal</span></a>
        </div>
        </section>
   
@endsection