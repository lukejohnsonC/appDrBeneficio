@extends('estrutura.master') @section('conteudo')

<style>
#button-menu {
display: none!important;
}
.swal2-header {
  display: none !important;
}
.swal2-popup {
  width: 650px;
}
.swal2-popup img {
  width: 610px;
  border-radius: 5px;
}

#voltar {
  display:none!important;
}

  #fundo-galera {
    display: none!important
  }

</style>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>
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
        </label>
        <label class="col1" style='margin-top:2rem'>
          <span>DATA DE NASCIMENTO</span>
           <input type="text" class="form-control date-mask" name="nascimento" placeholder="dd/mm/aaaa" autocomplete="off">
        </label>
        <label class="col1">
          <button type="submit">entrar</button>
          <a href="{{route('centralAjuda')}}">Não consegue acessar? clique aqui</a>
          <a href="https://www.drbeneficio.com.br/sis/area/credenciado">Validador de CPF</a>
        </label>
      </form>
    </div>

    
    <div id="division">
      <span>ou</span>
    </div>

    <div id='cards'>
        <h1>Não é nosso cliente?</h1>
        <h3>Conheça nossos produtos!</h3>
        <a href="../site/drbeneficio-familiar.html">
          <img src="{{asset('novo')}}/imgs/familiar.png">
        </a>
        <a href="../site/drbeneficio-pme.html">
          <img src="{{asset('novo')}}/imgs/pme.png">
        </a>
        <a href="../site/drbeneficio-empresarial.html">
          <img src="{{asset('novo')}}/imgs/empresarial.png">
        </a>
      </div>
</section>

<footer>
  <span>Dr. Benefício {{now()->year}}&reg; Todos os direitos reservados.<br> Caixa Postal 2030 | CEP 11060-002</span>
</footer>

@endsection
