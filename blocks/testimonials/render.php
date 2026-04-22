<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$heading = $attributes['heading'] ?? 'What Our Dublin Clients Say';
$max_reviews = $attributes['maxReviews'] ?? 4;
$only_featured = $attributes['onlyFeatured'] ?? false;

// Try to query dp_testimonial CPT
$reviews = array();
if ( post_type_exists( 'dp_testimonial' ) ) {
	$args = array(
		'post_type' => 'dp_testimonial',
		'posts_per_page' => $max_reviews,
		'orderby' => 'date',
		'order' => 'DESC',
	);
	if ( $only_featured ) {
		$args['meta_query'] = array(
			array( 'key' => 'featured', 'value' => '1', 'compare' => '=' ),
		);
	}
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$reviews[] = array(
				'name' => get_post_meta( get_the_ID(), 'reviewer_name', true ) ?: get_the_title(),
				'location' => get_post_meta( get_the_ID(), 'reviewer_location', true ) ?: 'Dublin',
				'rating' => get_post_meta( get_the_ID(), 'rating', true ) ?: 5,
				'text' => get_the_content(),
				'google_url' => get_post_meta( get_the_ID(), 'google_url', true ) ?: '',
			);
		}
		wp_reset_postdata();
	}
}

// Fallback sample reviews
if ( empty( $reviews ) ) {
	$reviews = array(
		array( 'name' => 'Sarah M.', 'location' => 'Ranelagh', 'rating' => 5, 'text' => 'Absolutely transformed our living room. The team was punctual, clean, and the finish is flawless. Best painters in Dublin, no question.', 'google_url' => '' ),
		array( 'name' => 'James O\'Brien', 'location' => 'Blackrock', 'rating' => 5, 'text' => 'Had the exterior of our house done. They used premium masonry paint and it looks incredible. The 10-year guarantee gives real peace of mind.', 'google_url' => '' ),
		array( 'name' => 'Marie K.', 'location' => 'Dun Laoghaire', 'rating' => 5, 'text' => 'From quote to finish, everything was professional. The colour consultation was a lovely touch — they helped us choose the perfect shade.', 'google_url' => '' ),
		array( 'name' => 'David H.', 'location' => 'Castleknock', 'rating' => 5, 'text' => 'Had 6 rooms painted in 3 days. Zero mess left behind. The dustless sanding tech is amazing — no cleanup required on our end at all.', 'google_url' => '' ),
	);
}
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'dp-testimonials-section' ) ); ?>>
	<div class="dp-section-container">
		<div class="dp-section-header">
			<div class="dp-badge-pill"><?php esc_html_e( 'Client Reviews', 'dublin-painter-blocks' ); ?></div>
			<h2 class="dp-section-heading"><?php echo esc_html( $heading ); ?></h2>
			<p class="dp-section-subheading"><?php esc_html_e( 'Real reviews from real Dublin homeowners who chose quality.', 'dublin-painter-blocks' ); ?></p>
		</div>
		<div class="dp-reviews-grid">
			<?php foreach ( $reviews as $review ) :
				$rating = intval( $review['rating'] );
				$name = $review['name'] ?? '';
				$location = $review['location'] ?? '';
				$text = $review['text'] ?? '';
				$url = $review['google_url'] ?? '';
			?>
				<div class="dp-review-card">
					<div class="dp-review-stars">
						<?php for ( $s = 0; $s < $rating; $s++ ) : ?>
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="dp-star-filled"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
						<?php endfor; ?>
					</div>
					<p class="dp-review-text">"<?php echo esc_html( $text ); ?>"</p>
					<div class="dp-review-meta">
						<div class="dp-review-author">
							<div class="dp-review-avatar"><?php echo esc_html( substr( $name, 0, 1 ) ); ?></div>
							<div>
								<div class="dp-review-name"><?php echo esc_html( $name ); ?></div>
								<div class="dp-review-location"><?php echo esc_html( $location ); ?></div>
							</div>
						</div>
						<?php if ( $url ) : ?>
							<a href="<?php echo esc_url( $url ); ?>" class="dp-review-link" target="_blank" rel="noopener">View on Google</a>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>