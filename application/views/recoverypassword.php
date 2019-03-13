<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html class="no-js" lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Esqueci minha senha no Koala Educational</title>
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
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css');?>">
    <!-- modernizr JS
		============================================ -->
    <script src="<?php echo base_url('assets/js/vendor/modernizr-2.8.3.min.js');?>"></script>
</head>

<body style="background: #29c75f;">
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				 <img src="<?php echo base_url('assets/images/logo/logo-branco.png');?>" style="width: 150px;height:auto;" >
				<p class="text-white logo-white"><span style="font-size: 1.6em;color: #18aa4a;background-color: white;border-radius: 2px;padding: 2px 8px;font-weight: 200;margin-right: 5px;">Koala</span>  educational</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <?php echo get_msg();?>
                        <?php echo form_open();?>
                            <div class="form-group">
                                <label class="control-label" for="user">Usuário, Matrícula ou Email</label>
                                <input type="text" placeholder="Nome de usuário ou matrícula" title="Please enter you username" required="" value="" name="userkoala" id="user" class="form-control">
                            </div>
                           
                            <button type="submit" class="btn btn-custon-four btn-success btn-block loginbtn">Redefinir Senha</button>
                        <?php echo form_close(); ?>
                        
                    </div>
                    <div class="text-center login-footer">
                            Copyright © <?php echo date('Y')?>. Desenvolvido por: Emerson Bruno e Tiago Coutinho. Template por <a style="color:black" href="https://colorlib.com/wp/templates/">Colorlib</a>
                        </div>
                </div>
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