<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//inserir imagem questao
if(!function_exists('inserir_imagem_lista')){
	function inserir_imagem_lista($hash,$id_lista,$fotos){
		$ci = & get_instance();
		$filesCount = count($fotos['name']); 
		$filesFinalCount = 0;
		$contarfor = 0;
		if(!empty($fotos['name'])){
			//carregar library de upload
			$ci->load->library('upload');

			//inicio loop de upload de foto
			for($i=0;$i<$filesCount;$i++){
					//$filesFinalCount = $i+1;
				$contarfor += 1;
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

					$ci->upload->initialize($config);

					if($ci->upload->do_upload('file')){
	                    // Uploaded file data
						$fileData = $ci->upload->data();
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
						$ci->image_lib->initialize($configcrop);

						if(!$ci->image_lib->resize()){
				                // Recupera as mensagens de erro e envia o usuário para a home
							$data = array('error' => $ci->image_lib->display_errors());
							set_msg($data['error'],'info');
							return false;
						}else{
							$url_crop_foto[$i] = $uploadCrop.$fileData['raw_name'].$fileData['file_ext'];
							unlink('./'.$uploadPath.$fileData['raw_name'].$fileData['file_ext']);

						}
					}else{
						$data['error_upload'] = $ci->upload->display_errors();
					}

				}
			}
			if((isset($data['error']) and !empty($data['error'])) or (isset($data['error_upload']) and !empty($data['error_upload']))){
				return false;
			}else{
				return $url_crop_foto;
			}

					//final loop de upload de foto
		}
	}
}
if(!function_exists('atualizar_imagem_lista')){
	function atualizar_imagem_lista($hash,$id_lista,$fotos,$newfotos){

		if(count($fotos) == count($newfotos['name'])){
			$filesCount = count($newfotos['name']); 
			if(!empty($newfotos['name'])){
				for($i=0;$i<$filesCount;$i++){
					if($fotos[$i] != '' and $newfotos['name'][$i] != ''){
						$fotoatual = $fotos[$i];
						if(file_exists('./'.$fotoatual)){
							$fotoq = explode('.', $fotoatual);
							$fotoq = $fotoq[0].'-rename.'.$fotoq[1];
							rename('./'.$fotoatual, $fotoq);
						}
						
						
					}
				}

				if($novas = inserir_imagem_lista($hash,$id_lista,$newfotos)){
					//set_msg($novas[0],'warning');
					return $novas;
				}else{
					return FALSE;
				}


			}
		}else{
			
			return FALSE;
		}
	}
}

if(!function_exists('excluir_imagem_pasta')){
	function excluir_imagem_pasta($foto){
		if(unlink($foto)){
			return TRUE;
		}else{
			return FALSE;
		}

	}
}

if(!function_exists('zipData')){
	function zipData($source, $destination) {
		$ci = & get_instance();
		
		//diretório que deseja listar os arquivos
			$path = "./backup_sys/sistemabckp/";

		//le os arquivos do diretorio
			$diretorio = dir($path);
				$diretorios = scandir("./backup_sys/sistemabckp/");
				$diretorios = count($diretorios) - 2;

				var_dump($diretorio);
		//loop para listar os arquivos do diretório, guardando na variável $arquivo
			while( $arquivo = $diretorio -> read() ){
				
				if($arquivo != '.' ){
					if($arquivo != '..'){
						if (file_exists($path.$arquivo) and $arquivo != $destination) {
							if($diretorios > 7){
								if(filectime($path.$arquivo) < strtotime('-7 days') and explode('.',$arquivo)[1] == 'zip'){
									unlink($path.$arquivo);
									//echo 'excluiu um<br>';
								}
								
								
							}else{
								//echo "$arquivo foi modificado em: " . date ("F d Y H:i:s.", filectime($path.$arquivo)).'<br>';
							}
					    	
						}
						
					
					}
					
					
				}
			//gera um link para o arquivo
			}
			$diretorio -> close();

			
		$ci->load->library('zip');
		
		
		$ci->zip->compression_level = 4;
		

		ini_set('max_execution_time', 600);
		ini_set('memory_limit','1024M');
    //$ppasta = 'projetorp/';
		//if (extension_loaded('zip')) {
			if (file_exists($source)) {
				//$zip = new ZipArchive();
				//if ($zip->open($destination, ZIPARCHIVE::CREATE)) {


                    //$source = realpath($source);

                //$source = '../'.explode('projetorp', $source)[1];

                //echo $source.'<br>';

					if (is_dir($source) === true) {
						$source = str_replace('\\', '/', $source);
						$iterator = new \RecursiveDirectoryIterator($source);
                // skip dot files while iterating
						$iterator->setFlags(RecursiveDirectoryIterator::SKIP_DOTS);
						$files = new \RecursiveIteratorIterator($iterator, \RecursiveIteratorIterator::SELF_FIRST);
						foreach ($files as $file) {
        //$file = realpath($file);


							$vars = "/"."."."git"."|"."user_guide"."|"."kiaalap-master"."|"."sistemabckp"."/i";
							$pos = strpos( $file, '.git' );
							$pos1 = strpos( $file, 'user_guide' );
							$pos2 = strpos( $file, 'kiaalp-master' );

                        //echo $f."<br>";
                        //$pattern = '/^' . $file . '$/';//Padrão a ser encontrado na string $tags
							if (!preg_match($vars,$file)) {
								//echo $file."<br>";
								if (is_dir($file) === true) {
									$ci->zip->add_dir(str_replace($source . '/', '', $file . '/'));
									//$zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));

								} else if (is_file($file) === true) {
									$ci->zip->add_data($file,file_get_contents(str_replace($source . '/', '', $file)));
									//$zip->addFile($file, str_replace($source . '/', '', $file));
								}
							}

						}
					} else if (is_file($source) === true) {
						$ci->zip->add_data($source,file_get_contents(basename($source)));
						//$zip->addFile($source, basename($source));
					}
				//}
					$ci->zip->archive('backup_sys/sistemabckp/sis-'.$destination.'.zip');
					$ci->zip->clear_data();
					
				return 'backup_sys/sistemabckp/sis-'.$destination.'.zip';
			}

			echo 'nao achou';
		//}
		return false;
	}
}