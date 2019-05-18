<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="profile-info-inner">
          <div class="profile-img">
            <img src="<?php echo base_url('assets/img/courses/turmas/1.jpg');?>" alt="" />
          </div>
          <div class="profile-details-hr">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                <div class="address-hr">
                  <p><b>Nome da Turma</b><br /><?php echo $getturma['cla_nome'];?> </p>
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                  <p><b>Código da turma</b><br /> <?php echo $getturma['cla_hash'];?></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                <div class="address-hr">
                  <p><b>Descrição da turma</b><br /> <?php echo $getturma['cla_descricao'];?></p>
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                <div class="address-hr">
                  <p><b>Matéria</b><br /> <?php echo $getturma['sub_nome'];?></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                <div class="address-hr">
                  <p><b>Professor</b><br /> <?php echo $getturma['inf_name'].' '.$getturma['inf_lastname'];?></p>
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                  <p><b>Email:</b><br /> <?php echo $getturma['inf_email'];?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
          <ul id="myTabedu1" class="tab-review-design">
            <li class="<?php echo respostal($aba,'alunos');?>"><a href="#alunos">Alunos</a></li>
            <li class="<?php echo respostal($aba,'listas');?>"><a href="#listas"> Listas</a></li>
            <li class="<?php echo respostal($aba,'infos');?>"><a href="#infos">Avisos</a></li>
            <?php if($profok or $usuario['perm'] == 0){ ?>
              <li class="<?php echo respostal($aba,'pendentes');?>"><a href="#pendentes">Cadastros pendentes<?php if($countalunopend > 0){?><span class="aviso-circulo" data-toggle="tooltip" data-placement="top" title="Essa turma possui alunos pendentes"><?php echo $countalunopend;?></span><?php }?></a></li>
              <?php $gg = false; ?>
              <?php if($gg){ ?>
                <li class="<?php echo respostal($aba,'configs');?>"><a href="#configs"> <i class="fa fa-cog"></i></a></li>
              <?php } ?>

            <?php } ?>
            
            
          </ul>
          <div id="myTabContent" class="tab-content custom-product-edit">
            <div class="product-tab-list tab-pane fade in <?php echo respostal($aba,'alunos');?>" id="alunos">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="review-content-section">
                    <div class="chat-discussion" style="height: auto">
                      <div class="row" style="margin: 0">
                        <?php if(!empty($getalunos) && isset($getalunos) && sizeof($getalunos) > 0){
                          $is = FALSE;
                          foreach ($getalunos as $linha) {?>
                            <div class="chat-message col-lg-6 col-md-12 col-sm-12 col-xs-12">
                              <div class="profile-hdtc">
                               <img class="message-avatar" src="<?php echo base_url('assets/img/profile/'.rand(1,9).'.jpg');?>" alt="">
                             </div>
                             <div class="message">
                              <a class="message-author" href="<?php echo base_url('perfil/'.$linha->usu_login);?>"> <?php echo $linha->inf_name.' '.$linha->inf_lastname;?></a>

                              <span class="message-content">
                                <b>Email: </b><?php echo $linha->inf_email;?><br>
                                <b>Matrícula: </b><?php echo $linha->inf_registration;?>
                              </span>
                              <div class="m-t-md mg-t-10">
                                <span class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="bottom" title="Status do Cadastro" style="margin-bottom: 5px;"><i class="fa fa-thumbs-up" style="color: #34a854;"></i> Efetivado </span>
                                <span class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="bottom" title="Data do Cadastro" style="margin-bottom: 5px;"><i class="fa fa-calendar" style="color: #006DF0;"></i> <?php echo converter_data(explode(' ',$linha->reg_date)[0],3);?></span>
                                <span class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="bottom" title="Hora do Cadastro" style="margin-bottom: 5px;"><i class="fa fa-clock-o" style="color: #ea4c89;"></i> <?php echo explode(' ',$linha->reg_date)[1];?></span>

                              </div>
                            </div>
                          </div>
                        <?php }}else{
                          $is = TRUE; ?>
                          <div class="alert alert-danger alert-st-four" role="alert">
                            <i class="fa fa-exclamation-triangle edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                            <p class="message-mg-rt"><strong>Essa não!</strong> Não existem alunos com cadastros ativos para esta turma</p>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-tab-list tab-pane fade in <?php echo respostal($aba,'listas');?>" id="listas">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="review-content-section">
                    <div class="chat-discussion" style="height: auto">
                      <div class="row" style="margin: 0">
                       <?php if(!empty($getlistas) && isset($getlistas) && sizeof($getlistas) > 0){ 
                        foreach ($getlistas as $linha) { ?>
                          <?php if($linha['lis_res_status'] == 1 or $profok or 0 == $usuario['perm']){?>
                          <!-- COMEÇA A DIV DE LISTA -->
                          <div  class="chat-message col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           <div style="margin-left: 0;"class="message">
                            <a class="message-author" href="#"> <?php echo $linha['lis_name'];?></a>
                            <?php if($profok or 0 == $usuario['perm']){?>
                              <span class="message-date">
                                <?php if($linha['lis_res_status'] == 1){?>
                                <a href="<?php echo base_url('turma/'.$linha['lis_cla_hash'].'/respostas/'.$linha['lis_id']);?>" class="btn btn-md btn-info btn-custon-three" data-toggle="tooltip" data-placement="bottom" title="Ver Respostas"><i class="fa fa-eye" style="color: #fff;"></i> Respostas </a>
                              <?php }?>
                                <a href="<?php echo base_url('turma/'.$linha['lis_cla_hash'].'/editar/'.$linha['lis_id']);?>"class="btn btn-md btn-default btn-custon-three" data-toggle="tooltip" data-placement="bottom" title="Editar Lista"><i class="fa fa-edit" style="color: #000;"></i></a>
                                <a href="<?php echo base_url('turma/'.$linha['lis_cla_hash'].'/reggabarito/'.$linha['lis_id']);?>" class="btn btn-md btn-success btn-custon-three" data-toggle="tooltip" data-placement="bottom" title="Gabarito"><i class="fa fa-check-square-o" style="color: #fff;"></i></a>
                                <span data-toggle="tooltip" data-placement="bottom" title="Excluir Lista">

                                 <a href="#" nome-value="<?php echo $linha['lis_name'];?>" data-toggle="modal" class="btn btn-md btn-danger btn-custon-three deletelista" data-value="<?php echo $linha['lis_id'];?>" data-target="#deletelista"><i class="fa fa-close" style="color: #fff;"></i></a>
                               </span>
                             
                             </span>
                           <?php }else{ 
                            $nota = $this->questao->getNotaLista(array('id_lista' => $linha['lis_id'], 'id_aluno'=>$id_aluno));?>
                            <span class="message-date">
                              <span style="padding-left: 10px;padding-right: 20px;" class="btn btn-md btn-<?php echo showNota($nota,1);?> btn-custon-three" data-toggle="tooltip" data-placement="top" title="Minha Nota"><i class="fa fa-check" style="color: #fff;margin-right: 7px;"></i>  
                                <?php 
                                if($nota){
                                  echo " ".showNota($nota)." ";
                                }else{
                                  echo "S/N";
                                }
                                ?>
                              </span>
                              <?php $gabarito = $this->questao->getGabarito($linha['lis_id']); 
                              if($gabarito and count($gabarito) > 0){
                                $j = 0;
                                for($i =0;$i< count($gabarito);$i++){
                                  if($gabarito[$i]['gab_resposta'] == ''){
                                    $j++;
                                  }
                                }
                                if(count($gabarito) == $j){
                                  $gabarito = FALSE;
                                }
                              }
                              ?>
                              <?php if(isset($linha['lis_gab_status']) and $linha['lis_gab_status'] == '1' and $gabarito and $linha['lis_expired']){?>
                                <a href="<?php echo base_url('turma/'.$linha['lis_cla_hash'].'/vergabarito/'.$linha['lis_id']);?>"class="btn btn-md btn-success btn-custon-three" data-toggle="tooltip" data-placement="top" title="Ver Gabarito"><i class="fa fa-eye" style="color: #fff;"></i></a>
                              <?php } ?>
                              <a href="<?php echo base_url('turma/'.$linha['lis_cla_hash'].'/responder/'.$linha['lis_id']);?>"class="btn btn-md btn-info btn-custon-three" data-toggle="tooltip" data-placement="top" title="Responder Lista"><i class="fa fa-pencil" style="color: #fff;margin-right: 7px;"></i> Responder</a>
                            </span>
                          <?php } ?>
                          <span class="message-content">
                            <?php $dd = array('cla_hash' => $linha['lis_cla_hash'], 'id_lista'=>$linha['lis_id']);?>
                            <b>Questões: <?php echo $this->questao->countQuestoes($dd);?></b><br>
                            <?php if($linha['lis_res_status']  == 1){?>
                            Responder até: <b><?php echo $linha['lis_endtime'] ? converter_data(explode(' ',$linha['lis_endtime'])[0],3).' às '.explode(' ',$linha['lis_endtime'])[1] : 'Não Informado';?></b><br>
                            <?php }else{ ?>
                              <span class="badge badge-warning ">Lista não está dissponível para os alunos!</span>
                            <?php }?>
                          </span>

                        </div>
                      </div>
                    <?php } ?>
                      <!-- ACABA A DIV DE UMA LISTA -->
                    <?php } }else{?>
                      <div class="alert alert-warning alert-st-three" role="alert">
                        <i class="fa fa-exclamation-triangle edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                        <p class="message-mg-rt"><strong>Ops!</strong> Esta turma ainda não possui listas!</p>
                      </div>

                    <?php }?>
                    <?php if($profok2){?>
                      <a href="<?php echo base_url('criarlista/turma/'.$hashturma);?>" class="btn btn-lg btn-success btn-custon-four widget-btn-1 ">CRIAR LISTA</a>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="product-tab-list tab-pane fade in <?php echo respostal($aba,'infos');?>" id="infos">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="review-content-section">
                <div class="chat-discussion" style="height: auto">
                  <div class="row" style="margin: 0">
                    <?php 
                    if(!empty($informativos) && isset($informativos) && sizeof($informativos) > 0){
                      foreach ($informativos as $linha) {?>
                        <div class="chat-message col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="profile-hdtc">
                           <img class="message-avatar" title="<?php echo $getturma['inf_name'].' '.$getturma['inf_lastname'];?>" src="<?php echo base_url('assets/img/profile/'.rand(1,9).'.jpg');?>" alt="">
                         </div>

                         <div class="message">
                          <span class="message-date">
                            <i> Última atualização: 
                              <?php echo converter_data(explode(' ',$linha['not_date'])[0],3);?>
                              às 
                              <?php echo explode(' ',$linha['not_date'])[1];?>
                            </i>
                          </span>
                          <a class="message-author" href="#"> <?php echo $getturma['inf_name'].' '.$getturma['inf_lastname'];?></a><br>

                          <span class="message-content">
                            <?php echo $linha['not_message'];?>
                          </span>

                        </div>
                      </div>
                      <?php if($profok2){?>
                        <a href="<?php echo base_url('aviso/turma/'.$hashturma);?>" class="btn btn-lg btn-success btn-custon-four widget-btn-1 ">ATUALIZAR AVISO</a>
                      <?php } ?>
                    <?php }}else{
                     ?>
                     <div class="alert alert-danger alert-st-four" role="alert">
                      <i class="fa fa-exclamation-triangle edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                      <p class="message-mg-rt"><strong>Essa não!</strong> Não existem alunos com cadastros ativos para esta turma</p>
                    </div>
                    <?php if($profok2){?>
                      <a href="<?php echo base_url('aviso/turma/'.$hashturma);?>" class="btn btn-lg btn-success btn-custon-four widget-btn-1 ">CRIAR AVISO</a>
                    <?php } ?>
                  <?php } ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php if($usuario['perm'] == 2 or $usuario['perm'] == 0){ ?>
        <div class="product-tab-list tab-pane fade in <?php echo respostal($aba,'pendentes');?>" id="pendentes">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="review-content-section">
                <div class="chat-discussion" style="height: auto">
                  <div class="row" style="margin: 0">
                    <?php if(!empty($getalunospend) && isset($getalunospend) && sizeof($getalunospend) > 0){ 
                      foreach ($getalunospend as $linha) { ?>
                        <div class="chat-message col-lg-6 col-md-12 col-sm-12 col-xs-12">
                          <div class="profile-hdtc">
                           <img class="message-avatar" src="<?php echo base_url('assets/img/profile/'.rand(1,9).'.jpg');?>" alt="">
                         </div>
                         <div class="message">
                          <a class="message-author" href="#"> <?php echo $linha->inf_name.' '.$linha->inf_lastname;?></a>
                          <span class="message-content">
                            <div class="row">
                              <div class="col-lg-12">
                                <b>Email: </b><?php echo $linha->inf_email;?><br>
                                <b>Matrícula: </b><?php echo $linha->inf_registration;?>
                              </div>
                              <div class="col-lg-12 col-md-12 mg-t-15" style="text-align: right;">

                              </div>
                            </div>

                          </span>
                          <div class="mg-b-10 mg-t-10">
                            <span class="btn btn-xs btn-default mg-t-10" data-toggle="tooltip" data-placement="bottom" title="Status do Cadastro"><i class="fa fa-exclamation-triangle" style="color: #e12503;"></i>Pendente </span>
                            <a  class="pull-right btn-danger btn-md btn ap" data-toggle="tooltip" data-placement="bottom" title="Não Aprovar Cadastro"><i class="fa fa-thumbs-down"></i></a> 
                            <a href="<?php echo base_url('professor/aprovarcadastro/'.$linha->reg_cla_hash.'/'.$linha->usu_id)?>"class="pull-right btn-success btn-md btn ap" data-toggle="tooltip" data-placement="bottom" title="Aprovar Cadastro"><i class="fa fa-thumbs-up"></i></a>

                          </div>
                        </div>
                      </div>
                    <?php } }else{ if($is == TRUE){ ?>
                      <div class="alert alert-warning alert-st-three" role="alert">
                        <i class="fa fa-exclamation-triangle edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                        <p class="message-mg-rt"><strong>Ops!</strong> Não existem alunos com cadastros para esta turma</p>
                      </div>
                    <?php }else{ ?>
                      <div class="alert alert-info alert-st-one" role="alert">
                        <i class="fa fa-check edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                        <p class="message-mg-rt"><strong>Ótimo!</strong> Todos os alunos já tiveram seu cadastro ativado!</p>
                      </div>
                    <?php } }?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php if($gg){?>
          <div class="product-tab-list tab-pane fade in <?php echo respostal($aba,'configs');?>" id="configs">
            <div class="row">
              <?php echo form_open();?>

              <div class="form-group col-md-10 col-md-offset-1" >
                <div class="row">
                  <?php echo get_msg();?>
                  <div class="col-lg-6">
                    <div class="form-group"> 
                      <label> Nome da turma </label>
                      <input type="text" class="form-control" aria-describedby="basic-addon1" name="nomeTurma" placeholder=" Nome da Turma" value="<?php echo $getturma['cla_nome'];?>">
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group"> 
                      <label> Data Limite de registro na turma</label>
                      <div class="input-group">
                        <label class="input-group-addon" id="basic-addon1"> <i class="fa fa-calendar"></i></label>
                        <input type="date" class="form-control" aria-describedby="basic-addon1" name="tempoTurma" value="<?php echo converter_data($getturma['cla_end_time'],2); ?>">
                      </div>

                    </div>
                  </div>


                </div>

                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label> Descrição da turma</label>
                      <textarea name="descricaoTurma" rows="3" class="form-control" placeholder="Descrição da Turma"><?php echo $getturma['cla_descricao'];?></textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label> Período atual: </label>
                      <div class="inline-checkbox-cs"> 
                        <label class=" i-checks pull-left" style="margin-right: 15px" for="um">
                          <input type="radio" value="1" checked name="periodoTurma" id="um">
                          1º 
                        </label>
                        <label class=" i-checks pull-left" style="margin-right: 15px" for="do">
                          <input type="radio" value="2" name="periodoTurma" id="do">
                          2º 
                        </label>
                        <label class=" i-checks pull-left" style="margin-right: 15px" for="tr">
                          <input type="radio" value="3" name="periodoTurma" id="tr">
                          3º 
                        </label>
                        <label class=" i-checks pull-left" style="margin-right: 15px" for="qu">
                          <input type="radio" value="4" name="periodoTurma" id="qu">
                          4º 
                        </label>
                        <span class="badge b-info" data-toggle="tooltip" title="Ao selecionar um período os demais serão fechados automaticamente" data-placement="bottom"><i class="fa fa-info"></i></span>

                      </div>
                    </div>
                  </div>


                </div>


                <div class="row">
                  <div class="form-group">
                    <button type="submit" class="btn btn-success btn-custon-four" style="padding-left: 10px;">Criar sala</button>
                  </div> 
                </div>
              </div>
            </div>
          </div>
        <?php }?>
      <?php } ?>
    </div>
  </div>
</div>
</div>
</div>
</div>