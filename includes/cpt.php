<?php
/**
 * Register Custom Post Types for Dublin Painter Blocks
 *
 * CPTs:
 * - dp_project: Before/After projects (used by slider and gallery)
 * - dp_testimonial: Customer reviews
 * - dp_service: Painting services
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Register all CPTs on init
add_action( 'init', 'dp_blocks_register_cpts', 0 );

function dp_blocks_register_cpts() {

	// ─── Before/After Projects ───
	register_post_type( 'dp_project', array(
		'labels' => array(
			'name'                  => 'Projects',
			'singular_name'         => 'Project',
			'menu_name'             => 'Projects',
			'add_new_item'          => 'Add New Project',
			'edit_item'             => 'Edit Project',
			'all_items'             => 'All Projects',
			'search_items'          => 'Search Projects',
			'not_found'             => 'No projects found',
			'not_found_in_trash'    => 'No projects found in trash',
		),
		'public'              => true,
		'has_archive'         => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_rest'        => true, // Gutenberg support
		'rest_base'           => 'projects',
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-format-gallery',
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
		'rewrite'             => array( 'slug' => 'projects', 'with_front' => false ),
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'delete_with_user'    => false,
	));

	// ─── Testimonials ───
	register_post_type( 'dp_testimonial', array(
		'labels' => array(
			'name'                  => 'Testimonials',
			'singular_name'         => 'Testimonial',
			'menu_name'             => 'Testimonials',
			'add_new_item'          => 'Add New Testimonial',
			'edit_item'             => 'Edit Testimonial',
			'all_items'             => 'All Testimonials',
			'search_items'          => 'Search Testimonials',
			'not_found'             => 'No testimonials found',
		),
		'public'              => true,
		'has_archive'         => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_rest'        => true,
		'rest_base'           => 'testimonials',
		'menu_position'       => 21,
		'menu_icon'           => 'dashicons-format-quote',
		'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'rewrite'             => array( 'slug' => 'testimonials', 'with_front' => false ),
		'can_export'          => true,
		'delete_with_user'    => false,
	));

	// ─── Services ───
	register_post_type( 'dp_service', array(
		'labels' => array(
			'name'                  => 'Services',
			'singular_name'         => 'Service',
			'menu_name'             => 'Services',
			'add_new_item'          => 'Add New Service',
			'edit_item'             => 'Edit Service',
			'all_items'             => 'All Services',
			'search_items'          => 'Search Services',
			'not_found'             => 'No services found',
		),
		'public'              => true,
		'has_archive'         => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_rest'        => true,
		'rest_base'           => 'services',
		'menu_position'       => 22,
		'menu_icon'           => 'dashicons-admin-customizer',
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
		'rewrite'             => array( 'slug' => 'services', 'with_front' => false ),
		'can_export'          => true,
		'delete_with_user'    => false,
	));
}

// ─── Register ACF field groups (if ACF is active) ───
add_action( 'acf/init', 'dp_cpt_register_acf_fields' );

function dp_cpt_register_acf_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	// ─── Project Fields (Before/After) ───
	acf_add_local_field_group( array(
		'key' => 'group_dp_project',
		'title' => 'Project Details',
		'fields' => array(
			array(
				'key' => 'field_dp_before_image',
				'label' => 'Before Image',
				'name' => 'before_image',
				'type' => 'image',
				'return_format' => 'array',
				'preview_size' => 'medium',
				'library' => 'all',
				'instructions' => 'Upload the "before" photo',
			),
			array(
				'key' => 'field_dp_after_image',
				'label' => 'After Image',
				'name' => 'after_image',
				'type' => 'image',
				'return_format' => 'array',
				'preview_size' => 'medium',
				'library' => 'all',
				'instructions' => 'Upload the "after" photo',
			),
			array(
				'key' => 'field_dp_project_location',
				'label' => 'Location',
				'name' => 'project_location',
				'type' => 'text',
				'placeholder' => 'e.g. Ranelagh, Dublin 4',
			),
			array(
				'key' => 'field_dp_service_type',
				'label' => 'Service Type',
				'name' => 'service_type',
				'type' => 'select',
				'choices' => array(
					'interior' => 'Interior Painting',
					'exterior' => 'Exterior Painting',
					'commercial' => 'Commercial Painting',
					'spray' => 'Spray Painting',
				),
				'default_value' => 'interior',
				'return_format' => 'value',
			),
			array(
				'key' => 'field_dp_featured',
				'label' => 'Featured on Homepage',
				'name' => 'featured',
				'type' => 'true_false',
				'default_value' => 0,
				'ui' => 1,
				'instructions' => 'Show this project in the homepage slider',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'dp_project',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'active' => true,
	));

	// ─── Testimonial Fields ───
	acf_add_local_field_group( array(
		'key' => 'group_dp_testimonial',
		'title' => 'Testimonial Details',
		'fields' => array(
			array(
				'key' => 'field_dp_reviewer_name',
				'label' => 'Reviewer Name',
				'name' => 'reviewer_name',
				'type' => 'text',
				'instructions' => 'Full name of the reviewer',
			),
			array(
				'key' => 'field_dp_reviewer_location',
				'label' => 'Location',
				'name' => 'reviewer_location',
				'type' => 'text',
				'placeholder' => 'e.g. Ranelagh',
			),
			array(
				'key' => 'field_dp_rating',
				'label' => 'Rating (1-5)',
				'name' => 'rating',
				'type' => 'number',
				'default_value' => 5,
				'min' => 1,
				'max' => 5,
				'step' => 1,
			),
			array(
				'key' => 'field_dp_google_url',
				'label' => 'Google Review URL',
				'name' => 'google_url',
				'type' => 'url',
				'instructions' => 'Link to the original Google review (optional)',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'dp_testimonial',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'active' => true,
	));
}

// ─── Fallback meta (when ACF is not active) ───
// These register the meta keys so they work with or without ACF
add_action( 'init', 'dp_blocks_register_meta', 5 );

function dp_blocks_register_meta() {
	$project_meta = array(
		'before_image'   => array( 'type' => 'integer', 'description' => 'Before image ID', 'single' => true, 'show_in_rest' => true ),
		'after_image'    => array( 'type' => 'integer', 'description' => 'After image ID', 'single' => true, 'show_in_rest' => true ),
		'project_location' => array( 'type' => 'string', 'description' => 'Project location', 'single' => true, 'show_in_rest' => true, 'sanitize_callback' => 'sanitize_text_field' ),
		'service_type'  => array( 'type' => 'string', 'description' => 'Service type', 'single' => true, 'show_in_rest' => true, 'sanitize_callback' => 'sanitize_text_field' ),
		'featured'      => array( 'type' => 'boolean', 'description' => 'Featured on homepage', 'single' => true, 'show_in_rest' => true ),
	);

	foreach ( $project_meta as $key => $args ) {
		register_post_meta( 'dp_project', $key, $args );
	}

	$testimonial_meta = array(
		'reviewer_name'     => array( 'type' => 'string', 'single' => true, 'show_in_rest' => true, 'sanitize_callback' => 'sanitize_text_field' ),
		'reviewer_location' => array( 'type' => 'string', 'single' => true, 'show_in_rest' => true, 'sanitize_callback' => 'sanitize_text_field' ),
		'rating'            => array( 'type' => 'number', 'single' => true, 'show_in_rest' => true ),
		'google_url'        => array( 'type' => 'string', 'single' => true, 'show_in_rest' => true, 'sanitize_callback' => 'esc_url_raw' ),
	);

	foreach ( $testimonial_meta as $key => $args ) {
		register_post_meta( 'dp_testimonial', $key, $args );
	}
}