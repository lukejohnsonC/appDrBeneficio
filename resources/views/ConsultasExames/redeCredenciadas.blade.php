@extends('estrutura.master')

@section('conteudo')

<section id="rede_credenciada">
        <div class="container">
                <form action="" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <label class="col1">
                            <span>Serviço *</span>
                            <select id="servico" name="servico">
                                <option value="" selected="true" disabled="disabled">Selecione uma opção</option>
                                <option value="consulta">consulta</option>
                                <option value="exame">exame</option>
                            </select>
                        </label>

                        <label class="col1 dNone">
                            <span>Tipo *</span>
                            <select id="tipo" name="tipo" required></select>
                        </label>
                    </form>

        <div id="listaRedes" class="dNone">

        </div>
    </div>

        </section>


        <script>
            $('#servico').change(function() {
                carregaTipo();
                resetRedes();
            });

             $('#tipo').change(function() {
                postRedesCredenciadas();
            });

             function carregaTipo() {
               resetTipo();
                var envia = { 'servico': $("#servico").val() };
                $.ajax({
                    type:"POST",
                    url : "{{route('redeCredenciadaCarregaTipo')}}",
                    data : envia,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success : function(response) {
                        console.log(response);
                        var select = $('#tipo');
                        var divLabel = select.parent();

                        select.empty();
                        select.append(
                            $('<option selected="true" disabled="true"></option>').html("Escolha o tipo")
                        );
                        $.each(response, function(index, value) {
                            select.append(
                                $('<option></option>').val(value.id_beneficio).html(value.cd_descr_servico)
                            );
                        });
                        divLabel.removeClass('dNone');

                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            }

            function postRedesCredenciadas() {
                var servico = $("#servico").val();
                if(!servico) {
                    alert("Selecione um servico");
                    return;
                }

                var tipo = $("#tipo").val();
                if(!tipo) {
                    alert("Selecione um tipo");
                    return;
                }

                var envia = { 'servico': servico, 'tipo': $("#tipo").val() };
                $.ajax({
                    type:"POST",
                    url : "{{route('postRedesCredenciadas')}}",
                    data : envia,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success : function(response) {
                        console.log(response);

                        var listaRedes = $('#listaRedes');
                        resetRedes();

                        $.each(response, function(index, value) {
                            var html = "<div id='results'>";
                                html +="<ul>";
                                html +="<li>"+value.nm_nome+"</li>";
                                html +="<li>"+value.cd_end+" "+value.cd_cidade+"/"+value.cd_estado+"</li>";
                                html +="</ul>";
                                @if(!isset($ocultaAgendamento) || $ocultaAgendamento == false)
                                html +="<a href='";
                                html +="@isset($linkAgendamento) {{$linkAgendamento}} @else {{route('redeCredenciadasAgendar')}} @endisset"
                                html +="'>@isset($textoAgendamento) {{$textoAgendamento}} @else Agendar @endisset</a>";
                                @endif
                                html +="</div>";
                            listaRedes.append(html);
                        });
                        listaRedes.removeClass('dNone');

                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            }

             function resetTipo() {
                var select = $('#tipo');
                var divLabel = select.parent();
                select.empty();
                divLabel.addClass('dNone');
            }

            function resetRedes() {
                var listaRedes = $('#listaRedes');
                listaRedes.empty();
                listaRedes.addClass('dNone');
            }


        </script>

@endsection
