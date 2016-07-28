<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<H1 align=center>C.A.A.N adoptions</H1>
<?PHP
include ("./includes/login.php");
$curYear = date("Y");
mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname);
$query = "SELECT * FROM messages WHERE page = 'adoptions'";
$query_in = "SELECT * FROM adoptions WHERE status = 'in'";
$query_out = "SELECT * FROM adoptions WHERE status = 'out' AND year = '$curYear'";
$query_fos = "SELECT * FROM adoptions WHERE status = 'fos'";
$result = mysql_query($query) or die (mysql_error());
$result_in = mysql_query($query_in) or die (mysql_error());
$result_out = mysql_query($query_out) or die (mysql_error());
$result_fos = mysql_query($query_fos) or die (mysql_error());
$num=mysql_numrows($result);
$num_in=mysql_numrows($result_in);
$num_out=mysql_numrows($result_out);
$num_fos=mysql_numrows($result_fos);
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
	++$i;
}
if ($bold=="bold") {
	$bs = "<B>";
	$be = "</B>";
}
else {
	$bs = "";
	$be = "";
}
if ($italic=="italic") {
	$is = "<i>";
	$ie = "</i>";
}
else {
	$is = "";
	$ie = "";
}
?>
<DIV STYLE="margin-left:2px; margin-right:50px; text-align:justify">
		<Font color=<?PHP echo "$color"; ?>><?PHP echo "$bs" . "$is" . "$message" . "$be" . "$ie"; ?></Font>
