<?php 
//include('header.php'); 
?>

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

<!DOCTYPE html>
<html>
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="0.8.841.114"/>
  <link rel="shortcut icon" href="images/favicon.ico?3842176425"/>
  <title>home</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?503150465"/>
  <link rel="stylesheet" type="text/css" href="css/master_a-p%c3%a1gina-maestra-(shop-site).css?fileVersionPlaceholder"/>
  <link rel="stylesheet" type="text/css" href="css/index.css?4123239201"/>
  <!-- Other scripts -->
  <script type="nueva_tienda/text/javascript">
   document.documentElement.className = 'js';
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
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=120940838034843";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	

	<?php 
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

	



  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="clearfix colelem" id="master-header"><!-- column -->
     <div class="clearfix colelem" id="pu97"><!-- group -->
      <div class="clearfix grpelem" id="u97"><!-- group -->
       <div class="clearfix grpelem" id="u160-4"><!-- content -->
        <p>My Account</p>
       </div>
      </div>
      <div class="clearfix grpelem" id="u161-4"><!-- content -->
       <p>Sign In</p>
      </div>
      <div class="grpelem" id="u175"><!-- simple frame --></div>
     </div>
     <div class="clearfix colelem" id="pu84"><!-- group -->
      <div class="grpelem" id="u84"><!-- simple frame --></div>
      <div class="grpelem" id="u76"><!-- simple frame --></div>
      <div class="rgba-background clearfix grpelem" id="u85-4"><!-- content -->
       <p>HOME</p>
      </div>
      <div class="rgba-background clearfix grpelem" id="u86-4"><!-- content -->
       <p>BIKES</p>
      </div>
      <div class="rgba-background clearfix grpelem" id="u87-4"><!-- content -->
       <p>PARTS</p>
      </div>
      <div class="rgba-background clearfix grpelem" id="u91-4"><!-- content -->
       <p>ACCESORIES</p>
      </div>
      <div class="rgba-background clearfix grpelem" id="u93-4"><!-- content -->
       <p>SALE</p>
      </div>
      <div class="rgba-background clearfix grpelem" id="u95-4"><!-- content -->
       <p>SHOP BY</p>
      </div>
      <div class="clearfix grpelem" id="u153"><!-- group -->
       <div class="clearfix grpelem" id="u430-4"><!-- content -->
        <p>20 % DCTO SALE</p>
       </div>
      </div>

<hr> 

	<div class="clearfix colelem" id="pu184"><!-- column -->
     <div class="clearfix colelem" id="u184"><!-- group -->
      <div class="grpelem" id="u333"><!-- rasterized frame -->
       <img id="u333_img" src="nueva_tienda/images/arrows-u333.png" alt="" width="30" height="60"/>
      </div>
      <div class="grpelem" id="u325"><!-- image -->
       <img id="u325_img" src="nueva_tienda/images/arrows.png" alt="" width="30" height="60"/>
      </div>
     </div>
     <div class="clearfix colelem" id="u324"><!-- group -->
      <div class="clearfix grpelem" id="u337-4"><!-- content -->
       <p>+Share</p>
      </div>
     </div>

<hr>

