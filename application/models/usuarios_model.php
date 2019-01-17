<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->model('option_model','option');
	}

	public function logout(){
		if($this->session->userdata()){
			$this->session->unset_userdata('usuario','id_usuario','perm','pagina_anterior','nome','sobrenome','matricula','email','logged');	
			$this->session->sess_destroy();

			set_msg('Você saiu do sistema com sucesso!','success');
		}

		redirect('usuarios/login');
	}

	public function login($values){

		$q = array('USU_login' => $values['login'], 'USU_senha' => $values['senha']);
		$this->db->select('*');
		$this->db->from('tb_users');
		$this->db->join('tb_info_users','tb_users.usu_id = tb_info_users.inf_usu_id and tb_users.usu_login = "'.$values["login"].'" OR tb_info_users.inf_registration = "'.$values["login"].'" and tb_users.usu_password = "'.$values["senha"].'"','inner');
		$this->db->limit(1);
		$query = $this->db->get();

		if($query->num_rows() == 1){
			$row = $query->row();
			if(isset($values['save']) and !empty($values['save'])){
				set_cookie('userLogin',$values['login'],3600*24);
			}else{
				delete_cookie('userLogin');
			}
			$arg = array(
					'usuario' => $row->usu_login,
					'id_usuario' => $row->usu_id,
					'perm' => $row->usu_perm,
					'nome' => $row->inf_name,
					'sobrenome' => $row->inf_lastname,
					'matricula' => $row->inf_registration,
					'email' => $row->inf_email,
					'logged' => TRUE
				);
			$this->session->set_userdata($arg);

			
			redirect('painel/perfil/'.$arg['usuario'],'refresh');
		}else{
			return set_msg('login e/ou senhas inválidos','danger');
		}

	}

	public function cadastrar($values){
		$turma = TRUE;

		if(!empty($values['codigoturma']) and isset($values['codigoturma'])){
			$this->db->select('cla_id');
			$this->db->from('tb_class');
			$this->db->where('cla_hash',$values['codigoturma']);
			$this->db->where('cla_insc',1);
			$this->db->limit(1);
			if($this->db->get()->num_rows() != 1){
				$turma = FALSE;
			}
		}

		if($turma == FALSE){
			set_msg('Código de turma incorreto!','danger');
			redirect('registrar','refresh');
		}else{
			$this->db->select('usu_id');
			$this->db->from('tb_users');
			$this->db->where('usu_login',$values['login']);
			$this->db->limit(1);
			if($this->db->get()->num_rows() == 1){
				set_msg('Nome de usuário já em utilização, por favor escolha outro.','warning');
				redirect('register','refresh');
			}else{
				$info_login = array(
					'usu_login' => $values['login'],
					'usu_password' => $values['senha'],
					'usu_perm' => $values['perm']
				);

				$this->db->insert('tb_users',$info_login);
				$id_usuario = $this->db->insert_id();
				if(!empty($values['codigoturma']) and isset($values['codigoturma'])){
					$info_class = array(
						'reg_usu_id' => $id_usuario, 
						'reg_cla_hash' => $values['codigoturma'],
						'reg_date' => date('d-m-Y G:i'),
						'reg_status' => 0
						);
					$this->db->insert('tb_register_class',$info_class);
				}
				
				$info_user = array(
					'inf_usu_id' => $id_usuario,
					'inf_name' => $values['nome'],
					'inf_email' => $values['email'],
					'inf_lastname' => $values['sobrenome'],
					'inf_registration' => $values['matricula']
				);
				
				$this->db->insert('tb_info_users',$info_user);

				if($this->db->insert_id()){
					if(!empty($values['materia']) and isset($values['materia'])){
						$this->db->set('sub_teacher',$id_usuario);
						$this->db->where('sub_id',$values['materia']);
						$this->db->update('tb_subjects');
						$msg = set_msg('Professor Cadastrado com sucesso, use estas informações para acessar o sistema','success');
					}else{
						$msg = set_msg('Aluno Cadastrado com sucesso, use estas informações para acessar o sistema','success');
					}
					
					return TRUE;
				}else{
					set_msg('Não foi possível cadastrar o usuário!','danger');
					return FALSE;
				}
			}
		}
	}

	public function transformProf($values,$f=FALSE){
		$this->db->select('*');
		$this->db->from('tb_users');
		$this->db->where('usu_id',$values['login']);
		$this->db->where('usu_perm',1);
		$this->db->limit(1);
		$query = $this->db->get();

		$this->db->select('*');
		$this->db->from('tb_subjects');
		$this->db->where('sub_id',$values['materia']);
		if(!$f){
			$this->db->where('sub_teacher',0);
		}
		$this->db->limit(1);
		$query2 = $this->db->get();

		if($query->num_rows() > 0 and $query2->num_rows() > 0){
			$this->db->set('usu_perm',2);
			$this->db->where('usu_id',$query->row()->usu_id);
			$update = $this->db->update('tb_users');
			if($this->db->affected_rows()>0){
				$this->db->set('sub_teacher',$query->row()->usu_id);
				$this->db->where('sub_id',$query2->row()->sub_id);
				$update2 = $this->db->update('tb_subjects');
				if($this->db->affected_rows()>0){
					set_msg('Cadastro atualizado com sucesso! '.$query->row()->usu_login.' agora é um professor');
					return TRUE;
				}else{
					set_msg('Não foi possível alterar o professor desta matéria');
					return FALSE;
				}
			}else{
				set_msg('Não foi possível alterar a permissão deste usuário');
				return FALSE;
			}
		}else{
			set_msg('Não foi possível alterar este usuário, contate um administrador para mais informações','danger');
			return FALSE;
		}
	}

	public function getUsers($perm = 1){
		
		$this->db->select('usu_id, usu_login, inf_email, inf_name, inf_lastname');
		$this->db->from('tb_users');
		$this->db->join('tb_info_users','tb_users.usu_id = tb_info_users.inf_usu_id and tb_users.usu_perm = "'.$perm.'"','inner');

		
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}


}