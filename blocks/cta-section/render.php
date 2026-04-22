<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$heading    = $attributes['heading'] ?? 'Ready to Transform Your Space?';
$subheading = $attributes['subheading'] ?? 'Get your free, no-obligation quote today and join 500+ happy Dublin homeowners.';
$cta_text   = $attributes['ctaText'] ?? 'Get a Free Quote';
$cta_url    = $attributes['ctaUrl'] ?? '/get-quote';
$phone_text = $attributes['phoneText'] ?? 'Call 01 234 5678';
$phone_url  = $attributes['phoneUrl'] ?? 'tel:+35312345678';
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
				<?php if ( $cta_text ) : ?>
					<a href="<?php echo esc_url( $cta_url ); ?>" class="dp-cta-btn dp-cta-btn--primary"><?php echo esc_html( $cta_text ); ?></a>
				<?php endif; ?>
				<?php if ( $phone_text ) : ?>
					<a href="<?php echo esc_url( $phone_url ); ?>" class="dp-cta-btn dp-cta-btn--outline">
						<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
						<?php echo esc_html( $phone_text ); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>