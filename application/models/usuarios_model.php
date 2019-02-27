<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->model('option_model','option');
	}

	public function logout(){
		if($this->session->userdata()){
			$this->session->set_userdata('logged',false);
			$this->session->unset_userdata('usuario','id_usuario','perm','pagina_anterior','nome','sobrenome','matricula','email','logged');	
			$this->session->sess_destroy();

			set_msg('Você saiu do sistema com sucesso!','success');
		}

		redirect('login');
	}

	public function login($values){

		//pegar a key para descriptografar
		$this->db->select('usu_session');
		$this->db->from('tb_users');
		$this->db->where('usu_login',$values['login']);
		$this->db->limit(1);
		$user = $this->db->get();

		if($user->num_rows() != 1){
			$nameuser = FALSE;
			$this->db->select('usu_session');
			$this->db->from('tb_users');
			$this->db->join('tb_info_users','tb_users.usu_id = tb_info_users.inf_usu_id and tb_info_users.inf_registration = "'.$values['login'].'"');
			$this->db->limit(1);
			$matric = $this->db->get();
			if($matric->num_rows() != 1){
				set_msg('login e/ou senhas inválidos <i>erro: ul01</i>','danger');
				return false;
			}else{
				$matricu = array(
					'matricula' => 'tb_info_users.inf_registration',
					'key' => $matric->row_array()['usu_session']
				);
			}
		}else{
			$nameuser = array(
					'login' => 'tb_users.usu_login',
					'key' =>  $user->row_array()['usu_session']
				);
		}
		if(!$nameuser and !$matric){
			set_msg('login e/ou senhas inválidos <i>erro: ul02</i>','danger');
			return false;
		}else{
			if($nameuser){
				$enter = $nameuser['login'];
				$key = $nameuser['key'];
			}else{
				$enter = $matricu['matricula'];
				$key = $matricu['key'];
			}
			$resul = $user->row_array();
			$password = returnBcrypt($values['senha'],$key);
			//$q = array('USU_login' => $values['login'], 'USU_senha' => $password, );
			$this->db->select('*');
			$this->db->from('tb_users');
			$this->db->join('tb_info_users','tb_users.usu_id = tb_info_users.inf_usu_id and '.$enter.' = "'.$values["login"].'" and tb_users.usu_password = "'.$password.'"','inner');
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

				redirect('dashboard','refresh');
			}else{
				set_msg('login e/ou senhas inválidos <i>erro: ul03</i>','danger');
				return false;
			}
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
				$password = createBcrypt($values['senha']);
				$info_login = array(
					'usu_login' => $values['login'],
					'usu_password' => $password['cript'],
					'usu_perm' => $values['perm'],
					'usu_session' => $password['hskey'],
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
						$newprof = array(
							'tea_usu_id' => $id_usuario,
							'tea_sub_id' => $values['materia']
							);
						$this->db->insert('tb_teacher_subject',$newprof);
						if($this->db->insert_id()){
							set_msg_pop('Professor Cadastrado com sucesso, use estas informações para acessar o sistema','success','normal');
							return TRUE;
						}else{
							set_msg_pop('Não foi possível cadastrar este professor<br>erro: np01','error','normal');
							return FALSE;
						}
						
					}else{
						$msg = set_msg('Aluno Cadastrado com sucesso, use estas informações para acessar o sistema','success');
						redirect('login','refresh');
					}
					
					return TRUE;
				}else{
					set_msg('Não foi possível cadastrar o usuário!<br>erro: np02','danger');
					return FALSE;
				}
			}
		}
	}

	public function transformProf($values){
		$this->db->select('*');
		$this->db->from('tb_users');
		$this->db->where('usu_id',$values['login']);
		$this->db->where('usu_perm',1);
		$this->db->limit(1);
		$query = $this->db->get();

		$this->db->select('*');
		$this->db->from('tb_subjects');
		$this->db->where('sub_id',$values['materia']);
		$this->db->limit(1);
		$query2 = $this->db->get();

		if($query->num_rows() > 0 and $query2->num_rows() > 0){
			$this->db->select('*');
			$this->db->from('tb_teacher_subject');
			$this->db->where('tea_usu_id',$values['login']);
			$this->db->where('tea_sub_id',$values['materia']);
			$jaexiste = $this->db->get();

			if($jaexiste->num_rows() == 0){
				$newprof = array(
						'tea_usu_id' => $values['login'], 
						'tea_sub_id' => $values['materia']
						);
				$this->db->insert('tb_teacher_subject',$newprof);
				if($this->db->insert_id()){
					$this->db->set('usu_perm',2);
					$this->db->where('usu_id',$values['login']);
					$this->db->update('tb_users');
					if($this->db->affected_rows()>0){
						$this->db->where('reg_usu_id',$values['login']);
						$this->db->delete('tb_register_class');
						set_msg_pop('Cadastro atualizado com sucesso! '.$query->row()->usu_login.' agora é um professor');
						return TRUE;
					}else{
						set_msg_pop('Não foi possível alterar o professor desta matéria<br>erro: tp01','error','normal');
						return FALSE;
					}
				}else{
					set_msg_pop('Não foi possível adicionar este professor<br>erro: tp02','error','normal');
					return FALSE;
				}
				
			}else{
					set_msg_pop('Este usuário já é professor desta matéria<br>erro: tp03','warning','normal');
					return FALSE;
			}
		}else{
			set_msg('Não foi possível alterar este usuário, contate um administrador para mais informações<br>erro: tp04','danger');
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

	public function getPerfil($id){
		$this->db->select('*');
		$this->db->from('tb_users');
		$this->db->join('tb_info_users','tb_users.usu_id = tb_info_users.inf_usu_id','inner');
		$this->db->limit(1);
		$query = $this->db->get();
	}


}