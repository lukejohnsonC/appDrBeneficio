@extends('estrutura.master') 

@section('conteudo')
<section id="odonto">
        <nav>
          <ul>
            <a href="{{route('odontoRedeCredenciada')}}">
              <li>
                <article>
                  <div id=''><i class="fas fa-clinic-medical"></i></div>
                  <span>rede credenciada</span>
                  <i class="fas fa-angle-right"></i>
                </article>
              </li>
            </a>
            <a href="{{route('odontoAgendar')}}">
              <li>
                <article>
                  <div id=''><i class="fas fa-notes-medical"></i></div>
                  <span>agendar consulta ou exame</span>
                  <i class="fas fa-angle-right"></i>
                </article>
              </li>
            </a>
          </ul>
        </nav>
</section>
@endsection