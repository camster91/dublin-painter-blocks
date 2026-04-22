<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$tiers_raw = get_field( 'tiers' ) ?: $attributes['tiers'] ?? array(
	array( 'name' => 'Essential', 'price' => 'From €1,500', 'features' => array( 'Single room refresh', 'Standard paints', '1-year guarantee' ), 'featured' => false ),
	array( 'name' => 'Premium', 'price' => 'From €3,500', 'features' => array( 'Full house interior', 'Premium Dulux paints', '5-year guarantee', 'Colour consultation' ), 'featured' => true ),
	array( 'name' => 'Complete', 'price' => 'Custom Quote', 'features' => array( 'Interior + Exterior', 'All premium materials', '10-year guarantee', 'Dedicated project manager' ), 'featured' => false ),
);
// Normalize features from ACF repeater format
$tiers = array();
foreach ( $tiers_raw as $tier ) {
	$features = $tier['features'] ?? array();
	// If features is array of arrays (ACF repeater), extract text values
	if ( ! empty( $features ) && isset( $features[0]['text'] ) ) {
		$features = array_map( function( $f ) { return $f['text'] ?? $f; }, $features );
	}
	$tiers[] = array(
		'name' => $tier['name'] ?? '',
		'price' => $tier['price'] ?? '',
		'features' => $features,
		'featured' => ! empty( $tier['featured'] ),
	);
}
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'dp-pricing-section' ) ); ?>>
	<div class="dp-section-container">
		<div class="dp-section-header">
			<div class="dp-badge-pill"><?php esc_html_e( 'Transparent Pricing', 'dublin-painter-blocks' ); ?></div>
			<h2 class="dp-section-heading"><?php esc_html_e( 'Painting Packages for Every Budget', 'dublin-painter-blocks' ); ?></h2>
			<p class="dp-section-subheading"><?php esc_html_e( 'No hidden fees. No surprises. Choose the package that fits your project.', 'dublin-painter-blocks' ); ?></p>
		</div>
		<div class="dp-pricing-grid">
			<?php foreach ( $tiers as $tier ) : ?>
				<div class="dp-pricing-card <?php echo $tier['featured'] ? 'dp-pricing-card--featured' : ''; ?>">
					<?php if ( $tier['featured'] ) : ?>
						<div class="dp-pricing-badge">Most Popular</div>
					<?php endif; ?>
					<div class="dp-pricing-name"><?php echo esc_html( $tier['name'] ); ?></div>
					<div class="dp-pricing-price"><?php echo esc_html( $tier['price'] ); ?></div>
					<ul class="dp-pricing-features">
						<?php foreach ( $tier['features'] as $feature ) : ?>
							<li>
								<span class="dp-benefit-check"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>
								<?php echo esc_html( $feature ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
					<a href="#quote-section" class="dp-btn dp-btn-pricing <?php echo $tier['featured'] ? 'dp-btn-featured' : ''; ?>">Get Quote</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
