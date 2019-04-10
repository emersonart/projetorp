<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('usuarios_model','usuario');
		$this->load->model('questoes_model','questao');
		$this->load->model('option_model','option');
		$this->load->model('turmas_model','turma');
	}

	public function index(){
		redirect('dashboard','refresh');
	}

	public function criarSala(){
		verif_login('dashboard',2);
		$dados['h1'] = 'Criar nova Turma';

		
		//parametros de validação
		$this->form_validation->set_rules('nomeTurma','Nome da Turma','trim|required|min_length[5]|is_unique[tb_class.cla_nome]', array('required' => 'É obrigatório inserir um nome para a turma','is_unique'=>'Nome da turma já em uso'));
		$this->form_validation->set_rules('descricaoTurma','Descrição da Turma','trim');
		$this->form_validation->set_rules('periodosTurma','Períodos da turma','trim|required|callback_regex_periodo');
		$this->form_validation->set_rules('tempoTurma','Inscrições até:','trim|required|regex_match[/^([2-9][0-9][0-9][0-9])-([0-1][0-9])-([0-3][0-9])$/]',array('regex_match' => 'Formato inválido da data: 0000-00-00','required'=>'É obrigatório inserir uma data para o final das inscrições'));//|regex_match[/^([0-1]?[1-2]-([0-1]|[3-4])(0|5)$/]
		if($this->session->userdata('perm') == 0){
			$dados['adm'] = TRUE;
			$dados['professores'] = $this->usuario->getUsers(2);
			$this->form_validation->set_rules('profTurma','Professor:','trim|required|greater_than[0]',array('greater_than'=>'É obrigatório inserir um professor para esta turma','required'=>'É obrigatório inserir um professor para esta turma'));
		}else{
			$dados['hash'] = gerarHash($this->session->userdata('id_usuario'));
			$dados['adm'] = FALSE;
		}

		//verifica validação
		if($this->form_validation->run() == FALSE){
			if(validation_errors()){
				set_msg(validation_errors(),'danger');
			}
		}else{
			$dados_form = $this->input->post();
			if($this->session->userdata('perm') == 0){
				$prof = $dados_form['profTurma'];
				$dados['hash'] = gerarHash($dados_form['profTurma']);

			}else{
				$prof = $this->session->userdata('id_usuario');
			}	
			$valor = array(
				'nomeTurma' => $dados_form['nomeTurma'],
				'descricaoTurma' => $dados_form['descricaoTurma'],
				'hashTurma' => $dados['hash'],
				'startHash' => date('d-m-Y'),
				'endHash' => converter_data($dados_form['tempoTurma'],2),
				'profTurma' => $prof,
				'inscTurma' => 1,
				'periodosTurma' => $dados_form['periodosTurma']
			);
			$this->turma->criarTurma($valor);
		}

		load_template('professor/criarSala',$dados);

	}

	public function regex_periodo($val){
		$val = strtolower($val);
		if ($val != "bimestre" and $val != "trimestre" and $val != "semestre" ){
	        $this->form_validation->set_message('regex_periodo', 'Período Inválido: '.$val);

	        return FALSE;
	    }else{
	    	
	        return TRUE;
	    }
	}


	public function aprovarCadastro(){
		verif_login('dashboard',2);
		$okhash = $this->turma->getTurma($this->uri->segment(3));
		if(($okhash['cla_teacher'] == $this->session->userdata('id_usuario') or $this->session->userdata('perm') == 0) and !empty($values['id'] = $this->uri->segment(4)) and !empty($values['hash'] = $this->uri->segment(3))){
			$att = $this->turma->aprovCadastro($values);
			redirect('turma/'.$values['hash'].'/pendentes','refresh');
		}

	}

	public function cadastrarQuestoes($hashs){
		verif_login('dashboard',2);
		if($dados_hash = $this->turma->getTurma($hashs)){

			$dados['h1'] = 'Cadastrar questões';
			$dados['qtd'] = (int)$this->option->get_option('qtd_atv');

			if(isset($_POST) and !empty($_POST)){
				$_POST['nomeLista'] .= "_KOALA_".$hashs;
			}
			if(!empty(set_value('nomeLista'))){
				$nomeeli = set_value('nomeLista');
				$dados['nomeeli'] = explode('_KOALA_',$nomeeli)[0];
			}else{
				$dados['nomeeli'] = '';
			}
			//parametros de validação
			$this->form_validation->set_rules('nomeLista','Nome da Lista','trim|required|xss_clean|min_length[5]|callback_regex_namelist', array('required' => 'É obrigatório inserir um nome para a lista'));
			$this->form_validation->set_rules('questoes[]','Questões','trim|required|xss_clean|min_length[12]',array('required'=>'É obrigatório inserir todas as questões para esta lista'));
			$this->form_validation->set_rules('fotos[]','Fotos','trim');
			$this->form_validation->set_rules('enddate','Data final para a lista','trim|required|regex_match[/^([2-9][0-9][0-9][0-9])-([0-1][0-9])-([0-3][0-9])$/]',array('regex_match' => 'Formato inválido de data'));
			$this->form_validation->set_rules('endtime','Hora final para a lista','trim|required|callback_regex_check');//(2[0-3]|[0?1][0-9]):([0-5][0-9])

			//verifica validação
			if($this->form_validation->run() == FALSE){
				if(validation_errors()){
					set_msg(validation_errors(),'danger');
				}
			}else{
				
				$dados_form = $this->input->post();
				$fotos = $_FILES['fotos'];
				$filesCount = count($fotos['name']); 
				$filesFinalCount = 0;
				$dados_form['nomeLista'] = explode('_KOALA_',$dados_form['nomeLista'])[0];
				$dados_lista['nomeLista'] = $dados_form['nomeLista'];
				$dados_lista['id_professor'] = $dados_hash['cla_teacher'];
				$dados_lista['subject'] = $dados_hash['sub_id'];
				$dados_lista['class_hash'] =  $dados_hash['cla_hash'];
				$date = converter_data($dados_form['enddate'],4);
				$dados_lista['endtime'] = $date.' '.$dados_form['endtime'];



				//verificando se a lista foi criada
				if($id_lista = $this->questao->criarLista($dados_lista)){
					if(!empty($fotos['name'])){

						//$url_crop_foto = inserir_imagem_lista($hashs, $id_lista,$fotos);
						$dados_lista['id_lista'] = $id_lista;

						if($url_crop_foto = inserir_imagem_lista($hashs, $id_lista,$fotos)){
							//cadastrar questoes na lista
							$criarq = $this->questao->criarQuestoes($dados_form['questoes'],$dados_lista,$url_crop_foto);
							if($criarq){
								redirect('turma/'.$dados_hash['cla_hash'].'/'.'reggabarito/'.$id_lista,'refresh');
							}else{
								set_msg_pop('Erro ao cadastrar a lista. <br>erro: cl01','error','normal');
							}
							//print_r($url_crop_foto);
							//set_msg_pop('entrou na parte que passou pelo url_crop_foto','success','normal');
							//fim cadastrar questoes na lista
						}else{
							set_msg_pop('Erro ao cadastrar a lista.<br>erro: cl02','error','normal');
						}
					}

						
				}
			
			}

			load_template('professor/cadastrarQuestoes', $dados);
		}else{
			set_msg_pop('Turma não encontrada, portanto não é possível criar uma lista de atividade','error','normal');
			redirect('turmas','refresh');
		}
	}

	public function registrar_gabarito($hash,$id){
		verif_login('dashboard',2);
		$lista = $this->questao->getListainfo(array('id' => $id,'hash' => $hash));
		$questoes = $this->questao->getQuestoes(array('id' => $id,'hash' => $hash));
		$prof = $this->turma->getInfoProf($this->session->userdata('id_usuario'));
		if($questoes and $lista and ($prof or $this->session->userdata('perm') == 0)){
			$dados['gabarito'] = $this->questao->getGabarito($id);
			$dados['titulo'] = $lista['lis_name'];
			$dados['lista'] = $lista;
			$dados['questoes'] = $questoes;
			$dat = explode(' ',$lista['lis_endtime'])[0];
			$hora = explode(' ',$lista['lis_endtime'])[1];
			$data = converter_data($dat,3).' às '.$hora;
			$dados['data_final'] = $data;
			
			$dados['h1'] = 'Registrar Gabarito: '.$dados['titulo'];


			$this->form_validation->set_rules('respostas[]','Respostas','trim|min_length[10]');
			$this->form_validation->set_rules('qid[]','Descrição da Turma','trim|integer');

			if($this->form_validation->run() == FALSE){
				if(validation_errors()){
					set_msg(validation_errors(),'danger');
				}
			}else{
				$dados_form = $this->input->post();
					$dd = array(
						'id_usuario' => $lista['lis_teacher'],
						'hash' => $hash,
						'id_lista' => $lista['lis_id']
					);
					$gabarito = $this->questao->regGabarito($dd,$dados_form['respostas'],$dados_form['qid']);

					if($gabarito){
						redirect('turma/'.$hash.'/listas','refresh');
					}
			}
		}else{
			set_msg_pop('Nenhuma lista foi encontrada','error','normal');
			redirect('turmas','refresh');
		}

		load_template('professor/gabaritoLista',$dados);
	}

	public function regex_namelist($val){
		$quebrar = explode('_KOALA_',$val);
		$values['nomeLista'] = $quebrar[0];
		$values['hash'] = $quebrar[1];

		$encontrou = $this->questao->getListainfo($values);

		if($encontrou){
			$this->form_validation->set_message('regex_namelist','Já existe uma lista com esse nome para esta turma');
			$_POST['nomeLista'] = $values['nomeLista'];
			return FALSE;
		}else{
			return TRUE;
		}

	}
	public function regex_check($str){
	    if (!preg_match('/^(2[0-3]|[0-1][0-9]):[0-5][0-9]$/', $str)){
	        $this->form_validation->set_message('regex_check', 'Formato inválido de hora');

	        return FALSE;
	    }else{
	        return TRUE;
	    }
	}

	public function corrigirLista($hash,$id_lista,$id_aluno){
		verif_login('dashboard',2);
		$okhash = $this->turma->getTurma($hash);
		$oklista = $this->questao->getListainfo(array('hash' => $hash, 'id'=>$id_lista));
		//$okaluno = $this->turma->getAluno($id_aluno);
		$lista = $this->questao->getRespostas(array('hash' => $hash, 'id_lista'=>$id_lista,'id_usuario'=>$id_aluno));
		if(($lista or $this->turma->verifAluno(array('id_usuario' => $id_aluno, 'hash'=>$hash))) and $oklista and $okhash){
			if($no = $this->questao->getNotaLista(array('id_aluno' => $id_aluno, 'id_lista'=>$id_lista))){
				$dados['nota'] = $no;
			}else{
				$dados['nota'] = '';
			}
			
			$okaluno = $this->turma->getAluno($id_aluno);
			$dados['h1'] = 'Lista: '.$oklista['lis_name'];
			$dados['turma'] = $okhash;
			if($lista){
				$dados['semresposta'] = FALSE;
				$dados['lista'] = $lista;

				//parametros post
				$this->form_validation->set_rules('notaLista','Nota da Lista','trim|required', array('required' => 'Nota da lista não inserida'));

				//verificar
				if($this->form_validation->run() == FALSE){
					if(validation_errors()){
						set_msg(validation_errors(),'danger');
					}
				}else{
					$dados_form = $this->input->post();
					$dados_model = array(
						'id_aluno' => $id_aluno,
						'id_lista' => $id_lista,
						'nota_lista' => $dados_form['notaLista'],
						'hash' => $hash
					);

					if($this->questao->corrigirLista($dados_model)){
						$dados['nota'] = $dados_form['notaLista'];
						//continuar aqui pra enviar o email pros alunos
						//redirect('turma/'.$hash.'/respostas/'.$id_lista,'refresh');
					}
				}
			}else{
				$dados['semresposta'] = TRUE;
				$dados['lista'] = $this->questao->getQuestoes(array('hash' => $hash, 'id'=>$id_lista));
			}
			
			$dados['infolista'] = $oklista;
			$dados['aluno'] = $okaluno;
			$dados['qtd'] = count($lista);

			if($okhash['cla_teacher'] == $this->session->userdata('id_usuario')){
				$dados['profok'] = TRUE;
			}else{
				$dados['profok'] = FALSE;
			}


			load_template('professor/corrigirQuestoes', $dados);
		}else if($this->turma->getTurma($hash)){
			set_msg_pop('Lista e/ou Aluno não encontrado nesta turma','warning','normal');
			redirect('turma/'.$hash,'refresh');
		}else{
			set_msg_pop('Turma não encontrada','error','normal');
			redirect('turmas','refresh');
		}
		
	}

	public function excluirLista($hash,$id){
		verif_login('dashboard',2);
		$oklista = $this->questao->getListainfo(array('hash' => $hash, 'id'=>$id));
		if($oklista){
			if($oklista['lis_teacher'] == $this->session->userdata('id_usuario') || $this->session->userdata('perm') == 0){
				if($this->questao->excluirLista(array('hash' => $hash, 'id'=>$id))){
					set_msg_pop('Lista foi excluida com sucesso!','success','normal');
					redirect('turma/'.$hash,'refresh');
				}else{
					set_msg_pop('Não foi possivel excluir esta lista','error','normal');
					redirect('turma/'.$hash,'refresh');
				}
				
			}else{
				set_msg_pop('Você não possui permissão para excluir essa lista!','warning','normal');
				redirect('turma/'.$hash,'refresh');
			}
		}else{
			set_msg_pop('Turma ou lista não encontrada','warning','normal');
			redirect('dashboard','refresh');
		}
	}

	public function excluirfotolista($hash, $id_lista,$id_act){
		verif_login('dashboard','2');
		$values = array('id' => $id_lista,'hash' => $hash,'id_act'=>$id_act);
		$oklista = $this->questao->getListainfo($values);
		$okact = $this->questao->getQuestoes($values);
		if($oklista and $okact and ($oklista['lis_teacher'] == $this->session->userdata('id_usuario') or $this->session->userdata('perm') == 0)){

			$this->questao->excluirfotolista($id_act);
			redirect('turma/'.$hash.'/editar/'.$id_lista, 'refresh');

		}else{
			set_msg_pop('você não possui autorização para acessar esta página','error','normal');
			redirect('dashboard','refresh');
		}
	}

	public function editarLista($hash, $id){
		verif_login('turmas',2);
		$values = array('id' => $id,'hash' => $hash);
		$oklista = $this->questao->getListainfo($values);
		if($oklista){
			$dados['h1'] = 'Editar Lista: <b>'.$oklista['lis_name'].'</b>';
			$lista = $this->questao->getQuestoes($values);
			$dados['lista'] = $lista;
			$dados['oklista'] = $oklista;
			$v = 0;
			foreach ($lista as $linha) {
				$fotos[$v] = $linha['act_foto'];
				$v++;
			}

			//parametros post
				$this->form_validation->set_rules('questoes[]','Questão','trim|required' );
				$this->form_validation->set_rules('status_gab','Status Gabarito','trim|required|alpha|exact_length[1]|in_list[S,N,s,n]' );
				$this->form_validation->set_rules('nomeLista','Questão','trim|required' );
				$this->form_validation->set_rules('enddate','Data final para a lista','trim|required|regex_match[/^([2-9][0-9][0-9][0-9])-([0-1][0-9])-([0-3][0-9])$/]',array('regex_match' => 'Formato inválido de data'));
				$this->form_validation->set_rules('endtime','Hora final para a lista','trim|required|callback_regex_check');
				$this->form_validation->set_rules('id_questao[]','Id questão','trim|required|is_natural_no_zero', array('is_natural_no_zero' => 'Questão inválida','required'=>'é preciso ter uma questão para atualizar'));

				//verificar
				if($this->form_validation->run() == FALSE){
					if(validation_errors()){
						set_msg(validation_errors(),'danger');
					}
				}else{
					$dados_form = $this->input->post();
					$dados_form['nomeLista'] = html_escape($dados_form['nomeLista']);
					$date = converter_data($dados_form['enddate'],4);
					$finaldate = $date.' '.$dados_form['endtime'];
					if($dados_form['status_gab'] == 's' or $dados_form['status_gab'] == 'S'){
						$dados_form['status_gab'] = 1;
					}else{
						$dados_form['status_gab'] = 0;
					}
					$infos = array(
						'hash' => $hash, 
						'id_lista' => $oklista['lis_id'],
						'gab_status' => $dados_form['status_gab']
					);

					$valores = array(
						'fotos' => $fotos, 
						'new_fotos' => $_FILES['fotos'],
						'nome_lista' => $dados_form['nomeLista'],
						'questoes' => $dados_form['questoes'],
						'id_questoes' => $dados_form['id_questao'],
						'final_date' => $finaldate
					);

					if($this->questao->editarQuestoes($infos,$valores)){
						set_msg_pop('deu true','success','normal');
					}else{
						set_msg_pop('deu false','error','normal');
					}
				}

			$dados['qtd'] = count($lista);
			load_template('professor/editarQuestoes',$dados);
		}else{
			set_msg_pop('Turma ou lista não encontrada','warning','normal');
			redirect('turmas','refresh');
		}
		
	}

	public function avisos($hash){
		verif_login('dashboard',2);
		$okhash = $this->turma->getTurma($hash);
		if($okhash){
			$informativo = $this->turma->getInformativos($hash);
			if($informativo){
				$dados['informativos'] = $informativo[0]['not_message'];
			}else{
				$dados['informativos'] = "";
			}
			$dados['turma'] = $okhash;
			if($okhash['cla_teacher'] == $this->session->userdata('id_usuario') or $this->session->userdata('perm') == 0){
				$dados['profok'] = TRUE;
			}else{
				$dados['profok'] = FALSE;
			}
			//parametros post
			$this->form_validation->set_rules('informativo','Nota da Lista','trim|min_length[11]', array('required' => 'Nota da lista não inserida'));

			//verificar
			if($this->form_validation->run() == FALSE){
				if(validation_errors()){
					set_msg(validation_errors(),'danger');
				}
			}else{
				$dados_form = $this->input->post();
				$data_post  = array(
					'hash' => $hash,
					'informativo' => $dados_form['informativo']
				);

				if($dados['profok']){
					if($this->turma->criarInformativo($data_post)){

						redirect('turma/'.$hash.'/infos','refresh');
					}
				}
			}
			load_template('professor/avisos',$dados);

		}else{
			set_msg_pop('Turma não encontrada','warning','normal');
			redirect('turmas','refresh');
		}


	}

	public function listaResposta($hash, $idlista){
		verif_login('dashboard',2);
		$dados['hash'] = $hash;
		$dados['idlista'] = $idlista;
		$v  = array('hash' => $hash, 'idlista' => $idlista);
		$dados['aluno'] = $this->turma->getAlunos($hash);
		load_template('professor/respostaslista',$dados);
	}

}

