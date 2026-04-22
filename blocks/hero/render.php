<?php
/**
 * Hero Block — ACF Render Template
 *
 * Fields (registered via acf_add_local_field_group):
 * - badge_text: Star rating badge text
 * - heading: Main heading
 * - heading_accent: Blue accent text on second line
 * - subheading: Description paragraph
 * - cta_primary_text: Green button label
 * - cta_primary_url: Green button URL
 * - cta_primary_type: 'quote' or 'phone'
 * - cta_secondary_text: Outline button label
 * - cta_secondary_url: Outline button URL
 * - hero_image: Hero image (ACF image field)
 * - benefits: Repeater with 'text' sub-field
 * - float_card_icon: shield / check / clock
 * - float_card_title: e.g. "Fully Insured"
 * - float_card_subtitle: e.g. "Serving All of Dublin"
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$badge_text     = get_field( 'badge_text' ) ?: '4.9/5 from 250+ Dublin Homeowners';
$heading        = get_field( 'heading' ) ?: 'Top-Rated Painters in Dublin.';
$heading_accent = get_field( 'heading_accent' ) ?: 'Fixed Quotes in 24h.';
$subheading     = get_field( 'subheading' ) ?: "Don't settle for sloppy work or hidden fees. We provide flawless interior and exterior painting with premium materials, spotless clean-up, and a 2-year guarantee.";
$cta_primary_text = get_field( 'cta_primary_text' ) ?: 'Get a Free Quote';
$cta_primary_url  = get_field( 'cta_primary_url' ) ?: '#quote-section';
$cta_primary_type = get_field( 'cta_primary_type' ) ?: 'quote';
$cta_secondary_text = get_field( 'cta_secondary_text' ) ?: 'Call 01 234 5678';
$cta_secondary_url  = get_field( 'cta_secondary_url' ) ?: 'tel:+35312345678';
$hero_image     = get_field( 'hero_image' );
$benefits       = get_field( 'benefits' );
$float_card_icon     = get_field( 'float_card_icon' ) ?: 'shield';
$float_card_title    = get_field( 'float_card_title' ) ?: 'Fully Insured';
$float_card_subtitle = get_field( 'float_card_subtitle' ) ?: 'Serving All of Dublin';

// Fallback benefits
if ( empty( $benefits ) ) {
	$benefits = array(
		array( 'text' => '100% Fixed Quotes — No hidden extras' ),
		array( 'text' => 'Fully Insured & Safe Pass Certified' ),
		array( 'text' => 'Premium Dulux & Fleetwood paints only' ),
	);
}

// Hero image
$img_url = '';
$img_alt = 'Professional painters in Dublin';
if ( $hero_image ) {
	if ( is_array( $hero_image ) ) {
		$img_url = $hero_image['url'] ?? '';
		$img_alt = $hero_image['alt'] ?? $img_alt;
	} elseif ( is_numeric( $hero_image ) ) {
		$img = wp_get_attachment_image_src( $hero_image, 'large' );
		if ( $img ) {
			$img_url = $img[0];
		}
	}
}

// SVG icon map
$svg_icons = array(
	'shield' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>',
	'check'  => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>',
	'clock'  => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
	'award'  => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M8.21 13.89 7 23l5-3 5 3-1.21-9.12"/></svg>',
);
$float_svg = $svg_icons[ $float_card_icon ] ?? $svg_icons['shield'];

// Phone icon
$phone_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>';
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
					<a href="<?php echo esc_url( $cta_primary_url ); ?>" class="dp-btn dp-btn-brand dp-btn-lg">
						<?php if ( 'phone' === $cta_primary_type ) : ?>
							<?php echo $phone_svg; ?>
						<?php endif; ?>
						<?php echo esc_html( $cta_primary_text ); ?>
					</a>
					<a href="<?php echo esc_url( $cta_secondary_url ); ?>" class="dp-btn dp-btn-outline dp-btn-lg">
						<?php echo $phone_svg; ?>
						<?php echo esc_html( $cta_secondary_text ); ?>
					</a>
				</div>

				<!-- Green Check Benefits -->
				<ul class="dp-hero-benefits">
					<?php foreach ( $benefits as $benefit ) : ?>
						<li>
							<span class="dp-benefit-check">
								<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
							</span>
							<?php echo esc_html( $benefit['text'] ?? ( is_string( $benefit ) ? $benefit : '' ) ); ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<?php if ( $img_url ) : ?>
				<div class="dp-hero-visual">
					<div class="dp-hero-image-wrapper">
						<img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>" class="dp-hero-img" loading="eager" decoding="async">

						<!-- Floating Trust Card -->
						<div class="dp-hero-floating-card">
							<div class="dp-float-icon">
								<?php echo $float_svg; ?>
							</div>
							<div class="dp-float-text">
								<strong><?php echo esc_html( $float_card_title ); ?></strong>
								<span><?php echo esc_html( $float_card_subtitle ); ?></span>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>