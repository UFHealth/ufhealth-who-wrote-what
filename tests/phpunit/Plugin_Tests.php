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
		'class-who-wrote-what.php',
	);

	/**
	 * Test module constructor.
	 */
	public function test_constructor() {

		// Setup.
		$plugin = new Base\Who_Wrote_What();

		\WP_Mock::expectFilterAdded( 'manage_users_columns', array( $plugin, 'filter_manage_users_columns' ) );
		\WP_Mock::expectFilterAdded(
			'manage_users_custom_column',
			array(
				$plugin,
				'filter_manage_users_custom_column',
			),
			10,
			3
		);

		// Act.
		$plugin->__construct();

		// Verify.
		$this->assertConditionsMet();

	}
}
