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
		verif_login(2,'perfil');
		$dados['h1'] = 'Dashboard do Professor';
		load_template('professor/inicioProfessor',$dados);
	}

	public function criarSala(){
		verif_login(2,'perfil');
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

	public function criarMateria(){
		verif_login(2,'perfil');
		load_template('painel/criarMateria');

	}

	public function aprovarCadastro(){
		verif_login(2,'perfil');
		if(!empty($values['id'] = $this->uri->segment(4)) and !empty($values['hash'] = $this->uri->segment(3))){
			$att = $this->turma->aprovCadastro($values);
			redirect('professor/viewturma/'.$values['hash'].'#pendentes','refresh');
		}

	}

	public function cadastrarQuestoes(){
		verif_login(2,'perfil');
		$dados['h1'] = 'Cadastrar questões';
		$dados['qtd'] = 5;

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
			$filesCount = count($fotos); 
			$filesFinalCount = 0;
			
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
			print_r($url_crop_foto);
			echo "<br><br>";
			print_r($fotos);
			if(!empty($_FILES['fotos']['name'])){
				
				set_msg('ue: '.$filesFinalCount,'info');
			}else{
				set_msg('deu ruim as fotos','warning');
			}

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

	}

	public function corrigirQuestoes(){
		verif_login(2,'perfil');
		$dados['h1'] = 'Corrigir questões';
		load_template('professor/corrigirQuestoes', $dados);

	}

	public function turmas(){
		verif_login(2,'perfil');
		$dados['h1'] = "Minhas turmas";
		if($this->session->userdata('perm') == 0){
			$dados['turmas'] = $this->turma->getTurmasDetalhes();
		}else{
			$dados['turmas'] = $this->turma->getTurmasDetalhes($this->session->userdata('id_usuario'));
		}
		

		load_template('professor/turmasProfessor',$dados);
	}

	public function viewTurma(){
		verif_login(2,'perfil');
		if(!empty($hash = $this->uri->segment(3))){
			$values['hash'] = $hash;
			$values['professor'] = $this->session->userdata('id_usuario');

			if($dados['getturma'] = $this->turma->getTurma($values)[0]){
				$dados['getalunos'] = $this->turma->getAlunos($values['hash']);
				$dados['countalunopend'] = $this->turma->countAlunosTurma($values['hash']);
				$dados['getalunospend'] = $this->turma->getAlunos($values['hash'],FALSE);
				$dados['countalunopend'] = $this->turma->countAlunosTurma($values['hash'],FALSE);
				$dados['h1'] = $dados['getturma']['cla_nome'];
				load_template('professor/viewTurma',$dados);
			}else{
				set_msg('Turma não encontrada!','info');
				redirect('home','refresh');
			}
		}else{
			set_msg('Parametros incorretos','danger');
			redirect('home','refresh');
		}
	}

}