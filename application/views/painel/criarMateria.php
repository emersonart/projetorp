 <div class="mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="bg-site">
          <!-- C O N T E U D O -->

          <?php echo form_open();?>

            <div class="card" >
              <br><br><div class="card-body">
              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <div class="row">
                    <div class="col-md-12 mg-b-15">
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"> Nome da Matéria</span>
                        <input type="text" name="nome_materia" class="form-control" aria-describedby="basic-addon1" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 mg-b-15">
                        <textarea name="desc_materia" rows="3" class="form-control" placeholder="Descrição da Matéria"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-success btn-custon-four"> Criar Matéria</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <?php echo form_close();?>


        <!-- FIM CONTEUDO -->
      </div>
    </div>
  </div>
</div>
