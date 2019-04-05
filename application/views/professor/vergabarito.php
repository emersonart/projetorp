

<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">

                            <?php if($me = get_msg()){ ?>
                                <div class="bg-site col-lg-12 col-md-12 col-sm-12 col-xs-12 mg-b-15">
                                  <?php echo $me;?>

                                </div>
                              <?php } ?>
                                <ul id="myTabedu1" class="tab-review-design">
                                    
                                <?php
                                    if(!empty($questoes) && isset($questoes) && sizeof($questoes) > 0){ 
                                        $q = 0;
                                        foreach ($questoes as $linha) {
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
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <?php
                                    if(!empty($questoes) && isset($questoes) && sizeof($questoes) > 0){ 
                                        $q = 0;
                                        for($i = 0; $i < count($questoes);$i++) {
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
                                <div style="margin-top: -30px;"class="product-tab-list tab-pane fade in <?php echo $ac;?>" id="questao<?php echo $q;?>">
                                    <div class="row">
                                    	<div class="container-fluid">
                                    		<div class="row">
                                    			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    				<div class="charts-single-pro responsive-mg-b-15">
                                    					<div class="alert-title" style="position: relative;">
                                    						<h2> (Questão <?php echo $q; ?>)<br style="line-height: 30px;">
                                                            </h2>
                                                            <div class="enunciado">
                                                                <?php echo $questoes[$i]['act_enunciado'];?>
                                                            </div>
                                                            <?php if($questoes[$i]['act_foto'] != ''){?>
                                                              <div class="img-pergunta">
                                                                
                                                                <img src="<?php echo base_url($questoes[$i]['act_foto']);?>">
                                                                
                                                              </div>
                                                              <?php }else{echo"<br>";}?>
                                    						<div class="respostaaluno">
                                                                <?php if($gabarito){?>
                                                                <?php echo $gabarito[$i]['fed_resposta'];?>  
                                                                <?php }else{?>
                                                                    Lista ainda sem resposta 
                                                                <?php }?>                 
                                                            </div>
                                    					</div>
                                    				</div>
                                    			</div>
                                    		</div>
                                    	</div>
                                    </div>
                                </div>
                                <!-- FIM DA PRIMEIRA TABELA -->
                            <?php }}?>

								


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>