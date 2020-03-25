<section id="cartao_virtual">
        <div class='hasBg hasBene'>
          <div class='card-verso'>

            <div>
              <span id='nome'>Nome Completo: <b>{{Session::get('admin_name')}}</b></span>
              <span id='tipo'>Tipo: <b>{{checkTitularidade()}}</b></span>
              <span id='cpf'>CPF: <b>{{formata_cpf(Session::get('admin_cpf'))}}</b></span>
            </div>

          </div>

        </div>

        <!-- <a href="../public/novo/cartaoFarmacia/cliente.png" download='cartaoFarmacia.png' class="botao-laranja">clique aqui para fazer o download</a> -->

      </section>
