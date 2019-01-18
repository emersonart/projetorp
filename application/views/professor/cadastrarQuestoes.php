<div class="mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="bg-site">
          <!-- C O N T E U D O -->
          <?php echo get_msg();?>
          <?php echo form_open_multipart();?>
          
        </div>
      </div>
    </div>
  </div>
</div>
<div class="single-pro-review-area mt-t-30 mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                }
                ?>
               <li class="<?php echo $ac;?>"><a href="#questao<?php echo $i;?>" style="padding-left: 20px;"><?php echo $n;?></a></li>
            <?php }?>
          </ul>
          <div id="myTabContent" class="tab-content custom-product-edit">
        <?php for($i=1;$i<=$qtd;$i++){
          if($i == 1){
                    $ac = "active";
                }else{
                    $ac = "";
                }
          if($i < 10){
                    $n = "0".$i;
                }?>
          
            <div class="product-tab-list tab-pane fade <?php echo $ac;?> in" id="questao<?php echo $i;?>">
             <div class="card" >
            <div class="card-header" id="dash-professor-card-title">
            </div>
            <br><br>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">

                  <div class="row">
                    <div class="col-lg-7 col-lg-offset-3">
                      <div class="tinymce-single responsive-mg-b-30">
                        <div class="alert-title">
                          <h2>Enunciado da questão <?php echo $n;?></h2>
                        </div>
                        <textarea class="summernote" name="questoes[]"></textarea>
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
                            <input type="text" id="prepend-big-btn" placeholder="Adicionar foto ou arquivo" name="fotos[]">
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
