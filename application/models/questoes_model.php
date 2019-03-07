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
			'lis_cla_hash' => $values['class_hash'],
			'lis_endtime' => $values['endtime']
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
	public function excluirfotolista($id){
		$this->db->select('*');
		$this->db->from('tb_activities');
		$this->db->where('act_id',$id);
		$this->db->limit(1);
		$query = $this->db->get();

		if($query->num_rows() == 1 ){
			$foto = $query->row_array()['act_foto'];
			$this->db->set('act_foto','');
			$this->db->where('act_id',$id);
			$this->db->update('tb_activities');

			if($this->db->affected_rows() > 0){
				unlink('./'.$foto);
				set_msg_pop('Foto excluída com sucesso, continue a edição da lista','success','normal');
				return true;
			}else{
				set_msg_pop('Não foi possível excluir a foto','error','normal');
				return false;
			}
		}else{
			set_msg_pop('Atividade não encontrada, portanto não possível excluir a foto','error','normal');
			return false;
		}
	}
	public function editarQuestoes($infos,$values){

		$this->db->select('*');
		$this->db->from('tb_lists');
		$this->db->where('lis_id',$infos['id_lista']);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			if($query->row_array()['lis_name'] != $values['nome_lista'] and !empty($values['nome_lista'])){
				$this->db->set('lis_name',$values['nome_lista']);
				$this->db->where('lis_id',$infos['id_lista']);
				$this->db->update('tb_lists');
			}else{
				$fff = "<strong>Nome da lista</strong> não foi alterado.";
			}
			$cropdate = explode(' ', $values['final_date']);
			$date = converter_data($cropdate[0],4);
			$finaldate = $date.' '.$cropdate[1];

			if($query->row_array()['lis_endtime'] == '' or empty($query->row_array()['lis_endtime'])){
				$finaldatedb = "1900-01-01 00:00";
			}else{
				$cropdatedb = explode(' ', $query->row_array()['lis_endtime']);
				$datedb = converter_data($cropdatedb[0],4);
				$finaldatedb = $datedb.' '.$cropdatedb[1];
			}
			
			if(strtotime($finaldate) > strtotime($finaldatedb)){
				$this->db->set('lis_endtime',$values['final_date']);
				$this->db->where('lis_id',$infos['id_lista']);
				$this->db->update('tb_lists');
			}else{
				if(isset($fff)){
					$fff .= "<br><strong>Data e hora</strong> igual ou menor que a cadastrada anteriormente, portanto não foi atualizada";
				}else{
					$fff = '<strong>Data e hora</strong> igual ou menor que a cadastrada anteriormente, portanto não foi atualizada';
				}
				
			}
		}else{
			set_msg_pop('Lista não encontrada lista, error: li01','error','normal');
			return false;
		}

		$this->db->select('*');
		$this->db->from('tb_activities');
		$this->db->where('act_lis_id',$infos['id_lista']);
		$query = $this->db->get();
		
		if($fot = atualizar_imagem_lista($infos['hash'],$infos['id_lista'],$values['fotos'],$values['new_fotos'])){
			
			if($query->num_rows() > 0){
				$c = 0;
				$result = $query->result();
				$this->db->trans_start();
				foreach ($result as $linha) {
					$bbb[$c] = $linha->act_foto;
					if($linha->act_enunciado != $values['questoes'] and !empty($values['questoes'][$c])){
						$this->db->set('act_enunciado',$values['questoes'][$c]);
						$this->db->where('act_lis_id',$infos['id_lista']);
						$this->db->where('act_id',$values['id_questoes'][$c]);
						$this->db->update('tb_activities');
					}
					if($fot[$c] != '' and ($linha->act_foto != $fot[$c] or $linha->act_foto == '')){
						$this->db->set('act_foto',$fot[$c]);
						$this->db->where('act_id',$values['id_questoes'][$c]);
						$this->db->where('act_lis_id',$infos['id_lista']);
						$this->db->update('tb_activities');
						$vv[$c] = 'entrou';
					}

				$c++;
					

					
				}
				$this->db->trans_complete();
				if ($this->db->trans_status() === FALSE) {
		    # Something went wrong.
						set_msg($this->db->trans_rollback(),'warning');
		    //for($j = 0; $j < count($fotos);$j++){
		    //	if($fotos[$i] != ''){
		 	//		unlink('./'.$fotos[$j]);
		 	//	}
		    //}
		    //$this->db->where('lis_id',$lista['id_lista']);
		    //$this->db->delete('tb_lists');
						set_msg_pop('deu erro no transaction erro: tr01','error','normal');
						return false;
					}else {
		    # Everything is Perfect. 
		    # Committing data to the database.
						$this->db->trans_commit();
				//set_msg_pop('Lista Criada com sucesso','success','normal');
						for($i = 0; $i < count($fot);$i++){
							$fotoq = explode('.', $values['fotos'][$i]);
							if(isset($fotoq[0]) and isset($fotoq[1])){
								$fotoq = $fotoq[0].'-rename.'.$fotoq[1];

								if(file_exists('./'.$fotoq)){

									unlink('./'.$fotoq);
								}
							}


						}
						$msg = 'Lista atualizada com sucesso';
						$tam = "normal";
						if(isset($fff)){
							$msg .= '<br>'.$fff;
							$tam = "large";						}
						set_msg_pop($msg,'success',$tam);
						redirect('turma/'.$infos['hash'].'/editar/'.$infos['id_lista'],'refresh');
						return true;
					}
			}
			

			
		}else{
			set_msg_pop('error na imagem erro: im02','error','normal');
			return false;
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
			if(isset($values['id_act']) and !empty($values['id_act'])){
				$this->db->where('act_id',$values['id_act']);
				$this->db->limit(1);
				$q = TRUE;
			}else{
				$q = FALSE;
			}
			$query2 = $this->db->get();
			if($query2->num_rows() > 0){
				if($q){
					return $id = $query2->row_array();
				}else{
					return $id = $query2->result_array();
				}
				
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
		$this->db->select('lis_endtime');
		$this->db->from('tb_lists');
		$this->db->where('lis_id',$dados['id_lista']);
		$this->db->limit(1);
		$qq = $this->db->get();
		if($qq->num_rows() == 1){
			$qq1 = $qq->row_array()['lis_endtime'];
			$qq2 = explode(' ',$qq1);
			$qq3 = converter_data($qq2[0],4);
			$timee = $qq3.' '.$qq2[1];
			if(strtotime(date('Y-m-d H:i')) > strtotime($timee)){
				$data = converter_data($qq2[0],3);
				set_msg_pop('O período para responder esta lista expirou!<br>A data era até '.$data.' às '.$qq2[1].'!','error','normal');
				return false;
			}
		
			if(count($idq) == count($respostas) and count($dados) == 3){
				$this->db->select('*');
				$this->db->from('tb_reviews');
				$this->db->where('rev_usu_id',$dados['id_usuario']);
				$this->db->where('rev_lis_id',$dados['id_lista']);
				$respondida = $this->db->get();
				if($respondida->num_rows() > 0){
					set_msg_pop('Sua Resposta já foi corrigida, portanto não poderá mais alterar sua resposta','error','large');
					redirect('turma/'.$dados['hash'],'refresh');
					return false;
				}



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
						$this->db->set('ans_status',0);
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
			set_msg_pop('achou','success','normal');
		}else{
			set_msg_pop('nao achou!?','warning','normal');
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

				$email = $this->turma->getAluno($values['id_aluno'])['inf_email'];
				$lista = $this->getListainfo(array('hash' => $values['hash'], 'id' => $values['id_lista']))['lis_name'];
				$send_email = array(
					'subject' => 'Lista "'.$lista.'" foi recorrigida!', 
					'message' => '<h1>UHU!</h1><p>Olha só! A nota da sua respota na lista "'.$lista.'" foi atualizada!</p><p>Para ver acesse o <a href="'.base_url('turma/'.$values['hash'].'/listas').'" target="_blank">sistema</a> ou cole no seu navegador: '.base_url('turma/'.$values['hash'].'/listas').'<br><br>Não Responda este email!<br><a href="'.base_url('login').'" target="_blank">Koala Educational</a>',
					'emails' => $email
					);
				send_email($send_email);

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

				$email = $this->turma->getAluno($values['id_aluno'])['inf_email'];
				$lista = $this->getListainfo(array('hash' => $values['hash'], 'id' => $values['id_lista']))['lis_name'];
				$send_email = array(
					'subject' => 'Lista "'.$lista.'" foi corrigida!', 
					'message' => '<h1>UHU!</h1><p>Olha só! Sua resposta na lista "'.$lista.'" foi corrigida!</p><p>Para ver acesse o <a href="'.base_url('turma/'.$values['hash'].'/listas').'" target="_blank">sistema</a> ou cole no seu navegador: '.base_url('turma/'.$values['hash'].'/listas').'<br><br>Não Responda este email!<br><a href="'.base_url('login').'" target="_blank">Koala Educational</a>',
					'emails' => $email
					);
				send_email($send_email);
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