<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
/**
 * @package WordPress
 * @subpackage CAAN_Theme
 */
?>
<body>
	<div style="margin: 0 auto;margin-top:13px; width: 800px; text-align: left;">
	<?PHP
	include ("../menu.php");
	?>
	</div>
<div style="position: relative; top: -22px; margin: 0 auto; width: 800px; text-align: left; background-image:url(http://www.caancatmobile.org/images/background.jpg)">
<?PHP
get_header();
?>
<H1><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></H1>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php the_date('','<h2>','</h2>'); ?>

<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
	 <h3 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>

	    
	<div class="meta">
		by <?php the_author() ?> @ <?php the_time() ?>
	</div>

	<div class="storycontent">

		<?php the_content(__('(more...)')); ?>
	</div>

	<div class="feedback">
		<?php wp_link_pages(); ?>
	</div>

</div>


<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php posts_nav_link(' &#8212; ', __('&laquo; Newer Posts'), __('Older Posts &raquo;')); ?>
<BR>
<BR>
	<?PHP include ("../sig.php"); ?>
<BR>
<BR>
<BR>
<?php get_footer(); ?>

