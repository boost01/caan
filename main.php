<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>

<center><P><font color=darkred>Promoting <A HREF="index.php?action=nokill">the <b>No Kill Philosophy</b></A> in Niagara</font>
<P><font size=2pt color=darkred>The mission of C.A.A.N. is driven by the simple philosophy that kindness to animals helps build a better world for us all.</FONT></center>
<H1 align=center>Our Mission:</H1>
<DIV STYLE="margin-left:2px; margin-right:50px; text-align:justify">The establishment and operation of an association of community members for the purpose of promoting <A HREF=index.php?action=nokill>the <B>no kill philosophy</B></A> for displaced domestic animals and pets owned by persons of low income in our community by supporting or providing:
<P>
<table>
<tr>
		<td colspan=2 valign=top><UL>
 				<LI>High volume low cost spay neuter programs.
 				<LI>Affordable basic veterinary care for low income pet owners and displaced domestic animals.
 				<LI>Pet adoption programs.
 				<LI>Pet retention programs.
 				<LI>Foster care programs.
 				<LI>TNR (trap neuter return) programs.
			</UL>
		</td>
	<tr>
		<td width=33%>&nbsp;</td><td align=center width=33%><img src="./images/catdivider.gif"><td align=right><A HREF="http://www.canadahelps.org/CharityProfilePage.aspx?CharityID=d99022" target="_blank"><IMG SRC="http://www.canadahelps.org/image/donateNow2e1.gif" BORDER="0" ALT="Donate Now Through CanadaHelps.org!"/></A>
	</tr>
</table>
<A HREF="https://www.facebook.com/nokillstcatharines" target=_blank><img border=0 src=./images/nksc.jpg alt="No-Kill St Catharines" align=top></A> Help save the animals, <A HREF="https://www.facebook.com/nokillstcatharines" target=_blank>see this link</A>
<br>

<table>
	<tr>
		<td width=33%>&nbsp;</td><td align=center width=33%><img src="./images/catdivider.gif"><td>&nbsp;</td>
	</tr>
</table>
<?PHP
//Connect To Database
include ("./includes/login.php");


mysql_connect($hostname, $username, $password) OR DIE ('Unable to connect to database! Please try again later.');

  mysql_select_db($dbname);
  $query = "SELECT * FROM messages WHERE page = 'meeting'";
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
?>

<P align=right><b>Next Meeting: </b><Font color=<?PHP echo "$color"; ?>><?PHP echo "$bs" . "$is" . "$message" . "$be" . "$ie"; ?></Font>

<br><A NAME="directions">
<br><A HREF="#directions" onClick=window.open("directions.html",null,"statusbar=no,menubar=no,toolbar=no,height=680,width=560")>Directions</A></p>
</div>

<a href="javascript:unhide('calendar');"><B>[show/hide] meeting calendar</B></a>
<br>
<div id="calendar" class="hidden"> 
<iframe src="http://www.google.com/calendar/embed?title=C.A.A.N.%20Calendar&amp;showTabs=0&amp;showCalendars=0&amp;height=400&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=caancatmobile%40gmail.com&amp;color=%23A32929&amp;ctz=America%2FToronto" style=" border-width:0 " width="600" height="400" frameborder="0" scrolling="no"></iframe>
</div>
<?PHP
mysql_connect($hostname, $username, $password) OR DIE ('Unable to connect to database! Please try again later.');

  mysql_select_db($dbname);
  $query = "SELECT * FROM adoptions WHERE cotm = 'y'";
  $result = mysql_query($query) or die (mysql_error());
  $num=mysql_numrows($result);
  mysql_close();
  
$j=0;
while ($j < $num) {
	$id=mysql_result($result,$j,"id");
	$name=mysql_result($result,$j,"name");
	++$j;


?>

	<H3 align=center>C.A.A.N's Cat Of The Month is <?PHP echo "$name"; ?></H3>
	<center><div style="align:center; width:323px; height:255px; background-image:url(./images/sm_frame.jpg)">
	<BR><BR><font size=1>(click in the image for more details)</font>
	<BR>
	<A HREF="#directions" onClick=window.open("cotm.php?id=<?PHP echo "$id"; ?>",null,"scrollbars=1,statusbar=no,toolbar=no,width=680,height=710")><img height=155 src="./images/cats/<?PHP echo "$name"; ?>.jpg" border=0></A>
	</div>
<?PHP

}
?>
</body>
</html>
