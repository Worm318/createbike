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
<li><a href="galeria.php"><p>Galería</p></a></li>
     <li><a href="postventa_y_servicios.php"><p>Tiendas</p></a></li>
     <li><a href="contacto.php"><p>Contacto</p></a></li>
     
     
    </ul>
  </div>
<!-- //botonera -->

</div>
<!-- //header -->
<?php //include('header.php');
 ?>
<?php require('admin/conectar.php'); ?>

<!-- VIDEOBOX -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js" charset="utf-8"></script>
<script type="text/javascript" src="scripts/jqvideobox.js" charset="utf-8"></script>
<link rel="stylesheet" href="css/jqvideobox.css" type="text/css" />
<script>
$(document).ready(function() {
  $(".vidbox").jqvideobox({'width' : 500, 'height': 400, 'getimage': false, 'navigation': false});
}
);
</script>



<div id="contenedor_postventa">
<div align="center">
<img src="imagen/servicios.png" width="526" height="27" /><br />
<br />
</div>
  <table width="900" border="0" align="center" cellpadding="14" cellspacing="14"  >
    <tr>
      <td width="433"><div style="color: #FFF; font-weight: bold; font-size: 16px;">TIENDAS<br />
      </div></td>
      <td width="439"><div style="color: #FFF; font-weight: bold; font-size: 16px;">TIENDAS + SERVICIO TÉCNICO<br />
      </div></td>
    </tr>
    <tr>
      <td >
      <?
      $sql="
	  select a.loc_titulo,a.loc_direccion,a.loc_correo,a.loc_fono,a.loc_mapa_url,a.loc_imagen_url
from locales a
where a.loc_tipo=1
	  ";
	  $cad=mysql_query($sql);
	  if (mysql_num_rows($cad))
	  {
		  while ($xDato=mysql_fetch_array($cad))
		  {
	  ?>
      <table width="100%" border="0" cellspacing="2" cellpadding="1">
        <tr>
          <td width="33%">
          <img src="<?=(empty($xDato[loc_imagen_url])?"images/image_default.png":"images/locales/".$xDato[loc_imagen_url]);?>" width="128" height="103" alt="" /></td>
          <td width="67%"><span class="titPostVentaServicios" style="font-weight: bold; font-size: 14px;"><?=$xDato[loc_titulo]?></span><br />
            <br />
            Dirección: <?=$xDato[loc_direccion]?><br />
            <br />
            Correo: <?=$xDato[loc_correo]?><br />
            <br />
            Fono: <?=$xDato[loc_fono]?><br />
            <br />
            
            <a href="<?=$xDato[loc_mapa_url]?>" target="_blank">
            Mapa: &nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mapa.png" />
            </a>
            </td>
        </tr>
        <tr>
          <td height="23" colspan="2">&nbsp;</td>
          </tr>
      </table>
      <?	
		  }
	  }
	  ?>
        </td>
      <td >
      
       <?
      $sql="
	  select a.loc_titulo,a.loc_direccion,a.loc_correo,a.loc_fono,a.loc_mapa_url,a.loc_imagen_url
from locales a
where a.loc_tipo=2
	  ";
	  $cad=mysql_query($sql);
	  if (mysql_num_rows($cad))
	  {
		  while ($xDato=mysql_fetch_array($cad))
		  {
	  ?>
      
      <table width="100%" border="0" cellspacing="2" cellpadding="1">
        <tr>
          <td width="33%">
          <img src="<?=(empty($xDato[loc_imagen_url])?"images/image_default.png":"images/locales/".$xDato[loc_imagen_url]);?>" width="128" height="103" alt="" /></td>
          <td width="67%"><span class="titPostVentaServicios" style="font-weight: bold; font-size: 14px;"><?=$xDato[loc_titulo]?></span><br />
            <br />
            Dirección: <?=$xDato[loc_direccion]?><br />
            <br />
            Correo: <?=$xDato[loc_correo]?><br />
            <br />
            Fono: <?=$xDato[loc_fono]?><br />
            <br />           
            <a href="<?=$xDato[loc_mapa_url]?>" target="_blank">
            Mapa: &nbsp;&nbsp;&nbsp;&nbsp;<img src="images/mapa.png" />
            </a>
            
            </td>
        </tr>
        <tr>
          <td height="23" colspan="2">&nbsp;</td>
        </tr>
      </table>
      
      <?
		  }
	  }
	  ?>
      </td>
    </tr>
  </table>
</div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34597011-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script><!-- Histats.com  START (hidden counter)-->
<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
<a href="http://www.histats.com" target="_blank" title="circuito contador" ><script  type="text/javascript" >
try {Histats.start(1,2159796,4,0,0,0,"");
Histats.track_hits();} catch(err){};
</script></a>
<noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?2159796&101" alt="circuito contador" border="0"></a></noscript>
<!-- Histats.com  END  -->