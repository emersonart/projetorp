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

	public function responderLista($hash,$id){
		$values = array('id' => $id,'hash' => $hash );
		if($lista = $this->questao->getLista($values) and ($alu = $this->turma->verifAluno($hash) or verif_login('',2,false))){

			$dados['lista'] = $lista;
			$dados['listainfo'] = $this->questao->getListainfo($values);
			$dados['h1'] = 'Responder lista: '.$dados['listainfo']['lis_name'];

			$this->form_validation->set_rules('respostas[]','Descrição da Turma','trim|min_length[10]');
			$this->form_validation->set_rules('qid[]','Descrição da Turma','trim|integer');

			if($this->form_validation->run() == FALSE){
				if(validation_errors()){
					set_msg(validation_errors(),'danger');
				}
			}else{
				if(verif_login('',2,false)){
					set_msg_pop('Você não é um aluno desta turma, não pode responder essa lista.','warning','normal');
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
		}
		
	}

	public function criarResposta($hash,$id){
		load_template('painel/teste');
	}
}