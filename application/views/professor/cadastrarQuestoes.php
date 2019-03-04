<div class="single-pro-review-area mt-t-30 mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
        <div class="row" style="margin: 0;">
          <?php if($me = get_msg()){ ?>
            <div class="bg-site col-lg-12 col-md-12 col-sm-12 col-xs-12 mg-b-15">
              <?php echo $me;?>

            </div>
          <?php } ?>
          
          <div class="bg-site col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- C O N T E U D O -->

            <?php echo form_open_multipart();?>
            <div class="form-group-inner">

             <label>Defina um nome para essa lista</label>
             <input type="text" class="form-control" placeholder="Nome da Lista" name="nomeLista" required="" value="<?php echo set_value('nomeLista'); ?>">
           </div>
           <div class="form-group-inner">
            <label>Data final para responder</label>
            <div class="input-group">
              <label class="input-group-addon" id="basic-addon1"> <i class="fa fa-calendar"></i></label>
              <input value="<?php echo set_value('enddate'); ?>" type="date" class="form-control" aria-describedby="basic-addon1" name="enddate">
            </div>
          </div>

          <div class="form-group-inner">
           <label>Hora final para responder</label>
           <div class="input-group">
              <label class="input-group-addon" id="basic-addon1"> <i class="fa fa-clock-o"></i></label>
               <input type="time" class="form-control" placeholder="Hora final" name="endtime" required="" value="<?php echo set_value('endtime'); ?>">
            </div>
          
         </div>
         <div class="row">

          <div class="col-lg-8 col-lg-offset-2 mg-t-30">
            <div class="col-lg">
              <button class="btn btn-success btn-custon-four loginbtn btn-block btn-lg" type="submit">Cadastrar Questões</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
    <div class="product-payment-inner-st">
      <ul id="myTabedu1" class="tab-review-design">
        <?php for($i=1;$i<=$qtd;$i++){
          if($i == 1){
            $ac = "active";
          }else{
            $ac = "";
          }
          if($i < 10){
            $n = "0".$i;
          }else{
            $n = $i;
          }
          ?>
          <li style="margin-bottom: 40px" class="<?php echo $ac;?>" style="text-align: center;"><a href="#questao<?php echo $i;?>" style="background: #f9f9f9!important;"><?php echo $n;?></a></li>
        <?php }?>
      </ul>
      <div id="myTabContent" class="tab-content custom-product-edit" style="margin-top: -30px;">
        <?php for($i=1;$i<=$qtd;$i++){
          if($i == 1){
            $ac = "active";
          }else{
            $ac = "";
          }
          if($i < 10){
            $n = "0".$i;
          }else{
            $n = $i;
          }
          ?>
          
          <div class="product-tab-list tab-pane fade <?php echo $ac;?> in" id="questao<?php echo $i;?>">
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
                        <textarea id="q<?php echo $i;?>" class="summernote" name="questoes[]" ><?php echo set_value('questoes[]'); ?></textarea>
                      </div>
                    </div>
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
                          <input id="f<?php echo $i;?>" type="file" accept="image/x-png,image/gif,image/jpeg,image/jpg" name="fotos[]" onchange="document.getElementById('prepend-big-btn-<?php echo $i;?>').value = this.value;">
                        </div>
                        <input type="text" id="prepend-big-btn-<?php echo $i;?>" placeholder="Adicionar foto ou arquivo">
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
    <?php }?>

  </div>
</div>
<?php echo form_close();?>
</div>
</div>
</div>
</div>
