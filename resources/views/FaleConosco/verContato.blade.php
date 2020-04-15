@extends('estrutura.master')

@section('conteudo')
<section id="central">
    {!!$conteudo!!}

    @include('FaleConosco.formulario')

</section>

@endsection
