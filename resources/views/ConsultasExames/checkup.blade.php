@extends('estrutura.master') 

@section('conteudo')
<section id="checkup" style='display:inline-block;'>
        <nav>
          <ul>
            <a href="{{route('checkupComoFunciona')}}" onclick="moveDiv()">
              <li>
                <article>
                  <div id=""><i class="fas fa-question"></i></div>
                  <span>Como funciona?</span>
                  <i class="fas fa-angle-right"></i>
                </article>
              </li>
            </a>
            <a href="{{route('checkupVale')}}" onclick="moveDiv()">
              <li>
                <article>
                  <div id=""><i class="fas fa-calendar-check"></i></div>
                  <span>vale check-up</span>
                  <i class="fas fa-angle-right"></i>
                </article>
              </li>
            </a>
          </ul>
        </nav>
      </section>

@endsection