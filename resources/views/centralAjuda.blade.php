@extends('estrutura.master') @section('conteudo')
<script>
  $(document).ready(function(){
    $('.cpf-mask').mask('000.000.000-00');
    $('.date-mask').mask('00/00/0000');  
  });
  </script>
<section id="central">		
		<div id="fundo-galera"></div>
		<div class="container">
			<h1>Central de ajuda</h1>

			<span style='margin-bottom:2rem;'>Siga algumas de nossas dicas:</span>

			<ol>
				<li><p>Digite atenciosamente e calmamente seu CPF, verifique se estão todos os números corretos</p></li>
				<li><p>Atente-se ao colocar sua Data de Nascimento, certifique-se de que está certo antes de clicar em 'entrar'</p></li>
			</ol>
            
            
    <div id="form">

      <form autocomplete='off' action="{{ route('postLogin') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <label class="col1">
          <span>CPF</span>
          <input autocomplete='off' type="text" class="form-control cpf-mask" name='cpf' required placeholder="000.000.000-00" />

          {{-- <input type="text" class="form-control cpf-mask" maxlength="11" placeholder="000.000.000-00"> --}}


        </label>
        <label class="col1" style='margin-top:2rem'>
          <span>DATA DE NASCIMENTO</span>
          {{--<input autocomplete='off' type="date" class="form-control" name='nascimento' required size="8" placeholder="DD / MM / AAAA"/>--}}

           <input type="text" class="form-control date-mask" name="nascimento" placeholder="dd/mm/aaaa" autocomplete="off">


        </label>
        <label class="col1">
          <button type="submit">entrar</button>
        </label>
      </form>
    </div>

      <p>Caso tenha realizado os procedimentos à cima e ainda ficou com alguma dúvida, você pode entrar em contato conosco pelos meios de comunicação:</p>

			<ul style='margin-left:0;'>
        <a href="https://wa.me/5513997748080?text=Olá,%20meu%20nome%20é%20(favor,%20coloque%20seu%20nome%20completo%20aqui)%20estou%20entrando%20em%20contato%20pelo%20app%20Dr.%20Beneficio!" target='_blank'><li><span><i class="fab fa-whatsapp"></i>What's App</span></li></a>
        <a href="tel:551332261111"><li><span><i class="fas fa-phone-alt"></i>Telefone</span></li></a>
        <a href="mailto:suporte@drbeneficio.com.br" target='_blank'><li><span><i class="fas fa-envelope-square"></i>E-mail</span></li></a>
				<a href="javascript:history.back()"><li><span><i class="fas fa-undo-alt"></i>Voltar</span></li></a>
			</ul>
		</div>
	</section>

@endsection