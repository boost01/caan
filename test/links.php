<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<!-- page content starts here -->
<DIV STYLE="margin-left:2px; margin-right:50px; text-align:justify">

<?php
include ("./includes/login.php");

?>

<?PHP

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
<H2 ALIGN=center>Charlie's Links</H2>
<P>
<UL>
<?PHP
$i=0;
while ($i < $num_charlie) {
  $id=mysql_result($result_charlie,$i,"id");
  $url=mysql_result($result_charlie,$i,"url");
  $link=mysql_result($result_charlie,$i,"link");
  $desc=mysql_result($result_charlie,$i,"desc");
?>
	<LI><A HREF="http://<?PHP echo "$url"; ?>"><?PHP echo "$link"; ?></a>
	<?PHP if ($desc == null) {echo "";} else {?>
		<br>&nbsp;&nbsp;&nbsp;<?PHP echo "$desc"; }?>

<?
  $i++;
}
?>
</UL>
<H2 align=center>Assistance Program's Links</h2>
<ul>
<?PHP
$j=0;
while ($j < $num_assist) {
  $id=mysql_result($result_assist,$j,"id");
  $url=mysql_result($result_assist,$j,"url");
  $link=mysql_result($result_assist,$j,"link");
  $desc=mysql_result($result_assist,$j,"desc");
?>
	<li><A HREF="http://<?PHP echo "$url"; ?>"><?PHP echo "$link"; ?></a>
	<?PHP if ($desc == null) {echo "";} else {?>
	<br>&nbsp;&nbsp;&nbsp;<?PHP echo "$desc"; }?>

<?
	$j++;
}
?>
</ul>
<H2 align=center>Humane Society's Links</H2>
<ul>
<?PHP
$k=0;
while ($k < $num_humane) {
  $id=mysql_result($result_humane,$k,"id");
  $url=mysql_result($result_humane,$k,"url");
  $link=mysql_result($result_humane,$k,"link");
  $desc=mysql_result($result_humane,$k,"desc");
?>
  <li><A HREF="http://<?PHP echo "$url"; ?>"><?PHP echo "$link"; ?></a>
	<?PHP if ($desc == null) {echo "";} else {?>
	<br>&nbsp;&nbsp;&nbsp;<?PHP echo "$desc"; }?>

<?
$k++;
}
?>
</UL>
</div>
  
<!-- page content ends here -->
</html>
