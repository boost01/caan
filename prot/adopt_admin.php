<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function textCounter(field,countfield,maxlimit) {
  if (field.value.length > maxlimit) { // if too long...trim it!
    field.value = field.value.substring(0, maxlimit);
  // otherwise, update 'characters left' counter
  }
  else {
    adoptions.remLen.value = maxlimit - field.value.length;
  }
}
function textCounter2(field,countfield,maxlimit) {
  if (field.value.length > maxlimit) { // if too long...trim it!
    field.value = field.value.substring(0, maxlimit);
  // otherwise, update 'characters left' counter
  }
  else {
    adoptions.remLen.value = maxlimit - field.value.length;
  }
}
// End -->

</script>
</head>
<body>
<?php
include ("../includes/login.php");
?>
<H1 align=center>Adoption List Admin<a href="javascript:unhide('help');"><img src="../images/db_help.png" border=0></A></H1>

<div id="help" class="hidden" style="font-size: 12; text-align: justify; width:400; margin-left: 80; background: lightblue; border: 2px solid blue;">
<center>Help!</center>
<P><img src="../images/in-out.png"> Mark the selected animal as having been adopted. If you accidently adopt out an animal, please e-mail the <a href="mailto:webmaster@caancatmobile.org?subject=Adptions help">Webmaster</A>
<P><img src="../images/db_edit.png"> Access the specific animal's details for editing.
<P><img src="../images/db_del.png"> Will immediately delete the selected animal. You will have to re-add the animal if you press this button by mistake.
<P><B>Photo</B> Select the photograph to be used for the new animal. Please make sure the image name is <I>exactly</I> the same as the animals name (including capitals and spaces)	.
<P><B>Name</B> The name of the new animal. Please make sure this is <I>exactly</I> the same as the image (including capitals and spaces).
<P><B>Age/Breed/Sex</B> Pretty obvious what this is.
<P><B>Needs</B> If the animal is a special case and has special needs, please specify here. This will indicate it if can be adopted by anyone, or will require special care and attention.
<P><B>About</B> A brief description about animal you are adding. You have 1000 characters so don't be shy about writing something nice.
<P><img src="../images/db_add.png"> Will add a new animal for adoption.
<P>Once an animal has been create you cannot change it's name or picture. If you wish to change the name or picture, please either e-mail the <a href="mailto:webmaster@caancatmobile.org?subject=Adptions help">Webmaster</A> or delete and re-add the animal.
<P>Any questions, concerns or something you are not sure about, please contact the <a href="mailto:webmaster@caancatmobile.org?subject=admin section help">Webmaster</A>
<P><a href="javascript:unhide('help');"><img src="../images/db_help.png" border=0></A>
</div>

