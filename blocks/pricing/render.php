<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$badge_text = get_field( 'badge_text' ) ?? $attributes['badge_text'] ?? 'Transparent Pricing';
$heading    = get_field( 'heading' ) ?? $attributes['heading'] ?? 'Painting Packages for Every Budget';
$subheading = get_field( 'subheading' ) ?? $attributes['subheading'] ?? 'No hidden fees. No surprises. Choose the package that fits your project.';
$tiers_raw  = get_field( 'tiers' ) ?: $attributes['tiers'] ?? array(
	array( 'name' => 'Essential', 'price' => 'From €1,500', 'featured_badge' => '', 'features' => array( 'Single room refresh', 'Standard paints', '1-year guarantee' ), 'featured' => false, 'cta_text' => 'Get Quote', 'cta_url' => '#quote-section' ),
	array( 'name' => 'Premium', 'price' => 'From €3,500', 'featured_badge' => 'Most Popular', 'features' => array( 'Full house interior', 'Premium Dulux paints', '5-year guarantee', 'Colour consultation' ), 'featured' => true, 'cta_text' => 'Get Quote', 'cta_url' => '#quote-section' ),
	array( 'name' => 'Complete', 'price' => 'Custom Quote', 'featured_badge' => '', 'features' => array( 'Interior + Exterior', 'All premium materials', '10-year guarantee', 'Dedicated project manager' ), 'featured' => false, 'cta_text' => 'Get Quote', 'cta_url' => '#quote-section' ),
);
$tiers = array();
foreach ( $tiers_raw as $tier ) {
	$features = $tier['features'] ?? array();
	if ( ! empty( $features ) && isset( $features[0]['text'] ) ) {
		$features = array_map( function( $f ) { return $f['text'] ?? $f; }, $features );
	}
	$tiers[] = array(
		'name'           => $tier['name'] ?? '',
		'price'          => $tier['price'] ?? '',
		'featured_badge' => $tier['featured_badge'] ?? '',
		'features'       => $features,
		'featured'       => ! empty( $tier['featured'] ),
		'cta_text'       => $tier['cta_text'] ?? 'Get Quote',
		'cta_url'        => $tier['cta_url'] ?? '#quote-section',
	);
}
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'dp-pricing-section' ) ); ?>>
	<div class="dp-section-container">
		<div class="dp-section-header">
			<div class="dp-badge-pill"><?php echo esc_html( $badge_text ); ?></div>
			<h2 class="dp-section-heading"><?php echo esc_html( $heading ); ?></h2>
			<?php if ( $subheading ) : ?><p class="dp-section-subheading"><?php echo esc_html( $subheading ); ?></p><?php endif; ?>
		</div>
		<div class="dp-pricing-grid">
			<?php foreach ( $tiers as $tier ) : ?>
				<div class="dp-pricing-card <?php echo $tier['featured'] ? 'dp-pricing-card--featured' : ''; ?>">
					<?php if ( $tier['featured'] && $tier['featured_badge'] ) : ?>
						<div class="dp-pricing-badge"><?php echo esc_html( $tier['featured_badge'] ); ?></div>
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
					<a href="<?php echo esc_url( $tier['cta_url'] ); ?>" class="dp-btn dp-btn-pricing <?php echo $tier['featured'] ? 'dp-btn-featured' : ''; ?>"><?php echo esc_html( $tier['cta_text'] ); ?></a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
