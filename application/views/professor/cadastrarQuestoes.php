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
                <div class="col-lg-12">
                  <?php echo get_msg();?>
                  <?php echo form_open('','');?>
                  <div class="row">
                   <div class="col-lg-7 col-lg-offset-3">
                    <div class="tinymce-single responsive-mg-b-30">
                      <div class="alert-title">
                        <h2>Enunciado da questão</h2>
                      </div>
                      <div id="summernote1">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mg-b-15">
                  <div class="col-lg-7 col-lg-offset-3">
                  <div class="col-lg mg-b-15">
                    <div class="file-upload-inner ts-forms">
                      <div class="input prepend-big-btn">
                        <label class="icon-right" for="prepend-big-btn">
                          <i class="fa fa-download"></i>
                        </label>
                        <div class="file-button">
                          Procurar
                          <input type="file" onchange="document.getElementById('prepend-big-btn').value = this.value;">
                        </div>
                        <input type="text" id="prepend-big-btn" placeholder="Adicionar foto ou arquivo">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-8 col-lg-offset-2">
                  <div class="col-lg">
                  <button class="btn btn-success btn-custon-four loginbtn btn-block btn-lg" type="submit">Cadastrar questão</button>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