</div>
<?PHP
IF (!isset($_REQUEST['show'])) {
?>
	<DIV STYLE="margin-left:2px; margin-right:50px; text-align:justify">

	<P>Thanks to the support of our local community our cat adoption plan has been so successful. We have adopted out so many cats, the website admin team have had to create <A HREF="index.php?action=adoptions&show=archive">an archive</A> section to accommodate them all. Feel free to browse around.
	</div>
	<H2 align=center>Current adoptions</H2>
	<center><font color=gray size=2>Click on an image to see more details about that animal</font></center>
	<TABLE align=center cellpadding=5>
	<A NAME="pic_in">
<?PHP
	$j=0;
	$columns_in=1;
	while ($j < $num_in) {
		$id_in=mysql_result($result_in,$j,"id");
		$name_in=mysql_result($result_in,$j,"name");
		$age_in=mysql_result($result_in,$j,"age");
		$breed_in=mysql_result($result_in,$j,"breed");
		$sex_in=mysql_result($result_in,$j,"sex");
		$about_in=mysql_result($result_in,$j,"about");
		$special_in=mysql_result($result_in,$j,"special");
		if ($special_in == "y") {
			$special_in = "<br>This animal has special needs. Please contact us for more details";
		}
		else {
			$special_in = "";
		}
		if ($columns_in ==1) {
			echo "<tr valign=top>";
		}
?>
		<td><A HREF="#pic_in" onClick="javascript:unhide('<?PHP echo $id_in; ?>');"><img src="./images/cats/<?PHP echo $name_in; ?>.jpg" width="70" border=0></A></td>
			<div id='<?PHP echo $id_in; ?>' class='hidden' style="font-size: 13; text-align: justify; width:460px; margin-left: 80px; background: orange; border: 2px solid blue; padding: 5px;">
				<center><B><font size=9><?PHP echo $name_in; ?></font></B>
				<P><A HREF="javascript:unhide('<?PHP echo $id_in; ?>');"><img src="./images/cats/<?PHP echo $name_in; ?>.jpg" width="400" border=0></A></center>
				<br><b>Age: </b><?PHP echo $age_in; ?>
				<br><b>Breed: </b><?PHP echo $breed_in; ?>
				<br><b>Sex: </b><?PHP echo $sex_in; ?> 
				<br><b>About: </b><?PHP echo $about_in; ?>
				<br><?PHP echo $special_in; ?>
				<P style="text-align: center; text-size: 10px; color: gray;">Click on the picture to close
			</div>
<?PHP
		$columns_in++;
		if ($columns_in==7) {
			echo "</tr>";
	    	$columns_in = 1;
		}
		$j++;
	}
?>
	</table>



	<H2 align=center>Foster Care</H2>
	<A NAME="pic_fos">
	<center><div style="width: 500px; text-align:justify"><font size=2>Foster homes are a vital link on the journey of finding a forever home. Thank you to all our fosters.
	<br>If you are interested in finding out about our foster care team and becoming a foster home, please review the <A HREF="./docs/fostercarers.pdf" target="_blank">following info</A>. 



<?PHP
	$m=0;
	$columns_fos=1;
	if ($num_fos == "0") {
?>

<?
	}
	else {
?>
	<H2 align=center>Currently In Foster Care</H2>
	<br>The following fosters are coming up for adoption.</font></div>
	<font color=gray size=2>Click on an image to see more details about that animal</font></center>
	<TABLE align=center cellpadding=5>
<?PHP
		while ($m < $num_fos) {
			$id_fos=mysql_result($result_fos,$m,"id");
			$name_fos=mysql_result($result_fos,$m,"name");
			$age_fos=mysql_result($result_fos,$m,"age");
			$breed_fos=mysql_result($result_fos,$m,"breed");
			$sex_fos=mysql_result($result_fos,$m,"sex");
			$about_fos=mysql_result($result_fos,$m,"about");
			$special_fos=mysql_result($result_fos,$m,"special");
			if ($special_fos == "y") {
				$special_fos = "<br>This animal has special needs. Please contact us for more details";
			}	
			else {
				$special_fos = "";
			}
			if ($columns_fos ==1) {
				echo "<tr valign=top>";
			}
?>
			<td><A HREF="#pic_fos" onClick="javascript:unhide('<?PHP echo $id_fos; ?>');"><img src="./images/cats/<?PHP echo $name_fos; ?>.jpg" width="70" border=0></A></td>
			<div id='<?PHP echo $id_fos; ?>' class='hidden' style="font-size: 13; text-align: justify; width:460px; margin-left: 80px; background: orange; border: 2px solid blue; padding: 5px;">
				<center><B><font size=9><?PHP echo $name_fos; ?></font></B>
				<P><A HREF="javascript:unhide('<?PHP echo $id_fos; ?>');"><img src="./images/cats/<?PHP echo $name_fos; ?>.jpg" width="400" border=0></A></center>
				<br><b>Age: </b><?PHP echo $age_fos; ?>
				<br><b>Breed: </b><?PHP echo $breed_fos; ?>
				<br><b>Sex: </b><?PHP echo $sex_fos; ?> 
				<br><b>About: </b><?PHP echo $about_fos; ?>
				<br><?PHP echo $special_fos; ?>
				<P style="text-align: center; text-size: 10px; color: gray;">Click on the picture to close
			</div>
<?PHP
			$columns_fos++;
			if ($columns_fos==7) {
				echo "</tr>";
	    		$columns_fos = 1;
			}
			$m++;
		}
	}
?>
	</table>
	<A NAME="pic_out">


<?PHP

	if ($num_out == "0") {

	}

	else {
?>
	<H2 align=center>Recently Adopted</H2>
	<center><font color=gray size=2>Click on an image to see more details about that animal</font></center>
	<table align=center>
<?PHP
		$k=0;
		$columns_out=1;
		while ($k < $num_out) {
			$id_out=mysql_result($result_out,$k,"id");
			$name_out=mysql_result($result_out,$k,"name");
			$age_out=mysql_result($result_out,$k,"age");
			$breed_out=mysql_result($result_out,$k,"breed");
			$sex_iout=mysql_result($result_out,$k,"sex");
			$about_out=mysql_result($result_out,$k,"about");
			if ($columns_out==1) {
				echo "<tr valign=top>";
			}
?>

			<td><A HREF="#pic_out" onClick="javascript:unhide('<?PHP echo $id_out; ?>');"><img src="./images/cats/<?PHP echo $name_out; ?>.jpg" width="70" border=0></A></td>
			<div id='<?PHP echo $id_out; ?>' class='hidden' style="font-size: 12; text-align: justify; width:460px; margin-left: 80px; background: orange; border: 2px solid blue; padding: 5px">
				<center><B><font size=9><?PHP echo $name_out; ?></font></B>
				<P><A HREF="javascript:unhide('<?PHP echo $id_out; ?>');"><img src="./images/cats/<?PHP echo $name_out; ?>.jpg" width="458" border=0></A></center>
				<br><b>Age: </b><?PHP echo $age_out; ?>
				<br><b>Breed: </b><?PHP echo $breed_out; ?>
				<br><b>Sex: </b><?PHP echo $sex_out; ?> 
				<br><b>About: </b><?PHP echo $about_out; ?>
				<P style="text-align: center; text-size: 10px; color: gray;">Click on the picture to close
			</div>
<?PHP
			$columns_out++;
			if ($columns_out==7) {
				echo "</tr>";
	    		$columns_out = 1;
			}
			$k++;
		}
	}
?>
	</table>
<?PHP
}
ELSE IF ($_REQUEST['show'] == "archive") {
?>
	
	<H2 align=center>Adoptions archive</H2>
	<center><A HREF="index.php?action=adoptions">Back to the Adoptions page</A></center>
<?PHP
	$curYear = date("Y");
	mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
	mysql_select_db($dbname);
	$query = "SELECT distinct year from adoptions";
	$result = mysql_query($query) or die (mysql_error());
	$num = mysql_numrows($result);
	mysql_close();

	$l = 0;	
	while ($l < $num) {
		$year=mysql_result($result,$l,"year");
		if ($year != $curYear){
			
			echo "<BR><A HREF='index.php?action=adoptions&show=year&year=" . $year . "'>" . $year . " adoption archive</A>";

		}
		$l++;	
	}
}
ELSE IF ($_REQUEST['show'] == "year"){

	$year = $_REQUEST['year'];
	mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
	mysql_select_db($dbname);
	$query = "SELECT * FROM adoptions WHERE status = 'out' AND year = $year";
	$result = mysql_query($query) or die (mysql_error());
	$num=mysql_numrows($result);

?>
		<H2 align=center>Adopted in <?PHP echo $year; ?></H2>
		<center><A HREF="index.php?action=adoptions&show=archive">Back to the archive</A>
		<BR><font color=gray size=2>Click on an image to see more details about that animal</font></center>
		<table align=center>
<?PHP
	if ($num == "0") {
	?>
		<tr><td>No animals found good homes. in <?PHP echo $year; ?></td></tr>
	<?PHP
	}

	else {
		$n=0;
		$columns=1;
		while ($n < $num) {
			$id=mysql_result($result,$n,"id");
			$name=mysql_result($result,$n,"name");
			$age=mysql_result($result,$n,"age");
			$breed=mysql_result($result,$n,"breed");
			$sex=mysql_result($result,$n,"sex");
			$about=mysql_result($result,$n,"about");
			if ($columns==1) {
				echo "<tr valign=top>";
			}
	?>

			<td><A HREF="#pic_out" onClick="javascript:unhide('<?PHP echo $id; ?>');"><img src="./images/cats/<?PHP echo $name; ?>.jpg" width="70" border=0></A></td>
			<div id='<?PHP echo $id; ?>' class='hidden' style="font-size: 12; text-align: justify; width:460; margin-left: 80; background: orange; border: 2px solid blue;">
				<center><B><font size=9><?PHP echo $name; ?></font></B></center>
				<P><A HREF="javascript:unhide('<?PHP echo $id; ?>');"><img src="./images/cats/<?PHP echo $name; ?>.jpg" width="458" border=0></A>
				<br><b>Age: </b><?PHP echo $age; ?>
				<br><b>Breed: </b><?PHP echo $breed; ?>
				<br><b>Sex: </b><?PHP echo $sex; ?> 
				<br><b>About: </b><?PHP echo $about; ?>
				<P style="text-align: center; text-size: 10px; color: gray;">Click on the picture to close
			</div>
	<?PHP
			$columns++;
			if ($columns==7) {
				echo "</tr>";
	    		$columns = 1;
			}
			$n++;
		}
?>
		</table>
<?PHP
	}	
}