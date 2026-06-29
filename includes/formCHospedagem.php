<div class="col-12 mt-5">
    <a href="javascript:history.back()" class="btn btn-danger" style="margin-bottom: 30px;">Voltar</a>
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Cadastro de Hospedagem</h4>
            <form action="cadastroHospedagem.php" method="POST">
                <div class="form-group">
                    <label for="exampleInputText1">ID do Responsável</label>
                    <input type="text" class="form-control" name="idResp" id="exampleInputText1" aria-describedby="textHelp">
                </div>
                  <div class="form-group">
                      <label for="example-date-input" class="col-form-label">Entrada Prevista</label>
                      <input class="form-control" type="date" name="ePrevista" id="example-date-input">
                  </div>
                  <div class="form-group">
                      <label for="example-date-input" class="col-form-label">Saída Prevista</label>
                      <input class="form-control" type="date" name="sPrevista" id="example-date-input">
                  </div>
                  <div class="form-group">
                      <label for="example-number-input" class="col-form-label">Quantidade de Hóspedes</label>
                      <input class="form-control" type="number" name="qtdHospede" id="example-number-input">
                  </div>
                  <div class="form-group">
                      <label for="example-number-input" class="col-form-label">Quantidade de Quartos</label>
                      <input class="form-control" type="number" name="qtdQuarto" id="example-number-input">
                  </div>
                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
            </form>
        </div>
    </div>
</div>