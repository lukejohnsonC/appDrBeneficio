@extends('estrutura.master') @section('conteudo')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<style>
a, p, div, span, form, label, input, select, textarea {
  text-align:left!important;
}

.ed-editable-delete, section nav ul li:hover .ed-editable-delete {
  background-color: transparent!important;
}

section nav ul li .ed-editable-delete i.fas {
  color:black!important;
  float: right!important;
  font-size: 20px!important;
margin-right: 10px!important;
}

</style>

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
                <article style="display: block;float: left;">
                  <div class='icone' style="display: block;">{!!$i->ICONE!!}</div>
                    <span style="width: calc(50% - 60px);display: block;float: left;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;">{{$i->NOME}}</span>
                    <div class='ed-editable-delete' style="width: calc(50% - 60px);float: right;display: block;">
                        <a href="{{route('agMenusItemEditar', ['id_pacote' => $pacote, 'id_menu' => $i->ID_MENU])}}" style="float:left"><i class="fas fa-edit"></i></a>
                        <a href="{{route('agMenusItemExcluir', ['id_pacote' => $pacote, 'id_menu' => $i->ID_MENU])}}" style="float:left"><i class="fas fa-trash-alt"></i></a>
                    </div>
                </article>
            </li>
            @endforeach

        </ul>
    </nav>

</section>


<section style="width:50%;float:left;">
    <div id="form">
        <form action="{{route('agMenusEditarPost')}}" method="post" style="text-align: left">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="pacote" value="{{$pacote}}" />

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
                          <option value="MODULOWL">MÓDULOWL</option>
                          <option value="HTML">HTML</option>
                          <option value="LINK">LINK</option>
                          <option value="CONTATO">CONTATO</option>
                        </select>
                    </label>

                    <label class="col1">
                        Parâmetro White Label:<span style="font-size:12px">(Só inserir o ID do pacote caso o módulo seja MODULOWL)</span>
                        <input type="text" class="form-control" name="param_wl" />
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
            url: "{{route('agMenusAlteraOrdem')}}",
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
