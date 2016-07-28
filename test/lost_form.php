<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<script type="text/javascript" src="./includes/cal/datepickercontrol.js"></script>
<link type="text/css" rel="stylesheet" href="./includes/cal/datepickercontrol.css">
<style type="text/css">
input {
	 background-color: transparent;
}
textarea {
	 background-color: transparent;
}
</style>
<script language = "Javascript">
function echeck(str) {

	var at="@"
	var dot="."
	var lat=str.indexOf(at)
	var lstr=str.length
	var ldot=str.indexOf(dot)
	if (str.indexOf(at)==-1){
		alert("Invalid E-mail address")
		return false
	}

	if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		alert("Invalid E-mail address")
		return false
	}

	if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		alert("Invalid E-mail address")
		return false
	}

	if (str.indexOf(at,(lat+1))!=-1){
		alert("Invalid E-mail address")
		return false
	}

	if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		alert("Invalid E-mail address")
		return false
	}

	if (str.indexOf(dot,(lat+2))==-1){
		alert("Invalid E-mail address")
		return false
	}
		
	if (str.indexOf(" ")!=-1){
		alert("Invalid E-mail address")
		return false
	}

	return true					
}

function ValidateForm(){
	var emailID=document.lost_found.pemail
	var lost_found=document.lost_found.lost_found
	var aname=document.lost_found.aname
	var acolour=document.lost_found.acolour
	var date=document.lost_found.date
	var adesc=document.lost_found.adesc
	var alocal=document.lost_found.alocal
	var pname=document.lost_found.pname
	var tel1=document.lost_found.tel1
	var tel2=document.lost_found.tel2
	var tel3=document.lost_found.tel3
	valid = true; 
	
	if ((emailID.value==null)||(emailID.value=="")){
		alert("Please Enter your Email address")
//		emailID.focus()
		valid = false;
	}	
	if (echeck(emailID.value)==false){
//		emailID.value=""
//		emailID.focus()
		valid = false;
	}
	if (lost_found.value == ""){
		alert( "Please select if you have lost or found an animal");
		value = false;
	}
	if (aname.value == "") {
		alert( "Please fill in the animals Name, or enter 'unknown'");
		valid = false;
	}
	if (acolour.value == ""){
		alert("Please fill in the animals colouring");
		valid = false;
	}
	if ((date.value == "click for date - - ->")||(date.value == ""){
		alert("Please select the date the animal was lost or found");
		value = false;
	}
	if (adesc.value == ""){
		alert("Please describe the lost/found animal");
		valid = false;
	}
	if (alocal.value == ""){
		alert("Please let us know where the animal was lost/found");
		valid = false;
	}
	if (pname.value == ""){
		alert("Please tell us your name");
		valid = false;
	}
	if ((tel1.value == "")||(tel2.value == "")||(tel3.value == "")){
		alert("Please fill in your telephone number so you can be contact about this animal");
		valid = false;
	}
	
	return valid;
}
</script>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function textCounter(field,countfield,maxlimit) {
  if (field.value.length > maxlimit) { // if too long...trim it!
    field.value = field.value.substring(0, maxlimit);
  // otherwise, update 'characters left' counter
  }
  else {
    lost_found.remLen.value = maxlimit - field.value.length;
  }
}
function textCounter2(field,countfield,maxlimit) {
  if (field.value.length > maxlimit) { // if too long...trim it!
    field.value = field.value.substring(0, maxlimit);
  // otherwise, update 'characters left' counter
  }
  else {
    lost_found.remLen.value = maxlimit - field.value.length;
  }
}
// End -->

</script>
<script Language="javascript">
/* This script and many more are available free online at
The JavaScript Source!! http://javascript.internet.com
Created by: Cyanide_7 |  */
var isNN = (navigator.appName.indexOf("Netscape")!=-1);

function autoTab(input,len, e) {
  var keyCode = (isNN) ? e.which : e.keyCode; 
  var filter = (isNN) ? [0,8,9] : [0,8,9,16,17,18,37,38,39,40,46];
  if(input.value.length >= len && !containsElement(filter,keyCode)) {
    input.value = input.value.slice(0, len);
    input.form[(getIndex(input)+1) % input.form.length].focus();
  }

  function containsElement(arr, ele) {
    var found = false, index = 0;
    while(!found && index < arr.length)
    if(arr[index] == ele)
    found = true;
    else
    index++;
    return found;
  }

  function getIndex(input) {
    var index = -1, i = 0, found = false;
    while (i < input.form.length && index == -1)
    if (input.form[i] == input)index = i;
    else i++;
    return index;
  }
  return true;
}
</script>
<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
function CheckYes()
{
	if (document.lost_found.reward.value == "yes") {
    	document.lost_found.rewardd.disabled=false
  	}
	else {
		document.lost_found.rewardd.disabled=true;
	}
	if (document.lost_found.lost_found.value == "Lost") {
		document.lost_found.reward.disabled=false
	}
	else {
		document.lost_found.reward.disabled=true;
		document.lost_found.rewardd.disabled=true;
	}
}
</script>
</head>
<body onLoad="CheckYes();">
<div style=" width:550px; top=2px; margin:0px auto; text-align:left;	padding:15px;	border:1px dashed #333; background-image:url(./images/background.jpg)">
<?PHP
IF (!isset($_REQUEST['action'])) {
?>
	<table width=500>
	<form name="lost_found" action="lost_form.php?action=add" method="post" enctype="multipart/form-data" onSubmit="return ValidateForm()">
	<input type="hidden" id="DPC_TODAY_TEXT" value="today">
	<input type="hidden" id="DPC_BUTTON_TITLE" value="Open calendar...">
	<input type="hidden" id="DPC_MONTH_NAMES" value="['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']">
	<input type="hidden" id="DPC_DAY_NAMES" value="['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']">
	<input type="hidden" id="DPC_FIRST_WEEK_DAY" value="1">
	<tr>
		<td colspan=2 align=center><H2>Register a Lost/Found pet</H2></td>
	</tr>
	<tr>
		<td align=right><B>Lost or Found: </B><td>&nbsp;&nbsp;<select name="lost_found" onChange="CheckYes();">
				<option value="">
				<option value="Lost">Lost my pet
		 		<option value="Found">Found a pet</td>
	</tr>
	<tr>
		<td align=right><b>Animal Photo:</b><td>&nbsp;&nbsp;<input type="file" name="userfile" id="file"></td>
	</tr>
	<tr>
		<td align=right><b>Animal Name: </b><td>&nbsp;&nbsp;<input type="text" name="aname"></td>
	</tr>
	<tr>
		<td align=right><b>Colour: </b><td>&nbsp;&nbsp;<input type="text" name="acolour"></td>
	</tr>
	<tr>
		<td align=right><B>Date Lost/Found: </B><td>&nbsp;&nbsp;<input type="text" style="background-color:lightgrey;" id="DPC_date_YYYY-MM-DD" name="date" value="click for date - - ->"></td>
	</tr>
	<tr>
		<td align=right><B>Location Lost/Found: </B><td>&nbsp;&nbsp;<input type="text" name="alocal"></td>
	</tr>
	<tr>
		<td align=right><b>Description: </b><td>&nbsp;&nbsp;<textarea name="adesc" cols=40 rows=5 onKeyDown="textCounter(this.form.adesc,this.form.remLen,499);" onKeyUp="textCounter(this.form.adesc,this.form.remLen,499);"></textarea>
		<br>&nbsp;&nbsp;<input readonly type="text" name="remLen" size=3 maxlength=4 value="500"> characters left</td>
	</tr>
	<tr>
		<td align=right><B>Your Name: </B><td>&nbsp;&nbsp;<input type="text" name="pname">
	</tr>
	<tr>
		<td align=right><B>Your eMail: </B><td>&nbsp;&nbsp;<input type="text" name="pemail">
	</tr>
	<tr>
		<td align=right><B>Your Tel#: </B><td>&nbsp;(<input onKeyUp="return autoTab(this, 3, event);" type="text" name="tel1" size="3" namlength="3">) <input onKeyUp="return autoTab(this, 3, event);" type="text" name="tel2" size="3" namlength="3">-<input onKeyUp="return autoTab(this, 4, event);" type="text" name="tel3" size="4" namlength="4">
	</tr>
	<tr>
		<td align=right><B>Offering Reward? </B><td>&nbsp;&nbsp;<select name="reward" onChange="CheckYes();">
				<option value="yes">Yes
				<option value="no">No
			</select></td>
	</tr>
	<tr>
		<td align=right><B>Reward Value: </B><td>$<input type="text" name="rewardd"></td>
	</tr>
	<tr>
		<td align=right><input type="reset" value="Reset"></td><td>&nbsp;&nbsp;<input type="submit" value="Submit"></td>
	</table>

<?PHP
}

ELSE IF ($_REQUEST[action] == "add"){
	
	$lost_found=$_REQUEST['lost_found'];
	$aname=$_REQUEST['aname'];
	$acolour=$_REQUEST['acolour'];
	$adesc=$_REQUEST['adesc'];
	$date=$_REQUEST['date'];
	$alocal=$_REQUEST['alocal'];
	$pname=$_REQUEST['pname'];
	$tel1=$_REQUEST['tel1'];
	$tel2=$_REQUEST['tel2'];
	$tel3=$_REQUEST['tel3'];
	$pemail=$_REQUEST['pemail'];
	$reward=$_REQUEST['reward'];
	$rewardd=$_REQUEST['rewardd'];
	chdir('./');
	// Configuration - Your Options
	$allowed_filetypes = array('.jpg','.JPG'); // These will be the types of file that will pass the validation.
	$max_filesize = 500000; // Maximum filesize in BYTES (currently 0.5MB).
	$upload_path = './images/cats/lost/'; // The place the files will be uploaded to (currently a 'files' directory).
 
	$filename = $_FILES['userfile']['name']; // Get the name of the file (including file extension).
	$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.
 
	// Check if the filetype is allowed, if not DIE and inform the user.
	if(!in_array($ext,$allowed_filetypes)){
		die('The file you attempted to upload is not allowed.');
	}
 
	// Now check the filesize, if it is too large then DIE and inform the user.
	else if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize){
		die('The file you attempted to upload is too large.');
	}
	// Check if we can upload to the specified path, if not DIE and inform the user.
	else if(!is_writable($upload_path)){
		die('You cannot upload to the specified directory, please CHMOD it to 777.');
	}
	// Upload the file to your specified path.
	else if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $aname . $date . ".jpg")){
   
		include ("./includes/login.php");
		mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
		mysql_select_db($dbname);     	
		$query = mysql_query("INSERT INTO lost_found VALUES ('','$lost_found','$aname','$acolour','$adesc','$date','$alocal','$pname','$tel1','$tel2','$tel3','$pemail','$reward','$rewardd','no')")
  or die("Invalid query: " . mysql_error());
		mysql_close();
		echo "$aname has been registered and the file uploaded.<BR>We will do out best to ensure that this animal is returned home as soon as possible.<BR><A href='javascript: self.close ()'>Close this Window</A>";
  
	}
	else{
		echo 'There was an error during the file upload.  Please try again.'; // It failed :(.
	}
}

?>
</div>
