@extends('estrutura.master') 

@section('conteudo')


<section id="cartao_farmacia">
        <nav>
          <ul>
            <a href="{{route('verCartaoFarmacia')}}">
              <li>
                <article>
                  <div id=''><i class="fas fa-id-card"></i></div>
                  <span>ver cartão farmácia</span>
                  <i class="fas fa-angle-right"></i>
                </article>
              </li>
            </a>
            <a href="{{route('farmaciasCredenciadas')}}">
              <li>
                <article>
                  <div id=''><i class="fas fa-clinic-medical"></i></div>
                  <span>farmácias credenciadas</span>
                  <i class="fas fa-angle-right"></i>
                </article>
              </li>
            </a>
          </ul>
        </nav>
    </section>

@endsection