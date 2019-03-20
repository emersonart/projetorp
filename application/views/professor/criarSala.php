<div class="mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="bg-site">
          <!-- C O N T E U D O -->


          <div class="card" >
            <div class="card-header" id="dash-professor-card-title">
              <h4></h4>
            </div>

            <div class="card-body">
              <div class="row">
                <?php echo form_open();?>

                <div class="form-group col-md-8 col-md-offset-2">
                  <div class="row">
                    <?php echo get_msg();?>
                    <div class="col-lg-6">
                      <div class="form-group"> 
                        <label> Nome da turma </label>
                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="nomeTurma" placeholder=" Nome da Turma">
                      </div>
                    </div>
                    <?php if(!$adm){ ?>
                    <div class="col-lg-6">
                      <div class="form-group"> 
                        <label> Código da turma </label>
                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="" disabled placeholder=" Nome da Turma" value="<?php echo $hash; ?>">
                      </div>
                    </div>
                    <?php }?>

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
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label> Permitir inscrições até: </label>
                        <div class="input-group">
                          <label class="input-group-addon" id="basic-addon1"> <i class="fa fa-calendar"></i></label>
                          <input type="date" class="form-control" aria-describedby="basic-addon1" name="tempoTurma">
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <label>Divisão de períodos</label>
                     <div class="inline-checkbox-cs"> 
                      <label class=" i-checks pull-left" style="margin-right: 15px" for="BIMESTRE">
                      <input type="radio" value="bimestre" name="periodosTurma" id="BIMESTRE">
                        Bimestre 
                      </label>
                      <label class=" i-checks pull-left" style="margin-right: 15px" for="TRIMESTRE">
                      <input type="radio" value="trimestre" name="periodosTurma" id="TRIMESTRE">
                        Trimestre
                      </label>
                      <span class="badge b-info" data-toggle="tooltip" title="Define em até quantos períodos será dividido o boletim da turma. Bimestre: até 4 | Trimestre: até 3" data-placement="right"><i class="fa fa-info"></i></span>
                    </div>

                  </div>

                    </div>
                   <?php if($adm){ ?>
                  <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label> Escolha o Professor: </label>
                      <select name="profTurma" class="form-control custom-select-value">
                        <option value="0" style="padding: 5px 3px; font-size: 1.2em;">Selecionar professor</option>
                        <?php 
                        if(isset($professores) && sizeof($professores)>0){ 
                          foreach ($professores as $linha) {
                            ?>
                            <option style="padding: 10px 3px; font-size: 1.2em;" value="<?php echo $linha->usu_id;?>"><?php echo $linha->inf_name;?></option>
                            <?php }} ?>
                          </select>
                        </div>
                      </div>
                      </div>
                      <?php } ?>


                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <button type="submit" style="padding-left: 35px; padding-right: 35px;"class="btn btn-success btn-lg btn-custon-four pull-right" style="padding-left: 10px;">Criar sala</button>
                        </div> 
                      </div>
                    </div>
                  </div>

                </div>  

                <?php echo form_close();?>
              </div>
            </div>
          </div>




          <!-- FIM CONTEUDO -->
        </div>
      </div>
    </div>
  </div>
