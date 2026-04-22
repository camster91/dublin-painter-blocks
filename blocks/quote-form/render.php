<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$heading = $attributes['heading'] ?? 'Get Your Free Estimate';
$subheading = $attributes['subheading'] ?? 'Takes 60 seconds. No obligation.';
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
						<span class="dp-benefit-check">
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
						</span>
						<?php esc_html_e( '100% free, no obligation', 'dublin-painter-blocks' ); ?>
					</li>
					<li>
						<span class="dp-benefit-check">
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
						</span>
						<?php esc_html_e( 'Response within 24 hours', 'dublin-painter-blocks' ); ?>
					</li>
					<li>
						<span class="dp-benefit-check">
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
						</span>
						<?php esc_html_e( 'Fixed price — no hidden fees', 'dublin-painter-blocks' ); ?>
					</li>
				</ul>
			</div>
			<form class="dp-quote-form" id="dp-quote-form" method="post" novalidate>
				<div class="dp-form-row">
					<div class="dp-form-group">
						<label for="dp-name"><?php esc_html_e( 'Your Name', 'dublin-painter-blocks' ); ?> *</label>
						<input type="text" id="dp-name" name="name" required placeholder="<?php esc_attr_e( 'John Smith', 'dublin-painter-blocks' ); ?>">
					</div>
					<div class="dp-form-group">
						<label for="dp-phone"><?php esc_html_e( 'Phone', 'dublin-painter-blocks' ); ?> *</label>
						<input type="tel" id="dp-phone" name="phone" required placeholder="<?php esc_attr_e( '01 234 5678', 'dublin-painter-blocks' ); ?>">
					</div>
				</div>
				<div class="dp-form-group">
					<label for="dp-email"><?php esc_html_e( 'Email', 'dublin-painter-blocks' ); ?></label>
					<input type="email" id="dp-email" name="email" placeholder="<?php esc_attr_e( 'john@example.com', 'dublin-painter-blocks' ); ?>">
				</div>
				<div class="dp-form-group">
					<label for="dp-service"><?php esc_html_e( 'Service Needed', 'dublin-painter-blocks' ); ?></label>
					<select id="dp-service" name="service">
						<option value=""><?php esc_html_e( 'Select a service...', 'dublin-painter-blocks' ); ?></option>
						<option value="interior"><?php esc_html_e( 'Interior Painting', 'dublin-painter-blocks' ); ?></option>
						<option value="exterior"><?php esc_html_e( 'Exterior Painting', 'dublin-painter-blocks' ); ?></option>
						<option value="commercial"><?php esc_html_e( 'Commercial Painting', 'dublin-painter-blocks' ); ?></option>
						<option value="spray"><?php esc_html_e( 'Spray Painting', 'dublin-painter-blocks' ); ?></option>
						<option value="other"><?php esc_html_e( 'Other', 'dublin-painter-blocks' ); ?></option>
					</select>
				</div>
				<div class="dp-form-group">
					<label for="dp-message"><?php esc_html_e( 'Tell us about your project', 'dublin-painter-blocks' ); ?></label>
					<textarea id="dp-message" name="message" rows="4" placeholder="<?php esc_attr_e( 'Describe the rooms, surfaces, or areas you need painted...', 'dublin-painter-blocks' ); ?>"></textarea>
				</div>
				<button type="submit" class="dp-btn dp-btn-brand dp-btn-block"><?php esc_html_e( 'Get My Free Quote', 'dublin-painter-blocks' ); ?></button>
				<p class="dp-form-disclaimer"><?php esc_html_e( 'We respect your privacy. No spam, ever.', 'dublin-painter-blocks' ); ?></p>
				<div class="dp-form-success" id="dp-form-success" style="display:none;">
					<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="16 9 10.5 14.5 8 12"/></svg>
					<h3><?php esc_html_e( 'Quote Request Sent!', 'dublin-painter-blocks' ); ?></h3>
					<p><?php esc_html_e( 'We will get back to you within 24 hours.', 'dublin-painter-blocks' ); ?></p>
				</div>
			</form>
		</div>
	</div>
</section>