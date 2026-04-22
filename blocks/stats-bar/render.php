<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$stats = $attributes['stats'] ?? array(
	array( 'number' => '10+', 'label' => 'Years Experience' ),
	array( 'number' => '500+', 'label' => 'Projects Completed' ),
	array( 'number' => '100%', 'label' => 'Client Satisfaction' ),
);
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'dp-stats-bar-section' ) ); ?>>
	<div class="dp-section-container">
		<div class="dp-stats-grid">
			<?php foreach ( $stats as $stat ) : ?>
				<div class="dp-stat-item">
					<div class="dp-stat-number"><?php echo esc_html( $stat['number'] ?? '' ); ?></div>
					<div class="dp-stat-label"><?php echo esc_html( $stat['label'] ?? '' ); ?></div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>