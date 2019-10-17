@extends('estrutura.master') 

@section('conteudo')

<section id="vantagens">
    <div class="container">
        @foreach($vantagens as $v)
       <div class="option">
          @switch($v->TIPO)
              @case("SIMPLES")
              <a href="{{route('clubedevantagensResgatar', $v->ID_VANTAGEM)}}">
              @break
          
              @case("MODULO")
              <a href="{{route($v->TIPO_CONTEUDO)}}">
              @break
          
              @default
              <a href="{{route('clubedevantagensResgatar', $v->ID_VANTAGEM)}}">
          @endswitch        
          <img src="{{$v->EMPRESA_LOGO}}">
          @if($v->PORCENTAGEM)
          <div><span class='percente'>{{$v->PORCENTAGEM}}%</span></div>
          @endif
          <h3>{{$v->EMPRESA_NOME}}</h3>
            <span class='subTitle'>@foreach($v->categorias as $c) {{$c->NOME}} @endforeach</span>            
          <span class="texto">{{$v->NOME}}</span>
          <button>acesse!</button>
        </a>
      </div> 
      @endforeach 

      {{--
      <div id='verMais'>
        <button class='pattern'>Ver mais benefício</button>
      </div>
      --}}

    </div>  
    <div class="clear"></div>


  </section>

@endsection