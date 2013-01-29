<?php 
include('conectar.php');

$qry= mysql_query("SELECT * FROM media WHERE id='{$_GET['id']}'");
while($filas = mysql_fetch_assoc($qry)) // Guarda toda la info de la base de datos en una variable para evitar llamados extra.
{
  $item['id'] = $filas['ID'];
  $item['orden'] = $filas['orden'];
  $item['titulo'] = ucwords($filas['titulo']);
  $item['descripcion'] = htmlspecialchars_decode($filas['descripcion']);
  $item['foto'] = $filas['foto'];
  $item['url'] = htmlspecialchars_decode($filas['url']);
} 

?>
  
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
		editor_deselector : "mceNoEditor",
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

  <a href="admin-videos.php"><p>Volver a la Administración</p></a>
  
<div id="edicionWrapper">
  <div class="item">
  <a class="link vidbox" href="<?php echo $item['url']; ?>"><img src="<?php echo $item['foto'] ?>" alt="<?php echo 'item'.$item['ID']; ?> "></a>
    <div class="itemInfo-video">
      <h1><?php echo $item['titulo']; ?></h1>
      <p><?php echo str_replace('&amp;autoplay=1','',htmlspecialchars_decode($item['descripcion']));?></p>    
    </div>
  </div>

  <!-- FORMULARIO SUMBIT -->
  
  <form id="submit" action="procesar-vid.php?&accion=editar&id=<?php echo $item['id'] ?>" method="post" enctype="multipart/form-data" style="float: left;">
    
    Título:&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="titulo">
    
    <br><br>
    
    Imagen:&nbsp;&nbsp;
    <input type="file" name="foto">
    
    <br><br>
    
    URL del video:&nbsp;&nbsp;
    <input type="text" name="video">
    
    <br><br>
    
    Descripción:
    <textarea id="elm1" name="descripcion"><?php echo $item['descripcion'] ?></textarea>
    
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

    <input class="button" type="submit" name="general" value="Editar producto">
    
  </form>
</div>
</body>

</html>