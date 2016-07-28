<head>
<SCRIPT language="javascript">
function nCheck() {
  if (contest_signup.name.value == "Your Name Here") contest_signup.name.value = "";
  else if (contest_signup.name.value == "") contest_signup.name.value = "Your Name Here";}
function eCheck() {
  if (contest_signup.email.value == "Your e-mail address") contest_signup.email.value = "";
  else if (contest_signup.email.value == "") contest_signup.email.value = "Your e-mail address";}

</SCRIPT>
<?php
// COPYRIGHT/LIABILITY NOTICE
// Copyright © 2002 Kali (http://www.xentrik.net)
// Last modified 04/05/2004

// Kali's Contact Form may be used and modified free of charge as long as this
// copyright notice and the comments above remain intact. By using this code
// you agree to indemnify Kali from any liability that might arise from its use.

// Selling the code for this program without prior written consent is not permitted.
// Permission must be obtained before redistributing this software. In all cases the
// copyright and header information must remain intact.
// MODIFY THE FOLLOWING SECTION

// your name
$recipientname = "Julia Murray";

// your email
// $recipientemail = "volunteer@caancatmobile.org, caan-catmobile@hotmail.com";
$recipientemail = "boost01@gmail.com";
// subject of the email sent to you
$subject = "Entering the photo contest";

// send an autoresponse to the user?
$autoresponse = "yes";

// subject of autoresponse
$autosubject = "Thank you for your mail!";

// autoresponse message
$automessage = "This is an auto response to let you know that we've successfully received your email sent through our photo contest form. Thank you for your interest!";

// thankyou displayed after the user clicks "submit"
$thanks = "Thank you for submitting your photo the Photo Contest <A HREF='index.php?action=contest'>back</A>";

// END OF NECESSARY MODIFICATIONS

?>
</head>
<body>
<H1>Photo Contest</H1>





<?PHP
IF (!isset($_REQUEST['show']))
{
?>

<form name="contest_signup" action="index.php?action=contest&show=send" method="post" enctype="multipart/form-data">
<input type="hidden" name="require" value="name,email">
<table width=300 align=center>
	<tr>
		<td><b>email:</b></td>
		<td><input type="text" name="email" onFocus="eCheck()" onBlur="eCheck()"	VALUE="Your e-mail address"></td>
	<tr>
		<td><b>Name:</b></td>
		<td><input type="text" name="name" onFocus="nCheck()" onBlur="nCheck()" VALUE="Your Name Here"></td>
	</tr>
	<tr>
		<td><b>Photo:</b><td><input type="file" name="fileatt" id="file">
	</tr>
	<tr>
		<td colspan=2 align=right><input type="Submit" value="send" name="send"></td>
	</tr>
</table>
</form>

<?PHP
//	include ("poll.php");
}
ELSE IF ($_REQUEST['show'] == "send")
{
	
	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$require = $_REQUEST['require'];
// Obtain file upload vars 
	$fileatt = $_FILES['fileatt']['tmp_name'];
	$fileatt_type = $_FILES['fileatt']['type'];
	$fileatt_name = $_FILES['fileatt']['name'];
	
// Configuration - Your Options
    $allowed_filetypes = array('.jpg','.JPG'); // These will be the types of file that will pass the validation.
    $max_filesize = 768000; // Maximum filesize in BYTES (currently 0.75MB).

	$filename = $_FILES['fileatt']['name']; // Get the name of the file (including file extension).
	$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.

// Check if the filetype is allowed, if not DIE and inform the user.
	if(!in_array($ext,$allowed_filetypes)){
    	die('The file you attempted to upload is not allowed. <a href="index.php?action=contest">try again</a>');
	}

// Now check the filesize, if it is too large then DIE and inform the user.
    else if(filesize($_FILES['fileatt']['tmp_name']) > $max_filesize){
		die('The file you attempted to upload is too large. <a href="index.php?action=contest">try again</a>');
	}
	else {
		
	$headers = "From: $email";
	if (is_uploaded_file($fileatt)) {
// Read the file to be attached ('rb' = read binary)
		$file = fopen($fileatt,'rb');
		$data = fread($file,filesize($fileatt));
		fclose($file);
// Generate a boundary string
		$semi_rand = md5(time());
		$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
// Add the headers for a file attachment
		$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
// Add a multipart boundary above the plain message
		$message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";	
// Base64 encode the file data
		$data = chunk_split(base64_encode($data));
// Add file attachment to the message
		$message .= "--{$mime_boundary}\n" . "Content-Type: {$fileatt_type};\n" . " name=\"{$fileatt_name}\"\n" . "Content-Disposition: attachment;\n" . " filename=\"{$fileatt_name}\"\n" . "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n" . "--{$mime_boundary}--\n";
	}	
	
	
	
	if ($name == "Your Name Here") { $name = "";}

	$dcheck = explode(",",$require);
	while(list($check) = each($dcheck)) {
		if(!$$dcheck[$check]) {
			$error .= "Missing $dcheck[$check]<br>";
		}
	}
// check email address
	if ((!ereg(".+\@.+\..+", $email)) || (!ereg("^[a-zA-Z0-9_@.-]+$", $email))){
		$error .= "Invalid email address<br>";
	}
// display errors
	if($error) {
		?>

		<b>Error</b><br>
		<?php echo $error; ?><br>
		<a href="index.php?action=contest">try again</a>
			<?php
	}
	else {
// send mail and print success message
		$OK = mail($recipientemail,"$subject","$message",$headers);
		if ($OK)
		{
			echo "$thanks";
		}

		if($autoresponse == "yes") {
			$autosubject = stripslashes($autosubject);
			$automessage = stripslashes($automessage);
			mail($email,"$autosubject","$automessage","From: $recipientname <$recipientemail>");
		}
	}
}
}
ELSE IF ($_REQUEST['show'] == "results") {
	include ("poll/results.php");
}
ELSE IF ($_REQUEST['show'] == "vote") {
	include ("poll/vote.php");
}

?>
