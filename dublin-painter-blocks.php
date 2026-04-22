<?php
/**
 * Plugin Name: Dublin Painter Blocks
 * Description: Custom ACF blocks for Dublin Painter FSE theme. Client-editable Hero, Trust Badges, Testimonials, Pricing, FAQ, and more.
 * Version: 2.0.0
 * Author: Ashbi Design
 * Text Domain: dublin-painter-blocks
 * Requires at least: 6.4
 * Requires PHP: 8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'DP_BLOCKS_VERSION', '2.0.0' );
define( 'DP_BLOCKS_PATH', plugin_dir_path( __FILE__ ) );
define( 'DP_BLOCKS_URI', plugin_dir_url( __FILE__ ) );

// Register CPTs
require_once DP_BLOCKS_PATH . 'includes/cpt.php';

// Register ACF blocks (each block has its own acf-register.php)
add_action( 'acf/init', 'dp_blocks_register_acf_blocks' );
function dp_blocks_register_acf_blocks() {
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
		// Also support native blocks with block.json (for before-after-slider which uses view.js)
		$block_json = $block_dir . '/block.json';
		if ( file_exists( $block_json ) && ! file_exists( $acf_file ) ) {
			register_block_type( $block_dir );
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