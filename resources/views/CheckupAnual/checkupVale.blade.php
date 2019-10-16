@extends('estrutura.master') 

@section('conteudo')


@if ( Session::get('message') != '' )
      <div id="erro" style="background-color:green;color:white">{{ Session::get('message') }}</div>
      @endif

<section id="vale-checkup">
        <div class="container">
            <div class=''>
                @if($vale)
                <h2 style='color:#25d366;'>Voucher válidado com sucesso!</h2>
                @endif
            </div>
            <h3>PROCEDIMENTOS:</h3>
            <ul style='margin-top: 2rem;'>
                <li><a href="{{route('checkupComoFunciona')}}#diagnosticos">Hemograma (HC)</a></li>
                <li><a href="{{route('checkupComoFunciona')}}#diagnosticos">Glicemia (GLI)</a></li>
                <li><a href="{{route('checkupComoFunciona')}}#diagnosticos">Parasitológico de fezes (FP1) - Uma amostra</a></li>
                <li><a href="{{route('checkupComoFunciona')}}#diagnosticos">Colesterol (COL, HDL, LDL, VLDL)</a></li>
            </ul>
            <p>Material biológico: Sangue, fezes e urina.</p>
            <p>(clique no procedimento para saber o que eles podem diagnosticar)</p>
    
            <h3>Para gerar seu voucher de Checkup pelo WhatsApp</h3>
            <br>
            <a onclick='bigCupom()' class="pattern" style="font-size: 20px;">clique aqui</a>
            <br>
            <a href="javascript:history.back()" class='pattern'><span><i class="fas fa-undo-alt"></i> voltar ao menu principal</span></a>
            
            <div class='dNone' id='bigCupom'>
              <div class="border">
                  <a href="#"><i class="fRight fas fa-times-circle" onclick="bigCupom()"></i></a>
                  <div class="">
                    <h1>Para receber seu voucher, favor insira seu número de celular abaixo que dentro de 24hrs enviaremos uma mensagem por What's app.</h1>
                    <form action="{{route('checkupValePost')}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <label for="" class="col1">
                            <input type="number" name="cel" style='width:80%;'>
                        </label>
                        <label for="" class="col1">
                            <button>enviar</button>
                        </label>
                    </form>
                  </div>
              </div>
            </div>
    </section>

@endsection