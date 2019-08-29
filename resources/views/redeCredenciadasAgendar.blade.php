@extends('estrutura.master') 

@section('conteudo')
<section id="agendar">
        <div class="container">
          <p>Para agendar consultas ou exames, entre em contato com nossa central de agendamento através dos canais de atendimento abaixo:</p>
  
          <a href="https://api.whatsapp.com/send?phone=5513"><i class="fab fa-whatsapp"></i>What's App</a>
          <a href="tel:(13)"><i class="fas fa-phone-alt"></i>Telefone</a>
          <a href="javascript:history.back()" class='pattern'><span><i class="fas fa-undo-alt"></i> voltar ao menu principal</span></a>
        </div>      
  
        </section>
@endsection