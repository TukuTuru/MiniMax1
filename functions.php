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

		/**
		 * This theme uses wp_nav_menu() in 1 location.
		 *
		 * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/
		 *
		 * @since MinimaX1 1.0.0
		 */
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'MinimaX1' )
		) );

		/**
	 	 * Declare WooCommerce Support.
	 	 *
	 	 * @link http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
	 	 *
	 	 * @since MinimaX1 1.0.0
	 	 */
	    add_theme_support( 'woocommerce' );

	    /**
	     * Declare Toolset Layouts Support
	     *
	     * @link https://wp-types.com/documentation/user-guides/layouts-theme-integration/ > Telling Layouts your theme is integrated
	     **/
		add_filter( 'ddl-is_integrated_theme', 'MinimaX1_is_integrated_with_layouts' ); 
	}
}
add_action( 'after_setup_theme', 'MinimaX1_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function MinimaX1_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'MinimaX1' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'MinimaX1_widgets_init' );

/**
 * Integrate WooCommerce.
 *
 * @link http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
 *
 * @since MinimaX1 1.0.0
 */
	/* 
	 * First unhook the WooCommerce wrappers
	 */
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

	/* 
	 * Then hook in our own functions to display the wrappers our theme requires:
	 */
	add_action('woocommerce_before_main_content', '<div class="container">', 10);
	add_action('woocommerce_after_main_content', '</div><!-- #container -->', 10);

	
/**
 * Callback function to integrate Toolset Layouts
 *
 * @link https://wp-types.com/documentation/user-guides/layouts-theme-integration/ > Telling Layouts your theme is integrated
 */
function MinimaX1_is_integrated_with_layouts() {
    return true;
}

/**
 * Enqueue CSS styles and Fonts
 *
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 *
 * @since MiniMax 1.0.0
 */
function MinimaX1_styles() {        
	//Enqueue Bootstrap CSS
	wp_enqueue_style( 'MinimaX1-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', '3.3.6', 'all' );
        
	/**
	 * @todo Enqueue FontAwesome
     *
     */
	//wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.2.0', 'all' );

	//Enqueue the MinimaX1 Main Style Sheet
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
	//Enqueue Bootstrap JS and add jQuery Dependency
	wp_enqueue_script('MinimaX1-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true);
}
add_action( 'wp_enqueue_scripts', 'MinimaX1_scripts' );

/** 
 * Require Function for MinimaX1 Classes path 
 *
 * @link http://php.net/manual/en/function.require-once.php
 *
 * @since MinimaX1 1.0.0
 */
function MinimaX1_require_once($MinimaX1_class) {
    require_once(__DIR__ . '/' .'MinimaX1-classes' . '/' . $MinimaX1_class . '.class.php');
}
