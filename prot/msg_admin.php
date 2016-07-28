<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<?php
//Connect To Database
$type=$_GET['type'];
include ("../includes/login.php");
// $hostname='p50mysql59.secureserver.net';
// $username='caancatmobile';
// $password='NadiaCAAN1';
// $dbname='caancatmobile';
// $usertable='volunteers';
IF (!isset($_REQUEST[action]))
{
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
  $query = "SELECT * FROM messages WHERE page = '$type'";
  $result = mysql_query($query) or die (mysql_error());
  $num=mysql_numrows($result);
  mysql_close();
  
$i=0;
while ($i < $num) {
	$id=mysql_result($result,$i,"id");
	$page=mysql_result($result,$i,"page");
	$message=mysql_result($result,$i,"message");
	$bold=mysql_result($result,$i,"bold");
	$italic=mysql_result($result,$i,"italic");
	$color=mysql_result($result,$i,"color");
	++$i;
}
if ($bold=="bold") {
	$bs = "<B>";
	$be = "</B>";
}
else {
	$bs = "";
	$be = "";
};
if ($italic=="italic") {
  $is = "<i>";
	$ie = "</i>";
}
else {
	$is = "";
	$ie = "";
};
$date = date("Y-m-d");
?>
  <form name="messages" action="index.php?type=<?PHP echo $type; ?>&action=edit" method="post">
  <input type="hidden" name="id" value="<?PHP echo $id; ?>">
  <input type="hidden" name="page" value="<?PHP echo $page; ?>">
  <input type="hidden" name="date" value="<?PHP echo $date; ?>">

  <H1 align=center>Current <?PHP echo "$type"; ?> Message</font><br></H1>
<table width=500px>
<tr>
  <td align=center colspan=3>
  <?PHP
  echo  "\"<font color=\"" . "$color" . "\">" . "$is" ."$bs" . "$message" . "$be" . "$ie" . "</font>\"";
  ?>
  </td>
</tr>
<tr>
  <td colspan=3><B>New Message<B></td>
</tr>
<tr>
  <td colspan=3 align=center><textarea rows=3 cols=50 name="message"></textarea></td>
<tr>
<tr>
  <td><b>Bold: </b> <input type="checkbox" name="bold" value="bold"> <i>Italic:</i><input type="checkbox" name="italic" value="italic">
</tr>
<tr>
  <td><input type="radio" name="color" value="black" checked><font color="black">Black</font>
  <br><input type="radio" name="color" value="goldenrod"><font color="goldenrod">Goldenrod</font>
  <br><input type="radio" name="color" value="darkorange"><font color="darkorange">Dark Orange</font></td>
  <td><input type="radio" name="color" value="forestgreen"><font color="forestgreen">Forest Green</font>
  <br><input type="radio" name="color" value="blue"><font color="blue">Blue</font>
  <br><input type="radio" name="color" value="darkblue"><font color="darkblue">Dark Blue</font></td>
  <td><input type="radio" name="color" value="deeppink"><font color="deeppink">Deep Pink</font>
  <br><input type="radio" name="color" value="red"><font color="red">Red</font>
  <br><input type="radio" name="color" value="darkred"><font color="darkred">Dark Red</font></td>
</tr>
  <td><input type="button" value="Cancel" onClick="history.back()"></td><td>&nbsp;</td><td align=right><input type="Submit" value="make changes"></td>
</tr>
</table>
<?PHP
}
ELSE IF ($_REQUEST[action] == "edit")
{
  $id=$_REQUEST['id'];
  $page=$_REQUEST['page'];
  $message=$_REQUEST['message'];
  $date=$_REQUEST['date'];
  $bold=$_REQUEST['bold'];
  $italic=$_REQUEST['italic'];
  $color=$_REQUEST['color'];
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
  $query = mysql_query("UPDATE messages SET page = '$page',
date = '$date',
message = '$message',
bold='$bold',
italic = '$italic',
color = '$color' WHERE id = '$id' LIMIT 1")
or die("Invalid query: " . mysql_error());
  mysql_close();
  echo "$page message has been updated<BR><A HREF='index.php'>Back</A>";
}