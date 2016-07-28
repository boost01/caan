<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <title>Community Animal Allies of Niagara</title>
<META NAME="DESCRIPTION" CONTENT="Community Animal Allies Niagara, CAAN, is a charity set up to promoting the no kill philosophy for displaced domestic animals and pets">
<META NAME="KEYWORDS" CONTENT="CAAN,C.A.A.N.,adoption,catmobie,charity,volunteer,spay,neuter,animal,cat,dog,community,allies,st catharines, niagara,canada,ontario,no kill,pets">
  <link REL="StyleSheet" HREF="http://www.caancatmobile.org/includes/style.css" TYPE="text/css">
  <link rel="icon" href="favicon.ico" type="image/x-icon"> 
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <script type="text/javascript" src="./includes/menu.js"></script>
  <script type="text/javascript" src="./includes/calendar.js"></script>
  <script type="text/javascript" src="./includes/iframe.js"></script>
  <script src="js/prototype.js" type="text/javascript"></script>
  <script src="js/scriptaculous.js?load=effects,builder" type="text/javascript"></script>

  <script type="text/javascript">
  if (navigator.appName=="Microsoft Internet Explorer")
  {
    document.write('<style>.hidden { display: none; position: absolute;}.unhidden { display: block; position: absolute;} </style>');
  }
  else
  {
    document.write('<style>.hidden { visibility: hidden; position: absolute;}.unhidden { visibility: visible; position: absolute;} </style>');
  }
  </script>

  </head>
  <body>
	<div style="margin: 0 auto; width: 800px; text-align: left;">
	<?PHP
	include ("menu.php");
	?>
	</div>
  <div style="position: relative; top: 240px; margin: 0 auto; width: 800px; text-align: left; background-image:url(http://www.caancatmobile.org/images/background.jpg)">
  
<!-- page content starts here -->

<?PHP

require('./weblog/wp-blog-header.php');
IF (!isset($_REQUEST['action']))
{
  include ("main.php");
}
ELSE IF ($_REQUEST['action'] == "about")
{
	include ("about.php");
}
ELSE IF ($_REQUEST['action'] == "adoptions")
{
	include ("adoptions.php");
}
ELSE IF ($_REQUEST['action'] == "catmobile")
{
	include ("catmobile.php");
}
ELSE IF ($_REQUEST['action'] == "charlie")
{
	include ("charlie.php");
}
ELSE IF ($_REQUEST['action'] == "feral")
{
	include ("feral.php");
}
ELSE IF ($_REQUEST['action'] == "links")
{
	include ("links.php");
}
ELSE IF ($_REQUEST['action'] == "northstar")
{
	include ("northstar.php");
}
ELSE IF ($_REQUEST['action'] == "sale")
{
	include ("sale.php");
}
ELSE IF ($_REQUEST['action'] == "spayneuter")
{
	include ("spayneuter.php");
}
ELSE IF ($_REQUEST['action'] == "gallery")
{
	include ("gallery.php");
}
ELSE IF ($_REQUEST['action'] == "contact")
{
	include ("contact.php");   	
}
ELSE IF ($_REQUEST['action'] == "gallery")
{
	include ("gallery.php");   	
}
ELSE IF ($_REQUEST['action'] == "volunteers")
{
	include ("volunteers.php");	
}
ELSE IF ($_REQUEST['action'] == "news")
{
	include ("news.php");
}
ELSE IF ($_REQUEST['action'] == "blog")
{
	include ("blog.php");
}
ELSE IF ($_REQUEST['action'] == "faq")
{
	include ("faq.php");
}
ELSE IF ($_REQUEST['action'] == "eventlist")
{
	include ("eventlist.php");
}
ELSE IF ($_REQUEST['action'] == "map")
{
	include ("map.php");
}
ELSE IF ($_REQUEST['action'] == "promotion")
{
	include ("promotion.php");
}
ELSE IF ($_REQUEST['action'] == "contest")
{
	include ("contest.php");
}
ELSE IF ($_REQUEST['action'] == "lostfound")
{
	include ("lost_found.php");
}
ELSE IF ($_REQUEST['action'] == "nokill")
{
	include ("nokill.php");
}
include ("sig.php");
?>
</div>

</body></html>