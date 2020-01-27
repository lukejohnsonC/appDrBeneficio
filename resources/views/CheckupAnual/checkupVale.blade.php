@extends('estrutura.master') 

@section('conteudo')

                @if($vale)
                    <div id="erro" style="background-color:green;color:white">Seu Voucher foi liberado com sucesso!</div>
                @endif

<section id="vale-checkup">
        <div class="container">
            <div class='listVoucher'>
                @if($vale)
                    
                     <p>Clique no botão a seguir e apresente seu voucher no ato do atendimento na Celulla Mater

                    <button onclick='abrirVoucher()' class='pattern'>Voucher</button>
                    </p>

                    <script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>
                    <script>
                    
                    function abrirVoucher() {
                        // Para alertas
                          Swal.fire({
                          title: '<strong><u>Dr. Benefício - Voucher</u></strong>',
                          type: 'info',
                          html:
                            '<img src="{{asset('novo')}}/imgs/voucherFinalizado.jpg" style="width:100%;">',
                          showCloseButton: true,
                          showCancelButton: false,
                          focusConfirm: false,
                          confirmButtonText:
                            '<i class="fas fa-thumbs-up"></i>',
                          })

                        setTimeout(function(){ Swal.close() }, 60000);

                    }

                    </script>

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
    
            

            @if(!$vale)
                <h3>Para gerar seu voucher de Checkup</h3>
                <br>
                <a onclick='bigCupom()' class="pattern" style="font-size: 20px;">clique aqui</a>

                
                <div class='dNone' id='bigCupom'>
                  <div class="border">
                      <a href="#"><i class="fRight fas fa-times-circle" onclick="bigCupom()"></i></a>
                      <div class="">
                        <h1>Para fazer a liberação do seu voucher, favor insira seu número de celular abaixo (com DDD) e siga as instruções pós liberação.</h1>
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
            @endif
            
            <br>
            <a href="javascript:history.back()" class='pattern'><span><i class="fas fa-undo-alt"></i> voltar ao menu principal</span></a>
            
    </section>

@endsection