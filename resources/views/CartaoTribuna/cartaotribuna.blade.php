<section id="funeral" class=''>
	<div class="container">
		<style>
			.cartao {
			    max-width: 550px;
			    width: 100%;
				height: 356px;
				margin: 0 auto;
				background-image: url("{{asset('novo/imgs')}}/cartaoAtribuna.jpg");
				background-size: contain;
				background-repeat: no-repeat;
				position: relative;
			}
				#info {
				    position: absolute;
				    width: 80%;
				    top: 24%;
				    left: 5%;
				    color: white;
				    text-transform: capitalize;
				    font-size: 14px;
				}
					#info span {
						display: block;
    					margin-bottom: 0.5rem;
					}

			@media (min-width: 460px) {
				#info {
					top: 35%;
					font-size: 100% !important;
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
				<span>Rede de saúde Dr. Benefício: SIM</span>
				<span>Validade: {{$validade}}</span>
			</div>
		</div>
	</div>
</section>
