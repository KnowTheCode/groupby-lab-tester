<?php
/**
 * Slow (non-performant) approach to grouping posts by their term.
 *
 * @package     UpTechLabs\KnowTheCode\GroupbyLab\Approach
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GPL-2.0+
 */
namespace UpTechLabs\KnowTheCode\GroupbyLab\Approach;

use WP_Query;

/**
 * Get the posts grouped by terms using a non-performant
 * approach of first:
 *
 * 1. Get the terms
 * 2. Loop through each term and do a separate query to grab posts.
 *
 * @since 1.0.0
 *
 * @param string $post_type_name Post type to limit query to
 * @param string $taxonomy_name Taxonomy to limit query to
 *
 * @return array|false
 */
function get_posts_grouped_by_term( $post_type_name, $taxonomy_name ) {
	$terms = get_terms( array(
		'taxonomy' => $taxonomy_name,
	) );

	if ( empty( $terms ) || is_wp_error( $terms ) ) {
		return;
	}

	$groups = array();

	foreach ( $terms as $term ) {

		$query = new WP_Query( array(
			'post_type' => $post_type_name,
			'tax_query' => array(
				array(
					'taxonomy' => $taxonomy_name,
					'field'    => 'slug',
					'terms'    => array( $term->slug ),
					'operator' => 'IN',
				),
			),
		) );

		$groups[ $term->term_id ] = array(
			'term_id'   => $term->term_id,
			'term_name' => $term->name,
			'term_slug' => $term->slug,
			'posts'     => $query->posts,
		);
	}

	wp_reset_postdata();

	return $groups;
}
