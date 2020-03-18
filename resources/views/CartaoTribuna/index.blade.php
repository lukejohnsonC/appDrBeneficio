@extends('estrutura.master')

@section('conteudo')


<section id="funeral" class=''>
	<div class="container">
		<style>
			.cartao {
			    max-width: 465px;
			    width: 100%;
				height: 275px;
				margin: 0 auto;
				background-image: url("{{asset('novo/imgs')}}/cartaoAtribuna.jpg");
				background-size: contain;
				background-repeat: no-repeat;
				position: relative;
			}
			.cartao.verso {
				background-image: url("{{asset('novo/imgs')}}/cartaoAtribunaVerso.jpg");
			}
				.cartao .imagensLogo row {
				    margin-top: 37%;
				    margin-left: 10%;
				    width: 80%;
				    display: inline-block;
				}
					.cartao .imagensLogo img {
					    max-width: 170px;
					    float: left;
					    width: 46%;
					}
					.cartao .imagensLogo img.fRight {
						float: right;
					}
				.cartao .texto {
				    width: 80%;
				    height: 155px;
				    text-transform: uppercase;
				    line-height: 30px;
				    font-size: 14px;
				    color: #FFF;
				    position: absolute;
				    top: 2.5rem;
				    left: 35px;
				}
					.cartao .texto row {
						display: inline-block;
					}
						.cartao .texto row .titulo {
						    display: inline-block;
						    margin-right: 5px;
						}
						.cartao .texto row .subtit {
							padding: 5px;
							margin-left: 2px;
							border-left: 1px solid #FFF;
						}

			@media only screen and (max-width: 425px) {
				.cartao {
					height: 185px;
				}
					.cartao .texto {
					    width: 80%;
					    height: 100px;
					    text-transform: uppercase;
					    line-height: 20px;
					    font-size: 10px;
					    color: #FFF;
					    position: absolute;
					    top: 1rem;
					    left: 22px;
					}
			}
		</style>

		<div class="cartao">
			<div class="imagensLogo">
				<row>
					<img src="{{asset('novo/imgs')}}/logoDrBranco.png" alt="" class='fRight'>
				</row>
			</div>
		</div>

	    <div class="cartao verso">
			<div class="texto">
				<row><span class="titulo">NOME</span><span class='subtit'>{{$data->nmCliente}}</span></row>
				<row><span class="titulo">CÓDIGO DO ASSINANTE</span><span class='subtit'>{{$data->nuCliente}}</span></row>
				<row><span class="titulo">REDE DE SAÚDE DR. BENEFÍCIO</span><span class='subtit'>SIM</span></row>
				<row><span class="titulo">Validade</span><span class='subtit'>{{$validade}}</span></row>
				<row style='
				    color: #2AA4D5;
				    position: absolute;
				    bottom: -27px;
				    width: 100%;
				    left: 0px;'>
				    <span class="titulo">CÓDIGO RAIA/DROGASIL</span><span class='subtit'>{{$nr_rd}}</span>
				</row>
				<row style='width: 100%;
				    position: absolute;
				    left: 0;
				    bottom: -40px;'>
				    <img src="{{asset('novo/imgs')}}/parceiros.png" style='
				    display: block;
				    margin: 0 auto;
				    width: 60%;'>
				</row>
			</div>
		</div>

	</div>
</section>

@endsection
