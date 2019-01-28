
<div class="mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10 col-sm-12 col-xs-12">
        <div class="bg-site">
          <!-- C O N T E U D O -->
          <div class="card" >
            <div class="card-header mg-b-30" id="dash-professor-card-title">
              <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                <?php echo get_msg();?>
                </div>
              </div>
            </div>
            <?php echo form_open();?>
            <div class="card-body">
              <div class="row mg-b-30">
                <div class="col-lg-10 col-lg-offset-1 ">
                  <div class="titulo-pergunta">
                    <b>Avisos para a turma</b>
                  </div>
                  <div class="tinymce-single responsive-mg-b-30 resposta-pergunta">
                    <div class="alert-title resposta">
                      <br>
                    </div>
                    <textarea class="summernote" name="informativo">
                      <?php echo $informativos; ?>
                        
                      </textarea>
                  </div>
                  <div class="sub-pergunta" style="text-align: right;">
                    <button type="submit" class="btn btn-custon-four btn-lg btn-success">Salvar</button>
                  </div>
                </div>
              </div>
             <?php echo form_close();?>
            </div>
          </div>
        <!-- FIM CONTEUDO -->
      </div>
    </div>
  </div>
</div>
