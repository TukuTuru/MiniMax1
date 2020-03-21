<?php
/**
 * This file ensures automatic update notifications to the WordPress Update UI
 * Thanks to https://kaspars.net for the original idea
 * @link https://kaspars.net/blog/automatic-updates-for-plugins-and-themes-hosted-outside-wordpress-extend
 *
 * @since MinimaX1 2.0.0
 */

//Pull updates from 
$minimax_api_url = 'https://updates.tukutoi.com';

/**
 * Define Theme Data
 */
$minimax_theme_data = wp_get_theme();
$minimax_theme_version = $minimax_theme_data->get( 'Version' );    
$minimax_theme_base = 'MinimaX1';

/**
 * Check if updates are available
 * @param  [type] $checked_data [description]
 * @return [type] $checked_data [description]
 */
function minimax_check_for_update($checked_data) {
	global $wp_version, $minimax_theme_version, $minimax_theme_base, $minimax_api_url;

	$minimax_request = array(
		'slug' => $minimax_theme_base,
		'version' => $minimax_theme_version 
	);
	// Start checking for an update
	$minimax_send_for_check = array(
		'body' => array(
			'action' => 'theme_update', 
			'request' => serialize($minimax_request),
			'api-key' => md5(get_bloginfo('url'))
		),
		'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo('url')
	);
	$minimax_raw_response = wp_remote_post($minimax_api_url, $minimax_send_for_check);
	if (!is_wp_error($minimax_raw_response) && ($minimax_raw_response['response']['code'] == 200))
		$minimax_response = unserialize($minimax_raw_response['body']);

	// Feed the update data into WP updater
	if (!empty($minimax_response)) 
		$checked_data->response[$minimax_theme_base] = $minimax_response;

	return $checked_data;
}

//Hook to site_transient_update_themes
add_filter('pre_set_site_transient_update_themes', 'minimax_check_for_update');
