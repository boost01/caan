<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<?php

//Connect To Database
include ("../includes/login.php");
?>
<H1 align=center>Volunteer Form Edit<a href="javascript:unhide('help');"><img src="../images/db_help.png" border=0></A></H1>
<div id="help" class="hidden" style="font-size: 12; text-align: justify; width:400; margin-left: 80; background: lightblue; border: 2px solid blue;">
<center>Help!</center>
<P><img src="../images/db_edit.png"> Access the specific cat<B>MOBILE</B> event's details for editing.
<P><img src="../images/db_del.png"> Will immediately delete the selected cat<B>MOBILE</B> event. You will have to re-add the event if you press this button by mistake.
<P><B>Location Name</B> The name of where the cat<B>MOBILE</B> event is taking place. (limited to 50 characters)
<P><B>Address</B> The street address of where the cat<B>MOBILE</B> event is taking place. (limited to 50 characters)
<P><B>Date</B> Use the <img src="../includes/cal/calendar_icon.png"> button to select the desired date.
<P><B>Loadup</B> Estimated Start and End time volunteers are needed to help load up the cat<B>MOBILE</B>
<P><B>At Location</B> Estimated Start and End volunteers are needed to help at the cat<B>MOBILE</B> event.
<P><B>Unload</B> Estimated Start and End time volunteers are needed to help unload the cat<B>MOBILE</B>
<P><img src="../images/db_add.png"> Will create the new cat<B>MOBILE</B> event.
<P>Any questions, concerns or something you are not sure about, please contact the <a href="mailto:webmaster@caancatmobile.org?subject=admin section help">Webmaster</A>
<P><a href="javascript:unhide('help');"><img src="../images/db_help.png" border=0></A>
</div>
<?PHP


IF (!isset($_REQUEST[action]))
{
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
  $query = 'SELECT * FROM volunteers ORDER BY date ASC';
  $result = mysql_query($query) or die (mysql_error());
  $num=mysql_numrows($result);
  mysql_close();
  ?>


  <P align=center>Please be very careful with this page. Any changes you make will take effect immediately. If you delete an entry by mistake, you cannot un-delete it and it will have to be added back.
	<BR><BR>
  <table width=500>
  <tr>
    <td><b>Current Event</b></td><td><b>Location</b></td><td><b>Date</b></td><td></td><td></td>
  </tr>
  <tr>
    <td colspan=5><HR></td>
  </tr>
  <?PHP
  $i=0;
  while ($i < $num)
  {
    $id=mysql_result($result,$i,"id");
    $name=mysql_result($result,$i,"name");
    $place=mysql_result($result,$i,"place");
    $date=mysql_result($result,$i,"date");

    ?>
    <tr>
      <td><? echo "$name"; ?></td><td><?PHP echo "$place"; ?></td><td><?PHP echo date("l, F d", strtotime($date)); ?></td><td><a href="index.php?type=volunteer&action=edit&id=<?PHP echo "$id"; ?>"><img src="../images/db_edit.png" border=0 alt="edit this event"><td><a href="index.php?type=volunteer&action=delete&id=<?PHP echo "$id"; ?>"><img src="../images/db_del.png" border=0 alt="delete this event"></td>    </tr>
    <?PHP
    $i++;
  }
  ?>
  <form name="volunteers" action="index.php?type=volunteer&action=add" method="post">
  <input type="hidden" id="DPC_TODAY_TEXT" value="today">
  <input type="hidden" id="DPC_BUTTON_TITLE" value="Open calendar...">
  <input type="hidden" id="DPC_MONTH_NAMES" value="['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']">
  <input type="hidden" id="DPC_DAY_NAMES" value="['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']">
  <input type="hidden" id="DPC_FIRST_WEEK_DAY" value="1">
  <tr>
    <td colspan=5 align=center><img src="../images/catdivider.gif"></td>
  </tr>
  <tr>
    <td colspan=5 align=left><B>Add another Event</B><a href="#help" onClick="javascript:unhide('help');"><img src="../images/db_help.png" border=0></td>
  </tr>
  <tr>
    <td><B>Location Name:</td><td><B>Address</td><td><B>Date:</td>
  </tr>
  <tr>
    <td><input type="text" name="name"></td><td><input type="text" name="place"></td>
    <td><input type="text" style="background-color:lightgrey;" id="DPC_date_YYYY-MM-DD" name="date" value="click for date - - ->"></td>
  </tr>
  <tr>
    <td>&nbsp;</td><td><B>Start Time</td><td><B>End Time</td>
  </tr>
  <tr>
    <td>Loadup</td><td><input type="text" name="loads"></td><td><input type="text" name="loade"></td>
  </tr>
  <tr>
    <td>At Location</td><td><input type="text" name="theres"></td><td><input type="text" name="theree"></td>
  </tr>
  <tr>
    <td>Unload</td><td><input type="text" name="uloads"></td><td><input type="text" name="uloade"></td><td><input type="image" src="../images/db_add.png" alt="add another event"></td>
  </tr>
  </table>
  <?PHP
}

