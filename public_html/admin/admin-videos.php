<?php include('conectar.php'); ?>
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
<!-- VIDEOBOX -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js" charset="utf-8"></script>
<script type="text/javascript" src="../scripts/jqvideobox.js" charset="utf-8"></script>
<link rel="stylesheet" href="../css/jqvideobox.css" type="text/css" />
<script>
$(document).ready(function() {
  $(".vidbox").jqvideobox({'width' : 500, 'height': 400, 'getimage': false, 'navigation': false});
}
);
</script>

<!-- TinyMCE -->
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
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
  
  <form id="submit" action="procesar-vid.php?accion=crear" method="post" enctype="multipart/form-data">
    
    Título:&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="titulo">
    
    <br><br>
    
    Imagen:&nbsp;&nbsp;
    <input type="file" name="foto">
    
     <br><br>
    
    URL del video:
    <input type="text" name="vid">
    
    <br><br>
    
    Descripción:
    <textarea id="elm1" name="descripcion"></textarea>
    
    <br>
    
    <?php 
if(isset($_GET['error']))
{
  switch($_GET['error'])
  {
    case 0:
      echo '<p style="background: #000; color: #fff; text-align: center;">El item ha sido añadido.</p>';
      break; 
    case 1: 
      echo '<p style="background: #000; color: #fff; text-align: center;">El archivo no es del formato correcto (jpg, png, gif).</p>';
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

    <input class="button" type="submit" value="Crear item">
    
  </form>
  
  <br>
  <hr>
  
  <!-- LISTADO -->
  
  <?php
$qry= mysql_query("SELECT * FROM media ORDER BY orden");
while($filas = mysql_fetch_assoc($qry)) // Guarda toda la info de la base de datos en una variable para evitar llamados extra.
{
  $item[$filas['ID']]['id'] = $filas['ID'];
  $item[$filas['ID']]['titulo'] = $filas['titulo'];
  $item[$filas['ID']]['descripcion'] = str_replace('&amp;autoplay=1','',htmlspecialchars_decode($filas['descripcion']));
  $item[$filas['ID']]['foto'] = str_replace('../','',$filas['foto']);
  $item[$filas['ID']]['url'] = str_replace('&amp;autoplay=1','',htmlspecialchars_decode($filas['url']));
}
?>

<div id="videos">

  <?php foreach($item as $key => $value) : ?>
  <div class="item">
    <a href="editar-vid.php?id=<?php echo $value['id']; ?>">Editar</a> | <a href="procesar-vid.php?accion=eliminar&id=<?php echo $value['id']; ?>">Eliminar</a>
    <h1><?php echo $value['titulo']; ?></h1>                     
    <a class="vidbox" href="<?php echo $value['url']; ?>"><img src="../<?php echo $value['foto']; ?>"></a>
    <p><?php echo $value['descripcion']; ?></p>
  </div>
  <?php endforeach; ?>
  
</body>