/*
//carregar library de upload
				$this->load->library('upload');
				//inicio loop de upload de foto
				for($i=0;$i<$filesCount;$i++){
					if($fotos['name'][$i] == ""){
						unset($fotos['name'][$i]);
						unset($fotos['type'][$i]);
						unset($fotos['tmp_name'][$i]);
						unset($fotos['error'][$i]);
						unset($fotos['size'][$i]);
						$url_foto[$i] = "";
					}else{

						$_FILES['file']['name']     = $_FILES['fotos']['name'][$i];
	                	$_FILES['file']['type']     = $_FILES['fotos']['type'][$i];
	                	$_FILES['file']['tmp_name'] = $_FILES['fotos']['tmp_name'][$i];
	                	$_FILES['file']['error']     = $_FILES['fotos']['error'][$i];
	                	$_FILES['file']['size']     = $_FILES['fotos']['size'][$i];

	                	// File upload configuration
		                $uploadPath = './assets/images/teste/';
		                $config['upload_path'] = $uploadPath;
		                $config['allowed_types'] = 'jpg|jpeg|png|gif';
		                $config['override'] = TRUE;
		                $config['max-size'] = 2048;
		                $config['file_name'] = 'testando'.$i;
		                $config['file_ext_tolower'] = TRUE;

		                $this->upload->initialize($config);

		                if($this->upload->do_upload('file')){
		                    // Uploaded file data
		                    $fileData = $this->upload->data();
		                    $url_foto[$i]['file_name'] = $fileData['file_name'];
		                    $filesFinalCount += 1;

		                    $configcrop['image_library'] = 'gd2';
							$configcrop['source_image'] = './assets/images/teste/'.$url_foto[$i]['file_name'];
							$configcrop['new_image']     = './assets/images/crops/'.$fileData['raw_name'].'-crop'.$fileData['file_ext'];
							$configcrop['maintain_ratio'] = TRUE;
							$configcrop['create_thumb'] = FALSE;
							$configcrop['height'] = 550;

							 // Aplica as configurações para a library image_lib
	           				 $this->image_lib->initialize($configcrop);

	           				 if(!$this->image_lib->resize()){
					                // Recupera as mensagens de erro e envia o usuário para a home
					                $data = array('error' => $this->image_lib->display_errors());
					                set_msg($data['error'],'info');
					            }else{
					            	$url_crop_foto[$i] = '/assets/images/crops/'.$url_foto[$i]['file_name'];
					            }
	                	}

					}
				}
				//final loop de upload de foto
				*/ 