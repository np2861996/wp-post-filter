<?php
/**
 * Plugin Name: SimpleWP Post Filter
 * Plugin URI: https://github.com/np2861996/wp-post-filter.git
 * Description: Quick, easy, advance feature rich filterable post display plugin. 
 * Author: BeyondN
 * Text Domain: simple-post-filter
 * Version: 1.0.0
 *
 * @package Simple_Post_Filter
 * @author BeyondN
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Basic plugin definitions
 * 
 * @package Simple_Post_Filter
 * @since 1.0.0
 */

// Plugin  Version.
if( ! defined( 'WPPF_VERSION' ) ) {
	define( 'WPPF_VERSION', '1.0.0' ); 
}

// Plugin  Name.
if( ! defined( 'WPPF_NAME' ) ) {
    define( 'WPPF_NAME', 'WP Post Filter' ); 
}

// Plugin Path.
if ( ! defined( 'WPPF_PLUGIN_PATH' ) ) {
	define( 'WPPF_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}

// Plugin URL.
if ( ! defined( 'WPPF_PLUGIN_URL' ) ) {
	define( 'WPPF_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

// Plugin Basename.
if( ! defined( 'WPPF_PLUGIN_BASENAME' ) ) {
    define( 'WPPF_PLUGIN_BASENAME', plugin_basename( __FILE__ ) ); 
}

// Plugin Post Type Name.
if( ! defined( 'WPPF_POST_TYPE' ) ) {
	define( 'WPPF_POST_TYPE', 'post' );
}

// Plugin Taxonomy Name
if( ! defined( 'WPPF_CAT' ) ) {
	define( 'WPPF_CAT', 'category' );
}

// Plugin Directory 
if( ! defined( 'WPPF_DIR' ) ) {
	define( 'WPPF_DIR', dirname( __FILE__ ) ); 
}

// Plugin URL 
if( ! defined( 'WPPF_URL' ) ) {
	define( 'WPPF_URL', plugin_dir_url( __FILE__ ) ); 
}

// Admin Class File
require_once( WPPF_DIR . '/admin/class-wppf-admin.php' );

// Functions file
require_once( WPPF_DIR . '/frontend/wppf-functions.php' );

// Script Class
require_once( WPPF_DIR . '/frontend/class-wppf-scripts.php' );

// Shortcode File grid
require_once( WPPF_DIR . '/frontend/shortcode/wppf-post-grid.php' );

// Shortcode File filter
require_once( WPPF_DIR . '/frontend/shortcode/wppf-postgrid-filter.php' );

