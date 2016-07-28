<?PHP
header("Content-Type: application/rss+xml; charset=ISO8859-1");

$rssfeed = '<?xml version="1.0" encoding="ISO-8859-1"?>';	
$rssfeed .= '<rss version="2.0">';
$rssfeed .= '<channel>'; 
$rssfeed .= '<title>C.A.A.N News Updates</title>';  
$rssfeed .= '<link>http://www.caancatmobile.org</link>';
$rssfeed .= '<description>The C.A.A.N Catmobile new update feed</description>';
$rssfeed .= '<language>en-us</language>';
$rssfeed .= '<copyright>Copyright (c) 2010 CAANCatmobile.org</copyright>';

include ("../includes/login.php");
mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname);
$query = "SELECT * FROM blog order by id desc";
$result = mysql_query($query) or die (mysql_error());
$num = mysql_numrows($result);
mysql_close();

while ($row = mysql_fetch_array($result)) {
	extract($row);
	
	$rssfeed .= '<item>';
	$rssfeed .= '<title>' . $title . ' by ' . $user .'</title>';
	$rssfeed .= '<description>' . nl2br($desc) . '</description>';
	$rssfeed .= '<guid>http://www.caancatmobile.org/index.php?action=blog&show=entry&id=' . $id . '</guid>';
	$rssfeed .= '<link>http://www.caancatmobile.org/index.php?action=blog</link>'; 
	$rssfeed .= '<pubDate>' . date("D, d M Y H:i:s O", strtotime($date)) . '</pubDate>';
	$rssfeed .= '</item>';
}

$rssfeed .= '</channel>';
$rssfeed .= '</rss>';

echo $rssfeed;
?>