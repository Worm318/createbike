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

<style>
body {
	background: #424242 url(images/linea2.png) repeat-x 440px top;
}
</style>
<iframe src="litebox/" frameborder="0" width="100%" height="600" scrolling="yes">Si ves este mensaje, significa que tu navegador no tiene soporte para marcos o el mismo está deshabilitado.</iframe>
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