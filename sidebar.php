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

<div class="col-md-3">
    <div class="well">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
</div><!-- #secondary -->