<?php
/**
 * Before/After Slider — Render Callback
 *
 * Queries dp_project CPT and renders interactive drag sliders.
 * Uses ACF fields if available, falls back to post meta.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$columns      = $attributes['columns'] ?? 2;
$show_labels  = $attributes['showLabels'] ?? true;
$show_location = $attributes['showLocation'] ?? true;
$only_featured = $attributes['onlyFeatured'] ?? true;
$max_projects  = $attributes['maxProjects'] ?? 4;
$heading       = $attributes['heading'] ?? 'See the Transformation';
$subheading    = $attributes['subheading'] ?? 'Real projects. Real results. Drag the slider to compare.';

// Query projects
$args = array(
	'post_type'      => 'dp_project',
	'posts_per_page'  => $max_projects,
	'orderby'        => 'menu_order date',
	'order'          => 'ASC',
	'post_status'    => 'publish',
);

if ( $only_featured ) {
	$args['meta_query'] = array(
		array(
			'key'     => 'featured',
			'value'   => '1',
			'compare' => '=',
		),
	);
}

$projects = get_posts( $args );

// Fallback sample projects when no CPT data exists
if ( empty( $projects ) ) {
	$projects = array(
		(object) array(
			'ID'         => 0,
			'post_title' => 'Interior Living Room',
			'meta'       => array(
				'project_location' => 'Ranelagh',
				'service_type'    => 'interior',
			),
		),
		(object) array(
			'ID'         => 0,
			'post_title' => 'Exterior Facade Refresh',
			'meta'       => array(
				'project_location' => 'Blackrock',
				'service_type'    => 'exterior',
			),
		),
		(object) array(
			'ID'         => 0,
			'post_title' => 'Kitchen Cabinet Spray',
			'meta'       => array(
				'project_location' => 'Malahide',
				'service_type'    => 'spray',
			),
		),
		(object) array(
			'ID'         => 0,
			'post_title' => 'Commercial Office Refresh',
			'meta'       => array(
				'project_location' => 'Dublin City Centre',
				'service_type'    => 'commercial',
			),
		),
	);
	$using_fallback = true;
}

$block_unique = 'dp-ba-' . uniqid();

?>

<section <?php echo get_block_wrapper_attributes( array( 'class' => 'dp-before-after-section' ) ); ?>>
	<div class="dp-section-container">
		<?php if ( $heading ) : ?>
			<div class="dp-section-header">
				<div class="dp-badge-pill"><?php esc_html_e( 'Our Work', 'dublin-painter-blocks' ); ?></div>
				<h2 class="dp-section-heading"><?php echo esc_html( $heading ); ?></h2>
				<?php if ( $subheading ) : ?>
					<p class="dp-section-subheading"><?php echo esc_html( $subheading ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="dp-ba-grid dp-ba-grid--<?php echo esc_attr( $columns ); ?>" id="<?php echo esc_attr( $block_unique ); ?>">
			<?php foreach ( $projects as $project ) :
				$title = get_the_title( $project );

				// Get meta — works with or without ACF
				if ( function_exists( 'get_field' ) ) {
					$before_img = get_field( 'before_image', $project->ID );
					$after_img  = get_field( 'after_image', $project->ID );
					$location   = get_field( 'project_location', $project->ID );
					$svc_type   = get_field( 'service_type', $project->ID );
				} else {
					$before_id  = get_post_meta( $project->ID, 'before_image', true );
					$after_id   = get_post_meta( $project->ID, 'after_image', true );
					$before_img = $before_id ? wp_get_attachment_image_src( $before_id, 'large' ) : null;
					$after_img  = $after_id ? wp_get_attachment_image_src( $after_id, 'large' ) : null;
					$location   = get_post_meta( $project->ID, 'project_location', true );
					$svc_type   = get_post_meta( $project->ID, 'service_type', true );
				}

				// Get image URLs
				$before_url = '';
				$after_url  = '';

				if ( is_array( $before_img ) && isset( $before_img['url'] ) ) {
					$before_url = $before_img['url'];
				} elseif ( is_array( $before_img ) && isset( $before_img[0] ) ) {
					$before_url = $before_img[0];
				}

				if ( is_array( $after_img ) && isset( $after_img['url'] ) ) {
					$after_url = $after_img['url'];
				} elseif ( is_array( $after_img ) && isset( $after_img[0] ) ) {
					$after_url = $after_img[0];
				}

				// Fallback images when no CPT data
				if ( empty( $before_url ) ) {
					$theme_uri = get_template_directory_uri();
					$before_url = $theme_uri . '/assets/images/project_interior_green.jpg';
					$after_url  = $theme_uri . '/assets/images/project_interior_room.jpg';
				}

				// Service type label
				$service_labels = array(
					'interior'   => 'Interior Painting',
					'exterior'   => 'Exterior Painting',
					'commercial' => 'Commercial Painting',
					'spray'      => 'Spray Painting',
				);
				$service_label = $service_labels[ $svc_type ] ?? 'Painting';
				?>

				<div class="dp-ba-card">
					<div class="dp-ba-slider" data-slider>
						<div class="dp-ba-image dp-ba-image--before">
							<img src="<?php echo esc_url( $before_url ); ?>" alt="<?php echo esc_attr( $title ); ?> — Before" loading="lazy">
							<?php if ( $show_labels ) : ?>
								<span class="dp-ba-label dp-ba-label--before">Before</span>
							<?php endif; ?>
						</div>
						<div class="dp-ba-image dp-ba-image--after">
							<img src="<?php echo esc_url( $after_url ); ?>" alt="<?php echo esc_attr( $title ); ?> — After" loading="lazy">
							<?php if ( $show_labels ) : ?>
								<span class="dp-ba-label dp-ba-label--after">After</span>
							<?php endif; ?>
						</div>
						<div class="dp-ba-handle" aria-hidden="true">
							<div class="dp-ba-handle-line"></div>
							<div class="dp-ba-handle-circle">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
									<polyline points="15 18 9 12 15 6"></polyline>
									<polyline points="9 18 15 12 9 6"></polyline>
								</svg>
							</div>
							<div class="dp-ba-handle-line"></div>
						</div>
					</div>
					<div class="dp-ba-card-info">
						<h3 class="dp-ba-card-title"><?php echo esc_html( $title ); ?></h3>
						<?php if ( $show_location && $location ) : ?>
							<span class="dp-ba-card-location">
								<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
								<?php echo esc_html( $location ); ?>
							</span>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>