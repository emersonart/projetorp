<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adms extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('usuarios_model','usuario');
		$this->load->model('option_model','option');
	}

	public function index(){
		redirect('dashboard','refresh');
	}

	public function criarMateria(){
		verif_login('site',0);
		$dados['h1'] = 'Criar Matéria';
		$dados['titulo'] = 'Criar Matéria';

		$this->form_validation->set_rules('nome_materia','Matéria','trim|required|min_length[5]|is_unique[tb_subjects.sub_nome]');
		$this->form_validation->set_rules('desc_materia','Descrição da Matéria','trim|min_length[5]');

		if($this->form_validation->run() == FALSE){
			if(validation_errors()){
				set_msg(validation_errors(),'danger');
			}
		}else{
			$dados_form = $this->input->post();

			$value = array(
				'nome_materia' => $dados_form['nome_materia'], 
				'desc_materia' => $dados_form['desc_materia']
				);

			$this->option->setMateria($value);
		}


		load_template('painel/criarmateria',$dados);
	}

	public function excluirUsuarios(){
		verif_login('dashboard',0);
		load_template('painel/excluirUsuarios');
	}

	public function criarProfessor(){
		verif_login('site',0);

		if(!empty($this->uri->segment(3))){
			if($this->uri->segment(3) == "new"){
				//parametros de validação
				$this->form_validation->set_rules('login','Login','trim|required|min_length[5]|is_unique[tb_users.usu_login]');
				$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[tb_info_users.inf_email]');
				$this->form_validation->set_rules('senha','Senha','trim|required|min_length[6]');
				$this->form_validation->set_rules('senha2','Repita a Senha','trim|required|min_length[6]|matches[senha]');
				$this->form_validation->set_rules('nome','Nome','trim|required|min_length[4]');
				$this->form_validation->set_rules('sobrenome','Sobrenome','trim|required|min_length[4]');
				$this->form_validation->set_rules('materia','Matéria','trim|required|greater_than[0]');
				$this->form_validation->set_rules('matricula','Matrícula','trim|required|min_length[11]|regex_match[/^[\d]+$/]|is_unique[tb_info_users.inf_registration]'); //|regex_match[/^[\d]+$/]

				//verifica validação
				if($this->form_validation->run() == FALSE){
					if(validation_errors()){
						set_msg(validation_errors(),'danger');
					}
				}else{
					$dados_form = $this->input->post();
					$valor = array(
						'login' => $dados_form['login'],
						'senha' => $dados_form['senha'],
						'perm' => 2,
						'nome' => $dados_form['nome'],
						'sobrenome' => $dados_form['sobrenome'],
						'email' => $dados_form['email'],
						'materia' => $dados_form['materia'],
						'matricula' => $dados_form['matricula']/*,
						'foto' => $local*/
					);
					$this->usuario->cadastrar($valor);
				}
				$dados['titulo'] = "criar";
				$dados['materias'] = $this->option->getMaterias();

				load_template('painel/criarProfessorC1',$dados);
			}
			else if($this->uri->segment(3) == "search") {
				//parametros de validação
				$this->form_validation->set_rules('materia','Matéria','trim|required|greater_than[0]');
				$this->form_validation->set_rules('login','Login','trim|required|greater_than[0]');

				//verifica validação
				if($this->form_validation->run() == FALSE){
					if(validation_errors()){
						set_msg(validation_errors(),'danger');
					}
				}else{
					
					$dados_form = $this->input->post();
					$valor = array(
						'login' => $dados_form['login'],
						'materia' => $dados_form['materia'],
					);
					$this->usuario->transformProf($valor);
				}

				$dados['usuarios'] = $this->usuario->getUsers();
				$dados['materias'] = $this->option->getMaterias();

				load_template('painel/criarProfessorC2',$dados);
			}
		}else{
			load_template('painel/criarProfessor');
		}

		
	}

	public function avisos(){
		verif_login('dashboard',0);
		load_template('painel/avisos');
	}

	public function config_site(){
		verif_login('dashboard',2);
		$dados['h1'] = 'Configurações gerais do sistema';
		$dados['titulo'] = 'Configurar Sistema';
		
		load_template('painel/backup',$dados);
	}

	public function fazerbackup(){
		if($get = $this->input->get('rotina') == 'rotinako@l@'){
			$getOK = TRUE;
		}else{
			$getOK = FALSE;
		}
		if(verif_login('dashboard',0,false)){
			$this->option->backup_tables();

		}else if($get){
			$this->option->backup_tables('*',TRUE);
		}else{
			verif_login('dashboard',0);
		}

	
	}

}
