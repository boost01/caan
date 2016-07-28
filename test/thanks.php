<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head><title>Thank You</title>
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
</head>
<body>
<?php
include ("./includes/login.php");


$id=$_GET['id'];
mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname);
$query_event = "SELECT * FROM gallery_event WHERE id = '$id'";
$result_event = mysql_query($query_event) or die (mysql_error());
$num_event=mysql_numrows($result_event);
mysql_close();
$z=0;
while ($z < $num_event) {
  $thanks = mysql_result($result_event,$z,"comment");
  ?>
  <table cellpadding=0 cellspacing=0>
  <tr>
    <td CLASS="thanks_top" height="74px"><BR><BR><font face="batik regular"><center><U><B>Thank You</B></U></center></font></td>
  </tr>
    <td class="thanks_middle" width="512"><font face="batik regular"><?PHP echo "$thanks";?></font></td>
  </tr>
    <td class="thanks_bottom" height="112px"></td>
  </tr>
  </table>
  <?PHP
  $z++;
}
?>
</body></html>