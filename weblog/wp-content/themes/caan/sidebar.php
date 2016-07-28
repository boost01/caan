

<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
?>
<!-- begin sidebar -->

<div id="menu">

<ul>
<?php 	/* Widgetized sidebar, if you have the plugin installed. */
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
	<?php wp_list_categories('title_li=' . __('Categories:')); ?>

 </li>
 <li id="archives"><?php _e('Archives:'); ?>
	<ul>
	 <?php wp_get_archives('type=monthly'); ?>
	</ul>
 </li>
 <li id="meta"><?php _e('Links:'); ?>
	<ul>
		<?php wp_register(); ?>
		<li><?php wp_loginout(); ?></li>
		<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
	</ul>
 </li>
<?php endif; ?>

</ul>

</div>
<!-- end sidebar -->
