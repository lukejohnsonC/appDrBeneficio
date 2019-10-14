@extends('estrutura.master') 

@section('conteudo')

<section id="vantagens" class="">
    <!-- <nav>
      <ul>
        <a href="{{route('clubedevantagensResgatar')}}">
          <li>
            <article>
              <div><i class="fas fa-percent"></i></div>
              <span>Ver meus Cupons</span>
              <i class="fas fa-angle-right"></i>
            </article>
          </li>
        </a>
      </ul>
    </nav> -->
    <div class="container">
       <!-- <div class="option">
        <a href="{{route('clubedevantagensResgatar')}}">
          <img src="{{asset('novo')}}/imgs/cinemark.jpg">
          <div><span class='percente'>40%</span></div>
          <h3>Cinemark</h3>
          <span class='subTitle'>Lazer</span>
          <span class="texto">Curta os melhores filmes com economia e sem filas!</span>
          <button>ative!</button>
        </a>
      </div> -->
       <div class="option">
        <a href="{{route('clubedevantagensResgatar')}}">
          <img src="{{asset('novo')}}/imgs/portal.jpg">
          <div><span class='percente'>até 5%</span></div>
          <h3>Portal de Santos</h3>
          <span class='subTitle'>Todos os Postos</span>
          <span class="texto">DESCONTO PARA COMBUSTÍVEL E DEMAIS ITENS</span>
          <button>ative!</button>
        </a>
      </div>
       <div class="option">
        <a href="{{route('clubedevantagensResgatar')}}">
          <img src="{{asset('novo')}}/imgs/wok.jpg">
          <div><span class='percente'>10%</span></div>
          <h3>Let's Wok</h3>
          <span class='subTitle'>alimentos e bebidas</span>
          <span class="texto">QUALQUER REFEICAO, EXCETO PARA PRATOS PROMOCIONAIS E DELIVERY.</span>
          <button>ative!</button>
        </a>
      </div>    
       <div class="option">
        <a href="{{route('clubedevantagensResgatar')}}">
          <img src="{{asset('novo')}}/imgs/oriental.jpg">
          <div><span class='percente'>10%</span></div>
          <h3>Oriental House</h3>
          <span class='subTitle'>produtos e serviços</span>
          <span class="texto">ALIMENTAÇÃO E PRODUTOS LOJA (EXCETO PROMOÇÕES)</span>
          <button>ative!</button>
        </a>
      </div>  
       <div class="option">
        <a href="{{route('clubedevantagensResgatar')}}">
          <img src="{{asset('novo')}}/imgs/saopaulo.jpg">
          <!-- <div><span class='percente'></span></div> -->
          <h3>Restaurante São Paulo</h3>
          <span class='subTitle'>alimentos e bebidas</span>
          <span class="texto">01 SOBREMESA DO DIA </span>
          <button>ative!</button>
        </a>
      </div>
       <div class="option">
        <a href="{{route('clubedevantagensResgatar')}}">
          <img src="{{asset('novo')}}/imgs/veneza.jpg">
          <div><span class='percente'>8%</span></div>
          <h3>VENEZA CHURRASCARIA E PIZZARIA</h3>
          <span class='subTitle'>alimentos e bebidas</span>
          <span class="texto">Em toda alimentação</span>
          <button>ative!</button>
        </a>
      </div>
       <div class="option">
        <a href="{{route('clubedevantagensResgatar')}}">
          <img src="{{asset('novo')}}/imgs/beduino.jpg">
          <div><span class='percente'>20%</span></div>
          <h3>O beduino</h3>
          <span class='subTitle'>alimentos e bebidas</span>
          <span class="texto">DESCONTO NA REFEIÇÃO POR QUILO</span>
          <button>ative!</button>
        </a>
      </div>
       <div class="option">
        <a href="{{route('clubedevantagensResgatar')}}">
          <img src="{{asset('novo')}}/imgs/homeoforumula.jpg">
          <div><span class='percente'>20%</span></div>
          <h3>HOMEOFORMULA</h3>
          <span class='subTitle'>Fármacia e Empório</span>
          <span class="texto">DESCONTO NOS MANIPULADOS E 05% NOS PRODUTOS DE PRATELEIRA</span>
          <button>ative!</button>
        </a>
      </div>
       <div class="option">
        <a href="{{route('clubedevantagensResgatar')}}">
          <img src="{{asset('novo')}}/imgs/yoinami.jpg">
          <div><span class='percente'>10%</span></div>
          <h3>yoinami</h3>
          <span class='subTitle'>alimentos e bebidas</span>
          <span class="texto">CONSUMO LOCAL E NO DELIVERY, NA COMPRA DE 6 ITENS GANHA UM PASTEL TRADICIONAL </span>
          <button>ative!</button>
        </a>
      </div>
       <!-- <div class="option">
        <a href="{{route('clubedevantagensResgatar')}}">
          <img src="{{asset('novo')}}/imgs/leven.jpg">
          <div><span class='percente'>10%</span></div>
          <h3>Leven</h3>
          <span class='subTitle'>Fármacia de manipulação</span>
          <span class="texto">PAGTO A VISTA - NA COMPRA DE SUPLEMENTOS</span>
          <button>ative!</button>
        </a>
      </div> -->
       <div class="option">
        <a href="{{route('clubedevantagensResgatar')}}">
          <img src="{{asset('novo')}}/imgs/viva.jpg">
          <div><span class='percente'>até 12%</span></div>
          <h3>Viva eventos e turismos</h3>
          <span class='subTitle'>Eventos e turismo</span>
          <span class="texto">VIAGENS PARQUES (HOPI HARI, WET'N WILD E MAGIC CITY)</span>
          <button>ative!</button>
        </a>
      </div><!-- 
       <div class="option">
        <a href="{{route('clubedevantagensResgatar')}}">
          <img src="{{asset('novo')}}/imgs/viva.jpg">
          <div><span class='percente'>10%</span></div>
          <h3>Viva eventos e turismos</h3>
          <span class='subTitle'>Eventos e turismo</span>
          <span class="texto">VIAGENS RODOVIÁRIAS - 100% DA AGÊNCIA)</span>
          <button>ative!</button>
        </a>
      </div>
       <div class="option">
        <a href="{{route('clubedevantagensResgatar')}}">
          <img src="{{asset('novo')}}/imgs/viva.jpg">
          <div><span class='percente'>5%</span></div>
          <h3>Viva eventos e turismos</h3>
          <span class='subTitle'>Eventos e turismo</span>
          <span class="texto">PASSAGENS AÉREAS + TERRESTRES NACIONAL E INTERNACIONAL</span>
          <button>ative!</button>
        </a>
      </div> -->
       <div class="option">
        <a href="{{route('clubedevantagensResgatar')}}">
          <img src="{{asset('novo')}}/imgs/libra.jpg">
          <div><span class='percente'>25%</span></div>
          <h3>Ótica libra</h3>
          <span class='subTitle'>ótica</span>
          <span class="texto">25% NAS ARMACOES E 25% NAS LENTES, EXCETO LENTES DE CONTATO</span>
          <button>ative!</button>
        </a>
      </div>



    </div>  
    <div class="clear"></div>
  </section>

@endsection