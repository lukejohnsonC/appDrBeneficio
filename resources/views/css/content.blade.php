section {
	width: 100%;
	display: block;
}
	section#brand {
		height: 120px;
	}
	section #logo {
		width: 80%;
		height: 120px;
		margin: 0 auto;
	}

	section #logo .logo_drben {
			float: left;
			padding-top: 20px;
			padding-bottom: 20px;
			object-fit: contain;
			width:35%;
			height: 80px;
	}

		section #logo .logo_empresa {
		    float: left;
		    padding-top: 20px;
		    padding-bottom: 20px;
		    object-fit: contain;
				width:auto;
		    height: 80px;
		}

	section#brand,
	section#menu {
		float: left;
	}
	section#menu {
		height: auto;
		margin-left: 0;
	}
		nav ul li article {
		    width: 100%;
		    max-width: 780px;
		    margin: 0 auto;
		}
	.container {
		height: auto;
		min-height: 100%;
		width: 80%;
		max-width: 780px;
		margin: 0 auto 2rem;
	}
		section nav	{
			height: 100%;
		}
			section nav ul {
				height: 100%;
			}
				section nav ul a {
					text-decoration: none;
				}
				section nav ul li:hover div {
					background-color: #FFF !important;
				}
				section nav ul li:hover div i {
					color: {{$primary}} !important;
				}
				/* COLORAÇÃO DO MENU */
				section#menu nav ul li {
				    list-style-type: none;
				    height: 95px;
				    color: {{$primary}};
				    padding: 0 10%;
				    border-bottom: 1px solid {{$primary}};
				}
					section#menu nav ul li:hover {
						background: {{$primary}};
						color: #FFF;
					}
					/*section#menu nav ul li i {
						color: {{$primary}};
					}*/
						section#menu nav ul li:hover i {
							color: #FFF;
						}
					section nav ul li i {
					    float: right;
					    line-height: 96px !important;
					}
					section#menu nav ul li:hover > i{
						color: #FFF;
					}
					section#menu nav ul:first-child {
						border-top: 1px solid {{$primary}};
					}
					/* COLORAÇÃO DOS SUB-MENUS */
				section nav ul {
					border-top: 1px solid {{$primary}};
				}
					section nav ul li {
					    list-style-type: none;
					    height: 95px;
					    color: {{$primary}};
					    padding: 0 10%;
					    border-bottom: 1px solid {{$primary}};
					}
					section nav ul li:hover {
						background: {{$primary}};
						color: #FFF;
						transition: ease-in-out 1s;
					}
					li > .fas {
					    color: {{$secondary}};
					    float: right;
					    line-height: 95px;
					}
					li:hover div .fas,
					li:hover div .fab,
					li:hover div .far {
						color: {{$primary}} !important;
					}
						section nav ul li span {
							line-height: 95px;
							text-transform: uppercase;
							font-size: 12px;
						}
						section nav ul li div  {
						    float: left;
						    width: 60px;
						    height: 60px;
						    background-color: {{$primary}};
						    border-radius: 50%;
						    margin: 1rem 10px 0 0;
						}
						div#img-fale_conosco i {
							width: 60px;
							line-height: 95px;
							text-align: center;
							margin: 0 auto;
							font-size: 35px;
						}
					div#img-funeral {
					    background-image: url({{$ASSET_IMGS}}/funeral.png);
    					background-repeat: no-repeat;
    				}
					div#img-odonto {
					    font-family: 'Font Awesome 5 Free';
					    font-weight: 900;
					}
						div#img-odonto:before {
						    content: '\f5c9';
						    font-size: 30px;
						    display: block;
						    text-align: center;
						    line-height: 95px;
						}
						div.img-estrela {
							font-family: 'Font Awesome 5 Free';
							font-weight: 200;
						}
					div.img-estrela::before {
						content: '\f005';
						font-size: 30px;
						display: block;
						text-align: center;
						line-height: 95px;
					}
	section#cartao_virtual,
	section#cartao_farmacia,
	section#vantagens,
	section#consultas,
	section#funeral,
	section#saude,
	section#disk_saude,
	section#odonto {
		width: 100%;
		height: auto;
		float: left;
		display: inline-block;
	}
	/* CARTAO VIRTUAL */
