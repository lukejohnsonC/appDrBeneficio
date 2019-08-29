@extends('estrutura.master') 

@section('conteudo')

<section id='turnOff' style='display: inline-block;'>
        <nav>
          <ul>
            <a href="{{route('logout')}}">
              <li>
                <article>
                  <div id=''><i class="fas fa-sign-out-alt" style="transform:rotate(180deg)"></i></div>
                  <span>Sair</span>
                </article>
              </li>
            </a>

            @if(Session::get('admin_qtd_pedido') > 1)
            <a href="{{route('cliente_modal')}}">
              <li>
                <article>
                  <div id=''><i class="fas fa-undo-alt"></i></div>
                  <span>acessar seus outros planos</span>
                </article>
              </li>
            </a>
            @endif
          </ul>
        </nav>
        </section>

@endsection