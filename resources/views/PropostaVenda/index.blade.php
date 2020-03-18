@extends('estrutura.master') @section('conteudo')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
#button-menu {
display: none!important;  }
.swal2-header {
  display: none !important;
}
.swal2-popup {
  width: 650px;
}
.swal2-popup img {
  width: 610px;
  border-radius: 5px;
}
#fundo-galera {
  background-image: none;
}

input, select {
  height: 2.5rem!important;
  padding: 0 20px!important;
  width: 100%!important;
}
</style>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="{{asset('novo/js')}}/propostaVenda.js"></script>

<section>
    @if ( Session::get('message') != '' )
    <div id="erro">{{ Session::get('message') }}</div>
    @endif
  <div id="fundo-galera"></div>
  <div class="container posFooter">

      <h1>Proposta de venda</h1>
    <div id="form">

      <form autocomplete='off' action="#" method="post">

        <div id="etapa1">
          <div class="col-lg-12">
            <div class="form-group">
              <label class="col1">
                <span>CÓDIGO DO VENDEDOR</span>
                <input id="codigoVendedor" type="text" required />
              </label>
            </div>
          </div>

          <div id="divPlano" class="col-lg-12" style="display:none;">
            <div class="form-group">
                <label class="col1">
                  <span>SELECIONE O PLANO</span>
                  <select id="plano" class="">
                    <option disabled selected>Selecione um plano</option>
                    <option value="BASICO">Básico</option>
                    <option value="INTERMEDIARIO">Intermediário</option>
                    <option value="COMPLETO">Completo</option>
                  </select>
                </label>
            </div>
          </div>

          <div id="divDependentes" class="col-lg-12" style="display:none;">
            <div class="form-group">
                <label class="col1">
                  <span>QUANTIDADE DE DEPENDENTES</span>
                  <select id="qtdDependentes" class="">
                    <option disabled selected>Selecione a quantidade de dependentes</option>
                    <option value="0">Nenhum</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                  </select>
                </label>
            </div>
          </div>
      </div>


      <div id="etapa2" style="display:none;">
        <h3><b>VENDEDOR:</b> <span id="mostraCodigoVendedor"></span> | <b>PLANO:</b> <span id="mostraPlano"></span> | <b>QUANTIDADE:</b> <span id="mostraQuantidade"></span> | <b>VALOR:</b> <span id="mostraValorTotal"></span></h3>
      </div>















        {{--
        <label class="col1">
          <span>cpf</span>
          <input autocomplete='off' type="text" class="form-control cpf-mask" name='cpf' required placeholder="000.000.000-00" />
        </label>

        <label class="col1" style='margin-top:2rem'>
          <span>DATA DE NASCIMENTO</span>
           <input type="text" class="form-control date-mask" name="nascimento" placeholder="dd/mm/aaaa" autocomplete="off">
        </label>
        --}}

        <label class="col1"  style="display:none;">
          <button type="submit">entrar</button>
        </label>

      </form>
    </div>
</section>

<footer>
  <span>Dr. Benefício 2018&reg; Todos os direitos reservados.<br> Caixa Postal 2030 | CEP 11060-002</span>
</footer>
@endsection
