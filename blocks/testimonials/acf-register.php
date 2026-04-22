<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'acf/init', 'dp_register_testimonials_fields' );
function dp_register_testimonials_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) return;
	acf_add_local_field_group( array(
		'key' => 'group_dp_testimonials',
		'title' => 'Testimonials',
		'fields' => array(
			array( 'key' => 'field_test_heading', 'label' => 'Heading', 'name' => 'heading', 'type' => 'text', 'default' => 'What Our Dublin Clients Say' ),
			array( 'key' => 'field_test_max_reviews', 'label' => 'Max Reviews', 'name' => 'maxReviews', 'type' => 'number', 'default' => 4, 'min' => 1, 'max' => 12 ),
			array( 'key' => 'field_test_only_featured', 'label' => 'Only Featured', 'name' => 'onlyFeatured', 'type' => 'true_false', 'default' => 0, 'ui' => 1 ),
		),
		'location' => array( array( array( 'param' => 'block', 'operator' => '==', 'value' => 'dp/testimonials' ) ) ),
	) );
}
