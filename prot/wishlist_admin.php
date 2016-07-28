<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin character countdown script
function textCounter(field,countfield,maxlimit) {
  if (field.value.length > maxlimit) { // if too long...trim it!
    field.value = field.value.substring(0, maxlimit);
  // otherwise, update 'characters left' counter
  }
  else {
    wishlist.remLen.value = maxlimit - field.value.length;
  }
}
// End -->

</script>
<?PHP
IF (!isset($_REQUEST[action]))
{
?>
	<H1 align=center>Wishlist Admin<a href="javascript:unhide('help');"><img src="../images/db_help.png" border=0></A></H1>
	<div id="help" class="hidden" style="font-size: 12; text-align: justify; width:400; margin-left: 80; background: lightblue; border: 2px solid blue;">
	<center>Help!</center>
	<P><B>Same Picture?</B> If you want to keep the same image for the <i>wishlist</i> just select "Yes" and do not enter any anything for <i>Picture</i>.
	<P><B>Picture</B> The name of the picture can be anything you want. It will automatically be renamed to work on the website.
	<P><B>Needs</B> The list of items needed in the wish list have to be entered in a very specific way. You must enter everything as one line using the "," as a line separator.
	<BR>e.g.
	<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cat litter, dry cat food, wet cat food
	<br>will appear as
		<LI>cat litter
		<LI>dry cat food
		<LI>wet cat food</UL>
	<P>You have 1000 characters to enter <i>needs</i> after which you will not be able to enter any more text.
	<P><img src=../images/db_add.png> updates the wishlist.
	<P>Any questions, concerns or something you are not sure about, please contact the <a href="mailto:webmaster@caancatmobile.org?subject=admin section help">Webmaster</A>
	<P><a href="javascript:unhide('help');"><img src="../images/db_help.png" border=0></A>
	</div>
		<table width=500>
		<tr>
			<td colspan=2 ALIGN=center><B>Current Wishlist</B></td>
		</tr>
		<tr>
			<td><img src="../images/wishlist.jpg" width=200px></td>
			<td><UL>
<?PHP
			//Connect To Database
			include ("../includes/login.php");
			
			mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
			mysql_select_db($dbname);
			$query = "SELECT * FROM wishlist";
			$result = mysql_query($query) or die (mysql_error());
			$num=mysql_numrows($result);
			mysql_close();

			$i=0;
			while ($i < $num) {
				$id=mysql_result($result,$i,"id");
				$needs=mysql_result($result,$i,"needs");
				if ($needs == ""){
					echo "The list of needs is empty. No text will be displayed";
				}
				else {
					$Array = split("[,]+", $needs);
					foreach ($Array as $value)
					{
						print "<li> $value";
					}
				}
				$i++;
			}
?>
			</UL></td>
		</tr>
		</table>
		<center><img src="../images/catdivider.gif"></center>
		

		
		
		<table>
		<form name="wishlist" action="index.php?type=wishlist&action=edit" method="post" enctype="multipart/form-data">
		<tr>
			<td colspan=2><b>Edit the Wish list</b> <a href="javascript:unhide('help');"><img src="../images/db_help.png" border=0></td>
		</tr>
				<tr>
			<td><B>Same picture?: </B></td>
			<td><select name="same" onChange="CheckYes();">
		    	<option value="no">No
		    		<option value="yes">Yes
		    </select></td>
		</tr>	
		<tr>
			<td><b>Picture:</b><td><input type="file" name="userfile" id="file" style="background-color: transparent;"></td>
		</tr>
		<tr><td><b>Needs: </b><br>&nbsp;<br>&nbsp;<td><textarea name="needs" cols=50 rows=5 onKeyDown="textCounter(this.form.needs,this.form.remLen,999);" onKeyUp="textCounter(this.form.needs,this.form.remLen,999);"></textarea><input type="image" src="../images/db_add.png" alt="edit wishlist">
		<br><input readonly type=text name=remLen size=3 maxlength=4 value="1000"> characters left</td>
	  </table>
	

<?PHP
}
ELSE IF ($_REQUEST[action] == "edit")

{
	chdir('../');

	$same=$_REQUEST['same'];
	if ($same == "yes") {
		$id=$_GET['id'];
		$needs=$_REQUEST['needs'];
		include ("./includes/login.php");
		mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
		mysql_select_db($dbname);     	
		$query = mysql_query("UPDATE wishlist SET needs = '$needs' WHERE id = '1' LIMIT 1")
		or die("Invalid query: " . mysql_error());
		echo "Wishlist updated successfully.<BR><A HREF='index.php?type=wishlist'>Back</A>";
	}
	else {
	   	// Configuration - Your Options
		$allowed_filetypes = array('.jpg'); // These will be the types of file that will pass the validation.
		$max_filesize = 524288; // Maximum filesize in BYTES (currently 0.5MB).
		$upload_path = './images/'; // The place the files will be uploaded to (currently a 'files' directory).
		$filename = $_FILES['userfile']['name']; // Get the name of the file (including file extension).
		$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.

  		// Check if the filetype is allowed, if not DIE and inform the user.
		if(!in_array($ext,$allowed_filetypes)){
			die('The file you attempted to upload is not allowed.');
		}

		// Now check the filesize, if it is too large then DIE and inform the user.
		else if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
		{
			die('The file you attempted to upload is too large.');
		}
		// Check if we can upload to the specified path, if not DIE and inform the user.
		else if(!is_writable($upload_path))
		{
			die('You cannot upload to the specified directory, please CHMOD it to 777.');
		}
		// Upload the file to your specified path.
		else if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . "wishlist.jpg"))
		{
			$id=$_GET['id'];
			$needs=$_REQUEST['needs'];
			include ("./includes/login.php");
			mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
			mysql_select_db($dbname);     	
			$query = mysql_query("UPDATE wishlist SET needs = '$needs' WHERE id = '1' LIMIT 1")
				or die("Invalid query: " . mysql_error());
			echo "Wishlist updated successfully.<BR>A HREF='index.php?type=wishlist'>Back</A>";
		}
		else
		{
			echo 'There was an error during the file upload.  Please try again.'; // It failed :(.
	 		}
		}
}
?>