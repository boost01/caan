<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
</script>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function textCounter(field,countfield,maxlimit) {
  if (field.value.length > maxlimit) { // if too long...trim it!
    field.value = field.value.substring(0, maxlimit);
  // otherwise, update 'characters left' counter
  }
  else {
    eventlist.remLen.value = maxlimit - field.value.length;
  }
}
// End -->

</script>
</head>
<body>
<?php
include ("../includes/login.php");
?>
<H1 align=center>Event List Admin<a href="javascript:unhide('help');"><img src="../images/db_help.png" border=0></A></H1>

<div id="help" class="hidden" style="font-size: 12; text-align: justify; width:400; margin-left: 80; background: lightblue; border: 2px solid blue;">
<P><img src="../images/db_edit.png"> Access the specific event for editing.
<P><img src="../images/db_del.png"> Will immediately delete the selected event. You will have to re-add the event if you press this button by mistake.
<P><B>Poster:</B> If you have a poster for this event select it here. It has to be less than 0.75MB and a ".jpg" or ".pdf" file. If you do not have a poster, just leave this blank.
<P><B>Title:</B> A <i>brief</i> title for the event to be added. You are limited to less than 50 characters.
<P><B>Entry:</B> The details of the event to be added. You are limited to 1000 characters.

<P><a href="javascript:unhide('help');"><img src="../images/db_help.png" border=0></A>
</div>
<?PHP
IF (!isset($_REQUEST[action]))
{
	mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
	mysql_select_db($dbname);
	$querye = 'SELECT * FROM eventlist';
	$resulte = mysql_query($querye) or die (mysql_error());
	$nume=mysql_numrows($resulte);
	mysql_close();
	if ($nume == "0")
	{
		echo "We are sorry but there are currently no new events upcoming";
	}
	else
	{
		$j=0;
		while ($j < $nume) {
			$id=mysql_result($resulte,$j,"id");
			$title=mysql_result($resulte,$j,"title");
			$desc=mysql_result($resulte,$j,"desc");
			$img=mysql_result($resulte,$j,"img");
	?>
			<P><?PHP echo "$title"; ?> </A>
			<a href="index.php?type=eventlist_admin&action=edit&id=<?PHP echo "$id"; ?>" id='<?PHP echo "$id"; ?>-show'><img src="../images/db_edit.png" border=0 alt="edit this event"></A>
			<a href="index.php?type=eventlist_admin&action=delete&id=<?PHP echo "$id"; ?>" id='<?PHP echo "$id"; ?>-show'><img src="../images/db_del.png" border=0 alt="delete this event"></A>

	<?PHP
			$j++;
		}
	}
?>
	<br>
	<form name="eventlist" action="index.php?type=eventlist_admin&action=add" method="post" enctype="multipart/form-data">

	<table>
	<tr>
		<td colspan=2><b>Add a new Event</b><a href="#help" onClick="javascript:unhide('help');"><img src="../images/db_help.png" border=0></td>
	</tr>
	<tr>
		<td valign=top><b>Poster:</b><td><input type="file" name="userfile" id="file">
			<BR><font size=2>If you don't have a poster just leave this blank</font>
	</tr>
	<tr>
		<td align="right">Title:</td><td><input type="text" name="title" size="52" maxlength="45"></td>
	</tr>
	<tr>
		<td align="right" valign="top">Entry:</td><td><textarea name="desc" wrap="physical" cols=50 rows=6 onKeyDown="textCounter(this.form.desc,this.form.remLen,999);" onKeyUp="textCounter(this.form.desc,this.form.remLen,999);"></textarea>
			<br><input readonly type=text name=remLen size=3 maxlength=3 value="1000"> characters left
			<br><input type='submit' value='Add Event Entry'>
		</td>
	</tr>
	</table>
	</form>
	
<?PHP
}

