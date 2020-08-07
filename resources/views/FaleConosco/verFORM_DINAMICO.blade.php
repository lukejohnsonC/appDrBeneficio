@extends('estrutura.master')

@section('conteudo')

<style>
#erro {
    height: auto;
}
</style>

<script>
$(document).ready(function(){
  $('.cpf-mask').mask('000.000.000-00');
  $('.date-mask').mask('00/00/0000');
});
</script>

<div class="container">
    @if ( Session::get('message') != '' )
        <div id="erro">{{ Session::get('message') }}</div>
    @endif

    <form action="{{route('FORM_DINAMICOPOST')}}" method='POST' enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            {!!$conteudo!!}
        <label class='col1'><input type="submit" style='height: auto;' value="Enviar" /></label>
    </form>
</div>


@endsection
