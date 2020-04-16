@extends('estrutura.master')

@section('conteudo')

<style>
#logo #button-menu {
  display: none!important;
}

p {
  text-align: left;
}


.vida {
  background-color: white;
  width: 100%;
float: left;
margin-bottom: 15px;
box-shadow: 0px 0px 10px 0px black;
padding-top: 15px;
}

input, select {
  width: 100%!important;
  background-color: white!important;
}

#buscaConteudo {
padding: 5px 0px!important;
}

</style>

<section>
    @if ( Session::get('message') != '' )
    <div id="erro">{{ Session::get('message') }}</div>
    @endif
  <div id="fundo-galera"></div>
  <div class="container posFooter">

      <h1 style="text-align:center">Central de atendimento (<a href="{{route('atendente.auth.logout')}}">Sair</a>)</h1>
    <div id="form">

      <form autocomplete='off' method="post" action="{{route('atendente.busca')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                  <div id="etapa1" class="col1" style="float:left;">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="col1">
                          <span>Tipo de busca</span>
                          <select id="buscaTipo" name="buscaTipo">
                            <option value="CPF"
                            @isset($vida)
                              @if($buscaTipo == "CPF")
                                selected
                              @endif
                            @endisset
                            >CPF</option>
                            <option value="PEDIDO"
                            @isset($vida)
                              @if($buscaTipo == "PEDIDO")
                                selected
                              @endif
                            @endisset>Pedido</option>
                            <option value="NOME"
                            @isset($vida)
                              @if($buscaTipo == "NOME")
                                selected
                              @endif
                            @endisset>Nome</option>
                          </select>
                        </label>
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="col1" id="divBuscaConteudo">
                          <span>CPF</span>
                          <input name="buscaConteudo" id="buscaConteudo" type="text"
                          @isset($vida)
                            value="{{$buscaConteudo}}"
                          @endisset
                           />
                        </label>
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="col1">
                          <span>BASE</span>
                        <select id="base" name="base">
                          <option value="DRBEN"
                          @isset($vida)
                            @if($base == "DRBEN")
                              selected
                            @endif
                          @endisset
                          >Dr. Benefício</option>
                          <option value="ATRIB"
                          @isset($vida)
                            @if($base == "ATRIB")
                              selected
                            @endif
                          @endisset
                          >A Tribuna</option>
                        </select>
                        </label>
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="col1">
                          <button type="submit">Buscar</button>
                        </label>
                      </div>
                    </div>
                  </div>

                  @isset($existe)
                    @if($existe != 0)
                    @if($base == "DRBEN")
                      <div class="etapa2" style="width:100%;float:left;">
                        @foreach($vida as $v)
                        <div class="vida">
                            <h2>{{$v->nm_nome}}</h2>
                            @if($v->cd_status == "ATIVO")
                              <h3 style="color:green;">{{$v->cd_status}}</h3>
                            @elseif($v->cd_status == "INATIVO")
                              <h3 style="color:red;">{{$v->cd_status}}</h3>
                            @endif
                            <br />
                              <div style="float:left;width:50%;">
                                <div class="container">
                                  <p><b>Nome:</b> {{$v->nm_nome}}</p>
                                  <p><b>CPF:</b> {{formata_cpf($v->cd_cpf)}}</p>
                                  <p><b>Data de Nascimento:</b> {{formata_data($v->cd_dt_nasc)}}</p>
                                  <p><b>CEP:</b> {{$v->cd_cep}}</p>
                                  <p><b>Endereço:</b> {{$v->cd_endereco}}</p>
                                  <p><b>Número:</b> {{$v->cd_end_numero}} - {{$v->cd_complemento_numero}}</p>
                                  <p><b>Bairro:</b> {{$v->cd_bairro}}</p>
                                  <p><b>Cidade/Estado:</b> {{$v->cd_cidade}}/{{$v->cd_estado}}</p>
                                  <p><b>Tel/Cel:</b> {{$v->cd_telefone}}/{{$v->cd_celular}}</p>
                                  <p><b>Univers:</b> {{$v->nr_rd}}</p>
                                  <p><b>Titularidade:</b> {{$v->cd_titularidade}}</p>


                                  @isset($v->dependentes)
                                  <h3 style="text-align:left;color: #ff710f;">Dependentes</h3>
                                    @foreach($v->dependentes as $d)
                                      <p><b>Nome:</b> {{$d->nm_nome}} <br /> <b>CPF:</b> {{formata_cpf($d->cd_cpf)}}</p>
                                    @endforeach
                                  @endisset

                                </div>
                              </div>
                              <div style="float:left;width:50%;">
                                <p><b>Pedido:</b> {{$v->pedidoDetalhes->id_pedido}} - {{$v->pedidoDetalhes->cd_pedido}}</p>
                                <p><b>Plano:</b> {{$v->pedidoDetalhes->nm_plano}} - R${{$v->pedidoDetalhes->vl_unitario}}</p>
                                <p>
                                  <h3 style="text-align:left;">Coberturas</h3>
                                  <ul style="text-align:left;">
                                    @foreach($v->pedidoDetalhes->coberturas as $c)
                                      <li>{{$c->NM_BENEF}}</li>
                                    @endforeach
                                  </ul>
                                </p>
                              </div>
                        </div>

                        @endforeach
                      </div>
                      @endif

                      @if($base == "ATRIB")
                        <div class="etapa2" style="width:100%;float:left;">
                          @foreach($vida as $v)
                          <div class="vida">
                              <h2>{{$v->nome}}</h2>
                                <h3 style="color:green;">ATIVO</h3>
                              <br />
                                <div style="float:left;width:50%;">
                                  <div class="container">
                                    <p><b>Nome:</b> {{$v->nome}}</p>
                                    <p><b>CPF:</b> {{formata_cpf($v->cpf)}}</p>
                                    <p><b>Data de Nascimento:</b> {{formata_data($v->nascimento)}}</p>
                                    <p><b>Univers:</b> {{$v->nr_rd}}</p>
                                  </div>
                                </div>
                                <div style="float:left;width:50%;">
                                  <p><b>Pedido:</b> {{$v->pedidoDetalhes->id_pedido}} - {{$v->pedidoDetalhes->cd_pedido}}</p>
                                  <p><b>Plano:</b> {{$v->pedidoDetalhes->nm_plano}} - R${{$v->pedidoDetalhes->vl_unitario}}</p>
                                  <p>
                                    <h3 style="text-align:left;">Coberturas</h3>
                                    <ul style="text-align:left;">
                                      @foreach($v->pedidoDetalhes->coberturas as $c)
                                        <li>{{$c->NM_BENEF}}</li>
                                      @endforeach
                                    </ul>
                                  </p>
                                </div>
                          </div>

                          @endforeach
                        </div>
                        @endif

                    @else
                    <div id="erro">Usuário não encontrado</div>
                    @endif
                @endisset

        </form>
    </div>
  </div>
</section>


<script>
$(document).ready(function(){
  $('#buscaConteudo').mask('000.000.000-00');

  $('#buscaTipo').on('change',function(e){
    processaTipo();
  });

  @isset($vida)
    processaTipo();
    $('#buscaConteudo').val('{{$buscaConteudo}}');
    $('html, body').animate({
      scrollTop: $(".etapa2").offset().top
    }, 600);
  @endisset

});

function processaTipo() {
  let texto = $( "#buscaTipo option:selected" ).text();
  let value = $('#buscaTipo').val();

  $("#base option[value='ATRIB']").removeAttr('disabled');

  switch (value) {
    case "CPF":
      $('#buscaConteudo').mask('000.000.000-00');
    break;
    case "PEDIDO":
      $("#base option[value='ATRIB']").attr('disabled', true);
      $("#base").val("DRBEN");
      $('#buscaConteudo').unmask();
    break;
    default:
    $('#buscaConteudo').unmask();
  }

  $("#buscaConteudo").val("");
  $("#divBuscaConteudo span").html(texto);
}
</script>
@endsection
