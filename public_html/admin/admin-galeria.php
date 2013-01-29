<?php include('conectar.php'); 
//echo "<pre>".var_export($_REQUEST,1)."</pre>";
//echo "<pre>".var_export($_FILES,1)."</pre>";

function crear_galeria($xNombre)
{
	mkdir("../minishowcase/galleries/$xNombre", 0775);
}

function crear_modificar_descripcion($xGaleria,$xDescripcion)
{
 
  $ar=fopen("../minishowcase/galleries/$xGaleria/_info.php","w+") or     die("Problemas en la creacion"); 
  fputs($ar,$xDescripcion); 
  fclose($ar); 

}
//crear_modificar_descripcion("galeriax","Esta es una prueba2");

function copiar_imagenes($xGaleria,$xImagenes)//array $_FILE con imágenes
{
	$_FILES=$xImagenes;
	foreach($_FILES as $key => $value)  // Revisa el formato de todas las imágenes.
    {
		//echo "<br>($key => $value)";
		//echo "<pre>".var_export($value,1)."</pre>";
        if (($value['type'] != 'image/png') && ($value['type'] != 'image/jpg') && ($value['type'] != 'image/jpeg') && ($value['type'] != 'image/gif'))
        {
          return ("ERROR");
		  break;
        }
    }
	
	##guardar
	foreach($_FILES as $key => $value)  
    {
       // galeriax
		//
		copy($value['tmp_name'],"../minishowcase/galleries/$xGaleria/".$value['name']);
		
    }
	
	
}

//copiar_imagenes("galeriax",$_FILES);

function listar_directorios_ruta($ruta){ 
   // abrir un directorio y listarlo recursivo 
   if (is_dir($ruta)) { 
      if ($dh = opendir($ruta)) { 
         while (($file = readdir($dh)) !== false) { 
            //esta línea la utilizaríamos si queremos listar todo lo que hay en el directorio 
            //mostraría tanto archivos como directorios 
            //echo "<br>Nombre de archivo: $file : Es un: " . filetype($ruta . $file); 
            if (is_dir($ruta . $file) && $file!="." && $file!=".."){ 
               //solo si el archivo es un directorio, distinto que "." y ".." 
               echo "			   
			   <tr class='texto2'>
      <td width='343' bgcolor='#EFEFEF'>$file</td>
      <td width='67' bgcolor='#EFEFEF'><a href='admin-galeria-editar.php?x=$file' style='color: #000; font-weight: bold;'>Editar</a></td>
      <td width='76' bgcolor='#EFEFEF'>
	  <a href=\"javascript:borrar_galeria('$file')\" style='color: #000; font-weight: bold;\'>BORRAR</a>
	  </td>
    </tr>
			   
			   "; 
			
               listar_directorios_ruta($ruta . $file . "/"); 
			   
			   
            } 
         } 
      closedir($dh); 
      }else{
		  echo '
		   <tr>
			  <td colspan="3" bgcolor="#EFEFEF" class="texto2">No hay galerías creadas</td>
		   </tr>
		  ';
		  
		  }
   }else 
      echo "<br>No es ruta valida"; 
} 


if ($_POST[f_accion]=="GUARDAR")
{
	##crear Galería
	crear_galeria($_POST[titulo]);
	##crear descripcion
	crear_modificar_descripcion($_POST[titulo],$_POST[descripcion]);
	
	##subir imagenes
	copiar_imagenes($_POST[titulo],$_FILES);
	
	echo "GUARDADO";
}

?>
<?php $modulo = $_GET['mod'] ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<LINK REL="SHORTCUT ICON" href="css/create.ico"  />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="title" content="Createbike" />
<link rel="shortcut icon" href="../images/favicon.gif">

<title>Createbike - Administración</title>

<!-- RESET -->
<link href="../css/reset.css" rel="stylesheet" type="text/css" />
<!-- ESTILO ADMINISTRACIÓN -->
<link href="../css/admin.css" rel="stylesheet" type="text/css" />
<!-- JQUERY -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<!-- FONTS -->
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Anton' rel='stylesheet' type='text/css'>
<!-- SLIMBOX -->
<script type="text/javascript" src="../scripts/slimbox2.js"></script>
<link rel="stylesheet" href="../css/slimbox2.css" type="text/css" media="screen" />

