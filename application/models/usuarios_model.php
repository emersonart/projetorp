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
				if(!empty($this->session->userdata('pagina_anterior'))){
					$page = $this->session->userdata('pagina_anterior');
					$q1 = explode('?',$page);
					$q1 = $q1[1];
					$q2 = explode('&',$q1);
					if(count($q2) > 0){
						$q3 = explode('=',$q2[0]);
						$pagina_anterior = str_replace(',', '/', $q3[1]).'?'.explode($q3[1],$q1)[1];
					}else{
						$q3 = explode('=',$q2[0]);
						$pagina_anterior  = str_replace(',', '/', $q3[1]);
					}
					redirect($pagina_anterior,'refresh');
				}else{
					redirect('dashboard','refresh');
				}
				
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

	public function getAllUsers($tipo = NULL,$turma = FALSE){
    	$this->db->select('*');
    	$this->db->from('tb_users');
    	$this->db->join('tb_info_users','tb_users.usu_id = tb_info_users.inf_usu_id','inner');
    	if($tipo != NULL){
    		if($tipo == 2){
    			$this->db->join('tb_teacher_subject','tb_teacher_subject.tea_usu_id = tb_users.usu_id','inner');
    			$this->db->join('tb_subjects','tb_teacher_subject.tea_sub_id = tb_subjects.sub_id','inner');
    		}
    		if($tipo == 'adm'){

    			$this->db->where('tb_users.usu_perm',0);
    		}else{
    			$this->db->where('tb_users.usu_perm',$tipo);
    		}


    		
    	}
    	if($turma == TRUE and $tipo == 1){
    		$this->db->join('tb_register_class','tb_register_class.reg_usu_id = tb_users.usu_id','inner');
    		$this->db->join('tb_class','tb_class.cla_hash = tb_register_class.reg_cla_hash','inner');

    	}
    	$this->db->order_by('tb_info_users.inf_name','asc');

    	$query = $this->db->get();
    	if($query->num_rows() > 0){
    		return $query->result();
    	}else{
    		return false;
    	}
    }

	public function getPerfil($dado){

		$this->db->select('usu_id');
		$this->db->from('tb_users');
		$this->db->limit(1);
		$this->db->where('usu_login',$dado);

		$query = $this->db->get();

		if($query->num_rows() == 1){
			$nomeusuario = TRUE;
			$idusuario = FALSE;
			$id = $query->row_array()['usu_id'];
		}else{
			$this->db->select('usu_id');
			$this->db->from('tb_users');
			$this->db->limit(1);
			$this->db->where('usu_id',$dado);

			$query1 = $this->db->get();
			if($query1->num_rows() == 1){
				$nomeusuario = FALSE;
				$idusuario = TRUE;
				$id = $query1->row_array()['usu_id'];
			}else{
				$nomeusuario = FALSE;
				$idusuario = FALSE;
			}
		}

		if(!$nomeusuario and !$idusuario){
			set_msg_pop('usuário não encontrado','error','normal');
			return false;
		}


		$this->db->select('*');
		$this->db->from('tb_users');
		$this->db->join('tb_info_users','tb_users.usu_id = tb_info_users.inf_usu_id','inner');
		$this->db->where('tb_users.usu_id',$id);
		$this->db->limit(1);
		$query = $this->db->get();

		if($query->num_rows() == 1){
			return $query->row_array();
		}else{
			return false;
		}
	}

	public function forget_password($value){
		$this->db->select('*');
		$this->db->from('tb_info_users');
		$this->db->where('inf_email',$value);
		$this->db->or_where('inf_registration',$value);
		$this->db->limit(1);
		$q_info = $this->db->get();

		$this->db->select('*');
		$this->db->from('tb_users');
		$this->db->join('tb_info_users','tb_info_users.inf_usu_id = tb_users.usu_id','inner');
		$this->db->where('tb_users.usu_login',$value);
		$this->db->limit(1);
		$q_login = $this->db->get();


		if($q_info->num_rows() == 1){
			$results = $q_info->row_array();
			$id_usuario = $q_info->row_array()['inf_usu_id'];
		}else if($q_login->num_rows() == 1){
			$results = $q_login->row_array();
			$id_usuario = $q_login->row_array()['usu_id'];
		}else{
			set_msg('Usuário não encontrado','danger');
			return FALSE;
		}
		$date = date('d-m-Y H:i');
		$validation = 'k'.bin2hex($this->encryption->create_key(2)).'o'.bin2hex($this->encryption->create_key(2)).'a'.bin2hex($this->encryption->create_key(2)).'l'.strtotime($date).'a';

		$dados_insert = array('rec_usu_id' => $id_usuario, 'rec_validation' => $validation,'rec_date' => $date);

		$this->db->insert('tb_recovery_password',$dados_insert);

		if($this->db->insert_id()){
			$link = base_url('recovery?hash='.$id_usuario.'&token='.$validation);
			$send_email = array(
					'emails' => $results['inf_email'], 
					'message' => '<h1>Redefinição de senha</h1><br><h3>Olá, '.$results['inf_name'].'</h3><br><p>Foi solicitado a redefinição de senha para a sua conta no <a href="'.base_url().'" target="_blank">Koala Educational</a><br><br>Para redefinir sua senha acesse o link: <a href="'.$link.'" target="_blank">Clique Aqui</a><br><br>Não consegue acessar pelo link? Cole isto no seu navegador: {unwrap}'.$link.'{/unwrap}<br><br>*Esse link irá expirar em 2 dias.</p><p>Nao foi você que solicitou a redefinição de senha? Tudo bem, ignore este email.<br><br>Não responda este email!<br><a href="'.base_url().'" target="_blank">Koala Educational</a>',
					'subject' => 'Redefinição de senha'
				);

				send_email($send_email);

				set_msg('Um email para redefinição  de senha foi enviado para o email cadastrado nessa conta, siga os passos do email!<br>O link enviado no email tem validade de 02 dias','success');
				return TRUE;
		}else{
			set_msg('Erro ao solicitar redefinição de senha.<br>erro: rp01','warning');
			return false;
		}


	}

	public function verif_token($id,$token){
		$this->db->select('*');
		$this->db->from('tb_recovery_password');
		$this->db->where('rec_usu_id',$id);
		$this->db->where('rec_validation',$token);
		$this->db->limit(1);
		$query = $this->db->get();

		if($query->num_rows() == 1){
			$result = $query->row_array();
			$databanco = date('d-m-Y G:i',strtotime($result['rec_date']));
			$databanco2 = date('d-m-Y G:i',strtotime("+2 days",strtotime($result['rec_date']))); 
			$dataatual =date('d-m-Y G:i');

			if($databanco2 >= $dataatual){
				echo "data do banco está válida<br><br>";
				echo 'data banco + 2 dias:'.$databanco2." > data atual: ".$dataatual;
				return TRUE;

			}else{
				echo "data do banco não está válida<br><br>";
				echo 'data atual:'.$dataatual." < data do banco + 2 dias: ".$databanco2;
				$this->delete_token($id,$token);
				return false;
			}
			
		}else{
			set_msg('Token de redefinição de senha não existe ou expirou.','warning');
			return false;
		}

	}

	public function delete_token($id,$token){
		$this->db->where('rec_usu_id',$id);
		$this->db->where('rec_validation',$token);
		$this->db->delete('tb_recovery_password');
	}

	public function redefine_password($values){
		$password = createBcrypt($values['senha']);

		$this->db->set('usu_password',$password['cript']);
		$this->db->set('usu_session',$password['hskey']);
		$this->db->where('usu_id',$values['idusuario']);
		$this->db->update('tb_users');
		
		if($this->db->affected_rows()>0){
			set_msg('Senha alterada com sucesso, use sua nova senha para acessar o sistema','success');
			return TRUE;
		}else{
			set_msg('Não foi possível alterar a senha','danger');
			return FALSE;
		}

	}

}