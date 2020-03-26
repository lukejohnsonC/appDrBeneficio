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
{{--
<script src="{{asset('novo/js')}}/propostaVenda.js"></script>
--}}

<section>
    @if ( Session::get('message') != '' )
    <div id="erro">{{ Session::get('message') }}</div>
    @endif
  <div id="fundo-galera"></div>
  <div class="container posFooter">

      <h1 style="text-align:center">Proposta de venda</h1>
    <div id="form">

      <form autocomplete='off' action="#" method="post">

                  <div id="etapa1">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="col1">
                          <span>CÓDIGO DO VENDEDOR</span>
                          <input id="codigoVendedor" type="text" obrigatorio />
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
                  <h4><b>VENDEDOR:</b> <span id="mostraCodigoVendedor"></span> | <b>PLANO:</b> <span id="mostraPlano"></span> | <b>QUANTIDADE:</b> <span id="mostraQuantidade"></span> | <b>VALOR:</b> <span id="mostraValorTotal"></span></h4>
                </div>

                <div id="etapa3" style="display:none;">
                  <div id="divDiaVencimento" class="col-lg-12">
                    <div class="form-group">
                        <label class="col1">
                          <span>PAGAMENTO - BOLETO BANCÁRIO - SELECIONE O DIA DO VENCIMENTO</span>
                          <select id="vencimento" class="">
                            <option disabled selected>Selecione o dia do vencimento</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                          </select>
                        </label>
                    </div>
                  </div>
                </div>

                <div id="etapa4" style="display:none">
                  <h1 style="text-align:center">Informe os dados do titular</h1>
                  <div id="divTitulares" class="col-lg-12">
                    <div class="form-group">
                        <label class="col2">
                          <span>NOME</span>
                          <input type="text" id="nome" obrigatorio />
                        </label>
                        <label class="col2">
                          <span>CPF</span>
                          <input type="text" id="cpf" class="cpf" obrigatorio />
                        </label>
                        <label class="col2">
                          <span>DATA DE NASCIMENTO</span>
                          <input type="text" id="nascimento" class="nascimento" obrigatorio />
                        </label>
                        <label class="col2">
                          <span>CELULAR</span>
                          <input type="text" id="celular" class="celular" />
                        </label>
                        <label class="col2">
                          <span>E-MAIL</span>
                          <input type="text" id="email" />
                        </label>
                        <label class="col2">
                          <span>SEXO</span>
                          <select id="sexo" class="" obrigatorio>
                            <option disabled selected>Selecione o sexo</option>
                            <option value="MASCULINO">Masculino</option>
                            <option value="FEMININO">Feminino</option>
                          </select>
                        </label>
                        <label class="col2">
                          <span>ESTADO CIVIL</span>
                          <select id="estadoCivil" class="" obrigatorio>
                            <option disabled selected>Selecione o estado civil</option>
                            <option value="CASADO(A)">Casado (a)</option>
                            <option value="SOLTEIRO(A)">Solteiro (a)</option>
                            <option value="DIVORCIADO(A)">Divorciado (a)</option>
                            <option value="VIÚVO(A)">Viúvo (a)</option>
                            <option value="OUTROS">Outros</option>
                          </select>
                        </label>
                        <label class="col2">
                          <span>CEP</span>
                          <input type="text" id="cep" class="cep" obrigatorio />
                        </label>
                        <label class="col2">
                          <span>ENDEREÇO</span>
                          <input type="text" id="endereco" obrigatorio />
                        </label>
                        <label class="col2">
                          <span>NÚMERO</span>
                          <input type="text" id="numero" obrigatorio />
                        </label>
                        <label class="col2">
                          <span>COMPLEMENTO</span>
                          <input type="text" id="complemento" />
                        </label>
                        <label class="col2">
                          <span>BAIRRO</span>
                          <input type="text" id="bairro" obrigatorio />
                        </label>
                        <label class="col2">
                          <span>CIDADE</span>
                          <input type="text" id="cidade" obrigatorio />
                        </label>
                        <label class="col2">
                          <span>ESTADO</span>
                          <input type="text" id="estado" obrigatorio />
                        </label>
                        <label class="col1">
                          <span>OS CORREIOS ATENDEM NO ENDEREÇO INFORMADO?</span>
                          <select id="correiosAtendem" obrigatorio>
                            <option disabled selected>Selecione a opção</option>
                            <option value="SIM">Sim</option>
                            <option value="NÃO">Não</option>
                          </select>
                        </label>
                        <label class="col1">
                          <button id="go" type="button">Avançar</button>
                        </label>
                    </div>
                  </div>
                </div>

                <div id="etapa5" style="display:none;">
                  <h1 style="text-align:center">Informe os dados do dependente <span id="mostraQtdDadosDependentes"></span></h1>
                  <div id="divDadosDependentes" class="col-lg-12">
                    <div class="form-group">
                      <label class="col2">
                        <span>NOME</span>
                        <input type="text" id="nome" obrigatorio />
                      </label>
                      <label class="col2">
                        <span>CPF</span>
                        <input type="text" id="cpf" class="cpf" obrigatorio />
                      </label>
                      <label class="col2">
                        <span>DATA DE NASCIMENTO</span>
                        <input type="text" id="nascimento" class="nascimento" obrigatorio />
                      </label>
                      <label class="col2">
                        <span>CELULAR</span>
                        <input type="text" id="celular" class="celular" />
                      </label>
                      <label class="col2">
                        <span>SEXO</span>
                        <select id="sexo" class="" obrigatorio>
                          <option disabled selected>Selecione o sexo</option>
                          <option value="MASCULINO">Masculino</option>
                          <option value="FEMININO">Feminino</option>
                        </select>
                      </label>
                      <label class="col2">
                        <span>ESTADO CIVIL</span>
                        <select id="estadoCivil" class="" obrigatorio>
                          <option disabled selected>Selecione o estado civil</option>
                          <option value="CASADO(A)">Casado (a)</option>
                          <option value="SOLTEIRO(A)">Solteiro (a)</option>
                          <option value="DIVORCIADO(A)">Divorciado (a)</option>
                          <option value="VIÚVO(A)">Viúvo (a)</option>
                          <option value="OUTROS">Outros</option>
                        </select>
                      </label>
                      <label class="col1">
                        <span>GRAU DE PARENTESCO</span>
                        <select id="grauParentesco" class="" obrigatorio>
                          <option disabled selected>Selecione o grau de parentesco</option>
                          <option value="PAI/MAE">Pai/Mãe</option>
                          <option value="CONJUGE">Cônjuge</option>
                          <option value="FILHO/ENTEADO (A)">Filho (a)/Enteado (a)</option>
                          <option value="SOGRO(A)">Sogro (a)</option>
                          <option value="OUTROS">Outros</option>
                        </select>
                      </label>
                      <label class="col1">
                        <button id="go" type="button">Avançar</button>
                      </label>
                    </div>
                  </div>
                </div>

                <div id="etapa6" style="display:none;">
                  <h1 style="text-align:center">Estamos enviando os dados... por favor aguarde.</h1>
                </div>



      </form>
    </div>