<script src="http://code.jquery.com/jquery-latest.js"></script>

<!-- TinyMCE -->
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
 <script>
              function borrar_galeria(x)
			  {
				if (confirm("Confirma que desea borrar completamente la galería: "+ x))
				{
					location.href="admin-galeria-borrar.php?x="+x+"&t=2";
				}
			  }
              </script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		language : "es",
		mode : "textareas",
		theme : "advanced",
		skin : "o2k7",
		skin_variant : "silver",
		plugins : "autolink,lists,pagebreak,layer,advhr,advimage,advlink,iespell,preview,media,paste,visualchars,nonbreaking,xhtmlxtras",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,cut,copy,paste,pastetext,|,bullist,numlist,|,undo,redo,|,link,unlink,",
		theme_advanced_buttons2 : "fontsizeselect,",
		theme_advanced_buttons3 : "",
		theme_advanced_buttons4 : "",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
	});
</script>
<!-- /TinyMCE -->

<style type="text/css">
.texto2 {
	color: #000;
}
</style>
</head>

<body>

  <div id="nav">
    <a href="../">Volver al sitio</a>
    <a href="admin.php?mod=galeria">Comunidad</a>
    <a href="admin.php?mod=showrooms">Showrooms</a>
    <a href="admin-videos.php">Videos</a>
    <a href="admin-galeria.php">Galería</a>
  </div>

  <!-- FORMULARIO SUMBIT -->
  
  <form id="submit" action="" method="post" enctype="multipart/form-data">
    
    <p>Título Galería:&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" name="titulo"><br>
    
    Descripción:
    <textarea id="elm1" name="descripcion"></textarea>
    </p>
    <p><br>
      
      <!-- Script para añadir y elminar elementos de galería --> 
      <script type="text/javascript">
    $(document).ready(function(){
        $("#addPic").click(function(){
          $("#inputPic").append($("<span class='wrapperPic'><hr><p>Imagen</p><input class='submitPic' type='file' name='gal" + $(".submitPic").length + "'><p>Descripción</p><input type='text' name='galDesc" + $(".submitPic").length + "' ></span>"));
        });
        $("#removePic").click(function(){
          $(".wrapperPic:last-child").remove();
        });
    });
    </script>
      
      Imágenes Galería: <br>
    </p>
    <div id="inputPic" style="background: #E0E0E0">
      <p>Imagen</p>
      <input class="submitPic" type="file" name="gal0">
      <p>Descripción</p>
      <input type="text" name="galDesc0" >
    </div>
    <a id="addPic">Añadir otra imagen</a>
    <br>
    <a id="removePic">Eliminar última imagen</a>
    
    <br><br>
    <?php 
if(isset($_GET['error']))
{
  switch($_GET['error'])
  {
    case 0:
      echo '<p style="background: #000; color: #fff; text-align: center;">El item ha sido añadido.</p>';
      break; 
    case 1: 
      echo '<p style="background: #000; color: #fff; text-align: center;">Los archivos no son del formato correcto (jpg, png, gif).</p>';
      break;
    case 2:
      echo '<p style="background: #000; color: #fff; text-align: center;">El item ha sido modificado.</p>';
      break;
    case 3:
      echo '<p style="background: #000; color: #fff; text-align: center;">El item ha sido eliminado.</p>';
      break;
    case 4:
      echo '<p style="background: #000; color: #fff; text-align: center;">Falta un título o descripción.</p>';
      break;
    default:
      echo '?';
      break;
  }
}
?>

    <input class="button" type="submit" value="Crear Galería">
    <input type="hidden" name="f_accion" value="GUARDAR" />
</form>
  

  <hr>
  
  <!-- LISTADO -->
  
  <?php

##recorrer directorio
  ?>

  <table width="500" border="0" align="center" cellpadding="1" cellspacing="2" bgcolor="#FFFFFF">
    <tr>
      <td colspan="3" bgcolor="#E0E0E0" style="color: #000; font-weight: bold;">Galerías</td>
    </tr>
      <?
      listar_directorios_ruta("../minishowcase/galleries/");
	  ?>
    
   
  </table>
</body>

</html>