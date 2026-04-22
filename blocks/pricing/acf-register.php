<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'acf/init', 'dp_register_pricing_fields' );
function dp_register_pricing_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) return;
	acf_add_local_field_group( array(
		'key' => 'group_dp_pricing',
		'title' => 'Pricing',
		'fields' => array(
			array( 'key' => 'field_pr_badge', 'label' => 'Badge Text', 'name' => 'badge_text', 'type' => 'text', 'default' => 'Transparent Pricing' ),
			array( 'key' => 'field_pr_heading', 'label' => 'Heading', 'name' => 'heading', 'type' => 'text', 'default' => 'Painting Packages for Every Budget' ),
			array( 'key' => 'field_pr_subheading', 'label' => 'Subheading', 'name' => 'subheading', 'type' => 'text', 'default' => 'No hidden fees. No surprises. Choose the package that fits your project.' ),
			array( 'key' => 'field_pr_tiers', 'label' => 'Pricing Tiers', 'name' => 'tiers', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add Tier', 'max' => 4, 'sub_fields' => array(
				array( 'key' => 'field_pr_tier_name', 'label' => 'Name', 'name' => 'name', 'type' => 'text', 'default' => 'Premium' ),
				array( 'key' => 'field_pr_tier_price', 'label' => 'Price', 'name' => 'price', 'type' => 'text', 'default' => 'From €3,500' ),
				array( 'key' => 'field_pr_tier_badge', 'label' => 'Featured Badge', 'name' => 'featured_badge', 'type' => 'text', 'default' => 'Most Popular' ),
				array( 'key' => 'field_pr_tier_features', 'label' => 'Features', 'name' => 'features', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add Feature', 'max' => 8, 'sub_fields' => array(
					array( 'key' => 'field_pr_tier_feat_text', 'label' => 'Feature', 'name' => 'text', 'type' => 'text', 'default' => 'Premium paint finish' ),
				) ),
				array( 'key' => 'field_pr_tier_featured', 'label' => 'Featured', 'name' => 'featured', 'type' => 'true_false', 'default' => 0, 'ui' => 1 ),
				array( 'key' => 'field_pr_tier_cta_text', 'label' => 'CTA Text', 'name' => 'cta_text', 'type' => 'text', 'default' => 'Get Quote' ),
				array( 'key' => 'field_pr_tier_cta_url', 'label' => 'CTA URL', 'name' => 'cta_url', 'type' => 'url', 'default' => '#quote-section' ),
			) ),
		),
		'location' => array( array( array( 'param' => 'block', 'operator' => '==', 'value' => 'dp/pricing' ) ) ),
	) );
}
