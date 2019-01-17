<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('usuarios_model','usuario');
		$this->load->model('option_model','option');
		$this->load->model('turmas_model','turma');
	}

	public function index(){
		verif_login(2,'perfil');
		$dados['h1'] = 'Dashboard do Professor';
		load_template('painel/inicioProfessor',$dados);
	}

	public function criarSala(){
		verif_login(2,'perfil');
		$dados['h1'] = 'Criar nova Turma';

		$dados['hash'] = gerarHash($this->session->userdata('id_usuario'));

		//parametros de validação
		$this->form_validation->set_rules('nomeTurma','Nome da Turma','trim|required|min_length[5]|is_unique[tb_class.cla_nome]');
		$this->form_validation->set_rules('descricaoTurma','Descrição da Turma','trim|required');
		$this->form_validation->set_rules('tempoTurma','Inscrições até:','trim|required|regex_match[/^([2-9][0-9][0-9][0-9])-([0-1][0-9])-([0-3][0-9])$/]');//|regex_match[/^([0-1]?[1-2]-([0-1]|[3-4])(0|5)$/]
		if($this->session->userdata('perm') == 0){
			$dados['adm'] = TRUE;
			$this->form_validation->set_rules('profTurma','Professor:','trim|required|greater_than[0]');
		}else{
			$dados['adm'] = FALSE;
		}

		//verifica validação
		if($this->form_validation->run() == FALSE){
			if(validation_errors()){
				set_msg(validation_errors(),'danger');
			}
		}else{
			$dados_form = $this->input->post();
			if($this->session->userdata('perm') == 0){
				$prof = $dados_form['profTurma'];
			}else{
				$prof = $this->session->userdata('id_usuario');
			}	
			$valor = array(
				'nomeTurma' => $dados_form['nomeTurma'],
				'descricaoTurma' => $dados_form['descricaoTurma'],
				'hashTurma' => $dados['hash'],
				'startHash' => date('d-m-Y'),
				'endHash' => converter_data($dados_form['tempoTurma'],2),
				'profTurma' => $prof,
				'inscTurma' => 1
			);
			$this->turma->criarTurma($valor);
		}

		load_template('professor/criarSala',$dados);

	}

	public function criarMateria(){
		verif_login(2,'perfil');
		load_template('painel/criarMateria');

	}

	public function aprovarCadastro(){
		verif_login(2,'perfil');
		load_template('painel/aprovarCadastro');

	}

	public function cadastrarQuestoes(){
		verif_login(2,'perfil');
		load_template('painel/cadastrarQuestoes');

	}

}