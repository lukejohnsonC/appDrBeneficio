@extends('estrutura.master')

@section('conteudo')

<section>
    <div class="container">
@if (\Session::has('success'))
    <div id="erro" style="background-color:green;color:white">{!! \Session::get('success') !!}</div>
@endif

@if (\Session::has('error'))
    <div id="erro">{!! \Session::get('error') !!}</div>
@endif


<div id='funeral'>
    <h1>CONSULTA SALDO</h1>

		<p>Caro associado, em breve a informação estará disponível<br></p>

			
				<p>Em caso de dúvidas, entre em contato conosco ou diretamente com a central da SV CARD</p>

				<a href="tel:01334680359" class='pattern'>(13) 3468.0359</a><br>

				
<a href="javascript:history.back()" class="pattern"><span><i class="fas fa-undo-alt"></i> voltar ao menu principal</span></a>
			</p>
	</div>
</div>
</section>

@endsection