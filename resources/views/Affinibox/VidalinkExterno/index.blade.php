@extends('estrutura.master') @section('conteudo')

<style>
#button-menu {
display: none!important;  
}

#erro {
    background: #1A973F;
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

      <h1>Solicitar cartão Vidalink</h1>

    <div id="form">

      <form autocomplete='off' action="{{ route('vidalinkExternoPost') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <label class="col1">
            <span>NOME</span>
            <input autocomplete='off' type="text" class="form-control" name='nome' required />
          </label>
        <label class="col1">
          <span>CPF</span>
          <input autocomplete='off' type="text" class="form-control cpf-mask" name='cpf' required placeholder="000.000.000-00" />
        </label>
        <label class="col1" style='margin-top:2rem'>
          <span>DATA DE NASCIMENTO</span>
           <input type="text" class="form-control date-mask" name="nascimento" placeholder="dd/mm/aaaa" autocomplete="off">
        </label>
        <label class="col1">
          <button type="submit">entrar</button>
        </label>
      </form>
    </div>
</section>

<footer>
  <span>Dr. Benefício 2018&reg; Todos os direitos reservados.<br> Caixa Postal 2030 | CEP 11060-002</span>
</footer>

@endsection