<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$heading = $attributes['heading'] ?? 'Professional Painting Services';
$subheading = $attributes['subheading'] ?? '';
$features = $attributes['features'] ?? array();
if ( empty( $features ) ) {
	$features = array(
		array( 'title' => 'Expert Interior Decorating', 'description' => 'Flawless luxury finishes with our signature dustless sanding technology.', 'image' => '', 'bullets' => array( 'Dustless Sanding Technology', 'Premium Farrow & Ball Finishes', 'Expert Colour Consultation' ) ),
		array( 'title' => '10-Year Exterior Protection', 'description' => 'Protect your home with advanced breathable masonry coatings guaranteed for a decade.', 'image' => '', 'bullets' => array( 'Weatherproof Masonry Coatings', 'Professional Power Washing', '10-Year Written Guarantee' ) ),
		array( 'title' => 'Zero-Downtime Commercial', 'description' => 'Night and weekend scheduling for offices, retail, and industrial painting across Dublin.', 'image' => '', 'bullets' => array( 'Flexible Scheduling', 'Minimal Business Disruption', 'Commercial-Grade Materials' ) ),
	);
}
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'dp-service-features-section' ) ); ?>>
	<div class="dp-section-container">
		<?php if ( $heading ) : ?>
			<div class="dp-section-header">
				<div class="dp-badge-pill"><?php esc_html_e( 'Our Expertise', 'dublin-painter-blocks' ); ?></div>
				<h2 class="dp-section-heading"><?php echo esc_html( $heading ); ?></h2>
				<?php if ( $subheading ) : ?><p class="dp-section-subheading"><?php echo esc_html( $subheading ); ?></p><?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="dp-features-list">
			<?php $i = 0; foreach ( $features as $feature ) :
				$title = $feature['title'] ?? '';
				$desc = $feature['description'] ?? '';
				$img = $feature['image'] ?? '';
				$bullets = $feature['bullets'] ?? array();
				$is_reversed = ( $i % 2 === 1 );
				$i++;
			?>
				<div class="dp-feature-row <?php echo $is_reversed ? 'dp-feature-row--reversed' : ''; ?>">
					<div class="dp-feature-image">
						<?php if ( $img ) : ?>
							<img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( $title ); ?>" loading="lazy">
						<?php else : ?>
							<div class="dp-feature-placeholder">
								<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
									<span>Add Image</span>
							</div>
						<?php endif; ?>
					</div>
					<div class="dp-feature-content">
						<h3 class="dp-feature-title"><?php echo esc_html( $title ); ?></h3>
						<p class="dp-feature-desc"><?php echo esc_html( $desc ); ?></p>
						<?php if ( ! empty( $bullets ) ) : ?>
							<ul class="dp-feature-bullets">
								<?php foreach ( $bullets as $bullet ) : ?>
									<li>
										<span class="dp-benefit-check">
											<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
										</span>
										<?php echo esc_html( $bullet ); ?>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>