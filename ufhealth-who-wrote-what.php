<?php
/**
 * Plugin Name: UF Health Who Wrote What
 * Plugin URI: https://ufhealth.org/
 * Description: Allows admins to see what a user has written by content type in the users table.
 * Version: 1.0
 * Text Domain: ufhealth-who-wrote-what
 * Domain Path: /lang
 * Author: Chris Wiegman
 * Author URI: https://ufhealth.org/
 * License: GPLv2
 *
 * @package UFHealth\who_wrote_what
 */

define( 'UFHEALTH_WHO_WROTE_WHAT_VERSION', '1.0' );
define( 'UFHEALTH_WHO_WROTE_WHAT_URL', plugin_dir_url( __FILE__ ) );

add_action( 'plugins_loaded', 'ufhealth_who_wrote_what_loader' );

/**
 * Load plugin functionality.
 */
function ufhealth_who_wrote_what_loader() {

	// Remember the text domain.
	load_plugin_textdomain( 'ufhealth-who-wrote-what', false, dirname( dirname( __FILE__ ) ) . '/languages' );

}
