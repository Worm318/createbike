<?php require('admin/conectar.php'); ?>
<title>Móvil Createchile.cl</title>
<style type="text/css">
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
</style>

<div align="center">
<img src="http://www.createchile.cl/images/create_index.png" alt="CREATE" width="212" height="66" border="0" /><br>

<a href="http://www.createchile.cl/tienda/">Compre Online en versión desktop</a>
</div>
<meta name="MobileOptimized" content="width" />
<meta name="HandheldFriendly" content="true" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?
$sql="select a.ID,a.nombre,a.imagen from productos a
order by a.nombre";
$cad=mysql_query($sql) or die(mysql_error());
if (mysql_num_rows($cad))
{
	while ($xDato=mysql_fetch_array($cad))
	{
		?>
<a name="<?=$xDato[ID]?>"></a>
	<div align="center">
 <a href="movil_ver.php?x=<?=$xDato[ID]?>"> 
  <img src="movil_imagen.php?x=<?=$xDato[ID]?>" alt="CREATE" width="294" height="195" border="0" /></a><br><?=$xDato[nombre]?>
   <a href="movil_ver.php?x=<?=$xDato[ID]?>">Ver>></a>
   <br>
   <br>
</div>	
		<?
	}
}
?>
		<div align="center"><a href="index2.php">Versión de escritorio</a></div>