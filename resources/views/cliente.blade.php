@extends('estrutura.master') 

@section('conteudo')

<style>
    #menu, #allSections section {
        position: relative;
    }

    #allSections {
        float:left;
        width:100%;
    }

    #allSections sections {
        width:100%;
    }

</style>

<!-- MENU -->
<section id="menu" class=''>
    <nav>
        <ul>
            <a onClick="moverDIV('cartao_virtual')"  style="cursor:pointer;">
                <li>
                    <article>
                    <div id='img-cartao_virtual'></div>
                    <span>Cartão DR. Benefício</span>
                    <i class="fas fa-angle-right"></i>
                    </article>
                </li>
            </a>

            @foreach($beneficios as $b)

            @if($b->VISIVEL == 1)
                @if(substr($b->HTML_BENEF, 0, 3) != "id:" )
                <a onClick="moverDIV('sectionHTML_{{$b->ID_BENEF}}')"  style="cursor:pointer;">
                @else
                <?php $id_div = str_replace("id:","", $b->HTML_BENEF); ?>
                <a onClick="moverDIV('{{$id_div}}')"  style="cursor:pointer;">
                @endif
                <li>
                <article>
                    <div @if(isset($b->ICONE)) id='{{$b->ICONE}}' @else id='img-cartao_virtual' @endif ></div>
                    <span>@if(isset($b->TITULO_HML)) {{$b->TITULO_HML}} @else {{$b->NM_BENEF}} @endif</span>
                    <i class="fas fa-angle-right"></i>
                </article>
                </li>                
            </a>
            @endif
            @endforeach

            <a onClick="moverDIV('central')"  style="cursor:pointer;">
                <li>
                    <article>
                    <span>Fale Conosco</span>
                    <div id='img-fale_conosco'><i class="fas fa-headset"></i></div>
                    <i class="fas fa-angle-right"></i>
                    </article>
                </li>
            </a>

            <a href="{{route('logout')}}"  style="cursor:pointer;">
                <li>
                    <article>
                    <div><i class="fas fa-sign-out-alt" style="transform:rotate(180deg)"></i></div>
                    <span>Sair</span>
                    <i class="fas fa-angle-right"></i>
                    </article>
                </li>
            </a>
        </ul>
    </nav>
    <div class="clear"></div>
</section>



<script>
function moverDIV(id) {
var menu = $("#menu");
var pag = $("#" + id);
menu.animate({
          right: '100%',
      }, 500, function(){ 
        menu.hide();
        pag.removeClass('dNone');
        botoesTopoStatus2();
      });
}

function mostraMenu() {
var menu = $("#menu");
var section_ativa = $("#allSections section:not(.dNone)");
section_ativa.animate({
          left: '100%',
      }, 500, function(){ 
        menu.show();
        menu.css('right','0');
        section_ativa.addClass('dNone');
        section_ativa.removeAttr('style');
        botoesTopoStatus1();
      });
}

function botoesTopoStatus1() {
    $("#button-menu").addClass('dNone');
    $("#turnoff").removeClass('dNone');
}

function botoesTopoStatus2() {
    $("#button-menu").removeClass('dNone');
    $("#turnoff").addClass('dNone');
}
</script>















<div id="allSections">


{{-- CRIA AS DIVS COM CONTEÚDO HTML DO BANCO --}}
@foreach($beneficios as $b)
@if($b->VISIVEL == 1)
        @if(substr($b->HTML_BENEF, 0, 3) != "id:" )
        <section id="sectionHTML_{{$b->ID_BENEF}}" class='dNone'>
            {!!$b->HTML_BENEF!!}
        </section>
        @endif
@endif
@endforeach









<!-- PRIMEIRO LINK - CARTÃO VIRTUAL -->
<section id="cartao_virtual" class='dNone'>
        <div class='hasBg hasBene'>    
          <div class='card-verso'>
            <!-- <label class="col3">        
              <span>Nome:</span>
              <span style='text-transform:capitalize;'>José Roberto Montoro</span>
            </label>
            <label class='col3'>
              <span>Código de Identificação:</span>
              <span>xxx.xxx.xxx-xx</span>
            </label> -->
      
            <div>
              <span>Nome Completo: <b>{{Session::get('admin_name')}}</b></span>
              <span>CPF: <b>{{formata_cpf(Session::get('admin_cpf'))}}</b></span>
              <ul>
                @foreach ($beneficios as $b)
                <li style=" text-transform: lowercase;">{{$b->NM_BENEF}}</li>
                @endforeach
              </ul>
            </div>
      
          </div>
        </div>
        <div class="container">
          <h3>
            <p  style="display:none">Você está na página CARTÃO DR. BENEFÍCIO. Quer voltar ao menu anterior ou acessar seu CARTÃO FARMÁCIA, clique no botão abaixo.</p>
          </h3>
            <a href="cartao_farmacia2.php" class='botao-laranja' style="display:none">Veja aqui seu Cartão Farmácia</a>
        </div>
      </section>

<!-- SEGUNDO LINK - CARTÃO FARMACIA -->
<section id="cartao_farmacia" class="dNone">
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



    
    




