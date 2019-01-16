<div class="mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="bg-site">
          <!-- C O N T E U D O -->

          <form action="" method="">

            <div class="card" >
              <div class="card-header" id="dash-professor-card-title">
                <h4>Adicionar um novo usuário professor</h4>
              </div>
              <br><br><div class="card-body">
                <div class="row">
                  <div class="col-lg-8 col-lg-offset-2">
                   
                    <?php echo get_msg();?>
                        <?php echo form_open('adms/criarProfessor/new','id="loginForm"');?>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Login</label>
                                    <input id="username" class="form-control" name="login" type="text" value="<?php echo set_value('login'); ?>" placeholder="nome de usuário">
                                </div>
                                <div class="row" style="margin: 0 0px;">
                                  <div id="passwordme" class="col-lg-6">
                                      <div class="form-group" >
                                          <label>Senha</label>
                                          <input type="password" class="form-control senha1" name="senha" placeholder="******">
                                      </div>
                                      <div class="form-group mg-b-pass">
                                              <div class="pwstrength_viewport_progress">
                                                  
                                              </div>
                                          </div>
                                  </div>
                                   <div id="passwordme2" class="col-lg-6">
                                      <div class="form-group">
                                          <label>Confirme a senha</label>
                                          <input type="password" class="form-control senha2"  name="senha2" placeholder="******">
                                          
                                      </div>
                                      <div class="pwstrength_viewport_progress">
                                                  
                                              </div>
                                  </div>
                                </div>
                                 <div class="form-group col-lg-6">
                                    <label>Nome</label>
                                    <input id="nome" class="form-control" name="nome" type="text" value="<?php echo set_value('nome'); ?>" placeholder="Nome">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Sobrenome</label>
                                    <input class="form-control" name="sobrenome" type="text" value="<?php echo set_value('sobrenome'); ?>" placeholder="Sobrenome">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Email</label>
                                    <input id="email" class="form-control" type="name" name="email"  value="<?php echo set_value('email'); ?>" placeholder="email@host.com">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Matrícula</label>
                                    <input class="form-control" name="matricula" type="text"  value="<?php echo set_value('matricula'); ?>" placeholder="00000000000000">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Matéria</label>
                                    <input class="form-control" name="materia" type="text"  value="<?php echo set_value('materia'); ?>" placeholder="Física">
                                </div>
                            </div>
                            <div class="text-center" style="margin-top: 15px;">
                              <div class="row">
                                <div class="col-lg-5 col-lg-offset-1">
                                  <button class="btn btn-default btn-block col-lg-6 btn-lg" type="reset">Cancel</button>
                                  
                                </div>
                                <div class="col-lg-5">
                                  <button class="btn btn-success loginbtn btn-block btn-lg" type="submit">Cadastrar</button>
                                </div>
                                </div>
                            </div>
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
