<div class="mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="bg-site">
          <!-- C O N T E U D O -->

          <form action="" method="">

            <div class="card" >
              <div class="card-header" id="dash-professor-card-title">
                <h4>Adicionar um professor existente</h4>
              </div>
              <br><br><div class="card-body">
                <div class="row">
                  <div class="col-lg-8 col-lg-offset-2">
                    <?php echo get_msg();?>
                    <?php echo form_open('adms/criarProfessor','loginForm');?>
                    <div class="row">
                      <div class="chosen-select-single mg-b-20 form-group col-lg-12">
                        <label style="font-weight:700;">Usuário</label>
                        <select data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1">
                          <option value="">Select</option>
                          <option value="United States">United States</option>
                          <option value="United Kingdom">United Kingdom</option>
                          <option value="Afghanistan">Afghanistan</option>
                          <option value="Aland Islands">Aland Islands</option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                     <div class="form-group col-lg-6">
                      <label>Matéria</label>
                      <input class="form-control" name="materia" type="text"  value="<?php echo set_value('materia'); ?>" placeholder="Física">
                    </div>
                  </div>

                  <button type="submit" class="btn btn-success"> Criar sala</button>
                  <?php echo form_close();?>
                </div>
              </div>
            </div>
          </div>

        </form>


        <!-- FIM CONTEUDO -->
      </div>
    </div>
  </div>
</div>
