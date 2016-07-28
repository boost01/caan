<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<style type="text/css">
body {
		text-align: center; /* for IE */
}
input {
	 background-color: transparent;
}
textarea {
	 background-color: transparent;
}
</style>
<link rel="icon" href="favicon.ico" type="image/x-icon"> 
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<script type="text/javascript" src="../includes/calendar.js"></script>
<link rel="StyleSheet" HREF="./includes/note.css" TYPE="text/css">
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
<script language="JavaScript">
DatePickerControl.onSelect = function(inputid)
{
  input = document.getElementById(inputid);
  alert("Date captured: " + input.value);
}
</script>
<script type="text/javascript" src="../includes/cal/datepickercontrol.js"></script>
<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
function CheckYes()
{
	if (document.forsale.sale.value == "yes") {
    	document.forsale.saleprice.disabled=false;
  	}
	else {
		document.forsale.saleprice.disabled=true;
	}

	if (document.wishlist.same.value == "no") {
		document.wishlist.userfile.disabled=false;
	}
	else {
		document.wishlist.userfile.disabled=true;
	}
}
</script>

<link type="text/css" rel="stylesheet" href="../includes/cal/datepickercontrol.css">
</head>
<body onLoad="CheckYes();">
<div style="position: absolute; text-align:left; left=2px; top=2px;">
<b>Page Messages:</b>
<br>
<a href="index.php?type=meeting">Next meeting</A>
<br>
<a href="index.php?type=catmobile">Cat<B>MOBILE</B> page message</A>
<br>
<a href="index.php?type=sale">"For Sale" page message</A>
<br>
<a href="index.php?type=adoptions">Adoption page message</A>
<P>
<b>Other page admin:</b>
<br>
<a href="index.php?type=volunteer">Volunteer form admin</A>
<br>
<a href="index.php?type=adopt_admin">Adoptions list admin</A>
<br>
<a href="index.php?type=cotm">Cat Of The Month admin</A>
<br>
<a href="index.php?type=wishlist">Wish list admin</A>
<br>
<a href="index.php?type=sales_admin">"For Sale" items admin</A>
<br>
<a href="index.php?type=links_admin">Links admin</A>
<br>
<a href="index.php?type=lost_found_admin">Lost/Found Admin</A>
<br>
<a href="index.php?type=eventlist_admin">Event List Admin</A>
</div>
<div style=" width:550px; top:2px; margin:0px auto; text-align:left;	padding:15px;	border:1px dashed #333; background-image:url(../images/background.jpg)">
<?PHP
IF (!isset($_REQUEST[type]))
{
?>
Select one of the links on the left to edit one of the pages message, or administrate other areas of the site.
<BR>All changes are instant and cannot be un-done. If you make a mistake, oops!
<BR><img src="../images/db_edit.png" alt="edit"> is <B>edit</B>
<BR><img src="../images/db_del.png" alt="delete"> is <B>delete</B>
<BR><img src="../images/db_add.png" alt="add"> is <B>add</B>
<BR><img src="../images/db_help.png" alt="help"> is <b>help</b> I suggest reading it for an explanation of each page.
<BR>Any questions, concerns or something you are not sure about, please contact the <img src="../images/email.gif"><a href="mailto:webmaster@caancatmobile.org?subject=admin section help">Webmaster</A>
<?PHP
}
ELSE IF ($_REQUEST[type] == "volunteer")
{
	include ("volunteer_admin.php");
}
ELSE IF ($_REQUEST[type] == "meeting")
{
  include ("msg_admin.php");
}
ELSE IF ($_REQUEST[type] == "catmobile")
{
  include ("msg_admin.php");
}
ELSE IF ($_REQUEST[type] == "sale")
{
  include ("msg_admin.php");
}
ELSE IF ($_REQUEST[type] == "adoptions")
{
  include ("msg_admin.php");
}
ELSE IF ($_REQUEST[type] == "cotm")
{
  include ("cotm_admin.php");
}
ELSE IF ($_REQUEST[type] == "adopt_admin")
{
  include ("adopt_admin.php");
}
ELSE IF ($_REQUEST[type] == "sales_admin")
{
  include ("sales_admin.php");
}
ELSE IF ($_REQUEST[type] == "links_admin")
{
  include ("links_admin.php");
}
ELSE IF ($_REQUEST[type] == "wishlist")
{
	include ("wishlist_admin.php");
}
ELSE IF ($_REQUEST[type] == "lost_found_admin")
{
	include ("lost_found_admin.php");
}
ELSE IF ($_REQUEST[type] == "eventlist_admin")
{
	include ("eventlist_admin.php");
}
?>
</div>
</body>
</html>