<?php include('header.php'); ?>

<script type="text/javascript">
(function(){
 
/**
CONFIGURATION:
Define the size of our background image
*/
var bgImageSize = {
width: 1024,
height: 576
};
 
/*END CONFIGURATION */
 
/**
Detect support for CSS background-size. No need for any more javascript if background-size is supported.
Property detection adapted from the most excellent Modernizr <http://modernizr.com>
*/
if ((function(){
var el = document.createElement('div'),
bs = 'backgroundSize',
ubs= bs.charAt(0).toUpperCase() + bs.substr(1),
props= [bs, 'Webkit' + ubs, 'Moz' + ubs, 'O' + ubs];
 
for ( var i in props ) {
if ( el.style[props[i]] !== undefined ) {
return true;
}
}
return false;
}())) {
return;
};
 
/**
We also want to leave IE6 and below out in the cold with this
*/
if ( false /*@cc_on || @_jscript_version < 5.7 @*/ ) {
return;
}
 
/**
If we've gotten here, we don't have background-size support,
so we'll have to mimic it with Javascript.
Let's set up some variables
*/
var elBody,
imageID= 'expando',
tallClass= 'tall',
wideClass= 'wide',
elBgImage, elWrapper, img, url, imgAR,
 
/**
Since we're not relying on a library, we'll need some utility functions
First, basic cross browser event adders
*/
addEvent = function(el, evnt, func) {
if (el.addEventListener) {
el.addEventListener(evnt, func, false);
} else if (el.attachEvent) {
return el.attachEvent("on" + evnt, func);
} else {
el['on' + evnt] = func;
}
},
 
domLoaded = function(callback) {
/* Internet Explorer */
/*@cc_on
@if (@_win32 || @_win64)
document.write('<script id="ieScriptLoad" defer src="//:"><\/script>');
document.getElementById('ieScriptLoad').onreadystatechange = function() {
if (this.readyState == 'complete') {
callback();
}
};
@end @*/
/* Mozilla, Chrome, Opera */
if (document.addEventListener) {
document.addEventListener('DOMContentLoaded', callback, false);
}
/* Safari, iCab, Konqueror */
if (/KHTML|WebKit|iCab/i.test(navigator.userAgent)) {
var DOMLoadTimer = setInterval(function () {
if (/loaded|complete/i.test(document.readyState)) {
callback();
clearInterval(DOMLoadTimer);
}
}, 10);
}
},
 
/**
Next, a way to properly get the computed style of an element
Courtesy of Robert Nyman - http://robertnyman.com/2006/04/24/get-the-rendered-style-of-an-element/
*/
getStyle = function(el, css){
var strValue = "";
if (document.defaultView && document.defaultView.getComputedStyle){
strValue = document.defaultView.getComputedStyle(el, "").getPropertyValue(css);
}
else if (el.currentStyle){
css = css.replace(/\-(\w)/g, function (strMatch, p1){
return p1.toUpperCase();
});
strValue = el.currentStyle[css];
}
return strValue;
},
 
/**
Finally, some element class manipulation functions
*/
classRegex = function(cls) {
return new RegExp('(\\s|^)'+cls+'(\\s|$)');
},
 
hasClass = function(el, cls) {
return el.className.match(classRegex(cls));
},
 
addClass = function(el, cls) {
if ( ! hasClass(el, cls)) {
el.className += ' ' + cls;
}
},
 
removeClass = function(el, cls) {
if (hasClass(el, cls)) {
el.className = el.className.replace(classRegex(cls), '');
}
},
 
/*
Now we can move on with the core functionality of Flexibackground
*/
initialize = function() {
 
// No need for any of this if the screen isn't bigger than the background image
if (screen.availWidth <= bgImageSize.width && screen.availHeight <= bgImageSize.height) {
return;
}
 
// Grab elements we'll reference throughout
elBody= document.getElementsByTagName('body')[0];
 
// Parse out the URL of the background image and drop out if we don't have one
url = getStyle(elBody, 'backgroundImage').replace(/^url\(("|')?|("|')?\);?$/g, '') || false;
if (!url || url === "none" || url === "") {
return;
}
 
// Get the aspect ratio of the image
imgAR = bgImageSize.width / bgImageSize.height;
 
// Create a new image element
elBgImage = document.createElement('img');
elBgImage.src = url;
elBgImage.id = imageID;
 
// Create a wrapper and append the image to it.
// The wrapper ensures we don't get scrollbars.
elWrapper = document.createElement('div');
elWrapper.style.overflow= 'hidden';
elWrapper.style.width= '100%';
elWrapper.style.height= '100%';
elWrapper.style.zIndex= '-1';
 
elWrapper.appendChild(elBgImage);
elBody.appendChild(elWrapper);
 
// Fix the wrapper into position
elWrapper.style.position= 'fixed';
elWrapper.style.top= 0;
elWrapper.style.left= 0;
 
// Set up a resize listener to add/remove classes from the body
addEvent(window, 'resize', resizeAction);
 
// Set it up by triggering a resize
resizeAction();
 
},
 
/**
Set up the action that happens on resize
*/
resizeAction = function() {
var win = {
height: window.innerHeight || document.documentElement.clientHeight,
width: window.innerWidth || document.documentElement.clientWidth
},
 
// The current aspect ratio of the window
winAR = win.width / win.height;
 
// Determine if we need to show the image and whether it needs to stretch tall or wide
if (win.width < bgImageSize.width && win.height < bgImageSize.height) {
removeClass(elBody, wideClass);
removeClass(elBody, tallClass);
} else if (winAR < imgAR) {
removeClass(elBody, wideClass);
addClass(elBody, tallClass);
// Center the image
elBgImage.style.left = Math.min(((win.width - bgImageSize.width) / 2), 0);
} else if (winAR > imgAR) {
addClass(elBody, wideClass);
removeClass(elBody, tallClass);
elBgImage.style.left = 0;
}
};
 
// When the document is ready, run this thing.
domLoaded(initialize);
 
})();
</script>
<style>
body {
background-attachment: fixed;
background-color: white;
background-position: top center;
background-repeat: no-repeat;
/*font-family: 'Metrophobic', sans-serif;*/
 
margin:0;
padding: 0;
 
background-size: cover;
-moz-background-size: cover;
-webkit-background-size: cover;
}
 
/*
This next definition doesn't allow the background to get any smaller
than a predefined size (640x426px in this case). Change the values
here to match your background image size. The configuration in the
flexi-background javascript file should also match these values.
*/
 
@media only all and (max-width: 1024px) and (max-height: 576px) {
body {
background-size: 1024px 576px;
-moz-background-size: 1024px 576px;
-webkit-background-size: 1024px 576px;
}
}
 
/*
The next 2 definitions are for support in iOS devices.
Since they don't recoginze the 'cover' keyword for background-size
we need to simulate it with percentages and orientation
*/
 
@media only screen and (orientation: portrait) and (device-width: 320px), (device-width: 768px) {
body {
-webkit-background-size: auto 100%;
}
}
 
@media only screen and (orientation: landscape) and (device-width: 320px), (device-width: 768px) {
body {
-webkit-background-size: 100% auto;
}
}
</style>
</head>

<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=120940838034843";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="tienda">
<p>Selecciona tu Create, y Llevatela a casa.</p>
	
	
if (isset($_GET["email"])){
	echo'<div id="fail">Error en email, escriba un email valido.</div>';
}
if (isset($_GET["datos"])){
	echo'<div id="fail">Complete todos los campos</div>';
}
if (isset($_GET["bici"])){
	echo'<div id="fail">Elije una bicicleta Create!</div>';
}

if (isset($_GET["enviado"])){
	echo'<div id="bien">Tu mensaje a sido recibido exitosamente, estate pendiente a tu email!</div>';
}
 ?>

	
    <form id="form" action="mailing/mailphp.php" method="post" enctype="multipart/form-data">
    <div id="datos">
    
	<div id="comentario">
		<p>Cuando apretes enviar estaras postulando para la compra de tu Create, por lo cual<br />
debes preocuparte de poner tus datos reales, y esperar tu respuesta de parte de CreateChile!.</p>
	</div>
	
	
    <span>Nombre:</span>
    <input class="input" type="text" name="nombre" /><br />
    <span>Email:</span>
    <input class="input" type="text" name="email" /><br />
    <span>Direccion:</span>
    <input class="input" type="text" name="direccion" /><br />
    <span>telefono:</span>
    <input class="input" type="text" name="telefono" /><br />
    
    <input type="submit" id="enviar" name="enviar" value="Enviar" />
    
    <span>Altura:</span><br />
    
    <input type="radio" name="talla" value="small" style="-webkit-appearance: radio;" /> small (Menor que 1.68)  &nbsp; &nbsp; &nbsp;
<input type="radio" name="talla" value="medium"  style="-webkit-appearance: radio;"/> medium (1.68 a 1.80) &nbsp; &nbsp; &nbsp;
<input type="radio" name="talla" value="large" style="-webkit-appearance: radio;" /> large (superior que 1.80)&nbsp;&nbsp; &nbsp;
<br /><br />

<hr>



    </div>
    <div id="bicicletas_tienda">
    <br /><br />
    <span>Elije tu CreateBike!</span><br /><br />
    
    
   <div class="bici_izq">
    <img src="images/productos/jamaican.png" alt="jamaican rainbow" /><br />
	<div class="leyenda">
    Jamaican Rainbow es la mezcla perfecta de estilo y funcionalidad.  Totalmente rupturista para una ciudad donde los colores se olvidaron.
    </div>
    
    <input type="radio" name="group" id="group1" value="Jamaican rainbow" />
        <label for="group1" class="working"><span>Agregar</span></label>

    <input type="radio" name="group" id="group2" value="no" checked/>
        <label for="group2" class="not_checked"><span>No llevar</span></label>
        <div class="fb-like" data-href="http://www.socialfeedback.cl/create/images/productos/jamaican.png" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.socialfeedback.cl/create/tienda.php" data-text="www.createchile.cl " data-via="createchile" data-related="createchile">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
    
    <div class="bici_izq">
    <img src="images/productos/indian.png" alt="Indian Summer" /><br />
    <div class="leyenda">
     Indian Summer es un amanecer en el Ganges. La combinacion perfecta entre la belleza de la flor de Loto y la magica sensacion de recorrer las calles de Bombay.  Su espiritu es oriental.
    </div>

    
    <input type="radio" name="group" id="group3" value="Indian Summer" />
        <label for="group3" class="working"><span>Agregar</span></label>

    <input type="radio" name="group" id="group4" value="no" checked/>
        <label for="group4" class="not_checked"><span>No llevar</span></label>
        <div class="fb-like" data-href="http://www.socialfeedback.cl/create/images/productos/indian.png" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.socialfeedback.cl/create/tienda.php" data-text="www.createchile.cl " data-via="createchile" data-related="createchile">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
    
    <div class="bici_izq">
    <img src="images/productos/juliette.png" alt="Juliette" /><br />
	<div class="leyenda">
    Juliette se apodera de la vanguardia new yorkina. Con un diseño urbano contemporaneo, esta CREATE® atrae miradas donde sea que este. Menos es más y Dios esta en los detalles.

    </div>
    
    <input type="radio" name="group" id="group5" value="Juliette" />
        <label for="group5" class="working"><span>Agregar</span></label>

    <input type="radio" name="group" id="group6" value="no" checked/>
        <label for="group6" class="not_checked"><span>No llevar</span></label>
        <div class="fb-like" data-href="http://www.socialfeedback.cl/create/images/productos/juliette.png" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.socialfeedback.cl/create/tienda.php" data-text="www.createchile.cl " data-via="createchile" data-related="createchile">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
    
    <div class="bici_izq">
    <img src="images/productos/moustache.png" alt="Moustache" /><br />
	<div class="leyenda">
   Moustache. La herencia de su color rescata las líneas clásicas y sobrias de CREATE®. La mas elegante.
    </div>
    
    <input type="radio" name="group" id="group7" value="Moustache" />
        <label for="group7" class="working"><span>Agregar</span></label>

    <input type="radio" name="group" id="group8" value="no" checked/>
        <label for="group8" class="not_checked"><span>No llevar</span></label>
        <div class="fb-like" data-href="http://www.socialfeedback.cl/create/images/productos/moustache.png" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.socialfeedback.cl/create/tienda.php" data-text="www.createchile.cl " data-via="createchile" data-related="createchile">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
    
    
    
    
    <div class="bici_izq">
    <img src="images/productos/snow.png" alt="Snow Flake" /><br />
	<div class="leyenda">
    Snow Flake. La síntesis de todos los colores, símbolo de lo absoluto. Esta CREATE® es pura belleza.
    </div>
    
    <input type="radio" name="group" id="group9" value="Snow Flake" />
        <label for="group9" class="working"><span>Agregar</span></label>

    <input type="radio" name="group" id="group10" value="no" checked/>
        <label for="group10" class="not_checked"><span>No llevar</span></label>
        <div class="fb-like" data-href="http://www.socialfeedback.cl/create/images/productos/snow.png" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.socialfeedback.cl/create/tienda.php" data-text="www.createchile.cl " data-via="createchile" data-related="createchile">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
    
    <div class="bici_izq">
    <img src="images/productos/south.png" alt="South Ocean" /><br />
	<div class="leyenda">
    South Ocean. Bicicleta en homenaje a los mares del sur. Libertad sin limites. Siempre en la cresta de la ola, CREATE® tu mejor compañera.
    </div>
    
    <input type="radio" name="group" id="group11" value="South Ocean" />
        <label for="group11" class="working"><span>Agregar</span></label>

    <input type="radio" name="group" id="group12" value="no" checked/>
        <label for="group12" class="not_checked"><span>No llevar</span></label>
        <div class="fb-like" data-href="http://www.socialfeedback.cl/create/images/productos/south.png" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.socialfeedback.cl/create/tienda.php" data-text="www.createchile.cl " data-via="createchile" data-related="createchile">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
    
    <div class="bici_izq">
    <img src="images/productos/submarine.png" alt="Submarine" /><br />
	<div class="leyenda">
    El espíritu Londinense se apodera de CREATE® con Submarine. Color explotion & good vibes!
    </div>
    
    <input type="radio" name="group" id="group13" value="Submarine" />
        <label for="group13" class="working"><span>Agregar</span></label>

    <input type="radio" name="group" id="group14" value="no" checked/>
        <label for="group14" class="not_checked"><span>No llevar</span></label>
        <div class="fb-like" data-href="http://www.socialfeedback.cl/create/images/productos/submarine.png" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.socialfeedback.cl/create/tienda.php" data-text="www.createchile.cl " data-via="createchile" data-related="createchile">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
    
    <div class="bici_izq">
    <img src="images/productos/sweet-heart.png" alt="Sweet Heart" /><br />
	<div class="leyenda">
   Sweetheart es la Porno Star de CREATE®. Atracción sin limites, un deseo incontrolable.
    </div>
    
    <input type="radio" name="group" id="group15" value="Sweet Heart" />
        <label for="group15" class="working"><span>Agregar</span></label>

    <input type="radio" name="group" id="group16" value="no" checked/>
        <label for="group16" class="not_checked"><span>No llevar</span></label>
        <div class="fb-like" data-href="http://www.socialfeedback.cl/create/images/productos/sweet-heart.png" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.socialfeedback.cl/create/tienda.php" data-text="www.createchile.cl " data-via="createchile" data-related="createchile">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
    
    
    </div>
    
    <input type="submit" id="enviar" name="enviar" value="Enviar" />
    
    </form>
    
    
    
</div>
</body>
</html>
