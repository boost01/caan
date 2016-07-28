<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin character countdown script
function textCounter(field,countfield,maxlimit) {
  if (field.value.length > maxlimit) { // if too long...trim it!
    field.value = field.value.substring(0, maxlimit);
  // otherwise, update 'characters left' counter
  }
  else {
    forsale.remLen.value = maxlimit - field.value.length;
  }
}
// End -->

</script>
<?php
include ("../includes/login.php");

?>
<H1 align=center>Edit Sales Items<a href="javascript:unhide('help');"><img src="../images/db_help.png" border=0></A></H1>

	<div id="help" class="hidden" style="font-size: 12; text-align: justify; width:400; margin-left: 80; background: lightblue; border: 2px solid blue;">
	<center>Help!</center>
	<P><img src="../images/db_edit.png"> Access the specific item for editing.
	<P><b>Description</B> A brief description of the product on sale. You only have 300 characters, after which you will not be able to enter any more text.
	<P><B>Price</B> The price of the product. Please do not forget to enter "$"
	<P><B>On Sale</B> If the product is on sale select yes. You will then be able to enter a sale price (including the "$"). This will show up both the normal and sale price for the item to indicate it is on sale.
	<P><B>Sale Price</B> This is the on sale price of the item.
	<P>Any questions, concerns or something you are not sure about, please contact the <a href="mailto:webmaster@caancatmobile.org?subject=admin section help">Webmaster</A>
	<P><a href="javascript:unhide('help');"><img src="../images/db_help.png" border=0></A>
	</div>
  <table cellpadding=3 width=500>
<?PHP
IF (!isset($_REQUEST[action]))
{
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
  $query = "SELECT * FROM forsale";
  $result = mysql_query($query) or die (mysql_error());
  $num=mysql_numrows($result);
  mysql_close();
  $i=0;
  while ($i < $num) {
  $id=mysql_result($result,$i,"id");
  $image=mysql_result($result,$i,"image");
  $imgwidth=mysql_result($result,$i,"imgwidth");
  $imgheight=mysql_result($result,$i,"imgheight");
  $desc=mysql_result($result,$i,"desc");
  $price=mysql_result($result,$i,"price");
  $sale=mysql_result($result,$i,"sale");
  $saleprice=mysql_result($result,$i,"saleprice");
  if ($sale == "yes") {
    $ss = "<del>";
    $se = "</del>";
    $color = "red";
    $onsale = "<BR><font color=red>On Sale</font>";
  }
  else {
    $ss = "";
    $se = "";
    $color = "black";
    $onsale = "";
  }
?>
  <tr>
    <td align=right><img src=../images/sales/<?PHP echo "$image"; ?>_thumb.jpg border=0></A></td>
    <td><?PHP echo "$desc"; ?><?PHP echo "$onsale"; ?></td>
    <td><font color=<?PHP echo "$color"; ?>><?PHP echo "$ss"; ?><?php echo "$price"; ?><?PHP echo "$se"; ?></td>
    <td><?PHP echo "$saleprice"; ?></td>
    <td><a href="index.php?type=sales_admin&action=edit&id=<?PHP echo "$id"; ?>"><img src="../images/db_edit.png" border=0 alt="edit this item">
  </tr>
  
<?PHP
  $i++;
  }
}

ELSE IF ($_REQUEST[action] == "edit") 
{
  $id=$_GET['id'];
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
  $query = "SELECT * FROM forsale WHERE id='$id'";
  $result = mysql_query($query) or die (mysql_error());
  $num=mysql_numrows($result);
  mysql_close();

  $i=0;
  while ($i < $num) {
  $id=mysql_result($result,$i,"id");
  $image=mysql_result($result,$i,"image");
  $desc=mysql_result($result,$i,"desc");
  $price=mysql_result($result,$i,"price");
  $sale=mysql_result($result,$i,"sale");
  $saleprice=mysql_result($result,$i,"saleprice");
  if ($sale == "yes") {
  $onsale = "<b>Sale Price: </b>";
  }
  else {
  $onsale = "";
  }
?>
  
  <H2 align=center>Edit This Sales Item</H2>
  <P align=center>Any changes you make will take effect immediately.<BR><I>Press the Cancel button to exit</I>
  <table>
  <form name="forsale" action="index.php?type=sales_admin&action=update&id=<?PHP echo $id; ?>" method="post">
  <tr>
    <td colspan=3 align=center><B>Current information</B></td>
  </tr>
  <tr>
    <td align=right><img src=../images/sales/<?PHP echo "$image"; ?>_thumb.jpg border=0></A></td>
    <td><b>Description: </b><?PHP echo "$desc"; ?>
    <br><b>Price: </b><font color=<?PHP echo "$color"; ?>><?PHP echo "$ss"; ?><?php echo "$price"; ?><?PHP echo "$se"; ?>
    <br><b>On Sale: </b><?PHP echo "$sale"; ?>
    <br><?PHP echo "$onsale"; ?><?PHP echo "$saleprice"; ?>
  </tr>
  <tr>
    <td colspan=3><hr></td>
  </tr>
  <tr>
    <td><b>Description: </b><td colspan=2><textarea name="desc" cols=30 onKeyDown="textCounter(this.form.desc,this.form.remLen,299);" onKeyUp="textCounter(this.form.desc,this.form.remLen,299);"></textarea>
	<br><input readonly type=text name=remLen size=3 maxlength=4 value="300"> characters left
  </tr>
  <tr>
    <td><b>Price: </b><td colspan=2><input type="text" name="price">
  </tr>
  <tr>
    <td><b>On Sale: </b><td colspan=2><select name="sale" onChange="CheckYes();">
                  	   	<option value="no">No
                    		<option value="yes">Yes
                        </select>
  </tr>
  <tr>
    <td><b>Sale Price: </b><td colspan=2><input type="text" name="saleprice">
  </tr>
  <tr>
    <td><input type="button" value="Cancel" onClick="history.back()"></td><td><input type="Submit" value="make changes"></td>
  </tr>
<?PHP
  $i++;
  }
}

ELSE IF ($_REQUEST[action] == "update")
{
  $id=$_GET['id'];
  $desc=$_REQUEST['desc'];
  $price=$_REQUEST['price'];
  $sale=$_REQUEST['sale'];
  $salseprice=$_REQUEST['saleprice'];
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
  $query = mysql_query("UPDATE `forsale` SET  `desc` = '$desc', `price` = '$price', `sale` = '$sale', `saleprice` = '$salseprice' WHERE `forsale`.`id` = '$id' LIMIT 1;")
  or die("Invalid query: " . mysql_error());
  mysql_close();
  echo "That item has been updated<BR><A HREF='index.php?type=sales_admin'>Back</A>";
}