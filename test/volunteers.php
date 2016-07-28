<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<!-- page content starts here -->
<?PHP
IF (!isset($_REQUEST['show']))
{
?>
<H1 align=center>Community Animal Allies of Niagara</H1>
<H3 align=center><I>"Promoting the No Kill Philosophy in Niagara"</I></H3>
<DIV STYLE="margin-left:2px; margin-right:50px; text-align:justify">

Dear Volunteer,
<P>
On behalf of the President, Dr. Julia Murray and the Board of Directors, I would like to welcome you to <B>Community Animal Allies of Niagara (CAAN)</B>. We are pleased that you desire to give your time and efforts to assist and support our mission statement through the various programs offered through our organization.
<P>
<center><B>CAAN'S MISSION</B></center>
<BR>
The establishment and operation of an association of community members for the purpose of promoting the no kill philosophy for displaced domestic animals and pets owned by persons of low income in our community by supporting or providing:
<UL>
	<LI>High volume low cost spay neuter programs
	<LI>Affordable basic veterinary care for low income pet owners and displaced domestic animals
	<LI>Pet Adoption Programs
	<LI>Foster Care Programs
	<LI>TNR (trap, neuter, return programs)
</UL>
Volunteering with C.A.A.N. is a progressive partnership of mutual benefit to the volunteers and to the community. All volunteers are encouraged to utilize their special talents and work in pursuing interests in a manner that supports our mission statement. As we partner together towards accomplishing the organization's goals, your opinion is valued and your input is meaningful.
<P>
Our team of volunteers is essential to the realization of our mission and it is with your generous assistance that we are able to help the animals we serve.
<P>
We are excited that you have an interest in working with us and look forward to meeting you, getting to know you and working with you as we   become a powerful network to protect and advocate for the animals.
<P><I>"There's nothing which persevering effort and unceasing and diligent care cannot accomplish."</I>
<BR>- Seneca
<P>
Thank you for your choice in C.A.A.N.
<P>
Please review the list of <A HREF="index.php?action=volunteers&show=opportunities">volunteer opportunity</A> to see if any of them are appealing to you, or our <A HREF="index.php?action=volunteers&show=wishlist">wish list</A> to see if you can help.


</DIV>
<?PHP
}
ELSE IF ($_REQUEST['show'] == "opportunities"){
?>
<H2 align=center>Volunteer Opportunities</H2>
<DIV STYLE="margin-left:2px; margin-right:50px; text-align:justify">
	
Thanks for your interest in helping! In order to help us find the best job for you, we suggest that you review this list and select a couple of opportunities that interest you. Indicate your area(s) of interest and return this list with the enclosed volunteer application. Our Volunteer Coordinator will call to discuss your interests, availability, and talents and to provide additional information on the opportunities that you have selected (the job description and how much time is needed). Training will be provided.
</DIV>
<P>
<UL>
<LI>Hands-on work with animals;
<LI>Foster homes for cats and/or dogs;
<LI>Trapping/Transporting cats for MCM;
<LI>Cat<B>MOBILE</B> Team volunteers (<a href="javascript:unhide('events');">events list</A>);
<div id="events" class="hidden">
<?PHP
$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
if(strpos($user_agent, 'MSIE') !== false) {
echo '<iframe src="events.php" ID="events" name="events" style="border:1px dashed #000000; background-color: #FFFFFF" width="600" height=200 scrolling="yes"></iframe>';
}
else {
echo '<iframe src="events.php" ID="events" name="events" class="autoHeight" style="border:1px dashed #000000; background-color: #FFFFFF" width="600"  scrolling="no"></iframe>';
}
?>
</div>
<LI>Phone work, paperwork, and other volunteer work; 
<LI>Phone Representatives to return phone calls (from your home)
<LI>Spay/Neuter Program Reps to return calls and handle paperwork (from your home)
<LI>Placement Program Coordinator, photography, writing, phone and/or mailings
<LI>Corresponding Secretaries to send out information or send thank-you notes
<LI>Mailing and filing assistance
<LI>Phone Captain (overseeing and delegating calls that come in to CAAN/MCM)
<LI>Adoption Screeners 
<LI>Publicity: assisting with publicity - writing and/or phone follow-up
<LI>Fundraising: planning and event-day volunteers
<LI>Distribution: putting up posters for cat and dog adoption and special events
<LI>Holiday Bazaars: requesting and gathering items
<LI>Special Events Coordinator to organize monthly events at local pet supply stores
<LI>Meeting Coordinator to arrange General Meetings
<LI>Assistant to arrange for refreshments for meetings
<LI>Animal Medical Records Computer Operator [MCM nights]
<LI>MCM: Spay/neuter program for feral cats.
<LI>Low-Cost Spay/Neuter Clinic
<LI>Socialization Program at the CATQUARTERS
</ul>
<A HREF="index.php?action=volunteers">Back</A>
<?PHP
}

