<?php 
date_default_timezone_set('America/Sao_Paulo');
backup_tables('koala_edu.mysql.dbaas.com.br','koala_edu','k04l4@r3s1D','koala_edu');

/* backup the db OR just a table */
function backup_tables($host,$user,$pass,$name,$tables = '*')
{
	
	$conn = mysqli_connect($host,$user,$pass,$name);
	$conn->set_charset('utf8');
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
	$name = 'backup-koala-'.date('d-m-Y-G-i').'.sql';
	$handle = fopen($name,'w+');
	fwrite($handle,$return);
	fclose($handle);

	//echo $return;
	// Configuramos os headers que serão enviados para o browser
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename="'.$name.'"');
header('Content-Type: application/octet-stream');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($name));
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Expires: 0');
// Envia o arquivo para o cliente
readfile($name);
}



?>