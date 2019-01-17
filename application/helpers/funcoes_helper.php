<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//set a message
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
	function verif_login($prof,$page ='login'){
		$ci = & get_instance();
		$logado = $ci->session->userdata('logged');
		if($logado){
			if($ci->session->userdata('perm') == $prof or $ci->session->userdata('perm') == 0){
				return true;
			}else{
				set_msg('Acesso restrito, apenas admins e professores são permitidos','info');
				redirect($page,'refresh');
			}
		}else{
			set_msg('Acesso restrito, faça login para acessar','warning');
			redirect($page,'refresh');
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
		$uri = $ci->uri->uri_string();

		if($uri == $url):
			return 'active';
		endif;
	}
}