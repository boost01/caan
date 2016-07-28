<SCRIPT language="javascript">
function nCheck() {
  if (myform.name.value == "Your Name Here") myform.name.value = "";
  else if (myform.name.value == "") myform.name.value = "Your Name Here";}
function eCheck() {
  if (myform.email.value == "Your e-mail address") myform.email.value = "";
  else if (myform.email.value == "") myform.email.value = "Your e-mail address";}
</SCRIPT>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function textCounter(field,countfield,maxlimit) {
  if (field.value.length > maxlimit) { // if too long...trim it!
    field.value = field.value.substring(0, maxlimit);
  // otherwise, update 'characters left' counter
  }
  else {
    comment_add.remLen.value = maxlimit - field.value.length;
  }
}
// End -->

</script>
</head>
<body>

<?php
include ("./includes/login.php");


mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname);
IF (!ISSET($_REQUEST['show']))
{
	$_REQUEST['show'] = "";
	
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
  $query_event = "SELECT * FROM gallery_event";
  $result_event = mysql_query($query_event) or die (mysql_error());
  $num_event=mysql_numrows($result_event);



  mysql_close();
  $k=0;
  $column=1;
  ?> <H1 align=center>Photo Galleries</H1>
  <table>
  <?PHP
  while ($k < $num_event) {
    $id = mysql_result($result_event,$k,"id");
    $event = mysql_result($result_event,$k,"event");
    $date = mysql_result($result_event,$k,"date");

    if ($column==1)
    {
      echo "<tr>";
    }
    ?>
    <td valign=top align=center width="110px"><A HREF="index.php?action=gallery&show=event&id=<?PHP echo $id; ?>"><img src="./images/photo.gif" border=0></A>
    <BR><A HREF="index.php?action=gallery&show=event&id=<?PHP echo $id; ?>"><?PHP echo "$event"; ?></A>
    <BR><font size=1>(<?PHP echo date("Y\/m\/d", strtotime($date)); ?>)</font></td>
    <?PHP
    $column++;
    if ($column==6)
    {
      echo "</tr>";
      $column=1;
    }  
    $k++;
  }
  ?>
  </table>
  <H1 align=center>Video Galleries</H1>
  <table>
  <tr>
	<td valign=top align=center width="110px"><A HREF="http://www.youtube.com/watch?v=-4vf2rVL2sU" target=_blank><img src="./images/video.gif" border=0></A>
	<br><A HREF="http://www.youtube.com/watch?v=-4vf2rVL2sU" target=_blank>Santa Claus Parade 08</A>
	<br><font size=1>2008/11/29</font></td>
	<td valign=top align=center width="110px"><A HREF="http://www.tvcogeco.com/niagara/gallerie/keep-in-touch/1886-week-of-jan-24-2010/13014-caan" target=_blank><img src="./images/video.gif" border=0></A>
	<br><A HREF="http://www.tvcogeco.com/niagara/gallerie/keep-in-touch/1886-week-of-jan-24-2010/13014-caan" target=_blank>Julia on TVCogeco</A>
	<br><font size=1>2010/01/23</font></td>
  </table>
  <center>
  <img src="images/catdivider.gif"></center>
	<DIV STYLE="margin-left:2px; margin-right:50px; text-align:justify">
  <BR>Please check out our new photo gallery, and feel free to leave your comments.

  <P>Currently there is no ability to upload your own pictures or videos, but if you would like to <A HREF="mailto:webmaster@canncatmobile.org?subject=gallery pictures">send them to me</A> I can add them on your behalf. <I>(Please name each photo/video with the title you want it to have on the gallery)</I>.
	</div>
  <?PHP
	
}
IF ($_REQUEST['show'] == "photo")
{
  $id=$_GET['id'];
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
  $query = "SELECT * FROM gallery WHERE id = '$id'";
  $result = mysql_query($query) or die (mysql_error());
  $num=mysql_numrows($result);
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
  $query_comment = "SELECT * FROM gallery_comment WHERE photo_id = '$id'";
  $result_comment=mysql_query($query_comment);
  $num_comment=mysql_numrows($result_comment);
  mysql_close();
  $z=0;
  while ($z < $num){
  $title = mysql_result($result,$z,"title");
  ?>
  <H2 align=center><?PHP echo "$title"; ?></H2>
  <center><table width=95%>
  <tr><td colspan=3 align=center><img src="./images/gallery/<?PHP echo $id; ?>.jpg"></center></td>
  <?PHP
  $z++;
  }
  $j=0;
  while ($j < $num_comment) {
    $name=mysql_result($result_comment,$j,"name");
    $comment=mysql_result($result_comment,$j,"comment");
    ?>
    <tr>
      <td colspan=3><?PHP echo "$name"; ?>
      <BR><?PHP echo "$comment"; ?>
      <hr>
    </tr>
    <?PHP
    $j++;
  }
    $z=0;
    while ($z < $num){
    $event_id = mysql_result($result,$z,"event_id");
    mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
    mysql_select_db($dbname);
    $query_next = "SELECT * FROM gallery WHERE event_id = '$event_id'";
    $result_next=mysql_query($query_next);
    $num_next=mysql_numrows($result_next);
    mysql_close();
    $id_count=mysql_result($result_next,0,"id");

    ?>
    <tr>
    <td width=30% align=left>
    <?PHP
    if ($id-$id_count==0) {
    echo "&nbsp;";
    }
    else {
    ?>
    <A HREF="index.php?action=gallery&show=photo&id=<?PHP echo $id-1; ?>"><img src="./images/arrow_left.jpg" border=0>Prev</A>
    <?php } ?>
    </td>    
    <td align=center width=30%><A HREF="index.php?action=gallery&show=event&id=<?PHP echo $event_id; ?>"><img src="./images/arrow_up.jpg" border=0 alt="Back to the Gallery"></A></td>
    <?PHP
    $z++;
    ?>
    <td width=30% align=right>
    <?PHP 
    if ($id-$id_count < $num_next-1) {
     ?>
    <A HREF="index.php?action=gallery&show=photo&id=<?PHP echo $id+1; ?>"><img src="./images/arrow_right.jpg" border=0>Next</A>
    <?PHP 
    }
    else {
      echo "&nbsp;";
    } ?>
    </td>
  </tr>
  <?PHP } ?>
  </table>
  <img src="images/catdivider.gif">
  <table>
	<?PHP
$user_ip = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
$date = date("H:i:s, d.m.Y");
	?>
  <form name="comment_add" action="index.php?action=gallery&show=comment" method="post">
	<input type="hidden" name="photo_id" value='<? echo "$id"; ?>'>
	<input type="hidden" name="user_ip" value='<? echo "$user_ip"; ?>'>
	<input type="hidden" name="date" value='<? echo "$date"; ?>'>
  <tr>
    <td colspan=5>Comments on this photo</td>
  <tr>
    <TD align=right><B>Your Name</B>: <FONT COLOR='orangered'><B>*</B></FONT></TD>
    <TD><input style="background-color: transparent;" type='text' name='name' maxlength=20 value='<? echo ($_REQUEST['name']); ?>'></TD>
  </TR>
  <TR>
    <TD align=right valign=top><B>Comments</B>: <FONT COLOR='orangered'><B>*</B></FONT></TD>
    <TD><textarea style="background-color: transparent;" name=comment wrap=physical cols=50 rows=6 onKeyDown="textCounter(this.form.comment,this.form.remLen,299);" onKeyUp="textCounter(this.form.comment,this.form.remLen,299);" value='<? echo ($_REQUEST['comment']); ?>'></textarea>
    <br><input readonly type=text name=remLen size=3 maxlength=3 value="300"> characters left
  </TR>
  <TR>
    <TD></TD>
    <TD><input type='submit' value='Add Comments'></TD>
  </TR>
  </table>
  
  </center>
<?PHP
}

