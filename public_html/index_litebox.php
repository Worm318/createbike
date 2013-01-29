<?php require('admin/conectar.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="Tyler Mulligan - www.detrition.net - tepics is coming" />
<title>Litebox- Same great taste, less calories</title>
<link rel="stylesheet" href="litebox/css/lightbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="litebox/css/style.css" type="text/css" media="screen" />
<script type="text/javascript" src="litebox/js/prototype.lite.js"></script>
<script type="text/javascript" src="litebox/js/moo.fx.js"></script>
<script type="text/javascript" src="litebox/js/litebox-1.0.js"></script>
<style type="text/css">
body,td,th {
	font-family: "PT Sans Narrow";
	font-size: 12px;
	color: #FFF;
}
body {
	background-color: #000;
}
</style>
</head>
<body onload="initLightbox()">

<div align="center">
<?

/*
?>
<div style="color: #FFF; font-weight: bold; font-size: 16px;"> Modelos<br />
  <img src="../images/linea.png" width="398" height="12" /> 
</div>
<?
$sql="
select 
a.img_nombre,a.img_id
from imagenes a
join imagenes_detalle b on (a.img_id=b.img_id)
where a.img_tipo='M'
group by a.img_id
";
$cad=mysql_query($sql) or die(mysql_error());
if (mysql_num_rows($cad))
{
	while ($xDato=mysql_fetch_array($cad))
	{
		
		$sql2="select a.det_id,a.det_imagen,a.det_nombre from imagenes_detalle a where a.img_id=".$xDato[img_id];
		$cad2=mysql_query($sql2) or die(mysql_error());
?>
<table width="90%" border="0" cellspacing="2" cellpadding="1">
  <tr>
    <td align="center"><strong><?=$xDato[img_nombre];?></strong></td>
    </tr>
  
  <tr>
  
    <td nowrap="nowrap" align="center">
      <?
    while ($xDato2=mysql_fetch_array($cad2))
	{
	?>
    <a href="../imagen/<?=$xDato2[det_imagen];?>" rel="lightbox[<?=$xDato[img_id];?>]" title="<?=$xDato2[det_nombre];?>">
    <img src="../imagen/<?=$xDato2[det_imagen];?>" width="100" height="100" alt="<?=$xDato2[det_nombre];?>" class="bordered" />
    </a>
      <?
	}
  ?>
 </td>
  </tr>

</table>
<?
	}
}
*/
?>
<br />

<div style="color: #FFF; font-weight: bold; font-size: 16px;"> Eventos<br />
  <img src="images/linea.png" width="398" height="12" /> 
</div>
<?
$sql="
select 
a.img_nombre,a.img_id
from imagenes a
join imagenes_detalle b on (a.img_id=b.img_id)
where a.img_tipo='E'
group by a.img_id
";
$cad=mysql_query($sql) or die(mysql_error());
if (mysql_num_rows($cad))
{
	while ($xDato=mysql_fetch_array($cad))
	{
		
		$sql2="select a.det_id,a.det_imagen,a.det_nombre from imagenes_detalle a where a.img_id=".$xDato[img_id];
		$cad2=mysql_query($sql2) or die(mysql_error());
?>
<table width="90%" border="0" cellspacing="2" cellpadding="1">
  <tr>
    <td align="center"><strong><?=$xDato[img_nombre];?></strong></td>
    </tr>
  
  <tr>
  
    <td nowrap="nowrap" align="center">
      <?
    while ($xDato2=mysql_fetch_array($cad2))
	{
	?>
    <a href="../imagen/<?=$xDato2[det_imagen];?>" rel="lightbox[<?=$xDato[img_id];?>]" title="<?=$xDato2[det_nombre];?>">
    <img src="../imagen/<?=$xDato2[det_imagen];?>" width="100" height="100" alt="<?=$xDato2[det_nombre];?>" class="bordered" />
    </a>
      <?
	}
  ?>
 </td>
  </tr>

</table>
<?
	}
}
?>
</div>
</body>
</html>