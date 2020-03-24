@extends('estrutura.master')

@section('conteudo')

<style>
     .listaFarmacias .farmacia {
        margin-bottom: 10px;
background-color: #e1e1e1;
padding: 20px;
    }

    .listaFarmacias .farmacia_nome {
        font-size: 20px;
margin-bottom: 10px;
    }

    .listaFarmacias .farmacia_endereco, .listaFarmacias .farmacia_fone {
        font-size: 13px;
    }
</style>

<section id="rede_farmacia">
        <div class="container">
            <h2>Localize a farmácia credenciada mais próxima de você</h2>

            <div class="listaFarmacias">
                @foreach($listaFarmacias as $lf)
                    <div class='farmacia'>
                        <p class='farmacia_nome'>{{$lf['loja']}}</p>
                        <p class='farmacia_endereco'>{{$lf['endereco']}}</p>
                        <p class='farmacia_fone'>Telefone: {{formata_telefone($lf['telefone'])}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
