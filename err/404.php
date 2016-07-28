<?php // ۞// text { encoding:utf-8 ; bom:no ; linebreaks:unix ; tabs:4sp ; }
$fourohfour_version = '1.8.1';
do_init();

/*	
	404 (not found)
	
	the corz.org intelligent php 404 error handler
	
	404 pages are more important than we generally think. most visitors,
	when presented with a broken link, will just go elsewhere. bye! a decent
	404 page will give you a "second-shot", keep them hanging around, and
	shows you care, which many webmasters don't. hit a 404 at corz.org for
	a wee demo.
	
	
	what it does..

		as well as the usual valid link to your site root and email address
		that folks can click to give feedback, 404.php provides an
		intelligent response to your site's missing pages..

		first 404.php does automatic redirection for all your moved pages.
		whenever you move a page, simply add it to 404.php's "catcher" list,
		and have all visitors and search engines automatically and
		permenantly redirected, without any fuss or .htaccess hacking.

		for genuinely missing documents, 404.php goes on to do a (very)
		quick scan your site, looking for similar items, and returns a
		list of any matching files, as links.

		if there is only a single matching document, 404.php can
		(optionally) jump the visitor directly to that document, nifty.

		finally, if no matches are found, 404.php (optionally) presents the
		user with a corzoogle search form, the important part of their query
		already inserted into the search field, enabling them to perform a
		full content search of your web site.

		TADA!
	

	to use..
		
	i.
		edit the preferences section (below) with your own details.
		name, etc..

	ii.
		direct your site's 404 errors to this script..
	
		this is achieved by editing either your master httpd.conf or
		main .htaccess file, inserting a line something like..
		
			ErrorDocument 404 /err/404.php
		
		which would direct all 404 errors to.. http://mysite/err/404.php
		which is where I happen to keep *my* copy of this script, that is,
		inside a folder called "err" in the top level of my site.

		for more information on .htaccess files, see here..
		
			http://corz.org/serv/tricks/htaccess.php
		
		I'll likely include an example .htaccess inside the zip distribution
		
		on some web hosts you can chose your error pages through the CP
		(control panel) or site admin page. as a last resort, ask your
		website hosts/sysadmin how to achieve this.
		
	iii.
		the optional corzoogle search form (for *very* missing documents) will
		obviously need to have corzoogle installed somewhere on your site to
		be of any use. clearly 404.php is best instructed to use the corzoogle
		search engine in the 'root', or 'top level' of your site. you can
		get corzoogle here..
	
			http://corz.org/corzoogle/download.php
		
	iv.
		the "catchers" part does automatic redirection of your moved pages.
		
		the idea is, when you move a page, for whatever reason, you add
		it to the catchers list. 404.php will then direct visitors straight
		to that page, bypassing the 404 altogether, they won't even realize
		they *got* a 404!
		
	v.
		lastly, if you want the spam-bot foiling email address mashing function
		to work, you'll need to include the mail-mash function somewhere. if you
		download the zip of this script, you'll find I have thoughtfully done
		it for you. if you move it somewhere, you'll need to edit the location in
		the preferences, below.
				
		
	that's it! you keep your lost visitors now!
	
	
	;o)
	(or
	
	(c) corz.org 2004 ->

*/


/*
	prefs..  */
	

// your name, as your visitors see it..
$me = 'the webmaster';


/*	email address.
	
	if you like spam, you can uncomment this and insert your real email address.
	best to just leave it alone though, and use the email-masher, as described
	above. I now include it in the distribution, too. alter this path to wherever
	you want to keep the masher, and re-use it! 
	eg. include ($_SERVER['DOCUMENT_ROOT'].'/inc/email-masher.php');
*/
include ('mail-mash.php');

//	and the email address to mash goes here..
$email_addy = mail_mash('webmaster@caancabmobile.org');


// or you can just comment out the two lines above and use simply..
// $email_addy = 'i-like-spam@crazypeople.net'; // un-comment if you like spam


// leave empty if corzoogle isn't installed on your site.
$cz_location = '';

// location of corzoogle image
$cz_img_location = 'corzoogle_sm.png';


