@extends('estrutura.master')

@section('conteudo')


<section id="cartao_farmacia">
        <nav>
          <ul>
            <a href="{{route('cartaotribuna.redeSaudeDrBeneficio_consulta_comousar')}}">
              <li>
                <article>
                  <div id=''><i class="fas fa-id-card"></i></div>
                  <span>COMO USAR</span>
                  <i class="fas fa-angle-right"></i>
                </article>
              </li>
            </a>
            <a href="{{route('redeCredenciadas')}}">
              <li>
                <article>
                  <div id=''><i class="fas fa-clinic-medical"></i></div>
                  <span>REDE MÉDICA</span>
                  <i class="fas fa-angle-right"></i>
                </article>
              </li>
            </a>
            <a href="{{route('odontoRedeCredenciada')}}">
              <li>
                <article>
                  <div id=''><i class="fas fa-clinic-medical"></i></div>
                  <span>REDE ODONTO</span>
                  <i class="fas fa-angle-right"></i>
                </article>
              </li>
            </a>
          </ul>
        </nav>
    </section>

@endsection
