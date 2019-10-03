@extends('estrutura.master') 

@section('conteudo')
<section id="ori_nutricional">
        <div class="container">
            <p>Para agendar uma Orientação Nutricional por telefone, ligue agora para (13) 3226.1111.</p>
    
              <a href="tel:133226-1111">clique aqui para ligar</a>
    
              <p>Importante: Tenha em mãos o CPF da pessoa que necessita de atendimento.</p>
              
              <a href="{{ url()->previous() }}" class='pattern'><span><i class="fas fa-undo-alt"></i> voltar ao menu principal</span></a>
        </div>
      </section>
@endsection