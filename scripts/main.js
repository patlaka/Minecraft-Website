<!--
//
// Google Analytics
//

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-19934236-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

//
// Information for the image rotatation script
//

// Type the number of images you are rotating.
NumberOfImagesToRotate = 6;
// Specify the first and last part of the image tag. 
FirstPart = '<img src="images/header';
LastPart = '.jpg" height="158" width="960">';

function printImage() {
	var r = Math.ceil(Math.random() * NumberOfImagesToRotate);
	document.write(FirstPart + r + LastPart);
}
//-->

