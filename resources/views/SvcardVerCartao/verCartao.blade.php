@extends('estrutura.master')

@section('conteudo')

<style>
    #svCardBg {
        display: table;
        background-repeat: no-repeat;
        margin: 0 auto;
        position: relative;
    }
    
    #svCardBg #dados {
        position: absolute;
        bottom: 10px;
        left: 20px;
    }
    
    #svCardBg #dados p {
        font-size: 10px;
        line-height: 0px;
        margin-bottom: 0;
        padding-bottom: 15px;
        margin-top: 0;
        color:#000000!important;
        font-weight:bold;
    }
</style>

<section>
    <div class="container">
@if (\Session::has('success'))
    <div id="erro" style="background-color:green;color:white">{!! \Session::get('success') !!}</div>
@endif

@if (\Session::has('error'))
    <div id="erro">{!! \Session::get('error') !!}</div>
@endif


<div id='funeral'><h1>VS CARD</h1>

<div id="svCardBg" style="background-image: url('{{asset('novo')}}/imgs/{{$image}}');">
 <img src="{{asset('novo')}}/imgs/{{$image}}" style="visibility: hidden;" />
 <div id="dados">
     <p>{{Session::get('admin_name')}}</p>
     <p>{{formata_cpf(Session::get('admin_cpf'))}}</p>
     <p>{{formata_data(Session::get('admin_dt_nasc'))}}</p>
 </div>
</div>
				
<a href="javascript:history.back()" class="pattern"><span><i class="fas fa-undo-alt"></i> voltar ao menu principal</span></a>
			</p>
	</div>
	</div>
</section>

@endsection