// IGNORE folders, for the scanning.. (one '/inc/' covers all '/inc/' folders onsite)
// You can also be more specific, as in '/my/tools/'
// note commas *between* entries..
$ignore = array(
	'/includes/',
	'/err/',
	'/inc/',
	'/cgi-bin/',
	'/stats/',
	'/blog/',
	'/prot/',
	'/test/',
	'/weblog/',
	"/images/"
	);


// files we are allowed to return results for
// note commas *between* entries..
$extentions = array(
	'.htm',
	'.html',
	'.shtml',
	'.txt',
	'.doc',
	'.php',
	'.php3',
	'.phps',
	'.jpg',
	'.jpeg',
	'.png',
	'.gif',
	'.nfo',
	'.au3',
	'.pdf'
	);


/*	search path.	default: $scan_path = array('../');

	by default, this script lives in /err so we start searching 
	from the folder *above*, '../' i.e. the root of the site.
	
	if you keep this anywhere *but* in a subfolder of your root,
	please specify the FULL path to the root of your website
	something like..
	
		$scan_path = array('/var/www/html/');
	or..
		$scan_path = array('/Volumes/mac/webserv/cor/');
		
	or whatever..
*/
$scan_path = array('../');	

/*
	default: $exact_match = false;

	if a user was looking for "install.txt" and that doesn't exist in the location they
	specified, we will look for "install.txt" everywhere onsite. If that filename is found
	we will return links for files matching "install.txt". this is an exact match.
	
	if this switch is set to false (the default), we will also return hits for install.htm,
	install.php, install.jpg, etc. I prefer this; shows we're working
	extra hard for our visitors. consider the term "web host".
*/
$exact_match = false;


// searching for "install.txt", will also return  installation.txt, installer.jpg, and so on.
$partial_match = true;

/*
	If they typed "g-dip" in the address bar, this would return a document entitled "g_dip"
	(note underscore). 
*/
$fuzzy_match = true;


/*	
	always show a corzoogle search form?	default: $corzoogle_always = true;
	
	if our scan didn't match any documents, a corzoogle form will be presented,
	thus enabling the user to perform a full content search of our website.
 
	if you like (and it is cool) you can have a corzoogle search form appear
	anyway, even if we did get a few matching documents. the scanning code
	for 404 is ripped out of corzoogle, anyway.
*/
$corzoogle_always = true;


/*	"catchers"  -  moved pages we catch and redirect-at-once

	if the first item is contained *anywhere* within the URL, the redirection
	will occur. they won't realize they got a 404. example; single redirection..

	$catchers = array('/old/page/here.php' => '/new/page/here.php');
	
	you don't have to worry about some site script that uses one of your first
	redirect terms, say "index.php?q=" in its URL's, being redirected by 404,
	remember; if the user hits a valid url, they won't even *get* a 404! 
							(.. adapted from a recent communication ;o)
							
	because it's a "catch-all", you can put generic terms in and catch
	any old thing, send it to some relevant page.
	
	NOTE: BE VERY VERY CAREFUL when you edit these values, and TEST on your
	own server before uploading an updated 404. reason? Once you set a
	permanently moved redirection, it can be a bugger to shift, at least on
	your own system.
*/
$catchers = array	
	(
	'----- old pages go here -----'		=>		'------ new pages go here ------',
	'ARSE'								=>		'/comms/hardware/router/Automatic-Router-Scripting-Engine/',

	'rout...uter.how-to.php'			=>		'/comms/hardware/router/bt.voyager.205_router.how-to.php',

	'windows/soft/'						=>		'/windows/software/',
	'Automatic-Router-Scripting-Engine'	=>		'/comms/hardware/router/Automatic-Router-Scripting-Engine/',
	'dynamic.php.sig.page.php'			=>		'/ampsig',
	'signature.screenshots.page.php'	=>		'/ampsig',
	'javascript_secure-login.php'		=>		'/engine?section=php%2Fsecurity&source=pajamas_php%2Bjavascript-secure-login_pj-module.php',

	'weegary.php'						=>		'/fun/weegary.php',
	'jack.php'							=>		'/fun/jack.php',
	'checkers'							=>		'/fun/checkers/',

	'static.address'					=>		'/comms/hardware/router/static.ip.address.php',
	'Voyager'							=>		'/comms/hardware/router/bt.voyager.205_router.how-to.php',
	'port_probe.php'					=>		'/probe',
	'website-sync_two-machine.php'		=>		'/source/website-sync-linux.php',
	'/pj_demo'							=>		'/serv/security/demo/',
	'/secure/index.php'					=>		'/serv/security/',
	'/blog/rss.xml'						=>		'/blog/rdf.php',
	'/blog/b2rss2.php'					=>		'/blog/rdf.php',
	'/blog/backend.php'					=>		'/blog/rss.php',
	'/blog/index.rdf'					=>		'/blog/rdf.php',
	'/blog/atom.xml'					=>		'/blog/rdf.php',
	'/php/source/pda.php'				=>		'/source/seo%20scripts/pda.php',
	'/source/index.php?q=pda.php'		=>		'/source/seo%20scripts/pda.php',
	'/osx/wire/'						=>		'/wire/',
	'/public.php'						=>		'/public/',
	'/osx/man.php'						=>		'/osx/man/',
	'/essays/wholistic/'				=>		'/words/wholistic/karma-explained.php',
	'index.php?q='						=>		'/engine',
	'/osx/darkstat.php'					=>		'/osx/soft/darkstat.php',
	'soft/stuff/darkstat_osx.dmg.zip'	=>		'/osx/soft/darkstat.php',
	'/corzmail.php'						=>		'/inc/corzmail.php?act=email',
	'file_view.htaccess.text'			=>		'/serv/resources/file_view.htaccess.txt',
	'plogger.php'						=>		'/engine?section=php%2Fcorz%20function%20library&source=plog.php',
	'distromachine/todo.php'			=>		'/serv/tools/distromachine/',
	'bbcode.papser.all.tags.html'		=>		'/bbtags'
	);