#cartao_virtual {
	padding-bottom:2rem;
}
	#cartao_virtual .hasBg {
		background-image: url('{{$ASSET_IMGS}}/cartao_completo.png');
		background-repeat: no-repeat;
		background-position: center;
		position: relative;
		width: 570px;
		height: 46rem;
		display: block;
		margin: 0 auto;
	}
	#cartao_virtual .hasBene {
		background-image: url('{{$ASSET_IMGS}}/cartao_drbene.png');
	}
	#cartao_virtual #hasBg {
		background-image: url('{{$ASSET_IMGS}}/cartao_versooriginal.png');
		background-repeat: no-repeat;
		background-position: center;
		position: relative;
		width: 570px;
		height: 23rem;
		display: block;
		margin: 0 auto;
	}
		#cartao_virtual .hasBg #card-frente {
		    position: relative;
		    width: 100%;
		    height: auto;
		    text-align: center;
		    top: 18rem;
		}
			#cartao_virtual #card-frente span:first-child {
				font-size: 20px;
			}
			#cartao_virtual #card-frente span:nth-child(2) {
				font-size: 30px;
			}
			#cartao_virtual > img {
				position: relative;
			    top: 5rem;
			    width: 90%;
			    margin: 0 auto;
			    display: block;
			}
			#cartao_virtual p {
				line-height: 1.5rem;
			}
		#cartao_virtual .hasBg .card-verso {
			position: absolute;
		    top: 24rem;
		    width: 530px;
		}
			#cartao_virtual .hasBg .card-verso div {
			    position: absolute;
			    top: -8px;
			    left: 10px;
			    width: 100%;
			    text-transform: uppercase;
			}
				#cartao_virtual .hasBg .card-verso div span {
				    display: block;
				    width: auto;
				    margin-bottom: 10px;
				}
				#cartao_virtual .hasBg .card-verso div span:nth-child(even) {
					float: right;
				}
				#cartao_virtual .hasBg .card-verso div ol {
					width: 70%;
					float: left;
					list-style: decimal;
					padding-left: 17px;
				}
				#cartao_virtual .hasBg .card-verso div ol:after {
				    content: " ";
				    border-right: 1px solid black;
				    position: absolute;
				    right: 130px;
				    top: 70px;
				    height: 130px;
				}
					#cartao_virtual .hasBg .card-verso div ol li {
						margin: 1rem auto;
						text-align: center;
						line-height: 20px;
					}
				#cartao_virtual .hasBg .card-verso div img {
				    width: 20%;
				    position: absolute;
				    right: 0px;
				    top: 5rem;
				}

		#cartao_virtual #hasBg #card-verso {
			width: 100%;
			position: absolute;
			top: 2rem;
			left: 5px;
			text-align: center;
			color: {{$primary}};
		}
			#cartao_virtual #hasBg #card-verso span {
				display: block;
			}
				#cartao_virtual #hasBg #card-verso span a {
					margin: 1rem auto;
					cursor: default;
				}
				#cartao_virtual #hasBg #card-verso img {
					width: 80%;
				}
		#cartao_virtual .hasBg .card-verso div ul {
		    list-style: none;
		}
			#cartao_virtual .hasBg .card-verso div ul li {
			    float: left;
			    width: 50%;
			    height: auto;
			    font-size: 13px;
			    margin-bottom: 10px;
			    text-transform: capitalize;
			}
			.hasBg div label {
				margin: 5px 1.6%;
				float: left;
				text-align: center;
			}
			.hasBg div label.col1 {
				width: 30%;
				height: 36px;
			}
			.hasBg div label.col2 {
				width: 60%;
			}
			.hasBg div label.col3 {
				width: 93%;
				height: 50px;
			}
			.hasBg div label.col3 .col1 {
				text-transform: capitalize;
			}
			.hasBg div label.col3 .col1:before {
				    content: " ";
				    width: 7px;
				    height: 7px;
				    border-radius: 50%;
				    margin-top: 5px;
				    margin-right: 5px;
				    display: block;
				    float: left;
				    background-color: black;
			}
				#cartao_virtual div label span {
					color: #000;
					text-transform: lowercase;
					font-weight: bold;
					font-size: 17px;
				}
					#cartao_virtual div span b {
						text-transform: uppercase;
					}
				#cartao_virtual div label span:first-child {
				    color: {{$primary}};
				    display: block;
				    margin: 8px auto 0.5rem auto;
				    width: 95%;
				}
				#cartao_virtual div label span b {
				    text-transform: uppercase;
				}

		.botao-laranja {
			position: relative;
			z-index: 10;
			background: {{$secondary}};
			color: #FFF;
			margin-top: 1rem;
			padding: 10px;
			border-radius: 10px;
			text-align: center;
			display: block;
		}
	div#complemento div {
		width: 70%;
		margin: 2rem auto;
		padding: 2rem 0;
		color: {{$primary}};
	}
		div#complemento div span {
			display: block;
			line-height: 2rem;
		}
			div#complemento div ul {
				margin-left: 1em;
			}
				div#complemento div ul li {
					line-height: 2rem;
				}
		div#complemento img {
			width: 80%;
			max-width: 600px;
			height: auto;
			margin: 2rem auto;
		}
		form label input[type='submit'],
		form label button,
		section#rede_credenciada #results a {
			background: {{$secondary}};
			color: #FFF;
			padding: 10px 30px;
			border-radius: 20px;
			border: 0;
			cursor: pointer;
			display: inline-block;
		}
		#ori_nutricional label span,
		#ori_nutricional form label input[type='submit'] {
			height: 34px;
		}
	section#rede_credenciada #results,
	.listaFarmacias .farmacia {
	    width: 80%;
	    margin: 1rem auto;
	    text-align: center;
	    background-color: #e1e1e1;
	    padding: 20px;
	}
		section#rede_credenciada #results ul {
			margin-bottom: 2rem;
		}
			section#rede_credenciada #results ul li {
				color: {{$primary}};
				list-style: none;
				margin-bottom: 10px;
			}
	section#agendar {
		color: {{$primary}};
	}
		section#agendar div i {
			font-size: 20px;
			margin-right: 10px;
			font-weight: 600;
		}
	/* CARTÃO FARMACIA / REDE CREDENCIADA */
	#rede_farmacia img,
	#complemento img {
		margin: 0 auto;
		display: block;
		width: 80%;
	}
