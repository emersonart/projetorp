<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Turmas_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->model('option_model','option');
		$this->load->model('usuarios_model','usuario');
	}

	public function criarTurma($values){
		//var_dump($values);
		//echo converter_data('17/01/2019',0);

		if(count($values) != 7){
			set_msg('Parametros incorretos','danger');
			return false;
		}

		$subject = $this->option->getMateria($values['profTurma']);

		if($subject){
			$dados = array(
				'cla_hash' => $values['hashTurma'],
				'cla_nome' => $values['nomeTurma'],
				'cla_teacher' => $values['profTurma'],
				'cla_subject' => $subject[0]['sub_id'],
				'cla_start_time' => $values['startHash'],
				'cla_end_time' => $values['endHash'],
				'cla_descricao' => $values['descricaoTurma'],
				'cla_insc' => $values['inscTurma'] 
			);
			$this->db->insert('tb_class',$dados);

			if($this->db->insert_id()){
				set_msg('Turma criada com sucesso!','success');
				return true;
			}else{
				set_msg('Não foi possível cirar a turma, contate um administrador','danger');
				return false;
			}
		}else{
			set_msg('Matéria ou Professor não encontrado','danger');
			return false;
		}

		
	}

	}