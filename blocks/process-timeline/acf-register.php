<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'acf/init', 'dp_register_process_timeline_fields' );
function dp_register_process_timeline_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) return;
	acf_add_local_field_group( array(
		'key' => 'group_dp_process',
		'title' => 'Process Timeline',
		'fields' => array(
			array( 'key' => 'field_pt_heading', 'label' => 'Heading', 'name' => 'heading', 'type' => 'text', 'default' => 'Our Process' ),
			array( 'key' => 'field_pt_steps', 'label' => 'Steps', 'name' => 'steps', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add Step', 'max' => 6, 'sub_fields' => array(
				array( 'key' => 'field_pt_step_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text', 'default' => 'Consultation' ),
				array( 'key' => 'field_pt_step_desc', 'label' => 'Description', 'name' => 'description', 'type' => 'textarea', 'rows' => 2, 'default' => 'Free on-site assessment and detailed quote.' ),
			) ),
		),
		'location' => array( array( array( 'param' => 'block', 'operator' => '==', 'value' => 'dp/process-timeline' ) ) ),
	) );
}
