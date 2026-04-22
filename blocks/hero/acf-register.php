<?php
/**
 * Hero Block — ACF Field Group Registration
 *
 * Registers the ACF field group for the acf/hero block.
 * The block itself is registered via block.json (ACF 6.x auto-discovery).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'acf/init', 'dp_register_hero_fields' );

function dp_register_hero_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'      => 'group_dp_hero',
		'title'    => 'Hero Section',
		'fields'   => array(

			// Tab: Content
			array(
				'key'       => 'tab_hero_content',
				'label'     => 'Content',
				'type'      => 'tab',
				'placement' => 'left',
			),
			array(
				'key'     => 'field_hero_badge_text',
				'label'   => 'Badge Text',
				'name'    => 'badge_text',
				'type'    => 'text',
				'default' => '4.9/5 from 250+ Dublin Homeowners',
				'instructions' => 'The text shown next to the 5 gold stars.',
			),
			array(
				'key'     => 'field_hero_heading',
				'label'   => 'Main Heading',
				'name'    => 'heading',
				'type'    => 'text',
				'default' => 'Top-Rated Painters in Dublin.',
				'required' => 1,
			),
			array(
				'key'     => 'field_hero_heading_accent',
				'label'   => 'Heading Accent (Blue)',
				'name'    => 'heading_accent',
				'type'    => 'text',
				'default' => 'Fixed Quotes in 24h.',
				'instructions' => 'Appears on the second line in blue gradient. Leave empty for no accent.',
			),
			array(
				'key'     => 'field_hero_subheading',
				'label'   => 'Subheading',
				'name'    => 'subheading',
				'type'    => 'textarea',
				'rows'    => 3,
				'default' => "Don't settle for sloppy work or hidden fees. We provide flawless interior and exterior painting with premium materials, spotless clean-up, and a 2-year guarantee.",
			),

			// Tab: Buttons
			array(
				'key'       => 'tab_hero_buttons',
				'label'     => 'Buttons',
				'type'      => 'tab',
				'placement' => 'left',
			),
			array(
				'key'     => 'field_hero_cta_primary_text',
				'label'   => 'Primary Button Text',
				'name'    => 'cta_primary_text',
				'type'    => 'text',
				'default' => 'Get a Free Quote',
			),
			array(
				'key'     => 'field_hero_cta_primary_url',
				'label'   => 'Primary Button URL',
				'name'    => 'cta_primary_url',
				'type'    => 'url',
				'default' => '#quote-section',
			),
			array(
				'key'     => 'field_hero_cta_primary_type',
				'label'   => 'Primary Button Type',
				'name'    => 'cta_primary_type',
				'type'    => 'select',
				'choices' => array(
					'quote' => 'Quote (Green button)',
					'phone' => 'Phone (Green button with phone icon)',
				),
				'default' => 'quote',
			),
			array(
				'key'     => 'field_hero_cta_secondary_text',
				'label'   => 'Secondary Button Text',
				'name'    => 'cta_secondary_text',
				'type'    => 'text',
				'default' => 'Call 01 234 5678',
			),
			array(
				'key'     => 'field_hero_cta_secondary_url',
				'label'   => 'Secondary Button URL',
				'name'    => 'cta_secondary_url',
				'type'    => 'url',
				'default' => 'tel:+35312345678',
			),

			// Tab: Benefits
			array(
				'key'       => 'tab_hero_benefits',
				'label'     => 'Benefits',
				'type'      => 'tab',
				'placement' => 'left',
			),
			array(
				'key'      => 'field_hero_benefits',
				'label'    => 'Trust Benefits',
				'name'     => 'benefits',
				'type'     => 'repeater',
				'layout'   => 'table',
				'button_label' => 'Add Benefit',
				'max'      => 4,
				'sub_fields' => array(
					array(
						'key'   => 'field_hero_benefit_text',
						'label' => 'Benefit Text',
						'name'  => 'text',
						'type'  => 'text',
					),
				),
			),

			// Tab: Image
			array(
				'key'       => 'tab_hero_image',
				'label'     => 'Image',
				'type'      => 'tab',
				'placement' => 'left',
			),
			array(
				'key'           => 'field_hero_image',
				'label'         => 'Hero Image',
				'name'          => 'hero_image',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'large',
				'instructions'  => 'Recommended: 600×450px image of painters working or a beautiful painted house.',
			),

			// Tab: Floating Card
			array(
				'key'       => 'tab_hero_float',
				'label'     => 'Floating Card',
				'type'      => 'tab',
				'placement' => 'left',
			),
			array(
				'key'     => 'field_hero_float_card_icon',
				'label'   => 'Card Icon',
				'name'    => 'float_card_icon',
				'type'    => 'select',
				'choices' => array(
					'shield' => 'Shield (Insurance)',
					'check'  => 'Check (Quality)',
					'clock'  => 'Clock (Speed)',
					'award'  => 'Award (Certified)',
				),
				'default' => 'shield',
			),
			array(
				'key'     => 'field_hero_float_card_title',
				'label'   => 'Card Title',
				'name'    => 'float_card_title',
				'type'    => 'text',
				'default' => 'Fully Insured',
			),
			array(
				'key'     => 'field_hero_float_card_subtitle',
				'label'   => 'Card Subtitle',
				'name'    => 'float_card_subtitle',
				'type'    => 'text',
				'default' => 'Serving All of Dublin',
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'dp/hero',
				),
			),
		),
	) );
}
