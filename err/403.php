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
<title>403.. the you are a curious sort file</title>
<meta name="description" content="403 permission denied error page.. from corz.org" />
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
			<h2>Stop nosing about!</h2>

			if you\'re fairly certain you <em>should</em>&nbsp; be allowed in here, please 
			<a href="',$email_addy,'?subject=403%20-%20',rawurlencode($_SERVER['REQUEST_URI']),'" 
			title="your valuable feedback is appreciated. thanks">tell the webmaster</a> about it. 
			alternatively, click <a href="/" title="up to the site root">here</a> in the approved area!<br />
			<br />
		</div>

		<div class="right-column">
			<div class="error">403</div>
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