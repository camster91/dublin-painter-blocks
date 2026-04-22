<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$badge_text    = get_field( 'badge_text' ) ?? $attributes['badge_text'] ?? 'Free Quote';
$heading       = get_field( 'heading' ) ?? $attributes['heading'] ?? 'Get Your Free Estimate';
$subheading    = get_field( 'subheading' ) ?? $attributes['subheading'] ?? 'Takes 60 seconds. No obligation.';
$benefits_raw  = get_field( 'benefits' ) ?: array(
	array( 'text' => '100% free, no obligation' ),
	array( 'text' => 'Response within 24 hours' ),
	array( 'text' => 'Fully insured & certified' ),
);
$submit_text   = get_field( 'submit_text' ) ?? $attributes['submit_text'] ?? 'Get Free Quote';
$form_endpoint = get_field( 'form_endpoint' ) ?? $attributes['form_endpoint'] ?? '';
$success_msg   = get_field( 'success_message' ) ?? $attributes['success_message'] ?? 'Thank you! We will get back to you within 24 hours.';
$error_msg     = get_field( 'error_message' ) ?? $attributes['error_message'] ?? 'Something went wrong. Please try again.';

// Normalize benefits
$benefits = array();
foreach ( $benefits_raw as $b ) {
	if ( is_array( $b ) ) {
		$benefits[] = $b['text'] ?? '';
	} else {
		$benefits[] = $b;
	}
}
$benefits = array_filter( $benefits );
if ( empty( $benefits ) ) {
	$benefits = array( '100% free, no obligation', 'Response within 24 hours', 'Fully insured & certified' );
}
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'dp-quote-form-section' ) ); ?>>
	<div class="dp-section-container">
		<div class="dp-quote-form-grid">
			<div class="dp-quote-form-info">
				<div class="dp-badge-pill"><?php echo esc_html( $badge_text ); ?></div>
				<h2 class="dp-section-heading"><?php echo esc_html( $heading ); ?></h2>
				<p class="dp-section-subheading"><?php echo esc_html( $subheading ); ?></p>
				<ul class="dp-quote-benefits">
					<?php foreach ( $benefits as $benefit ) : ?>
						<li>
							<span class="dp-benefit-check"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>
							<?php echo esc_html( $benefit ); ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="dp-quote-form-wrapper">
				<form class="dp-quote-form" id="dp-quote-form" method="post" novalidate
					<?php if ( $form_endpoint ) : ?> action="<?php echo esc_url( $form_endpoint ); ?>"<?php endif; ?>>
					<div class="dp-form-row">
						<div class="dp-form-group">
							<label for="dp-name" class="dp-form-label">Full Name *</label>
							<input type="text" id="dp-name" name="name" class="dp-form-input" required placeholder="John Murphy">
						</div>
						<div class="dp-form-group">
							<label for="dp-phone" class="dp-form-label">Phone *</label>
							<input type="tel" id="dp-phone" name="phone" class="dp-form-input" required placeholder="085 123 4567">
						</div>
					</div>
					<div class="dp-form-group">
						<label for="dp-email" class="dp-form-label">Email</label>
						<input type="email" id="dp-email" name="email" class="dp-form-input" placeholder="john@example.com">
					</div>
					<div class="dp-form-group">
						<label for="dp-service" class="dp-form-label">Service Type *</label>
						<select id="dp-service" name="service" class="dp-form-input dp-form-select" required>
							<option value="">Select a service</option>
							<option value="interior">Interior Painting</option>
							<option value="exterior">Exterior Painting</option>
							<option value="commercial">Commercial Painting</option>
							<option value="spray">Spray Painting</option>
						</select>
					</div>
					<div class="dp-form-group">
						<label for="dp-message" class="dp-form-label">Project Details</label>
						<textarea id="dp-message" name="message" class="dp-form-input dp-form-textarea" rows="4" placeholder="Tell us about your project..."></textarea>
					</div>
					<button type="submit" class="dp-btn dp-btn-submit"><?php echo esc_html( $submit_text ); ?></button>
					<div class="dp-form-message" id="dp-form-message"
						data-success="<?php echo esc_attr( $success_msg ); ?>"
						data-error="<?php echo esc_attr( $error_msg ); ?>"></div>
				</form>
			</div>
		</div>
	</div>
</section>
