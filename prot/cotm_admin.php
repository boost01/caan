<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<?php
include ("../includes/login.php");

IF (!isset($_REQUEST[action]))
{
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
  $query = "SELECT * FROM adoptions WHERE status = 'in' ORDER BY `adoptions`.`name` ASC ";
  $result = mysql_query($query) or die (mysql_error());
  $num=mysql_numrows($result);
  mysql_close();

?>
<H1 align=center><I>Cat Of The Month</I> Admin<a href="javascript:unhide('help');"><img src="../images/db_help.png" border=0></A></H1>

<div id="help" class="hidden" style="font-size: 12; text-align: justify; width:400; margin-left: 80; background: lightblue; border: 2px solid blue;">
<center>Help!</center>
<P><img src="../images/db_del.png"> Will remove the <I>Cat Of The Month</I> selection from the front page of the C.A.A.N website.
<P><img src="../images/in-out.png"> Select the specific cat at <I>Cat Of The Month</I>
<P>Any questions, concerns or something you are not sure about, please contact the <a href="mailto:webmaster@caancatmobile.org?subject=admin section help">Webmaster</A>
<P><a href="javascript:unhide('help');"><img src="../images/db_help.png" border=0></A>
</div>
Remove Cat Of The Month<a href="index.php?type=cotm&action=delete&id=<?PHP echo "$id"; ?>&name=<?PHP echo "$name"; ?>"><img src="../images/db_del.png" alt="Remove Cat Of The Month" border=0></A>
<table widtn=500>
<?PHP  
  $j=0;
  while ($j < $num) {
  $id=mysql_result($result,$j,"id");
  $name=mysql_result($result,$j,"name");
  $cotm=mysql_result($result,$j,"cotm");
$select = "";
if ($cotm == "y") {
?>
<tr>
	<td>Current Cat Of The Month is <?PHP echo "$name"; ?><BR></td>
</tr>
<?PHP
}

?>
  <tr>
    <td align=left><img src="../images/cats/<?PHP echo "$name"; ?>.jpg" width="100"></td>
    <td align=left><B><?PHP echo "$name"; ?></td>
	<td><a href="index.php?type=cotm&action=update&id=<?PHP echo "$id"; ?>&name=<?PHP echo "$name"; ?>"><img src="../images/in-out.png" alt="Make this Cat Of The Month" border=0></A></td>
  </tr>

  <?PHP
  $j++;
}

  ?>
</table>
<?PHP
}
ELSE IF ($_REQUEST[action] == "update")
{
  $id=$_GET['id'];
  $name=$_GET['name'];
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
  $update = mysql_query("UPDATE adoptions SET cotm = 'n'") or die("Invalid query: " . mysql_error());
  $query = mysql_query("UPDATE adoptions SET cotm = 'y' WHERE id = '$id' LIMIT 1") or die("Invalid query: " . mysql_error());
  mysql_close();
  echo "$name has been selected at Cat Of The Month<BR><A HREF='index.php?type=cotm'>Back</A>";
}

ELSE IF ($_REQUEST[action] == "delete")
{
  $id=$_GET['id'];
  $name=$_GET['name'];
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
  $update = mysql_query("UPDATE adoptions SET cotm = 'n'") or die("Invalid query: " . mysql_error());
  mysql_close();
  echo "Cat Of The Month has been removed<BR><A HREF='index.php?type=cotm'>Back</A>";
}

?>

</html>