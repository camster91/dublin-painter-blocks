<?php
/**
 * Plugin Name: Dublin Painter Blocks
 * Description: Custom ACF-powered blocks for Dublin Painter FSE theme. Client-editable Hero, Trust Badges, Testimonials, Pricing, FAQ, and more.
 * Version: 2.4.0
 * Author: Ashbi Design
 * Text Domain: dublin-painter-blocks
 * Requires at least: 6.4
 * Requires PHP: 8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'DP_BLOCKS_VERSION', '2.4.0' );
define( 'DP_BLOCKS_PATH', plugin_dir_path( __FILE__ ) );
define( 'DP_BLOCKS_URI', plugin_dir_url( __FILE__ ) );

// Register CPTs
require_once DP_BLOCKS_PATH . 'includes/cpt.php';

/**
 * Register all blocks.
 * 
 * For blocks with a render.php, we use register_block_type() with a 
 * render_callback. The render_callback includes the block's render.php.
 * ACF field groups are registered separately via acf-register.php files.
 */
add_action( 'init', 'dp_blocks_register_all', 20 );
function dp_blocks_register_all() {
	$blocks_dir = DP_BLOCKS_PATH . 'blocks/';
	if ( ! is_dir( $blocks_dir ) ) {
		return;
	}

	$block_dirs = glob( $blocks_dir . '*', GLOB_ONLYDIR );
	foreach ( $block_dirs as $block_dir ) {
		$block_json  = $block_dir . '/block.json';
		$render_file = $block_dir . '/render.php';

		if ( ! file_exists( $block_json ) ) {
			continue;
		}

		// If render.php exists, register with a render callback
		if ( file_exists( $render_file ) ) {
			register_block_type( $block_dir, array(
				'render_callback' => function( $attributes, $content ) use ( $render_file ) {
					ob_start();
					include $render_file;
					return ob_get_clean();
				},
			) );
		} else {
			register_block_type( $block_dir );
		}
	}
}

/**
 * Load ACF field groups for blocks that have them.
 */
add_action( 'acf/init', 'dp_blocks_load_acf_fields' );
function dp_blocks_load_acf_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	$blocks_dir = DP_BLOCKS_PATH . 'blocks/';
	if ( ! is_dir( $blocks_dir ) ) {
		return;
	}

	$block_dirs = glob( $blocks_dir . '*', GLOB_ONLYDIR );
	foreach ( $block_dirs as $block_dir ) {
		$acf_file = $block_dir . '/acf-register.php';
		if ( file_exists( $acf_file ) ) {
			require_once $acf_file;
		}
	}
}

// Register custom block category
add_filter( 'block_categories_all', 'dp_blocks_register_category' );
function dp_blocks_register_category( $categories ) {
	array_unshift( $categories, array(
		'slug'  => 'dublin-painter',
		'title' => __( 'Dublin Painter', 'dublin-painter-blocks' ),
	) );
	return $categories;
}

// Enqueue global block styles
add_action( 'wp_enqueue_scripts', 'dp_blocks_enqueue_styles' );
function dp_blocks_enqueue_styles() {
	wp_enqueue_style(
		'dp-blocks-global',
		DP_BLOCKS_URI . 'assets/css/global.css',
		array(),
		DP_BLOCKS_VERSION
	);
}

// Enqueue global block scripts (shared utilities)
add_action( 'wp_enqueue_scripts', 'dp_blocks_enqueue_scripts' );
function dp_blocks_enqueue_scripts() {
	wp_enqueue_script(
		'dp-blocks-utils',
		DP_BLOCKS_URI . 'assets/js/utils.js',
		array(),
		DP_BLOCKS_VERSION,
		true
	);
}


