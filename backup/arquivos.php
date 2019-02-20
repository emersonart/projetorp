
<?php
/*
$path = "../../projetorp/";
$diretorio = dir($path);
 
echo "Lista de Arquivos do diretório '<strong>".$path."</strong>':<br />";
while($arquivo = $diretorio -> read()){
echo "<a href='".$path.$arquivo."'>".$arquivo."</a><br />";
}
$diretorio -> close();*/


?>
<!--?php
// linux
$dir = new DirectoryIterator( '../../projetorp/' );
// windows
//$dir = new DirectoryIterator( 'c:/xampp/htdocs/sistema/fotos/' );
 
// array contendo os diretórios permitidos    
$diretoriosPermitidos = array("application","backup","assets","cache");
 
foreach($dir as $file)
{
    // verifica se $file é diferente de '.' ou '..'
    if (!$file->isDot())
    {
        // listando somente os diretórios
        if  ( $file->isDir() )
        {
            // atribui o nome do diretório a variável
            $dirName = $file->getFilename();
 
            // listando somente o diretório permitido
            if( in_array($dirName, $diretoriosPermitidos)) {
                // subdiretórios
                $caminho = $file->getPathname();
                // chamada da função de recursividade
                recursivo($caminho, $dirName);
            }
        }
 
        // listando somente os arquivos do diretório
        if  ( $file->isFile() )
        {
            // atribui o nome do arquivo a variável
            $fileName = $file->getFilename();
            //
            echo "projetorp/".$fileName."<br>";
        }
    }
}
 
function recursivo( $caminho, $dirName ){
 
    global $dirName;
 
    $DI = new DirectoryIterator( $caminho );
 
    foreach ($DI as $file){
        if (!$file->isDot())
        {
            if  ( $file->isFile() )
            {
                //
                $fileName = $file->getFilename();
                //
                echo "--".$dirName."/".$fileName."<br>";
            }
        }
 
    }
}
?-->
<?php
function varSet($VAR) { return isset($_GET[$VAR]) ? $_GET[$VAR] : ""; }

$action = varSet("action");

$pasta = base64_decode(varSet("pasta"));

 

//Lista dos arquivos que nao seram listados

$denyFiles = array(".htaccess","thumbs.db");

 

if ($action == "download") {

$file = base64_decode(varSet("file"));

header("Content-disposition: attachment; filename=\"".basename($file)."\"");

readfile(".$file");

exit;

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Site Explorer - Alpha Version</title>

<style type="text/css">

body {

font:11px Verdana, Arial, Helvetica, sans-serif;

padding:0px;

margin:0px;

}

a {

text-decoration:none;

color:#003366;

}

a:hover { color:#0099CC }

.row1 { background-color:#F7F7F7 }

.row2 { background-color:#EBEBEB }

.rowOver { background-color:#C7DCFC }

.extCell { font-weight:bold }

</style>

<script language="javascript" type="text/javascript">

function over(Obj) {

nClass = Obj.className

Obj.className = "rowOver"

Obj.onmouseout = function() {

Obj.className = nClass

}

}

</script>

</head>

 

<body>

<?php

if ($action == ""):

$fdir = "./$pasta";

chdir($fdir);

$dir = opendir(".");

while ($file = readdir($dir)) if (is_dir($file)) $dirs[] = $file; else $files[] = $file;

$row = 2;

?>

<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">

<tr>

<td height="50px;"><strong>Exibindo:</strong> ROOT<?php echo empty($pasta) ? "" : $pasta; ?></td>

</tr>

</table>

<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">

<tr style="font-weight:bold">

<td width="55" height="20"> </td>

<td width="204">Nome</td>

<td width="130">Tamanho</td>

<td width="316">Ações</td>

</tr>

<?php if ($pasta != ""): ?>

<tr class="row<?php echo $row; ?>" onmouseover="over(this)">

<td align="center" width="55" height="20" class="extCell">[DIR]</td>

<td><a href="?pasta=<?php echo base64_encode(substr("$pasta",0,strrpos($pasta,"/"))); ?>">..</a></td>

<td>--</td>

<td> </td>

</tr>

<?php endif; ?>

<?php

if (is_array($dirs)) :

sort($dirs);

foreach ($dirs as $nome):

if ($nome == ".." || $nome == ".") continue;

if ($row == 2) $row = 1; else $row = 2;

?>

<tr class="row<?php echo $row; ?>" onmouseover="over(this)">

<td align="center" width="55" height="20" class="extCell">[DIR]</td>

<td><a href="?pasta=<?php echo base64_encode("$pasta/$nome"); ?>"><?php echo $nome; ?></a></td>

<td>--</td>

<td> </td>

</tr>

<?php

endforeach;

endif;

?>

<?php

if (is_array($files)):

sort($files);

foreach ($files as $nome):

if (in_array(strtolower($nome),$denyFiles)) continue;

if ($row == 2) $row = 1; else $row = 2;

$tamanho = filesize("./$nome");

$info = pathinfo("./$nome");

?>

<tr class="row<?php echo $row; ?>" onmouseover="over(this)">

<td align="center" width="55" height="20" class="extCell">[<?php echo strtoupper($info["extension"]); ?>]</td>

<td>

<a href="?action=download&file=<?php echo base64_encode("$pasta/$nome"); ?>"><?php echo $nome; ?></a>

</td>

<td><?php echo $tamanho > 1048576 ? round($tamanho/1048576,2)." Mb" : round($tamanho/1024,2)." Kb"; ?></td>

<td> </td>

</tr>

<?php

endforeach;

endif;

?>

</table>

<?php endif; ?>

</body>

</html>

<?php closedir($dir); ?>