@extends('estrutura.master') @section('conteudo')
<style>
footer span {
  font-size: 14px;
}
/* LOADING */
#loadingAtribuna {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
background: rgba(255, 255, 255, 0.7);
display: flex;
align-items: center;
}
.lds-dual-ring {
  display: inline-block;
  width: 80px;
  height: 80px;
  margin: 0 auto;
}
.lds-dual-ring:after {
  content: " ";
  display: block;
  width: 64px;
  height: 64px;
  margin: 8px;
  border-radius: 50%;
  border: 6px solid {{Session::get('colors')['#primary']}};
  border-color: {{Session::get('colors')['#primary']}} transparent {{Session::get('colors')['#primary']}} transparent;
  animation: lds-dual-ring 1.2s linear infinite;
}
@keyframes lds-dual-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

/* LOADING */
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
#logo #voltar {
  display: none!important;
}

#fundo-galera {
  background-image: none!important;
}
</style>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<div id="loadingAtribuna" style="display:none;">
  <div class="lds-dual-ring"></div>
</div>


<section id="login">
    @if ( Session::get('message') != '' )
    <div id="erro">{{ Session::get('message') }}</div>
    @endif
  <div id="fundo-galera"></div>
  <div class="container posFooter">

      <h1>Clube do Assinante</h1>
      <h3>Acesse agora seus benefícios</h3>

    <div id="form">

      <form autocomplete='off' action="@isset($postLogin) {{$postLogin}} @else {{ route('postLogin') }} @endisset" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div id="etapa3">
          <label class="col1" style='margin-top:2rem'>
            <span>E-MAIL</span>
             <input type="text" class="form-control" id="email">
          </label>
          <label class="col1" style='margin-top:2rem'>
            <span>SENHA</span>
             <input type="password" class="form-control" id="senha">
          </label>
          <label class="col1">
            <button type="button" id="envia">entrar</button>
            <a href="https://www.atribuna.com.br/clube/ajuda">Não consegue acessar? clique aqui</a>
          </label>
        </div>
      </form>
    </div>
</section>


<footer>
  <span>InCompany 2018&reg; Todos os direitos reservados.<br><a href="http://incompanynet.com.br/" style='color: white;'>www.incompanynet.com.br</a></span>
</footer>


<script>
$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});


$(document).ready(function(){

  let envia = {};

  $('#etapa3 #envia').on('click',function(e) {
    loadingAbre();
    envia.email = $("#email").val();
    envia.senha = $("#senha").val();
    $.ajax({
        type:"POST",
        url : "{{route('cartaotribuna.loginPOST_ETAPA3')}}",
        data : envia,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success : function(response) {
          console.log(response);

          if (response.status == "sucesso") {
          //LOGAR, redirecionar para /cliente
          window.location.href = "{{route('cliente.index')}}";
          } else if(response.status == "vazio") {
            loadingFecha();
            //RETORNAR LOGIN INVÁLIDO, POIS EMAIL E SENHA NAO BATEM
               Swal.fire({
               title: '<strong><u>Erro</u></strong>',
               type: 'error',
               html: 'O e-mail e a senha não correspondem. Por favor, tente novamente.',
               showCloseButton: true,
               showCancelButton: false,
               focusConfirm: false,
               confirmButtonText:
                 '<i class="fa fa-thumbs-up"></i>'
               })
          }
        },
        error: function(response) {
            console.log(response);
            loadingFecha();
        }
    });
  });

  loadingAbre = function() {
    $("#loadingAtribuna").fadeIn();
  }
  loadingFecha = function() {
    $("#loadingAtribuna").fadeOut();
  }




});

  </script>

@endsection
