<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Option_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function get_option($option_name){
		$this->db->where('con_name',$option_name);
		$query = $this->db->get('tb_options',1);
		if($query->num_rows() == 1){
			$row = $query->row();
			return $row->OPT_value;
		}else{
			return NULL;
		}
	}

	public function update_option($option_name,$option_value){
		$this->db->where('con_name',$option_name);
		$query = $this->db->get('tb_options',1);
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
			$this->db->insert('tb_options',$dados);
			return $this->db->insert_id();
		}
	}

}