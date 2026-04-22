<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$badge_text = get_field( 'badge_text' ) ?? $attributes['badge_text'] ?? 'Client Reviews';
$heading = get_field( 'heading' ) ?? $attributes['heading'] ?? 'What Our Dublin Clients Say';
$subheading = get_field( 'subheading' ) ?? $attributes['subheading'] ?? '';
$max_reviews = get_field( 'maxReviews' ) ?? $attributes['maxReviews'] ?? 4;
$only_featured = get_field( 'onlyFeatured' ) ?? $attributes['onlyFeatured'] ?? false;
$reviews = array();
if ( post_type_exists( 'dp_testimonial' ) ) {
	$args = array( 'post_type' => 'dp_testimonial', 'posts_per_page' => $max_reviews, 'orderby' => 'date', 'order' => 'DESC' );
	if ( $only_featured ) { $args['meta_query'] = array( array( 'key' => 'featured', 'value' => '1', 'compare' => '=' ) ); }
	$posts = get_posts( $args );
	foreach ( $posts as $post ) {
		$reviews[] = array( 'name' => get_field( 'name', $post->ID ) ?: $post->post_title, 'rating' => get_field( 'rating', $post->ID ) ?: 5, 'text' => $post->post_content ?: get_field( 'text', $post->ID ) ?: '', 'location' => get_field( 'location', $post->ID ) ?: '' );
	}
}
if ( empty( $reviews ) ) {
	$reviews = array(
		array( 'name' => 'Sarah M., Ranelagh', 'rating' => 5, 'text' => 'Absolutely brilliant job on our living room. The team was professional, tidy, and finished ahead of schedule.', 'location' => 'Ranelagh' ),
		array( 'name' => 'David K., Blackrock', 'rating' => 5, 'text' => 'We had our whole exterior painted and it looks like a new house. The quality of prep work really shows.', 'location' => 'Blackrock' ),
		array( 'name' => 'Emma L., Castleknock', 'rating' => 5, 'text' => 'From the first phone call to the final walk-through, everything was handled with care.', 'location' => 'Castleknock' ),
		array( 'name' => 'Michael O., Howth', 'rating' => 5, 'text' => 'Best painters we have ever used. They protected all our furniture, cleaned up perfectly, and the finish is flawless.', 'location' => 'Howth' ),
	);
}
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'dp-testimonials-section' ) ); ?>>
	<div class="dp-section-container">
		<div class="dp-section-header">
			<?php if ( $badge_text ) : ?><div class="dp-badge-pill"><?php echo esc_html( $badge_text ); ?></div><?php endif; ?>
			<?php if ( $heading ) : ?><h2 class="dp-section-heading"><?php echo esc_html( $heading ); ?></h2><?php endif; ?>
			<?php if ( $subheading ) : ?><p class="dp-section-subheading"><?php echo esc_html( $subheading ); ?></p><?php endif; ?>
		</div>
		<div class="dp-reviews-grid">
			<?php foreach ( $reviews as $review ) : ?>
				<div class="dp-review-card">
					<div class="dp-review-stars">
						<?php for ( $s = 0; $s < ( $review['rating'] ?? 5 ); $s++ ) : ?>
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="#f59e0b" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
						<?php endfor; ?>
					</div>
					<p class="dp-review-text">&ldquo;<?php echo esc_html( $review['text'] ?? '' ); ?>&rdquo;</p>
					<div class="dp-review-author">
						<div class="dp-review-name"><?php echo esc_html( $review['name'] ?? '' ); ?></div>
						<?php if ( ! empty( $review['location'] ) ) : ?><div class="dp-review-location"><?php echo esc_html( $review['location'] ); ?></div><?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
