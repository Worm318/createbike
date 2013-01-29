<?php require('admin/conectar.php'); ?>
<?
$sql="select a.id,a.imagen,a.descripcion from productos_detalle a where a.id='".$_GET[x]."' limit 1";
$cad=mysql_query($sql) or die(mysql_error());
if (mysql_num_rows($cad))
{
$xDato=mysql_fetch_array($cad);


   header('Content-Type: image/jpeg');
   include('SimpleImage.php');
   $image = new SimpleImage();
   $image->load("tienda/images/productos/".$xDato[imagen]);
   $image->resizeToWidth(800);
   $image->output();
   
}   
?>