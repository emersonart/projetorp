<div class="mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="bg-site">
          <!-- C O N T E U D O -->

            <div class="card" >
              <div class="card-header" id="dash-professor-card-title">
                <h4>Adicionar um professor existente</h4>
              </div>
              <br><br><div class="card-body">
                <div class="row">
                  <div class="col-lg-8 col-lg-offset-2">
                    <?php echo get_msg();?>
                    <?php echo form_open('','loginForm');?>
                    <div class="row">
                      <div class="chosen-select-single mg-b-20 form-group col-lg-6" >
                        <label style="font-weight:700;">Usuário</label>
                        <select data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1">
                          <option value="0">Select</option>
                           <?php 
                              if(isset($usuarios) && sizeof($usuarios)>0){ 
                              foreach ($usuarios as $user) {
                            ?>
                              <option value="<?php echo $user->usu_id;?>"><?php echo $user->usu_login;?></option>
                          <?php }}?>
                          
                          <option value="United Kingdom">United Kingdom</option>
                          <option value="Afghanistan">Afghanistan</option>
                          <option value="Aland Islands">Aland Islands</option>
                        </select>
                      </div>
                      <div class="form-group col-lg-6">
                                    <label>Matéria</label>
                                    <select name="materia" class="form-control custom-select-value">
                                      <option value="0">Selecionar Matéria</option>
                                      <?php 
                                        if(isset($materias) && sizeof($materias)>0){ 
                                          foreach ($materias as $linha) {
                                      ?>
                                        <option value="<?php echo $linha->sub_id;?>"><?php echo $linha->sub_nome;?></option>
                                      <?php }}else{ ?>
                                        <option value="0">nao foram encontradas materias</option>
                                      <?php }?>
                                    </select>
                                </div>
                    </div>
                     

                  <button type="submit" class="btn btn-success"> Criar sala</button>
                  <?php echo form_close();?>
                </div>
              </div>
            </div>
          </div>



        <!-- FIM CONTEUDO -->
      </div>
    </div>
  </div>
</div>
