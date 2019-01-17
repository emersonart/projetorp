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
			set_msg('Matéria ou Professor não encontrado '.$values['profTurma'],'danger');
			return false;
		}

		
	}

	public function getTurmas($perm = 0){
		$this->db->select('*');
		$this->db->from('tb_class');
		if($perm != 0){
			$this->db->where('cla_teacher',$perm);
		}
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	

	public function getTurmasDetalhes($perm = 0){
		$this->db->select('usu_id, usu_login, inf_name, inf_lastname, cla_nome, sub_nome, cla_hash');
		$this->db->from('tb_class');
		$this->db->join('tb_users','tb_users.usu_id = tb_class.cla_teacher','inner');
		$this->db->join('tb_info_users','tb_users.usu_id = tb_info_users.inf_usu_id','inner');
		$this->db->join('tb_subjects','tb_subjects.sub_teacher = tb_users.usu_id','inner');
		
		if($perm != 0){
			$this->db->where('tb_class.cla_teacher',$perm);
		}
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function countAlunosTurma($hash){

		$this->db->select('*');
		$this->db->from('tb_register_class');
		$this->db->where('reg_cla_hash',$hash);
		$this->db->where('reg_status',1);
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->num_rows();
		}else{
			return 0;
		}
	}

	}