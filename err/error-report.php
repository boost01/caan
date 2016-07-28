<?php

// log errors to a file..
// ;o)
// (or

$error_file = $_SERVER['DOCUMENT_ROOT'].'/inc/log/.ht_errors';

// it's not there. try to create..
if (!file_exists($error_file)) {
	$fp = fopen($error_file, 'wb');
}

if (file_exists($error_file)) {
	$errors_oops = chr(10).date('Y.m.d h:i:s A')
	.chr(9).$_SERVER['REMOTE_ADDR']
	.chr(9).basename($_SERVER['SCRIPT_NAME'])
	.chr(9).@$_SERVER['HTTP_REFERER']
	.chr(9).$_SERVER['REQUEST_URI'];
	
	// add this entry..
	$fp = fopen($error_file, 'ab');
	fwrite($fp, $errors_oops);
	fclose($fp);
}

?>