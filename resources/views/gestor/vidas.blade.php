@extends('adminlte::page') @section('content_header')
<h1>Relação de vidas</h1>
@stop @section('css')
<style>
  .toggleVida {
    font-size: 25px;
    cursor: pointer;
  }

  .botao_desativar {
    color: #dd4b39 !important;
  }

  .botao_ativar {
    color: #00a65a !important;
  }
</style>
@stop @section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
      {{--  <h3 class="box-title"><button class="btn btn-success" id="cadastrarVida"><i class="fa fa-plus"></i> Cadastrar vida</button></h3> --}}
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered" id="tabelaVidas">
          <thead>
            <tr>
              <th>Nome</th>
              <th>CPF</th>
              <th>Dt. Nascimento</th>
              <!--<th>T/D</th>-->
              <th>Cel</th>
            <!--  <th>Categoria</th> -->
              <th>Desde</th>
              <th>Opções</th>
            </tr>
          </thead>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>

@component('gestor.formCadastroEdicaoVidas') @endcomponent


@stop @section('js')
<script>
  $(document).ready(function () {

    // ####### Monta tabela de vidas
    var table = $('#tabelaVidas').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{!! route('ProducaoClienteAPI') !!}",
      order: [[0, "asc"]],
      language: DatatablePortugues(),
      columns: [
        { data: 'nm_nome', name: 'nm_nome' },
        { data: 'cd_cpf', name: 'cd_cpf' },
        { data: 'cd_dt_nasc', name: 'cd_dt_nasc' },
        //{ data: 'cd_celular', name: 'cd_celular' },
        { data: null, orderable: false, bSearchable: false, defaultContent: '' },
        { data: 'dt_ativacao', name: 'dt_ativacao' },
        // { data: null, orderable: false, bSearchable: false, defaultContent: '<button class="btn btn-info botao_ativar">Alterar Status</button>'}
        { data: null, orderable: false, bSearchable: false, defaultContent: '' }
      ],


      columnDefs: [
        {
          targets: 1,
          render: function (data) {
            return formata_cpf(data);
          }
        },
        {
          targets: 2,
          render: function (data) {
            return dataFormatada(data + ' 00:00:00');
          }
        },
        {
          targets: 3,
          render: function (data) {
            if(data.cd_celular) {
              return data.cd_celular;
            } else {
              return "";
            }
          }
        },
        {
          targets: 4,
          render: function (data) {
            return dataFormatada(data);
          }
        },
        {
          targets: 5,
          render: function (data) {
            /*
            if (data.cd_status == "ATIVO") {
              $retorno = '<i class="fa fa-toggle-on toggleVida botao_ativar" title="Alterar Status" aria-hidden="true" ></i>';
            }
            if (data.cd_status == "INATIVO") {
              $retorno = '<i class="fa fa-toggle-off toggleVida botao_desativar" title="Alterar Status" aria-hidden="true"></i>';
            }
            */

            $retorno = "<button class='btn btn-warning botao_editar' style='margin-left:15px;'>Editar</button>";
            $retorno += "<button class='btn btn-danger botao_excluir' style='margin-left:15px;'>Excluir</button>";

            return $retorno;
          }
        },
      ]
    });

    // ####### Ação de clique no botão de alterar status
    $('#tabelaVidas tbody').on('click', '.botao_excluir', function () {
      var envia = table.row($(this).parents('tr')).data();
      var url = "{{route('vidasExcluir')}}";
      // var pos = "posAlterarStatus()"

      ConfirmacaoAjax(
        envia,
        url,
        function posAlterarStatus() {
          $('#tabelaVidas').DataTable().ajax.reload(null, false);
        },
        "Excluir Vida",
        "Você está excluindo " + envia.nm_nome + ". Você tem certeza? Esta opção é irreversível!",
        "Sim, excluir!"
      );
    });

