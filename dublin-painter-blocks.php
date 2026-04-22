<?php
/**
 * Plugin Name: Dublin Painter Blocks
 * Description: Custom Gutenberg blocks for Dublin Painter FSE theme. Includes Before/After Slider, Hero, Testimonials, Trust Badges, and more.
 * Version: 1.1.0
 * Author: Ashbi Design
 * Text Domain: dublin-painter-blocks
 * Requires at least: 6.4
 * Requires PHP: 8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'DP_BLOCKS_VERSION', '1.1.0' );
define( 'DP_BLOCKS_PATH', plugin_dir_path( __FILE__ ) );
define( 'DP_BLOCKS_URI', plugin_dir_url( __FILE__ ) );

// Register CPTs
require_once DP_BLOCKS_PATH . 'includes/cpt.php';

// Register all blocks
add_action( 'init', 'dp_blocks_register_all', 20 );
function dp_blocks_register_all() {
	$blocks_dir = DP_BLOCKS_PATH . 'blocks/';
	if ( ! is_dir( $blocks_dir ) ) {
		return;
	}
	$block_dirs = glob( $blocks_dir . '*', GLOB_ONLYDIR );
	foreach ( $block_dirs as $block_dir ) {
		$block_json = $block_dir . '/block.json';
		if ( file_exists( $block_json ) ) {
			register_block_type( $block_dir );
		}
	}
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
