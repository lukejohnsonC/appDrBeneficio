@extends('estrutura.master') 

@section('conteudo')
<section id="como-funciona">
        <div class="container">
            <h1>Como Funciona o Checkup?</h1>
            <p>Todo cliente Dr. Benefício tem direito a 1 vale check-up anual para saber como anda sua saúde. Prevenção em primeiro lugar!</p>
            <p>É muito simples! Basta se dirigir a qualquer uma das unidades participantes da rede de laboratórios Cellula Mater e realizar seus exames.</p>
    
            <h3>Unidades participantes:</h3>
            <ul>
                <li>
                    Santos<br>
                    <a target='_blank' href="https://www.google.com/search?q=Av.+Bernadino+de+Campos%2C+50%2C+Canal+2&oq=Av.+Bernadino+de+Campos%2C+50%2C+Canal+2&aqs=chrome..69i57j33.820j0j7&sourceid=chrome&ie=UTF-8">Av. Bernardino de Campos, 50/52, Canal 2.</a><br>
                    Telefone: <a href="1332252586" class='pattern'>(13) 3225.2586</a><br>
                </li>
                <li>
                    <a target='_blank' href="https://www.google.com/search?ei=KkFEXd2qKPLF5OUPkfyO2A8&q=R.+Carvalho+de+Mendon%C3%A7a%2C+247+Cj.61.&oq=R.+Carvalho+de+Mendon%C3%A7a%2C+247+Cj.61.&gs_l=psy-ab.3..0i22i30l2.51684.51684..52666...0.0..0.138.138.0j1......0....2j1..gws-wiz.A5R2vmYJcwY&ved=0ahUKEwjd5_Taq-TjAhXyIrkGHRG-A_sQ4dUDCAo&uact=5">R. Carvalho de Mendonça, 247 Cj.61.</a><br>
                    Telefone: <a href="1332234422" class='pattern'>(13) 3223.4422</a>
                </li>
                <li>
                    São Vicente<br>
                    <a target='_blank' href="https://www.google.com/maps/place/Rua+Visconde+de+Tamandar%C3%A9,+499+-+Centro,+S%C3%A3o+Vicente+-+SP,+11310-440/@-23.9639952,-46.3912491,15z/data=!4m5!3m4!1s0x94ce1c9ade929ed5:0x46d309f32bfa037d!8m2!3d-23.9650699!4d-46.3902566">R. Visconde de Tamandaré, 499.</a><br>
                    Telefone: <a href="1334678862" class='pattern'>(13) 3467.8862</a>
                </li>
                <li>
                    Praia Grande<br>
                    <a target='_blank' href="https://www.google.com/search?q=Avenidade+Costa+e+Silva%2C+1068.&oq=Avenidade+Costa+e+Silva%2C+1068.&aqs=chrome..69i57j0l5.335j0j9&sourceid=chrome&ie=UTF-8">Av. Costa e Silva, 1068.</a><br>
                    Telefone: <a href="1333568781" class='pattern'>(13) 3356.8781</a>
                </li>
                <li>
                    Cubatão<br>
                    <a target='_blank' href="https://www.google.com/maps/place/Av.+Joaquim+Miguel+Couto,+1037+-+Vila+Couto,+Cubat%C3%A3o+-+SP,+11510-010/@-23.8854895,-46.428426,17z/data=!3m1!4b1!4m5!3m4!1s0x94ce10a4c772d813:0xb6d8fcd47e6d7ec5!8m2!3d-23.8854895!4d-46.4262373">R. Joaquim Miguel Couto, 1037.</a><br>
                    Telefone: <a href="1333611016" class='pattern'>(13) 3361.1016</a>
                </li>
            </ul>
    
            <p>Leia com atenção e confira abaixo: os horários de atendimento, o que os exames podem diagnosticar, como utilizar o voucher e as instruções para realização da coleta. Em caso de dúvidas, entre em contato com a nossa central de atendimento <a href="tel:01332261111" class="pattern">(13) 3226.1111</a> (ou clique no botão laranja para ligar).</p>

            <h3>Horário de atendimento:</h3>
            <p>
                Segunda a sexta das 7h às 18h<br>
                Sábado das 7h às 12h<br>
            </p>
    
            <h3 id="diagnosticos">O que os exames podem diagnosticar?</h3>
    
            <ol>
                <li><p>Hemograma: avalia as células sanguíneas do paciente, podendo diagnosticar: anemia, leucemia, infecções gerais, entre outros.</p></li>
                <li><p>Glicemia: exame que mede o açúcar no sangue, podendo diagnosticar: nível de glicemia, diabetes e pré-diabetes, entre outros.</p></li>
                <li><p>Urina I: exame que pode diagnosticar problemas no sistema renal e urinário, como: infecções, sangramentos e cálculo renal, entre outros.</p></li>
                <li><p>Parasitológico de fezes: avalia as funções digestivas, quantidade de gordura nas fezes ou ovos de parasitas, entre outros.</p></li>
                <li><p>Colesterol (COL, HDL, LDL, VLDL): exame que mede as taxas de gordura na corrente sanguínea, podendo diagnosticar doenças cardiovasculares, entre outras.</p></li>
            </ol>
    
            <h3 class='orange'>COMO FUNCIONA O CHECK-UP</h3>
            <ol>
                <li><p>Escolha uma das unidade onde deseja realizar o Check-up.</p></li>
                <li><p>Compareça em qualquer unidade Cellula Mater nos horários de atendimento, cumprindo as Instruções de preparo abaixo.</p></li>
                <li><p>Apresente seu voucher (entregue com seu kit do usuário) na recepção da clínica, junto com o seu cartão Dr. Benefício e documento de identificação com foto.</p></li>
                <li><p>Siga as instruções do profissional para a realização do exame.</p></li>
                <li><p>Confira o resultado após 48 horas, através do site <a href="https://cellulamater.com.br/" target='_blank'>cellulamater.com.br</a> ou no local do exame</p></li>
            </ol>
    
            <b class='blue'>INSTRUÇÕES DE PREPARO</b>
            <ol>
                <li><p>Para a coleta de sangue (presencial em uma das unidades Cellula Mater): Jejum obrigatório de 12 horas, com exceção de água e abstinência de álcool de 72 horas antes do exame.</p></li>
                <li><p>Para a coleta de urina e fezes: Retire gratuitamente os coletores (2 unidades) de Fezes e Urina no laboratório ou adquira um coletor universal para cada exame (em qualquer farmácia)</p></li>
                <li><p>Para a coleta da urina: utilizar a 1ª urina da manhã. Higienizar as mãos e genitália, despreze o primeiro jato e colete o jato médio em frasco próprio (mulheres - não é indicado o uso de absorvente interno para coleta de urina no período menstrual).</p></li>
                <li><p>Para a coleta de fezes: coletar um pouco de fezes com uma pazinha (que vem junto do pote) e colocá-la dentro do frasco; Escrever o nome completo no frasco e guardar na geladeira por até 24 horas antes de ser levado para o laboratório.</p></li>
            </ol>
            
            <a href="javascript:history.back()" class='pattern'><span><i class="fas fa-undo-alt"></i> voltar ao menu principal</span></a>
        </div>
    </section>

@endsection