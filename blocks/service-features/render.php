<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$badge_text = get_field( 'badge_text' ) ?? $attributes['badge_text'] ?? 'Our Expertise';
$heading = get_field( 'heading' ) ?? $attributes['heading'] ?? 'Professional Painting Services';
$subheading = get_field( 'subheading' ) ?? $attributes['subheading'] ?? '';
$features_raw = get_field( 'features' );
$theme_uri = get_stylesheet_directory_uri();

// Debug: check what features_raw is
$debug_info = 'features_raw type=' . gettype($features_raw) . ' empty=' . (empty($features_raw) ? 'Y' : 'N') . ' count=' . (is_array($features_raw) ? count($features_raw) : 'N/A');

if ( empty( $features_raw ) ) {
	$features_raw = array(
		array( 'title' => 'Expert Interior Decorating', 'description' => 'Flawless luxury finishes with our signature dustless sanding technology.', 'image' => $theme_uri . '/assets/images/project_interior_green.jpg', 'bullets' => array( 'Dustless Sanding Technology', 'Premium Farrow & Ball Finishes', 'Expert Colour Consultation' ) ),
		array( 'title' => '10-Year Exterior Protection', 'description' => 'Protect your home with advanced breathable masonry coatings guaranteed for a decade.', 'image' => $theme_uri . '/assets/images/project_georgian_door.jpg', 'bullets' => array( 'Weatherproof Masonry Coatings', 'Professional Power Washing', '10-Year Written Guarantee' ) ),
		array( 'title' => 'Zero-Downtime Commercial', 'description' => 'Night and weekend scheduling for offices, retail, and industrial painting across Dublin.', 'image' => $theme_uri . '/assets/images/project_office.jpg', 'bullets' => array( 'Flexible Scheduling', 'Minimal Business Disruption', 'Commercial-Grade Materials' ) ),
	);
}
$features = array();
foreach ( $features_raw as $feat ) {
	$bullets = $feat['bullets'] ?? array();
	if ( ! empty( $bullets ) && isset( $bullets[0]['text'] ) ) {
		$bullets = array_map( function( $b ) { return $b['text'] ?? $b; }, $bullets );
	}
	$img_url = '';
	if ( ! empty( $feat['image'] ) ) {
		if ( is_array( $feat['image'] ) ) { $img_url = $feat['image']['url'] ?? ''; }
		elseif ( is_numeric( $feat['image'] ) ) { $img_url = wp_get_attachment_url( $feat['image'] ); }
		else { $img_url = $feat['image']; }
	}
	$features[] = array( 'title' => $feat['title'] ?? '', 'description' => $feat['description'] ?? '', 'image' => $img_url, 'bullets' => $bullets );
}
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'dp-service-features-section' ) ); ?>>
	<div class="dp-section-container">
		<div class="dp-section-header">
			<?php if ( $badge_text ) : ?><div class="dp-badge-pill"><?php echo esc_html( $badge_text ); ?></div><?php endif; ?>
			<?php if ( $heading ) : ?><h2 class="dp-section-heading"><?php echo esc_html( $heading ); ?></h2><?php endif; ?>
			<?php if ( $subheading ) : ?><p class="dp-section-subheading"><?php echo esc_html( $subheading ); ?></p><?php endif; ?>
		</div>
		<div class="dp-features-list">
			<?php $i = 0; foreach ( $features as $feature ) : $i++; ?>
				<div class="dp-feature-row dp-feature-row--<?php echo $i % 2 === 0 ? 'reversed' : 'normal'; ?>">
					<?php if ( ! empty( $feature['image'] ) ) : ?>
						<div class="dp-feature-image"><img src="<?php echo esc_url( $feature['image'] ); ?>" alt="<?php echo esc_attr( $feature['title'] ); ?>" loading="lazy" class="dp-feature-img"></div>
					<?php else : ?>
						<div class="dp-feature-image">
							<div class="dp-feature-placeholder">
								<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
								<span>Add image via ACF</span>
							</div>
						</div>
					<?php endif; ?>
					<div class="dp-feature-content">
						<h3 class="dp-feature-title"><?php echo esc_html( $feature['title'] ); ?></h3>
						<p class="dp-feature-desc"><?php echo esc_html( $feature['description'] ); ?></p>
						<?php if ( ! empty( $feature['bullets'] ) ) : ?>
							<ul class="dp-feature-bullets">
								<?php foreach ( $feature['bullets'] as $bullet ) : ?>
									<li><span class="dp-benefit-check"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><?php echo esc_html( $bullet ); ?></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
