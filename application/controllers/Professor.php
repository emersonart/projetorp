<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('usuarios_model','usuario');
		$this->load->model('option_model','option');
	}

	public function index(){
		echo 'aqui';
	}

	public function criarSala(){
		verif_login(2,'perfil');
		load_template('painel/criarSala');

	}

	public function criarMateria(){
		verif_login(2,'perfil');
		load_template('painel/criarMateria');

	}
}