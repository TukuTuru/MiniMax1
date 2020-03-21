<?php

//Do not access directly
if (!defined('ABSPATH')) exit;

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
	/**
	 * Add logic for Mobile detection
	 *
	 * @since MinimaX1 2.0.0
	 * @link https://developer.wordpress.org/reference/functions/wp_is_mobile/
	 */
	if (!wp_is_mobile()){
		the_ddlayout( ); // Load a defualt 'default-layout-slug'. Layout must exist
	}
	else {
		/**
		 * Error 404 template can be styled for mobile 
		 */
		$assigned_layout_slug = '404-mobile';
		if ( ddl_layout_slug_exists($assigned_layout_slug) == 1 ) {
			the_ddlayout($assigned_layout_slug, array('post-content-callback' => '', 'allow_overrides' => 'false') );
		}
		else {
			the_ddlayout();
		}	
	}
	get_footer( ); //Call 'footer-layouts' if you plan to style the footer differntly
}

else {
get_header(); ?>
	<div class="container-fluid">		
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center"><?php _e( 'Error 404', 'MinimaX1' ); ?>
					
				</h1>
				<a href="<?php esc_url( home_url( '/' ) )?>">
					<h3 class="text-center"><?php _e('Go Home', 'MinimaX1');?></h3>
				</a>
			</div>
		</div>
	</div><!-- #container -->
<?php get_footer(); 
}
