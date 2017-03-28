<?php
/**
 * Groupby Lab Tester Plugin
 *
 * You can find the Hands-on Advanced Lab here: https://knowthecode.io/labs/get-posts-by-terms
 *
 * @package     UpTechLabs\KnowTheCode\GroupbyLab
 * @author      hellofromTonya
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Groupby Lab Tester Plugin
 * Plugin URI:  https://gitlab.com/knowthecode/Groupby-Lab-Tester
 * Lab URI:     https://knowthecode.io/labs/get-posts-by-terms
 * Description: Know the Code Hands-on Advanced Lab - demonstrating approaches to get posts grouped by their terms.
 * Version:     1.0.0
 * Author:      hellofromTonya
 * Author URI:  https://uptechlabs.io
 * Text Domain: groupby_lab
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

namespace UpTechLabs\KnowTheCode\GroupbyLab;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Cheatin&#8217; uh?' );
}

/**
 * Setup the plugin's constants.
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_constants() {
	$plugin_url = plugin_dir_url( __FILE__ );
	if ( is_ssl() ) {
		$plugin_url = str_replace( 'http://', 'https://', $plugin_url );
	}

	define( 'GROUPBY_LAB_URL', $plugin_url );
	define( 'GROUPBY_LAB_DIR', plugin_dir_path( __DIR__ ) );
}

/**
 * Launch the plugin
 *
 * @since 1.0.0
 *
 * @return void
 */
function launch() {
	init_constants();

	require_once( 'src/tester.php' );
}

if ( ! is_admin() ) {
	launch();
}
