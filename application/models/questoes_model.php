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

	public function editarQuestoes($values){

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
	public function getListainfo($values){
		$this->db->select('*');
		$this->db->from('tb_lists');
		$this->db->where('lis_cla_hash',$values['hash']);
		$this->db->where('lis_id',$values['id']);
		$this->db->limit(1);

		$query2 = $this->db->get();
		if($query2->num_rows() == 1){
			return $query2->row_array();
		}else{
			return false;
		}
	}
	public function getQuestoes($values){
		//$this->db->select('lis_id, lis_cla_hash');
		//$this->db->from('tb_lists');
		//$this->db->where('lis_cla_hash',$values['hash']);
		//$this->db->where('lis_id',$values['id']);
		//$this->db->limit(1);

		//$query = $this->db->get();
		$query = $this->getListainfo($values);
		if($query){
			$this->db->select('*');
			$this->db->from('tb_activities');
			$this->db->where('act_cla_hash',$query['lis_cla_hash']);
			$this->db->where('act_lis_id',$query['lis_id']);
			$query2 = $this->db->get();
			if($query2->num_rows() > 0){
				return $id = $query2->result_array();
			}else{
				set_msg_pop('Questões não encontradas.','error','normal');
				return false;
			}

		}else{
			set_msg_pop('Lista não encontrada.','error','normal');
			return false;
		}
		
	}

	public function regResposta($dados,$respostas,$idq){

		if(count($idq) == count($respostas) and count($dados) == 3){
			$hash = $dados['hash'];
			$this->db->select('*');
			$this->db->from('tb_answers');
			$this->db->where('ans_usu_id',$dados['id_usuario']);
			$this->db->where('ans_lis_id',$dados['id_lista']);
			$this->db->where('ans_cla_hash',$dados['hash']);
			$query = $this->db->get();

			if($query->num_rows() == count($respostas)){
				//achou uma resposta
				$this->db->trans_start();
				for ($i=0; $i < count($respostas); $i++) { 
					$this->db->set('ans_resposta',$respostas[$i]);
					$try = (int)$query->row()->ans_tries+1;
					$this->db->set('ans_tries',$try);
					$this->db->set('ans_date',date('d-m-Y G:i'));
					$this->db->set('ans_status',2);
					$this->db->where('ans_usu_id',$dados['id_usuario']);
					$this->db->where('ans_lis_id',$dados['id_lista']);
					$this->db->where('ans_act_id',$idq[$i]);
					$this->db->update('tb_answers');
				}
				$this->db->trans_complete();

				if ($this->db->trans_status() === FALSE) {
				    # Something went wrong.
				    set_msg_pop($this->db->trans_rollback(),'error','normal');
				    return false;
				}else{

					set_msg_pop('Resposta computada com sucesso','success','normal');
					redirect('turma/'.$dados['hash'].'/responder/'.$dados['id_lista'],'refresh');
					return true;
				}

			}else{
				//nao achou, cadastrar nova resposta
				$dados1 = array(
					'ans_lis_id'=>(int)$dados['id_lista'],
					'ans_usu_id'=>(int)$dados['id_usuario'],
					'ans_cla_hash' => $hash,
					'ans_tries' => 1
				);
				$this->db->trans_start();
				for ($i=0; $i < count($respostas); $i++) { 
					$dados1['ans_act_id'] = $idq[$i];
					$dados1['ans_date'] = date('d-m-Y G:i');
					$dados1['ans_resposta'] = $respostas[$i];
					$dados1['ans_status'] = 0;
					$this->db->insert('tb_answers',$dados1);
				}
				$this->db->trans_complete();

				if ($this->db->trans_status() === FALSE) {
				    # Something went wrong.
				    set_msg_pop($this->db->trans_rollback(),'error','normal');
				    return false;
				}else{
					set_msg('Resposta computada com sucesso pela primeira vez','success');
					set_msg_pop('Resposta computada com sucesso pela primeira vez','success','normal');
					return $hash;
				}
			}
		}else{
			set_msg_pop('Parametros incorretos para esta solicitação','error','normal');
			return false;
		}
	}

	public function getRespostas($values){
		$this->db->select('*');
		$this->db->from('tb_answers');
		$this->db->join('tb_activities','tb_activities.act_lis_id = "'.$values['id_lista'].'" and tb_activities.act_cla_hash = tb_answers.ans_cla_hash and tb_answers.ans_cla_hash = "'.$values['hash'].'" and tb_answers.ans_usu_id="'.$values['id_usuario'].'" and tb_answers.ans_act_id = tb_activities.act_id','inner');
		//$this->db->get();

		return $this->db->get()->result_array();
	}

	public function corrigirLista($values){
		$dados = array(
			'rev_lis_id' => $values['id_lista'],
			'rev_usu_id' => $values['id_aluno'],
			'rev_nota' => $values['nota_lista']
		);
		$this->db->select('rev_id');
		$this->db->from('tb_reviews');
		$this->db->where('rev_lis_id',$values['id_lista']);
		$this->db->where('rev_usu_id',$values['id_aluno']);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			$this->db->set('rev_nota',$values['nota_lista']);
			$this->db->where('rev_lis_id',$values['id_lista']);
			$this->db->where('rev_usu_id',$values['id_aluno']);
			$this->db->update('tb_reviews');

			if($this->db->affected_rows() > 0){
				$this->db->set('ans_status',1);
				$this->db->where('ans_usu_id',$values['id_aluno']);
				$this->db->where('ans_lis_id',$values['id_lista']);
				$this->db->update('tb_answers');
				set_msg_pop('Nota atualizada com sucesso','success','normal');
				return true;
			}else{
				set_msg_pop('Nota não pode ser atualizada','error','normal');
				return false;
			}
		}else{
			$this->db->insert('tb_reviews',$dados);

			if($this->db->insert_id()){
				$this->db->set('ans_status',1);
				$this->db->where('ans_usu_id',$values['id_aluno']);
				$this->db->where('ans_lis_id',$values['id_lista']);
				$this->db->update('tb_answers');
				set_msg_pop('Nota cadastrada com sucesso','success','normal');
				return true;
			}else{
				set_msg_pop('Nota não pode ser cadastrada','error','normal');
				return false;
			}
		}

		
	}

	public function getNotaLista($values){
		$this->db->select('rev_nota');
		$this->db->from('tb_reviews');
		$this->db->where('rev_lis_id',$values['id_lista']);
		$this->db->where('rev_usu_id',$values['id_aluno']);
		$this->db->limit(1);
		$query = $this->db->get();

		if($query->num_rows() == 1){
			return $query->row()->rev_nota;
		}else{
			return false;
		}
	}

	public function excluirLista($values){
		$this->db->trans_start();
			$this->db->where('lis_id',$values['id']);
			$this->db->where('lis_cla_hash',$values['hash']);
			$this->db->delete('tb_lists');
			$this->db->where('act_lis_id',$values['id']);
			$this->db->where('act_cla_hash',$values['hash']);
			$this->db->delete('tb_activities');
			$this->db->where('ans_lis_id',$values['id']);
			$this->db->where('ans_cla_hash',$values['hash']);
			$this->db->delete('tb_answers');
			$this->db->where('rev_lis_id',$values['id']);
			$this->db->delete('tb_reviews');
		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			set_msg_pop($this->db->trans_rollback(),'error','normal');
			return false;
		}else{
			$this->db->trans_commit();
			$pasta = "./assets/img/listas/".$values['id'];

			if(is_dir($pasta)){
				$dirr = dir($pasta);
				while ($arquivo = $dirr->read()) {
					if ($arquivo != '.' and $arquivo != '..') {
						unlink($pasta.'/'.$arquivo);
					}
				}
				$dirr->close();
				rmdir($pasta);
			}

			return true;
		}
	}
}