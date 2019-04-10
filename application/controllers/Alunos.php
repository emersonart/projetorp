<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alunos extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('usuarios_model','usuario');
		$this->load->model('questoes_model','questao');
		$this->load->model('option_model','option');
		$this->load->model('turmas_model','turma');
	}

	public function index(){
		redirect('perfil','refresh');
	}

	public function ver_gabarito($hash,$id){
		verif_login();
		$values = array('id' => $id,'hash' => $hash,'id_usuario'=>$this->session->userdata('id_usuario') );
		$questoes= $this->questao->getQuestoes($values);
		$lista = $this->questao->getListainfo($values);
		$alu = $this->turma->verifAluno($values);
		$gabarito = $this->questao->getGabarito($id);
		if($questoes and $lista and ($alu or ($lista['lis_teacher'] == $this->session->userdata('id_usuario') or verif_login('',2,false)))){
			if($gabarito and ($lista['lis_gab_status'] == '1' and $alu) or ($lista['lis_teacher'] == $this->session->userdata('id_usuario') or verif_login('',2,false))){
				$dados['gabarito'] = $gabarito;
				$dados['titulo'] = $lista['lis_name'];
				$dados['lista'] = $lista;
				$dados['questoes'] = $questoes;
				$dat = explode(' ',$lista['lis_endtime'])[0];
				$hora = explode(' ',$lista['lis_endtime'])[1];
				$data = converter_data($dat,3).' às '.$hora;
				$dados['data_final'] = $data;
				$dados['aluno'] = $alu;
				$dados['h1'] = 'Ver Gabarito: '.$dados['titulo'];

			}else{
				set_msg_pop('Sem permissão para acessar esta página','warning','normal');
				redirect('dashboard','refresh');
			}
		}else{
			set_msg_pop('Lista e/ou gabarito não encontrada','error','normal');
			redirect('dashboard','refresh');
		}
		load_template('professor/vergabarito',$dados);
	}

	public function responderLista($hash,$id){
		verif_login();
		$values = array('id' => $id,'hash' => $hash,'id_usuario'=>$this->session->userdata('id_usuario') );
		if($lista = $this->questao->getQuestoes($values) and ($alu = $this->turma->verifAluno($values) or verif_login('',2,false))){

			$respostaanterior = $this->questao->getRespostas(array('hash' => $hash, 'id_lista'=>$id,'id_usuario'=>$this->session->userdata('id_usuario')));

			if($respostaanterior){
				$dados['tentativas'] = $this->questao->getRespostas(array('hash' => $hash, 'id_lista'=>$id,'id_usuario'=>$this->session->userdata('id_usuario')))[0]['ans_tries'] +1;
				$dados['respostaanterior'] = $respostaanterior;
				$dados['lista'] = $respostaanterior;
				set_msg('Você já respondeu está lista, portanto sua resposta anterior foi automaticamente preenchida','info');
			}else{
				$dados['lista'] = $lista;
				$dados['tentativas'] = 1;
				$dados['respostaanterior'] = false;
			}
			$dados['listainfo'] = $this->questao->getListainfo($values);
			if(!empty($dados['listainfo']['lis_endtime'])){

		     $dados['datalimite'] = converter_data(explode(' ',$dados['listainfo']['lis_endtime'])[0],3).' às '.explode(' ',$dados['listainfo']['lis_endtime'])[1];
			 $data = converter_data(explode(' ',$dados['listainfo']['lis_endtime'])[0],4).' '.explode(' ',$dados['listainfo']['lis_endtime'])[1];
			 	$dat = explode(' ',$dados['listainfo']['lis_endtime'])[0];
				$horaa = explode(' ',$dados['listainfo']['lis_endtime'])[1];
				$dataa = converter_data($dat,3).' às '.$horaa;
            $now = date('Y-m-d H:i');
            $t = strtotime($now);
            $banco = strtotime($data);
            $dados['data_final'] = $dataa;
            if($t > $banco){ 
            	
            		            	$dados['listavencida'] = '<div class="col-lg-10 col-lg-offset-1">
              <div class="alert alert-danger alert-st-four" role="alert">
                            <i class="fa fa-exclamation-triangle edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                            <p class="message-mg-rt"><strong>Ops!</strong> Não é possível mais responder esta lista! <br> A data para responder foi até <strong>'.converter_data(explode(' ',$dados['listainfo']['lis_endtime'])[0],3).'</strong> às <strong>'.explode(' ',$dados['listainfo']['lis_endtime'])[1].'</strong></p>
                          </div>
                        </div>';
            	

            }
			}
			$dados['h1'] = 'Responder lista: '.$dados['listainfo']['lis_name'];

			$this->form_validation->set_rules('respostas[]','Respostas','trim|min_length[10]');
			$this->form_validation->set_rules('qid[]','Descrição da Turma','trim|integer');

			if($this->form_validation->run() == FALSE){
				if(validation_errors()){
					set_msg(validation_errors(),'danger');
				}
			}else{
				if(verif_login('',2,FALSE)){

					set_msg_pop('Você não é um aluno desta turma, não pode responder essa lista. :'.verif_login('',2,FALSE),'warning','normal');
				}else{
					$dados_form = $this->input->post();
					$dd = array(
						'id_usuario' => $this->session->userdata('id_usuario'),
						'hash' => $hash,
						'id_lista' => $dados['listainfo']['lis_id']
					);
					$this->questao->regResposta($dd,$dados_form['respostas'],$dados_form['qid']);
				}
				
					
			
			}	

			load_template('aluno/responder',$dados);
		}else{
			set_msg_pop('Questões não encontradas ou você não possui permissão para acessar essa lista','warning','normal');
			redirect('dashboard','refresh');
		}
		
	}

	public function meuboletim(){
		verif_login();
		load_template('aluno/boletimaluno');
	}

}