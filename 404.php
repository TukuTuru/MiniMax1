<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @since MinimaX1 1.0.1
 */

if ( defined( 'WPDDL_VERSION' ) && is_ddlayout_assigned()) { 
	/** 
	 * Include Toolset Layouts the_ddlayout() call
	 *
	 * Toolset Layouts requires a PAGE Template to include the the_ddlayouts() call.
	 * We include it dynamically to not force the usage of Layouts even if active.
	 * We include the Layout Call only if a Layout is assigned to content.
	 * We also include the necessary header and footer.
	 * Those could be custom header-layouts and footer-layouts files.
	 *
	 * @link https://wp-types.com/documentation/user-guides/layouts-theme-integration/
	 * 
	 * @since MinimaX1 1.0.0
	 */

	get_header( ); //Call 'header-layouts' if you plan to style the header differntly
		the_ddlayout( ); // Load a defualt 'default-layout-slug'. Layout must exist
	get_footer( ); //Call 'footer-layouts' if you plan to style the footer differntly

}

else {
get_header(); ?>
	<div class="container-fluid">		
		<div class="row">
			<?php 
			if ( is_active_sidebar( 'sidebar-1' ) ) {?>
				<div class="col-md-9"><?php 
			}
			else {?>
				<div class="col-md-12"><?php
			}?>
					<h1 class="text-center"><?php _e( 'Error 404', 'MinimaX1' ); ?></h1>
					<a href="<?php esc_url( home_url( '/' ) )?>"><h3 class="text-center"><?php _e('Go Home', 'MinimaX1');?></h3></a>
				</div>
			<?php get_sidebar();?>
		</div>
	</div><!-- #container -->
<?php get_footer(); 
}