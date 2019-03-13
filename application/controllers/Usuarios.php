<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('usuarios_model','usuario');
		$this->load->model('option_model','option');
		$this->load->model('turmas_model','turma');
	}

	public function index(){
		$id_usuario = $this->session->userdata('id_usuario');
		if(verif_login('dashboard',1,false) and $this->session->userdata('perm') == 1){
			
			$dados['h1'] = 'Bem vindo, '.$this->session->userdata('nome');
			$dados['turmas'] = $this->turma->getTurmas($id_usuario);


			load_template('aluno/inicioAluno',$dados);

		}else if(verif_login('dashboard',2,false) and $this->session->userdata('perm') == 2){
			$dados['h1'] = 'Dashboard do Professor';
			$dados['turmas'] = $this->turma->getTurmasDetalhes($id_usuario);
			load_template('professor/inicioProfessor',$dados);
		}else{
			verif_login();
			$dados['h1'] = 'Dashboard do Administrador';
			load_template('painel/inicioAdm',$dados);
		}
		
	}

	public function forget_password(){
		$this->form_validation->set_rules('userkoala','Usuário','trim|required');
		if($this->form_validation->run() == FALSE){
			if(validation_errors()){
				set_msg(validation_errors(),'warning');
			}
		}else{
			$user = $this->input->post()['userkoala'];

			$this->usuario->forget_password($user);
		}

		$this->load->view('forgetpassword');

	}

	public function redefine_password(){
		if($hash = $this->input->get('hash') and $token = $this->input->get('token')){
			$oktoken = $this->usuario->verif_token($hash,$token);
			if($oktoken){
				$this->form_validation->set_rules('senha','Senha','trim|required|xss_clean|min_length[6]|regex_match[/^[^\s]+$/]',array('regex_match' => 'Senha não pode conter espaços'));
				$this->form_validation->set_rules('senha2','Repita a Senha','trim|required|xss_clean|min_length[6]|matches[senha]|regex_match[/^[^\s]+$/]',array('regex_match' => 'Senha não pode conter espaços'));
				if($this->form_validation->run() == FALSE){
					if(validation_errors()){
						set_msg(validation_errors(),'warning');
					}
				}else{
					$senha = $this->input->post()['senha'];

					$dados_enviar = array('senha' => $senha, 'idusuario' => $hash);

					$senhaalterada = $this->usuario->redefine_password($dados_enviar);
					if($senhaalterada){
						$this->usuario->delete_token($hash,$token);
						redirect('login','refresh');
					}
				}
				$dados['idusu'] = $hash;
				$dados['token']= $token;
				$this->load->view('recoverypassword',$dados);
			}else{
				redirect('login','refresh');
			}
		}else{
			set_msg('Parâmetros incorretos','warning');
			redirect('login','refresh');
		}


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

	public function perfil($outro = FALSE){
		verif_login();
		$id_usuario = $this->session->userdata('id_usuario');
		if($outro){
			$perfil = $this->usuario->getPerfil($outro);			
		}else{
			$perfil = $this->usuario->getPerfil($id_usuario);
		}
		$dados['titulo'] = $perfil['inf_name']." - Perfil -";
		$dados['h1'] = 'Perfil: '.$perfil['inf_name'].' '.$perfil['inf_lastname'];
		$dados['nick'] = $perfil['usu_login'];	
		if($perfil and $perfil['usu_id'] == $id_usuario){
			$dados['perfil'] = $perfil;
			$dados['donoperfil'] = TRUE;

		}else if($perfil and $perfil['usu_id'] != $id_usuario){
			$dados['donoperfil'] = FALSE;
			$dados['perfil'] = $perfil;
		}else{
			set_msg_pop('Perfil não encontrado','warning','normal');
			redirect('dashboard','refresh');
		}
		
		load_template('perfil',$dados);
		//set_msg_pop('A página solicitada ainda está em construção!','info','normal');
		//redirect('dashboard','refresh');
	}


	public function logout(){
		$this->usuario->logout();
	}

	public function register(){

		//parametros de validação
		$this->form_validation->set_rules('login','Login','trim|required|xss_clean|min_length[5]|is_unique[tb_users.usu_login]|regex_match[/^[\s]?[\w]+$/]',array('regex_match' => 'Nome de usuário não pode conter espaços ou caracteres especiais'));
		$this->form_validation->set_rules('email','Email','trim|required|xss_clean|valid_email|is_unique[tb_info_users.inf_email]');
		$this->form_validation->set_rules('senha','Senha','trim|required|xss_clean|min_length[6]|regex_match[/^[^\s]+$/]',array('regex_match' => 'Senha não pode conter espaços'));
		$this->form_validation->set_rules('senha2','Repita a Senha','trim|required|xss_clean|min_length[6]|matches[senha]|regex_match[/^[^\s]+$/]',array('regex_match' => 'Senha não pode conter espaços'));
		$this->form_validation->set_rules('nome','Nome','trim|required|xss_clean|min_length[4]');
		$this->form_validation->set_rules('sobrenome','Sobrenome','trim|required|xss_clean|min_length[4]');
		$this->form_validation->set_rules('codigoturma','Código da Turma','trim|required|xss_clean|min_length[6]');
		$this->form_validation->set_rules('matricula','Matrícula','trim|required|xss_clean|min_length[11]|regex_match[/^[\d]+$/]|is_unique[tb_info_users.inf_registration]'); //|regex_match[/^[\d]+$/]

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
            	'login' => strtolower($dados_form['login']),
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