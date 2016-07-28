<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <title>Community Animal Allies of Niagara</title>
<META NAME="DESCRIPTION" CONTENT="Community Animal Allies Niagara, CAAN, is a charity set up to promoting the no kill philosophy for displaced domestic animals and pets">
<META NAME="KEYWORDS" CONTENT="CAAN,C.A.A.N.,adoption,catmobie,charity,volunteer,spay,neuter,adminal,cat,dog,community,allies,st catharines, niagara,canada,ontario,no kill,charity,pets">
  <script type="text/javascript" src="./includes/menu.js"></script>
  <script type="text/javascript" src="./includes/calendar.js"></script>
  <script type="text/javascript" src="./includes/iframe.js"></script>
  <script type="text/javascript" src="./includes/FloatLayer.js"></script>
  <link REL="StyleSheet" HREF="./includes/style.css" TYPE="text/css">
  <link rel="icon" href="favicon.ico" type="image/x-icon"> 
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
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
<script language="javascript">
new FloatLayer('floatlayer',15,15,3);
function detach(){
	lay=document.getElementById('floatlayer');
	l=getXCoord(lay);
	t=getYCoord(lay);
	lay.style.position='absolute';
	lay.style.top=t;
	lay.style.left=l;
	getFloatLayer('floatlayer').initialize();
	alignFloatLayers();
}
</script>
  </head>
  <body onload="preloadImages();" onresize="alignFloatLayers()" onscroll="alignFloatLayers()" background="./images/background.jpg">
  
  <div style="position: absolute; left: 230px; top:2px;">
  
<!-- page content starts here -->

<?PHP
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
include ("sig.php");

?>
</div>
<div style="position: absolute; left=2px; top=2px; width=216px">
<?PHP
include ("menu.php");
?>
</div>
</body></html>