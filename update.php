<?php
/**
 * This file ensures automatic update notifications to the WordPress Update UI
 * Thanks to https://kaspars.net for the original idea
 * @link https://kaspars.net/blog/automatic-updates-for-plugins-and-themes-hosted-outside-wordpress-extend
 *
 * @since MinimaX1 2.0.0
 */

//Pull updates from 
$api_url = 'https://updates.tukutoi.com';

/**
 * Gather Theme Data
 */
if(function_exists('wp_get_theme')){
    $theme_data = wp_get_theme(get_option('template'));
    $theme_version = $theme_data->Version;  
} else {
    $theme_data = get_theme_data( TEMPLATEPATH . '/style.css');
    $theme_version = $theme_data['Version'];
}    
$theme_base = $theme_data['Name'];

/**
 * Check if updates are available
 * @param  [type] $checked_data [description]
 * @return [type] $checked_data [description]
 */
function check_for_update($checked_data) {
	global $wp_version, $theme_version, $theme_base, $api_url;

	$request = array(
		'slug' => $theme_base,
		'version' => $theme_version 
	);
	// Start checking for an update
	$send_for_check = array(
		'body' => array(
			'action' => 'theme_update', 
			'request' => serialize($request),
			'api-key' => md5(get_bloginfo('url'))
		),
		'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo('url')
	);
	$raw_response = wp_remote_post($api_url, $send_for_check);
	if (!is_wp_error($raw_response) && ($raw_response['response']['code'] == 200))
		$response = unserialize($raw_response['body']);

	// Feed the update data into WP updater
	if (!empty($response)) 
		$checked_data->response[$theme_base] = $response;

	return $checked_data;
}

//Hook to site_transient_update_themes
add_filter('site_transient_update_themes', 'check_for_update');
