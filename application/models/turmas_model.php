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

	public function getTurmas($aluno){
		$this->db->select('*');
		$this->db->from('tb_register_class');
		$this->db->join('tb_class','tb_class.cla_hash = tb_register_class.reg_cla_hash and tb_register_class.reg_usu_id = "'.$aluno.'"');
		$this->db->join('tb_subjects','tb_subjects.sub_teacher = tb_class.cla_teacher','inner');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function getInfoProf($id){
 		$this->db->select('inf_name, inf_lastname,usu_login');
 		$this->db->from('tb_users');
 		$this->db->join('tb_info_users','tb_users.usu_id = tb_info_users.inf_usu_id and tb_users.usu_id = "'.$id.'"','inner');
 		$this->db->limit(1);
 		$query = $this->db->get();
 		if($query->num_rows() == 1) {
 			return $query->row();
 		}else{
 			return false;
 		}
 	}

	public function getTurma($values){
		$this->db->select('usu_id, usu_login, usu_perm, inf_name, inf_lastname, inf_email, inf_registration, cla_teacher,cla_hash, cla_id, cla_nome, cla_descricao, sub_id, sub_nome, sub_description, sub_teacher');
		$this->db->from('tb_class');
		$this->db->join('tb_users','tb_users.usu_id = tb_class.cla_teacher','inner');
		$this->db->join('tb_info_users','tb_users.usu_id = tb_info_users.inf_usu_id and tb_class.cla_hash = "'.$values.'"','inner');
		$this->db->join('tb_subjects','tb_subjects.sub_teacher = tb_users.usu_id','inner');

		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() == 1){
			return $query->row_array();
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

	public function countAlunosTurma($hash,$confirm = TRUE){
		if($confirm){
			$this->db->where('reg_status',1);
		}else{
			$this->db->where('reg_status',0);
		}
		$this->db->select('*');
		$this->db->from('tb_register_class');
		$this->db->where('reg_cla_hash',$hash);
		
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->num_rows();
		}else{
			return 0;
		}
	}

	public function getAlunos($hash,$confirm = TRUE){
		if($confirm){
			$condicao = ' and tb_register_class.reg_status = "1"';
		}else{
			$condicao = ' and tb_register_class.reg_status = "0"';
		}
		$this->db->select('usu_id, usu_login, usu_perm, inf_name, inf_lastname, inf_email, inf_registration, reg_cla_hash, reg_date, reg_status');
		$this->db->from('tb_register_class');
		$this->db->join('tb_users','tb_users.usu_id = tb_register_class.reg_usu_id and tb_register_class.reg_cla_hash = "'.$hash.'"'.$condicao ,'inner');
		$this->db->join('tb_info_users','tb_users.usu_id = tb_info_users.inf_usu_id','inner');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function verifAluno($values){
		$this->db->select('reg_id');
		$this->db->from('tb_register_class');
		$this->db->where('reg_cla_hash',$values);
		$this->db->where('reg_usu_id',$this->session->userdata('id_usuario'));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function aprovCadastro($values){
		if(verif_login('',2,false)){
			$this->db->select('*');
			$this->db->where('reg_cla_hash',$values['hash']);
			$this->db->where('reg_usu_id',$values['id']);
			$this->db->where('reg_status',0);
			$this->db->from('tb_register_class');
			$query = $this->db->get();

			if($query->num_rows() > 0){
				
				$this->db->set('reg_status',1);
				$this->db->where('reg_cla_hash',$values['hash']);
				$this->db->where('reg_usu_id',$values['id']);
				$this->db->update('tb_register_class');

				if($this->db->affected_rows()>0){
					set_msg_pop('Confirmação do aluno nesta turma realizado com sucesso','success','normal');
					return true;
				}else{
					set_msg_pop('Confirmação do aluno não pode ser realizado','error','normal');
					return false;
				}
			}else{
				set_msg_pop('Cadastro já ativado ou não encontrado','info','normal');
				return false;
			}
		}else{
			set_msg_pop('Você não possui permissão para esta ação','error','normal');
			return false;
		}
	}

}