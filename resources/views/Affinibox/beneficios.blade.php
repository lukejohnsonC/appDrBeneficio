@extends('estrutura.master') 

@section('conteudo')

<section id="vantagens" class="">
    <div class="container">
        @foreach($beneficios as $v)
       <div class="option">
          <a href="{{route('clubedevantagensResgatar')}}"></a>
          <img src="{{$v->imageUrl}}">
        {{--  @if($v->PORCENTAGEM)
          <div><span class='percente'>{{$v->PORCENTAGEM}}%</span></div>
          @endif --}}
          <h3>{{$v->vendor->name}}</h3>
            {{--<span class='subTitle'>@foreach($v->categorias as $c) {{$c->NOME}} @endforeach</span>            --}}
          <span class="texto">{{$v->title}}</span>
          <button>ative!</button>
        </a>
      </div> 
      @endforeach      
    </div>  
    <div class="clear"></div>
  </section>

@endsection