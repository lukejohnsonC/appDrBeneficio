@extends('estrutura.master')

@section('conteudo')


<section id="cartao_farmacia">
        <nav>
          <ul>
            <a href="{{route('cartaotribuna.redeSaudeDrBeneficio_consulta')}}">
              <li>
                <article>
                  <div id=''><i class="fas fa-id-card"></i></div>
                  <span>CONSULTAS E EXAMES</span>
                  <i class="fas fa-angle-right"></i>
                </article>
              </li>
            </a>
            <a href="{{route('cartaotribuna.redeSaudeDrBeneficio_raiaDrogasil')}}">
              <li>
                <article>
                  <div id=''><i class="fas fa-clinic-medical"></i></div>
                  <span>RAIA/DROGASIL</span>
                  <i class="fas fa-angle-right"></i>
                </article>
              </li>
            </a>
            <a href="{{route('cartaotribuna.redeSaudeDrBeneficio_aopharmaceutico')}}">
              <li>
                <article>
                  <div id=''><i class="fas fa-clinic-medical"></i></div>
                  <span>AO PHARMACEUTICO</span>
                  <i class="fas fa-angle-right"></i>
                </article>
              </li>
            </a>
          </ul>
        </nav>
    </section>

@endsection
