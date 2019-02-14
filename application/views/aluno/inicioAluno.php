<div class="widget-program-box mg-b-15">
            <div class="container-fluid">
                <div class="row mg-b-15">
                    

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mg-b-15">
                        <div class="hpanel widget-int-shape responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="white-box">
                                    <h3 class="box-title">Salas de aula cadastradas:</h3>

                                    <?php 
                                        if(!empty($turmas) && isset($turmas) && sizeof($turmas) > 0){ 
                                          foreach ($turmas as $linha) {
                                            ?>

                                    <ul class="basic-list">
                                        <li><?php echo $linha->cla_nome?><a style="display: inline-block;color:white;margin-top: 0"class="pull-right btn btn-custon-four btn-success widget-btn-1 btn-sm" href="<?php echo base_url('turma/'.$linha->cla_hash);?>">Acessar turma</a></li>
                                    </ul>

                                    <?php } } ?>

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
