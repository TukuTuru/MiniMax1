<?php
/**
 * The sidebar containing the main widget area.
 *
 * @since MinimaX1 1.0.1
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="col-md-3 ">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->