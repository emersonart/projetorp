<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('usuarios_model','usuario');
		$this->load->model('option_model','option');
	}

	public function index(){
		verif_login(2,'perfil');
		load_template('painel/teste');
	}

	public function login(){

		//regra de validação de form
		$this->form_validation->set_rules('login','LOGIN','trim|required|min_length[5]');
		$this->form_validation->set_rules('senha','SENHA','trim|required|min_length[6]');

		//validar
		if($this->form_validation->run() == FALSE){
			if(validation_errors()){
				set_msg(validation_errors(),'warning');
			}
		}else{

			$dados_login = $this->input->post();
			if(!isset($dados_login['save']) and empty($dados_login['save'])){
				$dados_login['save'] = '';
			}
			$dados_login = array('login'=>$dados_login['login'], 'senha' => $dados_login['senha'],'save' => $dados_login['save']);
			$this->usuario->login($dados_login);
			//$this->usuario->login($dados_login);
		}
		$dados['titulo'] = "Logar no sistema";
		$this->load->view('login',$dados);
	}


	public function logout(){
		$this->usuario->logout();
	}

	public function register(){

		//parametros de validação
		$this->form_validation->set_rules('login','Login','trim|required|min_length[5]|is_unique[tb_users.usu_login]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[tb_info_users.inf_email]');
		$this->form_validation->set_rules('senha','Senha','trim|required|min_length[6]');
		$this->form_validation->set_rules('senha2','Repita a Senha','trim|required|min_length[6]|matches[senha]');
		$this->form_validation->set_rules('nome','Nome','trim|required|min_length[4]');
		$this->form_validation->set_rules('sobrenome','Sobrenome','trim|required|min_length[4]');
		$this->form_validation->set_rules('codigoturma','Código da Turma','trim|required|min_length[6]');
		$this->form_validation->set_rules('matricula','Matrícula','trim|required|min_length[11]|regex_match[/^[\d]+$/]|is_unique[tb_inf_users.inf_registration]'); //|regex_match[/^[\d]+$/]

		//verifica validação
		if($this->form_validation->run() == FALSE){
			if(validation_errors()){
				set_msg(validation_errors(),'danger');
			}
		}else{
			$dados_form = $this->input->post();

			/* pra upload de foto futuro
			$this->load->library('upload');
			$config['upload_path'] = './assets/images/users';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1024;
            $config['max_width'] = 1024;
            $config['max_height'] = 1024;
            $config['file_ext_tolower'] = TRUE;
            $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

            if(!$this->upload->do_upload('foto')){
            	$msg = $this->upload->display_errors();
            	set_msg($msg,'danger');
            	redirect('usuarios/novousuario','redirect');
            }else{
            	$local = 'assets/images/users/'.$this->upload->data('file_name');
            }
		*/
			$valor = array(
				'login' => $dados_form['login'],
				'senha' => $dados_form['senha'],
				'perm' => 1,
				'nome' => $dados_form['nome'],
				'sobrenome' => $dados_form['sobrenome'],
				'email' => $dados_form['email'],
				'codigoturma' => $dados_form['codigoturma'],
				'matricula' => $dados_form['matricula']/*,
				'foto' => $local*/
			);
			$this->usuario->cadastrar($valor);
		}

		$this->load->view('register');
	}

}