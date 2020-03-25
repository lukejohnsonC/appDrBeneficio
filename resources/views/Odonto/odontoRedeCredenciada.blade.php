@extends('estrutura.master')

@section('conteudo')

<section id="rede_credenciada">
        <div class="container">
        <h1 style='text-align: center;'>Rede Credenciada Odonto</h1>
        <div id="listaRedes">
            @foreach($redes as $cidade => $rds)
            <div style="margin-bottom: 50px;">
            <h1 style="text-align:center;">{{$cidade}}</h1>
                    @foreach($rds as $r)
                    <div id='results'>
                            <ul>
                            <li>{{$r->nm_nome}}</li>
                            {{-- <li><h3>especialidade</h3></li> --}}
                            <li>{{$r->cd_end}} {{$r->cd_cidade}}/{{$r->cd_estado}}</li>
                            <li><a href="tel:0{{$r->cd_telefone}}" class='telefone'>{{formata_telefone($r->cd_telefone)}}</a></li>
                            </ul>
                            @if(!isset($ocultaAgendamento) || $ocultaAgendamento == false)
                            <a href='@isset($linkAgendamento) {{$linkAgendamento}} @else {{route("odontoAgendar")}} @endisset'>@isset($textoAgendamento) {{$textoAgendamento}} @else Agendar @endisset</a>
                            @endif
                    </div>
                    @endforeach
            </div>
            @endforeach
        </div>
    </div>

</section>

@endsection
