<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$tiers = $attributes['tiers'] ?? array(
	array( 'name' => 'Essential', 'price' => 'From €1,500', 'features' => array( 'Single room refresh', 'Standard paints', '1-year guarantee' ), 'featured' => false ),
	array( 'name' => 'Premium', 'price' => 'From €3,500', 'features' => array( 'Full house interior', 'Premium Dulux paints', '5-year guarantee', 'Colour consultation' ), 'featured' => true ),
	array( 'name' => 'Complete', 'price' => 'Custom Quote', 'features' => array( 'Interior + Exterior', 'All premium materials', '10-year guarantee', 'Dedicated project manager' ), 'featured' => false ),
);
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'dp-pricing-section' ) ); ?>>
	<div class="dp-section-container">
		<div class="dp-section-header">
			<div class="dp-badge-pill"><?php esc_html_e( 'Transparent Pricing', 'dublin-painter-blocks' ); ?></div>
			<h2 class="dp-section-heading"><?php esc_html_e( 'Painting Packages for Every Budget', 'dublin-painter-blocks' ); ?></h2>
			<p class="dp-section-subheading"><?php esc_html_e( 'No hidden fees. No surprises. Choose the package that fits your project.', 'dublin-painter-blocks' ); ?></p>
		</div>
		<div class="dp-pricing-grid">
			<?php foreach ( $tiers as $tier ) :
				$name = $tier['name'] ?? '';
				$price = $tier['price'] ?? '';
				$features = $tier['features'] ?? array();
				$is_featured = ! empty( $tier['featured'] );
			?>
				<div class="dp-pricing-card <?php echo $is_featured ? 'dp-pricing-card--featured' : ''; ?>">
					<?php if ( $is_featured ) : ?>
						<div class="dp-pricing-badge">Most Popular</div>
					<?php endif; ?>
					<div class="dp-pricing-name"><?php echo esc_html( $name ); ?></div>
					<div class="dp-pricing-price"><?php echo esc_html( $price ); ?></div>
					<ul class="dp-pricing-features">
						<?php foreach ( $features as $feature ) : ?>
							<li>
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
								<?php echo esc_html( $feature ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
					<a href="/get-quote" class="dp-btn <?php echo $is_featured ? 'dp-btn-brand' : 'dp-btn-outline'; ?> dp-btn-block">
						<?php echo $is_featured ? esc_html__( 'Get Started', 'dublin-painter-blocks' ) : esc_html__( 'Get a Quote', 'dublin-painter-blocks' ); ?>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>