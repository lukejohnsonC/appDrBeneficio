@extends('estrutura.master')

@section('conteudo')


<section id="funeral" class=''>
	<div class="container">
		<style>
			.cartao {
				width: 465px;
				height: 275px;
				margin: 0 auto;
				background: #0e9ff8;
				border-radius: 15px;
			}
				.cartao .logoAtribuna {
				    width: 20%;
				    margin-left: 5%;
				    position: relative;
				    top: 5rem;
				    display: inline-block;
				}
					.cartao .logoAtribuna img {
						width: 100%;
					}
				.cartao .texto {
				    width: 70%;
				    float: right;
				    text-transform: uppercase;
				    margin-top: 4rem;
				    line-height: 40px;
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

			.cartao2 {
			    width: 100%;
			    max-width: 465px;
			    margin: 2rem auto;
			    display: block;
			}
				.cartao2 img {
					width: 100%;
				}
		</style>

    <div class="cartao">
			<div class="logoAtribuna">
				<img src="{{asset('novo/imgs')}}/logo_atribuna.png" alt="Logo Clube do Assinante">
			</div>

			<div class="texto">
				<row><span class="titulo">NOME</span><span class='subtit'>{{$data->nmCliente}}</span></row>
				<row><span class="titulo">CÓDIGO DO ASSINANTE</span><span class='subtit'>{{$data->nuCliente}}</span></row>
				<row><span class="titulo">CÓDIGO RAIA/DROGASIL (UNIVERS)</span><span class='subtit'>{{$nr_rd}}</span></row>
				<row><span class="titulo">REDE DE SAÚDE DR. BENEFÍCIO</span><span class='subtit'>SIM</span></row>
				<row><span class="titulo">Validade</span><span class='subtit'>{{$validade}}</span></row>
			</div>

		</div>

{{--
		<div class="cartao2"><img src="{{asset('novo/imgs')}}/clube_cartao.png" alt="Cartão do Clube do Assinante"></div>
--}}

	</div>
</section>

@endsection
