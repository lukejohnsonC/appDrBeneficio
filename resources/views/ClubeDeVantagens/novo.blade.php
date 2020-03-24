@extends('estrutura.master')

@section('conteudo')

<section id="vantagens">
    <div class="container">

      <form method="post" action="{{route('clubedevantagensBusca')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="form-group">
          <input type="text" name="busca" class="form-control pesquisa" value="@isset($busca) {{$busca}} @endisset"/>
        </div>
        <div class="form-group">
          <input type="submit" value="Buscar" class='busca'/>
          @isset($busca)
          <a href="{{route('clubedevantagens.index')}}" class='mostrar'>Mostrar todos</a>
          @endisset
        </div>
      </form>

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
