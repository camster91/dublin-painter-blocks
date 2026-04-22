<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'acf/init', 'dp_register_quote_form_fields' );
function dp_register_quote_form_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) return;
	acf_add_local_field_group( array(
		'key' => 'group_dp_quote_form',
		'title' => 'Quote Form',
		'fields' => array(
			array( 'key' => 'field_qf_heading', 'label' => 'Heading', 'name' => 'heading', 'type' => 'text', 'default' => 'Get Your Free Estimate' ),
			array( 'key' => 'field_qf_subheading', 'label' => 'Subheading', 'name' => 'subheading', 'type' => 'text', 'default' => 'Takes 60 seconds. No obligation.' ),
		),
		'location' => array( array( array( 'param' => 'block', 'operator' => '==', 'value' => 'dp/quote-form' ) ) ),
	) );
}
