@extends('estrutura.master')

@section('conteudo')

<style>
a, p, div, span, form, label, input, select, textarea {
  text-align:left!important;
}
</style>


<div id="form">
<form action="{{route('agMenusNovoPost')}}" method="post" style="text-align: left">
<input type="hidden" name="_token" value="{{ csrf_token() }}" />


<section>
<div class="container">
        Selecione o pacote de beneficios que será vinculado a este menu
<select class="form-control" name="pacote" required>
    @foreach($pacotes as $p)
    <option value="{{$p->ID_PC_BENEF}}">{{$p->NM_PC_BENEFI}} ({{$p->DESCRITIVO}})</option>
    @endforeach
</select>
</div>
</section>
<section>
        <div class="container">
Itens do menu #################################################<br /><br />

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

@endsection
