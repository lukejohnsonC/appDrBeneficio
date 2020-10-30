@extends('estrutura.master') 

@section('conteudo')
<style>
  #modal .modal {
    border: none!important;
    box-shadow: none!important;
  }

  .modal img {
    width: 90%;
  }

  #bt-wpps {
    display: none!important;
  }
</style>

@if ( Session::get('message') != '' )
      <div id="erro">{{ Session::get('message') }}</div>
      @endif

<section id="modal">		
        <div class="container">
          <h3 style="text-align:center;">Qual cartão você deseja acessar?</h3>
            @foreach($pedidos as $p)
           <div class="modal">
            <a href="{{route('modal_seleciona_pedido', $p->id_pedido)}}">
              <h3>{{$p->cd_pedido}}</h3>
              <img src="{{asset('novo')}}/imgs/{{$p->capa_modal}}" alt="">
              <button>acesse!</button>
            </a>
          </div>
          @endforeach
      </div>
</section>

@endsection