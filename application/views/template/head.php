<!DOCTYPE html>
<html class="no-js" lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $titulo;?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $site_favicon;?>">
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
     <!-- meanmenu icon CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/meanmenu.min.css');?>">
    <!-- educate icon CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/educate-custon-icon.css');?>">
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
    <!-- alerts CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/alerts.css');?>">
    
    <!-- notifications CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/notifications/Lobibox.min.css');?>">
     <link rel="stylesheet" href="<?php echo base_url('assets/css/notifications/notifications.css');?>">
    <!-- buttons CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/buttons.css');?>">
    <!-- chosen CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/chosen/bootstrap-chosen.css');?>">
    <!-- cmodals CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/modals.css');?>">
    <!-- summernote CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/summernote/summernote.css');?>">
     <!-- datatable CSS
        ============================================ -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/data-table/bootstrap-table.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/data-table/datatables.css');?>">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/style.css');?>">
     <!-- codemirror CSS and JS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/code-editor/codemirror.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/code-editor/ambiance.css');?>">
    <script src="<?php echo base_url('assets/js/code-editor/codemirror.js');?>"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.js"></script>
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css');?>">
        <!-- dropzone CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dropzone/dropzone.css');?>">
    <?php 
            if($this->uri->segment(3) == 'responder'):
        ?>
                <script src="<?php echo base_url('assets/js/formulas-lib/formula-lib.js');?>"></script>
        <?php
            endif;
        ?>

</head>

<body <?php 
            if($this->uri->segment(3) == 'responder'):
        ?>onkeydown="whichButton(event)" <?php
            endif;
        ?> <?php if($this->uri->segment(3) == 'responder'):echo "class='mini-navbar'";endif;?>>

    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->