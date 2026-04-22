<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'acf/init', 'dp_register_faq_accordion_fields' );
function dp_register_faq_accordion_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) return;
	acf_add_local_field_group( array(
		'key' => 'group_dp_faq',
		'title' => 'FAQ Accordion',
		'fields' => array(
			array( 'key' => 'field_faq_heading', 'label' => 'Heading', 'name' => 'heading', 'type' => 'text', 'default' => 'Frequently Asked Questions' ),
			array( 'key' => 'field_faq_questions', 'label' => 'Questions', 'name' => 'questions', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add Question', 'max' => 12, 'sub_fields' => array(
				array( 'key' => 'field_faq_q', 'label' => 'Question', 'name' => 'question', 'type' => 'text', 'default' => 'How long does a typical painting project take?' ),
				array( 'key' => 'field_faq_a', 'label' => 'Answer', 'name' => 'answer', 'type' => 'textarea', 'rows' => 3, 'default' => 'Most interior projects take 2-5 days.' ),
			) ),
		),
		'location' => array( array( array( 'param' => 'block', 'operator' => '==', 'value' => 'dp/faq-accordion' ) ) ),
	) );
}
