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

	public function criarProfessor(){
		verif_login(0,'perfil');

		if(!empty($this->uri->segment(3))){
			if($this->uri->segment(3) == "new"){
				load_template('painel/criarProfessorC1');
			}
			else if($this->uri->segment(3) == "search") {
				load_template('painel/criarProfessorC2');
			}
		}else{
			load_template('painel/criarProfessor');
		}

		
	}
}
