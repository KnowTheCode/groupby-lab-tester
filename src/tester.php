<?php
/**
 * Tester File - here is where we play.
 *
 * @package     UpTechLabs\KnowTheCode\GroupbyLab
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GPL-2.0+
 */
namespace UpTechLabs\KnowTheCode\GroupbyLab;

add_action( 'wp_footer', __NAMESPACE__ . '\run_our_tests' );
function run_our_tests() {

	is_test_running( true );

	load_the_approach_file( false );

	d( '************ OUR TESTS ARE STARTING ************' );

	d( Approach\get_posts_grouped_by_term( 'post', 'category' ) );

	echo 'Our tests hit the database ' . get_number_of_database_hits() . ' times';
	
	d( '************ OUR TESTS ARE DONE ************' );

	is_test_running( true );
}

/**
 * Checks if the test is running.  You can also toggle it.
 *
 * @since 1.0.0
 *
 * @param bool $toggle
 *
 * @return bool
 */
function is_test_running( $toggle = false ) {
	static $is_running = false;

	if ( $toggle ) {
		$is_running = ! $is_running;
	}

	return $is_running;
}

/**
 * Load the approach file.
 *
 * @since 1.0.0
 *
 * @param bool $use_fast_way
 *
 * @return void
 */
function load_the_approach_file( $use_fast_way = false ) {
	$filename = $use_fast_way
		? 'approach/fast-way.php'
		: 'approach/slow-way.php';

	require_once( $filename );
}


/**
 * Record the database hit.
 *
 * @since 1.0.0
 *
 * @param string $query
 * @param string $type
 *
 * @return void
 */
function record_database_hit( $query, $type = 'get_method' ) {
	if ( ! is_test_running() ) {
		return;
	}

	get_number_of_database_hits( true );

	var_dump( 'hit the database ' . $type );

	d( $query );
}

/**
 * Get the number of database hits.
 *
 * @since 1.0.0
 *
 * @param bool $increment Set to true to increment the count.
 *
 * @return int
 */
function get_number_of_database_hits( $increment = false ) {
	static $number_of_hits;

	if ( is_null( $number_of_hits ) ) {
		$number_of_hits = 0;
	}

	if ( $increment ) {
		$number_of_hits++;
	}

	return $number_of_hits;
}