ELSE IF ($_REQUEST['show'] == "event")
{
  $id=$_GET['id'];
  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);

  
  $query = "SELECT * FROM gallery WHERE event_id = '$id'";
  $query_event = "SELECT * FROM gallery_event WHERE id = '$id'";
  $result = mysql_query($query) or die (mysql_error());
  $result_event = mysql_query($query_event) or die (mysql_error());
  $num=mysql_numrows($result);
  $num_event=mysql_numrows($result_event);
  mysql_close();
  $i=0;
  $z=0;
  while ($z < $num_event) {
    $event = mysql_result($result_event,$z,"event");
    $date = mysql_result($result_event,$z,"date");
    $thanks = mysql_result($result_event,$z,"comment");
    ?>
    <center><font size=6><?PHP echo "$event"; ?></font>
    <BR>(<?PHP echo date("l, F d Y", strtotime($date)); ?>)
    <?PHP if ($thanks != "") {
    ?>
    <BR><A HREF="#" onClick=window.open("thanks.php?id=<?PHP echo $id; ?>",null,"statusbar=no,menubar=no,toolbar=no,height=772,width=525")>A Thank You</A></p>
    <?PHP } ?>
    
    </center>
    <P>
    <?PHP
    $z++;
  }
    ?>
  
  <table width=95% align=center>
  <?PHP
  if ($num == 0) {
  ?>
  	<tr><td colspan=5><center><img src="./images/spill.jpg">
  	<tr><td colspan=5>Oops! Looks like the cat spilled coffee over my computer and I lost these images.
  	<BR>No really, I just haven't uploaded anything to this gallery
  <?PHP
  }

  else {
    $column=1;
    while ($i < $num) {
      $id=mysql_result($result,$i,"id");
      $name=mysql_result($result,$i,"name");
      $email=mysql_result($result,$i,"email");
      $title=mysql_result($result,$i,"title");
      mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
      mysql_select_db($dbname);
      $query_comment = "SELECT * FROM gallery_comment WHERE photo_id = '$id'";
      $result_comment=mysql_query($query_comment);
      $num_comment=mysql_numrows($result_comment);
      mysql_close();
      if ($column==1)
      {
        echo "<tr>";
      }
      ?>
      <td width="100"><?PHP echo "$title"; ?>
      <br><A HREF="index.php?action=gallery&show=photo&id=<?PHP echo $id; ?>"><img src=<?PHP echo "./images/gallery/$id" ?>.jpg width="80" border=0></A>
      <br><font size=2px color=gray><?PHP echo "$num_comment"; ?></font> <img src="./images/comments.gif"></td>
      <?PHP
      $column++;
      if ($column==6)
      {
      echo "</tr>";
        $column=1;
      }
      $i++;
    }
  }
  ?>
  <tr><td>&nbsp;</td><td>&nbsp;</td><td align=center><A HREF="index.php?action=gallery"><img src="./images/arrow_up.jpg" border=0 alt="Back to the Gallery listings"></A></td><td>&nbsp;</td><td>&nbsp;</td></tr>
  </table>
  
  <?PHP
}
ELSE IF ($_REQUEST['show'] == "comment") {

  mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
  $error_count = 0;
  // Required variables for this form
  $required_variables = Array (
  'Your name' => $_REQUEST['name'],
  'Comments' => $_REQUEST['comment']);

  // Check for empty required values
  while (@list($var, $val) = @each($required_variables))
  {
    IF (empty($val))
	  {
      echo ("Required Field '$var' Left Blank<BR>");
      ++$error_count;
	  }
  }

  if (strlen(strip_tags($_REQUEST['comment'])) < strlen($_REQUEST['comment'])) {
        return false;
		++$error_count;
  } elseif ( strpos($_REQUEST['comment'], "&") !== false) {
	++$error_count;
  }	elseif (strpos($_REQUEST['comment'], "http://") !== false) {
  	++$error_count;
  }

  IF ($error_count == 0)
  {
    $insert_comment = "INSERT INTO gallery_comment SET
    photo_id = '$_REQUEST[photo_id]',
    name = '$_REQUEST[name]',
    comment = '$_REQUEST[comment]',
	ip = '$_REQUEST[user_ip]',
	date = '$_REQUEST[date]'";
    $result_comment = mysql_query($insert_comment);
    ?>
    <TABLE>
    <TR>
      <TD><?PHP echo $_REQUEST['name']; ?>, you entered the following comments:</TD>
    <TR>
    <TD><?PHP echo $_REQUEST['comment']; ?></TD>
    </TR>
    </TABLE>
    <BR><A HREF='index.php?action=gallery&show=photo&id=<?PHP echo $_REQUEST['photo_id']; ?>'>Back</A>
    <?
  }
  ELSE
  {
    echo "Please ensure you have filled in <B>your name</B>, and entered a <B>comment</B>. I am afraid that <B>no HTML code</B> or <B>&quot;&&quot;</B> is allowed<P><A HREF='javascript:history.back();'>Please correct the above errors and then re-submit.</A><p>";
  }
  
}

?>