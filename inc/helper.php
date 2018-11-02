<?php 

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function sina_blogpost_categories(){
	$terms = get_terms( [ 
		'taxonomy' => 'category',
		'hide_empty' => true,
	] );

	$options = [];
	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
		foreach ( $terms as $term ) {
			$options[ $term->term_id ] = $term->name;
		}
	}

	return $options;
}