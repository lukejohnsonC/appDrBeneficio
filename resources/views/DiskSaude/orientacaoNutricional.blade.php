@extends('estrutura.master') 

@section('conteudo')
<section id="ori_nutricional">
        <div class="container">
        	<h1>Orientação Nutricional</h1>
            <p>Para agendar uma Orientação Nutricional, por favor preencha o formulário a baixo com o que se pede (todos os campos são obrigatórios)</p>
    
    		<form action="" method='POST'>
    			<!-- INCLUINDO NOME E CPF IDADE -->
    			<label class="col1">
    				<span>Celular</span>
    				<input required type="text" maxlength="14" class="form-control cpf-mask" name='celular' placeholder="(00)00000.0000" autocomplete="off">
    			</label>
    			<label class="col1">
    				<span>Profissão</span>
    				<input required type="text" placeholder="Área de atuação">
    			</label>
    			<label class="col1">
    				<span>Altura</span>
    				<input required type="text" placeholder="Qual a sua altura?">
    			</label>
    			<label class="col1">
    				<span>Peso</span>
    				<input required type="text" placeholder="Quanto você pesa?">
    			</label>
    			<label class="col2">
    				<span>Atividade física</span>
    				<input type="radio" name='aFisica' checked><span>sim</span>
    				<input type="radio" name='aFisica'><span>não</span>
    			</label>
    			<label class="col2">
    				<span>Fumante</span>
    				<input type="radio" name='fumante' checked><span>sim</span>
    				<input type="radio" name='fumante'><span>não</span>
    			</label>
    			<label class="col1">
    				<!-- DENTRO DO HÓRARIO COMERCIAL -->
    				<span>Melhor hórario para contato telefônico</span>
    				<input type="time" name="data">
    			</label>
    			<label class="col1">
    				<span>Demanda</span>
    				<textarea rows='5' required placeholder="Quais são as suas necessidades e para o que você deseja o atendimento ao nutricionista?"></textarea>
    			</label>
    		</form>
              
              <a href="javascript:history.back()" class='pattern'><span><i class="fas fa-undo-alt"></i> voltar ao menu principal</span></a>
        </div>
      </section>
@endsection