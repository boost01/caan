<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<?php

//Connect To Database
include ("../includes/login.php");
?>
<H1 align=center>Lost/Found Animals Admin<a href="javascript:unhide('help');"><img src="../images/db_help.png" border=0></A></H1>
<div id="help" class="hidden" style="font-size: 12; text-align: justify; width:400; margin-left: 80; background: lightblue; border: 2px solid blue;">
<center>Help!</center>
<P><img src="../images/in-out.png"> Mark the selected animal as having been authorised to appear on the Lost/Found page. If you accidently authorised an animal, please e-mail the <a href="mailto:webmaster@caancatmobile.org?subject=Lost/Found help">Webmaster</A>
<P><img src="../images/db_edit.png"> If the pet is awaiting authorisation this will allow access the specific animal's details for viewing before authorising.
<BR>If the pet is already authorised and appears on the C.A.A.N. lost/found page, this allows it to be marked as recoverd to owner.
<P><img src="../images/db_del.png"> Will immediately delete the selected animal. You will have to re-add the animal if you press this button by mistake.
<P>Any questions, concerns or something you are not sure about, please contact the <a href="mailto:webmaster@caancatmobile.org?subject=admin section help">Webmaster</A>

<P><a href="javascript:unhide('help');"><img src="../images/db_help.png" border=0></A>
</div>
<?PHP
IF (!isset($_REQUEST[action])){
	mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
	mysql_select_db($dbname);
	$query_yes = "SELECT * FROM lost_found WHERE verified = 'yes' and lost_found != 'recovered' ORDER BY `lost_found`.`aname` ASC ";
	$query_r =  "SELECT * FROM lost_found WHERE verified = 'yes' and lost_found = 'recovered' ORDER BY `lost_found`.`aname` ASC ";
	$query_no = "SELECT * FROM lost_found WHERE verified = 'no' and lost_found != 'recovered' ORDER BY `lost_found`.`aname` ASC ";
	$result_yes = mysql_query($query_yes) or die (mysql_error());
	$result_no = mysql_query($query_no) or die (mysql_error());
	$result_r = mysql_query($query_r) or die (mysql_error());
	$num_yes=mysql_numrows($result_yes);
	$num_no=mysql_numrows($result_no);
	$num_r=mysql_numrows($result_r);
	mysql_close();
?>
	<table>
	<tr>
		<td colspan=4 align=center><B>Current missing animals</B></td>
	</tr>

<?PHP

	$i=0;
	while ($i < $num_yes) {
		$id_yes=mysql_result($result_yes,$i,"id");
		$aname_yes=mysql_result($result_yes,$i,"aname");
		$date_yes=mysql_result($result_yes,$i,"date");
?>

		<tr>
			<td><img src="../images/cats/lost/<?PHP echo "$aname_yes"; echo "$date_yes"; ?>.jpg" width="100"></td>
			<td><B>Name: <?PHP echo "$aname_yes"; ?>
			<td><a href="index.php?type=lost_found_admin&action=recovery&id=<?PHP echo "$id_yes"; ?>"><img src="../images/db_edit.png" border=0 alt="edit this adminal"></A><a href="index.php?type=lost_found_admin&action=delete&id=<?PHP echo "$id_yes"; ?>&name=<?PHP echo "$aname_yes"; echo "$date_yes"; ?>"><img src="../images/db_del.png" border=0 alt="delete this adminal"></A></td>
		</tr>
<?PHP
		$i++;
	}
?>

	<tr>
		<td colspan=4 align=center><B>Animals Awaiting Authorisation</B></td>
	</tr>

<?PHP
	if ($num_no == "0"){
		echo "<tr>
			<td colspan=4 align=center>Great, we are all caught up authorising animals
			</tr>";
	}
	else {
		$j=0;
		while ($j < $num_no) {
			$id_no=mysql_result($result_no,$j,"id");
			$aname_no=mysql_result($result_no,$j,"aname");
			$date_no=mysql_result($result_no,$j,"date");
?>

			<tr>
				<td><img src="../images/cats/lost/<?PHP echo "$aname_no"; echo "$date_no"; ?>.jpg" width="100"></td>
				<td><B>Name: <?PHP echo "$aname_no"; ?>
				<td><a href="index.php?type=lost_found_admin&action=view&id=<?PHP echo "$id_no"; ?>"><img src="../images/db_edit.png" border=0 alt="edit this adminal"></A></td>
			</tr>
<?PHP
			$j++;
		}
	}
?>
	<TR><td colspan=4 align=center><B>Pets listed as recovered to owner</B></tr>
<?PHP			
	if ($num_r == "0"){
		echo "<tr><td colspan=4 align=center>No pets listed as recovered to owner
			</tr>
			";
	}
	else {
		$z=0;
		while ($z < $num_r) {
			$id_r=mysql_result($result_r,$jz,"id");
			$aname_r=mysql_result($result_r,$z,"aname");
			$date_r=mysql_result($result_r,$z,"date");
?>

			<tr>
				<td><img src="../images/cats/lost/<?PHP echo "$aname_r"; echo "$date_r"; ?>.jpg" width="100"></td>
				<td><B>Name: <?PHP echo "$aname_r"; ?><a href="index.php?type=lost_found_admin&action=delete&id=<?PHP echo "$id_r"; ?>&name=<?PHP echo "$aname_r"; echo "$date_r"; ?>"><img src="../images/db_del.png" border=0 alt="delete this adminal"></A></td>
			</tr>
<?PHP
			$z++;
		}
	}
?>
	</table>
<?PHP
}

