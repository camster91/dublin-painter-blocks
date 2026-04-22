<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$heading = $attributes['heading'] ?? 'Frequently Asked Questions';
$questions = $attributes['questions'] ?? array(
	array( 'question' => 'How long does a typical painting project take?', 'answer' => 'Most interior projects take 2-5 days. Exterior projects depend on weather but typically 3-7 days.' ),
	array( 'question' => 'Do you provide free quotes?', 'answer' => 'Yes, all quotes are 100% free with no obligation. We provide a detailed fixed-price quote within 24 hours.' ),
	array( 'question' => 'What areas of Dublin do you cover?', 'answer' => 'We cover all of Dublin city and county, including towns within a 30km radius.' ),
	array( 'question' => 'Are you fully insured?', 'answer' => 'Yes, we carry 2M euro Public Liability insurance and all painters are Safe Pass certified.' ),
	array( 'question' => 'What paint brands do you use?', 'answer' => 'We primarily use Dulux and Fleetwood premium paints.' ),
);

// Build JSON-LD schema
$schema_items = array();
foreach ( $questions as $q ) {
	$schema_items[] = array(
		'@type' => 'Question',
		'name' => $q['question'] ?? '',
		'acceptedAnswer' => array(
			'@type' => 'Answer',
			'text' => $q['answer'] ?? '',
		),
	);
}
$schema = array(
	'@context' => 'https://schema.org',
	'@type' => 'FAQPage',
	'mainEntity' => $schema_items,
);
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'dp-faq-section' ) ); ?>>
	<script type="application/ld+json"><?php echo wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ); ?></script>
	<div class="dp-section-container">
		<?php if ( $heading ) : ?>
			<div class="dp-section-header">
				<div class="dp-badge-pill"><?php esc_html_e( 'Got Questions?', 'dublin-painter-blocks' ); ?></div>
				<h2 class="dp-section-heading"><?php echo esc_html( $heading ); ?></h2>
			</div>
		<?php endif; ?>
		<div class="dp-faq-list">
			<?php foreach ( $questions as $q ) : ?>
				<details class="dp-faq-item">
					<summary class="dp-faq-question">
						<span><?php echo esc_html( $q['question'] ?? '' ); ?></span>
						<svg class="dp-faq-chevron" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
					</summary>
					<div class="dp-faq-answer">
						<p><?php echo esc_html( $q['answer'] ?? '' ); ?></p>
					</div>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>