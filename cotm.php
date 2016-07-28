<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<body background="./images/background.jpg">
<H1 align=center>Cat Of The Month</H1>
<DIV STYLE="margin-left:2px; margin-right:50px; text-align:justify">
<?PHP
//Connect To Database

include ("./includes/login.php");
$id=$_GET['id'];
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
  $query = "SELECT * FROM adoptions WHERE id = '$id'";
  $result = mysql_query($query) or die (mysql_error());
  $num=mysql_numrows($result);
  mysql_close();

$j=0;
while ($j < $num) {
$id=mysql_result($result,$j,"id");
$name=mysql_result($result,$j,"name");
$age=mysql_result($result,$j,"age");
$breed=mysql_result($result,$j,"breed");
$sex=mysql_result($result,$j,"sex");
$about=mysql_result($result,$j,"about");
$j++;
}
?>
<center><div style="align:center; width:650px; height:508px; background-image:url(./images/frame.jpg)">
<H2 align=center><U><?PHP echo "$name"; ?></U></H2>
<BR>
<BR>
<img src="./images/cats/<?PHP echo "$name"; ?>.jpg" height="343">
	</div>
<table>
<tr>
  <td colspan=3>
  <br><b>Age: </b><?PHP echo $age; ?>
  <br><b>Breed: </b><?PHP echo $breed; ?>
  <br><b>Sex: </b><?PHP echo $sex; ?> 
  <br><b>About: </b><?PHP echo $about; ?></td>
</tr>
</table>
</div><P align=right><A HREF="#" onclick="javascript:window.close()">Close</A></div>