<div class="widget-program-box mg-b-15">
            <div class="container-fluid">
                <div class="row mg-b-15">
                    
                <div class="col-lg-4">
                    <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mg-b-15">
                        <div class="hpanel widget-int-shape responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="white-box">
                                    <h3 class="box-title">Minhas Turmas:</h3>
                                <ul class="basic-list">
                                    <?php 
                                        if(!empty($turmas) && isset($turmas) && sizeof($turmas) > 0){ 
                                          foreach ($turmas as $linha) {
                                            ?>

                                    
                                        <li>
                                            <?php echo $linha->cla_nome?>
                                            <span class="pull-right">
                                            <a data-toggle="tooltip" data-placement="top" title="Ver Avisos" style="margin-top: 0;color:white"class="btn-custon-four btn btn-md btn-info" href="<?php echo base_url('turma/'.$linha->cla_hash.'/infos');?>"><i class="fa fa-exclamation-circle"></i></a>
                                            <a data-toggle="tooltip" data-placement="top" title="Ver Listas" style="margin-top: 0"class="btn-custon-four btn btn-md btn-default" href="<?php echo base_url('turma/'.$linha->cla_hash.'/listas');?>"><i class="fa fa-edit"></i></a>
                                            <a data-toggle="tooltip" data-placement="top" title="Acessar turma" style="margin-top: 0;color:white" class="btn-custon-four btn-success btn btn-md" href="<?php echo base_url('turma/'.$linha->cla_hash);?>"><i class="fa fa-external-link"></i></a>
                                            </span>
                                        </li>
                                    

                                    <?php } } ?>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mg-b-15">
                        <div class="hpanel widget-int-shape responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="text-center content-box">
                                    <div class="m icon-box">
                                        <i class="fa fa-users"></i>
                                    </div>
                                    <h2 class="m-b-xs">Salas de aula</h2>
                                    <p class="small mg-t-box">
                                        Aqui, é possível acessar todas as suas salas de aula cadastradas no sistema.
                                    </p>
                                    <a href="<?php echo base_url('turmas');?>" class="btn btn-custon-four btn-success widget-btn-1 btn-sm" style="color:white;">Ver salas</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mg-b-15">
                        <div class="hpanel widget-int-shape responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="text-center content-box">
                                    <div class="m icon-box">
                                       <i class="fa fa-file-text-o"></i>
                                    </div>
                                    <h2 class="m-b-xs">Acessar Atividades</h2>
                                    <p class="small mg-t-box">
                                        Acesse as listas de exercício disponíveis para responder.
                                    </p>
                                    <a class="btn btn-custon-four btn-danger widget-btn-2 btn-sm" style="color:white;">Acessar Atividades</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mg-b-15">
                        <div class="hpanel widget-int-shape responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="text-center content-box">
                                    <div class="m icon-box">
                                        <i class="fa fa-bell"></i>
                                        </div>
                                        <h2 class="m-b-xs">Quadro de avisos.</h2>
                                        <p class="small mg-t-box">
                                            Veja todos os avisos das turmas e do sistemas nessa página.
                                        </p>
                                    <a class="btn btn-custon-four btn-info widget-btn-3 btn-sm" style="color:white;">Ver avisos</a>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
</div>
