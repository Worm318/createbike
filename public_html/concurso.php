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
background-color: #333;
background-image:url(css/gabriel-bici.png);
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
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div id="expo_bici"><img style="float:left; width:580px" src="css/bicicletas.png" alt="bicicletas create" />
<a id="bases_expo" href="css/bases.pdf">Bases del concurso</a>

<div style="overflow: hidden; height: 890px; float:right; width: 415px; margin-right:4px;" >
<div style="background-color: black;
    color: #FFFFFF;
    font-family: Arial,Verdana,Tahoma,Sans-Serif;
    font-size: 24px;
    font-weight: bold;
    margin: 13px 0;
    padding: 13px;
    text-transform: uppercase;
    letter-spacing: -1px;">Participa por tu Create</div>
<div id="expo_cuadro">En Junio sortearemos 5 <strong>CREATE BIKES</strong>, anota aquí tus datos y participa por una de ellas! <br />
    <span>Es muy importante que anotes correctamente el número que aparece en tu postcard. Recuerda que debes guardar muy bien la postcard para canjear después tu Bicicleta <strong>CREATE BIKE.</strong></span>

</div>
<iframe width="460" height="1000" frameborder="0" marginwidth="0" marginheight="0" src="https://docs.google.com/a/createchile.cl/spreadsheet/embeddedform?formkey=dHdETDRfb1VxN1ZkQ2Z0QVhrOE5MSUE6MQ">Cargando...</iframe>
</div>

</div>





<!-- //showcase -->

<!-- //content -->

</div>
<!-- //todo -->



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