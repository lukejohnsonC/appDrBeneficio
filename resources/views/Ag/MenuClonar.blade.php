@extends('estrutura.master') 

@section('conteudo') 


<div id="form">
<form action="{{route('agMenusClonarPost')}}" method="post" style="text-align: left">
<input type="hidden" name="_token" value="{{ csrf_token() }}" />


<section>
<div class="container">
        Selecione o pacote de beneficios que será vinculado a este menu
<select class="form-control" name="pacote_novo" required>
    @foreach($pacotes as $p)
    <option value="{{$p->ID_PC_BENEF}}">{{$p->NM_PC_BENEFI}} ({{$p->DESCRITIVO}})</option>
    @endforeach
</select>
</div>
</section>

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