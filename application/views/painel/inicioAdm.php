<div class="widget-program-box mg-b-15">
            <div class="container-fluid">
                <div class="row mg-b-15">
                    
                <div class="col-lg-4">
                    <div class="row">    
                        <div class="col-lg-12 mg-b-15">
                            <div class="hpanel widget-int-shape responsive-mg-b-30">
                                <div class="panel-body">
                                    <div class="white-box">
                                        <h3 class="box-title">Professores cadastrados:</h3>
                                        
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

                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-4 mg-b-15">
                                <div class="hpanel widget-int-shape responsive-mg-b-30">
                                    <div class="panel-body">
                                        <div class="text-center content-box">
                                            <div class="m icon-box">
                                                <i class="fa fa-graduation-cap"></i>
                                            </div>
                                            <h2 class="m-b-xs">Criar salas</h2>
                                            <p class="small mg-t-box">
                                                Crie uma sala, adicione uma descrição e ponha um tempo limite para os alunos se cadastrarem.
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
                                               <i class="fa fa-users"></i>
                                            </div>
                                            <h2 class="m-b-xs">Acessar turmas</h2>
                                            <p class="small mg-t-box">
                                                Nesta aba, veja todas as turmas já cadastradas no sistema.
                                            </p>
                                            <a class="btn btn-custon-four btn-danger widget-btn-2 btn-sm" style="color:white;">Acessar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 mg-b-15">
                                <div class="hpanel widget-int-shape responsive-mg-b-30">
                                    <div class="panel-body">
                                        <div class="text-center content-box">
                                            <div class="m icon-box">
                                                <i class="fa fa-plus"></i>
                                                </div>
                                                <h2 class="m-b-xs">Adicionar professor</h2>
                                                <p class="small mg-t-box">
                                                    Adicione um professor a partir de um usuário já existente ou criando um novo.
                                                </p>
                                            <a class="btn btn-custon-four btn-info widget-btn-3 btn-sm" style="color:white;">Adicionar professor</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 mg-b-15">
                                <div class="hpanel widget-int-shape responsive-mg-b-30">
                                    <div class="panel-body">
                                        <div class="text-center content-box">
                                            <div class="m icon-box">
                                               <i class="fa fa-book"></i>
                                            </div>
                                            <h2 class="m-b-xs">Adicionar matéria</h2>
                                            <p class="small mg-t-box">
                                                Adicione uma matéria para ser ligada à professores, alunos e turmas.
                                            </p>
                                            <a class="btn btn-custon-four btn-warning widget-btn-4 btn-sm" style="color:white;">Adicionar Matéria</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 mg-b-15">
                                <div class="hpanel widget-int-shape responsive-mg-b-30">
                                    <div class="panel-body">
                                        <div class="text-center content-box">
                                            <div class="m icon-box">
                                                <i class="fa fa-bell"></i>
                                            </div>
                                            <h2 class="m-b-xs">Registrar Avisos</h2>
                                            <p class="small mg-t-box">
                                                Avisos sobre o sistema: novas uncionalidades ou atualizações.
                                            </p>
                                            <a class="btn btn-custon-four btn-info widget-btn-2 btn-sm" style="color:white;">Registrar avisos</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 mg-b-15">
                                <div class="hpanel widget-int-shape responsive-mg-b-30">
                                    <div class="panel-body">
                                        <div class="text-center content-box">
                                            <div class="m icon-box">
                                                <i class="fa fa-cog"></i>
                                            </div>
                                            <h2 class="m-b-xs">Configurar sistema</h2>
                                            <p class="small mg-t-box">
                                                Nesta página, configure elementos importantes do sistema.
                                            </p>
                                            <a class="btn btn-custon-four btn-info widget-btn-2 btn-sm" style="color:white;">Configurar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

            </div>
</div>
