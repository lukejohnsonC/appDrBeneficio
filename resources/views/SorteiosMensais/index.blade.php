@extends('estrutura.master') 

@section('conteudo')

<section id="funeral">
	<div class="container">
		<h1>Titulo De Capitalização</h1>

		<p>Prêmios Mensais. Você participa todo mês de um sorteio no valor total de R$10 mil reais pela loteria federal.</p>

		<h3>Instruções:</h3>
		
		<ol id="steps">
			<li><p><i class="fas fa-pen-fancy"></i> Ao se tornar um Cliente DR. BENEFÍCIO, todo titular e os adicionais ganham um número de Titulo De Capitalização</p></li>
			<li><p><i class="fas fa-list-ol"></i> Todo mês você fará parte do sorteio pela loteria federal</p></li>
			<li><p><i class="fab fa-angellist"></i> Todo mês você fará parte do sorteio pela Loteria Federal</p></li>
			<li><p><i class="fas fa-check-double"></i> Siga as instruções abaixo para conferir se você é O Grande Vencedor. Boa Sorte!</p></li>
		</ol>

		<p>Cada Cliente (Titular Ou Adicional, desde que elegíveis ao seguro de acidentes pessoais) irá ganhar um número da sorte, individual e composto por 5 números.</p>

		<p>Caso você seja O Grande Ganhador nossa equipe de atendimentos entrará em contato para informá-lo</p>
	        
	    <?php include ("../skeleton/botao-voltar.php"); ?>
	</div>
</section>

@endsection