<?php include('header.php'); ?>
<?php require('admin/conectar.php'); ?>


<!-- VIDEOBOX -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js" charset="utf-8"></script>
<script type="text/javascript" src="scripts/jqvideobox.js" charset="utf-8"></script>
<link rel="stylesheet" href="css/jqvideobox.css" type="text/css" />
<script>
$(document).ready(function() {
  $(".vidbox").jqvideobox({'width' : 500, 'height': 400, 'getimage': false, 'navigation': false});
}
);
</script>
<script type="text/javascript" src="js/validaciones.js"></script>
<script>
function guardar(x)
{
	
	
	 if (!campoTexto('f_nombre','Por favor ingrese nombre')) {return false;}
	 
	 if (!validarEmail('f_correo','Ingrese un Correo Electrónico válido')) {return false;}
	 if (!campoTexto('f_comentario','Ingrese Comentario.')) {return false;}	 
	 
	document.getElementById("f_action").value=x;
	document.form1.submit();
}
</script>
<style>
body {
	background: #424242 url(images/linea2.png) repeat-x 440px top;
}
</style>

<div id="contenedor_postventa">

  <table width="507" border="0" align="center" cellpadding="4" cellspacing="4"  >
    <tr>
      <td width="563"><div style="color: #FFF; font-weight: bold; font-size: 16px;">
        <p>CONTACTO ENVIADO<img src="images/linea.png" width="398" height="12" /> </p>
        <p>Gracias por escribirnos, te responderemos durante el día.</p>
      </div></td>
    </tr>
    <tr>
      <td ><form id="form1" name="form1" method="post" action="">
      </form>
        <table width="100%" border="0" cellspacing="2" cellpadding="1">
          <tr>
            <td width="100%" height="23">&nbsp;</td>
          </tr>
      </table></td>
    </tr>
  </table>
</div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34597011-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>