<?PHP
IF (!isset($_REQUEST[action]))
{
	$curYear = date("Y");
	mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
	mysql_select_db($dbname);
	$query_in = "SELECT * FROM adoptions WHERE status = 'in' ORDER BY `adoptions`.`name` ASC ";
	$query_out = "SELECT * FROM adoptions WHERE status = 'out' AND year = $curYear ORDER BY `adoptions`.`name` ASC ";
	$query_fos = "SELECT * FROM adoptions WHERE status = 'fos' ORDER BY `adoptions`.`name` ASC ";
	$result_in = mysql_query($query_in) or die (mysql_error());
	$result_out = mysql_query($query_out) or die (mysql_error());
	$result_fos = mysql_query($query_fos) or die (mysql_error());

	$num_in=mysql_numrows($result_in);
	$num_out=mysql_numrows($result_out);
	$num_fos=mysql_numrows($result_fos);
	mysql_close();

?>

	<table width=500>
	<tr>
		<td colspan=6><b>Current Cats</td>
	</tr>
<?PHP  
	$j=0;
	while ($j < $num_in) {
		$id_in=mysql_result($result_in,$j,"id");
		$name_in=mysql_result($result_in,$j,"name");
		$status_in=mysql_result($result_in,$j,"status");
		$special_in=mysql_result($result_in,$j,"special");
		if ($special_in == "n") {
			$special_in = "Normal";
		}
		else if ($special_in == "y") {
			$special_in = "special";
		}
?>
		<tr>
			<td align=left><img src="../images/cats/<?PHP echo "$name_in"; ?>.jpg" width="100"></td>
			<td align=left colspan=2><B>Name:</B> <?PHP echo "$name_in"; ?>
			<br><B>Status:</B> <?PHP echo "$status_in"; ?>
			<br><B>Needs:</B> <?PHP echo "$special_in"; ?></td>
			<td><a href="index.php?type=adopt_admin&action=adopted&id=<?PHP echo "$id_in"; ?>"><img src="../images/in-out.png" alt="adopted out this animal" border=0></A></td>
			<td><a href="index.php?type=adopt_admin&action=edit&id=<?PHP echo "$id_in"; ?>"><img src="../images/db_edit.png" border=0 alt="edit this adminal"></A></td>
			<td><a href="index.php?type=adopt_admin&action=delete&id=<?PHP echo "$id_in"; ?>&name=<?PHP echo "$name_in"; ?>"><img src="../images/db_del.png" border=0 alt="delete this adminal"></A></td>
		</tr>
<?PHP
		$j++;
	}
?>
	<tr>
		<td></td>

	<tr>
		<td colspan=6><b>Foster Cats</td>
	</tr>
<?PHP
	if ($num_fos == "0") {
?>
		<tr><td colspan=5>No animals are currently in foster homes.
		</td>
<?
	}
	else {
  		$m=0;
  		while ($m < $num_fos) {
  			$id_fos=mysql_result($result_fos,$m,"id");
  			$name_fos=mysql_result($result_fos,$m,"name");
  			$status_fos=mysql_result($result_fos,$nm,"status");
  			$special_fos=mysql_result($result_fos,$m,"special");

			if ($special_fos == "n") {
				$special_fos = "Normal";
			}
			else if ($special_fos == "y") {
				$special_fos = "special";
			}
?>
  			<tr>
    			<td align=left><img src="../images/cats/<?PHP echo "$name_fos"; ?>.jpg" width="100"></td>
    			<td align=left colspan=2><B>Name:</B> <?PHP echo "$name_fos"; ?>
				<br><B>Status:</B> <?PHP echo "$status_fos"; ?>
				<br><B>Needs:</B> <?PHP echo "$special_fos"; ?></td>
				<td></td>
    			<td><a href="index.php?type=adopt_admin&action=edit&id=<?PHP echo "$id_fos"; ?>"><img src="../images/db_edit.png" border=0 alt="edit this adminal"></A></td>
    			<td><a href="index.php?type=adopt_admin&action=delete&id=<?PHP echo "$id_fos"; ?>&name=<?PHP echo "$name_fos"; ?>"><img src="../images/db_del.png" border=0 alt="delete this adminal"></A></td>
  			</tr>
<?PHP
			$m++;
  		}
	}
?>
	<tr>
		<td></td>


	<tr>
		<td colspan=6><b>Recently Adopted in <?PHP echo $curYear; ?></td>
	</tr>
<?PHP
	if ($num_out == "0") {
?>
		<tr><td colspan=5>No animals have recently found good homes.
		</td>
<?
	}
	else {
		$k=0;
		while ($k < $num_out) {
			$id_out=mysql_result($result_out,$k,"id");
			$name_out=mysql_result($result_out,$k,"name");
			$status_out=mysql_result($result_out,$k,"status");
?>  
			<tr>
				<td align=left><img src="../images/cats/<?PHP echo "$name_out"; ?>.jpg" width="100"></td>
				<td align=left colspan=2><B>Name:</B> <?PHP echo "$name_out"; ?>
				<br><B>Status:</B> <?PHP echo "$status_out"; ?></td>
				<td></td>
				<td><a href="index.php?type=adopt_admin&action=edit&id=<?PHP echo "$id_out"; ?>"><img src="../images/db_edit.png" border=0 alt="edit this event"></A></td>
				<td><a href="index.php?type=adopt_admin&action=delete&id=<?PHP echo "$id_out"; ?>&name=<?PHP echo "$name_out"; ?>"><img src="../images/db_del.png" border=0 alt="delete this adminal"></A></td>
			</tr>
<?PHP
			$k++;
		}
	}
?>
	<form name="adoptions" action="index.php?type=adopt_admin&action=add" method="post" enctype="multipart/form-data">
	<input type=hidden name=year value="<?PHP echo $curYear;?>">
	<tr>
		<td colspan=6 align=center><img src="../images/catdivider.gif"></td>
	</tr>
	<tr>
		<td colspan=6><b>Add a new animal</b><a href="#help" onClick="javascript:unhide('help');"><img src="../images/db_help.png" border=0></td>
	</tr>
	<tr>
		<td><b>Photo:</b><td colspan=5><input type="file" name="userfile" id="file">
	</tr>
	<tr>
		<td colspan=6><I>Please ensure the file name is exactly the same as the animals name
	</tr>
	<tr>
		<td><b>Name: </b><td colspan=5><input type="text" name="name">
	<tr>
		<td><b>Age: </b><td colspan=5><input type="text" name="age">
	<tr>
		<td><b>Breed: </b><td colspan=5><input type="text" name="breed">
	<tr>
		<td><b>Sex: </b><br>&nbsp;<td colspan=5><input type="radio" name="sex" value="male">Male
		<br><input type="radio" name="sex" value="female">Female
	<tr>
		<td><b>Foster Care:</b><td colspan=2><input type="radio" name="status" value="in">Not in Care
		<br><input type="radio" name="status" value="fos">In Care
	<tr>
		<td><b>Needs: </b><br>&nbsp;<td colspan=5><input type="radio" name="special" value="n" checked>Normal
		<br><input type="radio" name="special" value="y">Special
	<tr>
		<td><b>About: </b><br>&nbsp;<br>&nbsp;<td colspan=5><textarea name="about" cols=50 rows=5 onKeyDown="textCounter(this.form.about,this.form.remLen,999);" onKeyUp="textCounter(this.form.about,this.form.remLen,999);"></textarea><input type="image" src="../images/db_add.png" alt="add another animal">
		<br><input readonly type=text name=remLen size=3 maxlength=4 value="1000"> characters left</td>
	</table>
<?PHP
}