/*
		note the use of commas between all entries (except the last)

		the rss entries; I spotted aggregators looking for alternative feeds,
		so I supplied 'em! just for fun. (me: send old-style feeders to /blog/rss.php)
*/


/*	catcher redirection.		default: $corz_domain = $_SERVER['HTTP_HOST'];

	you could redirect your catchers to another site, too, if you like..
	$corz_domain = 'otherplace.com';
*/
$corz_domain = $_SERVER['HTTP_HOST'];



/*
	auto-redirect if only one single match?
	
	if the scan returns just one document, will can jump directly to it,
	in an "I feel lucky" style.    default: $jump_on_single_hit = false;
	
	visitors go- "WTF! .. CoOL!" probably.
	you'll likely want to enable $exact_match if you use this!

	uses meta-refresh. this is experimental, some servers gronk.  ymmv..
*/
$jump_on_single_hit = false;	// true/false
$time_to_jump = 1; // how many seconds until hyperspace jump?


/*
	visual stuff..	*/

/*
	show full links?
	default: $links_are_full = true;
	
	a display thing. if a match is found,
	its link and pop-up title can be shown as..
	
		somefile.php
		
	or as..
	
		http://mysite.com/whatever/path/to/somefile.php
		
	which is the "full" version. either way, they still get the same link,
	and that full link, as always, will be displayed in their status bar.
	just for looks.    default: $links_are_full = true;
*/
$links_are_full = true;


// 404 messages..
$message_1 = "Maybe you typed the address wrong. What do you think?";
$message_2 = "The following documents appear to be similar to your request..";
$message_3 = "I looked, but couldn't find any matching documents, sorree.";
$message_4 = "You might want to corzoogle for it..";	// optional


/* //:2do:
lost songs	
redirect lost *.mp3 (or whatever) to a special page
like the section root. */



/*
	end prefs	*/



// first we do any "catchers", for pages that we have moved
// gotta do it first, we are sending http "headers"
// using output buffering on a 404 just *feels* wrong, somehow.
while (list($old_page, $new_page) = each($catchers)) {
	if (stristr($_SERVER['REQUEST_URI'], $old_page)) {
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: http://$corz_domain$new_page");
		die();
	}
}

// ok, we got a real 404 here..


// grab the filename parts of the URL string, to be used later..
$insert = rawurldecode(substr($_SERVER['REQUEST_URI'], (strrpos($_SERVER['REQUEST_URI'], '/')+1)));
if ($insert == '') $insert = basename($_SERVER['REQUEST_URI']);	
$insert_no_ext = substr($insert,0,strrpos($insert,'.'));
if ($insert_no_ext == '') $insert_no_ext = $insert; // folders, etc

