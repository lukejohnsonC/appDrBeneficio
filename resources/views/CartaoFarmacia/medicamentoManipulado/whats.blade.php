@extends('estrutura.master') 

@section('conteudo')
<section id="funeral" class=''>
    <div class="container">
        <h1>Compra via What's App</h1>
        <h3>20% de Desconto (para pagamento à vista)</h3>
        <h3>Retire na Loja ou Receba em Casa</h3>
    
        <p>Clique no botão abaixo, faça já seu orçamento e retire na loja ou receba em casa (consultar valores) seu medicamento.<br><a href="https://wa.me/5513997748080?text=Olá!%20Sou%20cliente%20Dr.%20Benefício%20e%20tenho%20desconto%20de%2020%%20em%20todo%20medicamento%20genérico%20na%20Leven.%20Gostaria%20de%20fazer%20um%20orçamento." class='pattern'>Clique aqui</a></p>
    
        <p>Importante: Tenha em mãos o pedido médico para solicitar o orçamento e não esqueça de mencionar que é um cliente Dr. Benefício.</p>
           
        <a href="{{ url()->previous() }}" class='pattern'><span><i class="fas fa-undo-alt"></i> voltar ao menu principal</span></a>
    </div>
    </section>
@endsection