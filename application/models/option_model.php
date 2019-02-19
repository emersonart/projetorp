<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Option_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function get_option($option_name){
		$this->db->where('con_name',$option_name);
		$query = $this->db->get('tb_configs_site',1);
		if($query->num_rows() == 1){
			$row = $query->row();
			return $row->con_value;
		}else{
			return NULL;
		}
	}

	public function update_option($option_name,$option_value){
		$this->db->where('con_name',$option_name);
		$query = $this->db->get('tb_configs_site',1);
		if($query->num_rows() == 1){
			//Existe dados
			$this->db->set('con_value',$option_value);
			$this->db->where('con_name',$option_name);
			$this->db->update('tb_configs_site');
			return $this->db->affected_rows();
		}else{
			//Não existe dados, criar dados.
			$dados = array(
				'con_name' => $option_name,
				'con_value' => $option_value
			);
			$this->db->insert('tb_configs_site',$dados);
			return $this->db->insert_id();
		}
	}

	public function getMaterias(){
		$this->db->select('*');
		$this->db->from('tb_subjects');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function setMateria($values){
		$dados  = array(
			'sub_nome' => $values['nome_materia'], 
			'sub_description' => $values['desc_materia']
			);
		$this->db->insert('tb_subjects',$dados);

		if($this->db->insert_id()){
			set_msg_pop('Matéria cadastrada com sucesso!','success','normal');
			return true;
		}else{
			return false;
		}
	}


	public function getMateria($id,$tipo = 0){
		

		if($tipo == 0){
			$this->db->select('*');
			$this->db->from('tb_teacher_subject');
			$this->db->join('tb_subjects','tb_subjects.sub_id = tb_teacher_subject.tea_sub_id and tb_teacher_subject.tea_usu_id = "'.$id.'"','join')
		}else{
			$this->db->select('*');
			$this->db->from('tb_subjects');
			$this->db->where('sub_id',$id);
		}
		

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}



}