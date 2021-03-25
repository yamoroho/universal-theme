<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package universal-example
 */

if ( ! is_active_sidebar( 'sidebar-search' ) ) {
	return;
}
?>

<aside class="sidebar-front-page sidebar-search">
	<?php dynamic_sidebar( 'sidebar-search' ); ?>
</aside><!-- #secondary -->
