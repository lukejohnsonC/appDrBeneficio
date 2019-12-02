@extends('estrutura.master') 

@section('conteudo')
<section id="central">		
    <div id="fundo-galera"></div>
    <div class="container">
      <div style='margin-bottom:3rem;'>
        <h1>CENTRAL DE ATENDIMENTO</h1>

        <p>Segunda a Sexta, das 9 às 18 horas (exceto feriados)</p>

        <ul id='contacts'>
          <a href="https://wa.me/5513997748080?text={{ 'Olá, meu CPF é: ' .  Session::get('admin_cpf') . ' e minha data de nascimento é: ' . formata_data(Session::get('admin_dt_nasc')) }}" target='_blank'><li><span><i class="fab fa-whatsapp"></i>WhatsApp clique aqui</span></li></a> 
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
      <div style='margin-top: 4rem;'>
        <h1>Relate um Erro</h1>
      </div>

      <p>Estamos sempre buscando o melhor para nossos clientes. Se houver algum erro ou falha em nosso portal que você tenha identificado, por favor nos avise para que possamos corrigir e tornar sua experiência na utilização de nossos serviços cada vez melhor!</p>

      <form action="" method='POST'>
        <label class="col1">
          <span>Tipo de erro:</span>
          <select value="">
            <option name="" id="">Erro</option>
            <option name="" id="">Bug</option>
            <option name="" id="">Sugestão</option>
            <option name="" id="">Lentidão</option>
          </select>
        </label>
        <label for="" class="col1">
          <span>Mensagem:</span>
          <textarea name="" placeholder="Sugerimos que nos informe também em qual página você encontrou o erro. Agradecemos de ♥" rows="10"></textarea>
        </label>
        <label for="" class='col1'>
          <input type="file">
        </label>
        <label class='col1'><button>ENVIAR</button></label>
      </form>

    </div>
    </div>

    
</section>

@endsection