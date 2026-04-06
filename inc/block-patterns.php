<?php
/**
 * Register block pattern categories.
 * Individual patterns live in /patterns/ and are auto-registered by WordPress 6.0+.
 *
 * @package nathan-west-michigan-realty
 */

defined( 'ABSPATH' ) || exit;

add_action( 'init', 'nwmr_register_pattern_categories' );
function nwmr_register_pattern_categories(): void {
	register_block_pattern_category( 'nwmr-hero', [
		'label' => esc_html__( 'Heroes', 'nathan-west-michigan-realty' ),
	] );
	register_block_pattern_category( 'nwmr-sections', [
		'label' => esc_html__( 'Page Sections', 'nathan-west-michigan-realty' ),
	] );
	register_block_pattern_category( 'nwmr-cta', [
		'label' => esc_html__( 'Calls to Action', 'nathan-west-michigan-realty' ),
	] );
	register_block_pattern_category( 'nwmr-listings', [
		'label' => esc_html__( 'Listings', 'nathan-west-michigan-realty' ),
	] );
	register_block_pattern_category( 'nwmr-pages', [
		'label' => esc_html__( 'Full Page Layouts', 'nathan-west-michigan-realty' ),
	] );
}
