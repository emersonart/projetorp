<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('gerar_pdf')){

	function gerar_pdf($dados,$tipo='default'){
        
		$ci =& get_instance();
		$prefix = tirarAcentos($dados['turma']['cla_nome']).'_'.$tipo.'_';
		if($tipo == 'resposta_lista'){
			$prefix .= tirarAcentos($dados['aluno']['inf_name']);
			$lista =  '/lista_'.$dados['lista'][0]['act_lis_id'];
		}else{
			$prefix .= 'professor';
			$lista = '';
		}
		
        $pasta = 'assets/pdf/'.$dados['turma']['cla_hash'].$lista;
        if(!is_dir('./'.$pasta)){
        	mkdir('./'.$pasta."/../", 0775, true);
            mkdir('./'.$pasta, 0775, true);
        }
            
        $nome_pdf = '/'.$prefix.'_'.$dados['turma']['cla_per_id'].'bimestre_'.$dados['turma']['cla_hash'].'.pdf';
        //$nome_pdf = strtolower($nome_pdf);
        $nome_pdf = str_replace(' ', '_', $nome_pdf);
        if(is_file('./'.$nome_pdf) or file_exists($nome_pdf)){
            unlink('./'.$nome_pdf);
        }

        $mpdf = new \Mpdf\Mpdf(['format' => [210, 293],'orientation' => 'P','debug'=>true]);
        // echo realpath(__DIR__."/../../".$pasta);
        // exit;
            $mpdf->setFooter('{PAGENO}');
           // $html = $this->load->view('teste/boletim_professor',$dados,true);
            $mpdf->WriteHTML($ci->load->view('pdf/'.$tipo,$dados,true));
            $mpdf->Output(__DIR__."/../../".$pasta.$nome_pdf, \Mpdf\Output\Destination::FILE);
        
       if(file_exists('./'.$pasta.$nome_pdf)){
        	return $pasta.$nome_pdf;
        }else{
        	return false;
        }
	}
}