#animacao{
	position:absolute;
}
	/* CLUBE DE VANTAGENS */
	#vantagens .desconto,
	#funeral button,
	#ori_medica a,
	#ori_nutricional a,
	a.pattern,
	button.pattern {
		display: inline-block;
		width: auto;
		height: auto;
		background: {{$secondary}};
		color: #FFF !important;
		font-size: 15px;
		margin: 1rem auto;
		padding: 5px 20px;
		text-align: center;
		border-radius: 20px;
		border: 0;
		text-transform: lowercase;
		cursor: pointer;
	}
	#modal .option h3 {
		margin-top: 1rem;
	}
	.option,
	.modal {
		position: relative;
		width: 100%;
		margin-top: 2rem;
		margin-bottom: 2rem;
		background: #00000012;
		border: solid 1px #CCC;
		border-radius: 20px;
		overflow: hidden;
		box-shadow: 5px 5px 5px rgba(0,0,0,0.1);
	}
		.modal img {
		    width: 40%;
		    margin: 0 auto;
		    display: block;
		}
	.option a {
		display: block;
	}
		.option img {
			position: relative;
			top: 0;
			width: 100%;
			height: 200px;
			object-fit: cover;
		}
		.option div {
		    position: absolute;
		    top: 0px;
		    width: 100%;
		    text-align: center;
		}
		.option .subTitle{
		    width: 100%;
		    display: block;
		    text-align: center;
		    margin-bottom: 1rem;
		    color: {{$secondary}}ad;
		    text-transform: lowercase;
		}
			.option .percente {
				background: {{$secondary}};
				font-size: 25px;
				color: #FFF;
				font-weight: 100;
				padding: 5px 20px;
				border-bottom-left-radius: 10px;
				border-bottom-right-radius: 10px;
			}
		.option h3,
		.modal h3 {
			color: {{$secondary}};
			text-align: center;
			margin-top: 1rem;
			margin-bottom: 1rem;
			text-transform: uppercase;
			height: 40px;
		}
		.option .texto {
			display: block;
			padding: 0 20px 10px;
			max-width: 100%;
			height: 100px;
			line-height: 26px;
			text-overflow: ellipsis;
			overflow-x: auto;
			color: {{$primary}};
			text-transform: lowercase;
		}
		.option button,
		.modal button {
			margin: 1rem auto;
			width: 120px;
			display: block;
			background: {{$secondary}};
			padding: 10px 20px;
		    border: 0;
		    border-radius: 10px;
		    color: #FFF;
		    font-weight: 100;
		    cursor: pointer;
		}
		.resgateBtn {
		    width: 80%;
		    background-color: #2A74B5;
		    padding: 10px;
		    margin: 2rem auto;
		    display: block;
		    text-align: center;
		    color: white;
		    border-radius: 20px;
		    font-size: 18px;
		}
	/*.DESCONTO (DENTRO DO CLUBE DE VANTAGENS) */
		.desconto span {
			height: 30px;
			line-height: 30px;
		}
		.desconto h2,
		#rede_farmacia h2 {
			color: {{$primary}};
			text-align: center;
		}
		.desconto .container h3 {
			color: {{$primary}};
		}
		.desconto .container p,
		.desconto .container span {
			color: #2A74B5;
		}
		.desconto .container h3 {
			margin-top: 2rem;
			margin-bottom: 1rem;
		}
		.desconto b {
			color: {{$secondary}};
		}
		.desconto ul {
			list-style: none;
		}
			.desconto ul li p:before {
				content: '- ';
			}
		.desconto .container p {
			margin-bottom: 0.7rem;
		}
			.desconto .container p:after {
				content: ";";
			}
				.desconto #descrp p:last-child:after {
					content: ".";
				}
			.desconto a {
				text-align: center;
				font-weight: 100;
				margin-top: 1rem;
				padding: 10px 20px;
				border-radius: 20px;
				border: 0;
				color: #FFF;
				background: {{$secondary}};
				display: block;
			}

	/* FUNERALARIA */