do_header();
@include ($corz_root.'/inc/header.php'); // you'll probably have your own header

/*	remember to include the mail-mashing function, or you'll get an error, level "notice".
	just include mail-mash.php somewhere on your page (header is good) */

echo '
<!--beautifully caught by 404, the non-existant file file, from corz.org-->
<div class="small-space">&nbsp;</div>
<div class="container">
<div class="content-wide">
	<div class="two-column">
		<div class="left-column">
		<img src="../images/spill.jpg">
	  	<BR>Oops! Looks like the cat spilled coffee over my computer and I lost this page.
			<h2>',$message_1,'</h2>
			If you\'re certain that a page <em>should</em> be here, please <a href="',$email_addy,'?subject=404%20-%20',rawurlencode($_SERVER['REQUEST_URI']),'" title="your valuable feedback is appreciated. thanks">tell ',$me,'</a> about it. Alternatively, click <a href="/" 
			title="up to the site root">here</a> for some real links.
		</div>
		<div class="right-column">
			<div class="error">404</div>
		</div>
	</div>
	<div class="tiny-space">&nbsp;</div>';

/*
	okay, let's search for the document..   */
	
// init..
$level = 0;
$count = 0;
$links_array = array();

// do it..
scan_site();

// jump on single hit right now? (experimental)
// why not scrub buffer and send a 301? could be optional: $jump_method = ... //:2do
if (($count == 1) and ($jump_on_single_hit)) {
	echo '<meta http-equiv="refresh" content="',$time_to_jump,';URL=',$full_name,'">';
}

do_result('out');



// corz.org footer thang. use yer own..
@include ($corz_root.'/inc/footerx.php');

/*
	gotta leave my link in, that's the deal!	*/
echo'
	<div class="toplink"><a href="http://corz.org/engine?section=php" onclick="window.open(this.href); return false;"
	title="the non-existant file file.. 404, from corz.org">get the source for 404</a></div>
</div>
</body>
</html>
';


// show the corzoogle search form..
function corzoogle_box() {
global $cz_location, $cz_img_location, $insert_no_ext, $message_4;
	$insert_no_ext = strip_stuff($insert_no_ext);
	echo '
<div class="centered">
	<div class="small-space">&nbsp;</div>
	<h4>',$message_4,'</h4>

	<a href="http://corz.org/corzoogle.php" onclick="window.open(this.href); return false;" title="corzoogle locates!
(opens in a new window - Apple-click (Shift|Ctrl-click on peecees) for a new tab instead)">
	<img src="',$cz_img_location,'" alt="corzoogle locates!" /></a><br /> 
	<br />
	<form method="get" action="',$cz_location,'">
		<div class="form">
			<input type="text" name="q" size="21" maxlength="256" value="',$insert_no_ext,'" />
			&nbsp;
			<input type="submit" value="do it!" />
		</div>
	</form>
</div>';
}


/*
function:scan_site()
for more comments, see corzoogle.php  spider() */
function scan_site() {
global $do_debug, $exact_match, $extentions, $fuzzy_match, $ignore, $insert, $insert_no_ext, $level, $partial_match, $scan_path;

	if (!$exact_match) $insert = $insert_no_ext;
	for ($search=0,$search_path=''; $search <= $level; $search++) { 
		$search_path .= $scan_path[$search];
		$search_path = str_replace($ignore, '', $search_path);
	}
	
	$dirhandle = opendir($search_path);
	while ($file = readdir($dirhandle)) {

		if ($file{0} != '.') {
		
			if (is_file($search_path.$file)) {
				$fext = substr($file,strrpos($file,'.')); 
				$itsname = basename($file);
				$short_name = substr($itsname, 0, 0 - strlen($fext));

				if (($partial_match) and (in_array($fext, $extentions) and (@stristr($file, $insert)))) {
						do_result($search_path.$file);
				}		
/*
for tweaking..
echo '<pre>itsname:' .$itsname.'</pre>';//:debug
echo '<pre>short_name:' .$short_name.'</pre>';//:debug
echo '<pre>lev:' .levenshtein($short_name, $insert).'</pre>';//:debug
echo '<pre>similar_text:' .similar_text($short_name, $insert).'</pre>';//:debug
echo '<br />';
*/

				elseif ($fuzzy_match) {
					if (in_array($fext, $extentions) 
						// first we test if a single change gives a match
						and (similar_text($short_name, $insert) == strlen($short_name)-1)
							// and test that it's a single replacement..
							and levenshtein($short_name, $insert) == 1) {
							// using two tests allows us to match for dodgy, non letter
							// characters and makes things more accurate.
						do_result($search_path.$file);
					}
				} else {
					// non-fuzzy or partial match..
					if (in_array($fext, $extentions) and (@stristr($itsname, $insert))) {
						do_result($search_path.$file);
					}
				}

			
			} elseif (is_dir($search_path.$file)) { 
				$scan_path[++$level] = ($file.'/');
				scan_site();
				$level--;
			}
		}
	}
}/*	end function:scan_site()
*/


