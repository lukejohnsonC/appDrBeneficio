@extends('estrutura.master') @section('conteudo')

<style>
#button-menu {
display: none!important;  
}
</style>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
$(document).ready(function(){
  $('.cpf-mask').mask('000.000.000-00');
  $('.date-mask').mask('00/00/0000');


// Para alertas
//   Swal.fire({
//   title: '<strong><u>Dr. Benefício informa:</u></strong>',
//   type: 'info',
//   html:
//     'Por instabilidade no sistema de atendimento via WhatsApp, pedimos que os contatos sejam feitos por e-mail: atendimento@drbeneficio.com.br ou via telefone pelo número (13) 3226-1111.',
//   showCloseButton: true,
//   showCancelButton: false,
//   focusConfirm: false,
//   confirmButtonText:
//     '<i class="fa fa-thumbs-up"></i>',
// })

// setTimeout(function(){ Swal.close() }, 15000);

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
          <a href="https://www.drbeneficio.com.br/sis/area/credenciado">Validador de CPF</a>
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

<footer>
  <span>Dr. Benefício 2018&reg; Todos os direitos reservados.<br> Caixa Postal 2030 | CEP 11060-002</span>
</footer>

@endsection