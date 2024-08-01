<?php

/*
	
@package sunsettheme
-- Single Post Template

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header text-center">

		<?php the_title('<h1 class="entry-title">', '</h1>'); ?>

		<div class="entry-meta">
			<?php echo sunset_posted_meta(); ?>
		</div>

	</header>

	<div class="entry-content clearfix">

		<?php the_content(); ?>

	</div><!-- .entry-content -->

	<div class="sunset-shareThis">
		<h4>Share This</h4>
		<?php
		$title = get_the_title();
		$permalink = get_permalink();

		$twitterHandler = (get_option('twitter_handler') ? '&amp;via=' . esc_attr(get_option('twitter_handler')) : '');
		$twitter = 'https://twitter.com/intent/tweet?text=Hey this for reading!' . $title . '&amp;url=' . $permalink . $twitterHandler . '';
		$facebook = 'https://www.facebook.com/sharer/sharer.php?=' . $permalink;
		$google = 'https://plus.google.com/share?url=' . $permalink;
		?>
		<ul>
			<li><a href="<?php echo $twitter ?>" rel="nofollow" target="_blank"><span class="sunset-icon sunset-twitter"></span></a></li>
			<li><a href="<?php echo $facebook ?>" rel="nofollow" target="_blank"><span class="sunset-icon sunset-facebook"></span></a></li>
			<li><a href="<?php echo $google ?>" rel="nofollow" target="_blank"><span class="sunset-icon sunset-googleplus"></span></a></li>
		</ul>
	</div><!-- .sunset-share-->
	<footer class="entry-footer">
		<?php echo sunset_posted_footer(); ?>
	</footer>

</article>