<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<!-- page content starts here -->
<H1 align=center>For Sale</H1>
<DIV STYLE="margin-left:2px; margin-right:50px; text-align:justify">
<?PHP
//Connect To Database
include ("./includes/login.php");
// $hostname='p50mysql59.secureserver.net';
// $username='caancatmobile';
// $password='NadiaCAAN1';
// $dbname='caancatmobile';
// $usertable='volunteers';

  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
  $query = "SELECT * FROM messages WHERE page = 'sale'";
  $querys = "SELECT * FROM forsale";
  $result = mysql_query($query) or die (mysql_error());
  $results = mysql_query($querys) or die (mysql_error());
  $num=mysql_numrows($result);
  $nums=mysql_numrows($results);
  mysql_close();
  
$i=0;
while ($i < $num) {
$id=mysql_result($result,$i,"id");
$page=mysql_result($result,$i,"page");
$message=mysql_result($result,$i,"message");
$date=mysql_result($result,$i,"date");
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
?><Font color=<?PHP echo "$color"; ?>><?PHP echo "$bs" . "$is" . "$message" . "$be" . "$ie"; ?></Font>
<P>
<font size=2 color=darkred>Click on a picture for a larger view</font>
<table cellpadding=3 STYLE="margin-left:2px; margin-right:50px; text-align:justify">
<?PHP
$j=0;
while ($j < $nums) {
$ids=mysql_result($results,$j,"id");
$image=mysql_result($results,$j,"image");
$imgwidth=mysql_result($results,$j,"imgwidth");
$imgheight=mysql_result($results,$j,"imgheight");
$desc=mysql_result($results,$j,"desc");
$price=mysql_result($results,$j,"price");
$sale=mysql_result($results,$j,"sale");
$saleprice=mysql_result($results,$j,"saleprice");
if ($sale == "yes") {
  $ss = "<del>";
  $se = "</del>";
  $color = "red";
  $onsale = "<BR><font color=red>On Sale</font>";
}
else {
  $ss = "";
  $se = "";
  $color = "black";
  $onsale = "";
  $saleprice = "";
}

?>
<tr>
  <td align=right><A HREF="#" onClick=window.open("./images/sales/<?PHP echo $image; ?>.jpg",null,"statusbar=no,menubar=no,toolbar=no,height=<?PHP echo $imgheight; ?>,width=<?PHP echo $imgwidth; ?>")><img src=./images/sales/<?PHP echo "$image"; ?>_thumb.jpg border=0></A></td>
  <td><?PHP echo "$desc"; ?><?PHP echo "$onsale"; ?></td>
  <td><font color=<?PHP echo "$color"; ?>><?PHP echo "$ss"; ?><?php echo "$price"; ?><?PHP echo "$se"; ?></td>
  <td><?PHP echo "$saleprice"; ?></td>
</tr>
<?PHP
$j++;
}
?>
</table><A NAME="directions">
For details on how to purchase items seen here, please send us an e-mail: <A HREF="mailto:sales@caancatmobile.org?subject=website purchase">sales@caancatmobile.org</A>.</p>
</div>
<!-- page content ends here -->
</html>
