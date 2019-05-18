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
}