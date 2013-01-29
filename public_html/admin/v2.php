<?
session_start();
$mModular=1;// 1 Filtra de acuerdo al módulo, 0 no filtra
if (!is_numeric($_SESSION['USU_RUT'])) 
{
?>
		<script>
		//document.writeln("<b>Tú resolución es de:</b> " + screen.width + " x " + screen.height +"");
        parent.location.href="loginv2.php?x=" + screen.height;
        </script>
<?
exit();
}
if (!is_numeric($_REQUEST[x]))
{
	?>
		<script>
        parent.location.href="v2.php?x="+ screen.height;
        </script>
		<?
		exit();
}						  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bienvenido <? echo ucwords(strtolower($_SESSION['USU_NOMBRE']));?></title>
<script>
$(document).ready(function(){ $("#navmenu-h li,#navmenu-v li").hover( function() { $(this).addClass("iehover"); }, function() { $(this).removeClass("iehover"); } ); });
</script>
<script language="JavaScript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js" type="text/javascript"></script>
<!--[if gte IE 5.5]>
<script language="JavaScript" type="text/JavaScript">
$(document).ready(function(){
$("#navmenu-h li,#navmenu-v li").hover(
function() { $(this).addClass("iehover"); },
function() { $(this).removeClass("iehover"); }
 );});
</script>
<![endif]-->
<script type="text/javascript" src="js/ajax.js"></script>
<script>
function actualiza()
{
	//alert ("sadas");
	//FAjax('actualiza.php','actualiza','','get');
}

//setInterval('actualiza()',120000); //1000 equivale a 1 segundo
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
ul#navmenu-h li:hover li a,ul#navmenu-h li.iehover li a { float: none; background: #BBB; } /* 2nd Menu Hover Persistence */ ul#navmenu-h li:hover li a:hover,ul#navmenu-h li:hover li:hover a,ul#navmenu-h li.iehover li a:hover,ul#navmenu-h li.iehover li.iehover a { background: #999; } /* 3rd Menu */ ul#navmenu-h li:hover li:hover li a,ul#navmenu-h li.iehover li.iehover li a { background: #999; } /* 3rd Menu Hover Persistence */ ul#navmenu-h li:hover li:hover li a:hover,ul#navmenu-h li:hover li:hover li:hover a,ul#navmenu-h li.iehover li.iehover li a:hover,ul#navmenu-h li.iehover li.iehover li.iehover a { background: #666; } /* 4td Menu */ ul#navmenu-h li:hover li:hover li:hover li a,ul#navmenu-h li.iehover li.iehover li.iehover li a { background: #666; } /* 4td Menu Hover */ ul#navmenu-h li:hover li:hover li:hover li a:hover,ul#navmenu-h li.iehover li.iehover li.iehover li a:hover { background: #333; } /* Hover Function - Do Not Move */ ul#navmenu-h li:hover ul ul,ul#navmenu-h li:hover ul ul ul,ul#navmenu-h li.iehover ul ul,ul#navmenu-h li.iehover ul ul ul { display: none; } ul#navmenu-h li:hover ul,ul#navmenu-h ul li:hover ul,ul#navmenu-h ul ul li:hover ul,ul#navmenu-h li.iehover ul,ul#navmenu-h ul li.iehover ul,ul#navmenu-h ul ul li.iehover ul { display: block; }
body,th,td {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.rrere {	font-weight: bold;
	font-family: "Arial Black", Gadget, sans-serif;
	color: #FFF;
	font-size: 24px;
}
</style>
</head>

<body>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="79%" align="center" nowrap="nowrap" bgcolor="#EEEEEE">Bienvenido
    <?
    echo "<b>".ucwords(strtolower($_SESSION['USU_NOMBRE']))."</b> ";
			
	?><div id="actualiza"></div></td>
    <td width="21%" align="center" nowrap="nowrap" bgcolor="#EEEEEE"><strong>
        Fecha actual: <?=date("Y-m-d")?>
      </strong></td>
  </tr>
  <tr>
    <td colspan="2" nowrap="nowrap">
      <ul id="navmenu-h">
        <li><a href="index.php">Home</a></li>
 		      
            <li><a href="#">Mantenedor +</a>
              <ul id="navmenu-h">		                     
				<li><a href="http://www.createchile.cl/admin/admin.php?mod=galeria" target="crm2">Comunidad</a></li>
                <li><a href="http://www.createchile.cl/admin/admin.php?mod=showrooms" target="crm2">ShowRooms</a></li>
                <li><a href="http://www.createchile.cl/admin/admin-videos.php" target="crm2">Videos</a></li>
                <li><a href="http://www.createchile.cl/tienda/admin/" target="crm2">Tienda</a></li>
              </ul>
            </li>
            
            <li><a href="#">Nuevo +</a>
              <ul id="navmenu-h">		                     
				<li><a href="http://www.createchile.cl/admin2/qrlist.php" target="crm2">Url QR </a></li>
                <li><a href="http://www.createchile.cl/admin2/localeslist.php" target="crm2">Post Venta/ Servicios</a></li>                
                		
              <!--  <li><a href="#">Eventos +</a>
              		<ul id="navmenu-h">		                     
					<li><a href="http://www.createchile.cl/admin2/imageneslist.php" target="crm2">Cabecera</a></li>-->
                	<li><a href="http://www.createchile.cl/admin2/imagenes_detallelist.php" target="crm2">Galería</a></li>              
<!--	               </ul>
            	</li>-->
            
                <li><a href="http://www.createchile.cl/admin2/images_homelist.php" target="crm2">Imágenes Home</a></li>
                <li><a href="http://www.createchile.cl/admin2/logos_homelist.php" target="crm2">Logos Home</a></li>
               
               <!-- <li><a href="http://www.createchile.cl/admin2/productoslist.php" target="crm2">Productos (móvil y web)</a></li>-->
                 <li><a href="#">Tienda (móvil/web) +</a>
              		<ul id="navmenu-h">		                     
					<li><a href="http://www.createchile.cl/admin2/productoslist.php" target="crm2">Cabecera</a></li>
                	<li><a href="http://www.createchile.cl/admin2/productos_detallelist.php" target="crm2">Detalle</a></li>              
	               </ul>
            	</li>
              </ul>
            </li>
           
    

        <li><a href="logout.php">Salir</a></li>
      </ul>
      
    </td>
  </tr>
  <tr>
    <td colspan="2">
     <? 
		$xUrl="principal.php";
	?>
    <iframe src="<?=$xUrl;?>" name="crm2" width="100%" height="<?=(is_numeric($_REQUEST[x])?$_REQUEST[x]-200:800);?>" id="crm2" frameborder="1" scrolling="auto" >
    <p>Su navegador no soporta iframes, contacte a soporte.</p>
    </iframe></td>
  </tr>
</table>

</body>
</html>
