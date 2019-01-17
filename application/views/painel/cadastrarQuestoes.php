<div class="mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="bg-site">
          <!-- C O N T E U D O -->

          <div class="card" >
              <div class="card-header" id="dash-professor-card-title">
                <h4>Cadastrar questões</h4>
            </div>
            <br><br>
            <div class="card-body">
                <div class="row">
                  <div class="col-lg-8 col-lg-offset-2">
                    <?php echo get_msg();?>
                    <?php echo form_open('','');?>
                    <div class="row">
                       <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                        <div class="tinymce-single responsive-mg-b-30">
                            <div class="alert-title">
                                <h2>Enunciado da questão</h2>
                            </div>
                            <div id="summernote1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
