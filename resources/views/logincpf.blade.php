@extends('estrutura.master') @section('conteudo')

<style>
#button-menu {
display: none!important;  
}
</style>

<script>
$(document).ready(function(){
  $('.cpf-mask').mask('000.000.000-00');
  $('.date-mask').mask('00/00/0000');  
});
</script>

<section id="login">
    @if ( Session::get('message') != '' )
    <div id="erro">{{ Session::get('message') }}</div>
    @endif
  <div id="fundo-galera"></div>
  <div class="container posFooter">

      <h1>Área do Cliente</h1>
      <h3>Acesse agora seus benefícios</h3>

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
          <a href="{{route('centralAjuda')}}">Não consegue acessar? clique aqui</a>
        </label>
      </form>
    </div>


    <!-- <div id="division">
      <span>ou</span>
    </div> 

    <div id='cards'>
        <h1>Não é nosso cliente?</h1>
        <h3>Conheça nossos produtos!</h3>
        <a href="../site/drbeneficio-familiar.html">
          <div class='plano familiar'>
            <span>
              <b>Plano Familiar</b>
              <span class='card-text' style="margin-top: 1.5rem">Rede de Saúde e Proteção para toda família</span>
            </span>
            <button>acesse</button>
          </div>
          <img src="{{asset('novo')}}/imgs/familiar.png">
        </a>
        <a href="../site/drbeneficio-pme.html">
          <div class='plano pme'>
            <span>
              <b>Plano PME</b>
              <span class='card-text' style="margin-top: 1.5rem">Pequenas e médias empresas</span>
            </span>
            <button>acesse</button>
          </div>
          <img src="{{asset('novo')}}/imgs/pme.png">
        </a>
        <a href="../site/drbeneficio-empresarial.html">
          <div class='plano empresarial'>
            <span>
              <b>Plano Empresarial</b>
              <span class='card-text' style="margin-top: 1.1rem">Empresas, associações, sindicatos e entidades de classe</span>
            </span>
            <button>acesse</button>
          </div>
          <img src="{{asset('novo')}}/imgs/empresarial.png">
        </a>
      </div>
</section>

<section id='rede_sociais'>
		<div class='rede'>
			<a href=""><span>Facebook</span></a>
		</div>
		<div class='rede'>
			<a href=""><span></span></a>
		</div>-->

	</section>

<footer>
  <span>Dr. Benefício 2018&reg; Todos os direitos reservados.<br> Caixa Postal 2030 | CEP 11060-002</span>
</footer>

@endsection