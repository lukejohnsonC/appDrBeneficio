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
				<span>Nome: Nome do Fulano por Completo Aqui</span>
				<span>Código do Assinante: 1234566789</span>
			</div>
		</div>
	</div>
</section>
