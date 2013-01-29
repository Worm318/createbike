<?php require('admin/conectar.php'); 
@mysql_query ("SET NAMES 'utf8'");
?>
<title>Móvil Createchile.cl</title>
<style type="text/css">
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
</style>

<div align="center"><img src="http://www.createchile.cl/images/create_index.png" alt="CREATE" width="212" height="66" border="0" /></div>
<meta name="MobileOptimized" content="width" />
<meta name="HandheldFriendly" content="true" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?
$sql="
select 
a.ID,a.nombre,a.imagen,a.color,a.peso,a.aro,a.talla_l,a.talla_m,a.talla_s,a.precio,a.descripcion
from 
productos a where a.ID='".$_GET[x]."' limit 1
";
$cad=mysql_query($sql);
if (mysql_num_rows($cad))
{
$xDato=mysql_fetch_array($cad);
		?>
	<div align="center">
   <img src="movil_imagen.php?x=<?=$xDato[ID]?>" alt="CREATE" width="294" height="195" border="0" /><br>
   <table width="300" border="0" cellspacing="2" cellpadding="1">
     <tr>
       <td width="47%" align="right" bgcolor="#FCFCFC">Nombre:</td>
       <td width="53%" align="left" bgcolor="#FCFCFC"><?=$xDato[nombre];?></td>
     </tr>
     <tr>
       <td align="right" bgcolor="#FCFCFC">Color:</td>
       <td align="left" bgcolor="#FCFCFC"><?=$xDato[color];?></td>
     </tr>
     <tr>
       <td align="right" bgcolor="#FCFCFC">Peso:</td>
       <td align="left" bgcolor="#FCFCFC"><?=$xDato[peso];?></td>
     </tr>
     <tr>
       <td align="right" bgcolor="#FCFCFC">Aro:</td>
       <td align="left" bgcolor="#FCFCFC"><?=$xDato[aro];?></td>
     </tr>
     <tr>
       <td align="right" bgcolor="#FCFCFC">Precio:</td>
       <td align="left" bgcolor="#FCFCFC">$<?=number_format($xDato[precio],null,null,".");?></td>
     </tr>
   </table>
</div>	
		<?
	
}
?>
<?
$sql="
select 
a.id,a.descripcion,a.imagen
from 
productos_detalle a where a.prod_id='".$_GET[x]."' limit 1
";
$cad=mysql_query($sql);
if (mysql_num_rows($cad))
{
$xDato=mysql_fetch_array($cad);
		?>
<div align="center">
   <img src="movil_detalle_imagen.php?x=<?=$xDato[id]?>" alt="CREATE" width="294" height="195" border="0" /><br>  
</div>	
		<?
	
}
?>
		<div align="center"><a href="movil.php#<?=$_GET[x];?>">Volver</a></div>