/*
    // ####### Ação de clique no botão nova vida
    $('#cadastrarVida').on('click', function () {
      $('#modalCadastroVida').find('form').trigger('reset');
      // Captura os campos do formulario
      var camposModal = [];
      $("#modalCadastroVida").find("input").each(function(){ camposModal.push(this.id); });

      // Looping para inserir os dados da vida editada nos campos do formulário
      $(camposModal).each(function(index, element) {

        //Insere máscaras e formatações em determinados campos
        switch(element) {
          case "cd_cpf":
            $('#modalCadastroVida #' + element).mask('000.000.000-00');
          break;

          case "cd_dt_nasc":
            $('#modalCadastroVida #' + element).mask('00/00/0000');
          break;

          case "cd_ddd_celular":
            $('#modalCadastroVida #' + element).mask('00');
          break;

          case "cd_celular":
            $('#modalCadastroVida #' + element).mask('000000000');
          break;

          case "cd_ddd_telefone":
            $('#modalCadastroVida #' + element).mask('00');
          break;

          case "cd_telefone":
            $('#modalCadastroVida #' + element).mask('000000000');
          break;

          default:
          }
      });

      //Altera titulos e textos de botões no formulário
      $('#modalCadastroVida .modal-title').html('Cadastrar nova vida');
      $('#modalCadastroVida .botaoEnviar').html('Criar');

      //Abre o modal com o formulário de edição
      $('#modalCadastroVida').modal('toggle');
    }); */

    // ####### Ação de clique no botão editar

    $('#tabelaVidas tbody').on('click', '.botao_editar', function () {
      $('#modalCadastroVida').find('form').trigger('reset');
      //Captura os dados da vida clicada
      var data = table.row($(this).parents('tr')).data();

      //console.log(data);

      // Captura os campos do formulario
      var camposModal = [];
      $("#modalCadastroVida").find("input").each(function(){ camposModal.push(this.id); });

      // Looping para inserir os dados da vida editada nos campos do formulário
      $(camposModal).each(function(index, element) {

        //Insere máscaras e formatações em determinados campos
        switch(element) {
          case "cd_cpf":
            $('#modalCadastroVida #' + element).val(formata_cpf(data[element]));
            $('#modalCadastroVida #' + element).mask('000.000.000-00');
          break;

          case "cd_dt_nasc":
            $('#modalCadastroVida #' + element).val(dataFormatada(data[element] + ' 00:00:00'));
            $('#modalCadastroVida #' + element).mask('00/00/0000');
          break;

          case "cd_celular":
            $('#modalCadastroVida #' + element).val(data[element]);
            $('#modalCadastroVida #' + element).mask('(00) 0000-00000');
          break;

          case "cd_telefone":
            $('#modalCadastroVida #' + element).val(data[element]);
            $('#modalCadastroVida #' + element).mask('(13) 0000-00000');
          break;

          case "cd_cep":
            $('#modalCadastroVida #' + element).val(data[element]);
            $('#modalCadastroVida #' + element).mask('00000-000');
          break;

          default:
            $('#modalCadastroVida #' + element).val(data[element]);
          }
      });

      //Altera titulos e textos de botões no formulário
      $('#modalCadastroVida .modal-title').html('Editando ' + data.nm_nome);
      $('#modalCadastroVida .botaoEnviar').html('Editar');

      //Abre o modal com o formulário de edição
      $('#modalCadastroVida').modal('toggle');
    });

    // ####### Ação de clique no botão enviar do formulário
    $('#modalCadastroVida').on('click', '.botaoEnviar', function () {
      //$('#modalCadastroVida').validator();
      //var id_producao_cliente = $("#modalCadastroVida #id_producao_cliente").val();

      // Captura os campos do formulario
      var camposModal = [];
      $("#modalCadastroVida").find("input").each(function(){ camposModal.push(this.id); });

      // Looping para inserir os dados da vida editada na variável de envio
      var envia = {};
      $(camposModal).each(function(index, element) {
        var conteudo = $('#modalCadastroVida #' + element).val();
        envia[element] = conteudo;
      });

       if(envia.id_producao_cliente) {
        var url = "{{route('vidasEditar')}}";
      } else {
      {{--  //var url = "{{route('vidasCadastrar')}}";
      --}}
      }

      ConfirmacaoAjax(
        envia,
        url,
        function pos() {
          $('#modalCadastroVida').modal('toggle');
          $('#tabelaVidas').DataTable().ajax.reload(null, false);
        },
        null,
        null,
        null,
      );

    });



  });









/*
    function PostCadastrarVida() {
      // Captura os campos do formulario
      var camposModal = [];
      $("#modalCadastroVida").find("input").each(function(){ camposModal.push(this.id); });

      // Looping para inserir os dados da vida editada na variável de envio
      var envia = {};
      $(camposModal).each(function(index, element) {
        var conteudo = $('#modalCadastroVida #' + element).val();
        envia[element] = conteudo;
      });

      {{--
      var url = "{{route('vidasCadastrar')}}";
      --}}

      ConfirmacaoAjax(
        envia,
        url,
        function pos() {
          $('#modalCadastroVida').modal('toggle');
          $('#tabelaVidas').DataTable().ajax.reload(null, false);
        },
        "Editar Vida",
        null,
        "Sim, editar"
      );
    } */

    function getCEP(cep) {
      if (cep.length === 9) {
        endereco = JSON.parse(getCEPJquery(cep));
        if (endereco.hasOwnProperty('logradouro')) {
          $("#modalCadastroVida #cd_endereco").val(endereco.logradouro);
          $("#modalCadastroVida #cd_bairro").val(endereco.bairro);
          $("#modalCadastroVida #cd_cidade").val(endereco.localidade);
          $("#modalCadastroVida #cd_estado").val(endereco.uf);
          $("#modalCadastroVida #cd_end_numero").val('');
          $("#modalCadastroVida #cd_end_numero_complemento").val('');
        }
      }
    }



</script> @stop
