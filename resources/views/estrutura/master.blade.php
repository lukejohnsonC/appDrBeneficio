<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Dr. Benefício</title>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


    <link href="{{asset('plugins')}}/Notiflix-1.8.0/notiflix-1.8.0.min.css" rel="stylesheet">

    <script type="text/javascript" src="{{asset('novo')}}/styles/jQuery.js"></script>
   <script type="text/javascript" src="{{asset('novo')}}/styles/moveSide.js"></script>
   <script type="text/javascript" src="{{asset('plugins')}}/Notiflix-1.8.0/notiflix-1.8.0.min.js"></script>

   <script type="text/javascript" src="{{asset('')}}custom.js"></script>
  </head>
  <body>
      <a href="https://wa.me/5513997748080?text=Olá,%20meu%20nome%20é%20{{ Session::get('admin_name') != null ? Session::get('admin_name') : '(favor,%20coloque%20seu%20nome%20completo%20aqui)' }}" style="position:fixed;width:60px;height:60px;bottom:40px;right:40px;background-color:#25d366;color:#FFF;border-radius:50px;text-align:center;font-size:30px;box-shadow: 1px 1px 2px #888;z-index:1000;" target="_blank" id='bt-wpps'><i style="line-height:60px" class="fa fa-whatsapp"></i></a>
  	<section id="top-bar">
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
          <img src="{{asset('novo')}}/imgs/logo-bene.png" alt='Logo Dr. Benefício' style='margin-right: 20px;'>
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
    <a id='button-menu' href="{{url('')}}" style="cursor:pointer;">
        <i class="fas fa-undo-alt"></i>
    </a>
    @endif
      </div>

    </section>

    <!-- END LOGO -->
    

    @yield('conteudo')
    
  </body>
</html>