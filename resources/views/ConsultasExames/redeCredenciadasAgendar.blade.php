@extends('estrutura.master') 

@section('conteudo')
<section id="agendar">
        <div class="container">
          <p>Para agendar consultas ou exames, entre em contato com nossa central de agendamento através dos canais de atendimento abaixo:</p>
  
          <a href="https://api.whatsapp.com/send?phone=13997748080" target='_blank'><i class="fab fa-whatsapp"></i><button class="pattern">(13)9 9774.8080</button> ou clique no botão laranja</a>
          <a href="tel:1332261111"><i class="fas fa-phone-alt"></i><button class="pattern">(13) 3226.1111</button> ou clique no botão laranja</a>
          <a href="javascript:history.back()" class='pattern'><span><i class="fas fa-undo-alt"></i> voltar ao menu principal</span></a>
        </div>      
        </section>
@endsection