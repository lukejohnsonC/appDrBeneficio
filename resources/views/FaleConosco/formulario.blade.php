<div class="container">
<div>
  <h1>Relate um Erro</h1>
</div>

<p>Estamos sempre buscando o melhor para nossos clientes. Se houver algum erro ou falha em nosso portal que você tenha identificado, por favor nos avise para que possamos corrigir e tornar sua experiência na utilização de nossos serviços cada vez melhor!</p>

@if ( Session::get('message') != '' )
<div id="erro">{{ Session::get('message') }}</div>
@endif

<form action="{{route('faleconoscoPOST')}}" method='POST' enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
  <label class="col1">
    <span>Tipo de erro:</span>
    <select name="tipoErro">
      <option value="erro">Erro</option>
      <option value="bug">Bug</option>
      <option value="sugestao">Sugestão</option>
      <option value="lentidao">Lentidão</option>
    </select>
  </label>
  <label for="" class="col1">
    <span>Mensagem:</span>
    <textarea name="conteudo" placeholder="Sugerimos que nos informe também em qual página você encontrou o erro. Agradecemos de ♥" rows="10" required></textarea>
  </label>
  <label for="selecao-arquivo" class='col1'>
    <input type="file" name='document' id='document'>
  </label>
  <label class='col1'><input type="submit" style='height: auto;' value="Enviar" /></label>
</form>
</div>
