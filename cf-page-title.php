<?php
/*
Plugin Name: CF Page Title 
Plugin URI: http://crowdfavorite.com/wordpress/ 
Description: Outputs smart page title display. 
Version: 1.0 
Author: Crowd Favorite
Author URI: http://crowdfavorite.com
*/

// ini_set('display_errors', '1'); ini_set('error_reporting', E_ALL);

function cf_page_title($sep = '-') {
	return _cf_page_title(false, $sep);
}

function _cf_page_title($wp_title = false, $sep = '-') {
	$sep = ' '.trim($sep).' ';
	$site = get_bloginfo('name');
	if (is_front_page()) {
		$desc = trim(get_bloginfo('description'));
		if (!empty($desc)) {
			$title = esc_html($site).$sep.esc_html($desc);
		}
		else {
			$title = esc_html($site);
		}
	}
	else {
		if (!$wp_title) {
			$title = wp_title($sep, false, 'right').esc_html($site);
		}
		else {
			// $sep is already appended by wp_title() in the input to the filter
			$title = $wp_title.esc_html($site);
		}
	}
	return apply_filters('cf_page_title', $title);
}

function cf_wp_title($title, $sep) {
	return _cf_page_title($title, $sep);
}
add_filter('wp_title', 'cf_wp_title', 10, 2);

//a:23:{s:11:"plugin_name";s:13:"CF Page Title";s:10:"plugin_uri";N;s:18:"plugin_description";s:33:"Outputs smart page title display.";s:14:"plugin_version";s:3:"1.0";s:6:"prefix";s:5:"cfpgt";s:12:"localization";s:13:"cf-page-title";s:14:"settings_title";N;s:13:"settings_link";N;s:4:"init";b:0;s:7:"install";b:0;s:9:"post_edit";b:0;s:12:"comment_edit";b:0;s:6:"jquery";b:0;s:6:"wp_css";b:0;s:5:"wp_js";b:0;s:9:"admin_css";b:0;s:8:"admin_js";b:0;s:8:"meta_box";b:0;s:15:"request_handler";b:0;s:6:"snoopy";b:0;s:11:"setting_cat";b:0;s:14:"setting_author";b:0;s:11:"custom_urls";b:0;}

?>