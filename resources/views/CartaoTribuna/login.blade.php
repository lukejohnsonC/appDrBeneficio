@extends('estrutura.master') @section('conteudo')
<style>

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
        <div id="etapa1">
          <label class="col1" style="margin-bottom: 5px;">
            <span>CPF</span>
            <input autocomplete='off' type="text" class="form-control cpf-mask" id='cpfcnpj' tipo="cpf" required placeholder="000.000.000-00" />
          </label>
          <label class="col1">
            <button type="button" id="alteraCPFCNPJ" style="margin-top: 0px;padding: 5px;background-color:#a7d6ea">Logar por CNPJ</button>
          </label>
          <label class="col1">
            <button type="button" id="envia">entrar</button>
          </label>
        </div>
        <div id="etapa2" style="display:none;">
          <label class="col1" style='margin-top:2rem'>
            <span>DATA DE NASCIMENTO</span>
             <input type="text" class="form-control date-mask" id="nascimento" placeholder="dd/mm/aaaa" autocomplete="off">
          </label>
          <label class="col1">
            <button type="button" id="envia">entrar</button>
          </label>
        </div>
        <div id="etapa3" style="display:none;">
          <h3></h3>
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
          </label>
        </div>
      </form>
    </div>
</section>


<footer>
  <span>Incompany 2018&reg; Todos os direitos reservados.<br> Caixa Postal 2030 | CEP 11060-002</span>
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
  $('#cpfcnpj').mask('000.000.000-00');
  $('.date-mask').mask('00/00/0000');


  $('#alteraCPFCNPJ').on('click',function(e){
    let tipo = $('#cpfcnpj').attr('tipo');
    if (tipo == "cpf") {
      let divAnterior = $('#cpfcnpj').parent();
      $('span:first', divAnterior).html("CNPJ");
      $('#cpfcnpj').attr('placeholder', '00.000.000/0000-00');
      $('#cpfcnpj').mask('00.000.000/0000-00');
      $('#cpfcnpj').attr('tipo', 'cnpj');
      $(this).html("logar por cpf");
    }

    if (tipo == "cnpj") {
      let divAnterior = $('#cpfcnpj').parent();
      $('span:first', divAnterior).html("CPF");
      $('#cpfcnpj').attr('placeholder', '000.000.000-00');
      $('#cpfcnpj').mask('000.000.000-00');
      $('#cpfcnpj').attr('tipo', 'cpf');
      $(this).html("logar por cnpj");
    }
  });

  let envia = {};

  $('#etapa1 #envia').on('click',function(e){
    loadingAbre();
    envia.cpfcnpj = $("#cpfcnpj").val();
    envia.tipo = $("#cpfcnpj").attr('tipo');

    $.ajax({
        type:"POST",
        url : "{{route('cartaotribuna.loginPOST_ETAPA1')}}",
        data : envia,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success : function(response) {

          if (response.status == "sucesso") {
            if (response.content.nascimento && envia.tipo != "cnpj") {
              $("#etapa1").fadeOut();
              $("#etapa2 span").html("Olá " + response.content.nome.split(' ')[0] + ", precisamos que você informe a sua data de nascimento");
              $("#etapa2").fadeIn();
              loadingFecha();
            } else {
              //console.log("existe na base, mas sem data de nascimento...ir para etapa3 com nome");
              $("#etapa1").fadeOut();
              $("#etapa3 h3").html("Olá " + response.content.nome.split(' ')[0] + ", não conseguimos validar o seu cadastro. Por favor, tente com e-mail e senha");
              $("#etapa3").fadeIn();
              loadingFecha();
            }


          } else if(response.status == "vazio") {
            $("#etapa1").fadeOut();
            //console.log("não existe na base, ir para etapa3 sem nome nem nada");
            //Levar para a etapa 3
            $("#etapa3 h3").html("Não conseguimos localizar o seu cadastro. Por favor, tente com e-mail e senha");
            $("#etapa3").fadeIn();
            loadingFecha();
          }
          console.log(response);

        /*  if (response.status == "sucesso") {
            alert("Proposta de venda enviada com sucesso!");
            window.location.href = "https://www.drbeneficio.com.br";
          } else {
            alert("Ocorreu um erro no disparo. Por favor, tente novamente.");
          } */
        },
        error: function(response) {
            console.log(response);
            loadingFecha();
        }
    });
  });


  $('#etapa2 #envia').on('click',function(e){
    loadingAbre();
    envia.nascimento = $("#nascimento").val();
    $.ajax({
        type:"POST",
        url : "{{route('cartaotribuna.loginPOST_ETAPA2')}}",
        data : envia,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success : function(response) {
          console.log(response);

          if (response.status == "sucesso") {
          //LOGAR, redirecionar para /cliente
          window.location.href = "{{route('cliente.index')}}";
          } else if(response.status == "vazio") {
            loadingFecha();
            //RETORNAR LOGIN INVÁLIDO, POIS CPF E DATA DE NASCIMENTO NAO BATEM
               Swal.fire({
               title: '<strong><u>Erro</u></strong>',
               type: 'error',
               html: 'A data de nascimento não é correspondente ao usuário informado. Por favor, tente novamente.',
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


  $('#etapa3 #envia').on('click',function(e){
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