ELSE IF ($_REQUEST[action] == "view") {
	$id=$_GET['id'];
	mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
	mysql_select_db($dbname);
	$query = "SELECT * FROM lost_found WHERE id='$id'";
	$result = mysql_query($query) or die (mysql_error());
	$num=mysql_numrows($result);
	mysql_close();
?>
	<table>
	<tr>
		<td align=center><B>Animals Awaiting Authorisation</B></td>
	</tr>
<?PHP
	$k=0;
	while ($k < $num){
		$id=mysql_result($result,$k,"id");
		$lost_found=mysql_result($result,$k,"lost_found");
		$aname=mysql_result($result,$k,"aname");
		$acolour=mysql_result($result,$k,"acolour");
		$adesc=mysql_result($result,$k,"adesc");
		$date=mysql_result($result,$k,"date");
		$alocal=mysql_result($result,$k,"alocal");
		$pname=mysql_result($result,$k,"pname");
		$tel1=mysql_result($result,$k,"tel1");
		$tel2=mysql_result($result,$k,"tel2");
		$tel3=mysql_result($result,$k,"tel3");
		$reward=mysql_result($result,$k,"reward");
		$rewardd=mysql_result($result,$k,"rewardd");
		
?>
		<tr><td><h1><?PHP echo "$lost_found"; ?></h1></td>
		</tr>
			<td><img src="../images/cats/lost/<?PHP echo "$aname"; echo "$date" ?>.jpg"></td>
		</tr>
		<tr>
			<td><B>Name: </b><?PHP echo "$aname"; ?>
			<br><B>Colour: </B><?PHP echo "$acolour"; ?>
			<br><B>Desctiption: </B><?PHP echo "$adesc"; ?>
			<br><B><?PHP echo "$lost_found"; ?>: </B><?PHP echo date("d, F, Y", strtotime($date)); echo ", " . $alocal; ?>
			<br><B>Please Call: </B><?PHP echo "$pname" . " " . "(" . "$tel1" . ")" . " $tel2" . "-" . "$tel3"; ?>
		<tr>
			<td align=right><a href="index.php?type=lost_found_admin&action=verified&id=<?PHP echo "$id"; ?>"><img src="../images/in-out.png" alt="verify this animal" border=0></a><a href="index.php?type=lost_found_admin&action=delete&id=<?PHP echo "$id"; ?>&name=<?PHP echo "$aname"; echo "$date" ?>"><img src="../images/db_del.png" border=0 alt="delete this adminal"></A></td>
		<tr>
			<td colspan=2><hr>
		</tr>

<?PHP
		$k++;
	}
?>
	<tr>
		<td><a href="index.php?type=lost_found_admin">back</A>
	</tr>
	</table>
<?PHP
}

