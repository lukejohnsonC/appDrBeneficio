@extends('estrutura.master') 

@section('conteudo')
<section id="disk_saude">
        <nav>
          <ul>
            <a href="{{route('orientacaoMedica')}}">
              <li>
                <article>
                  <div id=""><i class="fas fa-user-md"></i></div>
                  <span>Orientação medica</span>
                  <i class="fas fa-angle-right"></i>
                </article>
              </li>
            </a>
          </ul>
        </nav>
</section>
@endsection