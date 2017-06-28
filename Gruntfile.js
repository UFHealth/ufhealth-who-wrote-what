module.exports = function (grunt) {

	// Start out by loading the grunt modules we'll need
	require('load-grunt-tasks')(grunt);

	// Show elapsed time
	require('time-grunt')(grunt);

	grunt.initConfig(
		{

			/**
			 * Update translation file.
			 */
			makepot: {

				target: {
					options: {
						type:        'wp-plugin',
						domainPath:  '/languages',
						mainFile:    'ufhealth-who-wrote-what.php',
						potFilename: 'ufhealth-who-wrote-what.pot'
					}
				}
			},

			phpunit: {

				classes: {
					dir: 'tests/'
				},

				options: {

					bin:        './vendor/bin/phpunit',
					testSuffix: 'Tests.php',
					bootstrap:  'bootstrap.php',
					colors:     true

				}
			}
		}
	);

	// A very basic default task.
	grunt.registerTask('default', ['phpunit', 'makepot']);

};