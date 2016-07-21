<?php
/**
 * MiniMax1 functions and definitions
 *
 * @link https://codex.wordpress.org/Theme_Development
 *
 * @since MiniMax1 1.0
 */

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
	wp_enqueue_script('minimax1-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', '3.3.6', true);
}
