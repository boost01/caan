<?php
/*
function mail_mash()

	a cuter way to foil the spam-bots 
	
	mail_mash will transform email@address.com into a randomly mixed string of real
	"o" and encoded "&#111;" characters. it's different each time the page loads,
	but always presents a valid mailto:email@address.com for a human clicker
	
	note: the "mailto:" part is also prepended, mixed in to the randomness, so you
	don't need to provide that in your html, just <a href="',mail_mash($email_address),'">
	from inside a php echo, or put a whole php echo statement inside the href if you
	are inside plain html
	
		your@address.com
	
	would output *something like*..
		
		&#109;a&#105;&#108;to:&#121;our&#64;a&#100;&#100;r&#101;ss.&#99;&#111;&#109;

	have fun!
	
	;o)
	(or

*/

function mail_mash($addy) {

	$addy = 'mailto:'.$addy;
	for($i=0;$i<strlen($addy);$i++) { $letters[] = $addy[$i]; }
	
	while (list($key, $val) = each($letters)) {
		$r = rand(0,20);
		if ($r > 9) { $letters[$key] = '&#'.ord($letters[$key]).';';}
	}
	
$mashed_email_addy = implode('', $letters);
return $mashed_email_addy;

}/*
end function mail_mash()	*/
?>