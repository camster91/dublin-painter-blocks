<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'acf/init', 'dp_register_quote_form_fields' );
function dp_register_quote_form_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) return;
	acf_add_local_field_group( array(
		'key' => 'group_dp_quote_form',
		'title' => 'Quote Form',
		'fields' => array(
			// Tab: Content
			array( 'key' => 'tab_qf_content', 'label' => 'Content', 'type' => 'tab', 'placement' => 'left' ),
			array( 'key' => 'field_qf_badge', 'label' => 'Badge Text', 'name' => 'badge_text', 'type' => 'text', 'default' => 'Free Quote' ),
			array( 'key' => 'field_qf_heading', 'label' => 'Heading', 'name' => 'heading', 'type' => 'text', 'default' => 'Get Your Free Estimate' ),
			array( 'key' => 'field_qf_subheading', 'label' => 'Subheading', 'name' => 'subheading', 'type' => 'text', 'default' => 'Takes 60 seconds. No obligation.' ),
			array( 'key' => 'field_qf_benefits', 'label' => 'Benefits List', 'name' => 'benefits', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add Benefit', 'max' => 6, 'sub_fields' => array(
				array( 'key' => 'field_qf_benefit_text', 'label' => 'Text', 'name' => 'text', 'type' => 'text', 'default' => '100% free, no obligation' ),
			) ),
			// Tab: Form
			array( 'key' => 'tab_qf_form', 'label' => 'Form', 'type' => 'tab', 'placement' => 'left' ),
			array( 'key' => 'field_qf_submit_text', 'label' => 'Submit Button Text', 'name' => 'submit_text', 'type' => 'text', 'default' => 'Get Free Quote' ),
			array( 'key' => 'field_qf_form_endpoint', 'label' => 'Form Endpoint URL', 'name' => 'form_endpoint', 'type' => 'url', 'default' => '', 'instructions' => 'Leave empty for default WP AJAX handler. Or use Formspree/external endpoint.' ),
			array( 'key' => 'field_qf_success_msg', 'label' => 'Success Message', 'name' => 'success_message', 'type' => 'text', 'default' => 'Thank you! We will get back to you within 24 hours.' ),
			array( 'key' => 'field_qf_error_msg', 'label' => 'Error Message', 'name' => 'error_message', 'type' => 'text', 'default' => 'Something went wrong. Please try again or call us directly.' ),
		),
		'location' => array( array( array( 'param' => 'block', 'operator' => '==', 'value' => 'dp/quote-form' ) ) ),
	) );
}