<!-- TERCEIRO LINK - CLUBE DE VANTAGENS -->
<section id="vantagens" class="dNone">
        <div class="container">
           <div class="option">
            <a href="desconto.php">
              <img src="../imgs/Cinemark2.jpg">
              <div><span class='percente'>R$ 24,00</span></div>
              <h3>Cinemark</h3>
              <div style='margin-bottom:1rem;font-size:15px;color:#f36f219c'><span>Entreterimento</span></div>
              <span class="texto">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>
              <button>acesse!</button>
            </a>
          </div>
           <div class="option">
            <a href="desconto.php">
              <img src="../imgs/estacio.png">
              <div><span class='percente'>10%</span></div>
              <h3>Cinemark</h3>
              <div style='margin-bottom:1rem;font-size:15px;color:#f36f219c'><span>Entreterimento</span></div>
              <span class="texto">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>
              <button>acesse!</button>
            </a>
          </div>
        </div>  
        <div class="clear"></div>
</section>








<!-- QUARTO LINK - CONSULTA E EXAMES -->
<section id="consultas" class="dNone">
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
            <a href="{{route('checkup')}}">
              <li>
                <article>
                  <div id=''><i class="fas fa-calendar-check"></i></div>
                  <span>check-up</span>
                  <i class="fas fa-angle-right"></i>
                </article>
              </li>
            </a>
          </ul>
        </nav>
      </section>



  <!-- QUINTO LINK - FUNERAL -->
      <section id="funeral" class='dNone'>
            <div class="container">
                <div>
                    <p>Para acionar o serviço de Assistência Funeral 24H, ligue para (13) 3226.1111 (aceita ligações à cobrar)</p>
            
                    <a href="tel:551332261111">clique aqui para ligar</a>
            
                    <p style="color:#F36F21">Importante: LEIA COM ATENÇÃO ANTES DE LIGAR!</p>
            
                    <p>Se você ou algum familiar seu comprou o cartão Dr. Benefício e precisar abrir um pedido de Assistência Funeral tenha em mãos o CPF do falecido. Em caso de menor de 14 anos, será necessário o CPF dos pais.</p>
            
                    <p>Caso o portador do cartão que precisa de assistência seja um beneficiário de um empresa, associação, sindicato ou entidade de classe tenha em mãos o CPF do falecido para acionar a assistência.</p>
                </div>
                <div class='dNone'>
                  <p>
                    SERVIÇO NÃO CONTRATADO PARA SEU CARTÃO. ENTRE EM CONTATO COM NOSSA CENTRAL DE 
                    ATENDIMENTO PARA SABER AS CONDIÇÕES ESPECIAIS DE CONTRATAÇÃO QUE TEMOS PARA VOCÊ!
                  </p>
                </div>
            </div>
        </section>
            


<!-- SEXTO LINK - DISK SAUDE -->
<section id="disk_saude" class='dNone'>

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
                    <a href="{{route('orientacaoNutricional')}}">
                      <li>
                        <article>
                          <div id=""><i class="fas fa-apple-alt"></i></div>
                          <span>orientação nutricional</span>
                          <i class="fas fa-angle-right"></i>
                        </article>
                      </li>
                    </a>
                  </ul>
                </nav>
    </section>


<!-- SETIMO LINK - ODONTO -->
    <section id="odonto" class="dNone">
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


    <section id="central" class="dNone">		
            <div id="fundo-galera"></div>
            <div class="container">
              <div style='margin-bottom:3rem;'>
                <h1>CENTRAL DE ATENDIMENTO</h1>

                <p>Segunda a Sexta, das 9 às 18 horas (exceto feriados)</p>

                <ul id='contacts'>
                  <a href="https://wa.me/5513997748080?text=Olá,%20meu%20nome%20é%20(favor,%20coloque%20seu%20nome%20completo%20aqui)%20estou%20entrando%20em%20contato%20pelo%20app%20Dr.%20Beneficio!" target='_blank'><li><span><i class="fab fa-whatsapp"></i>What's App</span></li></a> 
                  <a href="tel:551332261111"><li><span><i class="fas fa-phone-alt"></i>Telefone</span></li></a>
                </ul>
              </div>

              <p>Serviços 24h</p>
              
              <div id='ori_funeral'>
                <ul>
                  <a href="ori_medica.php"><li><span>
                    <i class="fas fa-user-md"></i>Orientação Médica por telefone</span></li>
                  </a>
                  <a href="funeral.php"><li><span>
                    <div id="img-funeral"></div>Assistência Funeral 24h</span></li>
                  </a>
                </ul>
              </div>

              <p>Conheça ainda nossas redes sociais!</p>

              <ul style="margin-bottom:3rem;">
                <a href="https://www.facebook.com/drbeneficio/"><li><span><i class="fab fa-facebook"></i>Facebook</span></li></a>
                <a href="https://www.instagram.com/drbeneficio/?hl=pt-br"><li><span><i class="fab fa-instagram"></i>Instragram</span></li></a>
              </ul>

              <div id='lastText'>
                <p>se preferir, mande um e-mail para: <a href="mailto:atendimento@drbeneficio.com.br">atendimento@drbeneficio.com.br</a>.</p>

                <p>ou acesse nosso site: <a href="www.drbeneficio.com.br">www.drbeneficio.com.br</a> e saiba mais sobre todos os nossos produtos e serviços.</p>
              </div>
            </div>
        </section>


</div>
    

@endsection