#funeral,
#ori_medica,
#ori_nutricional {
	color: {{$primary}};
}
	#funeral h3 {
		margin: 2rem 0;
	}
	#funeral ol li,
	#funeral ul li {
		margin-bottom: 1rem;
	}
	#funeral .ncircle {
	    width: 20px;
	    height: 20px;
	    display: inline-block;
	    color: #FFF;
	    background: orange;
	    border-radius: 50px;
	    text-align: center;
	    margin: 1rem 10px 1rem 0;
	}
	#funeral ul#servicos li {
    	width: 45%;
	}
	#funeral ul#servicos li:nth-child(odd){
		float: right;
	}
	#funeral ul#servicos li:after {
		content: ";";
	}

	/* DISK SAUDE */

	#disk_saude h1,
	#disk_saude p {
		color: {{$primary}};
	}
	#disk_saude h1 {
		text-align: center;
		margin-bottom: 2rem;
	}

	/* COMO FUNCIONA / VALE -> CHECKUP */

#como-funciona {
	margin-bottom: 2rem;
}
	#como-funciona p,
	#como-funciona b,
	#vale-checkup b,
	#vale-checkup p {
		margin: 2rem 0;
		display: block;
	}
	#como-funciona ul li,
	#como-funciona ol li,
	#vale-checkup ul li {
		margin-top: 2rem;
	}
		#como-funciona ul li,
		#vale-checkup ul li {
			list-style: none;
		}
		#como-funciona ul li:not(:last-child) {
			border-bottom: 1px solid {{$primary}};
		}

	#como-funciona .orange,
	#como-funciona .blue {
		padding: 10px 20px;
		border-radius: 10px;
		border:0;
		color: #FFF;
		text-align: center;
	}

	/* PAGEOK */

	.pageOk {
		text-align: center;
	}
		.pageOk h2 {
		    color: #34a853;
		    font-size: 50px;
		    margin-bottom: 2rem;
		}
		.pageOk span {
			color: #34a853ba;
			font-size: 20px;
			margin-bottom: 2rem;
			display: block;
		}
	.meusCupons {
		display: inline-block;
	}
	.container .errorCupom {
		background-image: url('{{$ASSET_IMGS}}/nerd.png');
		background-repeat: no-repeat;
		background-position: center;
		color: {{$secondary}};
		height: 20rem;
		font-size: 17px;
    	text-align: center;
	}

	/* FINALIZE SUA COMPRA */
