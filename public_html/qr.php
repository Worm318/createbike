<?php require('admin/conectar.php'); ?>
<?
if (!is_numeric($_GET[id]))
exit("ERR");

$sql="select a.qr_nro_visitas,a.qr_url from qr a where a.qr_id=".$_GET[id];
$cad=mysql_query($sql);
if (mysql_num_rows($cad))
{
	$xDato=mysql_fetch_array($cad);
	$sql="
	update 
		qr a 
		set
		a.qr_nro_visitas=a.qr_nro_visitas+1
		where a.qr_id=".$_GET[id];
	$cad=mysql_query($sql) or die(mysql_error());
	header("location: ".$xDato[qr_url]);
	exit();
}else{
exit("ERR");	
}

?>