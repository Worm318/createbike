<?php include('conectar.php'); 
//echo "<pre>".var_export($_REQUEST,1)."</pre>";
//echo "<pre>".var_export($_FILES,1)."</pre>";
function borrar($xGaleria,$xImagen="",$xTipo)
{
	function rmdirtree($dirname) { 
   if (is_dir($dirname)) {    //Operate on dirs only 
       $result=array(); 
       if (substr($dirname,-1)!='/') {$dirname.='/';}    //Append slash if necessary 
       $handle = opendir($dirname); 
       while (false !== ($file = readdir($handle))) { 
           if ($file!='.' && $file!= '..') {    //Ignore . and .. 
               $path = $dirname.$file; 
               if (is_dir($path)) {    //Recurse if subdir, Delete if file 
                   $result=array_merge($result,rmdirtree($path)); 
               }else{ 
                   unlink($path); 
                   $result[].=$path; 
               } 
           } 
       } 
       closedir($handle); 
       rmdir($dirname);    //Remove dir 
       $result[].=$dirname; 
       return $result;    //Return array of deleted items 
   }else{ 
       return false;    //Return false if attempting to operate on a file 
   } 
    }
	
	if ($xTipo==1)//imagen de galeria
	{
	unlink("../minishowcase/galleries/$xGaleria/$xImagen");
	header("location: admin-galeria-editar.php?x=".$_GET[x]);
	}
	
	if ($xTipo==2)
	{
	//rmdir("../minishowcase/galleries/$xGaleria");
	rmdirtree("../minishowcase/galleries/$xGaleria");
	header("location: admin-galeria.php?x=".$_GET[x]);
	}
	
	
}



borrar($_GET[x],$_GET[i],$_GET[t]);
?>