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
padding-bottom: 15px;

}

input, select {
  width: 100%!important;
  background-color: white!important;
}

#buscaConteudo {
  padding: 15px 0px !important;
  font-size: 15px;
}

</style>

<section>
    @if ( Session::get('message') != '' )
    <div id="erro">{{ Session::get('message') }}</div>
    @endif
  <div id="fundo-galera"></div>
  <div class="container posFooter">

      <h1 style="text-align:center">Validador</h1>
    <div id="form">

      <form autocomplete='off' method="post" action="{{route('validador.busca')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                  <div id="etapa1" class="col1" style="float:left;">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="col1" id="divBuscaConteudo">
                          <span>CPF</span>
                          <input name="buscaConteudo" id="buscaConteudo" type="text"
                          @isset($returnPOST)
                            value="{{$buscaConteudo}}"
                          @endisset
                           />
                        </label>
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="col1">
                          <span>CONVÊNIO</span>
                        <select id="base" name="base">
                          <option value="DRBEN"
                          @isset($returnPOST)
                            @if($base == "DRBEN")
                              selected
                            @endif
                          @endisset
                          >DR. BENEFÍCIO</option>
                          
                           <option value="ATRIB"
                          @isset($returnPOST)
                            @if($base == "ATRIB")
                              selected
                            @endif
                          @endisset
                          >A TRIBUNA</option>
                          
                          <option value="GRANDIR"
                          @isset($returnPOST)
                            @if($base == "GRANDIR")
                              selected
                            @endif
                          @endisset
                          >GRANDIR SEGUROS</option>
                          
                          <option value="GRANDIR"
                          @isset($returnPOST)
                            @if($base == "GRANDIR")
                              selected
                            @endif
                          @endisset
                          >ASSOC. FUNC. PÚBLICOS PRAIA GRANDE</option>
                          
                          <option value="GRANDIR"
                          @isset($returnPOST)
                            @if($base == "GRANDIR")
                              selected
                            @endif
                          @endisset
                          >VISTA SEGUROS</option>
                          
                          
                          
                        
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
                    
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="col1">
                          <span>(Caso seja convênio OAB, <a href="https://www2.oabsp.org.br/asp/consultaInscritos/consulta01.asp" target="_blank">CLIQUE AQUI</a>)</span>
                        </label>
                      </div>
                    </div>
                    
                  </div>


                  @isset($returnPOST)

                  @if($base == "DRBEN")
                  <div class="etapa2" style="width:100%;float:left;">
                    <div class="vida">
                      @if($return)
                          <h2>{{$return->nm_nome}}</h2>
                          @if($return->cd_status == "ATIVO")
                                    <h3 style="color:green;">{{$return->cd_status}}</h3>
                          @elseif($return->cd_status == "INATIVO")
                                      <h3 style="color:red;">{{$return->cd_status}}</h3>
                         @endif
                         <br></br>
                         <h3> <a href="http://incompanynet.com.br/cliente/validador">LIMPAR BUSCA</a></h3>
                      @else
                          <h2 style="color:red;">CPF INEXISTENTE</h2>
                          <br></br>
                         <h3> <a href="http://incompanynet.com.br/cliente/validador">LIMPAR BUSCA</a></h3>
                         
                      @endif
                    </div>
                  </div>
                  @endif
                  
                  @if($base == "GRANDIR")
                  <div class="etapa2" style="width:100%;float:left;">
                    <div class="vida">
                      @if($return)
                          <h2>{{$return->nm_nome}}</h2>
                          @if($return->cd_status == "ATIVO")
                          <h3 style="color:green;">{{$return->cd_status}}</h3>
                          @elseif($return->cd_status == "INATIVO")
                          <h3 style="color:red;">{{$return->cd_status}}</h3>
                          @endif
                          <br></br>
                         <h3> <a href="http://incompanynet.com.br/cliente/validador">LIMPAR BUSCA</a></h3>
                      @else
                          <h2 style="color:red;">CPF INEXISTENTE</h2>
                          <br></br>
                         <h3> <a href="http://incompanynet.com.br/cliente/validador">LIMPAR BUSCA</a></h3>
                      @endif
                    </div>
                  </div>
                  @endif

                  @if($base == "ATRIB")
                  <div class="etapa2" style="width:100%;float:left;">
                    <div class="vida">
                      @if($return)
                          <h2>{{$return->nome}}</h2>
                          <h3 style="color:green;">ATIVO</h3>
                      @else
                          <h2 style="color:red;">CPF INEXISTENTE</h2>
                      @endif
                    </div>
                  </div>
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
    default:
    $('#buscaConteudo').unmask();
  }

  $("#buscaConteudo").val("");
  $("#divBuscaConteudo span").html(texto);
}
</script>
@endsection
