<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function textCounter(field,countfield,maxlimit) {
  if (field.value.length > maxlimit) { // if too long...trim it!
    field.value = field.value.substring(0, maxlimit);
  // otherwise, update 'characters left' counter
  }
  else {
    links.remLen.value = maxlimit - field.value.length;
  }
}
// End -->

</script>
</head>
<body>

<?php
include ("../includes/login.php");

?>
<H1 align=center>CAAN Links<a href="javascript:unhide('help');"><img src="../images/db_help.png" border=0></A></H1>

<div id="help" class="hidden" style="font-size: 12; text-align: justify; width:400; margin-left: 80; background: lightblue; border: 2px solid blue;">
<center>Help!</center>
<P><img src="../images/db_edit.png"> Access the specific link for editing.
<P><img src="../images/db_del.png"> Will immediately delete the selected link. You will have to re-add the link if you press this button by mistake.
<P><B>URL</B> Be sure to just add the bit after <i>http://</i>
<P><B>Link</B> This is the text you want to for the link, e.g. "No Kill Community"
<P><B>Category</B> There are 3 Categories to choose from
<OL><LI>Charlie's - for miscellaneous links.
	<LI>Assistance Program's - for where people can get help.
	<LI>Humane Society's - speaks for itself.
</OL>
<P><B>Description</B> A brief description about the link/website. Please keep it brief as you only have 300 characters.
<P><img src="../images/db_add.png"> Adds a new link.
	<P>Any questions, concerns or something you are not sure about, please contact the <a href="mailto:webmaster@caancatmobile.org?subject=admin section help">Webmaster</A>
<P><a href="javascript:unhide('help');"><img src="../images/db_help.png" border=0></A>
</div>
<?PHP
IF (!isset($_REQUEST[action]))
{
mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname);
$query_charlie = "SELECT * FROM links WHERE category = 'charlie'";
$query_assist = "SELECT * FROM links WHERE category = 'assist'";
$query_humane = "SELECT * FROM links WHERE category = 'humane'";
$result_charlie = mysql_query($query_charlie) or die (mysql_error());
$result_assist = mysql_query($query_assist) or die (mysql_error());
$result_humane = mysql_query($query_humane) or die (mysql_error());
$num_charlie=mysql_numrows($result_charlie);
$num_assist=mysql_numrows($result_assist);
$num_humane=mysql_numrows($result_humane);
mysql_close();
?>

  <table cellpadding=3>
	  <tr>
	    <td colspan=4><b>Current link</b></td>
	  </tr>
	<tr><td colspan=4 align=center><b>Charlie's Links
<?PHP
$i=0;
while ($i < $num_charlie) {
  $id=mysql_result($result_charlie,$i,"id");
  $link=mysql_result($result_charlie,$i,"link");
  $desc=mysql_result($result_charlie,$i,"desc");
?>
	<tr>
		<td valign=top><?PHP echo "$link"; ?></td>
		<td><?PHP echo "$desc"; ?></td>
		<td><a href="index.php?type=links_admin&action=edit&id=<?PHP echo "$id"; ?>"><img src="../images/db_edit.png" border=0 alt="edit this link"></A></td>
	    <td><a href="index.php?type=links_admin&action=delete&id=<?PHP echo "$id"; ?>"><img src="../images/db_del.png" border=0 alt="delete this link"></A></td>
	</tr>

<?
  $i++;
}

?>
	<tr><td colspan=4 align=center><b>Assistance Program's Links
		<?PHP
		$j=0;
		while ($j < $num_assist) {
		  $id=mysql_result($result_assist,$j,"id");
		  $link=mysql_result($result_assist,$j,"link");
		  $desc=mysql_result($result_assist,$j,"desc");
		?>
			<tr>
				<td valign=top><?PHP echo "$link"; ?></td>
				<td><?PHP echo "$desc"; ?></td>
				<td><a href="index.php?type=links_admin&action=edit&id=<?PHP echo "$id"; ?>"><img src="../images/db_edit.png" border=0 alt="edit this link"></A></td>
			    <td><a href="index.php?type=links_admin&action=delete&id=<?PHP echo "$id"; ?>"><img src="../images/db_del.png" border=0 alt="delete this link"></A></td>
			</tr>

<?
$j++;
}
?>
	<tr><td colspan=4 align=center><b>Humane Society's Links
		<?PHP
		$k=0;
		while ($k < $num_humane) {
		  $id=mysql_result($result_humane,$k,"id");
		  $link=mysql_result($result_humane,$k,"link");
		  $desc=mysql_result($result_humane,$k,"desc");
		?>
			<tr>
				<td valign=top><?PHP echo "$link"; ?></td>
				<td><?PHP echo "$desc"; ?></td>
				<td><a href="index.php?type=links_admin&action=edit&id=<?PHP echo "$id"; ?>"><img src="../images/db_edit.png" border=0 alt="edit this link"></A></td>
			    <td><a href="index.php?type=links_admin&action=delete&id=<?PHP echo "$id"; ?>"><img src="../images/db_del.png" border=0 alt="delete this link"></A></td>
			</tr>

<?
$k++;
}
?>		

	<form name="links" action="index.php?type=links_admin&action=add" method="post" enctype="multipart/form-data">
  <tr>
    <td colspan=4 align=center><img src="../images/catdivider.gif">
	</td>
  </tr>
  <tr>
    <td colspan=4><b>Add a new link</b><a href="#help" onClick="javascript:unhide('help');"><img src="../images/db_help.png" border=0></td>
  </tr>
  <tr>
	<td><b>URL:<td colspan=3><i>http://&nbsp;</i><input type="text" style="background-color: transparent;" name="url">
  </tr>	
  <tr>
	<td><b>Link:<td colspan=3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" style="background-color: transparent;" name="link">
  </tr>
  <tr>
	<td><b>Category:<td colspan=3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="category">
                  	   	<option value="charlie">Charlie's
                   		<option value="assist">Assistance
						<option value="humane">Humane Soc.
                        </select>
  <tr>
	<td><b>Description: </b><br>&nbsp;<br>&nbsp;<td colspan=3><textarea style="background-color: transparent;" name="desc" cols=40 rows=6 wrap=physical onKeyDown="textCounter(this.form.desc,this.form.remLen,299);" onKeyUp="textCounter(this.form.desc,this.form.remLen,299);"></textarea> <input type="image" src="../images/db_add.png" alt="add another link">
	<br><input readonly type=text name=remLen size=3 maxlength=3 value="300"> characters left</td>
