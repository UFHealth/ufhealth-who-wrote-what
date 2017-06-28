<?php
/**
 * Unit Tests for the plugin code.
 *
 * Various tests to run against the WordPress Admin code.
 *
 * @since   1.0
 *
 * @author  Chris Wiegman <cwiegman@ufl.edu>
 *
 * @package UFHealth
 */

namespace UFHealth\who_wrote_what\Tests;

use UFHealth\who_wrote_what as Base;

/**
 * Class Plugin Tests
 */
class Admin_Tests extends Base\TestCase {

	/**
	 * Array of files needed for these tests
	 *
	 * @var array
	 */
	protected $testFiles = array(
		'cwho-wrote-what.php',
	);

	/**
	 * Test module constructor.
	 */
	public function test_setup() {

		// Setup.
		\WP_Mock::wpFunction( 'get_option', array(
			'args'   => 'better_yourls',
			'times'  => 2,
			'return' => array(),
		) );

		\WP_Mock::expectActionAdded( 'admin_enqueue_scripts', array( $admin, 'action_admin_enqueue_scripts' ) );
		\WP_Mock::expectActionAdded( 'admin_init', array( $admin, 'action_admin_init' ) );
		\WP_Mock::expectActionAdded( 'admin_menu', array( $admin, 'action_admin_menu' ) );
		\WP_Mock::expectFilterAdded( 'plugin_action_links', array( $admin, 'filter_plugin_action_links' ), 10, 2 );

		// Act.
		$admin->__construct();

		// Verify.
		$this->assertConditionsMet();

	}
}
