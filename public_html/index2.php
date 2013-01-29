

<?php include('header.php'); ?>
<?php require('admin/conectar.php'); ?>
<style>
body{
	background:white;
}
</style>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<!-- root element for scrollable -->
<div class="scrollable" id="scroller">   
   <img id="create_index" src="images/create_index.png" />
   <!-- root element for the items -->
   <div class="items">
   

<?php 

//$random = rand(1, 3);
$sql="select a.id,a.imagen from images_home a order by rand() limit 8";
$cad=mysql_query($sql);
while ($xDato=mysql_fetch_array($cad))
{
	echo "	
	<div>
        <img class='cletas' src='images/index_slide/".$xDato["imagen"]."' alt='".$xDato["imagen"]."'/>
      </div>";
}

?>
</div>
   <img id="london_index" class="logo" src="images/londo_index.png" />

   <span id="direccion">
     Dirección:  Roman Díaz 170, Santiago
   </span>
  
   
  
</div>


 <span id="logos">
     <table width="10px" border="0" cellspacing="3" cellpadding="2" align="center">
  <tr>
  <?php 

//$random = rand(1, 3);
$sql="select a.logo_id,a.logo_imagen from logos_home a order by rand() limit 8";
$cad=mysql_query($sql);
while ($xDato=mysql_fetch_array($cad))
{
?>
    <td align="center" nowrap="nowrap">
    <div align="center">
	<? echo "	
	  <div>
        <img src='imagen/logos/".$xDato[logo_imagen]."' />
      </div>";


?>
    </div>
    </td>
<?
}
?>   
  </tr>
</table>
   </span>

<br clear="all" />





<br clear="all" />

<!-- javascript coding -->
<script>
// What is $(document).ready ? See: http://flowplayer.org/tools/documentation/basics.html#document_ready
$(document).ready(function() {

$('#scroller').css('height', window.innerHeight-70);
$('.items').css('height', window.innerHeight-70);
$('#scroller').css('width', window.innerWidth-70);

$('.items div').css('width', window.innerWidth);
$('.items div').css('height', window.innerHeight-200);

$('.cletas').css('height', window.innerHeight-150);

$('.items div').css('display', 'block');

// initialize scrollable together with the autoscroll plugin
var root = $("#scroller").scrollable({circular: true}).autoscroll({ autoplay: true, autopause: false });

// provide scrollable API for the action buttons
window.api = root.data("scrollable");
	
});
</script>


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
<!-- Histats.com  START (hidden counter)-->
<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
<a href="http://www.histats.com" target="_blank" title="circuito contador" ><script  type="text/javascript" >
try {Histats.start(1,2159796,4,0,0,0,"");
Histats.track_hits();} catch(err){};
</script></a>
<noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?2159796&101" alt="circuito contador" border="0"></a></noscript>
<!-- Histats.com  END  -->
</body>
</html>