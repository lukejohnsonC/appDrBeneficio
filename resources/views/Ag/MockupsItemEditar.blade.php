@extends('estrutura.master') @section('conteudo')

<section style="width:50%;float:left;">
    <div id="form">
        <form action="{{route('agMockupsItemEditarPost')}}" method="post" style="text-align: left">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="mockup" value="{{$mockup}}" />
            <input type="hidden" name="menu" value="{{$menu}}" />

            <section>
                <div class="container">
                    <h2>Editar item</h2>
                    
                    <br />

                    <label class="col1">
                        <label>Nome do item:</label>
                        <input type="text" name="nome" class="form-control" value="{{$item->NOME}}" />
                    </label>
                    <label class="col1">
                        <label>Tipo:</label>
                        <select class="form-control" name="tipo">
                            <option value="MODULO" {{ $item->TIPO === "MODULO" ? "selected" : "" }} >MÓDULO</option>
                            <option value="HTML" {{ $item->TIPO === "HTML" ? "selected" : "" }}>HTML</option>
                            <option value="LINK" {{ $item->TIPO === "LINK" ? "selected" : "" }}>LINK</option>
                        </select>
                    </label>

                    <label class="col1">
                        <label>Conteúdo:</label>
                        <textarea name="conteudo" class="form-control" style="height:300px">{{$item->CONTEUDO}}</textarea>
                    </label>

                    <label class="col1">
                        <label>Icone:</label>
                        <input type="text" class="form-control" name="icone" value="{{$item->ICONE}}"/>
                    </label>
                    <input type="submit" value="enviar" />
                </div>
            </section>
        </form>
    </div>
</section>

 @endsection