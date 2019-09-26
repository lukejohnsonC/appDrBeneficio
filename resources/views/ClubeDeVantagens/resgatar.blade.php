@extends('estrutura.master') 

@section('conteudo')

<section id="funeral" class=''>
    <div class="container">
        <h1>Parabéns</h1>
    
        <p>Você foi contemplado pelo Clube de Vantagens e pode aproveitar este benefício!</p>
    
        <p>Basta apresentar-se como cliente Dr. Benefício no ato do pagamento ou caso necessário, mostre seu cartão virtual</p>
    
        <p>Para ir ao seu cartão virtual:<br><a href="{{route('cartaovirtual.index')}}" class='pattern'>clique aqui</a></p>
</div>
</section>
@endsection