<?php
session_start();
session_destroy();
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
<!-- FONTS -->
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Anton' rel='stylesheet' type='text/css'>

<style type="text/css">
body,td,th {
	font-family: "PT Sans Narrow", arial, serif;
}
body {
	background-color: #F2F2F2;
}
</style>
</head>

<body id="pass">
<form style="margin-top: 10%;" action="login.php" method="post">
<table>
  <tr>
    <td><p>Ingrese la contraseña</p></td>
  </tr>
  <tr>
    <td><input type="password" name="pass"></td>
  </tr>
  <tr>
    <td><input type="submit" value="Aceptar"></td>
  </tr>
</table>
<a href="../">Volver al sitio</a>
<?php if ( isset($_GET['error']) ) : ?> <p id="error">Contraseña incorrecta</p> <?php endif; ?>
</form>

</body>

<html>