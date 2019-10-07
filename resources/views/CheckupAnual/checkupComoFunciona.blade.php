@extends('estrutura.master') 

@section('conteudo')
<section id="como-funciona">
        <div class="container">
            <p>Todo cliente Dr. Benefício tem direito a 1 vale check-up para saber como anda sua saúde e ter a chance de se prevenir de muitas doenças ao invés de tratá-las</p>
            <p>É muito simples! Basta se dirigir a qualquer uma das unidades participantes da rede de laboratórios Celullar Mater e realizar seus exames.</p>
    
            <b>Unidades participantes:</b>
            <ul>
                <li>
                    Santos<br>
                    <a href="https://www.google.com/search?q=Av.+Bernadino+de+Campos%2C+50%2C+Canal+2&oq=Av.+Bernadino+de+Campos%2C+50%2C+Canal+2&aqs=chrome..69i57j33.820j0j7&sourceid=chrome&ie=UTF-8">Av. Bernardino de Campos, 50, Canal 2.</a><br>
                    <a href="https://www.google.com/search?ei=KkFEXd2qKPLF5OUPkfyO2A8&q=R.+Carvalho+de+Mendon%C3%A7a%2C+247+Cj.61.&oq=R.+Carvalho+de+Mendon%C3%A7a%2C+247+Cj.61.&gs_l=psy-ab.3..0i22i30l2.51684.51684..52666...0.0..0.138.138.0j1......0....2j1..gws-wiz.A5R2vmYJcwY&ved=0ahUKEwjd5_Taq-TjAhXyIrkGHRG-A_sQ4dUDCAo&uact=5">R. Carvalho de Mendonça, 247 Cj.61.</a>
                </li>
                <li>
                    São Vicente<br>
                    <a href="https://www.google.com/search?q=Rua+Jacob+Emerick,+799.&sa=X&ved=0ahUKEwjU37qOrOTjAhVAHbkGHTcABCIQ7xYILCgA&biw=1366&bih=657">Rua Jacob Emerick, 799.</a>
                </li>
                <li>
                    Praia Grande<br>
                    <a href="https://www.google.com/search?q=Avenidade+Costa+e+Silva%2C+1068.&oq=Avenidade+Costa+e+Silva%2C+1068.&aqs=chrome..69i57j0l5.335j0j9&sourceid=chrome&ie=UTF-8">Avenidade Costa e Silva, 1068.</a>
                </li>
                <li>
                    Cubatão<br>
                    <a href="https://www.google.com/search?ei=tEFEXdzaFOW95OUPtLGDwA0&q=Rua+Pedro+de+Toledo%2C+42.&oq=Rua+Pedro+de+Toledo%2C+42.&gs_l=psy-ab.3..38l4j0i22i30l3j38.16159.16159..16688...0.0..0.154.154.0j1......0....2j1..gws-wiz.Id-ftTsKuVk&ved=0ahUKEwjchMicrOTjAhXlHrkGHbTYANgQ4dUDCAo&uact=5">Rua Pedro de Toledo, 42.</a>
                </li>
            </ul>
    
            <b>Horário de atendimento:</b>
            <p>Segunda à sexta das 7h às 18h<br>
                Sábado das 7h às 12h<br>
                (Confira mais abaixo as regras e horários para realização de coleta)
            </p>
            <p>Resultado: 48 horas após o exame (através do site ou no local do exame)</p>
            <p>Mas antes, leia com atenção as instruções abaixo. Se tiver dúvidas, é só entrar em contato com a nossa central de atendimento que iremos ajudar!</p>
    
            <b id="diagnosticos">O que os exames podem diagnosticar?</b>
    
            <ol>
                <li><p>Hemograma: avalia as células sanguíneas do paciente, podendo diagnosticar: anemia, leucemia, infecções gerais, entre outros.</p></li>
                <li><p>Glicemia: exame que mede o açúcar no sangue, podendo diagnosticar: nível de glicemia, diabetes e pré-diabetes, entre outros.</p></li>
                <li><p>Urina I: exame que pode diagnosticar problemas no sistema renal e urinário, como: infecções, sangramentos e cálculo renal, entre outros.</p></li>
                <li><p>Parasitológico de fezes: avalia as funções digestivas, quantidade de gordura nas fezes ou ovos de parasitas, entre outros.</p></li>
                <li><p>Colesterol: exame que mede as taxas de gordura na corrente sanguínea, podendo diagnosticar doenças cardiovasculares, entre outras.</p></li>
            </ol>
    
            <b class='orange'>COMO FUNCIONA O CHECK-UP</b>
            <ol>
                <li><p>Escolha uma das unidade onde deseja realizar o Check-up.</p></li>
                <li><p>Compareça em qualquer unidade Cellular Mater no período da manhã entre 7h e 12h, cumprindo as Instruções de Preparo abaixo.</p></li>
                <li><p>Apresente seu voucher (entregue com seu kit do usuário) na recepção da clínica, junto com o seu cartão Dr. Benefício e documento de identificação com foto.</p></li>
                <li><p>Siga as instruções do profissional para a realização do exame.</p></li>
                <li><p>Confira o resultado após 48 horas, através do site <a href="https://cellulamater.com.br/" target='_blank'>cellulamater.com.br</a> ou no local do exame</p></li>
            </ol>
    
            <b class='blue'>INSTRUÇÕES DE PREPARO</b>
            <ol>
                <li><p>Para a coleta de sangue (presencial em uma das unidades Cellula Mater): Jejum obrigatório de 12 horas, com exceção de água e abstinência de álcool de 72 horas antes do exame.</p></li>
                <li><p>Para a coleta de urina e fezes: Retire gratuitamente os coletores (2 unidades) de Fezes e Urina no laboratório ou adquira um coletor universal para cada exame (em qualquer farmácia)</p></li>
                <li><p>Para a coleta da urina: utilizar a 1ª urina da manhã. Higienizar as mãos e genitália, despreze o primeiro jato e colete o jato médio em frasco próprio (mulheres - não é indicado o uso de absorvente interno para coleta de urina no período menstrual).</p></li>
                <li><p>Para a coleta de fezes: um pouco antes de fezes com uma pazinha (que vem junto do pote) e colocá-la dentro do frasco; Escrever o nome completo no frasco e guardar na geladeira por até 24 horas antes de ser levado para o laboratório.</p></li>
            </ol>
            
            <a href="javascript:history.back()" class='pattern'><span><i class="fas fa-undo-alt"></i> voltar ao menu principal</span></a>
        </div>
    </section>

@endsection