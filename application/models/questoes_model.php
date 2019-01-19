<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questoes_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->model('option_model','option');
		$this->load->model('usuarios_model','usuario');
		$this->load->model('turmas_model','turma');
	}

	public function criarLista($values){
		



	}
}