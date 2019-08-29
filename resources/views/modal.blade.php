@extends('estrutura.master') 

@section('conteudo')

@if ( Session::get('message') != '' )
      <div id="erro">{{ Session::get('message') }}</div>
      @endif

<section id="modal">		
        <div class="container">
            @foreach($pedidos as $p)
           <div class="modal">
            <a href="{{route('modal_seleciona_pedido', $p->id_pedido)}}">
              <h3>{{$p->cd_pedido}}</h3>
              <img src="{{asset('novo')}}/imgs/modal-familiar.png" alt=""> {{-- CRIAR VERIFICAÇÃO AQUI FUTURAMENTE, PAULO VAI CRIAR A COLUNA --}}
              <button>acesse!</button>
            </a>
          </div>
          @endforeach
      </div>
</section>

@endsection