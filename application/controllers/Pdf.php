<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('usuarios_model','usuario');
		$this->load->model('option_model','option');
		$this->load->model('turmas_model','turma');
		$this->load->model('questoes_model','questao');
	}

	public function index(){

	}

	public function resposta_lista($hash = 'FID14E',$id_lista = '26',$id_aluno = NULL){
		if($id_aluno){
			$dados['lista'] = $this->questao->getRespostas(array('hash' => $hash, 'id_lista'=>$id_lista,'id_usuario'=>$id_aluno));
			$dados['aluno'] = $this->turma->getAluno($id_aluno);
			$dados['turma'] = $this->turma->getTurma($hash);
			if($dados['lista']){
				if($notao = $this->questao->getNotaLista(array('id_aluno' => $id_aluno, 'id_lista'=>$id_lista))){
					$dados['nota'] = strtoupper($notao);
				}else{
					$dados['nota'] = 'Sem nota';
				}
				if($link = gerar_pdf($dados,'resposta_lista')){
					$pdfs[] = array(
						'pli_cla_hash' => $hash, 
						'pli_lis_id'=>$id_lista,
						'pli_usu_id'=>$dados['aluno']['usu_id'],
						'pli_pdf' => $link
					);
				}
			}
			
			$this->questao->cadastrar_pdf($pdfs);
			force_download($link, NULL);
			redirect('turma/'.$hash);
			//if($link = gerar_pdf($dados,'resposta_lista')){
			//	echo $link;
			//}
		}else{
			
			$alunos = $this->turma->getAlunos($hash);
			$dados['turma'] = $this->turma->getTurma($hash);
			$contar = 1;
			foreach ($alunos as $aluno) {
				$dados['aluno'] = $this->turma->getAluno($aluno->usu_id);
				$dados['lista'] = $this->questao->getRespostas(array('hash' => $hash, 'id_lista'=>$id_lista,'id_usuario'=>$aluno->usu_id));
				if($dados['lista']){
						//echo count($dados['lista']).'<br>';
					if($notao = $this->questao->getNotaLista(array('id_aluno' => $aluno->usu_id, 'id_lista'=>$id_lista))){
						$dados['nota'] = strtoupper($notao);
					}else{
						$dados['nota'] = 'Sem nota';
					}
					if($link = gerar_pdf($dados,'resposta_lista')){
						$pdfs[] = array(
							'pli_cla_hash' => $hash, 
							'pli_lis_id'=>$id_lista,
							'pli_usu_id'=>$aluno->usu_id,
							'pli_pdf' => $link
						);
					}
					$contar++;
				}					
			}
			$this->questao->cadastrar_pdf($pdfs);
			//echo count($dados['listas']);
			//if($link = gerar_pdf($dados,'resposta_lista')){
			//	echo $link;
			//}
		}
		
		//$mpdf = new \Mpdf\Mpdf(['format' => [210, 293],
    //'orientation' => 'P']);
        //$html = $this->load->view('pdf/resposta_lista',$dados,true);
       // $mpdf->WriteHTML($html);
        //$mpdf->Output(); // opens in browser

	}
	

	public function relatorio_turma($hash = 'FIED32'){
		$turma = $this->turma->getTurma($hash);
		$alunos = $this->turma->getAlunos($hash);
		$da = array(
			'hash' => $hash,
			'periodo' => $turma['cla_per_id']
		);
		$listas = $this->questao->getListas(array('hash' => $hash, 'periodo'=>$turma['cla_per_id']),'todos');
		$nota_alunos = array();
		$i = 0;
		//var_dump($listas);
		
		if($listas){
			foreach ($alunos as $aluno){
				$nota_alunos[$i]['inf_name'] = $aluno->inf_name;
				$nota_alunos[$i]['inf_lastname'] = $aluno->inf_lastname;
				$nota_alunos[$i]['inf_registration'] = $aluno->inf_registration;
			//echo $aluno->inf_name." ".$aluno->inf_lastname.": <br>";
				$j = 0;
				foreach ($listas as $lista){
					$nota_alunos[$i]['respostas'][$j]['lis_id'] = $lista['lis_id'];
					$nota_alunos[$i]['respostas'][$j]['lis_name'] = $lista['lis_name'];
					$nota = $this->questao->getNotaLista(array('id_lista' => $lista['lis_id'], 'id_aluno'=>$aluno->usu_id));
					if($nota == ''){
						$nota_alunos[$i]['respostas'][$j]['nota'] = '0';
					}else{
						$nota_alunos[$i]['respostas'][$j]['nota'] = $nota;
					}


				//echo "nota: ".$this->questao->getNotaLista(array('id_lista' => $lista['lis_id'], 'id_aluno'=>$aluno->usu_id))."<br>";
					$j++;
				}
			//echo "<hr>";
				$i++;
			}

			$dados['nota_alunos'] = $nota_alunos;
			$dados['turma'] = $turma;

			if($link = gerar_pdf($dados,'boletim_professor')){
				$pdfs[] = array(
					'rel_cla_hash' => $hash, 
					'rel_per_id'=>$turma['cla_per_id'],
					'rel_pdf' => $link
				);
				$this->questao->cadastrar_relatorio_pdf($pdfs);
				force_download($link,NULL);
				redirect('turma/'.$hash);
			}
		}else{
			//redirect('turma/'.$hash);
		}
		
		 // opens in browser
	}

}