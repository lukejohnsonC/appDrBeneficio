@extends('estrutura.master')

@section('conteudo')


<section id="funeral" class=''>
	<div class="container">
	<style>
		.cartao {
			width: 465px;
			height: 275px;
			margin: 0 auto;
			background: #333;
			border-radius: 15px;
		}
			.cartao .texto {
				width: 75%;
				float: right;
				text-transform: uppercase;
				margin-top: 5rem;
				line-height: 35px;
				font-size: 16px;
				color: #FFF;
			}
				.cartao .texto row {
					display: block;
				}
					.cartao .texto row .titulo {
						text-decoration: underline;
					    width: 28%;
					    display: inline-block;
					    text-align: right;
					    height: 30px;
					}
					.cartao .texto row .subtit {
						padding: 5px;
						margin-left: 2px;
						border-left: 1px solid #FFF;
					}
	</style>
	<div class="cartao">
		<div class="texto">
			<row><span class="titulo">Nome</span><span class='subtit'>{{$data->nmCliente}}</span></row>
			<row><span class="titulo">Código</span><span class='subtit'>{{$data->nuCliente}}</span></row>
			<row><span class="titulo">Validade</span><span class='subtit'>{{$validade}}</span></row>
		</div>
	</div>
	</div>
</section>

@endsection
