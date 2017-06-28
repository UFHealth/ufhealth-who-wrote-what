<?php
/**
 * Adds functions and hooks to filter User table
 *
 * @since 1.0
 *
 * @package UFHealth
 *
 * @author Chris Wiegman <cwiegman@ufl.edu>
 */

namespace UFHealth\who_wrote_what;

/**
 * Filter manage_users_columns
 *
 * Adds a column to the user table for each public post type.
 *
 * @since 1.0
 *
 * @param array $columns Array of user table columns.
 *
 * @return array Filtered array of user table columns
 */
function filter_manage_users_columns( $columns ) {

	$args = array(
		'public' => true,
	);

	$post_types = get_post_types( $args, 'objects' );

	foreach ( $post_types as $post_type ) {

		if ( 'Posts' !== $post_type->label ) {
			$columns[ $post_type->name ] = $post_type->label;
		}
	}

	return $columns;

}

add_filter( 'manage_users_columns', __NAMESPACE__ . '\filter_manage_users_columns' );