<div class="colelem" id="u336"><!-- simple frame --></div>
     <div class="clearfix colelem" id="ppu366"><!-- group -->
      <div class="clearfix grpelem" id="pu366"><!-- column -->
       <div class="colelem" id="u366"><!-- simple frame --></div>
       <div class="clearfix colelem" id="u423-13"><!-- content -->
        <p id="u423-3"><span>JULIETTE </span><span id="u423-2">VIEW</span></p>
        <p id="u423-5">Lorem ipsum dolor sit amet...</p>
        <p id="u423-6">&nbsp; </p>
        <p id="u423-8">299 990,00 $</p>
        <p id="u423-10">Añadir al carro</p>
        <p>&nbsp; </p>
       </div>
      </div>
      <div class="clearfix grpelem" id="pu368"><!-- column -->
       <div class="colelem" id="u368"><!-- simple frame --></div>
       <div class="clearfix colelem" id="u424-13"><!-- content -->
        <p id="u424-3"><span>MOUSTACHE </span><span id="u424-2">VIEW</span></p>
        <p id="u424-5">Lorem ipsum dolor sit amet...</p>
        <p id="u424-6">&nbsp; </p>
        <p id="u424-8">299 990,00 $</p>
        <p id="u424-10">Añadir al carro</p>
        <p>&nbsp; </p>
       </div>
      </div>
      <div class="grpelem" id="u249"><!-- simple frame --></div>
      <div class="grpelem" id="u358"><!-- simple frame --></div>
      <div class="clearfix grpelem" id="u422-13"><!-- content -->
       <p id="u422-3"><span>INDIAN SUMMER </span><span id="u422-2">VIEW</span></p>
       <p id="u422-5">Lorem ipsum dolor sit amet...</p>
       <p id="u422-6">&nbsp; </p>
       <p id="u422-8">299 990,00 $</p>
       <p id="u422-10">Añadir al carro</p>
       <p>&nbsp; </p>
      </div>
     </div>
     <div class="clearfix colelem" id="pu371"><!-- group -->
      <div class="grpelem" id="u371"><!-- simple frame --></div>
      <div class="grpelem" id="u373"><!-- simple frame --></div>
      <div class="grpelem" id="u375"><!-- simple frame --></div>
     </div>
     <div class="clearfix colelem" id="pu425-13"><!-- group -->
      <div class="clearfix grpelem" id="u425-13"><!-- content -->
       <p id="u425-3"><span>SNOW FLAKE </span><span id="u425-2">VIEW</span></p>
       <p id="u425-5">Lorem ipsum dolor sit amet...</p>
       <p id="u425-6">&nbsp; </p>
       <p id="u425-8">299 990,00 $</p>
       <p id="u425-10">Añadir al carro</p>
       <p>&nbsp; </p>
      </div>
      <div class="clearfix grpelem" id="u426-13"><!-- content -->
       <p id="u426-3"><span>SOUTH OCEAN </span><span id="u426-2">VIEW</span></p>
       <p id="u426-5">Lorem ipsum dolor sit amet...</p>
       <p id="u426-6">&nbsp; </p>
       <p id="u426-8">299 990,00 $</p>
       <p id="u426-10">Añadir al carro</p>
       <p>&nbsp; </p>
      </div>
      <div class="clearfix grpelem" id="u427-13"><!-- content -->
       <p id="u427-3"><span>SUBMARINE </span><span id="u427-2">VIEW</span></p>
       <p id="u427-5">Lorem ipsum dolor sit amet...</p>
       <p id="u427-6">&nbsp; </p>
       <p id="u427-8">299 990,00 $</p>
       <p id="u427-10">Añadir al carro</p>
       <p>&nbsp; </p>
      </div>
     </div>
     <div class="clearfix colelem" id="pu377"><!-- group -->
      <div class="grpelem" id="u377"><!-- simple frame --></div>
      <div class="grpelem" id="u379"><!-- simple frame --></div>
     </div>
     <div class="clearfix colelem" id="pu428-13"><!-- group -->
      <div class="clearfix grpelem" id="u428-13"><!-- content -->
       <p id="u428-3"><span>SWEET HEART </span><span id="u428-2">VIEW</span></p>
       <p id="u428-5">Lorem ipsum dolor sit amet...</p>
       <p id="u428-6">&nbsp; </p>
       <p id="u428-8">299 990,00 $</p>
       <p id="u428-10">Añadir al carro</p>
       <p>&nbsp; </p>
      </div>
      <div class="clearfix grpelem" id="u429-13"><!-- content -->
       <p id="u429-3"><span>JAMAICAN RAINBOW </span><span id="u429-2">VIEW</span></p>
       <p id="u429-5">Lorem ipsum dolor sit amet...</p>
       <p id="u429-6">&nbsp; </p>
       <p id="u429-8">299 990,00 $</p>
       <p id="u429-10">Añadir al carro</p>
       <p>&nbsp; </p>
      </div>
     </div>
    </div>
    <div class="clearfix colelem" id="master-footer"><!-- column -->
     <div class="clearfix colelem" id="pu466-20"><!-- group -->
      <div class="rgba-background clearfix grpelem" id="u466-20"><!-- content -->
       <p id="u466-2">BIKES</p>
       <p id="u466-4">JAMAICAN RAINBOW</p>
       <p id="u466-6">INDIAN SUMMER</p>
       <p id="u466-8">JULIETTE</p>
       <p id="u466-10">MOUSTACHE</p>
       <p id="u466-12">SNOW FLAKE</p>
       <p id="u466-14">SOUTH OCEAN</p>
       <p id="u466-16">SUBMARINE</p>
       <p id="u466-18">SWEET HEART</p>
      </div>
      <div class="rgba-background clearfix grpelem" id="u467-20"><!-- content -->
       <p id="u467-2">PARTS</p>
       <p id="u467-4">JAMAICAN RAINBOW</p>
       <p id="u467-6">INDIAN SUMMER</p>
       <p id="u467-8">JULIETTE</p>
       <p id="u467-10">MOUSTACHE</p>
       <p id="u467-12">SNOW FLAKE</p>
       <p id="u467-14">SOUTH OCEAN</p>
       <p id="u467-16">SUBMARINE</p>
       <p id="u467-18">SWEET HEART</p>
      </div>
      <div class="rgba-background clearfix grpelem" id="u468-20"><!-- content -->
       <p id="u468-2">ACCESORIES</p>
       <p id="u468-4">JAMAICAN RAINBOW</p>
       <p id="u468-6">INDIAN SUMMER</p>
       <p id="u468-8">JULIETTE</p>
       <p id="u468-10">MOUSTACHE</p>
       <p id="u468-12">SNOW FLAKE</p>
       <p id="u468-14">SOUTH OCEAN</p>
       <p id="u468-16">SUBMARINE</p>
       <p id="u468-18">SWEET HEART</p>
      </div>
      <div class="rgba-background clearfix grpelem" id="u469-12"><!-- content -->
       <p id="u469-2">CREATE</p>
       <p id="u469-4">COMUNIDAD</p>
       <p id="u469-6">VIDEOS</p>
       <p id="u469-8">CONCURSO</p>
       <p id="u469-10">SHOWROOMS</p>
      </div>
     </div>
     <div class="clearfix colelem" id="pu470-12"><!-- group -->
      <div class="rgba-background clearfix grpelem" id="u470-12"><!-- content -->
       <p id="u470-2">FOLLOW US</p>
       <p id="u470-4">TWITTER</p>
       <p id="u470-6">FACEBOOK</p>
       <p id="u470-8">YOUTUBE</p>
       <p id="u470-10">VIMEO</p>
      </div>
      <div class="rgba-background clearfix grpelem" id="u471-4"><!-- content -->
       <p>HELP</p>
      </div>
      <div class="rgba-background clearfix grpelem" id="u472-4"><!-- content -->
       <p>PAYMENT METHODS</p>
      </div>
      <div class="rgba-background grpelem" id="u465"><!-- simple frame --></div>
     </div>
     <div class="clearfix colelem" id="u484"><!-- group -->
      <div class="grpelem" id="u145"><!-- simple frame --></div>
      <div class="clearfix grpelem" id="pu474"><!-- group -->
       <div class="grpelem" id="u474"><!-- image -->
        <img id="u474_img" src="images/submit_btn.gif" alt="" width="28" height="28"/>
       </div>
       <div class="grpelem" id="u479"><!-- simple frame --></div>
       <div class="clearfix grpelem" id="u483-4"><!-- content -->
        <p>Newsletter + Exclusive Shop Offers</p>
       </div>
      </div>
      <a class="nonblock nontext grpelem" id="u98" href="nueva_tienda/index.html#"><!-- simple frame --></a>
     </div>
    </div>
   </div>
  </div>
  <div class="preload_images">
   <img class="preload" src="images/youtube02.png" alt=""/>
   <img class="preload" src="images/facebook02.png" alt=""/>
   <img class="preload" src="images/twitter02.png" alt=""/>
  </div>
  <!-- JS includes -->
  <script src="http://musecdn2.businesscatalyst.com/scripts/1.1/jquery-1.7.min.js" type="nueva_tienda/text/javascript"></script>
  <script type="nueva_tienda/text/javascript">
   window.jQuery || document.write('\x3Cscript src="nueva_tienda/scripts/1.1/jquery-1.7.min.js" type="nueva_tienda/text/javascript">\x3C/script>');
</script>
  <script src="nueva_tienda/scripts/1.1/sprydomutils.js?54905613" type="text/javascript"></script>
  <script src="nueva_tienda/scripts/1.1/museutils.js?3935353765" type="text/javascript"></script>
  <!-- Other scripts -->
  <script type="nueva_tienda/text/javascript">
   Muse.Utils.addSelectorFn('body', Muse.Utils.transformMarkupToFixBrowserProblemsPreInit);/* body */
Muse.Utils.addSelectorFn('a.nonblock', Muse.Utils.addHyperlinkAnchor); /* a.nonblock */
Muse.Utils.addSelectorFn('body', Muse.Utils.showWidgetsWhenReady);/* body */
Muse.Utils.addSelectorFn('body', Muse.Utils.transformMarkupToFixBrowserProblems);/* body */

    
    </script>
    
   </form>    
    
    
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
</body>
</html>
