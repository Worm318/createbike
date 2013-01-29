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
<link href="css/main_style2.css" rel="stylesheet" type="text/css" />
<!-- ESTILOS SHOWCASE -->
<!--<link rel="stylesheet" type="text/css" href="css/style_slide.css" />-
<link href="css/boton.css" rel="stylesheet" type="text/css" />
<link href="css/tienda.css" rel="stylesheet" type="text/css" />
<link href="css/slide.css" rel="stylesheet" type="text/css" />
-->
<!-- ESTILOS GALERIA -->
<link href="css/galeria.css" rel="stylesheet" type="text/css" />

<!-- FONTS -->
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Anton' rel='stylesheet' type='text/css'>
<!-- JQUERY -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>

<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/lightbox.js"></script>
<link href="css/lightbox.css" rel="stylesheet" />
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


<style type="text/css">
body,td,th {
	font-family: "PT Sans Narrow", arial, serif;
	color: #000;
}

</style>
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
    <!-- <li><a href="tienda/"><img src="images/carrito.png" width="152" height="35" /></a></li>  -->
      <li><a href="tienda/"><p>Ventas Online</p></a></li>   
     <!--<li><a href="showrooms.php"><p>Showrooms</p></a></li>   
     <li><a href="galeria_imagenes.php"><p>Eventos</p></a></li>   -->
     <li><a href="videos.php"><p>Videos</p></a></li> 
<!--     <li><a href="comunidad.php"><p>Comunidad</p></a></li> -->
<li><a href="galeria.php"><p>Galería</p></a></li>
     <li><a href="postventa_y_servicios.php"><p>Tiendas</p></a></li>
     <li><a href="contacto.php"><p>Contacto</p></a></li>
     
     
    </ul>
  </div>
<!-- //botonera -->

</div>
<!-- //header -->
<!-- //redes-dropdown -->
<?php require('admin/conectar.php'); ?>
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
<div id="options" class="clearfix">
    <div class="option-combo">
      <ul id="filter" class="option-set clearfix" data-option-key="filter">
        <li><a href="#show-all" data-option-value="*" class="selected" >Ver todo</a></li>
        <li><a href="#create" data-option-value=".create"  >CREATE</a></li>
        <li><a href="#eventos" data-option-value=".evento">Eventos</a></li>
        <li><a href="#bicicletas" data-option-value=".bicicleta">Bicicletas</a></li>
      </ul>
    </div>
</div>
<div id="container" class="photos clearfix">
<?
	$sql2="select a.det_id,a.det_imagen,a.det_nombre from imagenes_detalle a";
	$cad2=mysql_query($sql2) or die(mysql_error());	  
    while ($xDato2=mysql_fetch_array($cad2))
	{
?>    

<? 
$tipo = "otro";
if( strpos($xDato2["det_imagen"],"evento_") !== false ){$tipo = "evento";}
if( strpos($xDato2["det_imagen"],"bicicleta_") !== false ){$tipo = "bicicleta";}
if( strpos($xDato2["det_imagen"],"create_") !== false ){$tipo = "create";}
?>
    <div class="photo <?=$tipo ?>">
      <a href="imagen/<?=$xDato2["det_imagen"];?>" title="<?=$xDato2["det_nombre"];?>" rel="lightbox[roadtrip]"><img src="imagen/<?=$xDato2["det_imagen"];?>" alt="<?=$xDato2["det_nombre"]; ?>" /></a>
    </div>

<? }//end while ?>
</div>
 <!-- #container -->



	<script src="js/jquery-1.7.1.min.js"></script>
	<script src="js/jquery.isotope.min.js"></script>
    <script>
	
	
    $(function(){
					
		$.Isotope.prototype._getCenteredMasonryColumns = function() {
		this.width = this.element.width();
		
		var parentWidth = this.element.parent().width();
		
					  // i.e. options.masonry && options.masonry.columnWidth
		var colW = this.options.masonry && this.options.masonry.columnWidth ||
					  // or use the size of the first item
					  this.$filteredAtoms.outerWidth(true) ||
					  // if there's no items, use size of container
					  parentWidth;
		
		var cols = Math.floor( parentWidth / colW );
		cols = Math.max( cols, 1 );

		// i.e. this.masonry.cols = ....
		this.masonry.cols = cols;
		// i.e. this.masonry.columnWidth = ...
		this.masonry.columnWidth = colW;
	  };
	  
	  $.Isotope.prototype._masonryReset = function() {
		// layout-specific props
		this.masonry = {};
		// FIXME shouldn't have to call this again
		this._getCenteredMasonryColumns();
		var i = this.masonry.cols;
		this.masonry.colYs = [];
		while (i--) {
		  this.masonry.colYs.push( 0 );
		}
	  };

	  $.Isotope.prototype._masonryResizeChanged = function() {
		var prevColCount = this.masonry.cols;
		// get updated colCount
		this._getCenteredMasonryColumns();
		return ( this.masonry.cols !== prevColCount );
	  };
	  
	  $.Isotope.prototype._masonryGetContainerSize = function() {
		var unusedCols = 0,
			i = this.masonry.cols;
		// count unused columns
		while ( --i ) {
		  if ( this.masonry.colYs[i] !== 0 ) {
			break;
		  }
		  unusedCols++;
		}
		
		return {
			  height : Math.max.apply( Math, this.masonry.colYs ),
			  // fit container to columns that have been used;
			  width : (this.masonry.cols - unusedCols) * this.masonry.columnWidth
			};
	  };
		


	   var $container = $('#container');
	  
	  $container.imagesLoaded( function(){
        $container.isotope({
          itemSelector : '.photo'
        });
      });
	  
	  
    
      $container.isotope({
        masonry: {
          columnWidth: 330
        },
        sortBy: 'number',
        getSortData: {
          number: function( $elem ) {
            var number = $elem.hasClass('element') ? 
              $elem.find('.number').text() :
              $elem.attr('data-number');
            return parseInt( number, 10 );
          },
          alphabetical: function( $elem ) {
            var name = $elem.find('.name'),
                itemText = name.length ? name : $elem;
            return itemText.text();
          }
        }
      });

      var $optionSets = $('#options .option-set'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = $(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
  
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
          // changes in layout modes need extra logic
          changeLayoutMode( $this, options )
        } else {
          // otherwise, apply new options
          $container.isotope( options );
        }
        
        return false;
      });

    
    });
  </script>

<!-- Histats.com  START (hidden counter)-->
<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
<a href="http://www.histats.com" target="_blank" title="circuito contador" ><script  type="text/javascript" >
try {Histats.start(1,2159796,4,0,0,0,"");
Histats.track_hits();} catch(err){};
</script></a>
<noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?2159796&101" alt="circuito contador" border="0"></a></noscript>
<!-- Histats.com  END  -->
</div>
</body>