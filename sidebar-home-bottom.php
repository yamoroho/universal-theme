<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package universal-example
 */

if ( ! is_active_sidebar( 'main-sidebar-bottom' ) ) {
	return;
}
?>

<aside class="sidebar-front-page">
	<?php dynamic_sidebar( 'main-sidebar-bottom' ); ?>
</aside><!-- #secondary -->
