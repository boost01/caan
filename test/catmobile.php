<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<!-- page content starts here -->

<table STYLE="margin-left:2px; margin-right:50px; text-align:justify">
<tr>
	<td><img align=left src=images/catmobile.jpg></td><td>The Cat<B>MOBILE</B> is the first project of CAAN.
<BR>
<BR>In the Niagara Peninsula about 5,000 cats get displaced from their homes each year.  Most of these cats and kittens do not find new homes and are euthanized.
<P>CAAN promotes the no kill philosophy which does not accept euthanasia as a primary method of animal control.  
<P>The Cat<B>MOBILE</B> will function as an adoption outreach program by taking homeless cats and kittens into different communities to encourage adoptions.  It also acts as an educational ‘vehicle’ to increase public awareness and encourage public support of the <B>NO KILL PHILOSOPHY</B> in our community.</td>
	<tr>
		<td colspan=2><BR><BR>Please join us in thanking those who have already <A HREF="#" onClick=window.open("sponsors.php",null,"statusbar=no,menubar=no,toolbar=no,scrollbars=yes,height=680,width=560")>sponsored and contributed</A> to our cause.
			<P>Would you like to support the Cat<b>MOBILE</b>; be a community sponsor or host the Cat<B>MOBILE</B> in your community. To find out how, email us at <A HREF="mailto:info@caancatmobile.org">info@caancatmobile.org</A>.
		</td>
	</tr>
</table>
<DIV STYLE="margin-left:2px; margin-right:50px; text-align:justify">
<P>If you would like to volunteer to help with one of the Cat<b>MOBILE</b> outings throughout the Niagara area, <a href="javascript:unhide('volunteer');">fill out this form:</a>

<div id="volunteer" class="hidden">
<?PHP
$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
if(strpos($user_agent, 'MSIE') !== false) {
    echo '<iframe src="volunteer.php" ID="volunteer" name="volunteer" style="border:1px dashed #000000; background-color: #FFFFFF" width="600" height=850 scrolling="yes"></iframe>';
}
else {
  echo '<iframe src="volunteer.php" ID="volunteer" name="volunteer" class="autoHeight" style="border:1px dashed #000000; background-color: #FFFFFF" width="600"  scrolling="no"></iframe>';
}
?>

</div>

<center><img src="./images/catdivider.gif"></center>
<P>
<?PHP
//Connect To Database
// $type=$_GET['type'];
include ("./includes/login.php");
// $hostname='p50mysql59.secureserver.net';
// $username='caancatmobile';
// $password='NadiaCAAN1';
// $dbname='caancatmobile';
// $usertable='volunteers';

  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
  $query = "SELECT * FROM messages WHERE page = 'catmobile'";
  $result = mysql_query($query) or die (mysql_error());
  $num=mysql_numrows($result);
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
<BR>
<BR></div>
<iframe src="http://www.google.com/calendar/embed?title=C.A.A.N.%20Calendar&amp;showTabs=0&amp;showCalendars=0&amp;height=400&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=caancatmobile%40gmail.com&amp;color=%23A32929&amp;ctz=America%2FToronto" style=" border-width:0 " width="600" height="400" frameborder="0" scrolling="no"></iframe>
<!-- page content ends here -->

</html>
