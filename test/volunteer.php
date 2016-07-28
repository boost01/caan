<html>
<head>
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
$recipientemail = "volunteer@caancatmobile.org, caan-catmobile@hotmail.com";

// subject of the email sent to you
$subject = "Volunteering for the Catmobie";

// send an autoresponse to the user?
$autoresponse = "yes";

// subject of autoresponse
$autosubject = "Thank you for your mail!";

// autoresponse message
$automessage = "This is an auto response to let you know that we've successfully received your email sent through our volunteer form. Thank you for generously offering your time to the CatMobile! If your assistance is required, we will get back to you as soon as possible.";

// thankyou displayed after the user clicks "submit"
$thanks = "Thank you for volunteering, your support is greatly appreciated.<BR>If your assistance is required, we will get back to you as soon as possible. If you are not contacted, it means that we have an abundance of volunteers for these events. We encourage your to volunteer your time for another outing.<br><A HREF='volunteer.php'>back</A>";

// END OF NECESSARY MODIFICATIONS

?>
<SCRIPT language="javascript">
function nCheck() {
  if (catmobile_signup.name.value == "Your Name Here") catmobile_signup.name.value = "";
  else if (catmobile_signup.name.value == "") catmobile_signup.name.value = "Your Name Here";}
function eCheck() {
  if (catmobile_signup.email.value == "Your e-mail address") catmobile_signup.email.value = "";
  else if (catmobile_signup.email.value == "") catmobile_signup.email.value = "Your e-mail address";}
function tCheck() {
  if (catmobile_signup.tel.value == "Your Tel:#") catmobile_signup.tel.value = "";
  else if (catmobile_signup.tel.value == "") catmobile_signup.tel.value = "Your Tel:#";}
</SCRIPT>
</head>
<body>
<?php
//Connect To Database
include ("./includes/login.php");
// $hostname='p50mysql59.secureserver.net';
// $username='caancatmobile';
// $password='NadiaCAAN1';
// $dbname='caancatmobile';
// $usertable='volunteers';

mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname);
$query = 'SELECT * FROM volunteers ORDER BY date ASC';
$result = mysql_query($query) or die (mysql_error());
$num=mysql_numrows($result);
mysql_close();

IF (!ISSET($_POST['volunteer']))
{
?>
	<form name="catmobile_signup" action="<?php echo $PHP_SELF; ?>" method="post">
	<input type="hidden" name="require" value="name,email,tel">
	<center>If you can help<BR>please fill in the form below<BR>check off the events you can attend</center>
	<H2 align=center><font face="alba matter">CATMOBILE SCHEDULE FOR</font></H2>
	<table width=500 align=center>
<?PHP 
	$i=0;
	while ($i < $num) {
		$name=mysql_result($result,$i,"name");
		$place=mysql_result($result,$i,"place");
		$date=mysql_result($result,$i,"date");
		$loads=mysql_result($result,$i,"loads");
		$loade=mysql_result($result,$i,"loade");
		$theres=mysql_result($result,$i,"theres");
		$theree=mysql_result($result,$i,"theree");
		$uloads=mysql_result($result,$i,"uloads");
		$uloade=mysql_result($result,$i,"uloade");
?>
		<tr>
	  		<td colspan=2><font face="alba matter"><?PHP echo "$name"; ?>
	  		<BR><?PHP echo "$place"; ?></td>
	  		<td><font face="alba matter"><?PHP echo date("l, F: d", strtotime($date)); ?></td>
			</tr>
		<tr>
	  		<td>Load up at Court Animal
	  		<BR><?PHP echo "$loads"; echo "-"; echo "$loade"; ?> </td>
	  		<td>At <?PHP echo "$name"; ?>
			<BR><?PHP echo "$theres"; echo "-"; echo "$theree"; ?></td>
	  		<td>Unload/clean at Court
	  		<BR><?PHP echo "$uloads"; echo "-"; echo "$uloade"; ?></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="<?PHP echo "$i";?>_load"></td>
			<td><input type="checkbox" name="<?PHP echo "$i";?>_help"></td>
			<td><input type="checkbox" name="<?PHP echo "$i";?>_unload"></td>
		</tr>
		<tr>
			<td colspan=3><HR></td>
		</tr>
		<?PHP
		$i++;
	}
	?>

		<tr>
			<td><input type="text" name="email" onFocus="eCheck()" onBlur="eCheck()"	VALUE="Your e-mail address"></td>
			<td><input type="text" name="name" onFocus="nCheck()" onBlur="nCheck()" VALUE="Your Name Here"></td>
			<td><input type="text" name="tel" onFocus="tCheck()" onBlur="tCheck()"	VALUE="Your Tel:#"></td>
		</tr>
		<tr>
			<td colspan=3 align=right><input type="Submit" value="volunteer" name="volunteer"></td>
		</tr>
		</table>
	<?PHP

}

ELSE IF ($_POST['volunteer']) {

	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$tel = $_REQUEST['tel'];
	$require = $_REQUEST['require'];

	if ($name == "Your Name Here") { $name = "";}
	if ($tel == "Your Tel:#") { $tel = ""; }

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
		<a href="#" onClick="history.go(-1)">try again</a>


		<?php
	}
	else {
		$browser = $HTTP_USER_AGENT;
		$ip = $REMOTE_ADDR;

		// format message
		$message = "Hi, my name is $name, I would like to volunteer for the CatMobile. I am available for the following times:\n\n"; 
		$j=0;
		while ($j < $num) {
			$where=mysql_result($result,$j,'name');
			$str_load = $j . '_load';
			$str_help = $j . '_help';
			$str_unload = $j . '_unload';
			$j_load=$_REQUEST[$str_load];
			$j_help=$_REQUEST[$str_help];
			$j_unload=$_REQUEST[$str_unload];

			if ($j_load =='on') { $j_load = 'Yes'; }
			else $j_load = 'No';
			if ($j_help =='on') { $j_help = 'Yes'; }
			else $j_help = 'No';
			if ($j_unload =='on') { $j_unload = 'Yes'; }
			else $j_unload = 'No';
			$message .= "$where Loadup: $j_load\n";
			$message .= "At $where: $j_help\n";
			$message .= "$where Unload: $j_unload\n\n";
			$j++;
		}
		$message .= "If you have any questions, please contact me;\n";
		$message .= "Email:  $email\n";
		$message .= "Tel:  $tel\n\n";

		// send mail and print success message
		mail($recipientemail,"$subject","$message","From: $name <$email>");

		if($autoresponse == "yes") {
			$autosubject = stripslashes($autosubject);
			$automessage = stripslashes($automessage);
			mail($email,"$autosubject","$automessage","From: $recipientname <$recipientemail>");
		}

		echo "$thanks";
	}
}

?>

<H1 align=center><font face="alba matter">WWW.CAANCATMOBILE.ORG</FONT>
<center><img src="./images/logo.jpg" width="50%">

</body>
</html>