ELSE IF ($_REQUEST['show'] == "wishlist")
{
?>

	<DIV STYLE="margin-left:2px; margin-right:50px; margin-top: 20px; text-align:justify">
	<center><img src="./images/wishlist.jpg"></center>
	<UL><?PHP
	//Connect To Database
	include ("../includes/login.php");
	mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
	mysql_select_db($dbname);
	$query = "SELECT * FROM wishlist";
	$result = mysql_query($query) or die (mysql_error());
	$num=mysql_numrows($result);
	mysql_close();
	$i=0;
	while ($i < $num) {
		$id=mysql_result($result,$i,"id");
		$needs=mysql_result($result,$i,"needs");
		$Array = split("[,]+", $needs);
		foreach ($Array as $value) {
			print "<li> $value<br>";
		}
		$i++;
	}
	?>
	</UL>
	<P>Can you help? Do you have any of these items that you can spare? If so please bring them along to Court Animal Hospital or one of our many Cat<B>Mobile</B> <a href="javascript:unhide('events');">events</A>.

	<div id="events" class="hidden">
	<?PHP
	$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
	if(strpos($user_agent, 'MSIE') !== false) {
	echo '<iframe src="events.php" ID="events" name="events" style="border:1px dashed #000000; background-color: #FFFFFF" width="600" height=200 scrolling="yes"></iframe>';
	}
	else {
	echo '<iframe src="events.php" ID="events" name="events" class="autoHeight" style="border:1px dashed #000000; background-color: #FFFFFF" width="600"  scrolling="no"></iframe>';
	}
	?>
	</div>	
	<P><A HREF="index.php?action=volunteers">Back</A>
	</DIV>
<?PHP	
}

?>
<BR>
<CENTER><img src="images/catdivider.gif"></center>
<P>If you would like to become a C.A.A.N. volunteer, please print out and hand in these forms.
<UL>
	<LI><A HREF="./docs/VolunteerApplicationCAAN.pdf">Application Form</A>
	<LI><A HREF="./docs/VolunteerOpportuntiesCAAN.pdf">Opportunities List</A>
	<LI><A HREF="./docs/WaiverCAAN.pdf">Waiver Form</A>
</UL>
<div  STYLE="margin-left:2px; margin-right:50px;">
<P>If you would like to volunteer to help with one of the Cat<b>MOBILE</b> outings throughout the Niagara area, please <a href="javascript:unhide('volunteer');">fill out this form:</a>
<div id="volunteer" class="hidden">
<?PHP
$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
if(strpos($user_agent, 'MSIE') !== false) {
    echo '<iframe src="volunteer.php" ID="volunteer" name="volunteer" style="border:1px dashed #000000; background-color: #FFFFFF" width="600" height=850 scrolling="yes"></iframe>';
}
else {
  echo '<iframe src="volunteer.php" ID="volunteer" name="volunteer" class="autoHeight" style="border:1px dashed #000000; background-color: #FFFFFF" width="600"  scrolling="no"></iframe>';
}
?>

</div>
</div>