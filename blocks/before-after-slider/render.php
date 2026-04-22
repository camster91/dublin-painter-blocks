<?php
/**
 * Before/After Slider — Render Callback
 * Queries dp_project CPT and renders interactive drag sliders.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$columns      = get_field( 'columns' ) ?? $attributes['columns'] ?? 2;
$show_labels  = get_field( 'showLabels' ) ?? $attributes['showLabels'] ?? true;
$show_location = get_field( 'showLocation' ) ?? $attributes['showLocation'] ?? true;
$only_featured = get_field( 'onlyFeatured' ) ?? $attributes['onlyFeatured'] ?? true;
$max_projects = get_field( 'maxProjects' ) ?? $attributes['maxProjects'] ?? 4;
$heading       = get_field( 'heading' ) ?? $attributes['heading'] ?? 'See the Transformation';
$subheading    = get_field( 'subheading' ) ?? $attributes['subheading'] ?? 'Real projects. Real results. Drag the slider to compare.';

// Query projects
$projects = array();
if ( post_type_exists( 'dp_project' ) ) {
	$args = array(
		'post_type'      => 'dp_project',
		'posts_per_page' => intval( $max_projects ),
		'orderby'        => 'date',
		'order'          => 'DESC',
	);
	if ( $only_featured ) {
		$args['meta_query'] = array(
			array( 'key' => 'featured', 'value' => '1', 'compare' => '=' ),
		);
	}
	$posts = get_posts( $args );
	foreach ( $posts as $post ) {
		$before_img = get_field( 'before_image', $post->ID );
		$after_img  = get_field( 'after_image', $post->ID );
		$before_url = is_array( $before_img ) ? ( $before_img['url'] ?? '' ) : ( is_numeric( $before_img ) ? wp_get_attachment_url( $before_img ) : '' );
		$after_url  = is_array( $after_img ) ? ( $after_img['url'] ?? '' ) : ( is_numeric( $after_img ) ? wp_get_attachment_url( $after_img ) : '' );
		$projects[] = array(
			'title'    => get_the_title( $post->ID ),
			'location' => get_field( 'location', $post->ID ) ?: '',
			'service'  => get_field( 'service_type', $post->ID ) ?: '',
			'before'   => $before_url,
			'after'    => $after_url,
		);
	}
}
// Fallback
if ( empty( $projects ) ) {
	$projects = array(
		array( 'title' => 'Georgian Door Refresh', 'location' => 'Ranelagh', 'service' => 'Exterior', 'before' => '', 'after' => '' ),
		array( 'title' => 'Living Room Transformation', 'location' => 'Blackrock', 'service' => 'Interior', 'before' => '', 'after' => '' ),
	);
}

$col_class = $columns >= 3 ? 'dp-ba-grid--3' : ( $columns >= 2 ? 'dp-ba-grid--2' : 'dp-ba-grid--1' );
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'dp-ba-section' ) ); ?>>
	<div class="dp-section-container">
		<div class="dp-section-header">
			<div class="dp-badge-pill">
				<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
				<?php esc_html_e( 'Real Results', 'dublin-painter-blocks' ); ?>
			</div>
			<?php if ( $heading ) : ?>
				<h2 class="dp-section-heading"><?php echo esc_html( $heading ); ?></h2>
			<?php endif; ?>
			<?php if ( $subheading ) : ?>
				<p class="dp-section-subheading"><?php echo esc_html( $subheading ); ?></p>
			<?php endif; ?>
		</div>
		<div class="dp-ba-grid <?php echo esc_attr( $col_class ); ?>">
			<?php foreach ( $projects as $project ) :
				$before = $project['before'] ?? '';
				$after  = $project['after'] ?? '';
				if ( ! $before && ! $after ) continue;
			?>
				<div class="dp-ba-card">
					<div class="dp-ba-slider" data-slider>
						<?php if ( $after ) : ?>
							<img src="<?php echo esc_url( $after ); ?>" alt="<?php echo esc_attr( $project['title'] ?? 'After' ); ?>" class="dp-ba-after" loading="lazy">
						<?php endif; ?>
						<?php if ( $before ) : ?>
							<img src="<?php echo esc_url( $before ); ?>" alt="<?php echo esc_attr( $project['title'] ?? 'Before' ); ?>" class="dp-ba-before" loading="lazy">
						<?php endif; ?>
						<div class="dp-ba-divider" aria-hidden="true">
							<div class="dp-ba-handle"></div>
						</div>
					</div>
					<?php if ( $show_labels ) : ?>
						<div class="dp-ba-labels">
							<span class="dp-ba-label dp-ba-label--before"><?php esc_html_e( 'Before', 'dublin-painter-blocks' ); ?></span>
							<span class="dp-ba-label dp-ba-label--after"><?php esc_html_e( 'After', 'dublin-painter-blocks' ); ?></span>
						</div>
					<?php endif; ?>
					<?php if ( $show_location && ( $project['title'] ?? '' ) ) : ?>
						<div class="dp-ba-info">
							<strong><?php echo esc_html( $project['title'] ?? '' ); ?></strong>
							<?php if ( $project['location'] ?? '' ) : ?>
								<span><?php echo esc_html( $project['location'] ); ?></span>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
