@extends('estrutura.master') 

@section('conteudo')

<section id="rede_credenciada">
        <div class="container">  
        <div id="listaRedes">
            @foreach($redes as $r)
                <div id='results'>
                        <ul>
                        <li>{{$r->nm_nome}}</li>
                        <li>{{$r->cd_end}} {{$r->cd_cidade}}/{{$r->cd_estado}}</li>
                        </ul>
                        <a href='{{route("odontoAgendar")}}'>Agendar</a>
                </div>
                @endforeach
        </div>
    </div>

</section>

@endsection