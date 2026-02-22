<?php
/**
 * Plugin Name: Simple Podcasting
 * Version: 0.1.0
 * Plugin URI:
 * Description: Podcasting the way it's meant to be. No mess, no fuss - just you and your content taking over the world. Fork of SSP.
 * Author: Victor Kariuki
 * Author URI:
 * Requires PHP: 7.4
 * Requires at least: 5.3
 * Tested up to: 6.7
 *
 * Text Domain: seriously-simple-podcasting
 *
 * @package Simple Podcasting
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SSP_VERSION', '0.1.0' );
define( 'SSP_PLUGIN_FILE', __FILE__ );
define( 'SSP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'SSP_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

// This fork does not receive updates from WordPress.org; hide "new version available" notices.
$ssp_plugin_basename = plugin_basename( __FILE__ );
add_filter( 'pre_set_site_transient_update_plugins', function ( $value ) use ( $ssp_plugin_basename ) {
	if ( isset( $value->response ) && is_object( $value ) ) {
		unset( $value->response[ $ssp_plugin_basename ] );
	}
	return $value;
} );
add_filter( 'site_transient_update_plugins', function ( $value ) use ( $ssp_plugin_basename ) {
	if ( isset( $value->response ) && is_object( $value ) ) {
		unset( $value->response[ $ssp_plugin_basename ] );
	}
	return $value;
} );

if ( ! defined( 'SSP_CASTOS_APP_URL' ) ) {
	define( 'SSP_CASTOS_APP_URL', 'https://app.castos.com/' );
}
if ( ! defined( 'SSP_CASTOS_EPISODES_URL' ) ) {
	define( 'SSP_CASTOS_EPISODES_URL', 'https://episodes.castos.com/' );
}
if ( ! defined( 'SSP_CPT_PODCAST' ) ) {
	define( 'SSP_CPT_PODCAST', 'podcast' );
}

require SSP_PLUGIN_PATH . 'vendor/autoload.php';

require_once SSP_PLUGIN_PATH . 'php/includes/ssp-functions.php';

ssp_app();
