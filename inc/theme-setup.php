<?php
/**
 * Theme setup: supports, nav menus, image sizes.
 *
 * @package nathan-west-michigan-realty
 */

defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', 'nwmr_setup' );
function nwmr_setup(): void {
	load_theme_textdomain( 'nathan-west-michigan-realty', NWMR_DIR . '/languages' );

	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', [
		'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script', 'navigation-widgets',
	] );

	// Add editor stylesheet so admin editor matches front end.
	add_editor_style( 'assets/css/theme.css' );

	// Image sizes.
	add_image_size( 'nwmr-listing-card',   600, 400, true );
	add_image_size( 'nwmr-area-card',      800, 500, true );
	add_image_size( 'nwmr-hero',          1920, 900, true );
	add_image_size( 'nwmr-agent-portrait', 600, 750, true );
	add_image_size( 'nwmr-blog-thumb',     900, 600, true );

	// Navigation menus.
	register_nav_menus( [
		'primary'  => esc_html__( 'Primary Navigation', 'nathan-west-michigan-realty' ),
		'footer-1' => esc_html__( 'Footer: Quick Links', 'nathan-west-michigan-realty' ),
		'footer-2' => esc_html__( 'Footer: Resources', 'nathan-west-michigan-realty' ),
	] );
}

/**
 * Add custom block categories.
 */
add_filter( 'block_categories_all', 'nwmr_block_categories', 10, 2 );
function nwmr_block_categories( array $categories ): array {
	return array_merge(
		[
			[
				'slug'  => 'nwmr-patterns',
				'title' => esc_html__( 'West Michigan Realty', 'nathan-west-michigan-realty' ),
				'icon'  => 'admin-home',
			],
		],
		$categories
	);
}

/**
 * Customizer: basic site identity options.
 */
add_action( 'customize_register', 'nwmr_customizer' );
function nwmr_customizer( \WP_Customize_Manager $wp_customize ): void {
	$wp_customize->add_setting( 'nwmr_phone', [
		'default'           => '(616) 555-0100',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( 'nwmr_phone', [
		'label'   => esc_html__( 'Phone Number', 'nathan-west-michigan-realty' ),
		'section' => 'title_tagline',
		'type'    => 'text',
	] );

	$wp_customize->add_setting( 'nwmr_email', [
		'default'           => 'hello@nathanwestmichiganrealty.com',
		'sanitize_callback' => 'sanitize_email',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( 'nwmr_email', [
		'label'   => esc_html__( 'Contact Email', 'nathan-west-michigan-realty' ),
		'section' => 'title_tagline',
		'type'    => 'email',
	] );

	$wp_customize->add_setting( 'nwmr_license', [
		'default'           => 'Michigan Real Estate License # XXXXXXX',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( 'nwmr_license', [
		'label'   => esc_html__( 'License Number (footer disclaimer)', 'nathan-west-michigan-realty' ),
		'section' => 'title_tagline',
		'type'    => 'text',
	] );

	$wp_customize->add_setting( 'nwmr_brokerage', [
		'default'           => 'Brokerage Name Here',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	] );
	$wp_customize->add_control( 'nwmr_brokerage', [
		'label'   => esc_html__( 'Brokerage Name', 'nathan-west-michigan-realty' ),
		'section' => 'title_tagline',
		'type'    => 'text',
	] );
}

/**
 * Template tag helpers used in patterns / parts.
 */
function nwmr_phone(): string {
	return esc_html( get_theme_mod( 'nwmr_phone', '(616) 555-0100' ) );
}

function nwmr_email(): string {
	return esc_html( get_theme_mod( 'nwmr_email', 'hello@nathanwestmichiganrealty.com' ) );
}

function nwmr_license(): string {
	return esc_html( get_theme_mod( 'nwmr_license', 'Michigan Real Estate License # XXXXXXX' ) );
}

function nwmr_brokerage(): string {
	return esc_html( get_theme_mod( 'nwmr_brokerage', 'Brokerage Name Here' ) );
}
