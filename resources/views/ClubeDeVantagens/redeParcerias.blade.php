@extends('estrutura.master')
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

html, body {
  overflow:hidden!important;
}

#top-bar, #brand {
  display: none!important;
}

iframe {
  position: relative;
  /*height: calc(100% - 135px);*/
  height: 100%;
  width: 100%;
}

</style>


@section('conteudo')
<div id="loadingAtribuna" style="display:none;">
  <div class="lds-dual-ring"></div>
</div>


    <iframe src="{{$url}}" onload="onMyFrameLoad(this)"></iframe>

    <a id='voltarRedeParcerias' href="{{route('cliente.index')}}">
      <i class="fas fa-undo-alt"></i> Voltar
    </a>

  <script>
  $(document).ready(function() {
      loadingAbre();
  });

  function onMyFrameLoad() {
    loadingFecha();
  };

  function loadingAbre() {
    $("#loadingAtribuna").fadeIn();
  }

  function loadingFecha() {
    $("#loadingAtribuna").fadeOut();
  }
  </script>
@endsection
