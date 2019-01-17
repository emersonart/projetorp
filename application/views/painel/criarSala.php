<div class="mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="bg-site">
          <!-- C O N T E U D O -->

          <?php echo form_open();?>

          <div class="card" >
            <div class="card-header" id="dash-professor-card-title">
              <h4><?php var_dump($hash); ?></h4>
            </div>

            <div class="card-body">
              <div class="row">

                <div class="form-group col-md-8 col-md-offset-2">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group"> 
                          <label> Nome da turma </label>
                          <input type="text" class="form-control" aria-describedby="basic-addon1" name="nomeTurma" placeholder=" Nome da Turma">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group"> 
                          <label> Nome da turma </label>
                          <input type="text" class="form-control" aria-describedby="basic-addon1" name="" disabled placeholder=" Nome da Turma" value="<?php echo $hash; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label> Descrição da turma</label>
                        <textarea name="descricaoTurma" rows="3" class="form-control" placeholder="Descrição da Turma"></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <div class="input-group">
                          <label class="input-group-addon" id="basic-addon1"> Incrições até:  </label>
                          <input type="date" class="form-control" aria-describedby="basic-addon1" name="tempoTurma">
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="form-group">
                      <button type="button" class="btn btn-success btn-custon-four" style="padding-left: 10px;">Criar sala</button>
                    </div> 
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
