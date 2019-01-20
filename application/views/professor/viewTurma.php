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
                  <p><b>Email ID</b><br /> <?php echo $getturma['inf_email'];?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
          <ul id="myTabedu1" class="tab-review-design">
            <li class="active"><a href="#alunos">Alunos</a></li>
            <li><a href="#listas"> Listas</a></li>
            <li><a href="#pendentes">Cadastros pendentes<?php if($countalunopend > 0){?><span class="aviso-circulo" data-toggle="tooltip" data-placement="top" title="Essa turma possui alunos pendentes"><?php echo $countalunopend;?></span><?php }?></a></li>
          </ul>
          <div id="myTabContent" class="tab-content custom-product-edit">
            <div class="product-tab-list tab-pane fade in active" id="alunos">
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
                              <a class="message-author" href="#"> <?php echo $linha->inf_name.' '.$linha->inf_lastname;?></a>

                              <span class="message-content">
                                <b>Email: </b><?php echo $linha->inf_email;?><br>
                                <b>Matrícula: </b><?php echo $linha->inf_registration;?>
                              </span>
                              <div class="m-t-md mg-t-10">
                                <span class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="bottom" title="Status do Cadastro"><i class="fa fa-thumbs-up" style="color: #34a854;"></i> Cadastro efetivado </span>
                                <span class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="bottom" title="Data do Cadastro"><i class="fa fa-calendar" style="color: #006DF0;"></i> <?php echo converter_data(explode(' ',$linha->reg_date)[0],3);?></span>
                                <span class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="bottom" title="Hora do Cadastro"><i class="fa fa-clock-o" style="color: #ea4c89;"></i> <?php echo explode(' ',$linha->reg_date)[1];?></span>

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
            <div class="product-tab-list tab-pane fade" id="listas">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="review-content-section">
                    <div class="chat-discussion" style="height: auto">
                      <div class="row" style="margin: 0">
                       <?php if(!empty($getlistas) && isset($getlistas) && sizeof($getlistas) > 0){ 
                        foreach ($getlistas as $linha) { ?>
                          <div  class="chat-message col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           <div style="margin-left: 0;"class="message">
                            <a class="message-author" href="#"> <?php echo $linha->lis_name;?></a>
                            <?php if($linha->lis_teacher == $usuario['perm'] or 0 == $usuario['perm']){?>
                            <span class="message-date">
                              <a href="<?php echo base_url('turma/'.$linha->lis_cla_hash.'/verlista/'.$linha->lis_id);?>" class="btn btn-md btn-info" data-toggle="tooltip" data-placement="bottom" title="Ver Lista"><i class="fa fa-eye" style="color: #fff;"></i> Ver </a>
                              <a href="<?php echo base_url('turma/'.$linha->lis_cla_hash.'/editarlista/'.$linha->lis_id);?>"class="btn btn-md btn-default" data-toggle="tooltip" data-placement="bottom" title="Editar Lista"><i class="fa fa-edit" style="color: #000;"></i> Editar</a>
                              <a href="<?php echo base_url('turma/'.$linha->lis_cla_hash.'/excluirlista/'.$linha->lis_id);?>"class="btn btn-md btn-danger" data-toggle="tooltip" data-placement="bottom" title="Excluir Lista"><i class="fa fa-close" style="color: #fff;"></i> Excluir</a>
                            </span>
                          <?php }?>
                            <span class="message-content">
                              <?php $dd = array('cla_hash' => $linha->lis_cla_hash, 'id_lista'=>$linha->lis_id);?>
                              <b>Questões: <?php echo $this->questao->countQuestoes($dd);?></b><br>
                            </span>
                            
                          </div>
                        </div>
                      <?php }}?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="product-tab-list tab-pane fade" id="pendentes">
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
                              <span class="btn btn-xs btn-default mg-t-10" data-toggle="tooltip" data-placement="bottom" title="Status do Cadastro"><i class="fa fa-exclamation-triangle" style="color: #e12503;"></i> Cadastro pendente </span>
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
        </div>
      </div>
    </div>
  </div>
</div>
</div>