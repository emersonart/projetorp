<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->model('option_model','option');
	}
	public function login($values){

		$q = array('USU_login' => $values['login'], 'USU_senha' => $values['senha']);
		$this->db->select('*');
		$this->db->from('tb_users');
		$this->db->join('tb_info_users','tb_users.usu_id = tb_info_users.inf_usu_id and tb_users.usu_login = "'.$values["login"].'" and tb_users.usu_password = "'.$values["senha"].'"','inner');
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





		//$this->db->where($q);
		//$query = $this->db->get('usuarios',1);
		//if($query->num_rows() == 1){
		//	$row = $query->row();
		//	$arg = array(
		////		'usuario' => $row->USU_login,
		//		'id_usuario' => $row->USU_id,
		//		'perm' => $row->USU_perm
		//	);
		//	$this->session->set_userdata($arg);
		//	
		//	redirect('home','refresh');
		//}else{
		//	return NULL;
		//}
	}
	public function cadastrar($values){

		$this->db->select('cla_id');
		$this->db->from('tb_class');
		$this->db->where('cla_hash',$values['codigoturma']);
		$this->db->limit(1);
		if($this->db->get()->num_rows() != 1){
			set_msg('Código de turma incorreto!','danger');
			redirect('register','refresh');
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

				$info_user = array(
					'inf_usu_id' => $id_usuario,
					'inf_name' => $values['nome'],
					'inf_email' => $values['email'],
					'inf_lastname' => $values['sobrenome'],
					'inf_registration' => $values['matricula']
				);

				$this->db->insert('tb_info_users',$info_user);

				if($this->db->insert_id()){
					$msg = set_msg('Usuário Cadastrado com sucesso, use estas informações para acessar o sistema','success');
					return TRUE;
				}else{
					set_msg('Não foi possível cadastrar o usuário!','danger');
					return FALSE;
				}
			}
		}
		


	}
}