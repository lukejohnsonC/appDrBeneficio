<section id="funeral" class=''>
	<div class="container">
		<style>
			.cartao {
			    max-width: 550px;
			    width: 100%;
				height: 330px;
				margin: 0 auto;
				background-image: url("{{asset('novo/imgs')}}/cartaoAtribuna.jpg");
				background-size: contain;
				background-repeat: no-repeat;
				position: relative;
			}
				#info {
				    position: absolute;
				    width: 80%;
				    top: 25%;
				    left: 5%;
				    color: white;
				}

			@media (min-width: 460px) {
				#info {
					top: 35%;
				}
			}
			@media (min-width: 600px) {
				#info {
					top: 50%;
				}
			}
		</style>

		<div class="cartao">
			<div id="info">
				<span>Nome: {{$data->nmCliente}}</span>
				<span>Código do Assinante: {{$data->nuCliente}}</span>
				<span>Validade: {{$validade}}</span>
			</div>
		</div>
	</div>
</section>
