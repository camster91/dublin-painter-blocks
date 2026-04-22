<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$heading = get_field( 'heading' ) ?? $attributes['heading'] ?? 'Get Your Free Estimate';
$subheading = get_field( 'subheading' ) ?? $attributes['subheading'] ?? 'Takes 60 seconds. No obligation.';
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'dp-quote-form-section' ) ); ?>>
	<div class="dp-section-container">
		<div class="dp-quote-form-grid">
			<div class="dp-quote-form-info">
				<div class="dp-badge-pill"><?php esc_html_e( 'Free Quote', 'dublin-painter-blocks' ); ?></div>
				<h2 class="dp-section-heading"><?php echo esc_html( $heading ); ?></h2>
				<p class="dp-section-subheading"><?php echo esc_html( $subheading ); ?></p>
				<ul class="dp-quote-benefits">
					<li>
						<span class="dp-benefit-check"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>
						<?php esc_html_e( '100% free, no obligation', 'dublin-painter-blocks' ); ?>
					</li>
					<li>
						<span class="dp-benefit-check"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>
						<?php esc_html_e( 'Response within 24 hours', 'dublin-painter-blocks' ); ?>
					</li>
					<li>
						<span class="dp-benefit-check"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>
						<?php esc_html_e( 'Fully insured & certified', 'dublin-painter-blocks' ); ?>
					</li>
				</ul>
			</div>
			<div class="dp-quote-form-wrapper">
				<form class="dp-quote-form" id="dp-quote-form" method="post" novalidate>
					<div class="dp-form-row">
						<div class="dp-form-group">
							<label for="dp-name" class="dp-form-label"><?php esc_html_e( 'Full Name', 'dublin-painter-blocks' ); ?> *</label>
							<input type="text" id="dp-name" name="name" class="dp-form-input" required placeholder="<?php esc_attr_e( 'John Murphy', 'dublin-painter-blocks' ); ?>">
						</div>
						<div class="dp-form-group">
							<label for="dp-phone" class="dp-form-label"><?php esc_html_e( 'Phone', 'dublin-painter-blocks' ); ?> *</label>
							<input type="tel" id="dp-phone" name="phone" class="dp-form-input" required placeholder="<?php esc_attr_e( '085 123 4567', 'dublin-painter-blocks' ); ?>">
						</div>
					</div>
					<div class="dp-form-group">
						<label for="dp-email" class="dp-form-label"><?php esc_html_e( 'Email', 'dublin-painter-blocks' ); ?></label>
						<input type="email" id="dp-email" name="email" class="dp-form-input" placeholder="<?php esc_attr_e( 'john@example.com', 'dublin-painter-blocks' ); ?>">
					</div>
					<div class="dp-form-group">
						<label for="dp-service" class="dp-form-label"><?php esc_html_e( 'Service Type', 'dublin-painter-blocks' ); ?> *</label>
						<select id="dp-service" name="service" class="dp-form-input dp-form-select" required>
							<option value=""><?php esc_html_e( 'Select a service', 'dublin-painter-blocks' ); ?></option>
							<option value="interior"><?php esc_html_e( 'Interior Painting', 'dublin-painter-blocks' ); ?></option>
							<option value="exterior"><?php esc_html_e( 'Exterior Painting', 'dublin-painter-blocks' ); ?></option>
							<option value="commercial"><?php esc_html_e( 'Commercial Painting', 'dublin-painter-blocks' ); ?></option>
							<option value="spray"><?php esc_html_e( 'Spray Painting', 'dublin-painter-blocks' ); ?></option>
						</select>
					</div>
					<div class="dp-form-group">
						<label for="dp-message" class="dp-form-label"><?php esc_html_e( 'Project Details', 'dublin-painter-blocks' ); ?></label>
						<textarea id="dp-message" name="message" class="dp-form-input dp-form-textarea" rows="4" placeholder="<?php esc_attr_e( 'Tell us about your project...', 'dublin-painter-blocks' ); ?>"></textarea>
					</div>
					<button type="submit" class="dp-btn dp-btn-submit"><?php esc_html_e( 'Get Free Quote', 'dublin-painter-blocks' ); ?></button>
					<div class="dp-form-message" id="dp-form-message"></div>
				</form>
			</div>
		</div>
	</div>
</section>
