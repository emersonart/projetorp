<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('gerar_pdf')){
	function gerar_pdf($dados,$tipo='default'){
		$ci =& get_instance();
		$prefix = $dados['turma']['cla_nome'].'_'.$tipo.'_';
		if($tipo == 'resposta_lista'){
			$prefix .= $dados['aluno']['inf_name'];
			$lista =  '/lista_'.$dados['lista'][0]['act_lis_id'];
		}else{
			$prefix .= 'professor';
			$lista = '';
		}
		$mpdf = new \Mpdf\Mpdf(['format' => [210, 293],
    'orientation' => 'P']);

		$mpdf->setFooter('{PAGENO}');
       // $html = $this->load->view('teste/boletim_professor',$dados,true);
        $mpdf->WriteHTML($ci->load->view('pdf/'.$tipo,$dados,true));
        $pasta = 'assets/pdf/'.$dados['turma']['cla_hash'].'/periodo-'.$dados['turma']['cla_per_id'].$lista;
        if(!is_dir('./'.$pasta)){
        	mkdir('./'.$pasta, 0755, true);
        }
        $nome_pdf = $pasta.'/'.$prefix.'_'.uniqid(strtotime(date('d-m-Y H-s-i'))).'.pdf';
        $mpdf->Output('./'.$nome_pdf, \Mpdf\Output\Destination::FILE);
        
        if(file_exists('./'.$nome_pdf)){
        	return $nome_pdf;
        }else{
        	return false;
        }
	}
}