<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$heading = $attributes['heading'] ?? 'Our Process';
$steps = $attributes['steps'] ?? array(
	array( 'title' => 'Consultation', 'description' => 'Free on-site assessment and detailed quote.' ),
	array( 'title' => 'Preparation', 'description' => 'Expert surface prep including cleaning, sanding and repairs.' ),
	array( 'title' => 'Painting', 'description' => 'Premium materials applied with precision craftsmanship.' ),
	array( 'title' => 'Inspection', 'description' => 'Final walkthrough to ensure your complete satisfaction.' ),
);
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'dp-process-section' ) ); ?>>
	<div class="dp-section-container">
		<?php if ( $heading ) : ?>
			<div class="dp-section-header">
				<div class="dp-badge-pill"><?php esc_html_e( 'How It Works', 'dublin-painter-blocks' ); ?></div>
				<h2 class="dp-section-heading"><?php echo esc_html( $heading ); ?></h2>
			</div>
		<?php endif; ?>
		<div class="dp-process-grid">
			<?php $i = 1; foreach ( $steps as $step ) : ?>
				<div class="dp-process-step">
					<div class="dp-process-number"><?php echo $i; ?></div>
					<div class="dp-process-connector" aria-hidden="true"></div>
					<h3 class="dp-process-title"><?php echo esc_html( $step['title'] ?? '' ); ?></h3>
					<p class="dp-process-desc"><?php echo esc_html( $step['description'] ?? '' ); ?></p>
				</div>
			<?php $i++; endforeach; ?>
		</div>
	</div>
</section>