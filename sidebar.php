<?php
/**
 * The sidebar containing the main widget area.
 *
 * @since MinimaX1 1.0.1
 */

/** 
 * If widgets are not used (sidebar is not active), return.
 *
 * @link https://codex.wordpress.org/Function_Reference/is_active_sidebar
 */
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}


/** 
 * If widgets are used (sidebar is active), produce HTML and call sidebar.
 *
 * @link https://codex.wordpress.org/Function_Reference/dynamic_sidebar
 */
?>

<div id="secondary" class="col-md-3 ">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->