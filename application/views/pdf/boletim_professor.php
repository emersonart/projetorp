<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/main.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/style.css');?>">
	 <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css');?>">
	<link href="https://fonts.googleapis.com/css?family=Play:400,700,900" rel="stylesheet">

</head>
<body style="background-color: white;">
	
	<div class="container-fluid">
		<header>
			<div class="container">
				<div class="table-responsive">
				<table class="table">
					<thead>

							<th>1</th>
							<th>2</th>

					</thead>
					<tbody>
						<div class="row">
						<tr style="margin-top: 15px;">
							<td><img src="<?=base_url('assets/img/logo/logo.png')?>" width="150" height="40" style=""></td>
							<td><p style="font-weight: bold; padding-left: 3px;">Período:</p> <?= $turma['cla_per_id'] = '1'; $turma['cla_per_id'];?></td>
							<td><p style="font-weight: bold; padding-left: 3px;">Professor:</p> <?php 
							$prof = $turma['cla_teacher'];
							$profnome = $this->turma->getInfoProf($prof);
							print_r($profnome->inf_name);
							?></td>
							<td><p style="font-weight: bold; padding-left: 3px;">Turma:</p> <?=$turma['cla_nome']?></td>
							<td><p style="font-weight: bold; padding-left: 3px;">Matéria:</p> <?=$turma['sub_nome']?></td>
						</tr>
						</div>
					</tbody>
				</table>
			</div>
			</div>
		</header>
		<hr>
		<?php 

		$html = "<table class='table table-bordered'>
				<thead>
					<tr>
						<th style='padding: 10px 10px;'>Aluno</th>";
						for($k = 0; $k < count($nota_alunos[0]['respostas']); $k++) {
							$html.="<th style='padding: 10px 10px;'>".$nota_alunos[0]['respostas'][$k]['lis_name']."</th>";					
						}
		$html.= "</tr></thead>
		<tbody>";
		$l=0;
		foreach ($nota_alunos as $nota_aluno) {
		if($l%2 == 0){
			$d = 'background-color: #eee;';
		}else{
			$d ='';
		}
				$nome = $nota_aluno['inf_name'].' '.$nota_aluno['inf_lastname'];
				$nome = explode(' ',$nome);
				if(count($nome) >= 2){
					$nome = $nome[0].' '.$nome[1];
				}else{
					$nome = $nome[0];
				}
				
				$html.= "<tr style='".$d." padding-top: 15px;padding-bottom:15px;'><td style='padding: 5px 5x;".$d."'>".$nome.'</td>';


			for($u = 0; $u < count($nota_aluno['respostas']);$u++) {

				$html.="<td style='padding: 5px 5px;".$d."'>".$nota_aluno['respostas'][$u]['nota']."</td>";
			}
			$html.="</tr>";
			$l++;
		}
		$html.='</tbody></table>';
		echo $html;
		?>
	</div>

  	<hr>


		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-12 mx-auto text-center mt-5" style="font-weight: bold">
						Koala Educacional
					</div>		
				</div>
				<div class="row">
					<div class="col-md-12 mx-auto text-center mt-5">
						Boletim de turma <br>
						Arquivo Emitido no dia: <?=date('d-m-Y');?> por: <?=$_SESSION['nome']?>
					</div>		
				</div>
			</div>

		</footer>
	</div>
	
</body>
</html>