<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head><title>The Blog</title>
<link rel="alternate" href="/feed/" title="My RSS feed" type="application/rss+xml">
<style TYPE="text/css">

.thanks_top {
background-image:url('./images/notepaper_top.gif');
background-repeat: no-repeat;
}
.thanks_middle {
background-image:url('./images/notepaper_tile.gif');
background-repeat: repeat-y;
}
.thanks_bottom {
background-image:url('./images/notepaper_bottom.gif');
background-repeat: no-repeat;
}
P {
  margin-left: 15px;
}
</style>
<body>
<!-- page content starts here -->
<table width=95%>
	<tr><td><H1 align=center>The C.A.A.N. Blog</H1></td></tr>
<tr><td>
<?PHP
include ("./includes/login.php");


mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname);
IF (!ISSET($_REQUEST['show']))
{
	$_REQUEST['show'] = "";

	
	mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
	mysql_select_db($dbname);
	$query = "SELECT * FROM blog ORDER BY id DESC LIMIT 0, 10";
	$result = mysql_query($query) or die (mysql_error());
	$num=mysql_numrows($result);
?>
	<table align=center cellpadding=0 cellspacing=0>
	<tr>
		<td CLASS="thanks_top" height="74px" width="512px">
	</tr>
<?PHP
	mysql_close();
	$j=0;
	while ($j < $num) {
		$id = mysql_result($result,$j,"id");
		$title=mysql_result($result,$j,"title");
		$desc=mysql_result($result,$j,"desc");
		$user=mysql_result($result,$j,"user");
		$date=mysql_result($result,$j,"date");

?>
		<tr>
			<td class="thanks_middle" width="512"><P id="P1"><b><?PHP echo $title; ?></b><font size=2> by <?PHP echo $user; ?></font></td>
		</tr>
		<tr>
			<td class="thanks_middle" width="512"><P id="P1">&nbsp;&nbsp;<?PHP echo nl2br($desc)?>
			<br>&nbsp;&nbsp;<font size=1>(<?PHP echo date("Y\/m\/d", strtotime($date)); ?>)</font>
			<br>
			<hr align=center width=300px></td>
		</tr>
<?PHP
		$j++;
	}
?>
	</tr>
		<td class="thanks_bottom" height="112px" align=right valign=top><?PHP if ($num > 9){ echo "Missing entries? <A HREF=index.php?action=blog&show=all>View all</A> or follow our RSS feed."; } else ""; ?><A HREF="./feed/"><img src="./images/rss_logo.gif" border=0></A>&nbsp;&nbsp;&nbsp;</td>
	</tr>
	</table></td></tr></table>
<?PHP
}
IF ($_REQUEST['show'] == "entry")
{
	$id=$_GET['id'];
	mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
	mysql_select_db($dbname);
	$query = "SELECT * FROM blog WHERE id = '$id'";
	$result = mysql_query($query) or die (mysql_error());
	$num=mysql_numrows($result);
?>
	<table align=center cellpadding=0 cellspacing=0>
	<tr>
		<td CLASS="thanks_top" height="74px" width="512px"></td>
	</tr>
<?PHP
	$z=0;
	while ($z < $num){
		$title=mysql_result($result,$z,"title");
		$desc=mysql_result($result,$z,"desc");
		$user=mysql_result($result,$z,"user");
		$date=mysql_result($result,$z,"date");
?>
		<tr>
			<td class="thanks_middle" width="512"><P><b><?PHP echo $title; ?></b><font size=2> by <?PHP echo $user; ?></font></td>
		</tr>
		<tr>
			<td class="thanks_middle" width="512"><P>&nbsp;&nbsp;<?PHP echo nl2br($desc)?>
			<br>&nbsp;&nbsp;<font size=1>(<?PHP echo date("Y\/m\/d", strtotime($date)); ?>)</font>
			<br><A HREF="index.php?action=blog">back to the C.A.A.N. blog</A></td>
		</tr>
<?PHP		
		$z++;	
	}
	?>
	</tr>
		<td class="thanks_bottom" height="112px" align="right"></td>
	</tr>
	</table>
	<?PHP
}
IF ($_REQUEST['show'] == "all")
{
		mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
		mysql_select_db($dbname);
		$query = "SELECT * FROM blog ORDER BY id DESC";
		$result = mysql_query($query) or die (mysql_error());
		$num=mysql_numrows($result);
	?>
		<table align=center cellpadding=0 cellspacing=0>
		<tr>
			<td CLASS="thanks_top" height="74px" width="512px">
		</tr>
	<?PHP
		mysql_close();
		$k=0;
		while ($k < $num) {
			$id = mysql_result($result,$k,"id");
			$title=mysql_result($result,$k,"title");
			$desc=mysql_result($result,$k,"desc");
			$user=mysql_result($result,$k,"user");
			$date=mysql_result($result,$k,"date");

	?>
			<tr>
				<td class="thanks_middle" width="512"><P id="P1"><b><?PHP echo $title; ?></b><font size=2> by <?PHP echo $user; ?></font></td>
			</tr>
			<tr>
				<td class="thanks_middle" width="512"><P id="P1">&nbsp;&nbsp;<?PHP echo nl2br($desc)?>
				<br>&nbsp;&nbsp;<font size=1>(<?PHP echo date("Y\/m\/d", strtotime($date)); ?>)</font>
				<br>
				<hr align=center width=300px></td>
			</tr>
	<?PHP
			$k++;
		}
	?>
		</tr>
			<td class="thanks_bottom" height="112px" align=right valign=top><A HREF="./feed/"><img src="./images/rss_logo.gif" border=0></A>&nbsp;&nbsp;&nbsp;</td>
		</tr>
		</table></td></tr></table>
	<?PHP
}
?>
