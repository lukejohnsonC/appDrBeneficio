@extends('estrutura.master') @section('conteudo')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


<section style="width:50%;float:left;">

    <nav>
        {{-- <ul>
            <li>
                <article>
                    <div class='ed-plus'>
                        <button><i class="fas fa-plus"></i></button>
                    </div>
                </article>

            </li>
        </ul> --}}
        <ul id="sortable" class="row_position">
            @foreach($itens as $i)
            <li class="ui-state-default" id="{{$i->ID_MENU}}" style="cursor: n-resize;">
                <article>
                    {!!$i->ICONE!!}
                    <span>{{$i->NOME}}</span>
                    <div class='ed-editable-delete'>
                        <a href="{{route('agMockupsItemEditar', ['id_mockup' => $mockup, 'id_menu' => $i->ID_MENU])}}" style="float:left"><i class="fas fa-edit"></i></a>
                        <a href="{{route('agMockupsItemExcluir', ['id_mockup' => $mockup, 'id_menu' => $i->ID_MENU])}}" style="float:left"><i class="fas fa-trash-alt"></i></a>
                    </div>
                </article>
            </li>
            @endforeach

        </ul>
    </nav>

</section>


<section style="width:50%;float:left;">
    

    <div id="form">
        <form action="{{route('agMockupsEditarDadosPost')}}" method="post" style="text-align: left">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="mockup" value="{{$mockup}}" />

            <section>
                <div class="container">
                    <h2>Editar mockup</h2>
                    
                    <br />

                    <label class="col1">
                        <label>Nome</label>
                        <input type="text" name="nome" class="form-control" value="{{$dados_mockup->NOME}}" />
                    </label>

                    <label class="col1">
                        <label>Logo</label>
                        <input type="text" name="logo" class="form-control" value="{{$dados_mockup->LOGO}}" />
                    </label>

                    <label class="col1">
                        <label>Slug</label>
                        <input type="text" name="slug" class="form-control" value="{{$dados_mockup->SLUG}}" />
                    </label>

                    <label class="col1">
                        <label>ID Usuario Logado</label>
                        <input type="text" name="user_logado" class="form-control" value="{{$dados_mockup->USER_LOGADO}}" />
                    </label>
                    <input type="submit" value="Enviar" />
                </div>
            </section>
        </form>
    </div>










    <br />




    <div id="form">
        <form action="{{route('agMockupsEditarPost')}}" method="post" style="text-align: left">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="mockup" value="{{$mockup}}" />

            <section>
                <div class="container">
                    <h2>Novo item</h2>
                    
                    <br />

                    <label class="col1">
                        <label>Nome do item:</label>
                        <input type="text" name="nome" class="form-control" />
                    </label>
                    <label class="col1">
                        <label>Tipo:</label>
                        <select class="form-control" name="tipo">
                            <option value="MODULO">MÓDULO</option>
                            <option value="HTML">HTML</option>
                            <option value="LINK">LINK</option>
                        </select>
                    </label>

                    <label class="col1">
                        <label>Conteúdo:</label>
                        <textarea name="conteudo" class="form-control" style="height:300px"></textarea>
                    </label>

                    <label class="col1">
                        <label>Icone:</label>
                        <input type="text" class="form-control" name="icone" />
                    </label>
                    <input type="submit" value="enviar" />
                </div>
            </section>
        </form>
    </div>
</section>





<script type="text/javascript">

    $(".row_position").sortable({
        delay: 150,
        stop: function () {
            var selectedData = new Array();
            $('.row_position>li').each(function () {
                selectedData.push($(this).attr("id"));
            });
            updateOrder(selectedData);
        }
    });


    function updateOrder(data) {
        var envia = { position: data };
        $.ajax({
            type: "POST",
            url: "{{route('agMockupsAlteraOrdem')}}",
            data: envia,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function (response) {
                alerta("sucesso", "Ordem alterada com sucesso");
            },
            error: function (response) {
                console.log(response);
            }
        });
    }

</script> @endsection