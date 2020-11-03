@extends('estrutura.master') @section('conteudo')

<style>
#button-menu {
display: none!important;  }
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


@isset($wlLogin['LOGINW_ESCONDE_FUNDO'])
  #fundo-galera {
    display: none!important
  }
@endisset

</style>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
 <script>
   function onSubmit(token) {
     document.getElementById("formulario").submit();
   }
 </script>
<script>
$(document).ready(function(){
  $('.cpf-mask').mask('000.000.000-00');
  $('.date-mask').mask('00/00/0000');

@if(empty($whitelabel))
// Para alertas
/*  Swal.fire({
  title: '<strong><u>Dr. Benefício informa</u></strong>',
  type: 'info',
  html:
    '<p>CARO CLIENTE, ESTAMOS COM UM PROBLEMA TÉCNICO NO ATENDIMENTO PELO CANAL DO WHATSAPP. POR FAVOR ENTRAR EM CONTATO ATRAVÉS DO TELEFONE <a href="tel:01333261111">(13) 3226-1111</a>. OBRIGADO.</p>',
  showCloseButton: true,
  showCancelButton: false,
  focusConfirm: false,
  confirmButtonText:
    '<i class="fa fa-thumbs-up"></i>'
  })

setTimeout(function(){ Swal.close() }, 15000); */
@endif
});

</script>

<section id="login">
    @if ( Session::get('message') != '' )
    <div id="erro">{{ Session::get('message') }}</div>
    @endif
  <div id="fundo-galera"></div>
  <div class="container posFooter">

      <h1>
        @isset($wlLogin['LOGINW_TITULO1'])
          {{$wlLogin['LOGINW_TITULO1']}}
        @else
          Área do Cliente
        @endisset
      </h1>
      <h3>
        @isset($wlLogin['LOGINW_TITULO2'])
          {{$wlLogin['LOGINW_TITULO2']}}
        @else
          Acesse agora seus benefícios
        @endisset
      </h3>

    <div id="form">

      <form id="formulario" autocomplete='off' action="@isset($postLogin) {{$postLogin}} @else {{ route('postLogin') }} @endisset" method="post">
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
          <button class="g-recaptcha" 
        data-sitekey="6LcyhN4ZAAAAAIjEFHkyfi9C94OjYUu38za2lTPb" 
        data-callback='onSubmit' 
        data-action='submit'>entrar</button>
          @if(isset($wlLogin['LOGINW_BOTAO_NAO_CONSEGUE_HABILITA']) && $wlLogin['LOGINW_BOTAO_NAO_CONSEGUE_HABILITA'] == 1)
          <a href="
          @if(isset($wlLogin['LOGINW_BOTAO_NAO_CONSEGUE_LINK']))
            {{$wlLogin['LOGINW_BOTAO_NAO_CONSEGUE_LINK']}}
          @else
            {{route('centralAjuda')}}
          @endif
          ">
          @if(isset($wlLogin['LOGINW_BOTAO_NAO_CONSEGUE_TEXTO']))
            {{$wlLogin['LOGINW_BOTAO_NAO_CONSEGUE_TEXTO']}}
          @else
            Não consegue acessar? clique aqui
          @endif
          </a>
          @endif
          @if(empty($whitelabel))
          <a href="https://www.drbeneficio.com.br/sis/area/credenciado">Validador de CPF</a>
          @endif
        </label>
      </form>
    </div>

    @if(Session::get('loginBloqueiaCards') == null || Session::get('loginBloqueiaCards')  != 1)
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
      @endif
</section>

@if(empty($whitelabel))
<footer>
  <span>Dr. Benefício {{now()->year}}&reg; Todos os direitos reservados.<br> Caixa Postal 2030 | CEP 11060-002</span>
</footer>
@endif

@endsection
