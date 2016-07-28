<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
?>
<div id="center">
	<script type="text/javascript">

	document.getElementById("center").style.paddingLeft =document.documentElement.clientWidth/2-400
	</script>
  <div align=center style="position: absolute; width: 800px; text-align: left; background-image:url(http://www.caancatmobile.org/images/background.jpg)">
<?PHP
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php the_date('','<h2>','</h2>'); ?>

<div <?php post_class() ?> id="post-<?php the_ID(); ?>" sytle="width: 800px">
	 <h3 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>

	    
	<div class="meta">by <?php the_author() ?> @ <?php the_time() ?></div>

	<div class="storycontent">

		<?php the_content(__('(more...)')); ?>
	</div>

	<div class="feedback">
		<?php wp_link_pages(); ?>
	</div>

</div>

<A HREF="javascript:history.back();">back</A>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php posts_nav_link(' &#8212; ', __('&laquo; Newer Posts'), __('Older Posts &raquo;')); ?>

<?php get_footer(); ?>
</div>