ELSE IF ($_REQUEST[action] == "edit") 
{
  $id=$_GET['id'];
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
  $query = "SELECT * FROM adoptions WHERE id='$id'";
  $result = mysql_query($query) or die (mysql_error());
  $num=mysql_numrows($result);
  mysql_close();
  
  $j=0;
  while ($j < $num)
  {
  $id=mysql_result($result,$j,"id");
  $name=mysql_result($result,$j,"name");
  $age=mysql_result($result,$j,"age");
  $breed=mysql_result($result,$j,"breed");
  $sex=mysql_result($result,$j,"sex");
  $about=mysql_result($result,$j,"about");
  $status=mysql_result($result,$j,"status");
  $special=mysql_result($result,$j,"special");
  $cotm=mysql_result($result,$j,"cotm");
// $checked = "";
if ($status == "in"){
	$status = "in";
	$fn = "checked";
}
else if ($status == "fos"){
	$status = "fos";
	$fy = "checked";
}
if ($special == "n") {
	$special = "Normal";
	$nc = "checked";
}
else if ($special == "y") {
	$special = "special";
	$sc = "checked";
}
?>
  <form name="adoptions" action="index.php?type=adopt_admin&action=update&id=<?PHP echo $id; ?>" method="post">
  <H2 align=center>Edit This Animal</H2>
  <P align=center>Any changes you make will take effect immediately.<BR><I>Press the Cancel button to exit</I>
  <table>
  <tr>
    <td colspan=3 align=center><B>Current information</B></td>
  </tr>
  <tr>
    <td><img src="../images/cats/<?PHP echo "$name"; ?>.jpg" width="100"></td>
    <td>&nbsp;</td>
    <td><B>Name: <?PHP echo "$name"; ?>
    <br><B>Age: <?PHP echo "$age"; ?>
    <br><B>Breed: <?PHP echo "$breed"; ?>
    <br><b>Sex:</b> <?PHP echo "$sex"; ?>
    <br><b>About:</b> <?PHP echo "$about"; ?>
    <br><b>Needs:</b> <?PHP echo "$special"; ?></td>
<input type='hidden' name='cotm' value='<?PHP echo "$cotm"; ?>'>
  </tr>
  <tr>
    <td colspan=3><hr></td>
  </tr>
  <tr>
  <input type="hidden" name="name" value="<?PHP echo $name; ?>">
    <td><b>Name: </b><td colspan=2><?PHP echo $name; ?>
  <tr>
    <td><b>Age: </b><td colspan=2><input type="text" name="age">
  <tr>
    <td><b>Breed: </b><td colspan=2><input type="text" name="breed">
  <tr>
    <td><b>Sex: </b><td colspan=2><input type="radio" name="sex" value="male">Male
    <br><input type="radio" name="sex" value="female">Female
  <tr>
    <td><b>About: </b><td colspan=2><textarea name="about" cols=50 rows=5 onKeyDown="textCounter(this.form.about,this.form.remLen,999);" onKeyUp="textCounter(this.form.about,this.form.remLen,999);"></textarea>
	<br><input readonly type=text name=remLen size=3 maxlength=4 value="1000"> characters left
  <tr>
	<td><b>Foster Care:</b><td colspan=2><input type="radio" name="status" value="in" <?PHP echo $fn; ?>>Not in Care
	<br><input type="radio" name="status" value="fos" <?PHP echo $fy; ?>>In Care
  <tr>
    <td><b>Needs: </b><td colspan=2><input type="radio" name="special" value="n" <?PHP echo $nc; ?>>Normal
    <br><input type="radio" name="special" value="y"<?PHP echo $sc; ?>>Special
  </tr> 
  <tr>
    <td><input type="button" value="Cancel" onClick="history.back()"></td><td></td><td><input type="Submit" value="make changes"></td>
  </tr>
  <?PHP
  $j++;
  }
}
ELSE IF ($_REQUEST[action] == "adopted")
{
  $id=$_GET['id'];
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
  $query = mysql_query("UPDATE adoptions SET status = 'out' WHERE id = '$id' LIMIT 1")
or die("Invalid query: " . mysql_error());
  mysql_close();
  echo "Great, another animal been adopted<BR><A HREF='index.php?type=adopt_admin'>Back</A>";
}

