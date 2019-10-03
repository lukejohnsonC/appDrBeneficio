@extends('estrutura.master') 

@section('conteudo')
<section id="cartao_farmacia" class="">
    <nav>
      <ul>
        <a href="{{route('medicamentoManipuladoWhats')}}" onClick="moveDiv()">
          <li>
            <article>
              <div><i class="fab fa-whatsapp"></i></div>
              <span>compre via what's app</span>
              <i class="fas fa-angle-right"></i>
            </article>
          </li>
        </a>
        <a href="{{route('medicamentoManipuladoTel')}}" onClick="moveDiv()">
          <li>
            <article>
              <div><i class="fas fa-phone-alt"></i></div>
              <span>compre por telefone</span>
              <i class="fas fa-angle-right"></i>
            </article>
          </li>
        </a>
      </ul>
    </nav>
</section>
@endsection