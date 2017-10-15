<?php

// ini_set( 'display_errors', 1 ); ini_set( 'error_reporting', -1 );

// Make sure there is an action first
if ( ! isset( $_REQUEST['action'] ) ) {
	die( '0' );
}

// Force a short-init since we just need core WP, not the entire framework stack
define( 'SHORTINIT', true );

// Build the wp-load.php path from a plugin/theme
$root_dir = dirname( dirname( __DIR__ ) );

// ** Use root_dir to define ABSPATH if it has not been defined yet ** //
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', sprintf( '%s/public/', $root_dir ) );
}

// Require the wp-load.php file (which loads wp-config.php and bootstraps WordPress)
require_once sprintf( '%s/wp-load.php', ABSPATH );
require_once sprintf( '%s/wp-includes/plugin.php', ABSPATH );

// ========= ! DO NOT EDIT THE CODE ABOVE ! ========= //


/**
 * This is just an example of a secrept WordPress feature called "fast ajax"
 */
add_action( 'wp_ajax_example', function () {
	// Include the now instantiated global $wpdb Class for use
	global $wpdb;

	// Example: Retrieve and display the number of users.
	$results = $wpdb->get_results( "SELECT option_name, option_value FROM {$wpdb->options} WHERE option_name LIKE 'blog%'", ARRAY_A );
	die( json_encode( [
		'error' => false,
		'data' => $results,
	] ) );
} );

// Replace the example above OR add it here

// ========= ! DO NOT EDIT THE CODE BELOW ! ========= //

try {
	$action_name = sprintf( 'wp_ajax_%s', $_REQUEST['action'] );
	do_action( $action_name );
	die( '0' );
} catch ( \Exception $ex ) {
	die( json_encode( [
		'error' => false,
		'message' => $ex->getMessage(),
	] ) );
}
