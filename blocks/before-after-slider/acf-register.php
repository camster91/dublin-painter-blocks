<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'acf/init', 'dp_register_before_after_slider_fields' );
function dp_register_before_after_slider_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) return;
	acf_add_local_field_group( array(
		'key' => 'group_dp_ba_slider',
		'title' => 'Before/After Slider',
		'fields' => array(
			array( 'key' => 'field_ba_badge', 'label' => 'Badge Text', 'name' => 'badge_text', 'type' => 'text', 'default' => 'Real Results' ),
			array( 'key' => 'field_ba_heading', 'label' => 'Heading', 'name' => 'heading', 'type' => 'text', 'default' => 'See the Transformation' ),
			array( 'key' => 'field_ba_subheading', 'label' => 'Subheading', 'name' => 'subheading', 'type' => 'text', 'default' => 'Real projects. Real results. Drag the slider to compare.' ),
			array( 'key' => 'field_ba_columns', 'label' => 'Columns', 'name' => 'columns', 'type' => 'number', 'default' => 2, 'min' => 1, 'max' => 4 ),
			array( 'key' => 'field_ba_show_labels', 'label' => 'Show Labels', 'name' => 'showLabels', 'type' => 'true_false', 'default' => 1, 'ui' => 1 ),
			array( 'key' => 'field_ba_show_location', 'label' => 'Show Location', 'name' => 'showLocation', 'type' => 'true_false', 'default' => 1, 'ui' => 1 ),
			array( 'key' => 'field_ba_only_featured', 'label' => 'Only Featured', 'name' => 'onlyFeatured', 'type' => 'true_false', 'default' => 1, 'ui' => 1 ),
			array( 'key' => 'field_ba_max_projects', 'label' => 'Max Projects', 'name' => 'maxProjects', 'type' => 'number', 'default' => 4, 'min' => 1, 'max' => 12 ),
		),
		'location' => array( array( array( 'param' => 'block', 'operator' => '==', 'value' => 'dp/before-after-slider' ) ) ),
	) );
}
