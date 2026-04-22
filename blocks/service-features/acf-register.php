<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'acf/init', 'dp_register_service_features_fields' );
function dp_register_service_features_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) return;
	acf_add_local_field_group( array(
		'key' => 'group_dp_service_features',
		'title' => 'Service Features',
		'fields' => array(
			array( 'key' => 'field_sf_badge', 'label' => 'Badge Text', 'name' => 'badge_text', 'type' => 'text', 'default' => 'Our Expertise' ),
			array( 'key' => 'field_sf_heading', 'label' => 'Heading', 'name' => 'heading', 'type' => 'text', 'default' => 'Professional Painting Services' ),
			array( 'key' => 'field_sf_subheading', 'label' => 'Subheading', 'name' => 'subheading', 'type' => 'text', 'default' => '' ),
			array( 'key' => 'field_sf_features', 'label' => 'Features', 'name' => 'features', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add Feature', 'max' => 4, 'sub_fields' => array(
				array( 'key' => 'field_sf_feat_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text', 'default' => 'Expert Interior Decorating' ),
				array( 'key' => 'field_sf_feat_desc', 'label' => 'Description', 'name' => 'description', 'type' => 'textarea', 'rows' => 2, 'default' => 'Flawless luxury finishes with our signature dustless sanding technology.' ),
				array( 'key' => 'field_sf_feat_image', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium' ),
				array( 'key' => 'field_sf_feat_bullets', 'label' => 'Key Points', 'name' => 'bullets', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add Point', 'max' => 5, 'sub_fields' => array(
					array( 'key' => 'field_sf_feat_bullet_text', 'label' => 'Point', 'name' => 'text', 'type' => 'text', 'default' => 'Premium materials' ),
				) ),
			) ),
		),
		'location' => array( array( array( 'param' => 'block', 'operator' => '==', 'value' => 'dp/service-features' ) ) ),
	) );
}
