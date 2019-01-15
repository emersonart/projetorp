<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Registrar no Koala Educational</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/favicon.ico');?>">
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css');?>">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.theme.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.transitions.css');?>">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css');?>">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/normalize.css');?>">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css');?>">
    <!-- morrisjs CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/morrisjs/morris.css');?>">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/scrollbar/jquery.mCustomScrollbar.min.css');?>">
    <!-- metisMenu CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/metisMenu/metisMenu.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/metisMenu/metisMenu-vertical.css');?>">
    <!-- calendar CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/calendar/fullcalendar.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/calendar/fullcalendar.print.min.css');?>">
    <!-- forms CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/form/all-type-forms.css');?>">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/style.css');?>">
    <!-- ALERTS CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/alerts.css');?>">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css');?>">
    <!-- modernizr JS
        ============================================ -->
    <script src="<?php echo base_url('assets/js/vendor/modernizr-2.8.3.min.js');?>"></script>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center custom-login">
				<h3>Registration</h3>
				<p>This is the best app ever!</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <?php echo get_msg();?>
                        <?php echo form_open('','loginForm');?>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Login</label>
                                    <input class="form-control" name="login" type="text" value="<?php echo set_value('login'); ?>" placeholder="nome de usuário">
                                </div>
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
                                 <div class="form-group col-lg-6">
                                    <label>Nome</label>
                                    <input class="form-control" name="nome" type="text" value="<?php echo set_value('nome'); ?>" placeholder="Nome">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Sobrenome</label>
                                    <input class="form-control" name="sobrenome" type="text" value="<?php echo set_value('sobrenome'); ?>" placeholder="Sobrenome">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Email</label>
                                    <input class="form-control" type="name" name="email"  value="<?php echo set_value('email'); ?>" placeholder="email@host.com">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Matrícula</label>
                                    <input class="form-control" name="matricula" type="text"  value="<?php echo set_value('matricula'); ?>" placeholder="00000000000000">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Código da Turma</label>
                                    <input class="form-control" name="codigoturma" type="text"  value="<?php echo set_value('codigoturma'); ?>" placeholder="fiy7n4">
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-success loginbtn" type="submit">Register</button>
                                <button class="btn btn-default" type="reset">Cancel</button>
                            </div>
                        <?php echo form_close();?>
                    </div>
                </div>
			</div>
            <!-- 
                ESSA PARADA É PRA GERAR A KEY
                TROCA FI PELA INICIAL DA MATERIA
                ?php echo 'fi'.bin2hex($this->encryption->create_key(2));? 
            -->
			<div class="text-center login-footer">
				<p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
			</div>
		</div>   
    </div>
    <!-- jquery
        ============================================ -->
    <script src="<?php echo base_url('assets/js/vendor/jquery-1.12.4.min.js');?>"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <!-- wow JS
        ============================================ -->
    <script src="<?php echo base_url('assets/js/wow.min.js');?>"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="<?php echo base_url('assets/js/jquery-price-slider.js');?>"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="<?php echo base_url('assets/js/jquery.meanmenu.js');?>"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="<?php echo base_url('assets/js/owl.carousel.min.js');?>"></script>
    <!-- sticky JS
        ============================================ -->
    <script src="<?php echo base_url('assets/js/jquery.sticky.js');?>"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="<?php echo base_url('assets/js/jquery.scrollUp.min.js');?>"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="<?php echo base_url('assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/scrollbar/mCustomScrollbar-active.js');?>"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="<?php echo base_url('assets/js/metisMenu/metisMenu.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/metisMenu/metisMenu-active.js');?>"></script>
    <!-- pwstrength JS
        ============================================ -->
    <script src="<?php echo base_url('assets/js/password-meter/pwstrength-bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/password-meter/zxcvbn.js');?>"></script>
    <script src="<?php echo base_url('assets/js/password-meter/password-meter-active.js');?>"></script>
    <!-- tab JS
        ============================================ -->
    <script src="<?php echo base_url('assets/js/tab.js');?>"></script>
    <!-- icheck JS
        ============================================ -->
    <script src="<?php echo base_url('assets/js/icheck/icheck.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/icheck/icheck-active.js');?>"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="<?php echo base_url('assets/js/plugins.js');?>"></script>
    <!-- main JS
        ============================================ -->
    <script src="<?php echo base_url('assets/js/main.js');?>"></script>
</body>

</html>