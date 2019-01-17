<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('usuarios_model','usuario');
		$this->load->model('option_model','option');
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
		$this->form_validation->set_rules('nomeTurma','Login','trim|required|min_length[5]|is_unique[tb_users.usu_login]');
		$this->form_validation->set_rules('descricaoTurma','Email','trim|required|valid_email|is_unique[tb_info_users.inf_email]');
		$this->form_validation->set_rules('tempoTurma','Senha','trim|required|min_length[6]');

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

		load_template('painel/criarSala',$dados);

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