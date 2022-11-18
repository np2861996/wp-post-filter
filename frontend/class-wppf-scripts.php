<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package Simple_Post_Filter
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class WPPF_Script {

	function __construct() {

		// Action to add script at admin side
		add_action( 'admin_enqueue_scripts', array($this, 'wppf_admin_script') );

		// Action to add style at front side
		add_action( 'wp_enqueue_scripts', array($this, 'wppf_plugin_style') );

		// Action to add script at front side
		add_action( 'wp_enqueue_scripts', array($this, 'wppf_plugin_script') );
	}

	/**
	 * Function to register admin scripts and styles
	 * 
	 * @package Simple_Post_Filter
	 * @since 1.0.0
	 */
	function wppf_register_admin_assets() {

		/* Styles */
		// Registring admin css
		wp_register_style( 'wppf-admin-style', WPPF_URL.'assets/css/wppf-admin.css', array(), WPPF_VERSION );
		wp_enqueue_style( 'wppf-admin-style');

		/* Scripts */
		// Registring admin script
		wp_register_script( 'WPPF-admin-script', WPPF_URL.'assets/js/wppf-admin.js', array('jquery'), WPPF_VERSION, true );

	}

	/**
	 * Function to add script at admin side
	 * 
	 * @package Simple_Post_Filter
	 * @since 1.0.0
	 */
	function wppf_admin_script( $hook ) {

		$this->wppf_register_admin_assets();

		// Enqueue admin script 
		if( $hook == 'toplevel_page_wppf-admin' ) {
			wp_enqueue_script( 'wppf-admin-script' );
		}
	}

	/**
	 * Function to add script at front side
	 * 
	 * @package Simple_Post_Filter
	 * @since 1.0.0
	 */
	function wppf_plugin_style(){

		// Registring and enqueing public css
		wp_register_style( 'wppf-public-style', WPPF_URL.'assets/css/wppf-public.css', array(), WPPF_VERSION );
		wp_enqueue_style( 'wppf-public-style');
	}

	/**
	 * Function to add script at front side
	 * 
	 * @package Simple_Post_Filter
	 * @since 1.0.0
	 */
	function wppf_plugin_script() {

		global $post;


			// Registring isotope js
			if( ! wp_script_is( 'wppf-isotope-js', 'registered' ) ) {
				wp_register_script( 'wppf-isotope-js', WPPF_URL.'assets/js/isotope.pkgd.min.js', array('jquery', 'imagesloaded'), WPPF_VERSION, true );
			}
			wp_enqueue_script( 'wppf-isotope-js' );

		// Registring public js
		wp_register_script( 'wppf-public-js', WPPF_URL.'assets/js/wppf-public.js', array('jquery'), WPPF_VERSION, true );		
		wp_enqueue_script( 'wppf-public-js' );
	}
}

$wppf_script = new WPPF_Script();