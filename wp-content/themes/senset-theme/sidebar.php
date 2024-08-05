<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package senset-theme
 */

if (!is_active_sidebar('sunset-sidebar')) {
	return;
}
?>

<aside id="secondary" class="widget_area" rol="complementary">
	<div class="visible-xs">
		<?php
		wp_nav_menu(array(
			'theme_location' => 'primary',
			'container' => false,
			'menu_class' => 'nav navbar-nav navbar-collapse',
			'walker' => new Sunset_Walker_Nav_Primary()
		));
		?>
	</div>
	<?php dynamic_sidebar('sunset-sidebar'); ?>
</aside>