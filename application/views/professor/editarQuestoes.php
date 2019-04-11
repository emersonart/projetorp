<div class="single-pro-review-area mt-t-30 mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
        <div class="row" style="margin: 0;">

          <?php if($me = get_msg()){ ?>
          <div class="bg-site col-lg-12 col-md-12 col-sm-12 col-xs-12 mg-b-15">
            <?php print_r($me);?>

          </div>
          <?php } ?>
          <div class="bg-site col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- C O N T E U D O -->

            <?php echo form_open_multipart();?>
            <div class="form-group-inner">
             <label>Novo nome da lista</label>
             <input type="text" class="form-control" placeholder="Nome da Lista" name="nomeLista" required="" value="<?php echo html_escape($oklista['lis_name']); ?>">
           </div>
           <div class="form-group-inner">
            <label>Data final para responder</label>
            <div class="input-group">
              <label class="input-group-addon" id="basic-addon1"> <i class="fa fa-calendar"></i></label>
              <?php 
              if(!empty($oklista['lis_endtime']) and isset($oklista['lis_endtime'])){
                $date = explode(' ',$oklista['lis_endtime']);
                $time = $date[1];
                $date = converter_data($date[0],4);
              }else{
                $date = $time = NULL;
              }
              ?>
              <input value="<?php echo $date; ?>" type="date" class="form-control" aria-describedby="basic-addon1" required ="" name="enddate">
            </div>
          </div>
          
          <div class="form-group-inner">
           <label>Hora final para responder</label>
           <div class="input-group">
            <label class="input-group-addon" id="basic-addon1"> <i class="fa fa-clock-o"></i></label>
            <input type="time" class="form-control" placeholder="Hora final" name="endtime" required="" value="<?php echo $time; ?>">
          </div>
          
        </div>
        <div class="form-group-inner">
         <label>Liberar gabarito</label>
         <div class="input-group" style="margin-left: auto;margin-right: auto;">
         <?php 
              if($oklista['lis_gab_status'] == 0){
                $na = 'active';
                $si = '';
              }else{
                $na = '';
                $si = 'active';
              }
          ?>
          <div class="btn-group btn-custon-four" data-toggle="buttons">
            <label class="btn btn-lg btn-danger notalista <?php echo $na?>" style="color:white;padding-left: 3.2rem;padding-right: 3.2rem;" >
            <input type="radio" name="status_gab" value="n" <?php echo $na ? 'checked':''?>> <strong>NÃO</strong>
            </label>
            <label class="btn btn-lg btn-success notalista <?php echo $si?>" style="color:white;padding-left: 3.2rem;padding-right: 3.2rem;">
              <input type="radio" name="status_gab" value="s" <?php echo $si ? 'checked':''?>> <strong>SIM</strong>
            </label>
          </div>
        </div>
      </div>
      <div class="form-group-inner">
         <label>Liberar para resposta?</label>
         <div class="input-group" style="margin-left: auto;margin-right: auto;" >
         <?php 
              if($oklista['lis_res_status'] == 0){
                $na1 = 'active';
                $si1 = '';
              }else{
                $na1 = '';
                $si1 = 'active';
              }
          ?>
          <div class="btn-group btn-custon-four text-center" style="margin-left: auto;margin-right: auto;" data-toggle="buttons">
            <label class="btn btn-lg btn-danger notalista <?php echo $na1?>" style="color:white;padding-left: 3.2rem;padding-right: 3.2rem;" >
            <input type="radio" name="status_res" value="n" <?php echo $na1 ? 'checked':''?>> <strong>NÃO</strong>
            </label>
            <label class="btn btn-lg btn-success notalista <?php echo $si1?>" style="color:white;padding-left: 3.2rem;padding-right: 3.2rem;">
              <input type="radio" name="status_res" value="s" <?php echo $si1 ? 'checked':''?>> <strong>SIM</strong>
            </label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 mg-t-30">
          <div class="col-lg">
            <button class="btn btn-success btn-custon-four loginbtn btn-block btn-lg" type="submit">Editar Lista</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
  <div class="product-payment-inner-st">
    <ul id="myTabedu1" class="tab-review-design">
      <?php if(!empty($lista) && isset($lista) && sizeof($lista) > 0){ 
        $q = 0;
        foreach ($lista as $linha) {
          $q+=1;
          if($q == 1){
            $ac = "active";
          }else{
            $ac = "";
          }
          if($q < 10){
            $n = "0".$q;
          }else{
            $n = $q;
          }
          ?>
          <li style="margin-bottom: 40px" class="<?php echo $ac;?>" style="text-align: center;"><a href="#questao<?php echo $q;?>" style="background: #f9f9f9!important;"><?php echo $n;?></a></li>
          <?php } }?>
        </ul>
        <div id="myTabContent" class="tab-content custom-product-edit" style="margin-top: -30px;">
          <?php 
          if(!empty($lista) && isset($lista) && sizeof($lista) > 0){ 
            $q = 0;
            foreach ($lista as $linha) {
              $q+=1;
              if($q == 1){
                $ac = "active";
              }else{
                $ac = "";
              }
              if($q < 10){
                $n = "0".$q;
              }else{
                $n = $q;
              }
              ?>

              <div class="product-tab-list tab-pane fade <?php echo $ac;?> in" id="questao<?php echo $q;?>">
               <div class="card" >
                <div class="card-header mg-t-15 text-center" id="dash-professor-card-title">
                  <h4>Enunciado da questão <?php echo $n;?></h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">

                      <div class="row">
                        <div class="col-lg-12">
                          <div class="tinymce-single responsive-mg-b-30">
                            <div class="alert-title">

                            </div>
                            <textarea id="q<?php echo $q;?>" class="summernote" name="questoes[]"><?php echo html_escape($linha['act_enunciado']); ?></textarea>
                            <input type="hidden" name="id_questao[]" value="<?php echo $linha['act_id'];?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">

                        <?php if($linha['act_foto'] != ''){?>
                        <div class="col-lg-6" style="padding:10px 35px 35px 35px;">
                          <div class="alert alert-sucess alert-st-one" role="alert">
                            <i class="fa fa-check edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                            <p class="message-mg-rt"><strong>show!</strong> Essa questão possui imagem cadastrada atualmente.</p>
                          </div>
                          <div class="alert alert-warning alert-st-three" role="alert">
                            <i class="fa fa-exclamation-triangle edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                            <p class="message-mg-rt"><strong>Lembre-se!</strong> Ao enviar uma novo foto, a atual será removida dos nossos servidores e nova imagem ficará no lugar!</p>
                          </div>
                        </div>
                        <div class="col-lg-6" style="padding:10px 35px 35px 35px; text-align: center;" >
                          <a data-toggle="tooltip" data-placement="top" title="Excluir Foto" href="<?php echo base_url('turma/'.$oklista['lis_cla_hash'].'/lista/'.$oklista['lis_id'].'/delfoto/'.$linha['act_id']);?>" class="removefoto"><i class="fa fa-close"></i></a>
                          <img src="<?php echo base_url($linha['act_foto']);?>">
                        </div>
                        <?php }else{ ?>
                        <div class="col-lg-12 " style="padding:10px 35px 35px 35px;">
                          <div class="alert alert-info alert-st-two" role="alert">
                            <i class="fa fa-info edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                            <p class="message-mg-rt"><strong>ops!</strong> Essa questão não possui imagem cadastrada atualmente.<br>Envie uma imagem para esta questão</p>
                          </div>
                        </div>
                        <?php } ?>

                      </div>
                      <div class="row">
                        <div class="col-lg-12 " style="padding:10px 35px 35px 35px;">
                         <label>Faça o upload da foto da questão</label>
                         <div class="file-upload-inner ts-forms">
                          <div class="input prepend-big-btn">
                            <label class="icon-right" for="prepend-big-btn">
                              <i class="fa fa-download"></i>
                            </label>
                            <div class="file-button">
                              <span style="padding: 0 10px">Procurar</span>
                              <input id="f<?php echo $q;?>" type="file" accept="image/x-png,image/gif,image/jpeg,image/jpg" name="fotos[]" onchange="document.getElementById('prepend-big-btn-<?php echo $q;?>').value = this.value;">
                            </div>
                            <input type="text" id="prepend-big-btn-<?php echo $q;?>" placeholder="Adicionar foto ou arquivo">
                          </div>
                        </div>


                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- FIM DA questao  -->
          <?php }}?>

        </div>
      </div>
      <?php echo form_close();?>
    </div>
  </div>
</div>
</div>