</section>

<footer>
  <span>Dr. Benefício 2018&reg; Todos os direitos reservados.<br> Caixa Postal 2030 | CEP 11060-002</span>
</footer>


<script>
$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });

  aplicaMascaras = function() {
    $('.cpf').mask('000.000.000-00');
    $('.nascimento').mask('00/00/0000');
    $('.celular').mask('(00) 00000-0000');
    $('.cep').mask('00000-000');
  }
  aplicaMascaras();

  var valores = {};
  var planosValores = {};
  planosValores.BASICO = {};
  planosValores.BASICO[1] = "39,90";
  planosValores.BASICO[2] = "39,90";
  planosValores.BASICO[3] = "39,90";
  planosValores.BASICO[4] = "39,90";
  planosValores.BASICO[5] = "39,90";
  planosValores.BASICO[6] = "48,80";
  planosValores.BASICO[7] = "57,70";
  planosValores.BASICO[8] = "66,60";
  planosValores.BASICO[9] = "75,50";
  planosValores.BASICO[10] = "84,40";

  planosValores.INTERMEDIARIO = {};
  planosValores.INTERMEDIARIO[1] = "49,90";
  planosValores.INTERMEDIARIO[2] = "49,90";
  planosValores.INTERMEDIARIO[3] = "49,90";
  planosValores.INTERMEDIARIO[4] = "49,90";
  planosValores.INTERMEDIARIO[5] = "49,90";
  planosValores.INTERMEDIARIO[6] = "60,80";
  planosValores.INTERMEDIARIO[7] = "71,70";
  planosValores.INTERMEDIARIO[8] = "82,60";
  planosValores.INTERMEDIARIO[9] = "93,50";
  planosValores.INTERMEDIARIO[10] = "104,40";

  planosValores.COMPLETO = {};
  planosValores.COMPLETO[1] = "59,90";
  planosValores.COMPLETO[2] = "59,90";
  planosValores.COMPLETO[3] = "59,90";
  planosValores.COMPLETO[4] = "59,90";
  planosValores.COMPLETO[5] = "59,90";
  planosValores.COMPLETO[6] = "72,80";
  planosValores.COMPLETO[7] = "85,70";
  planosValores.COMPLETO[8] = "98,60";
  planosValores.COMPLETO[9] = "111,50";
  planosValores.COMPLETO[10] = "124,40";
  //console.log(planosValores);


  $('#codigoVendedor').on('input',function(e){
   var value = $(this).val();
   var qtd = value.length;
   if (qtd == 5) {
     $("#divPlano").fadeIn();
   }

   if (qtd < 5) {
     $("#divPlano").fadeOut();
     value = "";
   }
   valores.codigoVendedor = value;
   console.log(valores);
  });

  $('#plano').on('change',function(e){
    valores.plano = $(this).val();
    $("#divDependentes").fadeIn();
    console.log(valores);
  });

  $('#qtdDependentes').on('change',function(e){
    qtdDependentes = parseInt($(this).val(), 10);
    qtdTotal = qtdDependentes + 1;
    valores.qtdDependentes = qtdDependentes;
    valores.qtdTotal = qtdTotal;
    valor = planosValores[valores["plano"]][qtdTotal];
    valores.valor = valor;

    if(!valores.codigoVendedor) {
      return alert("O código do vendedor é obrigatório");
    }

    if(!valores.plano) {
      return alert("O plano é obrigatório");
    }

    $("#etapa1").fadeOut();
    $("#mostraCodigoVendedor").html(valores["codigoVendedor"]);
    $("#mostraPlano").html(valores["plano"]);
    $("#mostraQuantidade").html(valores["qtdTotal"]);
    $("#mostraValorTotal").html("R$" + valores["valor"]);
    $("#etapa2").fadeIn();
    $("#etapa3").fadeIn();

  });

  $('#vencimento').on('change',function(e){
    valores.vencimento = $(this).val();
    $('#etapa3').fadeOut();
    $('#etapa4').fadeIn();
    console.log(valores)
  });

  $('#divTitulares #nome').on('input',function(e){
   if (!valores.dadosTitular) {
     valores.dadosTitular = {};
   }
   valores.dadosTitular.nome = $(this).val();
   console.log(valores);
  });

  $('#divTitulares #cpf').on('input',function(e){
   if (!valores.dadosTitular) {
     valores.dadosTitular = {};
   }
   valores.dadosTitular.cpf = $(this).val();
   console.log(valores);
  });

  $('#divTitulares #nascimento').on('input',function(e){
   if (!valores.dadosTitular) {
     valores.dadosTitular = {};
   }
   valores.dadosTitular.nascimento = $(this).val();
   console.log(valores);
  });

  $('#divTitulares #celular').on('input',function(e){
   if (!valores.dadosTitular) {
     valores.dadosTitular = {};
   }
   valores.dadosTitular.celular = $(this).val();
   console.log(valores);
  });

  $('#divTitulares #email').on('input',function(e){
   if (!valores.dadosTitular) {
     valores.dadosTitular = {};
   }
   valores.dadosTitular.email = $(this).val();
   console.log(valores);
  });

  $('#divTitulares #sexo').on('change',function(e){
    if (!valores.dadosTitular) {
      valores.dadosTitular = {};
    }
    valores.dadosTitular.sexo = $(this).val();
    console.log(valores)
  });

  $('#divTitulares #estadoCivil').on('change',function(e){
    if (!valores.dadosTitular) {
      valores.dadosTitular = {};
    }
    valores.dadosTitular.estadoCivil = $(this).val();
    console.log(valores)
  });

  $('#divTitulares #cep').on('input',function(e){
   if (!valores.dadosTitular) {
     valores.dadosTitular = {};
   }
   valores.dadosTitular.cep = $(this).val();
   console.log(valores);
  });

  $('#divTitulares #endereco').on('input',function(e){
   if (!valores.dadosTitular) {
     valores.dadosTitular = {};
   }
   valores.dadosTitular.endereco = $(this).val();
   console.log(valores);
  });

  $('#divTitulares #numero').on('input',function(e){
   if (!valores.dadosTitular) {
     valores.dadosTitular = {};
   }
   valores.dadosTitular.numero = $(this).val();
   console.log(valores);
  });

  $('#divTitulares #complemento').on('input',function(e){
   if (!valores.dadosTitular) {
     valores.dadosTitular = {};
   }
   valores.dadosTitular.complemento = $(this).val();
   console.log(valores);
  });

  $('#divTitulares #bairro').on('input',function(e){
   if (!valores.dadosTitular) {
     valores.dadosTitular = {};
   }
   valores.dadosTitular.bairro = $(this).val();
   console.log(valores);
  });

  $('#divTitulares #cidade').on('input',function(e){
   if (!valores.dadosTitular) {
     valores.dadosTitular = {};
   }
   valores.dadosTitular.cidade = $(this).val();
   console.log(valores);
  });

  $('#divTitulares #estado').on('input',function(e){
   if (!valores.dadosTitular) {
     valores.dadosTitular = {};
   }
   valores.dadosTitular.estado = $(this).val();
   console.log(valores);
  });

  $('#divTitulares #correiosAtendem').on('change',function(e){
    if (!valores.dadosTitular) {
      valores.dadosTitular = {};
    }
    valores.dadosTitular.correiosAtendem = $(this).val();
    console.log(valores)
  });

  $('#etapa4 #go').on('click',function(e){

    //Verifica obrigatorios
    prossegueTitulares = verificaObrigatorios($("#divTitulares input[obrigatorio], #divTitulares select[obrigatorio]"));

    if(prossegueTitulares) {
      $('#etapa4').fadeOut();
      etapaDependentes();
    }
  });


  // Inicio Lógica dos dependentes
  etapaDependentes = function() {
    qtdDependentes = valores.qtdDependentes;
    if(qtdDependentes != null && qtdDependentes > 0) {
        $('#etapa5').fadeIn();
        valores.dadosDependentes = [];
        checkDependentes();
    } else {
      //Prossegue com a proxima etapa
      preenchimentoFinalizado();
    }
  }

  checkDependentes = function() {
    qtdDependentes = valores.qtdDependentes;
    if (!valores.dadosDependentes.length) {
      qtdDadosDependentes = 0;
    } else {
      qtdDadosDependentes = valores.dadosDependentes.length;
    }

    $("#mostraQtdDadosDependentes").html((qtdDadosDependentes + 1) + "/" + qtdDependentes);
    if(qtdDependentes != qtdDadosDependentes) {
      resetaFormDependentes();
    } else {
      //Prossegue com a proxima etapa
      preenchimentoFinalizado();
    }
  }

  resetaFormDependentes = function() {
    $('#divDadosDependentes :input').not(':button, :submit, :reset, :hidden, :checkbox, :radio').val('');
    $('#divDadosDependentes :checkbox, #divDadosDependentes :radio').prop('checked', false);
    aplicaMascaras();
  }

  $('#etapa5 #go').on('click',function(e){
    //Verifica obrigatorios
    prossegueDependentes = verificaObrigatorios($("#divDadosDependentes input[obrigatorio], #divDadosDependentes select[obrigatorio]"));

    if (prossegueDependentes) {
      var inputs = $("#divDadosDependentes input");
      var selects = $("#divDadosDependentes select");

      if (!valores.dadosDependentes.length) {
        qtdDadosDependentes = 0;
      } else {
        qtdDadosDependentes = valores.dadosDependentes.length;
      }

      let abastece = {};
      inputs.each(function( index, value ) {
        abastece[$(this).attr('id')] = $(this).val();
      });
      selects.each(function( index, value ) {
        abastece[$(this).attr('id')] = $(this).val();
      });

      valores.dadosDependentes.push(abastece);
      checkDependentes();
    }
  });


  verificaObrigatorios = function(data) {
    let obrigatorios = data;
    let prossegue = true;

    obrigatorios.each(function( index, value ) {
      if (!$(this).val()) {
        alert("O campo " + $(this).attr('id') + " é obrigatorio");
        $(this).focus();
        prossegue = false;
        return false;
      }
    });
    return prossegue;
  }


  preenchimentoFinalizado = function() {
    $("#etapa5").fadeOut();
    $("#etapa6").fadeIn();
    $.ajax({
        type:"POST",
        url : "{{route('propostaVenda.dispara')}}",
        data : valores,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success : function(response) {
          console.log(response);
          if (response.status == "sucesso") {
            alert("Proposta de venda enviada com sucesso!");
            window.location.href = "https://www.drbeneficio.com.br";
          } else {
            alert("Ocorreu um erro no disparo. Por favor, tente novamente.");
          }
        },
        error: function(response) {
            console.log(response);
        }
    });
  }
  // Fim Lógica dos dependentes

});
</script>



@endsection
