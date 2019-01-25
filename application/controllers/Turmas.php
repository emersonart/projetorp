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
		if(!empty($hash) and $dados['getturma'] = $this->turma->getTurma($hash)){
			$okhash = $this->turma->getTurma($hash);
			if($okhash['cla_teacher'] == $this->session->userdata('id_usuario')){
				$dados['profok'] = TRUE;
			}else{
				$dados['profok'] = FALSE;
			}
			$values['hash'] = $hash;
			$dados['hashturma'] = $hash;
			$dados['aba'] = $aba;
			$values['professor'] = $this->session->userdata('id_usuario');


			$dados['getalunos'] = $this->turma->getAlunos($values['hash']);
			$dados['countalunopend'] = $this->turma->countAlunosTurma($values['hash']);
			$dados['getalunospend'] = $this->turma->getAlunos($values['hash'],FALSE);
			$dados['countalunopend'] = $this->turma->countAlunosTurma($values['hash'],FALSE);
			$dados['getlistas'] = $this->questao->getListas($values['hash']);
			$dados['h1'] = $dados['getturma']['cla_nome'];
			load_template('professor/viewTurma',$dados);

		}else{
			set_msg_pop('Parametros incorretos ou turma não encontrada!','error','normal');
			redirect('dashboard','refresh');
		}
	}

}