<!--
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

