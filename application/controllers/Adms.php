<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adms extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('usuarios_model','usuario');
		$this->load->model('option_model','option');
	}

	public function index(){

	}

	public function excluirUsuarios(){
		verif_login(0,'usuarios');
		load_template('painel/excluirUsuarios');
	}

	public function criarProfessor(){
		verif_login(0,'perfil');

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
					$this->usuario->cadastrar($valor);
				}

				$dados['usuarios'] = $this->usuario->getUsers();
				$dados['materias'] = $this->option->getMaterias();

				load_template('painel/criarProfessorC2',$dados);
			}
		}else{
			load_template('painel/criarProfessor');
		}

		
	}
}
