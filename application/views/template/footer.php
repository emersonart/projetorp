

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <!-- F O O T E R -->

    <div class="footer-copyright-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-copy-right">
                    <p>sql time: {elapsed_time} | memory used: {memory_usage}</p>
                    <p><?php echo $nomeSite;?></p>
                    <p>Copyright © <?php echo date('Y')?>. Desenvolvido por: <?php echo $site_author;?>. Template por <a style="color:black" href="https://colorlib.com/wp/templates/">Colorlib</a></p>
                    <p>versão: <?php echo $version_site;?></p>
                </div>
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
    <!-- counterup JS
        ============================================ -->
        <script src="<?php echo base_url('assets/js/counterup/jquery.counterup.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/counterup/waypoints.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/counterup/counterup-active.js');?>"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
        <script src="<?php echo base_url('assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/scrollbar/mCustomScrollbar-active.js');?>"></script>
    <!-- metisMenu JS
        ============================================ -->
        <script src="<?php echo base_url('assets/js/metisMenu/metisMenu.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/metisMenu/metisMenu-active.js');?>"></script>
    <!-- morrisjs JS
        ============================================ -->
        <script src="<?php echo base_url('assets/js/morrisjs/raphael-min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/morrisjs/morris.js');?>"></script>
        <script src="<?php echo base_url('assets/js/morrisjs/morris-active.js');?>"></script>
    <!-- morrisjs JS
        ============================================ -->
        <script src="<?php echo base_url('assets/js/sparkline/jquery.sparkline.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/sparkline/jquery.charts-sparkline.js');?>"></script>
        <script src="<?php echo base_url('assets/js/sparkline/sparkline-active.js');?>"></script>
     <!-- calendar JS
        ============================================ -->
        <script src="<?php echo base_url('assets/js/calendar/moment.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/calendar/fullcalendar.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/calendar/fullcalendar-active.js');?>"></script>
        <!-- pwstrength JS
        ============================================ -->
    <script src="<?php echo base_url('assets/js/password-meter/pwstrength-bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/password-meter/zxcvbn.js');?>"></script>
    <script src="<?php echo base_url('assets/js/password-meter/password-meter-active.js');?>"></script>
    <!-- tab JS
        ============================================ -->
        <script src="<?php echo base_url('assets/js/tab.js');?>"></script>
    <!-- chosen JS
        ============================================ -->
        <script src="<?php echo base_url('assets/js/chosen/chosen.jquery.js');?>"></script>
        <script src="<?php echo base_url('assets/js/chosen/chosen-active.js');?>"></script>
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
    <!-- summernote JS
        ============================================ -->
        <script src="<?php echo base_url('assets/js/summernote/summernote.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/summernote/summernote-active.js');?>"></script>
        <script src="<?php echo base_url('assets/js/summernote/lang/summernote-pt-BR.js');?>"></script>
        <script src="<?php echo base_url('assets/js/summernote/lang/summernote-ko-KR.js');?>"></script>
    <!-- notification JS 
        ============================================ -->
        <script src="<?php echo base_url('assets/js/dropzone/dropzone.js');?>"></script>
    <!-- dropzone JS
        ============================================ -->
        <script src="<?php echo base_url('assets/js/notifications/Lobibox.js');?>"></script>
        <script src="<?php echo base_url('assets/js/notifications/notification-active.js');?>"></script>
    <!-- modernizr JS
        ============================================ -->
        <script src="<?php echo base_url('assets/js/vendor/modernizr-2.8.3.min.js');?>"></script>
        <?php if($show_message_pop = get_msg_pop()){?>
            <script type="text/javascript">
                <?php echo $show_message_pop;?>
            </script>
        <?php }?>

        


    </body>

    </html>