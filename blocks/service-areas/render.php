<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$heading = get_field( 'heading' ) ?? $attributes['heading'] ?? 'Proudly Serving All of Dublin';
$areas_raw = get_field( 'areas' ) ?: $attributes['areas'] ?? array( 'Dublin City Centre', 'Ranelagh', 'Rathmines', 'Ballsbridge', 'Blackrock', 'Dun Laoghaire', 'Malahide', 'Howth', 'Castleknock', 'Clontarf', 'Swords', 'Lucan', 'Tallaght', 'Crumlin', 'Phibsboro', 'Sandymount', 'Killiney', 'Dalkey', 'Glasnevin' );
// Extract area names from repeater format or flat array
$areas = array();
foreach ( $areas_raw as $area ) {
	if ( is_array( $area ) ) {
		$areas[] = $area['name'] ?? $area['text'] ?? '';
	} else {
		$areas[] = $area;
	}
}
$areas = array_filter( $areas );
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'dp-areas-section' ) ); ?>>
	<div class="dp-section-container">
		<div class="dp-section-header">
			<div class="dp-badge-pill">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
				<?php esc_html_e( 'Coverage Map', 'dublin-painter-blocks' ); ?>
			</div>
			<h2 class="dp-section-heading"><?php echo esc_html( $heading ); ?></h2>
			<p class="dp-section-subheading"><?php esc_html_e( 'We cover every corner of Dublin — city centre, coastal, northside, southside, and surrounding counties within 30km.', 'dublin-painter-blocks' ); ?></p>
		</div>
		<div class="dp-areas-grid">
			<?php foreach ( $areas as $area ) : ?>
				<span class="dp-area-pill"><?php echo esc_html( $area ); ?></span>
			<?php endforeach; ?>
		</div>
	</div>
</section>
