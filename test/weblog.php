<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head><title>The Blog</title>
<link rel="alternate" href="/feed/" title="My RSS feed" type="application/rss+xml">
<style TYPE="text/css">

.thanks_top {
background-image:url('./images/notepaper_top.gif');
background-repeat: no-repeat;
}
.thanks_middle {
background-image:url('./images/notepaper_tile.gif');
background-repeat: repeat-y;
}
.thanks_bottom {
background-image:url('./images/notepaper_bottom.gif');
background-repeat: no-repeat;
}
P {
  margin-left: 15px;
}
</style>
<!-- page content starts here -->
<?PHP
require('./wordpress/wp-blog-header.php');
?>
<h1>The C.A.A.N. Blog</H1>
<?PHP
if (have_posts()) : while (have_posts()) : the_post(); ?>

<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
	 <h3 class="storytitle"><?php the_title(); ?></h3>
	<?php the_author() ?> on <?php the_date() ?></div>

	<div class="storycontent">
		<?php the_content(__('(more...)')); ?>
	</div>

	<div class="feedback">
		<?php wp_link_pages(); ?>
	</div>

</div>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts have been entered yet.'); ?></p>
<?php endif; ?></div>