ELSE IF ($_REQUEST[action] == "edit") 
{
  $id=$_GET['id'];
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
  $query = "SELECT * FROM volunteers WHERE id='$id'";
  $result = mysql_query($query) or die (mysql_error());
  $num=mysql_numrows($result);
  mysql_close();
  ?>
  <form name="volunteers" action="index.php?type=volunteer&action=update&id=<?PHP echo $id; ?>" method="post">
  <input type="hidden" id="DPC_TODAY_TEXT" value="today">
  <input type="hidden" id="DPC_BUTTON_TITLE" value="Open calendar...">
  <input type="hidden" id="DPC_MONTH_NAMES" value="['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']">
  <input type="hidden" id="DPC_DAY_NAMES" value="['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']">
  <input type="hidden" id="DPC_FIRST_WEEK_DAY" value="1">
  <H1 align=center>Edit This Event</H1>
  <P align=center>Any changes you make will take effect immediately.<BR><I>Press the Cancel button to exit</I>
  <table>
  <tr>
    <td colspan=3 align=center><B>Current information</B></td>
  </tr>
  <tr>
    <td><B>Location Name:</td><td><B>Address</td><td><B>Date:</td>
  </tr>

  <?PHP
  $i=0;
  while ($i < $num)
  {
    $id=mysql_result($result,$i,"id");
    $name=mysql_result($result,$i,"name");
    $place=mysql_result($result,$i,"place");
    $date=mysql_result($result,$i,"date");
    $loads=mysql_result($result,$i,"loads");
    $loade=mysql_result($result,$i,"loade");
    $theres=mysql_result($result,$i,"theres");
    $theree=mysql_result($result,$i,"theree");
    $uloads=mysql_result($result,$i,"uloads");
    $uloade=mysql_result($result,$i,"uloade");
    ?>
    <tr>
      <td><? echo "$name"; ?></td><td><?PHP echo "$place"; ?></td><td><?PHP echo date("l, F d", strtotime($date)); ?></td>
    </tr>
    <tr>
     <td>&nbsp;</td><td><B>Start Time</td><td><B>End Time</td>
   </tr>
   <tr>
      <td>Loadup</td><td><?PHP echo "$loads"; ?></td><td><?PHP echo "$loade"; ?></td>
    </tr>
    <tr>
      <td>At Location</td><td><?PHP echo "$theres"; ?></td><td><?PHP echo "$theree"; ?></td>
    </tr>
    <tr>
      <td>Unload</td><td><?PHP echo "$uloads"; ?></td><td><?PHP echo "$uloade"; ?></td>
    </tr>
   <?PHP
    $i++;
  }
  ?>
  <tr>
    <td colspan=3 align=center></td>
  </tr>
  <tr>
      <td colspan=3 align=center><B>New Information</B></td>
  </tr>
  <tr>
    <td><B>Location Name:</td><td><B>Address</td><td><B>Date:</td>
  </tr>
  <tr>
    <td><input type="text" name="name"></td><td><input type="text" name="place"></td>
    <td><input type="text" style="background-color:lightgray;" id="DPC_date_YYYY-MM-DD" name="date" value="click for date - - ->"></td>
  </tr>
  <tr>
    <td>&nbsp;</td><td><B>Start Time</td><td><B>End Time</td>
  </tr>
  <tr>
    <td>Loadup</td><td><input type="text" name="loads"></td><td><input type="text" name="loade"></td>
  </tr>
  <tr>
    <td>At Location</td><td><input type="text" name="theres"></td><td><input type="text" name="theree"></td>
  </tr>
  <tr>
    <td>Unload</td><td><input type="text" name="uloads"></td><td><input type="text" name="uloade"></td>
  </tr>
  <tr>
    <td><input type="button" value="Cancel" onClick="history.back()"></td><td></td><td><input type="Submit" value="make changes"></td>
  </tr>
  </table>
  <?PHP
}
ELSE IF ($_REQUEST[action] == "update")
{
  $id=$_GET['id'];
  $name=$_REQUEST['name'];
  $place=$_REQUEST['place'];
  $date=$_REQUEST['date'];
  $loads=$_REQUEST['loads'];
  $loade=$_REQUEST['loade'];
  $theres=$_REQUEST['theres'];
  $theree=$_REQUEST['theree'];
  $uloads=$_REQUEST['uloads'];
  $uloade=$_REQUEST['uloade'];
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
  $query = mysql_query("UPDATE volunteers SET name = '$name',
place = '$place',
date = '$date',
loads = '$loads',
loade = '$loade',
theres = '$theres',
theree = '$theree',
uloads = '$uloads',
uloade = '$uloade' WHERE id = '$id' LIMIT 1")
or die("Invalid query: " . mysql_error());
  mysql_close();
  echo "$name has been updated<BR><A HREF='index.php?type=volunteer'>Back</A>";
}

ELSE IF ($_REQUEST[action] == "add")
{
  $id=$_GET['id'];
  $name=$_REQUEST['name'];
  $place=$_REQUEST['place'];
  $date=$_REQUEST['date'];
  $loads=$_REQUEST['loads'];
  $loade=$_REQUEST['loade'];
  $theres=$_REQUEST['theres'];
  $theree=$_REQUEST['theree'];
  $uloads=$_REQUEST['uloads'];
  $uloade=$_REQUEST['uloade'];
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);     	
  $query = mysql_query("INSERT INTO volunteers VALUES ('','$name','$place','$date','$loads','$loade','$theres','$theree','$uloads','$uloade')")
  or die("Invalid query: " . mysql_error());
  mysql_close();
  echo "$name has been created<BR><A HREF='index.php?type=volunteer'>Back</A>";
}

else if ($_REQUEST[action] == "delete")
{
  $id=$_GET['id'];
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
  $query = ("DELETE FROM volunteers WHERE id = '$id' LIMIT 1");
  $result = mysql_query($query);

  echo "I deleted that entry. You cannot undo this change.<BR><a href='index.php?type=volunteer'>back</A>";
}
?>
</html>