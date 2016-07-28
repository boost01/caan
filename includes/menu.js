// JavaScript Document
<!--

function newImage(arg) {
	if (document.images) {
		rslt = new Image();
		rslt.src = arg;
		return rslt;
	}
}

function changeImages() {
	if (document.images && (preloadFlag == true)) {
		for (var i=0; i<changeImages.arguments.length; i+=2) {
			document[changeImages.arguments[i]].src = changeImages.arguments[i+1];
		}
	}
}

var preloadFlag = false;
function preloadImages() {
	if (document.images) {
		about_over = newImage("images/menu/about-over.gif");
		catmobile_over = newImage("images/catmobile-over.gif");
		adoptions_over = newImage("images/menu/adoptions-over.gif");
		strays_over = newImage("images/menu/strays-over.gif");
		lostfound_over = newImage("images/menu/lostfound-over.gif");
		links_over = newImage("images/menu/links-over.gif");
		preloadFlag = true;
	}
}

// -->

<!-- End Preload Script -->
