<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<LINK REL="SHORTCUT ICON" href="css/create.ico"  />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="title" content="Createbikes" />
<meta name="description" content="Bicicletas con estilo" />
<link rel="shortcut icon" href="images/favicon.gif">
<meta name="keywords" content="bicicletas" />

<title>Createbikes</title>


<!-- RESET -->
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<!-- ESTILO PRINCIPAL -->
<link href="css/main_style2.css" rel="stylesheet" type="text/css" />
<!-- ESTILOS SHOWCASE -->
<link rel="stylesheet" type="text/css" href="css/style_slide.css" />
<link href="css/boton.css" rel="stylesheet" type="text/css" />
<link href="css/tienda.css" rel="stylesheet" type="text/css" />
<link href="css/slide.css" rel="stylesheet" type="text/css" />
<!-- FONTS -->
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Anton' rel='stylesheet' type='text/css'>
<!-- JQUERY -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>

<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/lightbox.js"></script>
<link href="css/lightbox.css" rel="stylesheet" />
<script src="scripts/jquery.tools.min.js" type="text/javascript"></script>
<!-- Redes Dropdown -->
<script type="text/javascript">
$(document).ready(function()
{  
  $(".redes-dropdown").hide();
  $(".fb-like-box").hide();
  $(".twitter_box").hide();
  
  $(".b_twit").click(function(){
    if ($(".redes-dropdown").hasClass("isFacebook"))
    {
      $(".fb-like-box").hide();
      $(".twitter_box").show();
      $(".redes-dropdown").removeClass("isFacebook");
      $(".redes-dropdown").addClass("isTwitter");
    } else {
      $(".fb-like-box").hide();
      $(".twitter_box").show();
      $(".redes-dropdown").slideToggle("normal");
      $(".redes-dropdown").toggleClass("isTwitter");
    }   
  });
  
  $(".b_fb").click(function(){
    if ($(".redes-dropdown").hasClass("isTwitter"))
    {                        
      $(".twitter_box").hide();
      $(".fb-like-box").show();
      $(".redes-dropdown").removeClass("isTwitter");
      $(".redes-dropdown").addClass("isFacebook");
    } else {
      $(".twitter_box").hide();
      $(".fb-like-box").show();
      $(".redes-dropdown").slideToggle("normal");
      $(".redes-dropdown").toggleClass("isFacebook");
    } 
  });
});
</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32346935-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


<style type="text/css">
body,td,th {
	font-family: "PT Sans Narrow", arial, serif;
	color: #000;
}
body {
	background-color: #FFF;
}
</style>
</head>

<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="todo">

<div id="header">
  
  <div id="logo">
    <a href="index.php"><img src="images/logo.png" alt="CREATE" /></a>
  </div>

  <div id="redes">
    <ul>
      <li><a href="#" class="b_fb"><img src="images/facebook.png"></a></li>
      <li><a href="#" class="b_twit"><img src="images/twitter.png"></a></li>
    </ul>
  </div>
  <!-- //redes -->
  
  <div id="botonera">
    <ul>
    <!-- <li><a href="tienda/"><img src="images/carrito.png" width="152" height="35" /></a></li>  -->
      <li><a href="tienda/"><p>Ventas Online</p></a></li>   
     <!--<li><a href="showrooms.php"><p>Showrooms</p></a></li>   
     <li><a href="galeria_imagenes.php"><p>Eventos</p></a></li>   -->
     <li><a href="videos.php"><p>Videos</p></a></li> 
<!--     <li><a href="comunidad.php"><p>Comunidad</p></a></li> -->
<li><a href="galeria.php"><p>Galeria</p></a></li>
     <li><a href="postventa_y_servicios.php"><p>Tiendas</p></a></li>
     <li><a href="contacto.php"><p>Contacto</p></a></li>
     
     
    </ul>
  </div>
<!-- //botonera -->

</div>
<!-- //header -->
<!-- //redes-dropdown -->
<?php require('admin/conectar.php'); ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34597011-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<style>
.xImagenes{
	margin-left:5px;
	margin-right:5px;
	margin-bottom:5px;
	margin-top:5px;	
	}
</style>
<table width="90%" border="0" cellspacing="2" cellpadding="1" align="center">
  <tr>
    <td><div class="page-title igallery-title">
      <h1>GALLERY</h1>
    </div>
    
      <?
$sql2="select a.det_id,a.det_imagen,a.det_nombre from imagenes_detalle a";
$cad2=mysql_query($sql2) or die(mysql_error());	  
/*for ($x=1;$x<=40;$x++)
{
?>
<a title="" class="xImagenes" href="images/londo_index.png" rel="lightbox[roadtrip]"><img src="images/londo_index.png" width="169" height="117" alt="" /></a>
<?
}*/
?>
 <?
    while ($xDato2=mysql_fetch_array($cad2))
	{
	?>    
    <a title="<?=$xDato2['det_nombre'];?>" class="xImagenes" href="imagen/<?=$xDato2['det_imagen'];?>" rel="lightbox[roadtrip]"><img src="imagen/<?=$xDato2['det_imagen'];?>" width="169" height="117" alt="<?=$xDato2['det_nombre'];?>" /></a>
      <?
	}
  ?>
</td>
  </tr>
</table>
