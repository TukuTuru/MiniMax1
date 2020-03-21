<?php
/**
 * This file ensures automatic update notifications to the WordPress Update UI
 * Thanks to https://kaspars.net for the original idea
 * @link https://kaspars.net/blog/automatic-updates-for-plugins-and-themes-hosted-outside-wordpress-extend
 *
 * @since MinimaX1 2.0.0
 */

//Pull updates from 
$minimax1_api_url = 'https://updates.tukutoi.com';
set_site_transient('update_themes', null);
/**
 * Define Theme Data
 */
$minimax1_theme_data = wp_get_theme();
$minimax1_theme_version = $minimax1_theme_data->get( 'Version' );    
$minimax1_theme_base = 'MinimaX1';

/**
 * Check if updates are available
 * @param  [type] $minimax1_checked_data [description]
 * @return [type] $minimax1_checked_data [description]
 */
function minimax1_check_for_update($minimax1_checked_data) {
	global $wp_version, $minimax1_theme_version, $minimax1_theme_base, $minimax1_api_url;

	$minimax1_request = array(
		'slug' => $minimax1_theme_base,
		'version' => $minimax1_theme_version 
	);
	// Start checking for an update
	$minimax1_send_for_check = array(
		'body' => array(
			'action' => 'theme_update', 
			'request' => serialize($minimax1_request),
			'api-key' => md5(get_bloginfo('url'))
		),
		'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo('url')
	);
	$minimax1_raw_response = wp_remote_post($minimax1_api_url, $minimax1_send_for_check);
	if (!is_wp_error($minimax1_raw_response) && ($minimax1_raw_response['response']['code'] == 200))
		$minimax1_response = unserialize($minimax1_raw_response['body']);

	// Feed the update data into WP updater
	if (!empty($minimax1_response)) 
		$minimax1_checked_data->minimax1_response[$minimax1_theme_base] = $minimax1_response;

	return $minimax1_checked_data;
}

function minimax1_theme_api_callback($action, $args) {
	global $minimax1_theme_base, $minimax1_api_url, $minimax1_theme_version, $minimax1_api_url;
	
	if ($args->slug != $minimax1_theme_base)
		return false;
	
	// Get the current version

	$args->version = $minimax1_theme_version;
	$minimax1_request_string = prepare_request($action, $args);
	$minimax1_request = wp_remote_post($minimax1_api_url, $minimax1_request_string);

	if (is_wp_error($minimax1_request)) {
		$minimax1_response = new WP_Error('themes_api_failed', __('An Unexpected HTTP Error occurred during the API request.</p> <p><a href="?" onclick="document.location.reload(); return false;">Try again</a>'), $minimax1_request->get_error_message());
	} else {
		$minimax1_response = unserialize($minimax1_request['body']);
		
		if ($minimax1_response === false)
			$minimax1_response = new WP_Error('themes_api_failed', __('An unknown error occurred'), $minimax1_request['body']);
	}
	
	return $minimax1_response;
}

//Hook to site_transient_update_themes
add_filter('pre_set_site_transient_update_themes', 'minimax1_check_for_update');
// Take over the Theme info screen on WP multisite
add_filter('themes_api', 'minimax1_theme_api_callback', 10, 3);
