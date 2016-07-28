<table width=99%>
<?PHP
include ("./includes/login.php");
// $hostname='p50mysql59.secureserver.net';
// $username='caancatmobile';
// $password='NadiaCAAN1';
// $dbname='caancatmobile';
// $usertable='volunteers';

mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname);
$query = 'SELECT * FROM volunteers ORDER BY date ASC';
$result = mysql_query($query) or die (mysql_error());
$num=mysql_numrows($result);
mysql_close();

if ($num == 0) {
	echo "Sorry, we have no up-coming Cat<B>MOBILE</B> events. Please check back later";
}
else {
	$i=0;
	while ($i < $num) {
	$name=mysql_result($result,$i,"name");
	$place=mysql_result($result,$i,"place");
	$date=mysql_result($result,$i,"date");
	$theres=mysql_result($result,$i,"theres");
	$theree=mysql_result($result,$i,"theree");

?>
	<tr>
	  <td colspan=2>*<B><?PHP echo "$name"; ?></B> <?PHP echo "$place"; ?></td>
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