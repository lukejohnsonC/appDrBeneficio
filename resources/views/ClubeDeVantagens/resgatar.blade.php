@extends('estrutura.master') 

@section('conteudo')

<section id="funeral" class=''>
    <div class="container">
    	<img src="{{ $vantagem->LOGO }}" id="imgBeneficio">
        {!! $vantagem->DETALHES !!}
    </div>
</section>
@endsection


