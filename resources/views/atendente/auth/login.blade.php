@extends('estrutura.master') @section('conteudo')

<style>
#button-menu {
display: none!important;  }
.swal2-header {
  display: none !important;
}
.swal2-popup {
  width: 650px;
}
.swal2-popup img {
  width: 610px;
  border-radius: 5px;
}

#voltar {
  display:none!important;
}

</style>

<section id="login">
    @if ( Session::get('message') != '' )
    <div id="erro">{{ Session::get('message') }}</div>
    @endif
  <div id="fundo-galera"></div>
  <div class="container posFooter">

      <h1>Central de Atendimento</h1>

    <div id="form">

      <form autocomplete='off' action="{{ route('atendente.auth.loginAtendente') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <label class="col1">
          <span>E-MAIL</span>
          <input type="text" class="form-control" name='email' required />
        </label>
        <label class="col1" style='margin-top:2rem'>
          <span>SENHA</span>
           <input type="password" class="form-control" name="password" required >
        </label>
        <label class="col1">
          <button type="submit">entrar</button>
        </label>
      </form>
    </div>
</section>


<footer>
  <span>Dr. Benefício 2018&reg; Todos os direitos reservados.<br> Caixa Postal 2030 | CEP 11060-002</span>
</footer>

@endsection
