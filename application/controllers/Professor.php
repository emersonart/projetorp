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
		if(!empty($values['id'] = $this->uri->segment(4)) and !empty($values['hash'] = $this->uri->segment(3))){
			$att = $this->turma->aprovCadastro($values);
			redirect('professor/turma/'.$values['hash'].'#pendentes','refresh');
		}

	}

	public function cadastrarQuestoes(){
		verif_login('dashboard',2);
		$v['hash'] = $this->uri->segment(3);
		if(!empty($hash = $this->uri->segment(3)) and $dados_hash = $this->turma->getTurma($hash)){

			$dados['h1'] = 'Cadastrar questões';
			$dados['qtd'] = (int)$this->option->get_option('qtd_atv');

			//parametros de validação
			$this->form_validation->set_rules('nomeLista','Nome da Lista','trim|required|min_length[5]|is_unique[tb_lists.lis_name]', array('required' => 'É obrigatório inserir um nome para a lista','is_unique'=>'Nome da lista já em uso'));
			$this->form_validation->set_rules('questoes[]','Questões','trim|required',array('required'=>'É obrigatório inserir todas as questões para esta lista'));
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
				$dados_lista['id_professor'] = $dados_hash[0]['cla_teacher'];
				$dados_lista['subject'] = $dados_hash[0]['sub_id'];
				$dados_lista['class_hash'] =  $dados_hash[0]['cla_hash'];
				//verificando se a lista foi criada
				if($id_lista = $this->questao->criarLista($dados_lista)){
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
								$config['file_name'] = strtolower($hash).'-lista-'.$id_lista.'-q-'.$idq;
								$config['file_ext_tolower'] = TRUE;

								$this->upload->initialize($config);

								if($this->upload->do_upload('file')){
			                    // Uploaded file data
									$fileData = $this->upload->data();
									$uploadCrop = 'assets/img/listas/';
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

					}
						$dados_lista['id_lista'] = $id_lista;
						//cadastrar questoes na lista
						$criarq = $this->questao->criarQuestoes($dados_form['questoes'],$dados_lista,$url_crop_foto);
						if($criarq){
							redirect('professor/turma/'.$dados_hash[0]['cla_hash'],'refresh');
						}

						//fim cadastrar questoes na lista
				}
				//final verificando se foi criada a lista
				//var_dump($dados_form['questoes'])."<br><br>";
				//var_dump(count($dados_form['questoes']))."<br><br>";
				print_r(count($_FILES['fotos']))."<br><br>";


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

	public function corrigirQuestoes(){
		verif_login('dashboard',2);
		$dados['h1'] = 'Corrigir questões';
		load_template('professor/corrigirQuestoes', $dados);
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