.finalizarCompra,
.meusCupons {
	display: inline-block;
	color: {{$primary}};
}
	.border .p-cima {
		display: inline-block;
		width: 100%;
	}
	.text-fundo h3 {
		background-position: left;
		background-repeat: no-repeat;
		width: 100%;
		height: 3rem;
		line-height: 3rem;
		margin: 0 auto 1rem;
		text-align: center;
	}
		.finalizarCompra .f-compra h3 {
			background-image: url('{{$ASSET_IMGS}}/carrinho.png');
		}
		.finalizarCompra .f-pagamento h3 {
			background-image: url('{{$ASSET_IMGS}}/pagamento.png');
		}
		.border {
			border: 1px solid #C4C4C4;
			border-radius: 10px;
			margin-bottom: 2rem;
		}
		.border .p-cima img {
			width: 100px;
			height: 100px;
			float: left;
			border: 1px solid #C4C4C4;
			margin: 0.5rem;
		}
		.border .p-cima > div {
			width: calc(100% - 120px);
			float: right;
		}
		.border .p-cima h2 {
			margin-top: 0.5rem;
			margin-bottom: 1rem;
		}
		.border .p-cima span {
			display: block;
			margin-bottom: 1rem;
		    margin-right: 1rem;
		    text-align: justify;
		}
		.finalizarCompra .p-cima span:last-child{
			color: {{$secondary}};
		}
			.border .p-cima span b {
				display: block;
				font-size: 20px;
			}
		.border .p-baixo {
			background: #AAD2EF;
			border-radius: 8px;
			text-align: center;
			display: inline-block;
			width: 100%;
		}
			.border .p-baixo h3 {
    			padding: 1rem;
			}
			.border .p-baixo span {
				font-size: 15px;
				margin-bottom: 1rem;
				display: block;
			}
			.border .p-baixo select {
				background-color: #FFF;
				border: none;
			}
			.border .p-baixo button {
			    font-size: 20px;
			    width: 80%;
			    padding: 0.5rem;
			}
				.border .p-baixo button b {
					color: {{$primary}};
    				text-transform: uppercase;
				}
	.finalizarCompra form {
		margin: 0;
	}
		.finalizarCompra form label input {
			width: 100%;
			padding: 5px 0;
		}
		.finalizarCompra form label span {
			width: 140px;
		}
		.finalizarCompra form label.b-pagamento {
			width: 100%;
		}
	.finalizarCompra form label.col4 {
		width: 50%
	}
		.finalizarCompra form label.b-pagamento button {
			background: #C4C4C4;
			border-radius: 100px;
		    width: 100% !important;
		    font-size: 20px;
		    text-transform: uppercase;
		}
		.border .p-cima a i {
			padding: 1rem;
		}
	.border .p-baixo .input-copy {
		border-radius: 50px;
		border: 0;
		margin: 0rem 10px 1rem 0;
		padding: 5px 15px;
		width: 55%;
	}
	.meusCupons .border {
		width: 294px;
		margin: 0 auto 1rem;
	}
	.meusCupons .iconsCods {
		display: inline-block;
	    width: 30px;
	    height: 25px;
	}
		.meusCupons .p-baixo i.fa-copy,
		.meusCupons .p-baixo i.fa-window-maximize {
			cursor: pointer;
		}
	.border h4 {
		margin: 1rem auto;
	}
	#information,
	#bigCupom {
		width: 100%;
		height: auto;
		min-height: 100%;
		background-color: rgba(10,23,55,0.8);
	    position: absolute;
	    top: 0;
	    left: 0;
	}
		#bigCupom b {
			font-size: 25px;
			margin-top: 2rem;
			display: block;
		}
		#information > div,
		#bigCupom div {
			width: 80% !important;
			margin: 5rem auto !important;
			padding: 0.5rem 1rem 0 1rem;
			background: #FFF;
			float: none !important;
		}
			#information img,
			#bigCupom img {
				position: relative;
				left: 50%;
				margin: 5rem auto 3rem -40px;
				width: 80px;
				height: auto;
				display: block;
			}
			#information div h3,
			#bigCupom div h3 {
				text-align: center;
				margin-bottom: 1rem;
			}
			#information div p,
			#bigCupom div p {
				margin-bottom: 1rem;
				text-align: center;
				line-height: 2rem;
			}
				#information div p a,
				#information i,
				#bigCupom div p a,
				#bigCupom i {
					color: {{$secondary}};
					cursor: pointer;
					font-size: 20px;
				}