IF ($_REQUEST[action] == "add")
{
	$title = $_REQUEST['title'];
    $desc = $_REQUEST['desc'];
	$img = $_FILES['userfile']['name'];
	$filerand = rand();
	mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
	mysql_select_db($dbname);
	$error_count = 0;
	
	if ($img != ""){
// Configuration - Your Options
		chdir('../');
// Configuration - Your Options
		$allowed_filetypes = array('.jpg','.JPG',".pdf"); // These will be the types of file that will pass the validation.
		$max_filesize = 768000; // Maximum filesize in BYTES (currently 0.75MB).
		$upload_path = './images/events/'; // The place the files will be uploaded to (currently a 'files' directory).

		$filename = $_FILES['userfile']['name']; // Get the name of the file (including file extension).
		$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.

		$filerand = rand() . $ext;
// Check if the filetype is allowed, if not DIE and inform the user.
		if(!in_array($ext,$allowed_filetypes)){
    		die('The file you attempted to upload is not allowed.');
		}

// Now check the filesize, if it is too large then DIE and inform the user.
		else if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize){
			die('The file you attempted to upload is too large.');
		}
// Check if we can upload to the specified path, if not DIE and inform the user.
		else if(!is_writable($upload_path)){
			die('You cannot upload to the specified directory, please CHMOD it to 777.');
		}
// Upload the file to your specified path.
		else if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filerand))
		{
// Required variables for this form
			$required_variables = Array (
					'Event Title' => $_REQUEST['title'],
					'Event Entry' => $_REQUEST['desc']);
	
// Check for empty required values
			while (@list($var, $val) = @each($required_variables))
			{
				if (empty($val))
				{
					echo ("Required Field '$var' Left Blank<BR>");
					++$error_count;
				}
			}
			if (strlen(strip_tags($_REQUEST['desc'])) < strlen($_REQUEST['desc'])) {
       			return false;
				++$error_count;
			}
			else if ( strpos($_REQUEST['desc'], "&") !== false) {
				++$error_count;
			}
			else if (strpos($_REQUEST['desc'], "http://") !== false) {
				++$error_count;
			}
				if ($error_count == 0)
				{
	    			$query = mysql_query("INSERT INTO eventlist VALUES ('','$title','$desc','$filerand')")
					or die("Invalid query: " . mysql_error());
					mysql_close();
?>
	    		<TABLE>
	    			<TR>
	    				<TD>You entered the following event:</TD>
	    			<TR>
	    				<TD><?PHP echo $title . $filerand; ?><BR>&nbsp;&nbsp;<?PHP echo nl2br($desc); ?></TD>
	    			</TR>
	    		</TABLE>
	    		<BR><a href='index.php?type=eventlist_admin'>Back</A>
<?
			}
			else
			{
				echo "Please ensure you have filled in <B>the title</B>, and entered a <B>entry</B>. I am afraid that <B>no HTML code</B> or <B>&quot;&&quot;</B> is allowed<P><A HREF='javascript:history.back();'>Please correct the above errors and then re-submit.</A><p>";
			}
		}
	}

	else {
// Required variables for this form
		$required_variables = Array (
			'Event Title' => $_REQUEST['title'],
			'Event Entry' => $_REQUEST['desc']);

// Check for empty required values
		while (@list($var, $val) = @each($required_variables))
		{
   			IF (empty($val))
			{
				echo ("Required Field '$var' Left Blank<BR>");
				++$error_count;
			}
		}
		if (strlen(strip_tags($_REQUEST['desc'])) < strlen($_REQUEST['desc'])) {
       		return false;
			++$error_count;
		}
		elseif ( strpos($_REQUEST['desc'], "&") !== false) {
			++$error_count;
		}
		elseif (strpos($_REQUEST['desc'], "http://") !== false) {
			++$error_count;
		}
		IF ($error_count == 0)
		{
	    	$query = mysql_query("INSERT INTO eventlist VALUES ('','$title','$desc','')")
			or die("Invalid query: " . mysql_error());
			mysql_close();
?>
	    	<TABLE>
	    	<TR>
	      		<TD>You entered the following event:</TD>
	    	<TR>
	    		<TD><?PHP echo $title; ?><BR>&nbsp;&nbsp;<?PHP echo nl2br($desc); ?></TD>
	    	</TR>
	    	</TABLE>
	    	<BR><A HREF='index.php'>Back</A>
<?
		}
		ELSE
		{
			echo "Please ensure you have filled in <B>the title</B>, and entered a <B>entry</B>. I am afraid that <B>no HTML code</B> or <B>&quot;&&quot;</B> is allowed<P><A HREF='javascript:history.back();'>Please correct the above errors and then re-submit.</A><p>";
		}
	}
}

