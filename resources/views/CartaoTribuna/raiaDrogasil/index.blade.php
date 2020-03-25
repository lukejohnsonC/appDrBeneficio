@extends('estrutura.master')

@section('conteudo')


<section id="cartao_farmacia">
        <nav>
          <ul>
            <a href="{{route('cartaotribuna.redeSaudeDrBeneficio_raiaDrogasil_comousar')}}">
              <li>
                <article>
                  <div id=''><i class="fas fa-id-card"></i></div>
                  <span>COMO USAR</span>
                  <i class="fas fa-angle-right"></i>
                </article>
              </li>
            </a>
            <a href="{{route('farmaciasCredenciadas')}}">
              <li>
                <article>
                  <div id=''><i class="fas fa-clinic-medical"></i></div>
                  <span>ENDEREÇOS</span>
                  <i class="fas fa-angle-right"></i>
                </article>
              </li>
            </a>
          </ul>
        </nav>
    </section>

@endsection
