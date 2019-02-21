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
				'inscTurma' => 1
			);
			$this->turma->criarTurma($valor);
		}

		load_template('professor/criarSala',$dados);

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

			//parametros de validação
			$this->form_validation->set_rules('nomeLista','Nome da Lista','trim|required|xss_clean|min_length[5]|is_unique[tb_lists.lis_name]', array('required' => 'É obrigatório inserir um nome para a lista','is_unique'=>'Nome da lista já em uso'));
			$this->form_validation->set_rules('questoes[]','Questões','trim|required|xss_clean|min_length[12]',array('required'=>'É obrigatório inserir todas as questões para esta lista'));
			$this->form_validation->set_rules('fotos[]','Fotos','trim');

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
				$dados_lista['nomeLista'] = $dados_form['nomeLista'];
				$dados_lista['id_professor'] = $dados_hash['cla_teacher'];
				$dados_lista['subject'] = $dados_hash['sub_id'];
				$dados_lista['class_hash'] =  $dados_hash['cla_hash'];



				//verificando se a lista foi criada
				if($id_lista = $this->questao->criarLista($dados_lista)){
					if(!empty($fotos['name'])){

						//$url_crop_foto = inserir_imagem_lista($hashs, $id_lista,$fotos);
						$dados_lista['id_lista'] = $id_lista;

						if($url_crop_foto = inserir_imagem_lista($hashs, $id_lista,$fotos)){
							//cadastrar questoes na lista
							$criarq = $this->questao->criarQuestoes($dados_form['questoes'],$dados_lista,$url_crop_foto);
							if($criarq){
								redirect('turma/'.$dados_hash['cla_hash'],'refresh');
							}
							print_r($url_crop_foto);
							set_msg_pop('entrou na parte que passou pelo url_crop_foto','success','normal');
							//fim cadastrar questoes na lista
						}else{
							set_msg_pop('erro ao cadastrar lista','error','normal');
						}
					}

					 /*parte que comentei pra nao modificar!

					if(!empty($fotos['name'])){
					//carregar library de upload
						$this->load->library('upload');
					//inicio loop de upload de foto
						for($i=0;$i<$filesCount;$i++){
							//$filesFinalCount = $i+1;
							if($fotos['name'][$i] == ""){
								unset($fotos['name'][$i]);
								unset($fotos['type'][$i]);
								unset($fotos['tmp_name'][$i]);
								unset($fotos['error'][$i]);
								unset($fotos['size'][$i]);
								$url_foto[$i] = "";
								$url_crop_foto[$i] = '';
							}else{
								$idq = $i+1;
								$_FILES['file']['name']     = $_FILES['fotos']['name'][$i];
								$_FILES['file']['type']     = $_FILES['fotos']['type'][$i];
								$_FILES['file']['tmp_name'] = $_FILES['fotos']['tmp_name'][$i];
								$_FILES['file']['error']     = $_FILES['fotos']['error'][$i];
								$_FILES['file']['size']     = $_FILES['fotos']['size'][$i];

		                	// File upload configuration
								$uploadPath = 'assets/img/listas/temp/';
								$config['upload_path'] = './'.$uploadPath;
								$config['allowed_types'] = 'jpg|jpeg|png|gif';
								$config['override'] = TRUE;
								$config['max-size'] = 2048;
								$config['file_name'] = strtolower($hashs).'-lista-'.$id_lista.'-q-'.$idq;
								$config['file_ext_tolower'] = TRUE;

								$this->upload->initialize($config);

								if($this->upload->do_upload('file')){
			                    // Uploaded file data
									$fileData = $this->upload->data();
									if(!is_dir('./assets/img/listas/'.$id_lista)){
										mkdir('./assets/img/listas/'.$id_lista,0755);
									}
									$uploadCrop = 'assets/img/listas/'.$id_lista.'/';
									$url_foto[$i]['file_name'] = $fileData['file_name'];
									$filesFinalCount += 1;

									$configcrop['image_library'] = 'gd2';
									$configcrop['source_image'] = './'.$uploadPath.$url_foto[$i]['file_name'];
									$configcrop['new_image']     = './'.$uploadCrop.$fileData['raw_name'].$fileData['file_ext'];
									$configcrop['maintain_ratio'] = TRUE;
									$configcrop['create_thumb'] = FALSE;
									$configcrop['height'] = 350;

								 // Aplica as configurações para a library image_lib
									$this->image_lib->initialize($configcrop);

									if(!$this->image_lib->resize()){
						                // Recupera as mensagens de erro e envia o usuário para a home
										$data = array('error' => $this->image_lib->display_errors());
										set_msg($data['error'],'info');
									}else{
										$url_crop_foto[$i] = $uploadCrop.$fileData['raw_name'].$fileData['file_ext'];
										unlink('./'.$uploadPath.$fileData['raw_name'].$fileData['file_ext']);
									}
								}

							}
						}
					//final loop de upload de foto

					} fim parte que comentei! */

					//inicio parte que to editando

					//fim parte que to editando

						
						
						
						

						
				}
				//final verificando se foi criada a lista
				//var_dump($dados_form['questoes'])."<br><br>";
				//var_dump(count($dados_form['questoes']))."<br><br>";
				//print_r(count($_FILES['fotos']))."<br><br>";


				//$valor = array(
				//	'nomeLista' => $dados_form['nomeTurma'],
				//	'descricaoTurma' => $dados_form['descricaoTurma'],
				//	'hashTurma' => $dados['hash'],
				//	'startHash' => date('d-m-Y'),
				//	'endHash' => converter_data($dados_form['tempoTurma'],2),
				//	'profTurma' => $prof,
				//	'inscTurma' => 1
				//);

			}

			load_template('professor/cadastrarQuestoes', $dados);
		}else{
			set_msg_pop('Turma não encontrada, portanto não é possível criar uma lista de atividade','error','normal');
			redirect('turmas','refresh');
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
						'nota_lista' => $dados_form['notaLista']
					);

					if($this->questao->corrigirLista($dados_model)){
						$dados['nota'] = $dados_form['notaLista'];
						redirect('turma/'.$hash.'/respostas/'.$id_lista,'refresh');
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

	public function editarLista($hash, $id){
		verif_login('turmas',2);
		$values = array('id' => $id,'hash' => $hash);
		$oklista = $this->questao->getListainfo($values);
		if($oklista){
			$dados['h1'] = 'Editar Lista: <b>'.$oklista['lis_name'].'</b>';
			$lista = $this->questao->getQuestoes($values);
			$dados['lista'] = $lista;
			$dados['oklista'] = $oklista;

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