@extends('estrutura.master') 

@section('conteudo')

<style>
     .listaFarmacias .farmacia {
        margin-bottom: 10px;
background-color: #e1e1e1;
padding: 20px;
    }

    .listaFarmacias .farmacia_nome {
        font-size: 20px;
margin-bottom: 10px;
    }

    .listaFarmacias .farmacia_endereco {
        font-size: 13px;
    }
</style>

<section id="rede_farmacia">
        <div class="container">
            <h2>Localize a farmácia credenciada mais próxima de você</h2>
            <form action="" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <label class="col1">
                    <span>Estado *</span>
                    <select id="estado" name="estado">
                        <option value="" selected="true" disabled="disabled">Escolha o estado</option>
                        @foreach($listaEstados as $e)
                        <option value="{{$e->uf}}">{{$e->uf}}</option>
                        @endforeach
                    </select>
                </label>

                <label class="col1 dNone">
                    <span>Cidade *</span>
                    <select id="cidade" name="cidade" required></select>
                </label>

                <label class="col1 dNone">
                        <span>Bairro</span>
                        <select id="bairro" name="bairro"></select>
                </label>
              
                <label class="col1">
                    <button type="button" onclick="postFarmacias()">Pesquisar</button>                    
                </label>
            </form>

            <div class="listaFarmacias dNone"></div>

            <img src="{{asset('novo')}}/imgs/partners.png">
        </div>
    </section>


    <script>

            //Script para já iniciar com as farmácias de Santos carregadas
            $( document ).ready(function() {
                $("#estado").val("SP");
                carregaCidades();
                setTimeout(function(){ 
                    $("#cidade").val("SANTOS");
                 }, 2000);
                 
                 setTimeout(function(){ 
                    carregaBairros();
                 }, 3000);
                 
                 setTimeout(function(){ 
                    postFarmacias();
                 }, 4000);
            });
    
    
            $('#estado').change(function() {
                carregaCidades();
            });
    
            $('#cidade').change(function() {
                resetFarmacias();
                postFarmacias();
                carregaBairros();
            });
    
             $('#bairro').change(function() {
                resetFarmacias();
                postFarmacias();
            });
    
    
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
    
            function carregaBairros() {
                resetBairros();
                resetFarmacias();
                var envia = { 'cidade': $("#cidade").val() };            
                $.ajax({
                    type:"POST",
                    url : "{{route('getBairrosWithCidade')}}",
                    data : envia,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success : function(response) {
                        var select = $('#bairro');
                        var divLabel = select.parent();
                        
                        select.empty();
                        select.append(
                            $('<option value="" selected="true"></option>').html("TODOS OS BAIRROS")
                        );
                        $.each(response, function(index, value) {
                            select.append(
                                $('<option></option>').val(value.bairro).html(value.bairro)
                            );
                        });                    
                        divLabel.removeClass('dNone');
                    },
                    error: function(response) {
                        console.log('Erro');
                    }
                });
            }
    
    
    
            function postFarmacias() {
                var estado = $("#estado").val();
                if(!estado) {
                    //alert("Selecione um estado");
                    alerta("erro", "Selecione um estado");
                    return;
                }
    
                var cidade = $("#cidade").val();
                if(!cidade) {
                    //alert("Selecione uma cidade");
                    alerta("erro", "Selecione uma cidade");
                    return;
                }
    
                var envia = { 'estado': estado, 'cidade': cidade, 'bairro': $("#bairro").val() };            
                $.ajax({
                    type:"POST",
                    url : "{{route('postFarmacias')}}",
                    data : envia,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success : function(response) {
                        var listaFarmacias = $('.listaFarmacias');
                        resetFarmacias();
                        
                        $.each(response, function(index, value) {
                            var html = "<div class='farmacia'>";
                            html +="<p class='farmacia_nome'>"+value.loja+"</p>";
                            html +="<p class='farmacia_endereco'>"+value.endereco+" - "+value.bairro+"</p>";
                            html += "</div>";
                            listaFarmacias.append(html);
                        });
                        listaFarmacias.removeClass('dNone');
                    },
                    error: function(response) {
                        console.log('Erro');
                    }
                });
            }
    
            function resetCidades() {
                var select = $('#cidade');
                var divLabel = select.parent();
                select.empty();                 
                divLabel.addClass('dNone');
            }
    
            function resetBairros() {
                var select = $('#bairro');
                var divLabel = select.parent();
                select.empty();                 
                divLabel.addClass('dNone');
            }
    
            function resetFarmacias() {
                var listaFarmacias = $('.listaFarmacias');
                listaFarmacias.empty();                 
                listaFarmacias.addClass('dNone');
            }
    
        </script>

@endsection