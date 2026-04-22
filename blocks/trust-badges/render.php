<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$badges = $attributes['badges'] ?? array(
	array( 'icon' => 'star', 'label' => '4.9/5 Google Rating', 'text' => '250+ Verified Reviews' ),
	array( 'icon' => 'shield', 'label' => 'Fully Insured', 'text' => '€2M Public Liability' ),
	array( 'icon' => 'map', 'label' => 'Serving All Dublin', 'text' => 'City & 30km Surrounds' ),
	array( 'icon' => 'clock', 'label' => 'Reliable & On Time', 'text' => 'Every Project Guaranteed' ),
);

$svg = array(
	'star' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
	'shield' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>',
	'map' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>',
	'clock' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
	'award' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M8.21 13.89 7 23l5-3 5 3-1.21-9.12"/></svg>',
	'check' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>',
);
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'dp-trust-badges-section' ) ); ?>>
	<div class="dp-section-container">
		<div class="dp-badges-grid">
			<?php foreach ( $badges as $badge ) :
				$icon = $svg[ $badge['icon'] ] ?? $svg['check'];
				$label = $badge['label'] ?? '';
				$text = $badge['text'] ?? '';
			?>
				<div class="dp-trust-badge-item">
					<div class="dp-badge-icon-circle"><?php echo $icon; ?></div>
					<div class="dp-badge-text">
						<div class="dp-badge-label"><?php echo esc_html( $label ); ?></div>
						<div class="dp-badge-subtext"><?php echo esc_html( $text ); ?></div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>