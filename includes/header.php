<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<style type="text/css" media="screen">
@import url( <?php bloginfo('stylesheet_url'); ?> );
</style>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_get_archives('type=monthly&format=link'); ?>
<?php //comments_popup_script(); // off by default ?>
<?php wp_head(); ?>
<style type="text/css">
h1 { font-size: 24px; }
body
{
		font: 13px tahoma;
		background: #ffffff;
		padding: 0em;
}
</style>
	    <link rel="stylesheet" type="text/css" href="http://www.caancatmobile.org/test/includes/menu1.css" />
	    <script type="text/javascript" src="http://www.caancatmobile.org/includes/ie5.js"></script>
	    <script type="text/javascript" src="http://www.caancatmobile.org/includes/DropMenu1.js"></script>

</head>

<body <?php body_class(); ?>>
<div id="rap">
<h1 id="header"><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h1>
    <table cellspacing="0" cellpadding="0" id="menu1" class="dm1" width=800px>
    <tr>
        <td>
            <a class="item1 left" href="http://www.caancatmobile.org/test/index.php">Home Page</a>
        </td>
        <td>
            <a class="item1" href="javascript:void(0)">About</a>
            <div class="section">
                <a class="item2" href="http://www.caancatmobile.org/test/index.php?action=about">About Us</a>
                <a class="item2" href="http://www.caancatmobile.org/test/index.php?action=charlie">Charlie</a>
            </div>
        </td>
        <td>
            <a class="item1" href="javascript:void(0)">Programs</a>
            <div class="section">
                <a class="item2" href="http://www.caancatmobile.org/test/index.php?action=catmobile">CatMOBILE</a>
                <a class="item2" href="http://www.caancatmobile.org/test/index.php?action=northstar">Northstar</a>
                <a class="item2" href="http://www.caancatmobile.org/test/index.php?action=feral">Feral Cats</a>
                <a class="item2" href="http://www.caancatmobile.org/test/index.php?action=spayneuter">Spay/Neuter Clinc</a>
            </div>
        </td>
        <td>
            <a class="item1" href="javascript:void(0)">Goodies</a>
            <div class="section">
                <a class="item2" href="http://www.caancatmobile.org/test/index.php?action=gallery">Photo Gallery</a>
                <a class="item2" href="http://www.caancatmobile.org/test/index.php?action=sale">Items For Sale</a>
            </div>
        </td>
        <td>
			<a class="item1" hfref="jacascript:void(0)">News</a>
			<div class="section">
            	<a class="item2" href="http://www.caancatmobile.org/test/index.php?action=news">In the News</a>
				<a class="item2" href="http://www.caancatmobile.org/test/wordpress/">Our Blog</A>
				<a class="item2" href="http://www.caancatmobile.org/test/index.php?action=eventlist">Events listings</A>
			</div>
        </td>

        <td>
            <a class="item1" href="javascript:void(0)">You Can Help Us</a>
            <div class="section">
                <a class="item2" href="http://www.caancatmobile.org/test/index.php?action=volunteers">Volunteer Opportunities</a>
                <a class="item2" href="http://www.caancatmobile.org/test/index.php?action=adoptions">Adoptions Centre</a>
            </div>
        </td>
		<td>
			<a class="item1" href="javascript:void(0)">We Can Help You</a>
			<dic class="section">
				<a class="item2" href="http://www.caancatmobile.org/test/index.php?action=links">Links</a>
				<a class="item2" href="http://www.caancatmobile.org/test/index.php?action=faq">FAQ</a.
			</div>
		</td>
 		<td>
	    	<a class="item1" href="http://www.caancatmobile.org/test/index.php?action=contact">Contact Us</a>
	    </td>
		<td>
			<a class="item1 right" href="http://www.caancatmobile.org/test/index.php?action=map">Site Map</a>
		</td>
	   </tr>
	</table>

    <script type="text/javascript">
    var dm1 = new DropMenu1('menu1');
    dm1.position.top = -1;
    dm1.init();
    </script>


<div id="content">
<!-- end header -->
