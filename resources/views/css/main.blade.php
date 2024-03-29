#turnoff {
	display: none;
}
html,body,h2,* {
	margin: 0;
	padding: 0;
	font-family: 'Gotham Rounded';
}
html,body {
	width: 100%;
	height: 100%;
	min-height: 100%;
	overflow-x: hidden;
}
a{
	text-decoration: none;
	color: {{$secondary}};
}
h1 {
	margin-bottom: 2rem;
	color: {{$primary}};
}
h3 {
	color: {{$primary}};
}
p {
	margin: 2rem 0;
	color: {{$primary}};
	text-align: justify;
}
.dark-blue {
	background: {{$primary}};
}
.light-blue {
	background: #AAD2EF;
}
.blue {
	background: #2A74B5;
}
.green {
	background: #7f6b4c;
}
.orange {
	background: {{$secondary}};
}
.gray {
	background: #554A39;
}
.purple {
	background: #9E39BF;
}
.fRight {
	float: right;
}
.fLeft {
	float: left;
}
section::after {
	clear: both;
}
.posFooter {
	min-height: calc(100vh - 160px) !important;
}
.footer {
	height: 50px;
}
#erro {
	background: #FA3E3E;
	color: #FFF;
	width: 100%;
	height: 2rem;
	text-align: center;
    line-height: 2rem;
    display: inline-block;
    margin-bottom: 2rem;
    padding: 5px 0;
}
#fundo-galera {
	background-image: url('{{$ASSET_IMGS}}/galera.png');
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
	opacity: 0.4;
	position: absolute;
	z-index: -1;
	width: 100%;
	height: 100%;
	top:0;
}
/* FORMULÁRIO */
form {
	width: 100%;
	margin: 2rem auto;
	text-align: center;
	color: {{$primary}};
	display: inline-block;
}
	form label {
		display: block;
		margin-bottom: 2rem;
		float: left;
	}
	form .col1 {
		width: 100%;
	}
	form .col2 {
		width: 45%;
		margin-right: 5%;
	}
		form .col2 input {
			width: 85%;
		}
		form label span {
			width: auto;
			display: block;
			margin: 0 auto 1rem auto;
			text-align: center;
		}
		form label input,
		select,
		textarea {
			text-align: center;
			border-radius: 20px;
			border:1px solid #2A74B5;
			text-transform: capitalize;
		}
		form label input {
			width: 25%;
			height: 1.5rem;
			padding: 5px 15px;
		}
			form label input[type='file'] {
				width: 70%;
			}
		select {
			width: 80%;
			height: 2.5rem;
			padding: 0 20px;
			-webkit-appearance: none;
			-moz-appearance:    none;
			appearance:         none;
		    background: url({{$ASSET_IMGS}}/angle-down-solid.svg) no-repeat;
		    background-position: 90%;
		    background-size: 15px;
		}
		textarea {
			width: 80%;
			padding: 5px 10px;
			text-transform: none;
		}
	#brand #button-menu,
	#brand #turnoff,
	#brand #button-voltar {
		float: right;
		width: 65px;
	    height: 80px;
	    text-align: center;
	    line-height: 120px;
	}
		#brand #button-menu i,
		#brand #turnoff,
		#brand #button-voltar i {
			font-size: 30px;
			color: {{$primary}};
			height: 120px;
			line-height: 120px;
		}
		#brand a#voltar {
			float: right;
		    width: 85px;
		    height: auto;
		    text-align: center;
		    background: {{$primary}};
		    margin-top: 45px;
		    color: #FFF;
		    padding: 5px;
		    border-radius: 5px;
		}
.dNone {
	display: none !important;
}
.dBlock {
	display: block;
}
#top-bar {
	width: 100%;
	height: 0.7rem;
}
	#top-bar div {
		width: 20%;
		height: 100%;
		float: left;
		display: block;
	}
#login {
	padding-bottom: 2rem;
	height: auto;
}
	#login #logo {
		width: 80%;
		height: 7rem;
	}
		#login img {
			max-width: 400px;
			width: 60%;
			height: auto;
			margin: 2rem auto;
    		display: block;
		}
	#login h1,
	#login h3 {
		text-align: center;
		margin-bottom: 0rem;
	}
	#login div#form {
		width: 80%;
		height: auto;
		display: block;
		margin: 0 auto;
	}
		#login div label {
			width: 100%;
			height: 4rem;
			display: block;
			text-align: center;
			margin-bottom: 1.7rem;
		}
			#login div label span {
				display: block;
				color: {{$primary}};
				font-weight: bold;
				margin-bottom: 7px;
				text-transform: uppercase;
			}
			#login div label input {
				color: #FFF;
				width: 95%;
				height: 1.7rem;
				text-align: center;
				text-transform: lowercase;
				background: #C4C4C4;
				border-radius: 20px;
				padding: 5px 17px;
				border: 0;
				-webkit-appearance: none;
				-moz-appearance: textfield;
			}
			input[type=number]::-webkit-inner-spin-button,
			input[type=number]::-webkit-outer-spin-button {
			  -webkit-appearance: none;
			  margin: 0;
			}
			#login div label button {
				background: {{$secondary}};
				color: #FFF;
				font-size: 17px;
				display: block;
				text-transform: lowercase;
				text-align: center;
				width: 100%;
				border: 0;
				border-radius: 20px;
				margin: 2rem auto 0 auto;
			}
			#login div label a {
				margin-top: 2rem;
				margin-bottom: 2rem;
				color: {{$secondary}};
				text-decoration: none;
				font-weight: bold;
				display: block;
			}
	/* CENTRAL DE AJUDA */
