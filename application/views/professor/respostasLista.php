<div class="widget-program-box mg-b-15">
            <div class="container-fluid">
                <div class="row mg-b-15">
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline8-list">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1>Basic Table</h1>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="static-table-list">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nome</th>
                                                <th>Matrícula</th>
                                                <th>Status</th>
                                                <th>Nota</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php   
                                            if(!empty($aluno) && isset($aluno) && sizeof($aluno) > 0){ 
                                                $n = 0;
                                                foreach ($aluno as $linha) {
                                                    $n+=1;
                                    ?>
                                                    <tr>
                                                        <td><?php echo $n; ?></td>
                                                        <td><?php echo $linha->inf_name.' '.$linha->inf_lastname; ?></td>
                                                        <td><?php echo $linha->inf_registration; ?></td>
                                                        <td>
                                                        <?php
                                                            if($status = $this->questao->getRespostas(array('hash' => $hash, 'id_lista'=>$idlista, 'id_usuario'=>$linha->usu_id))){
                                                                $res = TRUE;
                                                                if($status[0]['ans_status'] == 1){
                                                                    $stat = '<span class="label label-success fxlb">Corrigida</span>';
                                                                }else if($status[0]['ans_status'] == 2){
                                                                    $stat = '<span class="label label-warning fxlb">Aguardando Recorreção</span>';
                                                                }else{
                                                                    
                                                                    $stat = '<span class="label label-info fxlb">Aguardando Correção</span>';
                                                                }

                                                                echo $stat;
                                                        ?>
                                                        <?php 
                                                            }else{
                                                                $res = FALSE;
                                                        ?>      
                                                                <span class="label label-danger fxlb">Aluno ainda respondeu</span>
                                                        <?php 
                                                            }
                                                        ?>

                                                        </td>
                                                        <td>
                                                            <?php 
                                                                if($nota = $this->questao->getNotaLista(array('id_lista' => $idlista, 'id_aluno'=>$linha->usu_id))){
                                                                    $nota = strtoupper($nota);
                                                                    switch ($nota) {
                                                                        case 'A':
                                                                            echo '<span class="label label-success exnota">'.$nota.'</span>';
                                                                            break;
                                                                        case 'B':
                                                                            echo '<span class="label label-primary exnota">'.$nota.'</span>';
                                                                            break;
                                                                        case 'C':
                                                                            echo '<span class="label label-warning exnota">'.$nota.'</span>';
                                                                            break;
                                                                        case 'D':
                                                                            echo '<span class="label label-danger exnota">'.$nota.'</span>';
                                                                            break;
                                                                        default:
                                                                            echo '<span class="label label-dark exnota">S/N</span>';
                                                                            break;
                                                                    }
                                                                }else{ ?>
                                                                     <span class="label label-dark exnota">S/N</span>
                                                               <?php } ?>
                                                                
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <?php if($res){?>
                                                                <a href="<?php echo base_url('turma/'.$hash.'/corrigir/'.$idlista.'/'.$linha->usu_id)?>" class="btn btn-md btn-default"><i class="fa fa-edit"></i></a>
                                                                <?php }else{?>
                                                                    <span class="label label-dark exnota">S/R</span>
                                                                <?php } ?></td>
                                                    </tr>
                                    <?php       
                                                }
                                            }
                                    ?>
                                           
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
</div>
