
<!-- Start Welcome area -->
<div class="all-content-wrapper">
    
    <div class="header-advance-area">
        <div class="header-top-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-top-wraper">
                            <div class="row">
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                    <div class="menu-switcher-pro" >
                                        <button type="button" data-toggle="tooltip" data-placement="right" title="Mostrar/Esconder menu" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                           <i class="educate-icon educate-nav"></i>
                                       </button>
                                   </div>
                               </div>
                               <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="header-top-menu tabl-d-n">
                                    <div class="logo-pro">
                                        <a href="index.html"><img class="main-logo" src="<?php echo base_url('assets/img/logo/logo.png');?>" alt="" /></a>
                                    </div>
                                </div>
                            </div>

                            <div class=" col-lg-7 col-md-7 col-sm-6 col-xs-7">
                                <div class="header-right-info">
                                    <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                        <li class="nav-item dropdown">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-message edu-chat-pro" aria-hidden="true"></i><span class="indicator-ms"></span></a>
                                            <div role="menu" class="author-message-top dropdown-menu animated fadeIn faster">
                                                <div class="message-single-top">
                                                    <h1>Mensagens</h1>
                                                </div>
                                                <ul class="message-menu">
                                                    <li>
                                                        <a href="#">
                                                            <div class="message-img">
                                                                <img src="<?php echo base_url('assets/img/contact/1.jpg');?>" alt="">
                                                            </div>
                                                            <div class="message-content">
                                                                 <span class="message-date"></span>
                                                                <div class="alert alert-warning alert-st-three" role="alert">
                                                                    <i class="fa fa-exclamation-triangle edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                                                                    <p class="message-mg-rt"><strong>Aviso!</strong> Função ainda sendo implementada, botão de atualizar sem funcionar!</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="message-view">
                                                    <a href="#"></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-bell" aria-hidden="true"></i><span class="indicator-nt"></span></a>
                                            <div role="menu" class="notification-author dropdown-menu animated fadeIn faster">
                                                <div class="notification-single-top">
                                                    <h1>Notificações</h1>
                                                </div>
                                                <ul class="notification-menu">
                                                    <li>
                                                        <a href="#">
                                                            <div class="notification-icon">
                                                                <i class="educate-icon educate-checked edu-checked-pro" aria-hidden="true"></i>
                                                            </div>
                                                            <div class="notification-content">
                                                                <span class="notification-date">16 Sept</span>
                                                               <div class="alert alert-warning alert-st-three" role="alert">
                                                                    <i class="fa fa-exclamation-triangle edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                                                                    <p class="message-mg-rt"><strong>Aviso!</strong> Função ainda sendo implementada, botão de atualizar sem funcionar!</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>

                                                </ul>
                                                <div class="notification-view">
                                                    <a href="#"></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                             <img src="<?php echo base_url('assets/img/profile/1.jpg');?>" alt="" />
                                             <span class="admin-name"><?php echo $usuario['nome'];?></span>
                                             <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                         </a>
                                         <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated fadeIn faster">
                                            <li><a href="<?php echo base_url('perfil');?>"><span class="edu-icon edu-user-rounded author-log-ic"></span>Meu perfil</a>
                                            </li>
                                            <li><a href="<?php echo base_url('sair');?>"><span class="edu-icon edu-locked author-log-ic"></span>Sair</a>
                                            </li>
                                        </ul>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">

                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                            <h1><?php echo $h1; ?></h1>
                            <?php if($this->uri->segment(3) == 'responder'){?>
                                <h4>Tentativa: <?php echo $tentativas;?></h4>
                                <h4>Data final: <?php echo $data_final; ?></h4>
                           <?php } ?>
                           <?php if($this->uri->segment(3) == 'gabarito'){?>
                                <h4>Data final: <?php echo $data_final; ?></h4>
                           <?php } ?>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <form role="search" class="sr-input-func">
                                    <input type="text" placeholder="Procurar..." class="search-int form-control">
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
