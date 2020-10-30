@extends('estrutura.master') 

@section('conteudo')

<section id="consultas">
        <!-- <div class="container">
          <div class="option">
            <a href="rede_credenciada.php">
              <div><img src="../imgs/card_ben.png"></div>
              <span>rede credenciada</span>
            </a>
          </div>
          <div class="option">
            <a href="cartao_virtual.php">
              <div><img src="../imgs/farmacia_cred.png"></div>
              <span>agendar consulta ou exame</span>
            </a>
          </div>
          <div class="option">
            <a href="checkup.php">
              <div><img src="../imgs/card_ben.png"></div>
              <span>check-up</span>
            </a>
          </div>
        </div> -->
  
        <nav>
          <ul>
            <a href="{{route('redeCredenciadas')}}">
              <li>
                <article>
                  <div id=''><i class="fas fa-clinic-medical"></i></div>
                  <span>rede credenciada</span>
                  <i class="fas fa-angle-right"></i>
                </article>
              </li>
            </a>
            <a href="{{route('redeCredenciadasAgendar')}}">
              <li>
                <article>
                  <div id=''><i class="fas fa-notes-medical"></i></div>
                  <span>agendar consulta ou exame</span>
                  <i class="fas fa-angle-right"></i>
                </article>
              </li>
            </a>
            
            <a href="{{route('cartaovirtual.camps1')}}">
              <li>
                <article>
                  <div id=''><i class="fas fa-notes-medical"></i></div>
                  <span>cartão</span>
                  <i class="fas fa-angle-right"></i>
                </article>
              </li>
            </a>
            
            
             <a href="{{route('odontoRedeCredenciada')}}">
              <li>
                <article>
                  <div id=''><i class="fas fa-notes-medical"></i></div>
                  <span>Odonto</span>
                  <i class="fas fa-angle-right"></i>
                </article>
              </li>
            </a>
           
            
            
            
            
          </ul>
        </nav>
      </section>

@endsection