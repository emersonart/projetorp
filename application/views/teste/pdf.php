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
	<link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">

</head>
<body>
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
						<tr style="margin-top: 15px">
							<td style="margin-top: 15px"><img src="<?=base_url('assets/img/logo/logo.png')?>"></td>
						</tr>
						<tr style="margin-top: 15px">

							<td style="margin-top: 15px"><b>Aluno:</b> <?=$aluno['inf_name']?></td>
							<td style="margin-top: 15px"><b>Matrícula:</b> <?=$aluno['inf_registration']?></td>
						</tr>
						<tr style="margin-top: 15px">
							<td style="margin-top: 15px"><b>Turma:</b> <?=$turma['cla_nome']?></td>
							<td style="margin-top: 15px"><b>Matéria:</b> <?=$turma['sub_nome']?></td>
						</tr>
						<tr style="margin-top: 15px">
							<td style="margin-top: 15px"></td>
							<td style="margin-top: 15px"><b>Nota:</b> <?=$nota?></td>
						</tr>
					</tbody>
				</table>
			</div>
			</div>
		</header>
		<hr class="mt-4">
		<main>
			<div class="container mt-5">
				<?php 
				if(!empty($lista) && isset($lista) && sizeof($lista) > 0){
					$q=0;
					foreach ($lista as $linha) {
						$q++;
						?>
						<div class="row"  style="margin-top: 35px">
							<div class="col-md-12">
								<h4>Questão <?=$q;?></h4>
								<div><?=$linha['act_enunciado']?></div>
								<?php if($linha['act_foto'] != ''){?>
									<div class="img-pergunta">

										<img src="<?php echo base_url($linha['act_foto']);?>">

									</div>
								<?php }else{echo"<br>";}?>
								
							</div>
						</div>
						<div class="row"  style="margin-bottom: 35px"> 
							<div class="col-md-12" >
								<h4>Resposta <?=$q;?></h4>
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
					<div class="col-md-6 mx-auto text-center mt-5" style="font-weight: bold">
						Koala Educacional
					</div>		
				</div>
			</div>

		</footer>
	</div>
	
</body>
</html>