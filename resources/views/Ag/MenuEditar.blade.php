@extends('estrutura.master') @section('conteudo')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


<section style="width:50%;float:left;">

    <nav>
        <ul>
            <li>
                <article>
                    <div class='ed-plus'>
                        <button><i class="fas fa-plus"></i></button>
                    </div>
                </article>

            </li>
        </ul>
        <ul id="sortable" class="row_position">
            @foreach($itens as $i)
            <li class="ui-state-default" id="{{$i->ID_MENU}}" style="cursor: n-resize;">
                <article>
                    {!!$i->ICONE!!}
                    <span>{{$i->NOME}}</span>
                    <div class='ed-editable-delete'>
                        <button><i class="fas fa-edit"></i></button>
                        <button><i class="fas fa-trash-alt"></i></button>
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