<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<LINK REL="SHORTCUT ICON" href="css/create.ico"  />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="title" content="Createbikes" />
<meta name="description" content="Bicicletas con estilo" />
<link rel="shortcut icon" href="images/favicon.gif">
<meta name="keywords" content="bicicletas" />

<title>Createbikes</title>


<!-- RESET -->
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<!-- ESTILO PRINCIPAL -->
<link href="css/main_style.css" rel="stylesheet" type="text/css" />
<!-- ESTILOS SHOWCASE -->
<link rel="stylesheet" type="text/css" href="css/style_slide.css" />
<link href="css/boton.css" rel="stylesheet" type="text/css" />
<link href="css/tienda.css" rel="stylesheet" type="text/css" />
<link href="css/slide.css" rel="stylesheet" type="text/css" />
<!-- FONTS -->
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Anton' rel='stylesheet' type='text/css'>
<!-- JQUERY -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="scripts/jquery.tools.min.js" type="text/javascript"></script>
<!-- Redes Dropdown -->
<script type="text/javascript">
$(document).ready(function()
{  
  $(".redes-dropdown").hide();
  $(".fb-like-box").hide();
  $(".twitter_box").hide();
  
  $(".b_twit").click(function(){
    if ($(".redes-dropdown").hasClass("isFacebook"))
    {
      $(".fb-like-box").hide();
      $(".twitter_box").show();
      $(".redes-dropdown").removeClass("isFacebook");
      $(".redes-dropdown").addClass("isTwitter");
    } else {
      $(".fb-like-box").hide();
      $(".twitter_box").show();
      $(".redes-dropdown").slideToggle("normal");
      $(".redes-dropdown").toggleClass("isTwitter");
    }   
  });
  
  $(".b_fb").click(function(){
    if ($(".redes-dropdown").hasClass("isTwitter"))
    {                        
      $(".twitter_box").hide();
      $(".fb-like-box").show();
      $(".redes-dropdown").removeClass("isTwitter");
      $(".redes-dropdown").addClass("isFacebook");
    } else {
      $(".twitter_box").hide();
      $(".fb-like-box").show();
      $(".redes-dropdown").slideToggle("normal");
      $(".redes-dropdown").toggleClass("isFacebook");
    } 
  });
});
</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32346935-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


</head>

<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="todo">

<div id="header">
  
  <div id="logo">
    <a href="index.php"><img src="images/logo.png" alt="CREATE" /></a>
  </div>

  <div id="redes">
    <ul>
      <li><a href="#" class="b_fb"><img src="images/facebook.png"></a></li>
      <li><a href="#" class="b_twit"><img src="images/twitter.png"></a></li>
    </ul>
  </div>
  <!-- //redes -->
  
  <div id="botonera">
    <ul>
     <li><a href="tienda/"><img src="images/carrito.png" width="152" height="35" /></a></li>
     <li><a href="#"><p>Puntos de venta</p></a></li>
     <li><a href="showrooms.php"><p>Showrooms</p></a></li> 
     <li><a href="#">
     <p>Galería</p></a></li>
     <li><a href="videos.php"><p>Videos</p></a></li> 
     <li><a href="comunidad.php"><p>Comunidad</p></a></li>
     
     
     
    </ul>
  </div>
<!-- //botonera -->

</div>
<!-- //header -->

<div class="redes-dropdown">
  <div class="twitter_box">
  <script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
  <script>
  new TWTR.Widget({
    version: 2,
    type: 'profile',
    rpp: 5,
    interval: 30000,
    width: 'auto',
    height: 500,
    theme: {
      shell: {
        background: '#333333',
        color: '#ffffff'
      },
      tweets: {
        background: '#ffffff',
        color: '#000000',
        links: '#665a66'
      }
    },
    features: {
      scrollbar: false,
      loop: false,
      live: false,
      behavior: 'all'
    }
  }).render().setUser('createbikescl').start();
  </script>
  </div>
  
  <div class="fb-like-box" data-href="https://www.facebook.com/createchile" data-width="300" data-show-faces="true" data-stream="true" data-header="true"></div>
</div>
<!-- //redes-dropdown -->




        