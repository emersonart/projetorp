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
	public function backupsql($rotina = FALSE){
		$this->load->dbutil();
		$prefs = array(
	        'format'        => 'zip',                             // File name - NEEDED ONLY WITH ZIP FILES
	        'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
	        'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
	        'newline'       => "\n"                         // Newline character used in backup file
	    );
		$backup = $this->dbutil->backup($prefs);
		$this->load->helper('file');
		$db_name = 'backup-koala-'. date("Y-m-d-H-i-s") .'.zip';
		$save = 'assets/teste/'.$db_name;
		write_file($save, $backup);
		$this->load->helper('download');
		force_download($db_name,$backup);
	}




	public function backup_tables($host,$user,$pass,$name,$tables = '*',$rotina = false){

		$conn = mysqli_connect($host,$user,$pass,$name);
		$conn->set_charset('utf8');
		$return = "\n\n";
		$return .= 'SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";';
		$return .= "\n";
		$return .= 'SET AUTOCOMMIT = 0;';
		$return .= "\n";
		$return .= 'START TRANSACTION;';
		$return .= "\n";
		$return .= 'SET time_zone = "+00:00";';
		$return .= "\n\n\n";


	//get all of the tables
		if($tables == '*')
		{
			$tables = array();
			$result = mysqli_query($conn,'SHOW TABLES');
			while($row = mysqli_fetch_row($result))
			{
				$tables[] = $row[0];
			}
		}
		else
		{
			$tables = is_array($tables) ? $tables : explode(',',$tables);
		}

	//cycle through
		foreach($tables as $table)
		{
			$contador = 0;
			$result = mysqli_query($conn,'SELECT * FROM '.$table);
			$result2 = mysqli_query($conn,'SELECT * FROM '.$table);

			$cc =  mysqli_num_rows($result2);

			$num_fields = mysqli_num_fields($result);
			$return.= 'DROP TABLE IF EXISTS '.$table.';';
			$return.= "\n\n";
						//$return.= "-- inicio tabela ".$table."\n\n";
			$row2 = mysqli_fetch_row(mysqli_query($conn,'SHOW CREATE TABLE '.$table));
			$return.= "\n\n".$row2[1].";\n\n";
		//$return.= "ALTER TABLE `".$table."`\n";
		//$inicial = explode('_', $table)[1];
		//$inicial = substr($inicial, 0, 3);
		//$return.= "ADD PRIMARY KEY (`".$inicial."_id`);\n\n";


		//$return.= $idd['AUTO_INCREMENT']."\n\n";

			$return.= 'INSERT INTO '.$table.' VALUES'."\n";
		//for ($i = 0; $i < $num_fields; $i++) 
		//{

			while($row = mysqli_fetch_row($result))
			{
				//$return.="--comeco while row\n";
				$contador += 1;
				$return.='(';
				for($j=0; $j < $num_fields; $j++) 
				{

					//$return.="--comeco for j\n";
					$row[$j] = addslashes($row[$j]);
					$row[$j] = str_replace('\n',"\\n",$row[$j]);
					if(isset($row[$j])){
						$gg = $row[$j];
						$gg = intval($gg);
						if($j < ($num_fields-1)){
							

							$return.= '"'.$row[$j].'",' ; 

						}else{

							$return.= '"'.$row[$j].'"' ; 
						}

					} else { 
						if($j < ($num_fields-1)){
							$return.= '"",' ; 
						}else{
							$return.= '""' ; 
						}
					}
					
					
					//$return.="--fim for j\n";
				}
				if ($contador == $cc) {
					$return.= ');'; 
					$return.= "\n\n";
						//$return.= "--fim tabela ".$table."\n\n";
				}else{
					$return.= '),'; 
					$return.= "\n";
				}
				//
				//$return.= ");\n";
					//$return.="--fim while row\n";
			}
		//}
			$return.="\n\n\n";
		}
		$return .= "COMMIT;";
	//save file
		$name = 'backup-koala-'.date('Y-m-d-H-i-s');
		//$handle = fopen($name,'w+');
		//fwrite($handle,$return);
		//fclose($handle);

		$this->load->library('zip');
		$this->load->dbutil();
		$dbs = $this->dbutil->list_databases();

		foreach ($dbs as $db)
		{
		        echo $db;
		}
		$this->zip->add_data($name.'.sql',$return);
		$this->zip->compression_level = 3;
		$this->zip->archive('backup/'.$name.'.zip');
		if(!$rotina){
			$this->zip->download($name.'.zip');
		}
		
	}


}