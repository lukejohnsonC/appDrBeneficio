@extends('estrutura.master') 

@section('conteudo')

<section id="consultas">
       <nav>
          <ul>
            <a href="{{route('svcardVerCartao')}}">
              <li>
                <article>
                  <div id=''><i class="fas fa-clinic-medical"></i></div>
                  <span>Ver Cartão</span>
                  <i class="fas fa-angle-right"></i>
                </article>
              </li>
            </a>
            <a href="{{route('svcardConsultaSaldo')}}">
              <li>
                <article>
                  <div id=''><i class="fas fa-notes-medical"></i></div>
                  <span>Consulta Saldo</span>
                  <i class="fas fa-angle-right"></i>
                </article>
              </li>
            </a>
          </ul>
        </nav>
      </section>

@endsection