<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Turmas extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('usuarios_model','usuario');
		$this->load->model('questoes_model','questao');
		$this->load->model('option_model','option');
		$this->load->model('turmas_model','turma');
	}

	public function index(){
		verif_login();
		
		if($this->session->userdata('perm') == 0){
			$dados['h1'] = "Turmas no sistema";
			$dados['turmas'] = $this->turma->getTurmasDetalhes();
		}else if($this->session->userdata('perm') == 2) {
			$dados['h1'] = "Minhas turmas";
			$dados['turmas'] = $this->turma->getTurmasDetalhes($this->session->userdata('id_usuario'));
		}else{
			$dados['h1'] = "Minhas turmas";
			$dados['turmas'] = $this->turma->getTurmas($this->session->userdata('id_usuario'));
		}

		load_template('professor/turmasProfessor',$dados);
		
	}

	public function view($hash,$aba = 'alunos'){
		verif_login();
		$v['hash'] = $this->uri->segment(2);
		$c = array('hash' => $hash, 'id_usuario' => $this->session->userdata('id_usuario'));
		if(!empty($hash) and $dados['getturma'] = $this->turma->getTurma($hash) and ($this->turma->verifAluno($c) or $this->turma->verifProf($c) or verif_login('',2,false))){

			$okhash = $this->turma->getTurma($hash);
			if($okhash['cla_teacher'] == $this->session->userdata('id_usuario')){
				$dados['profok'] = TRUE;
			}else{
				$dados['profok'] = FALSE;
			}
			if($okhash['cla_teacher'] == $this->session->userdata('id_usuario') or $this->session->userdata('perm') == 0){
				$dados['profok2'] = TRUE;
				$dados['del'] = TRUE;
				$dados['id_aluno'] = FALSE;
			}else{
				$dados['del'] = FALSE;
				$dados['profok2'] = FALSE;
				$dados['id_aluno'] = $this->session->userdata('id_usuario');
			}
			$dados['hash'] = $hash;
			$values['hash'] = $hash;
			$dados['hashturma'] = $hash;
			$dados['aba'] = $aba;
			$values['professor'] = $this->session->userdata('id_usuario');



			$dados['getalunos'] = $this->turma->getAlunos($values['hash']);
			$dados['countlistapend'] = $this->turma->countAlunosTurma($values['hash']);
			$dados['getalunospend'] = $this->turma->getAlunos($values['hash'],FALSE);
			$dados['countalunopend'] = $this->turma->countAlunosTurma($values['hash'],FALSE);
			$dados['getlistas'] = $this->questao->getListas($values['hash']);

			for($i = 0; $i < count($dados['getlistas']);$i++){
				$dados['getlistas'][$i]['lis_gabarito'] = $this->questao->getGabarito($dados['getlistas'][$i]['lis_id']);
				$dados['getlistas'][$i]['lis_expired'] = expired_date($dados['getlistas'][$i]['lis_endtime']);
				if($dados['getlistas'][$i]['lis_expired'] == TRUE){
					$valu = array('id' => $dados['getlistas'][$i]['lis_id'], 'hash' => $hash);
					$this->questao->liberarGabarito($valu);
				}
			}
			$dados['informativos'] = $this->turma->getInformativos($values['hash']);
			$dados['h1'] = $dados['getturma']['cla_nome'];
			load_template('professor/viewTurma',$dados);

		}else{
			set_msg_pop('Parametros incorretos ou turma não encontrada!','error','normal');
			redirect('dashboard','refresh');
		}
	}

	public function fechar_periodo($hash,$periodo = false){
		verif_login('dashboard',2);
		$turma = $this->turma->getTurma($hash);
		$dad = array('hash' => $hash, 'id_usuario'=.$this->session->userdata('id_usuario'));
		$prof = $this->turma->verifProf($dad);
		if(!$turma and (!$prof or verif_login('',2,false))){
			set_msg('Turma não encontrada','danger');
			redirect('turmas');
		}

		if($fechado = $this->turma->fechar_periodo($hash,$periodo)){
			set_msg('Período fechado com sucesso','success');
		}
	}

}