ELSE IF ($_REQUEST[action] == "edit") 
{
	$id=$_GET['id'];
	mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
	mysql_select_db($dbname);
	$query = "SELECT * FROM eventlist WHERE id='$id'";
	$result = mysql_query($query) or die (mysql_error());
	$num=mysql_numrows($result);
	mysql_close();

	$i=0;
	while ($i < $num) {
		$id=mysql_result($result,$i,"id");
		$title=mysql_result($result,$i,"title");
		$desc=mysql_result($result,$i,"desc");
?>
		<H2 align=center>Edit This Event</H2>
		<P align=center>Any changes you make will take effect immediately.<BR><I>Press the Cancel button to exit</I>
		<table>
		<form name="eventlist" action="index.php?type=eventlist_admin&action=update&id=<?PHP echo $id; ?>" method="post">
		<tr>
			<td colspan=3 align=center><B>Current information</B></td>
		</tr>
		<tr>
			<td><P><?PHP echo "$title"; ?> </A>
			<P>
<?PHP
		echo nl2br($desc);

?>
		</td></tr>
		</table>

<?PHP
		$i++;
	}
?>
	<div style="width: 450">
	<form name="eventlist" action="index.php?type=eventlist_admin&action=update" method="post" enctype="multipart/form-data">

	<fieldset>
	<legend>Update this Event</legend>
	<table>
	<tr>
		<td align="right">Title:</td><td><input type="text" name="title" size="52" maxlength="45"></td>
	</tr>
	<tr>
		<td align="right">Entry:</td><td><textarea name="desc" wrap="physical" cols=50 rows=6 onKeyDown="textCounter(this.form.desc,this.form.remLen,999);" onKeyUp="textCounter(this.form.desc,this.form.remLen,999);"></textarea>
			<br><input readonly type=text name=remLen size=3 maxlength=3 value="1000"> characters left</td>
	<tr>
	    <td><input type="button" value="Cancel" onClick="history.back()"></td><td><input type="Submit" value="make changes"></td>
	 </tr>
	</table>
	</fieldset>
	</form>
	</div>
<?PHP
}

ELSE IF ($_REQUEST[action] == "update")
{
  $id=$_GET['id'];
  $title=$_REQUEST['title'];
  $desc=$_REQUEST['desc'];
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
$query = mysql_query("UPDATE `eventlist` SET  `title` = '$title', `desc` = '$desc' WHERE `eventlist`.`id` = '$id' LIMIT 1;")
  or die("Invalid query: " . mysql_error());
  mysql_close();
  echo "That event has been updated<BR><A HREF='index.php?type=eventlist_admin'>Back</A>";

}

IF ($_REQUEST['action'] == "delete")
{
	$id=$_GET['id'];
	mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
	mysql_select_db($dbname);
	$query = "SELECT * FROM eventlist WHERE id='$id'";
	$result = mysql_query($query) or die (mysql_error());
	$num=mysql_numrows($result);
	mysql_close();
	
	$k = 0;
	while ($k < $num){
		$img=mysql_result($result,$k,"img");
		$title=mysql_result($result,$k,"title");
		if ($img != ""){
			$img1 = $img;
			chdir('../images/events/');
			$do = unlink($img1);
		}
	$k++;
	}
	mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
	mysql_select_db($dbname);
	$query = ("DELETE FROM eventlist WHERE id = $id LIMIT 1");
	$result = mysql_query($query);

	echo "I deleted $title. You cannot undo this change.<BR><a href='index.php?type=eventlist_admin'>back</A>";
	
}
