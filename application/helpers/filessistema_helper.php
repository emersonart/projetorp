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
		$filesCount = count($fotos['name']); 
		if(!empty($fotos['name'])){
			for($i=0;$i<$filesCount;$i++){
				if($newfotos['name'][$i] != ""){
					unlink('./'.$fotos[$i]);
				}
			}
			if($novas = inserir_imagem_lista($hash,$id_lista,$newfotos)){
				return $novas;
			}else{
				return FALSE;
			}
			

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