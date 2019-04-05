<!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" <?php if($this->uri->segment(3) == 'responder'):echo "class='active'";endif;?>>
            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="<?php echo base_url('assets/img/logo/logo.png');?>" alt="" /></a>
                <strong><a href="index.html"><img class="main-logo-small" src="<?php echo base_url('assets/images/logo/logo-verde.png');?>" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="<?php echo menu_active('dashboard');?>">
                            <a href="<?php echo base_url('dashboard');?>">
                                <span class="educate-icon educate-home icon-wrap"></span>
                                <span class="mini-click-non">Dashboard</span>
                            </a>
                        </li>
                        <?php if($usuario['perm']==2){$ic = 'professor';}else if($usuario['perm'] == 1){$ic = 'student';}else{$ic = 'menu';} ?>
                        <li class="<?php echo menu_active('perfil');?>">
                            <a title="Landing Page" href="<?php echo base_url('perfil');?>" aria-expanded="false"><span class="educate-icon educate-<?php echo $ic;?> icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Perfil</span></a>
                        </li>
                        <li class="<?php echo menu_active('turmas');?>">
                            <a class="has-arrow" href="all-professors.html" aria-expanded="false"><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Turmas</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li class="<?php echo menu_active('turmas');?>"><a title="All Professors" href="<?php echo base_url('turmas');?>"><span class="mini-sub-pro">Minhas turmas</span></a></li>
                                <?php if(verif_login('',2,false)){?>
                                <li class="<?php echo menu_active('professor/criarsala');?>"><a title="Add Professor" href="<?php echo base_url('professor/criarsala')?>"><span class="mini-sub-pro">Criar Turma</span></a></li>
                                <!--li class="<?php echo menu_active('professor/aprovarcadastro');?>"><a title="Edit Professor" href="<?php echo base_url('professor/aprovarcadastro');?>"><span class="mini-sub-pro">Aprovar Cadastro</span></a></li-->
                                <?php }?>
                            </ul>
                        </li>
                        <?php if($usuario['perm'] == 1){ ?>
                            <li class="<?php echo menu_active('alunos/boletim');?>">
                                <a href="<?php echo base_url('alunos/boletim');?>">
                                 <span class="educate-icon educate-form icon-wrap"></span>
                                <span class="mini-click-non">Meu Boletim</span>
                                </a>
                            </li>
                        <?php }?>

                         <?php if($usuario['perm'] != 1){ ?>
                             <li class="<?php echo menu_active('estatisticas');?>">
                                <a href="<?php echo base_url('estatisticas');?>">
                                 <span class="educate-icon educate-form icon-wrap"></span>
                                <span class="mini-click-non">Estatísticas</span>
                                </a>
                            </li>
                         <?php } ?>
                        
                        <?php if(verif_login('',0,false)){?>
                        <li class="<?php echo menu_active('administrativo/novoprofessor');?>">
                            <a class="has-arrow" href="all-professors.html" aria-expanded="false"><span class="educate-icon educate-settings icon-wrap"></span> <span class="mini-click-non">Administrativo</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li class="<?php echo menu_active('administrativo/novoprofessor');?>"><a title="Adicionar novo professor" href="<?php echo base_url('administrativo/novoprofessor');?>"><span class="mini-sub-pro">Add professor</span></a></li>
                                <li class="<?php echo menu_active('administrativo/novamateria');?>"><a title="Adicionar nova matéria" href="<?php echo base_url('administrativo/novamateria')?>"><span class="mini-sub-pro">Add Matéria</span></a></li>
                                <li class="<?php echo menu_active('administrativo/configs');?>"><a title="Configurar Sistema" href="<?php echo base_url('administrativo/configs');?>"><span class="mini-sub-pro">Config sistema</span></a></li>
                            </ul>
                        </li>
                        <?php }?>
                        <li>
                            <a href="<?php echo base_url('sair');?>"><span class="educate-icon educate-pages icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Sair</span></a>
                        </li>
                        
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
     <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li class="<?php echo menu_active('dashboard');?>"><a href="<?php echo base_url('dashboard');?>">Dashboard</a>
                                        </li>
                                        <li class="<?php echo menu_active('perfil');?>"><a href="<?php echo base_url('perfil');?>">Perfil</a></li>
                                        <li class="<?php echo menu_active('turmas');?>"><a data-toggle="collapse" data-target="#demoevent" href="#">Turmas </a>
                                            <ul id="demoevent" class="collapse dropdown-header-top">
                                                <li><a href="<?php echo base_url('turmas');?>">Minhas Turmas</a>
                                                </li>
                                                <?php if(verif_login('',2,false)){?>
                                                <li><a href="<?php echo base_url('professor/criarsala');?>">Criar Turma</a>
                                                </li>
                                               
                                                 <?php } ?>
                                            </ul>
                                        </li>
                                        <li><a href="<?php echo base_url('sair');?>">Sair</a></li>
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
   

            <!-- Mobile Menu end -->