<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'acf/init', 'dp_register_cta_section_fields' );
function dp_register_cta_section_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) return;
	acf_add_local_field_group( array(
		'key' => 'group_dp_cta',
		'title' => 'CTA Section',
		'fields' => array(
			array( 'key' => 'field_cta_heading', 'label' => 'Heading', 'name' => 'heading', 'type' => 'text', 'default' => 'Ready to Transform Your Space?' ),
			array( 'key' => 'field_cta_subheading', 'label' => 'Subheading', 'name' => 'subheading', 'type' => 'text', 'default' => 'Get your free, no-obligation quote today.' ),
			array( 'key' => 'field_cta_text', 'label' => 'Button Text', 'name' => 'ctaText', 'type' => 'text', 'default' => 'Get a Free Quote' ),
			array( 'key' => 'field_cta_url', 'label' => 'Button URL', 'name' => 'ctaUrl', 'type' => 'url', 'default' => '#quote-section' ),
			array( 'key' => 'field_cta_phone_text', 'label' => 'Phone Button Text', 'name' => 'phoneText', 'type' => 'text', 'default' => 'Call 01 234 5678' ),
			array( 'key' => 'field_cta_phone_url', 'label' => 'Phone Button URL', 'name' => 'phoneUrl', 'type' => 'url', 'default' => 'tel:+35312345678' ),
		),
		'location' => array( array( array( 'param' => 'block', 'operator' => '==', 'value' => 'dp/cta-section' ) ) ),
	) );
}
