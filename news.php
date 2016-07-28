<H1 align=center>News</H1>
<H3 align=center><I>All your C.A.A.N. news and updates in one place</I></H3>
<DIV STYLE="margin-left:2px; margin-right:50px; text-align:justify">
<P><B><U>The C.A.A.N Connection newsletter:</B></U>
<UL>
	<LI><A HREF="./docs/CAANconnectionSummer2008.pdf">Summer 2008</A>
	<LI><A HREF="./docs/CAANconnectionFall2008.pdf">Fall 2008</A>
	<LI><A HREF="./docs/CAANconnectionSummer2009.pdf">Summer 2009</A>
	<LI><A HREF="./docs/CAANconnectionFall2009.pdf">Fall 2009</A>
	<LI><A HREF="./docs/CAANconnectionJan2010.pdf">January 2010</A>
	<LI><A HREF="./docs/CAANconnectionApr2010.pdf">April 2010</A>
	<LI><A HREF="./docs/CAANconnectionJuly2010.pdf">July 2010</A>
	<LI><A HREF="./docs/CAANconnectionOct2010.pdf">October 2010</A>
	<LI><A HREF="./docs/CAANconnectionJan2011.pdf">January 2011</A>
	<LI><A HREF="./docs/CAANconnectionMay2011.pdf">May 2011</A>
	<LI><A HREF="./docs/CAANconnectionSept2011.pdf">September 2011</A>
	<lI><A HREF="./docs/CAANconnectionJan2012.pdf">January 2012</A>
	<LI><A HREF="./docs/CAANconnectionSummer2012.pdf">Summer 2012</A>
	<LI><A HREF="./docs/CAANconnectionWinter2012.pdf">Winter 2012</A>
	<li><A HREF="./docs/CAANconnectionSummer2013.pdf">Summer 2013</A>
	<li><A HREF="./docs/CAANconnectionWinter2013.pdf">Winter 2013</A>
	<li><A HREF="./docs/CAANconnectionSummer2014.pdf">Summer 2014</A>
	<li><A HREF="./docs/CAANconnectionWinter2014.pdf">Winter 2014</A>
	<li><A HREF="./docs/CAANconnectionWinter2015.pdf">Winter 2015</A>
	<li><A HREF="./docs/CAANconnectionSummer2016.pdf">Summer 2016</A>
</UL>
<center><img src="./images/catdivider.gif"></center>
<P><B><U>C.A.A.N. on the Web:</U></B>
<UL>
	<LI><A HREF="http://www.tvcogeco.com/niagara/gallerie/keep-in-touch/1886-week-of-jan-24-2010/13014-caan">Julia's appearance on TV Cogeco</A>
	<LI><A HREF="http://www.facebook.com/group.php?gid=4290092438">Community Animal Allies of Niagara introduces the Cat-MOBILE</A> - Facebook.
	<LI><A HREF="http://stcatharines.cityguide.ca/catmobile-giving-abandoned-cats-new-homes-025159.php">CatMobile: Giving abandoned cats new homes</A> - St. Catharines City Guide.
	<LI><A HREF="http://www.standingup4stcatharines.ca/index.php?option=com_content&task=blogsection&id=7&Itemid=83&date=2009-05-01">Cat Adoption Program</A> - Rick Dykstra, MP.
	<LI><A HREF="http://www.snapstcatharines.com/display/41291/397/">Catmobile holds Adopt-a-thon</A> - Snap St. Catharines.
	<LI><A HREF="http://www.snapniagarafalls.com/display/62296/1705/">Global Pet Foods Busy October</A> - Snap St. Catharines.
	<LI><A HREF="http://www.niagarathisweek.com/website/niagarathisweek/article/194087--tigers-by-the-tail">TIGERS BY THE TAIL</A> - Niagara This Week.
	<LI><A HREF="http://www.niagarathisweek.com/news/article/185695--group-urges-no-kill-community-for-wild-cats">Group urges no-kill community for wild cats</A> - Niagara This Week.
	<LI><A HREF="http://www.niagarafallsreview.ca/ArticleDisplay.aspx?e=1703605">Abandoned felines need community help</A> - Niagara Falls Review.
</UL>

<font size=2>If you see an article relating to C.A.A.N, or the Cat<B>MOBILE</B>, please <A HREF="mailto:webmaster@caancatmobile.org?subject=CAAN in the news">e-mail me</A></font>
<center><img src="./images/catdivider.gif"></center>
<P>We now have a new <a href="./weblog">blog</A> so you can keep up to date with the exciting world of C.A.A.N. and website changes.
<center><img src="./images/catdivider.gif"></center>
<P><B><U>Message updates:</B></U>
<?PHP
//Connect To Database
include ("./includes/login.php");
// $hostname='p50mysql59.secureserver.net';
// $username='caancatmobile';
// $password='NadiaCAAN1';
// $dbname='caancatmobile';
// $usertable='volunteers';

mysql_connect($hostname, $username, $password) OR DIE ('Unable to connect to database! Please try again later.');

  mysql_select_db($dbname);
  $query = "SELECT * FROM messages";
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

	if ($page=="meeting") {
		$page = "Next Meeting";
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

	<P><b><u><?PHP echo "$page"; ?>: </b></u><Font color=<?PHP echo "$color"; ?>><?PHP echo "$bs" . "$is" . "$message" . "$be" . "$ie"; ?>
	<DIV style="text-align: right; color: black;">Last updated: <?PHP echo "$date"; ?></div></Font>
<?PHP
	++$i;
} ?>
</div>