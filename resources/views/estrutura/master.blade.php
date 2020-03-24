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


    @if(Session::get('admin_ID_GOOGLE_ANALYTICS'))
    <!-- GOOGLE ANALYTICS CLIENTE -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{Session::get('admin_ID_GOOGLE_ANALYTICS')}}"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', '{{Session::get("admin_ID_GOOGLE_ANALYTICS")}}');
    </script>
    @endif

    <?php
    $primary = "#F36F21";
    ?>

    @if(Session::get('admin_TITLE'))
    <title>{{Session::get('admin_TITLE')}}</title>
    @else
    <title>Dr. Benefício</title>
    @endif
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

<?php /*
    <style>
    {!!colors()!!}
    </style>
    */ ?>

    <link href="{{route('cssMain')}}" type='text/css' rel="stylesheet">
    <link href="{{route('cssContent')}}" rel="stylesheet">
    <link href="{{asset('novo')}}/styles/mediaQuery.css" rel="stylesheet">
    <link href="{{route('cssEdit')}}" rel="stylesheet">

    <link href="{{asset('novo')}}/fonts/style.css" rel="stylesheet">

    @if(Session::get('admin_FAVICON'))
    <link rel="shortcut icon" href="{{asset('novo')}}/imgs/{{Session::get('admin_FAVICON')}}" />
    @else
    <link rel="shortcut icon" href="{{asset('novo')}}/imgs/favicon.png" />
    @endif
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
  </head>
  <body>
    @if((Session::get('admin_DESABILITA_WHATSAPP') != 1) || (isset($forceEnableWhats) && $forceEnableWhats == true))
    <a href="https://wa.me/5513997748080?text={{ Session::get('admin_cpf') != null ? 'Olá, meu CPF é: ' .  Session::get('admin_cpf') . ' e minha data de nascimento é: ' . formata_data(Session::get('admin_dt_nasc')) : '(favor,%20coloque%20seu%20nome%20completo%20aqui)' }}" style="position:fixed;width:60px;height:60px;bottom:40px;right:40px;background-color:#25d366;color:#FFF;border-radius:50px;text-align:center;font-size:30px;box-shadow: 1px 1px 2px #888;z-index:1000;" target="_blank" id='bt-wpps'><i style="line-height:60px" class="fa fa-whatsapp"></i></a>
    @endif
  	<section id="top-bar" @if(!Session::get('barra_superior')) class="barra_superior_personalizada" @endif>
  		<div class="dark-blue"></div>
  		<div class="light-blue"></div>
  		<div class="blue"></div>
  		<div class="green"></div>
  		<div class="orange"></div>
  	</section>

    <!-- LOGO -->

    <section id="brand">
      <div id="logo" class="container">
        <a href="{{url('')}}">
         @if(Session::get('admin_logo') == null) <img class="logo_drben" src="{{asset('novo')}}/imgs/logo-bene.png" alt='Logo Dr. Benefício' style='margin-right: 20px;'> @endif
         @if(Session::get('admin_logo')) <img class="logo_empresa" src="{{asset('novo')}}/imgs/{{Session::get('admin_logo')}}" alt='Logo da empresa'> @endif
        </a>

        @if(Session::get('admin_gestor_id') && Route::current()->getName() == "cliente.index")
        <a href="{{route('gestor.auth.login')}}" class="botao_area_do_gestor"><i class="fas fa-chalkboard-teacher tNone"></i> Área do gestor</a>
        @endif

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
        @if(Session::get('admin_BOTAO_VOLTAR') != null)
        {{Session::get('admin_BOTAO_VOLTAR')}}
        @else
        <i class="fas fa-undo-alt"></i>
        @endif
    </a>
    @endif
      </div>

    </section>

    <!-- END LOGO -->


    @yield('conteudo')

  </body>
</html>
