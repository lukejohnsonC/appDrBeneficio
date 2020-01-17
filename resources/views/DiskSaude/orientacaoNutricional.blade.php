@extends('estrutura.master') 

@section('conteudo')

<section id="ori_nutricional">
        <div class="container">
        	<h1>Orientação Nutricional</h1>
            <p>Para agendar uma Orientação Nutricional, por favor preencha o formulário a baixo com o que se pede (todos os campos são obrigatórios) e aguarde nosso retorno.</p>
    
    		<form action="http://email.drbeneficio.com.br/orientacaoNutricional.php" method='POST'>
                <label class="col2">
                    <span>Nome</span>
                    <input required type="text" placeholder="Nome completo" name='nome'>
                </label>
                <label class="col2">
                    <span>CPF</span>
                    <input required type="text" maxlength="11" class="form-control cpf-mask" name='cpf' placeholder="000.000.000-00" autocomplete="off">
                </label>
    			<label class="col2">
    				<span>Celular (com DDD)</span>
    				<input required type="text" maxlength="11" class="form-control" name='celular' placeholder="(00) 0000-0000" autocomplete="off">
    			</label>
    			<label class="col2">
    				<span>Profissão</span>
    				<input required type="text" placeholder="Área de atuação" name='profissao'>
    			</label>
    			<label class="col2">
    				<span>Altura</span>
    				<input required type="text" placeholder="Qual a sua altura?" name='altura'>
    			</label>
    			<label class="col2">
    				<span>Peso</span>
    				<input required type="text" placeholder="Quanto você pesa?" name='peso'>
    			</label>
    			<label class="col2">
    				<span>Atividade física</span>
    				<input type="radio" name='aFisica' value='sim'><span>sim</span>
    				<input type="radio" name='aFisica' value='nao'><span>não</span>
    			</label>
    			<label class="col2">
    				<span>Fumante</span>
    				<input type="radio" name='fumante' value='sim'><span>sim</span>
    				<input type="radio" name='fumante' value='nao'><span>não</span>
    			</label>
    			<label class="col1">
    				<!-- DENTRO DO HÓRARIO COMERCIAL -->
    				<span>Melhor hórario para contato telefônico (horário comercial)</span>
    				<input type="time" name="data">
    			</label>
    			<label class="col1">
    				<span>Demanda</span>
    				<textarea rows='5' name='motivo' required placeholder="Quais são as suas necessidades e para o que você deseja o atendimento ao nutricionista?"></textarea>
    			</label>
                <label class="col1">
                    <input type="submit">
                </label>
    		</form>
              
              <a href="javascript:history.back()" class='pattern'><span><i class="fas fa-undo-alt"></i> voltar ao menu principal</span></a>
        </div>
      </section>
@endsection