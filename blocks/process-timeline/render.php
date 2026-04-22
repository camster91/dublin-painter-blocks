<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$badge_text = get_field( 'badge_text' ) ?? $attributes['badge_text'] ?? 'How It Works';
$heading = get_field( 'heading' ) ?? $attributes['heading'] ?? 'Our Process';
$subheading = get_field( 'subheading' ) ?? $attributes['subheading'] ?? '';
$steps = get_field( 'steps' ) ?: $attributes['steps'] ?? array(
	array( 'title' => 'Consultation', 'description' => 'Free on-site assessment and detailed quote.' ),
	array( 'title' => 'Preparation', 'description' => 'Expert surface prep including cleaning, sanding and repairs.' ),
	array( 'title' => 'Painting', 'description' => 'Premium materials applied with precision craftsmanship.' ),
	array( 'title' => 'Inspection', 'description' => 'Final walkthrough to ensure your complete satisfaction.' ),
);
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'dp-process-section' ) ); ?>>
	<div class="dp-section-container">
		<div class="dp-section-header">
			<?php if ( $badge_text ) : ?><div class="dp-badge-pill"><?php echo esc_html( $badge_text ); ?></div><?php endif; ?>
			<?php if ( $heading ) : ?><h2 class="dp-section-heading"><?php echo esc_html( $heading ); ?></h2><?php endif; ?>
			<?php if ( $subheading ) : ?><p class="dp-section-subheading"><?php echo esc_html( $subheading ); ?></p><?php endif; ?>
		</div>
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
