<?php
session_start();
if(!isset($_POST['pass']))
{
  header('LOCATION: ../'); // Si llega de cualquier lado, redirige al sitio principal. 
} else {
  $password = strtolower($_POST['pass']);
  
  if($password == 'createchile2012')
  {
	  $_SESSION['USU_RUT']=1;
    //header('LOCATION: ../admin?error=1'); //Si la contraseña es incorrecta, redirige de vuelta con msj de error.
	?>
			<script>
			parent.location.href="v2.php?x"+ screen.height;
			</script>
			<?
			exit();
  } else {
    //header('LOCATION: admin.php?mod=galeria');
	header('LOCATION: ../admin?error=1');
  }
}
?>
