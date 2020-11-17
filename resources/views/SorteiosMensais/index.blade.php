@extends('estrutura.master') @section('conteudo')

<div class="container">
<div>
  <h1>Solicitaﾃｧﾃ｣o Dependente</h1>
</div>


@if ( Session::get('message') != '' )
<div id="erro">{{ Session::get('message') }}</div>
@endif

<form action="{{route('sorteiosmensaisPOST')}}" method='POST' enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
  
  
   <label for="" class="col1">
    <span>CPF:</span>
    <input type="text" class="form-control cpf-mask" name="cpf" required/>
  </label>
  
     <label for="" class="col1">
    <span>Nome:</span>
    <input type="text" class="form-control cpf-mask" name="nome" required/>
  </label>
  
  <label for="" class="col1">
    <span>Data de Nascimento:</span>
    <input type="text" class="form-control cpf-mask" name="dt_nasc" required/>
  </label>
  
  
  
  <label class="col1">
    <span>Parentesco</span>
    <select name="parentesco">
      <option value="PAI/MAE">PAI/MAE</option>
      <option value="Filho">FILHO(A)/ENTEADO(A)</option>
      <option value="Conjuge">Cﾃ年JUGE</option>
     
    </select>
  </label>

  
  
 
  
  <label class='col1'><input type="submit" style='height: auto;' value="Enviar" /></label>
</form>
</div>

@endsection