/*
function do_result()	*/
function do_result($file) {
global $count, $corz_domain, $full_name, $links_page, $links_are_full, $links_array, $scan_path;

	if ($file == 'out') {
		// output the page
		foreach($links_array as $link) {
			$links_page .= $link;
		}
	} else {
		$count++;
		$display_name = $title = basename($file);
		$full_name = str_replace($scan_path{0},'http://'.$corz_domain.'/',$file);
		if ($links_are_full) { $display_name = $full_name; }
		array_push($links_array, '<a href="'.$full_name.'" title="'.$display_name.'">'.$display_name.'</a><br />');
	}
}/*	end function do_result()
*/


/*
function strip_stuff() 	*/
function strip_stuff($string) {
	
	$nonos = array('.','..',' .'.'. ',',',';','[',']','*','~','#','&','?','$','%','+','=','»','«');
	$stripped = str_replace($nonos, ' ', $string);	// remove undesirables
	
	return trim($stripped);
}/*
end function strip_stuffing() 	*/


function do_init() {
global $corz_root;
	if (stristr(@$_SERVER['HTTP_ACCEPT'],'application/xhtml+xml')) {
		$doc_content = 'application/xhtml+xml';
	} else {
		// read: "Internet Explorer"
		$doc_content = 'text/html';
	}
	$corz_root = $_SERVER['DOCUMENT_ROOT'];
}


function do_header() {
global $doc_content, $corz_root, $fourohfour_version;
	echo '<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="',$doc_content,'; charset=utf-8" />
<title>another beautifully caught "page not found" by the 404.php, the intelligent error handler v',$fourohfour_version,'..</title>
<meta name="description" content="corz org 404 page.. intelligent 404 handling with seek-and-return. the non-existant file file" />
<meta name="keywords" content="404,php,404 error,error handler,auto-scan,auto-find,source code available" />'; 
@include ($corz_root.'/inc/metadata.php'); 
echo '
<style type="text/css">
/*<![CDATA[*/
@import "/err/err.css"; 
@import "err.css"; /* in case - you can fix this */
/*]]>*/
</style>
</head>
<body>'; 
}




/*
	changes..
	
	I thought I might start keeping changes under the scripts themselves.
	it doesn't cost us anything. php will ignore this.

		1.7
		incorporated partial matching and fuzzy matching; produces great results.

		cleaned up some xhtml output


		1.6.5
		Added some fuzzy matching for the file scan. A sorta request.
		
		this is a highly specialized tweak, but works great as per request.
		you can play around with things to get different results, but as it stands, 
		g-dip will match g_dip.jpg, and in my own mirror, tempz_piles will match
		tempx_piles.jpg, etc. This can be enabled/disabled from a preference called
		$fuzzy_match.


		1.6.2-1.6.4
		just minor things.

		1.6.2:
		Fixed some potential bugs in initialisation.

		1.6.1:
		XHTML 1.0 Strict compliance. Nice.

		1.6:
		404 will now strip characters from the input string for entry into the corzoogle
		search box. for instance, a 404 for mama.mia.php will now enter "mama mia" into
		the search box, instead of "mama.mia" which would likely produce a lot less hits.
		corzoogle, of course, takes the dot into account

		Added some information to the readme up top, including important notes about
		editing the redirections. I discovered this the hard way.	*/

?>