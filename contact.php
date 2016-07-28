<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<!-- page content starts here -->
<H1 align=center>Contact Us</H1>
<DIV STYLE="margin-left:2px; margin-right:50px; text-align:justify">
<P>Here at C.A.A.N. we are always happy to hear from you. Please feel free to contact us.
<UL>
  <LI><img src="./images/email.gif"><a href="mailto:barb@caancatmobile.org?subject=From the CAAN website">Barb</A> for general questions and enquiries.
  <LI><img src="./images/email.gif"><a href="mailto:webmaster@caancatmobile.org?subject=From the CAAN website">Webmaster</A> for any questions or comments regarding the website.
</UL>
<P>Or you could always drop by and see us at one of our many <A HREF="index.php?action=catmobile">Cat<b>Mobile</b></A> events.
<table width=99%>
<?PHP
include ("./includes/login.php");


mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname);
$query = 'SELECT * FROM volunteers ORDER BY date ASC';
$result = mysql_query($query) or die (mysql_error());
$num=mysql_numrows($result);
mysql_close();

$i=0;
while ($i < $num) {
$name=mysql_result($result,$i,"name");
$place=mysql_result($result,$i,"place");
$date=mysql_result($result,$i,"date");
$theres=mysql_result($result,$i,"theres");
$theree=mysql_result($result,$i,"theree");
?>
<tr>
  <td colspan=2><B><?PHP echo "$name"; ?>:</B> <?PHP echo "$place"; ?></td>
</tr>
<tr>
  <td><?PHP echo date("l, d F", strtotime($date)); ?>, from <?PHP echo "$theres"; echo " to "; echo "$theree"; ?></td>
</tr>
<?PHP
$i++;
}
?>
</table>
</div>