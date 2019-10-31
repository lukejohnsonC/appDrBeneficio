<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-102434353-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-102434353-1');
    </script>

    <title>SIDESC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{asset('novo')}}/styles/main.css" rel="stylesheet">
    <link href="{{asset('novo')}}/styles/content.css" rel="stylesheet">
    <link href="{{asset('novo')}}/styles/mediaQuery.css" rel="stylesheet">
    <link href="{{asset('novo')}}/styles/edit.css" rel="stylesheet">
    <link href="{{asset('novo')}}/fonts/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('novo')}}/imgs/favicon.png" />
    <link href="{{asset('novo')}}/fonts/fontawesome-free-5.9.0-web/css/fontawesome.css" rel="stylesheet">
    <link href="{{asset('novo')}}/fonts/fontawesome-free-5.9.0-web/css/brands.css" rel="stylesheet">
    <link href="{{asset('novo')}}/fonts/fontawesome-free-5.9.0-web/css/solid.css" rel="stylesheet">
    <link href="{{asset('novo')}}/fonts/fontawesome-free-5.9.0-web/css/regular.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


    <link href="{{asset('plugins')}}/Notiflix-1.8.0/notiflix-1.8.0.min.css" rel="stylesheet">

   <script src="{{asset('novo')}}/styles/jQuery.js"></script>
   <script src="{{asset('novo')}}/styles/moveSide.js"></script>
   <script src="{{asset('plugins')}}/Notiflix-1.8.0/notiflix-1.8.0.min.js"></script>
   <script src="{{asset('plugins')}}/jQueryMask/jquery.mask.js"></script>

   <script src="{{asset('')}}custom.js"></script>

   <style>
    #button-menu {
    display: none!important;  
    }

    #top-bar div {
    width: 100%;
    height: 100%;
    float: left;
    display: block;
}

#login div label button {
    background:#009CDE;
color: #FFF;
    font-size: 17px;
    display: block;
    text-transform: lowercase;
    text-align: center;
    width: 100%;
    border: 0;
    border-radius: 20px;
    margin: 2rem auto 0 auto;
}

footer {
    background: 
    #009CDE;
    padding: 1rem 0;
}
    
    #erro {
        background: #1A973F;
    }
    
    </style>
  </head>
  <body>
  	<section id="top-bar">
  		<div class="dark-blue"></div>
  	</section>

    <!-- LOGO -->

    <section id="brand">
      <div id="logo" class="container">
        <a href="{{url('')}}">
          <img src="{{asset('novo')}}/imgs/logo-sidesc.png" alt='Logo Dr. Benefício' style='margin-right: 20px;'>
         @if(Session::get('admin_logo')) <img src="{{asset('novo')}}/imgs/{{Session::get('admin_logo')}}" alt='Logo da empresa'> @endif
        </a>

    @if(isset($paginaAtual) && $paginaAtual == "cliente")    
        @if(isset($liberaBotoesTopo))
          @if($liberaBotoesTopo == 1)
            <a href="{{route('turnoff')}}" id='turnoff'><i class="fas fa-power-off"></i></a>

            <a id='button-menu' class="dNone" onClick='mostraMenu()' style="cursor:pointer;">
              <i class="fas fa-undo-alt"></i>
            </a>
          @endif
        @endif
    @else
    <a id='button-menu' href="javascript:history.back()" style="cursor:pointer;">
        <i class="fas fa-undo-alt"></i>
    </a>
    @endif
      </div>

    </section>

    <!-- END LOGO -->
    

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
        
        <div class="container posFooter">
      
            <h1>Solicitar cartão Vidalink</h1>
      
          <div id="form">
      
            <form autocomplete='off' action="{{ route('vidalinkExternoPost') }}" method="post">
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
              </label>
            </form>
          </div>
      </section>
      
      <footer>
        <span> 2019 © SIDESC - Saúde para todos </span>
      </footer>
    
  </body>
</html>