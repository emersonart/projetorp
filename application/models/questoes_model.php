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
		
		$info_lista = array(
			'lis_name' => $values['nomeLista'],
			'lis_subject' => $values['subject'],
			'lis_teacher' => $values['id_professor'],
			'lis_cla_hash' => $values['class_hash']
		);
				
		$this->db->insert('tb_lists',$info_lista);
		$id_lista = $this->db->insert_id();
		if($id_lista){
			return $id_lista;
		}else{
			return false;
		}


	}

	public function criarQuestoes($dados,$lista,$fotos){
		if(count($dados) != count($fotos)){
			 for($j = 0; $j < count($fotos);$j++){
			 		if($fotos[$j] != ''){
			 			unlink('./'.$fotos[$j]);
			 		}
			 		
			    }
			    $this->db->where('lis_id',$lista['id_lista']);
			    $this->db->delete('tb_lists');
			return false;
		}else{
			$dados1 = array(
				'act_lis_id'=>$lista['id_lista'],
				'act_sub_id'=>$lista['subject'],
				'act_teacher' => $lista['id_professor'],
				'act_cla_hash'=>$lista['class_hash'],
			);
			$this->db->trans_start();
			for ($i=0; $i < count($dados); $i++) { 
				$dados1['act_enunciado'] = $dados[$i];
				$dados1['act_foto'] = $fotos[$i];
				$this->db->insert('tb_activities',$dados1);
			}
			$this->db->trans_complete();

			if ($this->db->trans_status() === FALSE) {
			    # Something went wrong.
			    set_msg_pop($this->db->trans_rollback(),'error','normal');
			    for($j = 0; $j < count($fotos);$j++){
			    	if($fotos[$i] != ''){
			 			unlink('./'.$fotos[$j]);
			 		}
			    }
			    $this->db->where('lis_id',$lista['id_lista']);
			    $this->db->delete('tb_lists');
			    return $this->db->trans_rollback();
			} 
			else {
			    # Everything is Perfect. 
			    # Committing data to the database.
			    $this->db->trans_commit();
			    set_msg_pop('Lista Criada com sucesso','success','normal');
			    return TRUE;
			}

			
		}
	}

	public function getListas($value){
		$this->db->select('*');
		$this->db->from('tb_lists');
		$this->db->where('lis_cla_hash',$value);
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function countQuestoes($values){
		$this->db->select('*');
		$this->db->where('act_cla_hash',$values['cla_hash']);
		$this->db->where('act_lis_id',$values['id_lista']);
		$this->db->from('tb_activities');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->num_rows();
		}else{
			return 0;
		}
	}
}