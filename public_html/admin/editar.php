<?php 
include('conectar.php');

$modulo = $_GET['mod'];

$qry= mysql_query("SELECT * FROM $modulo WHERE id='{$_GET['id']}'");
while($filas = mysql_fetch_assoc($qry)) // Guarda toda la info de la base de datos en una variable para evitar llamados extra.
{
  $item['id'] = $filas['ID'];
  $item['orden'] = $filas['orden'];
  $item['titulo'] = ucwords($filas['titulo']);
  $item['descripcion'] = htmlspecialchars_decode($filas['descripcion']);
  $item['foto'] = $filas['foto'];
  $item['foto2'] = $filas['foto2'];
  $item['galeria'] = explode('^',$filas['galeria']);
  $item['descripciones'] = explode('^',$filas['descripciones']);
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

  <a href="admin.php?mod=<?php echo $modulo ?>"><p>Volver a la Administración</p></a>
  
<div id="edicionWrapper">
  <div class="item">
  <a class="link" href="<?php echo $item['foto']; ?>" target="_blank" /><img src="<?php echo $item['foto'] ?>" alt="<?php echo 'item'.$item['ID']; ?> "></a>
  <a class="link" href="<?php echo $item['foto2']; ?>" style="clear: left;;" target="_blank" /><img src="<?php echo $item['foto2'] ?>" alt="<?php echo 'item'.$tem['ID']; ?> "></a>
    <div class="itemInfo">
      <form action="procesar.php?mod=<?php echo $modulo ?>&accion=editar&id=<?php echo $item['id'] ?>" method="post">
      #<input id="orden" type="text" name="orden" value="<?php echo $item['orden'] + 1; ?>">
      <input type="submit" value="Cambiar orden" name="editarOrden">
      </form>
      <h1><?php echo $item['titulo']; ?></h1>
      <p><?php echo str_replace('&amp;autoplay=1','',htmlspecialchars_decode($item['descripcion']));?></p>    
      <?php if($item['galeria'][0] != '') : ?>
        <br>
        <p><b>Galería</b></p>
        <ul class="thumbs">
        <?php foreach($item['galeria'] as $key => $value) : ?>
        <li>
          <a href="<?php echo $value; ?>" rel="lightbox-<?php echo $value['id']; ?>" title="<?php echo $item['descripciones'][$key]; ?>"><img src="<?php echo $value; ?>"></a>
          <form action="procesar.php?mod=<?php echo $modulo ?>&accion=editar&id=<?php echo $item['id'] ?>" method="post">
            <textarea class="mceNoEditor" name="desc"><?php echo $item['descripciones'][$key]; ?></textarea>
            <input type="hidden" name="order" value="<?php echo $key; ?>" >
            <input class="button" type="submit" name="editar" value="Editar descripción"><input class="button" type="submit" name="Eliminar" value="Eliminar" style="width: 60px;">
          </form>
        </li>
        <?php endforeach; ?>
        </ul>
      <?php endif; ?>
      
    </div>
  </div>

  <!-- FORMULARIO SUMBIT -->
  
  <form id="submit" action="procesar.php?mod=<?php echo $modulo ?>&accion=editar&id=<?php echo $item['id'] ?>" method="post" enctype="multipart/form-data" style="float: left;">
    
    Título:&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="titulo">
    
    <br><br>
    
    Imagen de fondo:&nbsp;&nbsp;
    <input type="file" name="foto">
    
    <br><br>
    
    Imagen retrato:&nbsp;&nbsp;
    <input type="file" name="foto2">
    
    <br><br>
    
    Descripción:&nbsp;&nbsp;
    <textarea id="elm1" name="descripcion"><?php echo $item['descripcion'] ?></textarea>
    
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
    
    Añadir más imágenes: <br>
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
        case 5:
          echo '<p style="background: #000; color: #fff; text-align: center;">Tiene que haber al menos una imagen en la galería.</p>';
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