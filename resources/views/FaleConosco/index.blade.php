@extends('estrutura.master') 

@section('conteudo')
<section id="central">		
    <div id="fundo-galera"></div>
    <div class="container">
      <div style='margin-bottom:3rem;'>
        <h1>CENTRAL DE ATENDIMENTO</h1>

        <p>Segunda a Sexta, das 9 às 18 horas (exceto feriados)</p>

        <ul id='contacts'>
          <a href="https://wa.me/5513997748080?text=Olá,%20meu%20nome%20é%20(favor,%20coloque%20seu%20nome%20completo%20aqui)%20estou%20entrando%20em%20contato%20pelo%20app%20Dr.%20Beneficio!" target='_blank'><li><span><i class="fab fa-whatsapp"></i>WhatsApp clique aqui</span></li></a> 
          <a href="tel:551332261111"><li><span><i class="fas fa-phone-alt"></i>(13) 3226.1111 ou clique aqui</span></li></a>
        </ul>
      </div>

      <p>Serviços 24h</p>
      
      <div id='ori_funeral'>
        <ul>
          <a href="{{route('orientacaoMedica')}}"><li><span>
            <i class="fas fa-user-md"></i>Orientação Médica por telefone</span></li>
          </a>
          <a id="link_funeral" href="{{route('assistenciafuneral.index')}}">
            <li>
              <span>
                <div id="img-funeral"></div>Assistência Funeral 24h
              </span>
            </li>
          </a>
        </ul>
      </div>

      <p>Conheça ainda nossas redes sociais!</p>

      <ul style="margin-bottom:3rem;">
        <a href="https://www.facebook.com/drbeneficio/" target='_blank'><li><span><i class="fab fa-facebook"></i>Facebook</span></li></a>
        <a href="https://www.instagram.com/drbeneficio/?hl=pt-br" target='_blank'><li><span><i class="fab fa-instagram"></i>Instragram</span></li></a>
      </ul>

      <div id='lastText'>
        <p>Se preferir, mande um e-mail para: <a href="mailto:atendimento@drbeneficio.com.br">atendimento@drbeneficio.com.br</a></p>

        <p>ou acesse nosso site: <a href="http://www.drbeneficio.com.br">www.drbeneficio.com.br</a> e saiba mais sobre todos os nossos produtos e serviços.</p>
      </div>
    </div>
</section>

@endsection