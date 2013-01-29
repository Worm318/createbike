<?php include('conectar.php'); ?>
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
    <?php switch($modulo) :
    case 'galeria': ?>
    <a href="admin.php?mod=showrooms">Showrooms</a>
    <?php break;
    case 'showrooms': ?>
    <a href="admin.php?mod=galeria">Comunidad</a>
    <?php break;
    endswitch; ?>
    <a href="admin-videos.php">Videos</a>
    
    <a href="admin-galeria.php">Galería</a>
  </div>

  <!-- FORMULARIO SUMBIT -->
  
  <form id="submit" action="procesar.php?mod=<?php echo $modulo ?>&accion=crear" method="post" enctype="multipart/form-data">
    
    Título:&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="titulo">
    
    <br><br>
    
    Imagen de fondo:&nbsp;&nbsp;
    <input type="file" name="foto">
    
    <br><br>
    
    Imagen retrato:&nbsp;&nbsp;
    <input type="file" name="foto2">
    
    <br><br>
    
    Descripción:
    <textarea id="elm1" name="descripcion"></textarea>
    
    <br>
   
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
    
    Imágenes Galeria: <br>
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

    <input class="button" type="submit" value="Crear item">
    
  </form>
  
  <br>
  <hr>
  
  <!-- LISTADO -->
  
  <?php
  $qry= mysql_query("SELECT * FROM $modulo ORDER BY orden");
  while($filas = mysql_fetch_assoc($qry)) :
  ?>
  
  <div class="item">
  <a class="link" href="<?php echo $filas['foto']; ?>" target="_blank" /><img src="<?php echo $filas['foto'] ?>" alt="<?php echo 'item'.$filas['ID']; ?> "></a>
  <a class="link" href="<?php echo $filas['foto2']; ?>" style="clear: left;" target="_blank" /><img src="<?php echo $filas['foto2'] ?>" alt="<?php echo 'item'.$filas['ID']; ?> "></a>
    <div class="itemInfo">
      <p>#<?php echo $filas['orden'] + 1 ?></p>
      <a href="editar.php?mod=<?php echo $modulo ?>&accion=editar&id=<?php echo $filas['ID']; ?>">Editar</a> | <a href="procesar.php?mod=<?php echo $modulo ?>&accion=eliminar&id=<?php echo $filas['ID']; ?>">Eliminar</a>
      <h1><?php echo ($filas['titulo']); ?></h1>
      <p><?php echo str_replace('&amp;autoplay=1','',htmlspecialchars_decode($filas['descripcion']));?></p>
      
      <?php $galeria = explode('^',$filas['galeria']); ?>
      <?php $descripciones = explode('^',$filas['descripciones']); ?>
      <?php if($galeria[0] != '') : ?>
        <ul>
        <li>Galería</li>
        <?php foreach($galeria as $key => $value) : ?>
        <li><a href="<?php echo $value; ?>" rel="lightbox-<?php echo $filas['ID']; ?>" title="<?php echo $descripciones[$key] ?>">&nbsp;-&nbsp;<?php echo $key ?></a></li>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>
      
    </div>
  </div>
  
  <?php endwhile; ?>

</body>

</html>