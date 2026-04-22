<?php
/**
 * Hero Section — Render Callback
 *
 * Dark hero with animated blobs, star rating badge,
 * headline with accent color, green check benefits, and floating trust card.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$badge_text     = $attributes['badgeText'] ?? '4.9/5 from 250+ Dublin Homeowners';
$heading        = $attributes['heading'] ?? 'Top-Rated Painters in Dublin.';
$heading_accent = $attributes['headingAccent'] ?? 'Fixed Quotes in 24h.';
$subheading     = $attributes['subheading'] ?? "Don't settle for sloppy work or hidden fees. We provide flawless interior and exterior painting with premium materials, spotless clean-up, and a 2-year guarantee.";
$cta_text       = $attributes['ctaText'] ?? 'Get a Free Quote';
$cta_url        = $attributes['ctaUrl'] ?? '/get-quote';
$phone_text      = $attributes['phoneText'] ?? 'Call 01 234 5678';
$phone_number   = $attributes['phoneNumber'] ?? 'tel:+35312345678';
$image_url      = $attributes['imageUrl'] ?? '';
$image_id        = $attributes['imageId'] ?? 0;
$benefits        = $attributes['benefits'] ?? array(
	array( 'text' => '100% Fixed Quotes — No hidden extras' ),
	array( 'text' => 'Fully Insured & Safe Pass Certified' ),
	array( 'text' => 'Premium Dulux & Fleetwood paints only' ),
);
$float_icon     = $attributes['floatCardIcon'] ?? 'shield';
$float_title    = $attributes['floatCardTitle'] ?? 'Fully Insured';
$float_subtitle = $attributes['floatCardSubtitle'] ?? 'Serving All of Dublin';

// Get hero image
$hero_image = '';
if ( $image_id ) {
	$img = wp_get_attachment_image_src( $image_id, 'large' );
	if ( $img ) {
		$hero_image = $img[0];
	}
}
if ( empty( $hero_image ) ) {
	// Fallback to theme assets
	$hero_image = get_template_directory_uri() . '/assets/images/hero-bg.jpg';
}

// SVG icon map
$svg_icons = array(
	'shield' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>',
	'check' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>',
	'clock' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
	'award' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M8.21 13.89 7 23l5-3 5 3-1.21-9.12"/></svg>',
);

$float_svg = $svg_icons[ $float_icon ] ?? $svg_icons['shield'];
?>

<section <?php echo get_block_wrapper_attributes( array( 'class' => 'dp-hero-section' ) ); ?>>
	<!-- Animated Background Blobs -->
	<div class="dp-hero-blob dp-hero-blob-1" aria-hidden="true"></div>
	<div class="dp-hero-blob dp-hero-blob-2" aria-hidden="true"></div>

	<div class="dp-hero-container">
		<div class="dp-hero-grid">
			<div class="dp-hero-content">
				<!-- Star Rating Badge -->
				<div class="dp-hero-badge">
					<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" class="dp-star-icon"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
					<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" class="dp-star-icon"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
					<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" class="dp-star-icon"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
					<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" class="dp-star-icon"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
					<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" class="dp-star-icon"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
					<span><?php echo esc_html( $badge_text ); ?></span>
				</div>

				<h1 class="dp-hero-title">
					<?php echo esc_html( $heading ); ?>
					<?php if ( $heading_accent ) : ?>
						<span class="dp-hero-accent"><?php echo esc_html( $heading_accent ); ?></span>
					<?php endif; ?>
				</h1>

				<p class="dp-hero-subheading"><?php echo esc_html( $subheading ); ?></p>

				<div class="dp-hero-actions">
					<a href="<?php echo esc_url( $cta_url ); ?>" class="dp-btn dp-btn-brand dp-btn-lg">
						<?php echo esc_html( $cta_text ); ?>
					</a>
					<a href="<?php echo esc_url( $phone_number ); ?>" class="dp-btn dp-btn-outline dp-btn-lg">
						<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
						<?php echo esc_html( $phone_text ); ?>
					</a>
				</div>

				<!-- Green Check Benefits -->
				<ul class="dp-hero-benefits">
					<?php foreach ( $benefits as $benefit ) : ?>
						<li>
							<span class="dp-benefit-check">
								<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
							</span>
							<?php echo esc_html( $benefit['text'] ?? $benefit ); ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="dp-hero-visual">
				<div class="dp-hero-image-wrapper">
					<img src="<?php echo esc_url( $hero_image ); ?>" alt="Professional painters in Dublin" class="dp-hero-img" loading="eager">

					<!-- Floating Trust Card -->
					<div class="dp-hero-floating-card">
						<div class="dp-float-icon">
							<?php echo $float_svg; ?>
						</div>
						<div class="dp-float-text">
							<strong><?php echo esc_html( $float_title ); ?></strong>
							<span><?php echo esc_html( $float_subtitle ); ?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>