<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'acf/init', 'dp_register_service_areas_fields' );
function dp_register_service_areas_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) return;
	acf_add_local_field_group( array(
		'key' => 'group_dp_service_areas',
		'title' => 'Service Areas',
		'fields' => array(
			array( 'key' => 'field_sa_badge', 'label' => 'Badge Text', 'name' => 'badge_text', 'type' => 'text', 'default' => 'Coverage Map' ),
			array( 'key' => 'field_sa_heading', 'label' => 'Heading', 'name' => 'heading', 'type' => 'text', 'default' => 'Proudly Serving All of Dublin' ),
			array( 'key' => 'field_sa_subheading', 'label' => 'Subheading', 'name' => 'subheading', 'type' => 'text', 'default' => 'We cover every corner of Dublin and surrounding counties within 30km.' ),
			array( 'key' => 'field_sa_areas', 'label' => 'Areas', 'name' => 'areas', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add Area', 'max' => 30, 'sub_fields' => array(
				array( 'key' => 'field_sa_area_name', 'label' => 'Area Name', 'name' => 'name', 'type' => 'text', 'default' => 'Dublin City Centre' ),
			) ),
		),
		'location' => array( array( array( 'param' => 'block', 'operator' => '==', 'value' => 'dp/service-areas' ) ) ),
	) );
}
