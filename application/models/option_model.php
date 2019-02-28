<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Option_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function get_option($option_name){
		$this->db->where('con_name',$option_name);
		$query = $this->db->get('tb_configs_site',1);
		if($query->num_rows() == 1){
			$row = $query->row();
			return $row->con_value;
		}else{
			return NULL;
		}
	}

	public function update_option($option_name,$option_value){
		$this->db->where('con_name',$option_name);
		$query = $this->db->get('tb_configs_site',1);
		if($query->num_rows() == 1){
			//Existe dados
			$this->db->set('con_value',$option_value);
			$this->db->where('con_name',$option_name);
			$this->db->update('tb_configs_site');
			return $this->db->affected_rows();
		}else{
			//Não existe dados, criar dados.
			$dados = array(
				'con_name' => $option_name,
				'con_value' => $option_value
			);
			$this->db->insert('tb_configs_site',$dados);
			return $this->db->insert_id();
		}
	}

	public function getMaterias(){
		$this->db->select('*');
		$this->db->from('tb_subjects');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function setMateria($values){
		$dados  = array(
			'sub_nome' => $values['nome_materia'], 
			'sub_description' => $values['desc_materia']
		);
		$this->db->insert('tb_subjects',$dados);

		if($this->db->insert_id()){
			set_msg_pop('Matéria cadastrada com sucesso!','success','normal');
			return true;
		}else{
			return false;
		}
	}


	public function getMateria($id,$tipo = 0){
		

		if($tipo == 0){
			$this->db->select('*');
			$this->db->from('tb_teacher_subject');
			$this->db->join('tb_subjects','tb_subjects.sub_id = tb_teacher_subject.tea_sub_id and tb_teacher_subject.tea_usu_id = "'.$id.'"','join');
		}else{
			$this->db->select('*');
			$this->db->from('tb_subjects');
			$this->db->where('sub_id',$id);
		}
		

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}


	public function backup_tables($host,$user,$pass,$name,$tables = '*',$rotina = false){
		
		//$conn = mysqli_connect($host,$user,$pass,$name);
		//$conn->set_charset('utf8');
		$return = "\n\n";
		$return .= 'SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";';
		$return .= "\n";
		$return .= 'SET AUTOCOMMIT = 0;';
		$return .= "\n";
		$return .= 'START TRANSACTION;';
		$return .= "\n";
		$return .= 'SET time_zone = "-03:00";';
		$return .= "\n\n\n";


	//get all of the tables
		if($tables == '*'){
			$tables = array();
			//$result = mysqli_query($conn,'SHOW TABLES');
			//while($row = mysqli_fetch_row($result))
			//{
			//	$tables[] = $row[0];
			//}
			$this->db->db_set_charset('utf8');
			$tabless = $this->db->list_tables();

			foreach ($tabless as $table)
			{
			        $tables[] = $table;
			}
		}
		else{
			$tables = is_array($tables) ? $tables : explode(',',$tables);
		}

	//cycle through

		foreach($tables as $table){

			
			//$result = mysqli_query($conn,'SELECT * FROM '.$table);
			$this->db->db_set_charset('utf8');
			$result = $this->db->get($table);


			$res = $result->result_array();

			$cc =  $result->num_rows();

			$num_fields = $result->num_fields();
			//echo "<br>".$num_fields."------------------------<br><br>";
			$return.= 'DROP TABLE IF EXISTS '.$table.';';
			$return.= "\n\n";
						//$return.= "-- inicio tabela ".$table."\n\n";
			$row2 = $this->db->query('SHOW CREATE TABLE '.$table)->row_array();
			//$row2 = mysqli_fetch_row(mysqli_query($conn,'SHOW CREATE TABLE '.$table));
			$return.= "\n\n".$row2['Create Table'].";\n\n";
		//$return.= "ALTER TABLE `".$table."`\n";
		//$inicial = explode('_', $table)[1];
		//$inicial = substr($inicial, 0, 3);
		//$return.= "ADD PRIMARY KEY (`".$inicial."_id`);\n\n";


		//$return.= $idd['AUTO_INCREMENT']."\n\n";

			$return.= 'INSERT INTO '.$table.' VALUES'."\n";
			$c2 = 0;
			foreach($res as $key => $value){
				$c2 += 1;
				$return .= "(";
				$contador = 0;
				foreach ($value as $key1 => $value1) {
					$contador += 1;
						$value1 = addslashes($value1);
						$value1 = str_replace('\n',"\\n",$value1);
						$return .= '"'.$value1.'"';

						if($contador < $num_fields){
							$return .= ",";
						}

					//print_r($value);
					
				}
				if($c2 < count($res)){
					//echo $key.'<br><br><br>';
					$return .= "),\n";
				}else{
					//echo $key.'<br><br><br>';
					$return .= ");\n\n";
				}
				
				
				
				
				//echo $value['act_id'].'<br>';
			}

			$return.="\n\n\n";
		}
		$return .= "COMMIT;";
	//save file
		$name = 'backup-koala-'.date('Y-m-d-H-i-s');
		//$handle = fopen($name,'w+');
		//fwrite($handle,$return);
		//fclose($handle);

		$this->load->library('zip');

		$this->zip->add_data($name.'.sql',$return);
		$this->zip->compression_level = 3;
		$this->zip->archive('backup/'.$name.'.zip');
		if(!$rotina){
			//$this->zip->download($name.'.zip');
		}

		//diretório que deseja listar os arquivos
			$path = "backup/";

		//le os arquivos do diretorio
			$diretorio = dir($path);
				$diretorios = scandir("./backup/");
				$diretorios = count($diretorios) - 2;
		//loop para listar os arquivos do diretório, guardando na variável $arquivo
			while( $arquivo = $diretorio -> read() ){
				
				if($arquivo != '.' ){
					if($arquivo != '..'){
						if (file_exists($path.$arquivo) and $arquivo != $name) {
							if($diretorios > 7){
								if(filectime($path.$arquivo) < strtotime('-7 days')){
									unlink('./'.$path.$arquivo);
									echo 'excluiu um<br>';
								}
								
								
							}else{
								echo "$arquivo foi modificado em: " . date ("F d Y H:i:s.", filectime($path.$arquivo)).'<br>';
							}
					    	
						}
						
					
					}
					
					
				}
			//gera um link para o arquivo
			}
			$diretorio -> close();

		echo $return;
	}


}




