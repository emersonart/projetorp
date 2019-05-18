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
							<td><p style="font-weight: bold; padding-left: 15px;">Aluno:</p> <?=$aluno['inf_name']?></td>
							<td><p style="font-weight: bold; padding-left: 3px;">Matrícula:</p> <?=$aluno['inf_registration']?></td>
							<td><p style="font-weight: bold; padding-left: 3px;">Turma:</p> <?=$turma['cla_nome']?></td>
							<td><p style="font-weight: bold; padding-left: 3px;">Matéria:</p> <?=$turma['sub_nome']?></td>
							<td><p style="font-weight: bold; padding-left: 3px;">Nota:</p> <?=$nota?></td>
						</tr>
						</div>
					</tbody>
				</table>
			</div>
			</div>
		</header>
		<hr>
		<main>
			<div class="container mt-5">
				<?php 
				if(!empty($lista) && isset($lista) && sizeof($lista) > 0){
					$q=0;
					foreach ($lista as $linha) {
						$q++;
						?>
						<div class="row"  style="margin-top: 35px;">
							<div class="col-md-12">
								<p style="font-weight: bold; font-size: 17px;">Questão <?=$q;?></p>
								<div><?=$linha['act_enunciado']?></div>
								<?php if($linha['act_foto'] != ''){?>
									<div class="img-pergunta">

										<img src="<?php echo base_url($linha['act_foto']);?>">

									</div>
								<?php }else{echo"<br>";}?>
								
							</div>
						</div>
						<div class="row" style="background: #eee; margin-bottom: 35px; padding: 20px; font-style: italic;"> 
							<div class="col-md-12" >
								<p style="font-weight: bold; font-size: 15px; color: gray;">Resposta <?=$q;?></p>
								<?=$linha['ans_resposta']?>
							</div>
						</div>
						<hr>

						<?php			
					}
				}
				?>
			</div>
		</main>
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-12 mx-auto text-center mt-5" style="font-weight: bold">
						Koala Educacional
					</div>		
				</div>
				<div class="row">
					<div class="col-md-12 mx-auto text-center mt-5">
						Lista de Respostas <br>
						Arquivo Emitido no dia: <?=date('d-m-Y');?>
					</div>		
				</div>
			</div>

		</footer>
	</div>
	
</body>
</html>