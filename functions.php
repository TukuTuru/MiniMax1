<?php
/**
 * The functions and definitions
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @since MinimaX1 1.0.0
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/after_setup_theme
 *
 * @since MinimaX1 1.0.0
 */
if ( ! function_exists( 'MinimaX1_setup' ) ) {
	function MinimaX1_setup() {

		/**
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_theme_support/
		 * @link https://codex.wordpress.org/Title_Tag
		 *
		 * @since MinimaX1 1.0.0
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 *
		 * @since MinimaX1 1.0.0
		 */
		add_theme_support( 'post-thumbnails' );
	}
}
add_action( 'after_setup_theme', 'MinimaX1_setup' );

/**
 * Callback function to integrate Toolset Layouts
 *
 * @link https://wp-types.com/documentation/user-guides/layouts-theme-integration/ > Telling Layouts your theme is integrated
 */
function MinimaX1_is_integrated_with_layouts() {
    return true;
}
add_filter('ddl-is_integrated_theme', 'MinimaX1_is_integrated_with_layouts');

/**
 * Enqueue CSS styles and Fonts
 *
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 *
 * @since MiniMax 1.0.0
 */
function MinimaX1_styles() {        
	//Here you can enqueue your own style, for example:
	//wp_enqueue_style( 'MinimaX1-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', '3.3.6', 'all' );

	//Enqueue the MinimaX1 Main Style Sheet. Leave this last in the cascade, so if you add CSS to the Theme it applies.
	wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'MinimaX1_styles' );

/** 
 * Enqueue JS Scripts
 *
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 *
 * @since MinimaX1 1.0.0
 */
function MinimaX1_scripts() {
	//Here you can enqueue your won JS scripts, for example
	//wp_enqueue_script('MinimaX1-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true);

	//The theme has no own JS file, if you need one, enqueue one.

}
add_action( 'wp_enqueue_scripts', 'MinimaX1_scripts' );