#central {
	padding-bottom: 2rem;
}
	#central h1,
	#rede_farmacia h1 {
		text-align: center;
	}
	#central .container > span {
		color: #2A74B5;
		margin: 2rem 0;
	}
	#central span {
		color: {{$primary}};
		margin-bottom: 2rem;
		display: block;
		line-height: 40px;
	}
	#central ul {
		color: #7f6b4c;
		margin-top: 2rem;
		list-style: none;
	}
	ol {
		list-style: none;
	}
		#central ul li {
			margin-bottom: 1rem;
			margin-left: 20px;
		}
			#central ul li p:after {
				content: ";";
			}
			#central ul li:last-child p:after {
				content: ".";
			}
		#central ul a:hover li span {
			color: {{$secondary}};
			transition: ease-in-out 0.2s;
		}
		#central ul a:hover li span i {
			color: {{$secondary}};
			transition: ease-in-out 0.2s;
		}
		#central ul:nth-child(2) li span {
			height: 30px;
			line-height: 30px;
		}
		#central ul li span i {
			font-size: 30px;
			margin-right: 10px;
			line-height: 30px;
			font-weight: 600;
		}
		#central #contacts {
			list-style: none;
		}
	#division {
		overflow: hidden;
		margin-top: 5em;
		text-align: center;
		color: {{$primary}};
	}
	#division span {
		display: inline-block;
	    position: relative;
	}
		#division span:before,
		#division span:after {
		    background: {{$secondary}};
		    content: "";
		    height: 1px;
		    position: absolute;
		    top: 50%;
		    width: 9999px;
		}
		#division span:before {
			margin-left: 15px;
			left: 100%;
		}
		#division span:after {
			margin-right: 15px;
			right: 100%;
		}

#cards {
	margin-top: 2rem;
	height: auto;
	display: inline-block;
}
	#cards img {
		width: 100%;
	}
	#cards > h1 {
		text-align: center;
	}
	#cards a {
		text-decoration: none;
		display: block;
		float: left;
		width: 30%;
		height: auto;
		margin-right: 3.33%;
	}
	#cards .plano {
		float: left;
		width: 30%;
		margin-right: 3.33%;
		color: #FFF;
		height: 12rem;
		border-radius: 20px;
		border: 0;
		text-align: center;
	}
	#cards .familiar {
		background: {{$secondary}};
	}
	#cards .pme {
		background: #2A74B5;
	}
	#cards .empresarial {
		background: {{$primary}};
	}
		#cards .plano span {
			display: block;
			font-size: 20px;
			height: 7rem;
		}
			#cards .plano b {
				display: block;
				margin: 20px 0;
				font-size: 23px;
			}
				#cards a:nth-child(3) .plano b,
				#cards a:nth-child(2) .plano b {
					color: {{$primary}};
				}
			#cards .plano .card-text {
				font-size: 16px;
				padding: 0 5px;
			}
		#cards .plano button {
			color: {{$primary}};
			background: #FFF;
			width: 80%;
			margin-top: 1rem;
			padding: 10px 10px;
			text-transform: uppercase;
			border-radius: 20px;
			border:0;
			cursor: pointer;
			font-weight: bold;
		}
			#cards .plano button:hover {
				background: {{$primary}};
				color: #FFF;
    			border: 1px solid #FFF;
				transition: ease-in-out 0.2s;
			}
	#rede_sociais {
		background: #2A74B5;
		padding: 1rem 0;
	}
	footer {
		background: {{$secondary}};
		padding: 1rem 0;
	}
		footer span {
			color: #FFF;
			line-height: 1.7rem;
			text-align: center;
			margin: 0 auto;
			display: block;
		}
/* ESQUEMATIZAÇÃO DE CORES
			placeholder="000.000.000-00"

{{$primary}} - azul escuro

#AAD2EF - azul claro

#2A74B5 - azul

#564B3A - verde

{{$secondary}} - laranja

*/
