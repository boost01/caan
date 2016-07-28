<?php //۞//text{encoding:utf-8;bom:no;linebreaks:unix;text:4 spaces/tab;}

// initialize..
do_init();
include ('mail-mash.php');
$email_addy = mail_mash('webmaster@caancabmobile.org');

echo '<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="',$doc_content,'; charset=utf-8" />
<title>500.. the I fucked up big-style file</title>
<meta name="description" content="500 server error page.. from corz.org" />
<style type="text/css">
/*<![CDATA[*/ 
@import "/err/err.css";
@import "err.css"; 
/*]]>*/
</style>
</head>
<body>
<div class="quarter-space">&nbsp;</div>
<div class="content-wide">
	<div class="two-column">

		<div class="left-column">
			<h2>ahh shite!</h2>

			This does not look good. More than likely the webmaster is messing around
			with the .htaccess files again, or something. Give it a moment or two and refresh,
			if you aren\'t in too much of a hurry.<br />
			<br />

			If this lasts, cor would <strong>definitely</strong> like to <a href="',$email_addy,'?subject=500%20-%20',rawurlencode($_SERVER['REQUEST_URI']),'" 
			title="your valuable feedback is appreciated. thanks">hear about it</a>.
			Alternatively, click <a href="/" 
			title="up to the site root">here</a> in the site root, which might still work, okay.
		</div>

		<div class="right-column">
			<div class="error">500</div>
		</div>

	</div>
</div>
</body>
</html>
';

// init
function do_init() {
global $corz_root, $doc_content;
	if (stristr(@$_SERVER['HTTP_ACCEPT'],'application/xhtml+xml')) {
		$doc_content = 'application/xhtml+xml';
	} else {
		// read: "Internet Explorer"
		$doc_content = 'text/html';
	}
	$corz_root = $_SERVER['DOCUMENT_ROOT'];
}
?>