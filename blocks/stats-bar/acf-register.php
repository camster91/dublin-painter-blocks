<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'acf/init', 'dp_register_stats_bar_fields' );
function dp_register_stats_bar_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) return;
	acf_add_local_field_group( array(
		'key' => 'group_dp_stats_bar',
		'title' => 'Stats Bar',
		'fields' => array(
			array( 'key' => 'field_sb_stats', 'label' => 'Statistics', 'name' => 'stats', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add Stat', 'max' => 6, 'sub_fields' => array(
				array( 'key' => 'field_sb_stat_number', 'label' => 'Number', 'name' => 'number', 'type' => 'text', 'default' => '500+' ),
				array( 'key' => 'field_sb_stat_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text', 'default' => 'Projects Completed' ),
			) ),
		),
		'location' => array( array( array( 'param' => 'block', 'operator' => '==', 'value' => 'dp/stats-bar' ) ) ),
	) );
}
