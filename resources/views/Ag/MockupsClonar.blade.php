@extends('estrutura.master') 

@section('conteudo') 


<div id="form">
<form action="{{route('agMockupsClonarPost')}}" method="post" style="text-align: left">
<input type="hidden" name="_token" value="{{ csrf_token() }}" />

<section>
    <div class="container">
        <label>Nome: </label><input type="text" class="form-control" name="nome" />
    </div>
    <div class="container">
        <label>Logo: </label><input type="text" class="form-control" name="logo" />
    </div>
    <div class="container">
        <label>Slug: </label><input type="text" class="form-control" name="slug" />
    </div>
    <div class="container">
        <label>ID Usuario Logado: </label><input type="text" class="form-control" name="user_logado" />
    </div>
</section>
<br /><br />
<section>
    <div class="container">
            Selecione o pacote de beneficios que você quer clonar
    <select class="form-control" name="pacote_existente" required>
        @foreach($menus_existentes as $m)
        <option value="{{$m->ID_PC_BENEF}}">{{$m->NM_PC_BENEFI}} ({{$m->DESCRITIVO}})</option>
        @endforeach
    </select>
    </div>
</section>

<section>
    <div class="container">
        <input type="submit" value="Clonar" />
    </div>
</section>

</form>
</div>

@endsection