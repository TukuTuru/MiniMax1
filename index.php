<?php
/**
 * The Main Template File.
 *
 * A WordPress Theme falls back to index.php if no other Template is available
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @since MinimaX1 1.0.0
 */

/** 
 * Integrate Toolset Layouts PLugin 
 *
 * Make this template a Page Template
 *
 * Toolset Layouts requires a PAGE Template to recognize the the_ddlayouts() call.
 * But WordPress does not like a Page Template Name in the index.php.
 * (other wise it will produce 2 Templates, one the native "Default" and the other the "Template Name")
 * Therefore we make the index.php a Page Template ONLY when Layouts is active.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/page-templates/
 * 
 * @since MinimaX1 1.0.0
 */

if ( defined( 'WPDDL_VERSION' ) && is_ddlayout_assigned()) { 
/* Template Name: Main Template */


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

/** 
 * If Layouts is not active load a minimal WordPress default Loop.
 * We call the header and footer as well
 * 
 * @link https://codex.wordpress.org/The_Loop
 *
 * @since MinimaX1 1.0.0
 */
else {
	get_header();?>
	<!-- open the main container-->
	<div class="container-fluid">
	    <div class="row">
			<?php 
			if ( is_active_sidebar( 'sidebar-1' ) ) {?>
				<div class="col-md-9"><?php 
			}
			else {?>
				<div class="col-md-12"><?php
			}
				if ( have_posts() ) { 
					while ( have_posts() ) {
						the_post();
						/** 
				 		 * If Toolset Views is active load only the_content().
				 		 * Views replaces the_content() with its Content Templates.
						 * Views stores the assigned Contnet Template in a hidden _views_template Field
			 			 * We do load only the above "MinimaX1 container".
				 		 * We use is_wpv_content_template_assigned() that is defined in Views
				 		 * But we could also simply get_post_meta _views_template > 0
				 		 *
						 * @link https://developer.wordpress.org/reference/functions/the_content/
			 			 * @link https://wp-types.com/documentation/user-guides/theme-support-for-content-templates/
						 * 
						 * @since MinimaX1 1.0.0
						 */
						if (defined('WPV_VERSION') && (is_wpv_content_template_assigned() == true)) {
							the_content();
							edit_post_link('edit: "' . $post->post_title . '"');
						}
						/** 
				 		 * If Toolset Views is not active load the_title() and the_content().
						 * We load some more Bootsrap HTML to make things nice.
			 			 * 
			 			 * @link https://codex.wordpress.org/Function_Reference/the_title
				 		 *
				 		 * @since MinimaX1 1.0.0
						 */
						else { ?>
							<div class="row">
							    <div class="col-md-12"><?php
							        if (is_archive() == true) {?>
							        	<h1><?php the_archive_title();?></h1>
							        	<?php echo paginate_links();
							        }
							        if (is_search() ) {?>
							        	<h1><?php _e('Search Results for: ', 'MinimaX1');echo get_search_query();?></h1>
							        	<?php echo paginate_links();
							        }?>
							    </div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<h1><?php the_title();?></h1>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<p><?php the_content();?></p>
									<p><?php edit_post_link('Edit: "' . $post->post_title . '"');?></p>
								</div>
							</div><?php
						}
					}
				}
				/** 
			 	 * If no Posts are found output a default nothing found message
			 	 * Again we load complete Bootstrap HTML
			 	 *
			 	 * @since MiniMax 1.0.0
			 	 */
				else {
					if (is_search() ) {?>
						<div class="row">
						    <div class="col-md-12">
						    	<h1><?php _e('Search Results for: ', 'MinimaX1');echo get_search_query();?></h1>
						    </div>
						</div><?php
					}?>
					<div class="row">
						<div class="col-md-12">
							<h2><?php _e('No Posts', 'MinimaX1');?></h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<p><?php _e('No Contents', 'MinimaX1');?></p>
						</div>
					</div><?php
				}?>
			</div>
			<?php get_sidebar();?>
		</div>
	</div><!-- #container -->
	<?php get_footer();
}