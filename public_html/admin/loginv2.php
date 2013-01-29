<?
//exit("x");

//session_start();
if (!is_numeric($_REQUEST[x]))
{
	?>
		<script>
        parent.location.href="loginv2.php?x="+ screen.height;
        </script>
		<?
		exit();
}						  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema</title>
<script>
$(document).ready(function(){ $("#navmenu-h li,#navmenu-v li").hover( function() { $(this).addClass("iehover"); }, function() { $(this).removeClass("iehover"); } ); });
</script>
<style>
/* Author: Craig Erskine Description: Dynamic Menu System - Horizontal/Vertical */ 
ul#navmenu-h { margin: 0; padding: 0; list-style: none; position: relative; } 
ul#navmenu-h ul { width: 160px; /* Sub Menu Width */ margin: 0; list-style: none; display: none; position: absolute; top: 100%; left: 0; } 
ul#navmenu-h ul ul,ul#navmenu-h ul ul ul { top: 0; left: 100%; } 
ul#navmenu-h li { float: left; display: inline; position: relative; } 
ul#navmenu-h ul li { width: 100%; display: block; } /* Root Menu */ 
ul#navmenu-h a { border-top: 1px solid #FFF; border-right: 1px solid #FFF; padding: 6px; float: left; display: block; background: #DDD; color: #666; font: bold 11px Arial, sans-serif; text-decoration: none; height: 1%; } /* Root Menu Hover Persistence */ 
ul#navmenu-h a:hover,ul#navmenu-h li:hover a,ul#navmenu-h li.iehover a { background: #BBB; color: #FFF; } /* 2nd Menu */ 
ul#navmenu-h li:hover li a,ul#navmenu-h li.iehover li a { float: none; background: #BBB; } /* 2nd Menu Hover Persistence */ ul#navmenu-h li:hover li a:hover,ul#navmenu-h li:hover li:hover a,ul#navmenu-h li.iehover li a:hover,ul#navmenu-h li.iehover li.iehover a { background: #999; } /* 3rd Menu */ ul#navmenu-h li:hover li:hover li a,ul#navmenu-h li.iehover li.iehover li a { background: #999; } /* 3rd Menu Hover Persistence */ ul#navmenu-h li:hover li:hover li a:hover,ul#navmenu-h li:hover li:hover li:hover a,ul#navmenu-h li.iehover li.iehover li a:hover,ul#navmenu-h li.iehover li.iehover li.iehover a { background: #666; } /* 4th Menu */ ul#navmenu-h li:hover li:hover li:hover li a,ul#navmenu-h li.iehover li.iehover li.iehover li a { background: #666; } /* 4th Menu Hover */ ul#navmenu-h li:hover li:hover li:hover li a:hover,ul#navmenu-h li.iehover li.iehover li.iehover li a:hover { background: #333; } /* Hover Function - Do Not Move */ ul#navmenu-h li:hover ul ul,ul#navmenu-h li:hover ul ul ul,ul#navmenu-h li.iehover ul ul,ul#navmenu-h li.iehover ul ul ul { display: none; } ul#navmenu-h li:hover ul,ul#navmenu-h ul li:hover ul,ul#navmenu-h ul ul li:hover ul,ul#navmenu-h li.iehover ul,ul#navmenu-h ul li.iehover ul,ul#navmenu-h ul ul li.iehover ul { display: block; }
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
}
</style>
</head>

<body>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="50%">
    <ul id="navmenu-h">
 		 <li><a href="index.php">Acceso</a> 		
	</ul>
</td>
    <td width="95%" align="right"><script language="JavaScript1.2">
<!--
document.writeln("<b>Tú resolución es de:</b> " + screen.width + " x " + screen.height +"");
//-->
</script>
    DNS OK</td>
  </tr>
  <tr>
    <td colspan="2">
<iframe src="index_login.php" name="crm2" width="100%" height="<?=(is_numeric($_REQUEST[x])?$_REQUEST[x]-250:800);?>" id="crm2" frameborder="1" >
    <p>Su navegador no soporta iframes, contacte a soporte.</p>
</iframe>
</td>
  </tr>
</table>
<form id="form_parent" name="form_parent" method="post" action="rodrigo.php">
</form>

</body>
</html>
