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

	public function resposta_lista($hash = 'FID14E',$id_lista = '26',$id_aluno = '113'){
		$dados['lista'] = $this->questao->getRespostas(array('hash' => $hash, 'id_lista'=>$id_lista,'id_usuario'=>$id_aluno));
		$dados['aluno'] = $this->turma->getAluno($id_aluno);
		$dados['turma'] = $this->turma->getTurma($hash);
		if($no = $this->questao->getNotaLista(array('id_aluno' => $id_aluno, 'id_lista'=>$id_lista))){
			$dados['nota'] = strtoupper($no);
		}else{
			$dados['nota'] = 'Sem nota';
		}
		$bootstrap = file_get_contents('./assets/css/bootstrap.min.css');
		$css = file_get_contents('./assets/style.css');
		$mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('teste/pdf',$dados,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output(); // opens in browser
	}	
	public function relatorio_turma($hash = 'FIED32'){
		$turma = $this->turma->getTurma($hash);
		$alunos = $this->turma->getAlunos($hash);
		$listas = $this->questao->getListas($hash);
		$infos = array();
		$i = 0;
		
		foreach ($alunos as $aluno){
			$infos[$i]['inf_name'] = $aluno->inf_name;
			$infos[$i]['inf_lastname'] = $aluno->inf_lastname;
			$infos[$i]['inf_registration'] = $aluno->inf_registration;
			//echo $aluno->inf_name." ".$aluno->inf_lastname.": <br>";
			$j = 0;
			foreach ($listas as $lista){
				$infos[$i]['respostas'][$j]['lis_id'] = $lista['lis_id'];
				$nota = $this->questao->getNotaLista(array('id_lista' => $lista['lis_id'], 'id_aluno'=>$aluno->usu_id));
				if($nota == ''){
					$infos[$i]['respostas'][$j]['nota'] = '0';
				}else{
					$infos[$i]['respostas'][$j]['nota'] = $nota;
				}
				

				//echo "nota: ".$this->questao->getNotaLista(array('id_lista' => $lista['lis_id'], 'id_aluno'=>$aluno->usu_id))."<br>";
				$j++;
			}
			//echo "<hr>";
			$i++;
		}
		echo "<table class='table table-stripped'>
				<thead>
					<tr>
						<td>Aluno</td>";
						for($k = 0;$k < count($infos[0]['respostas']); $k++) {
							echo "<td>Lista ".$k."</td>";					
						}
		echo "</tr></thead>
		<tbody>";
		$l=0;
		foreach ($infos as $info) {	
			if($l % 2 == 0){
				$d = 'background: #eee';
			}else{
				$d = '';
			}
			echo "<tr style='".$d."'><td>".$info['inf_name'].'</td>';
			foreach ($info['respostas'] as $resposta) {
				echo "<td>".$resposta['nota']."</td>";
			}
			echo "</tr>";
			$l++;
		}
		echo '</tbody></table>';
		$dados['notas_aluno'] = $infos;
		$dados['turma'] = $turma;
		

		//$mpdf = new \Mpdf\Mpdf();
        //$html = $this->load->view('teste/boletim_professor',$dados,true);
        //$mpdf->WriteHTML($html);
        //$mpdf->Output(); // opens in browser
	}
}