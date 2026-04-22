<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'acf/init', 'dp_register_trust_badges_fields' );
function dp_register_trust_badges_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) return;
	acf_add_local_field_group( array(
		'key' => 'group_dp_trust_badges',
		'title' => 'Trust Badges',
		'fields' => array(
			array( 'key' => 'field_tb_badges', 'label' => 'Badges', 'name' => 'badges', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add Badge', 'max' => 6, 'sub_fields' => array(
				array( 'key' => 'field_tb_badge_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'select', 'choices' => array( 'star' => 'Star', 'shield' => 'Shield', 'map' => 'Map Pin', 'clock' => 'Clock', 'award' => 'Award', 'check' => 'Check' ), 'default' => 'star' ),
				array( 'key' => 'field_tb_badge_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text', 'default' => '4.9/5 Rating' ),
				array( 'key' => 'field_tb_badge_text', 'label' => 'Description', 'name' => 'text', 'type' => 'text', 'default' => 'Verified Reviews' ),
			) ),
		),
		'location' => array( array( array( 'param' => 'block', 'operator' => '==', 'value' => 'dp/trust-badges' ) ) ),
	) );
}
