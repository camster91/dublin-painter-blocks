<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$heading    = get_field( 'heading' ) ?? $attributes['heading'] ?? 'Ready to Transform Your Space?';
$subheading = get_field( 'subheading' ) ?? $attributes['subheading'] ?? 'Get your free, no-obligation quote today and join 500+ happy Dublin homeowners.';
$cta_text   = get_field( 'ctaText' ) ?? $attributes['ctaText'] ?? 'Get a Free Quote';
$cta_url    = get_field( 'ctaUrl' ) ?? $attributes['ctaUrl'] ?? '#quote-section';
$phone_text = get_field( 'phoneText' ) ?? $attributes['phoneText'] ?? 'Call 01 234 5678';
$phone_url  = get_field( 'phoneUrl' ) ?? $attributes['phoneUrl'] ?? 'tel:+35312345678';
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'dp-cta-section' ) ); ?>>
	<div class="dp-cta-blob dp-cta-blob-1" aria-hidden="true"></div>
	<div class="dp-cta-blob dp-cta-blob-2" aria-hidden="true"></div>
	<div class="dp-section-container">
		<div class="dp-cta-content">
			<?php if ( $heading ) : ?>
				<h2 class="dp-cta-heading"><?php echo esc_html( $heading ); ?></h2>
			<?php endif; ?>
			<?php if ( $subheading ) : ?>
				<p class="dp-cta-subheading"><?php echo esc_html( $subheading ); ?></p>
			<?php endif; ?>
			<div class="dp-cta-actions">
				<a href="<?php echo esc_url( $cta_url ); ?>" class="dp-btn dp-btn-cta"><?php echo esc_html( $cta_text ); ?></a>
				<a href="<?php echo esc_url( $phone_url ); ?>" class="dp-btn dp-btn-cta-outline"><?php echo esc_html( $phone_text ); ?></a>
			</div>
		</div>
	</div>
</section>
