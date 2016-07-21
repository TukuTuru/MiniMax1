<?php
/**
 * MiniMax1 functions and definitions
 *
 * @link https://codex.wordpress.org/Theme_Development
 *
 * @since MiniMax1 1.0
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
if ( ! function_exists( 'minimax1_setup' ) ) {
	function minimax1_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on minimax, use a find and replace
		 * to change 'minimax' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'minimax1', get_template_directory() . '/languages' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in 2 locations.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'minimax1' ),
			'secondary' => esc_html__( 'Secondary Menu', 'minimax1' ),

		) );

		/*
	 	 * Declare WooCommerce Support.
	 	 */
	    add_theme_support( 'woocommerce' );



	}
}
add_action( 'after_setup_theme', 'minimax1_setup' );

/**
 * Integrate WooCommerce.
 * @link http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
 *
 */
	/* 
	 * First unhook the WooCommerce wrappers
	 */
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

	/* 
	 * Then hook in our own functions to display the wrappers our theme requires:
	 */
	add_action('woocommerce_before_main_content', '<div class="minimax1 container">', 10);
	add_action('woocommerce_after_main_content', '</div><!-- #minimax1 container -->', 10);

/**
 * Enqueue scripts and styles
 */
function minimax1_styles() {
	//Enqueue the MiniMax1 Main Style Sheet
	wp_enqueue_style( 'style', get_stylesheet_uri() );
        
	//Enqueue Bootstrap CSS
	wp_enqueue_style( 'minimax1-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', '3.3.6', 'all' );
        
	/*
	 * @todo Enqueue FontAwesome
     *
     */
	//wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.2.0', 'all' );
    }
add_action( 'wp_enqueue_scripts', 'minimax1_styles' );

function minimax1_scripts() {
	//Enqueue Bootstrap JS
	wp_enqueue_script('minimax1-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true);
}