.lds-ellipsis {
  display: block;
  position: relative;
  width: 64px;
  height: 64px;
  margin: 0 auto;
}
.lds-ellipsis div {
  position: absolute;
  top: 27px;
  width: 11px;
  height: 11px;
  border-radius: 50%;
  background: #fff;
  animation-timing-function: cubic-bezier(0, 1, 1, 0);
}
.lds-ellipsis div:nth-child(1) {
  left: 6px;
  animation: lds-ellipsis1 0.6s infinite;
  background: #2A74B5;
}
.lds-ellipsis div:nth-child(2) {
  left: 6px;
  animation: lds-ellipsis2 0.6s infinite;
  background: {{$primary}};
}
.lds-ellipsis div:nth-child(3) {
  left: 26px;
  animation: lds-ellipsis2 0.6s infinite;
  background: #AAD2EF;
}
.lds-ellipsis div:nth-child(4) {
  left: 45px;
  animation: lds-ellipsis3 0.6s infinite;
  background: {{$secondary}};
}
@keyframes lds-ellipsis1 {
  0% {
    transform: scale(0);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes lds-ellipsis3 {
  0% {
    transform: scale(1);
  }
  100% {
    transform: scale(0);
  }
}
@keyframes lds-ellipsis2 {
  0% {
    transform: translate(0, 0);
  }
  100% {
    transform: translate(19px, 0);
  }
}
.loading {
	display: inline-block;
}
	.loading h3 {
		text-align: center;
		color: {{$primary}};
	}
	.loading .container .centralizando {
	    position: absolute;
	    top: 50%;
	    left: 50%;
	    margin-left: -93px;
	}
#ori_funeral {
	margin-bottom: 3rem;
}
	#ori_funeral ul a div {
	    width: 30px;
	    height: 30px;
	    float: left;
	    background-size: cover;
	    margin-right: 5px;
	}
	#lastText a {
		color: {{$secondary}};
	}
	#ori_funeral a:hover span div#img-funeral {
		background-image: url({{$ASSET_IMGS}}/funeral-c.png);
		transition: ease-in-out 0.2s;
	}
	section nav ul li div i.fas,
	section nav ul li div i.fab,
	section nav ul li div i.far {
		text-align: center;
		font-size: 30px;
		line-height: 60px !important;
		margin: 0 auto;
		float: none;
		display: block;
		color: #FFF !important;
	}
.ativeVantagens img {
	width: 340px;
	max-width: 80%;
	margin: 0 auto;
	display: block;
}
.ativeVantagens span {
	display: block;
	text-align: center;
}
.ativeVantagens #vidalink {
	border: #2A74B5 solid 1px;
	padding: 5px 15px;
}
.ativeVantagens #queroUtilizar {
	font-size: 30px;
    color: #FFF;
    background: {{$primary}};
    padding: 10px 20px;
    border-radius: 10px;
    margin: 0 auto;
    display: block;
    width: 200px;
}
.info span {
	display: inline-block;
	margin: 10px 0;
}
#verMais {
	display: inline-block;
	width: 100%;
}
	#verMais button {
		margin: 0 auto;
		display: block;
		padding: 10px 40px;
		text-transform: uppercase;
	}

/* COUNTDOWN */

#countdown{
	width: 432px;
	height: 112px;
	text-align: center;
	margin: auto;
	padding: 24px 0;
	position: absolute;
  	top: 240px; bottom: 0; left: 0; right: 0;
}

#countdown #tiles{
	position: relative;
	z-index: 1;
}

#countdown #tiles > span {
	width: 92px;
	max-width: 92px;
	font: bold 48px 'Droid Sans', Arial, sans-serif;
	text-align: center;
	color: #111;
	background-color: #ddd;
	background-image: -webkit-linear-gradient(top, #bbb, #eee);
	background-image:    -moz-linear-gradient(top, #bbb, #eee);
	background-image:     -ms-linear-gradient(top, #bbb, #eee);
	background-image:      -o-linear-gradient(top, #bbb, #eee);
	border-top: 1px solid #fff;
	border-radius: 3px;
	box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.7);
	margin: 0 7px;
	padding: 18px 0;
	display: block;
	position: relative;
	float: left;
}
#countdown .labels{
	width: 100%;
	height: 25px;
	text-align: center;
	position: absolute;
	bottom: 8px;
}

#countdown .labels li{
	width: 102px;
	color: #f47321;
	text-align: center;
	text-transform: uppercase;
	display: inline-block;
}

.botao_area_do_gestor {
	background-color: {{$primary}};
	padding: 10px;
	margin-top: 40px;
	display: inline-table;
	width: auto;
	color:white;
	float: right;
	border-radius : 5px;
	text-transform: lowercase;
}
.barra_superior_personalizada div {
	background: {{$primary}} !important;
}
#imgBeneficio {
	display: block;
	width: 100%;
	max-width: 280px;
	height: auto;
	margin: 0 auto 2rem;
	border: 1px solid {{$primary}};
	border-radius: 20px;
}
.busca {
	margin: 1rem auto;
    width: 120px;
    display: block;
    padding: 10px 20px;
    border: 0;
    border-radius: 10px;
    color: #FFF;
    font-weight: 100;
    cursor: pointer;
    background: {{$primary}};
}
.pesquisa {
	border-radius: 20px;
    padding: 10px 15px;
	border: 1px solid {{$primary}};
}
.mostrar {
	color: {{$primary}};
}