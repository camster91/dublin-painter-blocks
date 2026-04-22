<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$heading = get_field( 'heading' ) ?? $attributes['heading'] ?? 'Frequently Asked Questions';
$questions = get_field( 'questions' ) ?: $attributes['questions'] ?? array(
	array( 'question' => 'How long does a typical painting project take?', 'answer' => 'Most interior projects take 2-5 days. Exterior projects depend on weather but typically 3-7 days.' ),
	array( 'question' => 'Do you provide free quotes?', 'answer' => 'Yes, all quotes are 100% free with no obligation. We provide a detailed fixed-price quote within 24 hours.' ),
	array( 'question' => 'What areas of Dublin do you cover?', 'answer' => 'We cover all of Dublin city and county, including towns within a 30km radius.' ),
	array( 'question' => 'Are you fully insured?', 'answer' => 'Yes, we carry €2M Public Liability insurance and all painters are Safe Pass certified.' ),
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
	<script type="application/ld+json"><?php echo wp_json_encode( $schema, JSON_UNESCAPED_UNICODE ); ?></script>
	<div class="dp-section-container">
		<div class="dp-section-header">
			<h2 class="dp-section-heading"><?php echo esc_html( $heading ); ?></h2>
		</div>
		<div class="dp-faq-list">
			<?php foreach ( $questions as $q ) : ?>
				<details class="dp-faq-item">
					<summary class="dp-faq-question"><?php echo esc_html( $q['question'] ?? '' ); ?></summary>
					<div class="dp-faq-answer"><?php echo esc_html( $q['answer'] ?? '' ); ?></div>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>
