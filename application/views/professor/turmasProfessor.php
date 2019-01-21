<div class="courses-area">
            <div class="container-fluid">
                <div class="row">

                    <?php 
                        if(isset($turmas) && sizeof($turmas) > 0){ 
                          foreach ($turmas as $linha) {
                    ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mg-b-15">
                        <div class="courses-inner res-mg-b-30">
                            <div class="courses-title">
                                <a href="#"><img src="<?php echo base_url('assets/img/courses/turmas/1.jpg');?>" alt=""></a>
                                <h2><?php echo $linha->cla_nome;?></h2>
                            </div>
                            <div class="courses-alaltic">
                                <span class="cr-ic-r" data-toggle="tooltip" data-placement="bottom" title="Número de alunos" ><span class="course-icon"><i class="fa fa-user"></i></span> <?php echo $this->turma->countAlunosTurma($linha->cla_hash);?></span>
                                <span class="cr-ic-r" data-toggle="tooltip" data-placement="bottom" title="Número de listas"><span class="course-icon"><i class="fa fa-check-square-o"></i></span> nº listas</span>
                            </div>
                            <div class="course-des">
                                <p><span><i class="fa fa-clock"></i></span> <b>Turma:</b> <?php echo $linha->cla_nome;?></p>
                                <p>
                                    <span><i class="fa fa-clock"></i></span> <b>Professor:</b>
                                    <?php if($this->session->userdata('perm') == 1): echo $this->turma->getInfoProf($linha->cla_teacher)->inf_name; else: echo $linha->inf_name; endif;?>
                                </p>
                                <p><span><i class="fa fa-clock"></i></span> <b>Matéria:</b>  <?php echo $linha->sub_nome;?></p>
                            </div>
                            <div class="course-buttons">
                                <a href="<?php echo base_url('turmas/view/'.$linha->cla_hash);?>" class="btn btn-custon-four btn-success">Ver Turma</a>
                            </div>
                        </div>
                    </div>
                    <?php } } ?>
                
                </div>
            </div>
        </div>