ELSE IF ($_REQUEST[action] == "verified"){
	$id=$_GET['id'];
	mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
	mysql_select_db($dbname);
	$query = mysql_query("UPDATE lost_found SET verified = 'yes' WHERE id = '$id' LIMIT 1")
or die("Invalid query: " . mysql_error());
	mysql_close();
	echo "You have verified that this animal can appear on the Lost/Found page<BR><A HREF='index.php?type=lost_found_admin'>Back</A>";
}

ELSE IF ($_REQUEST[action] == "delete"){
	$id=$_GET['id'];
	$aname=$_GET['name'];
	$cat= $aname.".jpg";
	chdir('../images/cats/lost');
	$do = unlink($cat);
	echo $id;
	mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
	mysql_select_db($dbname);
	$query = ("DELETE FROM lost_found WHERE id = '$id' LIMIT 1");
	$result = mysql_query($query);

  	echo "I deleted $aname. You cannot undo this change.<BR><a href='index.php?type=lost_found_admin'>back</A>";


}
ELSE IF ($_REQUEST[action] == "recovery"){
	$id=$_GET['id'];
	mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
	mysql_select_db($dbname);
	$query = "SELECT * FROM lost_found WHERE id='$id'";
	$result = mysql_query($query) or die (mysql_error());
	$num=mysql_numrows($result);
	mysql_close();

	$l=0;
	while ($l < $num){
		$id=mysql_result($result,$l,"id");
		$aname=mysql_result($result,$l,"aname");
		$adesc=mysql_result($result,$l,"adesc");
		$date=mysql_result($result,$l,"date");
		$lost_foundr=mysql_result($result,$l,"lost_found");
?>
		<B>Using this form will mark the pet as recovered to owner and allow you to update the description with a story of how it was found</B>
		<form name="Recovery" action="index.php?type=lost_found_admin&action=recovered&id=<?PHP echo "$id"; ?>" method="post">
		<table>
		</tr>
			<td></td><td><img src="../images/cats/lost/<?PHP echo "$aname"; echo "$date" ?>.jpg"></td>
		</tr>
		<tr>
			<td><B>Name: </b></td><td><?PHP echo "$aname"; ?><td>
		</tr>
			<td><B>Desctiption: </B></td><td><textarea rows=4 cols=40 name="adesc"><?PHP echo "$adesc"; ?></textarea></td>
		</tr>
		<tr>
			<td><B>Recovered?</B></td>
			<td>Yes: <input type="radio" name="recovered" value="recovered">
			<BR>No: <input type="radio" name="recovered" checked value=<?PHP echo "$lost_foundr"; ?></td>
		<tr>
			<td></td><td><input type="button" value="Cancel" onClick="history.back()"><input type="Submit" value="make changes"></td>
		</tr>
		</table>
<?PHP
		

		$l++;
	}
}

ELSE IF ($_REQUEST[action] == "recovered"){
	$id=$_GET['id'];
	$adesc=$_REQUEST['adesc'];
	$recovered=$_REQUEST['recovered'];

	mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
	mysql_select_db($dbname);
	$query = mysql_query("UPDATE lost_found SET lost_found = '$recovered',
adesc = '$adesc' WHERE id = '$id' LIMIT 1")
or die ("Invalid query: " . mysql_error());
	mysql_close();
	echo "You have edited this animal and marked it as recovered to owner.<BR><A HREF='index.php?type=lost_found_admin'>Back</A>";
}