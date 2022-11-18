<?php
/**
 * Admin Class
 *
 * Handles the Admin side functionality of plugin
 *
 * @package Simple_Post_Filter
 * @since 1.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class WPPF_Admin {
	function __construct() {
		// Action to register admin menu
		add_action( 'admin_menu', array($this, 'wppf_register_menu'), 12 );
	}

	/**
	 * Function to register admin menus
	 * 
	 * @package Simple_Post_Filter
	 * @since 1.0.0
	 */
	function wppf_register_menu() {
		// How It Work Page
		add_menu_page( __('WP Post Filter', 'wp-post-filter'), 
		__('Post Filter', 'wp-post-filter'), 'manage_options', 'wppf-admin',  
		array($this, 'wppf_settings_page_markup'), 'dashicons-sticky', 10 );
	}

	/**
	 * Getting Started Page Html
	 * 
	 * @package Simple_Post_Filter
	 * @since 1.0
	 */
	function wppf_settings_page_markup() {
		include_once( WPPF_DIR . '/admin/template/admin-setting-page.php' );
	}
}
$wppf_admin = new WPPF_Admin();