<div class="single-pro-review-area mt-t-30 mg-b-15">
	<div class="container-fluid">
		<div class="row ">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="analysis-progrebar " style="clear: both;">
					<div class="analysis-progrebar-content row">
						<div class="col-lg-6 col-md-5 col-sm-5 col-xs-5 fixq">
                            <p>
                                <b>Aluno:</b> <?php echo $aluno['inf_name'].' '.$aluno['inf_lastname'];?> - <a href="<?php echo base_url('perfil/'.$aluno['usu_login']);?>" target="_blank">Ver Perfil</a>
                            </p>
                            <p>
                                <b>Matrícula: </b><?php echo $aluno['inf_registration'];?>
                            </p>
                            <p>
                                <b>Email:</b> <?php echo $aluno['inf_email'];?>
                            </p>
                            <?php if(!$semresposta){?>
                            <p>
                                <b>Tentativas: </b><?php echo $lista[0]['ans_tries'];?>
                            </p>
                            <p> 
                                <?php 
                                    $data = explode(' ',$lista[0]['ans_date'])[0];
                                    $hora = explode(' ',$lista[0]['ans_date'])[1];
                                ?>
                                <b>Última Tentativa: </b><?php echo converter_data($data,3);?> às <?php echo $hora;?>
                            </p>
                        <?php }?>
                            <hr class="divis">
                        </div>

						<div class="col-lg-6 col-md-7 col-sm-7 col-xs-7 fixq">
                            <div class="row ">
                                <div class=" col-lg-7 col-md-7 col-sm-6 col-xs-12 mg-b-15">
                                    <p>
                                        <b>Matéria: </b><?php echo $turma['sub_nome'];?>
                                    </p>
                                    <p>
                                        <b>Turma: </b><?php echo $turma['cla_nome'];?>
                                    </p>
                                    <p><b>Nota desta Lista:</b></p>
                                    <?php if($profok){ ?>
                                        <?php echo form_open();?>
                                    
        							<div class="btn-group btn-custon-four" data-toggle="buttons">
        								<label class="btn btn-lg btn-success notalista <?php echo respostal('a',$nota)?>">
        									<input <?php echo respostal('a',$nota,TRUE)?> type="radio" name="notaLista" value="a"> A
        								</label>
        								<label class="btn btn-lg btn-primary notalista <?php echo respostal('b',$nota)?>">
        									<input <?php echo respostal('b',$nota,TRUE)?> type="radio" name="notaLista" value="b"> B
        								</label>
        								<label class="btn btn-lg btn-info notalista <?php echo respostal('c',$nota)?>">
        									<input <?php echo respostal('c',$nota,TRUE)?> type="radio" name="notaLista" value="c"> c
        								</label>
        								<label class="btn btn-lg btn-warning notalista <?php echo respostal('d',$nota)?>">
        									<input <?php echo respostal('d',$nota,TRUE)?> type="radio" name="notaLista" value="d"> D
        								</label>
                                        <label class="btn btn-lg btn-danger  notalista <?php echo respostal('e',$nota)?>">
                                            <input <?php echo respostal('e',$nota,TRUE)?> type="radio" name="notaLista" value="e"> E
                                        </label>
        							</div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 mg-b-15" style="vertical-align: middle;">
                                    <button type="submit" id="myButton" class="btn btn-success btn-custon-four bt-resposta" >
                                        Corrigir lista
                                    </button>
                                </div>

                                <?php echo form_close();?>
                                <?php }else{?>
                                    <div class="btn-group btn-custon-four" data-toggle="buttons">
                                        <label class="btn btn-lg btn-success notalista <?php echo respostal('a',$nota)?>">
                                             A
                                        </label>
                                        <label class="btn btn-lg btn-primary notalista <?php echo respostal('b',$nota)?>">
                                            B
                                        </label>
                                        <label class="btn btn-lg btn-info notalista <?php echo respostal('c',$nota)?>">
                                           C
                                        </label>
                                        <label class="btn btn-lg btn-warning notalista <?php echo respostal('d',$nota)?>" >
                                            D
                                        </label>
                                        <label class="btn btn-lg btn-danger notalista <?php echo respostal('e',$nota)?>" >
                                            E
                                        </label>
                                    </div>
                                <?php }?>
                            </div>
						</div>
						
					</div>
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

                            <?php if($me = get_msg()){ ?>
                                <div class="bg-site col-lg-12 col-md-12 col-sm-12 col-xs-12 mg-b-15">
                                  <?php echo $me;?>

                                </div>
                              <?php } ?>
                                <ul id="myTabedu1" class="tab-review-design">
                                    
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
                                   <li style="margin-bottom: 40px" class="<?php echo $ac;?>" style="text-align: center;"><a href="#questao<?php echo $q;?>" style="background: #f9f9f9!important;"><?php echo $n;?></a></li>
                                <?php } }?>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
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
                                                                <?php echo $linha['act_enunciado'];?>
                                                            </div>
                                                            <?php if($linha['act_foto'] != ''){?>
                                                              <div class="img-pergunta">
                                                                
                                                                <img src="<?php echo base_url($linha['act_foto']);?>">
                                                                
                                                              </div>
                                                              <?php }else{echo"<br>";}?>
                                    						<div class="respostaaluno">
                                                                <?php if(!$semresposta){?>
                                                                <?php echo $linha['ans_resposta'];?>  
                                                                <?php }elseif(!$semresposta && $linha['ans_resposta'] == ''){?> 
                                                                    Questão sem resposta
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