ELSE IF ($_REQUEST[action] == "update")
{
  $id=$_GET['id'];
  $name=$_REQUEST['name'];
  $age=$_REQUEST['age'];
  $breed=$_REQUEST['breed'];
  $sex=$_REQUEST['sex'];
  $about=$_REQUEST['about'];
  $status=$_REQUEST['status'];
  $special=$_REQUEST['special'];
  $cotm=$_REQUEST['cotm'];
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
  $query = mysql_query("UPDATE adoptions SET name = '$name',
age = '$age',
breed = '$breed',
sex = '$sex',
about = '$about',
status = '$status',
special = '$special',
cotm = '$cotm' WHERE id = '$id' LIMIT 1")
or die("Invalid query: " . mysql_error());
  mysql_close();
  echo "$name has been updated<BR><A HREF='index.php?type=adopt_admin'>Back</A>";
}


ELSE IF ($_REQUEST[action] == "add")
{
  $id=$_GET['id'];
  $name=$_REQUEST['name'];
  $age=$_REQUEST['age'];
  $breed=$_REQUEST['breed'];
  $sex=$_REQUEST['sex'];
  $about=$_REQUEST['about'];
  $status="in";
  $special=$_REQUEST['special'];
  $year=$_REQUEST['year'];
  chdir('../');
   // Configuration - Your Options
      $allowed_filetypes = array('.jpg','.JPG'); // These will be the types of file that will pass the validation.
      $max_filesize = 768000; // Maximum filesize in BYTES (currently 0.75MB).
      $upload_path = './images/cats/'; // The place the files will be uploaded to (currently a 'files' directory).
 
   $filename = $_FILES['userfile']['name']; // Get the name of the file (including file extension).
   $ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.
 
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
  else if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $name . ".jpg"))
  {
   

  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);     	
  $query = mysql_query("INSERT INTO adoptions VALUES ('','$name','$age','$breed','$sex','$about','$status','$special','n','$year')")
  or die("Invalid query: " . mysql_error());
  mysql_close();
  echo "$name has been created and the file uploaded.<BR><A HREF='index.php?type=adopt_admin'>Back</A><BR>";
  
  }
  else
  {
    echo 'There was an error during the file upload.  Please try again.'; // It failed :(.
  }


}
else if ($_REQUEST[action] == "delete")
{
  $id=$_GET['id'];
  $name=$_GET['name'];
  $cat= $name.".jpg";
  chdir('../images/cats/');
  $do = unlink($cat);
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
  $query = ("DELETE FROM adoptions WHERE id = '$id' LIMIT 1");
  $result = mysql_query($query);

  echo "I deleted $name. You cannot undo this change.<BR><a href='index.php?type=adopt_admin'>back</A>";


}
?>
</table>
</html>