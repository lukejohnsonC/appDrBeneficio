@extends('estrutura.master')

@section('conteudo')
<section id="central">
    <div id="fundo-galera"></div>
    <div class="container" style="margin-bottom:50px;">
      <div style='margin-bottom:3rem;'>
        <h1>CENTRAL DE ATENDIMENTO</h1>

        <p>Segunda a Sexta, das 9 às 18 horas (exceto feriados)</p>

        <ul id='contacts'>
          <a href="https://wa.me/551332261111?text={{ 'Olá, meu CPF é: ' .  Session::get('admin_cpf') . ' e minha data de nascimento é: ' . formata_data(Session::get('admin_dt_nasc')) }}" target='_blank'><li><span><i class="fab fa-whatsapp"></i>WhatsApp clique aqui</span></li></a>
          <a href="tel:01332261111"><li><span><i class="fas fa-phone-alt"></i><button class="pattern">(13) 3226.1111</button> ou clique no botão laranja</span></li></a>
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
                <i class="fas fa-cross"></i>Assistência Funeral 24h
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

        <p>ou acesse nosso site: <a href="http://www.drbeneficio.com.br/cliente/logout/#cards">www.drbeneficio.com.br</a> e saiba mais sobre todos os nossos produtos e serviços.</p>
      </div>

    </div>

    @include('FaleConosco.formulario')



</section>

@endsection
