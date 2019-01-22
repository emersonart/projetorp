
<div class="mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10 col-sm-12 col-xs-12">
        <div class="bg-site">
          <!-- C O N T E U D O -->
          <div class="card" >
            <div class="card-header mg-b-30" id="dash-professor-card-title">
              <?php echo get_msg();?>
            </div>

            <div class="card-body">
              <?php 
                if(isset($lista) && sizeof($lista) > 0){ 
                  $q = 0;
                  echo form_open();
                  foreach ($lista as $linha) {
                  $q+=1;
              ?>
              <div class="row mg-b-30">
                <div class="col-lg-10 col-lg-offset-1 ">
                  <div class="titulo-pergunta">
                    <b>(Questão <?php echo $q.'):</b>'.$linha['act_enunciado']?>
                    <input type="hidden" name="qid[]" value="<?php echo $linha['act_id'];?>">
                    </div>
                    <?php if($linha['act_foto'] != ''){?>
                  <div class="img-pergunta">
                    
                    <img src="<?php echo base_url($linha['act_foto']);?>">
                    
                  </div>
                  <?php }else{echo"<br>";}?>
                  <div class="tinymce-single responsive-mg-b-30 resposta-pergunta">
                    <div class="alert-title resposta">
                      Resposta:
                    </div>
                    <textarea id="q" class="summernote1" name="respostas[]"><?php echo set_value('respostas[]'); ?></textarea>
                  </div>
                  <div class="sub-pergunta" style="text-align: right;">
                    <button type="submit" class="btn btn-custon-four btn-lg btn-success">Salvar</button>
                  </div>
                </div>
              </div>
              <hr style="margin: 35px">
                <?php 
                  }echo form_close();} 
                ?>
            </div>
          </div>
        <!-- FIM CONTEUDO -->
      </div>
    </div>
  </div>
</div>
