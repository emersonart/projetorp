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
		load_template('professor/inicioProfessor',$dados);
	}

	public function criarSala(){
		verif_login(2,'perfil');
		$dados['h1'] = 'Criar nova Turma';

		
		//parametros de validação
		$this->form_validation->set_rules('nomeTurma','Nome da Turma','trim|required|min_length[5]|is_unique[tb_class.cla_nome]', array('required' => 'É obrigatório inserir um nome para a turma','is_unique'=>'Nome da turma já em uso'));
		$this->form_validation->set_rules('descricaoTurma','Descrição da Turma','trim');
		$this->form_validation->set_rules('tempoTurma','Inscrições até:','trim|required|regex_match[/^([2-9][0-9][0-9][0-9])-([0-1][0-9])-([0-3][0-9])$/]',array('regex_match' => 'Formato inválido da data: 0000-00-00','required'=>'É obrigatório inserir uma data para o final das inscrições'));//|regex_match[/^([0-1]?[1-2]-([0-1]|[3-4])(0|5)$/]
		if($this->session->userdata('perm') == 0){
			$dados['adm'] = TRUE;
			$dados['professores'] = $this->usuario->getUsers(2);
			$this->form_validation->set_rules('profTurma','Professor:','trim|required|greater_than[0]',array('greater_than'=>'É obrigatório inserir um professor para esta turma','required'=>'É obrigatório inserir um professor para esta turma'));
		}else{
			$dados['hash'] = gerarHash($this->session->userdata('id_usuario'));
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
				$dados['hash'] = gerarHash($dados_form['profTurma']);

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
		$dados['h1'] = 'Aprovar Cadastro';
		load_template('professor/aprovarCadastro', $dados);

	}

	public function cadastrarQuestoes(){
		verif_login(2,'perfil');
		$dados['h1'] = 'Cadastrar questões';
		load_template('painel/cadastrarQuestoes', $dados);

	}

	public function corrigirQuestoes(){
		verif_login(2,'perfil');
		$dados['h1'] = 'Corrigir questões';
		load_template('professor/corrigirQuestoes', $dados);

	}

	public function turmas(){
		verif_login(2,'perfil');
		$dados['h1'] = "Minhas turmas";
		if($this->session->userdata('perm') == 0){
			$dados['turmas'] = $this->turma->getTurmasDetalhes();
		}else{
			$dados['turmas'] = $this->turma->getTurmasDetalhes($this->session->userdata('id_usuario'));
		}
		

		load_template('professor/turmasProfessor',$dados);
	}

}