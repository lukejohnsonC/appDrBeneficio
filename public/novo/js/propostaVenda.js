$(document).ready(function() {

  $('.cpf-mask').mask('000.000.000-00');
  $('.date-mask').mask('00/00/0000');
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
  console.log(planosValores);


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
    qtdTotal = parseInt($(this).val(), 10) + 1;
    valores.qtdTotal = qtdTotal;
    valor = planosValores[valores["plano"]][qtdTotal];
    valores.valor = valor;

    $("#etapa1").fadeOut();
    $("#mostraCodigoVendedor").html(valores["codigoVendedor"]);
    $("#mostraPlano").html(valores["plano"]);
    $("#mostraQuantidade").html(valores["qtdTotal"]);
    $("#mostraValorTotal").html("R$" + valores["valor"]);
    $("#etapa2").fadeIn();

  });












  /*
  function carregaCidades() {
      resetCidades();
      resetBairros();
      resetFarmacias();
      var envia = { 'estado': $("#estado").val() };
      $.ajax({
          type:"POST",
          url : "{{route('getCidadesWithEstado')}}",
          data : envia,
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success : function(response) {
              var select = $('#cidade');
              var divLabel = select.parent();

              select.empty();
              select.append(
                  $('<option selected="true" disabled="true"></option>').html("Escolha a cidade")
              );
              $.each(response, function(index, value) {
                  select.append(
                      $('<option></option>').val(value.municipio).html(value.municipio)
                  );
              });
              divLabel.removeClass('dNone');
          },
          error: function(response) {
              console.log('Erro');
          }
      });
  }
  */











  // Para alertas
  //   Swal.fire({
  //   title: '<strong><u>Dr. Benefício informa</u></strong>',
  //   type: 'info',
  //   html:
  //     '<img src="{{asset('novo')}}/imgs/postCarnaval.png"><br><p>Nos dias 24 e 25 de Fevereiro, entraremos em recesso e retornaremos nossas atividades no dia 26/02 (quarta-feira) à partir das 13:00.</p>',
  //   showCloseButton: true,
  //   showCancelButton: false,
  //   focusConfirm: false,
  //   confirmButtonText:
  //     '<i class="fa fa-thumbs-up"></i>'
  //   })

  // setTimeout(function(){ Swal.close() }, 20000);

});
