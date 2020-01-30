<div id="modalCadastroVida" class="modal fade text-success" role="dialog">
    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center"></h4>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group" style="display: none;">
              <label for="recipient-id" class="col-form-label">id:</label>
              <input type="text" class="form-control" id="id_producao_cliente" readonly>
            </div>
            <div class="col-lg-12">
              <div class="form-group">
                <label for="recipient-nome" class="col-form-label">Nome Completo:</label>
                <input type="text" class="form-control" id="nm_nome" required>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="recipient-cpf" class="col-form-label">CPF:</label>
                <input type="text" class="form-control" id="cd_cpf">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="recipient-dt-nasc" class="col-form-label">Data de Nascimento:</label>
                <input type="text" class="form-control" id="cd_dt_nasc">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="recipient-dt-nasc" class="col-form-label">E-mail:</label>
                <input type="text" class="form-control" id="cd_email">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="recipient-cel" class="col-form-label">Celular:</label>
                <input type="text" class="form-control" id="cd_celular">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="recipient-tel" class="col-form-label">Telefone:</label>
                <input type="text" class="form-control" id="cd_telefone">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="recipient-cep" class="col-form-label">CEP:</label>
                <input type="text" class="form-control" id="cd_cep" onkeyup="getCEP(this.value);">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="recipient-end" class="col-form-label">Endereço:</label>
                <input type="text" class="form-control" id="cd_endereco">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="recipient-num" class="col-form-label">Número:</label>
                <input type="text" class="form-control" id="cd_end_numero">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="recipient-comp" class="col-form-label">Complemento:</label>
                <input type="text" class="form-control" id="cd_end_numero_complemento">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="recipient-bairro" class="col-form-label">Bairro:</label>
                <input type="text" class="form-control" id="cd_bairro">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="recipient-cidade" class="col-form-label">Cidade:</label>
                <input type="text" class="form-control" id="cd_cidade">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="recipient-estado" class="col-form-label">Estado:</label>
                <input type="text" class="form-control" id="cd_estado">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-success botaoEnviar"></button>
        </div>
      </div>
    </div>
  </div>
