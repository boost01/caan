<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<style TYPE="text/css">
.more {
		display: none;
		border-top: 1px solid #666;
		border-bottom: 1px solid #666; }
	a.showLink, a.hideLink {
		text-decoration: none;
		color: #36f;
		padding-left: 8px;
		background: transparent url('./images/faqdown.gif') no-repeat left; }
	a.hideLink {
		background: transparent url('./images/faqup.gif') no-repeat left; }
	a.showLink:hover, a.hideLink:hover {
		border-bottom: 1px dotted #36f; }
}
</style>
<script type="text/javascript">
function showHide(shID) {
	if (document.getElementById(shID)) {
		if (document.getElementById(shID+'-show').style.display != 'none') {
			document.getElementById(shID+'-show').style.display = 'none';
			document.getElementById(shID).style.display = 'block';
		}
		else {
			document.getElementById(shID+'-show').style.display = 'inline';
			document.getElementById(shID).style.display = 'none';
		}
	}
}
</script>
</head>
<body>
<?PHP
include ("./includes/login.php");

?>
<!-- page content starts here -->
<H1 align=center>C.A.A.N. Events list</H1>
<DIV STYLE="margin-left:2px; margin-right:50px; text-align:justify">

<H2>Upcoming events</H2>
<?PHP
mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname);
$querye = 'SELECT * FROM eventlist';
$resulte = mysql_query($querye) or die (mysql_error());
$nume=mysql_numrows($resulte);
mysql_close();
if ($nume == "0")
{
	echo "We are sorry but there are currently no new events upcoming";
}
else
{
	$j=0;
	while ($j < $nume) {
		$id=mysql_result($resulte,$j,"id");
		$title=mysql_result($resulte,$j,"title");
		$desc=mysql_result($resulte,$j,"desc");
		$img=mysql_result($resulte,$j,"img");
?>
		<P><a href="#" id='<?PHP echo "$id"; ?>-show' class="showLink" onclick="showHide('<?PHP echo "$id"; ?>');return false;"><?PHP echo "$title"; ?></A>
		<div id='<?PHP echo "$id"; ?>' class="more">

<?PHP
		echo nl2br($desc);
		if ($img != ""){
			echo "<P><A HREF='./images/events/$img' target='_blank'>view poster</A>";
		}
?>
		<BR>
		<p><a href="#" id='<?PHP echo "$id"; ?>-hide' class="hideLink" onclick="showHide('<?PHP echo "$id"; ?>');return false;">Hide this event.</a></p>
		</div>
<?PHP
		$j++;
	}
}
?>
<H2>Upcoming Cat<B>MOBILE</B> outings.</H2>
<?PHP

mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname);
$query = 'SELECT * FROM volunteers ORDER BY date ASC';
$result = mysql_query($query) or die (mysql_error());
$num=mysql_numrows($result);
mysql_close();
if ($num == "0")
{
	echo"";
}
else
{
	$i=0;
	while ($i < $num) {
		$name=mysql_result($result,$i,"name");
		$place=mysql_result($result,$i,"place");
		$date=mysql_result($result,$i,"date");
		$theres=mysql_result($result,$i,"theres");
		$theree=mysql_result($result,$i,"theree");
?>

		<table width=99%>
		<tr>
  			<td colspan=2><B><?PHP echo "$name"; ?>:</B> <?PHP echo "$place"; ?></td>
		</tr>
		<tr>
  			<td><?PHP echo date("l, d F", strtotime($date)); ?>, from <?PHP echo "$theres"; echo " to "; echo "$theree"; ?></td>
		</tr>
<?PHP
		$i++;
	}
}
?>
</table>
<H2>Events Calendar</H2>
<iframe src="http://www.google.com/calendar/embed?title=C.A.A.N.%20Calendar&amp;showTabs=0&amp;showCalendars=0&amp;height=400&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=caancatmobile%40gmail.com&amp;color=%23A32929&amp;ctz=America%2FToronto" style=" border-width:0 " width="600" height="400" frameborder="0" scrolling="no"></iframe>

</div>