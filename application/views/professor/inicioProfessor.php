<div class="widget-program-box mg-b-15">
            <div class="container-fluid">
                <div class="row mg-b-15">
                    
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12 mg-b-15">
                                <div class="hpanel widget-int-shape responsive-mg-b-30">
                                    <div class="panel-body">
                                        <div class="white-box">
                                            <h3 class="box-title">Salas de aula cadastradas:</h3>

                                            <ul class="basic-list">
                                                <?php 
                                                if(!empty($turmas) && isset($turmas) && sizeof($turmas) > 0){ 
                                                  foreach ($turmas as $linha) {
                                                    ?>

                                                    <li>
                                                        <?php echo $linha->cla_nome?>
                                                        <span class="pull-right" style="position: relative;">
                                                            <a data-toggle="tooltip" data-placement="top" title="Ver Avisos" style="margin-top: 0;color:white;position: relative;"class="btn-custon-four btn btn-md btn-info" href="<?php echo base_url('turma/'.$linha->cla_hash.'/infos');?>"><i class="fa fa-exclamation-circle"></i></a>

                                                            <?php 
                                                                $countalunopend = $this->turma->countAlunosTurma($linha->cla_hash,FALSE);

                                                            ?>
                                                            <a data-toggle="tooltip" data-placement="top" title="Aprovar cadastro" style="margin-top: 0;color:white;position: relative;" class="btn-custon-four btn-info widget-btn-2 btn btn-sm" href="<?php echo base_url('turma/'.$linha->cla_hash.'/pendentes');?>">
                                                                <?php if($countalunopend > 0){?><span style="z-index: 999; right:-3px!important; border:1px solid white;" title="Cadastros pendentes" class="aviso-circulo" style=""title="Essa turma possui alunos pendentes"><?php echo $countalunopend;?></span><?php }?><i class="fa fa-user-plus"></i>
                                                            </a>
                                                            <a data-toggle="tooltip" data-placement="top" title="Ver Listas" style="margin-top: 0;position: relative;"class="btn-custon-four btn btn-md btn-default" href="<?php echo base_url('turma/'.$linha->cla_hash.'/listas');?>"><i class="fa fa-edit"></i></a>
                                                            <a data-toggle="tooltip" data-placement="top" title="Acessar turma" style="margin-top: 0;color:white;position: relative;" class="btn-custon-four btn-success btn btn-md" href="<?php echo base_url('turma/'.$linha->cla_hash);?>"><i class="fa fa-external-link"></i></a>
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

                <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-4 mg-b-15">
                                    <div class="hpanel widget-int-shape responsive-mg-b-30">
                                        <div class="panel-body">
                                            <div class="text-center content-box">
                                                <div class="m icon-box">
                                                    <i class="fa fa-users"></i>
                                                </div>
                                                <h2 class="m-b-xs">Criar sala</h2>
                                                <p class="small mg-t-box">
                                                    Crie uma sala, adicione uma descrição e ponha um tempo limite para o seus alunos se cadastrarem.
                                                </p>
                                                <a href="<?php echo base_url('professor/criarsala');?>" class="btn btn-custon-four btn-success widget-btn-1 btn-sm" style="color:white;">Criar sala</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                    <div class="col-lg-4 mg-b-15">
                        <div class="hpanel widget-int-shape responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="text-center content-box">
                                    <div class="m icon-box">
                                       <i class="fa fa-file-text-o"></i>
                                    </div>
                                    <h2 class="m-b-xs">Criar Atividades</h2>
                                    <p class="small mg-t-box">
                                        Aqui você poderá criar uma lista de exercício ou upar um arquivo para o seus alunos responderem futuramente.
                                    </p>
                                    <a class="btn btn-custon-four btn-danger widget-btn-2 btn-sm" style="color:white;">Criar atividades</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mg-b-15">
                        <div class="hpanel widget-int-shape responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="text-center content-box">
                                    <div class="m icon-box">
                                        <i class="fa fa-gavel"></i>
                                        </div>
                                        <h2 class="m-b-xs">Aprovar cadastro de Alunos</h2>
                                        <p class="small mg-t-box">
                                            Você pode controlar os participantes que entraram na sua turma aprovando o cadastro dos seus alunos.
                                        </p>
                                    <a class="btn btn-custon-four btn-info widget-btn-3 btn-sm" style="color:white;">Aprovar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 mg-b-15">
                        <div class="hpanel widget-int-shape responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="text-center content-box">
                                    <div class="m icon-box">
                                       <i class="fa fa-hand-o-up"></i>
                                    </div>
                                    <h2 class="m-b-xs">Acessar resposta dos alunos</h2>
                                    <p class="small mg-t-box">
                                        Aqui você pode acessar a resposta do que seus alunos responderam de acordo com a lista e também da questão.
                                    </p>
                                    <a class="btn btn-custon-four btn-warning widget-btn-4 btn-sm" style="color:white;">Acessar</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mg-b-15">
                        <div class="hpanel widget-int-shape responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="text-center content-box">
                                    <div class="m icon-box">
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <h2 class="m-b-xs">Classificar as listas de exercícios</h2>
                                    <p class="small mg-t-box">
                                        Nesta página, classifique as listas de exercícios respondidas pelos seus alunos. A classificação se dá como A, B, C ou D. 
                                    </p>
                                    <a class="btn btn-custon-four btn-info widget-btn-2 btn-sm" style="color:white;">Classificar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

            </div>
</div>
