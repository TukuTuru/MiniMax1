<?php
/**
 * The Main Template File.
 *
 * A WordPress Theme falls back to index.php if no other Template is available
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @since MiniMax1 1.0.0
 */

/** 
 * Make this template a Page Template
 *
 * Toolset Layouts requires a PAGE Template to recognize the the_ddlayouts() call.
 * But WordPress does not like a Page Template Name in the index.php.
 * (other wise it will produce 2 Templates, one the native "Default" and the other the "Template Name")
 * Therefore we make the index.php a Page Template ONLY when Layouts is active.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/page-templates/
 */

if ( defined( 'WPDDL_VERSION' ) && is_ddlayout_assigned()) { 
/* Template Name: Main Template */


	/** 
	 * Include Toolset Layouts the_ddlayout()
	 *
	 * Toolset Layouts requires a PAGE Template to include the the_ddlayouts() call.
	 * We include it dynamically to not force the usage of Layouts even if active.
	 * We include the Layout Call only if a Layout is assigned to content.
	 * We also include the necessary header and footer.
	 * Those could be custom header-layouts and footer-layouts files.
	 *
	 * @link https://wp-types.com/documentation/user-guides/layouts-theme-integration/
	 */

	get_header( ); //Call 'header-layouts' if you plan to style the header differntly
		the_ddlayout( ); // Load a defualt 'default-layout-slug'. Layout must exist
	get_footer( ); //Call 'footer-layouts' if you plan to style the footer differntly

}

/** 
 * If Layouts is not active load a minimal WordPress default Loop.
 * We call the header and footer as well
 */
else {
	get_header();
	if ( have_posts() ) { 
		while ( have_posts() ) { 
			the_post();?>
			<div class="minimax1 container">
			<?php if (defined('WPV_VERSION') && (get_post_meta($post->ID, '_views_template', true) > 0)) {
				the_content();
			}
			else { ?>
				<div class="row">
					<div class="col-md-12">
						<h1><?php the_title();?></h1>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<p><?php the_content();?></p>
					</div>
				</div><?php
			}?>
			</div><!-- #minimax1 container --><?php 
		}
	}
	else {?>
		<div class="minimax1 container">
			<div class="row">
				<div class="col-md-12">
					<h1>No Posts</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<p>No Contents</p>
				</div>
			</div>
		</div><!-- #minimax1 container --><?php 
	}
	get_footer();
}