</table>

<?PHP
}
ELSE IF ($_REQUEST[action] == "add")
{
  $id=$_GET['id'];
  $url=$_REQUEST['url'];
  $link=$_REQUEST['link'];
  $desc=$_REQUEST['desc'];
  $category=$_REQUEST['category'];
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);     	
  $query = mysql_query("INSERT INTO links VALUES ('','$url','$link','$desc','$category')")
  or die("Invalid query: " . mysql_error());
  mysql_close();
  echo "That link has been added.<BR><A HREF='index.php?type=links_admin'>Back</A><BR>";	
	
}


ELSE IF ($_REQUEST[action] == "edit") 
{
  $id=$_GET['id'];
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
  $query = "SELECT * FROM links WHERE id='$id'";
  $result = mysql_query($query) or die (mysql_error());
  $num=mysql_numrows($result);
  mysql_close();

  $i=0;
  while ($i < $num) {
  $id=mysql_result($result,$i,"id");
  $url=mysql_result($result,$i,"url");
  $link=mysql_result($result,$i,"link");
  $desc=mysql_result($result,$i,"desc");
  $category=mysql_result($result,$i,"category");
if ($category == "charlie") $category = "Charlie";
else if ($category == "assist") $category = "Assistance Program";
else if ($category == "humane") $category = "Humane Society";

?>
<form name="links" action="index.php?type=links_admin&action=update&id=<?PHP echo $id; ?>" method="post">
<H2 align=center>Edit This Link</H2>
<P align=center>Any changes you make will take effect immediately.<BR><I>Press the Cancel button to exit</I>
<BR><BR>
<table>
<tr>
	<td colspan=2 align=center><B>Current information</B></td>
</tr>
<tr>
	<td valign=top><B>URL:</B><td><?PHP echo "$url"; ?>
</tr>
<tr>
	<td valign=top><B>Link:</B><td><?PHP echo "$link"; ?></td>
</tr>
<tr>
	<td valign=top><B>Description:</B><td><?PHP echo "$desc"; ?></td>
</tr>
<tr>
	<td><B>Category:</B><td><?PHP echo "$category"; ?>'s Links</td>
  <tr>
    <td colspan=2><hr></td>
  </tr>	
	
  <tr>
	<td><b>URL:<td colspan=3><i>http://&nbsp;</i><input type="text" style="background-color: transparent;" name="url">
  </tr>	
  <tr>
	<td><b>Link:<td colspan=3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" style="background-color: transparent;" name="link">
  </tr>
  <tr>
	<td><b>Category:<td colspan=3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="category">
                  	   	<option value="charlie">Charlie's
                   		<option value="assist">Assistance
						<option value="humane">Humane Soc.
                        </select>
  <tr>
	<td><b>Description: </b><br>&nbsp;<br>&nbsp;<td colspan=3><textarea style="background-color: transparent;" name="desc" cols=40 rows=6 wrap=physical onKeyDown="textCounter(this.form.desc,this.form.remLen,299);" onKeyUp="textCounter(this.form.desc,this.form.remLen,299);"></textarea> <input type="image" src="../images/db_add.png" alt="add another link">
	<br><input readonly type=text name=remLen size=3 maxlength=3 value="300"> characters left</td>
<tr>
	 <td><input type="button" value="Cancel" onClick="history.back()"></td><td><input type="Submit" value="make changes"></td>
</tr>
<?PHP
$i++;
}
}


ELSE IF ($_REQUEST[action] == "update")
{
  $id=$_GET['id'];
  $url=$_REQUEST['url'];
  $link=$_REQUEST['link'];
  $desc=$_REQUEST['desc'];
  $category=$_REQUEST['category'];
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
$query = mysql_query("UPDATE `links` SET  `url` = '$url', `link` = '$link', `desc` = '$desc', `category` = '$category' WHERE `links`.`id` = '$id' LIMIT 1;")
  or die("Invalid query: " . mysql_error());
  mysql_close();
  echo "$link link has been updated<BR><A HREF='index.php?type=links_admin'>Back</A>";

}

ELSE IF ($_REQUEST[action] == "delete")
{
  $id=$_GET['id'];
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
  $query = ("DELETE FROM links WHERE id = '$id' LIMIT 1");
  $result = mysql_query($query);

  echo "I deleted that link. You cannot undo this change.<BR><a href='index.php?type=links_admin'>back</A>";
  
	
}