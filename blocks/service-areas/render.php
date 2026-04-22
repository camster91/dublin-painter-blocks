<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$badge_text = get_field( 'badge_text' ) ?? $attributes['badge_text'] ?? 'Coverage Map';
$heading = get_field( 'heading' ) ?? $attributes['heading'] ?? 'Proudly Serving All of Dublin';
$subheading = get_field( 'subheading' ) ?? $attributes['subheading'] ?? 'We cover every corner of Dublin and surrounding counties within 30km.';
$areas_raw = get_field( 'areas' ) ?: $attributes['areas'] ?? array( 'Dublin City Centre', 'Ranelagh', 'Rathmines', 'Ballsbridge', 'Blackrock', 'Dun Laoghaire', 'Malahide', 'Howth', 'Castleknock', 'Clontarf', 'Swords', 'Lucan', 'Tallaght', 'Crumlin', 'Phibsboro', 'Sandymount', 'Killiney', 'Dalkey', 'Glasnevin' );
$areas = array();
foreach ( $areas_raw as $area ) {
	$areas[] = is_array( $area ) ? ( $area['name'] ?? '' ) : $area;
}
$areas = array_filter( $areas );
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'dp-areas-section' ) ); ?>>
	<div class="dp-section-container">
		<div class="dp-section-header">
			<?php if ( $badge_text ) : ?><div class="dp-badge-pill"><?php echo esc_html( $badge_text ); ?></div><?php endif; ?>
			<?php if ( $heading ) : ?><h2 class="dp-section-heading"><?php echo esc_html( $heading ); ?></h2><?php endif; ?>
			<?php if ( $subheading ) : ?><p class="dp-section-subheading"><?php echo esc_html( $subheading ); ?></p><?php endif; ?>
		</div>
		<div class="dp-areas-grid">
			<?php foreach ( $areas as $area ) : ?>
				<span class="dp-area-pill"><?php echo esc_html( $area ); ?></span>
			<?php endforeach; ?>
		</div>
	</div>
</section>
