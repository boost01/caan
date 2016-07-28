<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
</head>
<H1 align=center>Promoting A Cat For Adoption</H1>
<div STYLE="margin-left:2px; margin-right:50px; margin-top: 22px; text-align:justify">
<?PHP
IF (!isset($_REQUEST['show'])) {
?>
<!-- page content starts here -->
	<B>Web site</B>
	<P>This is the best way to get to choose from the most adopters. You can screen by phone ahead of time. You can spend more time chatting with adopters and educating them on how to train cats for the best possible manners, such as biting, scratching posts, and clapping to get them off counters. Adopters willing to go through the steps and time this takes tends to be less impulsive and more thoughtful about their adoption decision.
	<P>
	<B>Adoption Events</B>
	<P>This is a good way to have many adopters see the cat to help find a good match for them. It is moderately easy to screen adopters.
	<P>
	<B>Posting Information at local businesses</B>
	<P>The method is especially helpful for special cases. A wide variety of people will see the available cats/kittens, whether they're seeking a cat or not. People who didn’t know about Community Animal Allies of Niagara will now. Certain businesses (vet offices and pet supply stores) are likely to allow you to post.
	<P>
	<B>Placing an ad in any local publication</B>
	<P>By placing an ad in a local newspaper or online publication you can reach a large audience, which may lead to a quicker adoption. Some community papers are free or low-cost – BUT the cost is yours.
	<P><B>Returning a kitten to the shelter is strongly discouraged.</B> There is high risk of illness and euthanasia is possible, so use this as a last resort.
	<P>
	<UL>
		<LI><A HREF=index.php?action=promotion&show=post>Website Posting Instructions</A>
		<LI><A HREF=index.php?action=promotion&show=resources>Website Resources</A>
		<LI><A HREF=index.php?action=promotion&show=questions>Screening Questions</A>
		<LI><A HREF=index.php?action=promotion&show=points>Points of Notes</A>
		<LI><A HREF=index.php?action=promotion&show=older>Adopting out an older cat</A>
	</UL>
<?PHP
}
ELSE IF ($_REQUEST['show'] == "post") {
?>
	<H2>Web site Posting Instructions</H2>
	<OL>
	<LI> Use a copy of this form for each kitten you want posted. Fill in the below information, (a) through (h), in an <A HREF=" mailto:info@caancatmobile.org?subject=Cat Posting Advert&Body=%0A%0Aa)Name: %0ATel: %0A%0Ab)Breed: %0AColour: %0A%0Ac)Gender: %0A%0Ad)Age: %0A%0Ae)Size: %0A%0Af)Cat Name: %0A%0Ag)Alterations: ">email<A> body if possible, and include your written story about the kitten.
	<OL type="a">
		<LI> Your Name and phone number - this is for voice mail screening to be able to call you
		<LI> Kitten's breed and colour(s) - the generic term for a mixed breed cat is Domestic Short/Medium/Long Hair (DSH/DMH/DLH)
		<LI> Gender of animal
		<LI> Approximate size when adult: small, medium or large - this is a guess when they're so small
		<LI> Cat's age - baby, young or adult (baby: birth to 6 months; young: 6 months to 2 years; adult: 2 years and above)
		<LI> Cat's name
		<LI> Has this cat been altered?
	</OL>	
	<LI> Write a story about the cat/kitten. Make sure you write your story about ONE KITTEN ONLY. If the kitten is really attached to a sibling, you can mention that in their story, encouraging people to take them together, but we still need each kitten to have its own listing.
	<LI> If you people to contact you directly, include your phone or email in the story, otherwise the usual blurb will be included: "If you would like to learn more about the kitten/cat, please call [your phone number]".
	<LI> Photos make a huge difference in how many calls your kitten will get. Each photo should be of ONE KITTEN ONLY. Save the photo as a ".jpg" file. Please send only one picture that you think is the best of each cat.
	<LI> Check the Web site a day or two after you have sent your information. You know the cat best and will catch any errors on the site. If you don't see the cat listed, or if there are mistakes in the information, just send an email with any corrections.
	<LI> Check the Web site regularly to ensure the cat/kitten's posting is still there. Postings sometimes disappear and we don't want your case to miss adoption opportunities. Please notify the web posting email address (see #1 above) if missing.
	</OL>
	<A HREF="index.php?action=promotion">Back</A>

<?PHP
}
ELSE IF ($_REQUEST['show'] == "resources") {
?>
	<H2>Website Resources</H2>
	<P>The Internet has a variety of sites available for those people who need additional information about adopting cats, seeking help with caring for new cats, re-homing cats, or addition adoption information. Some examples include the ones below (accessed 29 June 2010). You can also type in "cat adoption", "pets Niagara", "re-homing cats" on Google for more examples, though we can't guarantee you'll be successful. There are plenty of Toronto and Southern Ontario organizations as well if you don't live in Niagara.
	<DL>
	<DD><B>Kijiji: </B><A HERF="http://www.kijiji.ca">www.kijiji.ca</A>
	<DD><B>Petfinder: </B><A HERF="http://www.petfinder.com">www.petfinder.com</A>
	<DD><B>Best Friends: </B><A HERF="http://www.bestfriends.org">www.bestfriends.org</A>
	<DD><B>Adopt an Animal (Canada): </B><A HERF="http://www.adoptananimal.ca">www.adoptananimal.ca</A>
	<DD><B>Pet Value Adoption: </B><A HERF="http://www.petvalue.com/adoption">www.petvalue.com/adoption</A>
	<DD><B>Abbey Cat Adoptions (Cats and Kittens Toronto): </B><A HERF="http://www.abbeycats.org">www.abbeycats.org</A>
	<DD><B>Pet Smart "Adoptions": </B><A HERF="http://www.adoptions.petsmart.com">www.adoptions.petsmart.com</A>
	<DD><B>Niagara Pet: Cats, Kittens for Sale: </B><A HERF="http://www.adpost.com">www.adpost.com</A>
	<DD><B>Niagara Pet Guide: </B><A HERF="http://www.niagarapetguide.com">www.niagarapetguide.com</A>
	<DD><B>Cats Anonymous Rescue & Adoption: </B><A HERF="http://www.catsanonymous.ca">www.catsanonymous.ca</A>
	</DL>
	<A HREF="index.php?action=promotion">Back</A>	
<?PHP	
}
ELSE IF ($_REQUEST['show'] == "questions") {
?>
	<H2Screening Questions to Ask Potential Adopters</H2>
	Potential adopters will be pre-screened by a voice mail volunteer if you've posted a foster to the Web site. Pre-screening is also done on visitors to adoption events. Sometimes a shelter officer will have done the pre-screening and referred someone to you.
	<P>However, every foster parent is strongly encouraged to familiarize themselves with these suggested screening questions and re-screen before deciding if a potential adopter is an appropriate match for your foster feline.
	<P>Pre-screening does not guarantee that a potential adopter is right for a cat; it's merely the first step in assessing a potential match. Screening is a great opportunity to educate people who might not be aware of some issues that affect the wellbeing of an animal. Some potential adopters will appreciate the information they learn and you may feel confident that they will become responsible cat owners. Ask open-ended questions about their plans for adding a new feline to their household. Here are some important questions to consider:
	<P><B>Do you have any other cats or pets?</B>
	<P>It's nice to see little kittens go to homes either with a sibling or another cat to keep them company, unless the kitten will not be alone all day. CAAN has an excellent handout on introducing a new cat to resident cats and dogs.
	<P><B>Have you had cats or other pets in the past? What happened to them?</B>
	<P>Hit by a car or "not sure" are answers that send up red flags!
	<P><B>Who is your regular veterinarian (if they have other pets)?</B>
	<P>Having a regular vet is a sign of responsible pet ownership. If they say their pet has never been sick, ask them where they've been getting them vaccinated. Some people don't believe in vaccinating adult cats that are indoor-only, but in general most pets should be current on their vaccinations.
	<P><B>How many children do you have? What are their ages?</B>
	<P>Small kittens will probably do best in homes without children under the age of six. However, it most definitely depends on the child and you should insist on any small children, if there are any, under about the age of eight coming with a parent to visit the kitten so that you can see how they interact with the cat.
	<P><B>Will the cat be indoor, outdoor or both?</B>
	<P>Statistics show that the lifespan of an indoor cat is doubled! If adopters plan on letting a cat out, please remind them of all the many dangers of being outside, including cars, wildlife, poisonous substances, and troubled people. Also, NO adopter should plan on letting a small kitten outdoors for quite some time unless it's on a leash and harness.
	<P><B>Owning a pet is a lifetime commitment!</B>
	Please remind potential adopters that cats can live over 20 years and that this is a lifetime commitment! What will they do if they move, travel, have children or when the cat gets sick?
	<P><B>Some additional open-ended questions (a few suggestions):</B>
	<UL>
		<LI>Why are you interested in THIS cat/kitten?
		<LI>Why are you interested in a cat/kitten at this time?
		<LI>Cats have natural need to scratch. Some people handle this by providing scratching posts, others allow scratching anywhere, some people opt for declawing, and others learn to trim claws. How do you plan to deal with this?
		<LI>Will this cat/kitten get any outdoor time? (Again, if you advocate indoor only or supervised outdoor time, asking in this way may get a more honest answer). 
	</UL>
	<A HREF="index.php?action=promotion">Back</A>
	
<?PHP	
}
ELSE IF ($_REQUEST['show'] == "points") {
?>	
	<H2>Other Points of Note</H2>
	<P>Kittens under the age of four months will not be placed in homes with children under six years of age, unless monitored interaction shows the child to be mature and gentle, and the adult conscientious. Adopters with small children will be cautioned to monitor all interaction between the new pet and children to assure the animal does not harm the child, and vice versa.
	<P>The legal limit for household pets in the City of St. Catharines is eight (8) [see St. Catharines by-law #73-244 paragraph 2].
	<P>CAAN will not adopt an animal to someone who has previously surrendered their own healthy animal to the shelter for reasons of convenience or irresponsibility.
	<P>No kitten/cat under the age of six weeks shall be adopted.
	<P>Licensing of pets, including those currently at home, with the appropriate city or county agency is mandatory with each adoption.
	<P>All new owners must be informed of the need for regular veterinary care, inoculation, and grooming for their pets. Owners must be willing to provide proper care for an animal's entire lifetime.
	<P>CAAN is often not fully informed by previous owners about an animal’s health condition, character traits or behaviour patterns. Therefore, CAAN staff should encourage prospective adopters to become familiar with different breeds by researching through books or magazines or consulting veterinarians or breeders prior to adopting an animal.
	<P>All fees incidental to the adoption must be paid in full prior to the release of the animal from CAAN.
	<P>The decision to approve or disallow an adoption shall not be influenced by the applicant’s race, gender, age (if of legal age), national origin, religion, disability, sexual preference or appearance.
	<P>CAAN can make no guarantee as to the animal's condition; however, we strive to offer for adoption those animals, which have behaved socially and appeared healthy during their shelter stay. To enhance the animal's chances of remaining healthy, we worm, vaccinate, and surgically sterilize them prior to their release to new homes.
	<P>
	<A HREF="index.php?action=promotion">Back</A>
<?PHP	
}
ELSE IF ($_REQUEST['show'] == "older") {
?>

	<H2> Adopting Out An Older Cat</H2>
	<blockquote align=center>"They are not our property -- We are not their owners. 
	<BR>A just and compassionate world for animals begins 
	<BR>with our language and our actions."
	<BR>In Defense of Animals, Mill Valley CA</blockquote> 
	<P><B>When The Bond Breaks...</B>
	<P>When you first adopt a cat, you do so with the best intentions.  In fact, without those good intentions, most shelters and individuals would never approve the adoption in the first place.  Your new pet cat will probably be a kitten -- almost 90% are.  That kitten, living inside and being lovingly cared for may live 20 years or more.  That's a very long time to stay committed to a pet.  Luckily, many people bond very closely to their cats and would never consider giving them up.  Others like "having them around", but if their life situation changes -- which it most certainly will over a 20-year period -- the pet cat may find its value lessened and ultimately be relinquished. 
	<P>Even those instances where the cat/human bond is very strong, life circumstances frequently intervene.  The guardian marries someone who is allergic to cats, has a baby that "torments" the cat, or gets too old or too ill to keep the cat.  Sometimes the cat develops unsavory behaviors, such as inappropriate elimination, frequently as a result of a change in the cat's living arrangements -- a new home, a new pet, a new baby.  At these points, even the most loved cats find their lives hanging in the balance. 
	<P>If you are one of the many people that find yourself with a cat that, for whatever reason, you can't keep and you want to find it a "good home," you have a very difficult problem.  Two out of three cats that lose their homes will never find a new one!  Understanding this situation can help your pet cat be among the small group of cats who are successfully re-homed.  Here are a few tips to improve your cat's chances: 
	<P><B>How To Re-Home Your Cat</B>
	<UL>
		<LI>Give your cat to a shelter only as a last resort.  Shelters have a very low success rate at placing adult cats.  Individuals do much better. 
		<LI>Network!  Network!  Network!  Tell every person you know that you have a loving cat that needs a new home.  This includes friends, relatives, neighbors, co-workers, church, social and business groups, email lists, your children's schoolmates.  They may not be direct candidates -- but they may know someone who is.  Feed them positive information about the cat -- and explain why you can't keep the cat yourself.  The more people you can reach the better. 
		<LI>Advertise in local newspapers for a guardian.  Post a "For Adoption" flyer in key locations -- bulletin boards in vet clinics, pet supply stores, workplaces and churches.  Include a photo -- to lure the potential adopter -- and include your phone number -- preferably multiple times in tear-off strips at the bottom.  Keep the text brief, but cover important points to build compassion. 
		<LI>Be sure the cat is spayed/neutered, has been viral tested, and has a current rabies and distemper shot.  New guardians will feel much more comfortable adopting a cat with a positive health record. 
		<LI>If your cat has any behavior problems, ask your vet for assistance in retraining the cat before trying to adopt it out.  Recognize that if the cat has behaviors that you can't tolerate, it stands little chance of keeping a new home.  If you give your cat to someone without telling them about the problem, the cat may find itself rapidly taken to a shelter -- with the behavior problem cited as the reason and the cat will be deemed "unadoptable". 
	</UL>
	<P><B>Should You Charge A Fee?</B>
	<P>Much is made out of the importance of collecting an "adoption fee" to ensure the cat goes to a good home and not to the nearest research lab.  Although there may be some truth to this caution, it should not be a concern if you are diligent in checking references and verifying the permanent address of the new guardian. 
	<P>Just as we do not charge for human adoptions, we believe it is important not to charge for companion animal adoptions.  They are not our "property" -- as an adoption fee might imply.  We are merely their guardians, entrusted with their care and protection.  Because of this we discourage the charging of a fee.  It is not necessary -- the new guardian will pay for the cat for the rest of its life in providing its care.  If someone feels they need to "pay" for the cat suggest they make a contribution to a local cat rescue group instead. 
	<P><B>How To Choose A Guardian</B>
	<P>Here are some tips on deciding if the adoption candidate will make a good guardian: 
	<UL>
		<LI>Ask the candidate to visit the cat in your home, where the cat is comfortable, and watch them interact. 
		<LI>Ask about previous and current pets -- Do they still have them?  If not, why not?  Check vet references. 
		<LI>Check other references unless you know the candidate personally. 
		<LI>If the candidate rents, verify that the landlord allows cats prior to the adoption.  Review the lease or call the landlord to confirm. 
		<LI>Deliver the cat to the new home, leaving it in the car while you make sure the environment is safe and nurturing for it.  If you don't deliver the cat personally, verify the application address against a driver's license. 
	</UL>
	<P>If you're comfortable, give the cat to the new guardian.  Make sure you bring the cat's belongings -- toys, litter box, food.  Having familiar scented items will ease the transition to the new home.  Recommend that the new guardian start the cat off in a single room to get adjusted before giving it reign over the entire dwelling.  Follow-up in a week or two to make sure everything is going smoothly.  Be prepared to take the cat back if the new home doesn't work out.
	
	<P><font color=orange size=1>Source: Cat Spay of Santa Fe <A HREF="http://zimmer-foundation.org/art/12.html"http://zimmer-foundation.org/art/12.html</A> (accessed 1 Jan 2011)</font>
<?PHP	
}
?>


<!-- page content ends here -->
</div>
</html>