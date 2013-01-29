<?

//exit("Deshabilitado temporalmente hasta aprox. 14:30 hrs.");


session_start();
/*
header ("location: http://190.196.9.149/~crmarea/crm/");
exit();
*/




if (!is_numeric($_SESSION['USU_RUT'])) 
{
//session_destroy();
//header ("location: loginv2.php");
?>
		<script>
		//document.writeln("<b>Tú resolución es de:</b> " + screen.width + " x " + screen.height +"");
        parent.location.href="loginv2.php?x=" + screen.height;
        </script>
<?
exit();
}else{
?>
		<script>
        parent.location.href="v2.php";
        </script>
<?	
//header ("location: principal.php");
exit();
}
?>