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
	<?php dynamic_sidebar('sunset-sidebar'); ?>
</aside>