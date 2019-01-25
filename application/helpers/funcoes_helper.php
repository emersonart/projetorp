<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//set a message popup
if(!function_exists('set_msg_pop')){
	function set_msg_pop($msg=NULL,$tipo='default',$size = 'mini'){
		$ci = & get_instance();
		switch ($tipo) {
			case 'success':
				$title = ",
					title: 'Sucesso'";
				break;
			case 'warning':
				$title = ",
					title: 'Cuidado'";
				break;
			case 'info':
				$title = ",
					title: 'Informação'";
				break;
			case 'error':
				$title = ",
					title: 'Erro'";
				break;
			
			default:
				$title = ",
					title: 'Aviso'";
				break;
		}
		$finalMsg = "Lobibox.notify('";
		$finalMsg .= $tipo;
		$finalMsg .= "', {
                    size: '";
        $finalMsg .= $size;
        $finalMsg .= "',
                    msg: '";
        $finalMsg .= $msg;
        $finalMsg .= "',
        			sound: false";
    	$finalMsg .= $title;
        $finalMsg .= "});";

        $ci->session->set_userdata('msgPopup',$finalMsg);
	}
}

//get a message popup
if(!function_exists('get_msg_pop')){
	function get_msg_pop($destroy=TRUE){
		$ci = & get_instance();
		$retorno = $ci->session->userdata('msgPopup');
		if($destroy){
			$ci->session->unset_userdata('msgPopup');
		}
		return $retorno;
	}
}
//set a message info-box
if(!function_exists('set_msg')){
	function set_msg($msg=NULL,$tipo='dark',$c2 = FALSE){
		$ci = & get_instance();
		if($c2 == TRUE){
			$extra = 'alert-st-';
			switch ($tipo) {
				case 'success':
					$extra .= 'one';
					break;
				case 'info':
					$extra .= 'two';
					break;
				case 'warning':
					$extra .= 'three';
					break;	
				case 'danger':
					$extra .= 'four';
					break;	
				default:
					$extra = '';
					break;
			}
		}else{
			$extra = '';
		}
		
		if($msg == NULL){
			$ci->session->set_userdata('aviso',$msg);
		}else{
			$msg = '<div class="alert alert-'.$tipo.' '.$extra.'" role="alert">'.$msg.'</div>';
			$ci->session->set_userdata('aviso',$msg);
		}
		
	}
}
//date converter
if(!function_exists('converter_data')){
	function converter_data($data, $inverse=0){
		if($inverse == 0){
			$new_data = explode('/', $data)[2].'-'.explode('/', $data)[1].'-'.explode('/', $data)[0];
		}else if($inverse == 1){
			$new_data = explode('-', $data)[2].'/'.explode('-', $data)[1].'/'.explode('-', $data)[0];
		}else if($inverse == 3){
			$new_data = explode('-', $data)[0].'/'.explode('-', $data)[1].'/'.explode('-', $data)[2];
		}else{
			$new_data = explode('-', $data)[2].'-'.explode('-', $data)[1].'-'.explode('-', $data)[0];
		}
		

		return $new_data;
	}
}

//display a message
if(!function_exists('get_msg')){
	function get_msg($destroy=TRUE){
		$ci = & get_instance();
		$retorno = $ci->session->userdata('aviso');
		if($destroy){
			$ci->session->unset_userdata('aviso');
		}
		return $retorno;
	}
}

//verify if user is looged into system
if(!function_exists('verif_login')){
	function verif_login($page ='site',$prof = 1,$redirect = TRUE){
		$ci = & get_instance();
		$logado = $ci->session->userdata();
		if($logado['logged'] == TRUE){
			if($prof == 1){
				return true;
			}else{
				if($logado['perm'] == $prof){

					return true;
				}else{
					
					
					if($redirect){
						set_msg_pop('Acesso restrito, apenas admins e professores são permitidos','error','normal');
						redirect($page,'refresh');
					}
					return 0;
					
				}
			}
			
		}else{
			set_msg('Acesso restrito, faça login para acessar','warning');
			if($redirect){
				redirect('login','refresh');
			}
			return false;
			}

	}
}

//verify status of the system
if(!function_exists('verif_setup')){
	function verif_setup($cert=NULL){
		$ci = & get_instance();
		if($ci->option->get_option('setup_executado') != 1){
			redirect('painel/setup/instalar','refresh');
		}
	}
}

//construct layout
if(!function_exists('load_template')){
	function load_template($cert,$dados = NULL){
		$ci = &get_instance();
		if(!isset($dados['h1'])){
			$dados['h1'] =  $ci->option->get_option('site_title');
		}
		$dados['site_favicon'] = base_url($ci->option->get_option('site_favicon'));
		$dados['nomeSite'] = $ci->option->get_option('site_title');
		$dados['version_site'] = $ci->option->get_option('site_version');
		if(isset($dados['titulo'])):
			$dados['titulo'] .= ' - '.$ci->option->get_option('site_title');
		else:
			$dados['titulo'] = $ci->option->get_option('site_title');
		endif;
		$dados['site_desc'] = $ci->option->get_option('site_descricao');
		$dados['site_author'] = $ci->option->get_option('site_author');
		$dados['site_favico'] = $ci->option->get_option('site_favico');
		$dados['usuario'] = $ci->session->userdata();
		$ci->load->view('template/head',$dados);
		$ci->load->view('template/sidebar');
		$ci->load->view('template/header');
		$ci->load->view($cert);
		$ci->load->view('template/footer');
	}
}

//active menu
if(!function_exists('menu_active')){
	function menu_active($url='painel'){
		$ci = & get_instance();
		$uri = strtolower($ci->uri->uri_string());
		$url = strtolower($url);

		if($uri == $url):
			return 'actived';
		endif;
	}
}



//remove chars specials
if(!function_exists('tirarAcentos')){
function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
}
}

//criar hash da turma
if(!function_exists('gerarHash')){
	function gerarHash($id){
		$ci = & get_instance();
		$ids = $ci->option->getMateria($id);
		if($ids){
			$nomemateria = $ids[0]['sub_nome'];
			$semacento = tirarAcentos($nomemateria);
			$f = substr($semacento, 0, 2);

			$hash = strtoupper($f.bin2hex($ci->encryption->create_key(2)));

			return $hash;

		}else{
			set_msg('Matéria não encontrada, solicitação abortada','warning');
			return $ids;
		}

	}

	//return nota
	if(!function_exists('respostal')){
		function respostal($campo, $nota, $check = false){
			if($campo == $nota){
				if($check){
					return "checked";
				}else{
					return 'active';
				}
				
			}else{
				return false;
			}
		}
	}
}