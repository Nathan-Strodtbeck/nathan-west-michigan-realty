<?php
/**
 * Custom Post Types and Taxonomies.
 *
 * @package nathan-west-michigan-realty
 */

defined( 'ABSPATH' ) || exit;

add_action( 'init', 'nwmr_register_post_types' );
function nwmr_register_post_types(): void {

	/* ─── Area Guide ──────────────────────────────────── */
	register_post_type( 'area_guide', [
		'labels' => [
			'name'               => esc_html__( 'Area Guides', 'nathan-west-michigan-realty' ),
			'singular_name'      => esc_html__( 'Area Guide', 'nathan-west-michigan-realty' ),
			'add_new_item'       => esc_html__( 'Add New Area Guide', 'nathan-west-michigan-realty' ),
			'edit_item'          => esc_html__( 'Edit Area Guide', 'nathan-west-michigan-realty' ),
			'new_item'           => esc_html__( 'New Area Guide', 'nathan-west-michigan-realty' ),
			'view_item'          => esc_html__( 'View Area Guide', 'nathan-west-michigan-realty' ),
			'search_items'       => esc_html__( 'Search Area Guides', 'nathan-west-michigan-realty' ),
			'not_found'          => esc_html__( 'No area guides found.', 'nathan-west-michigan-realty' ),
			'not_found_in_trash' => esc_html__( 'No area guides found in trash.', 'nathan-west-michigan-realty' ),
			'menu_name'          => esc_html__( 'Area Guides', 'nathan-west-michigan-realty' ),
		],
		'public'              => true,
		'show_in_rest'        => true,
		'has_archive'         => 'areas',
		'rewrite'             => [ 'slug' => 'area', 'with_front' => false ],
		'supports'            => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions' ],
		'menu_icon'           => 'dashicons-location',
		'menu_position'       => 20,
		'template'            => [
			[ 'core/pattern', [ 'slug' => 'nathan-west-michigan-realty/area-guide-content' ] ],
		],
	] );

	/* ─── Testimonial ─────────────────────────────────── */
	register_post_type( 'testimonial', [
		'labels' => [
			'name'               => esc_html__( 'Testimonials', 'nathan-west-michigan-realty' ),
			'singular_name'      => esc_html__( 'Testimonial', 'nathan-west-michigan-realty' ),
			'add_new_item'       => esc_html__( 'Add New Testimonial', 'nathan-west-michigan-realty' ),
			'edit_item'          => esc_html__( 'Edit Testimonial', 'nathan-west-michigan-realty' ),
			'menu_name'          => esc_html__( 'Testimonials', 'nathan-west-michigan-realty' ),
		],
		'public'              => false,
		'publicly_queryable'  => false,
		'show_ui'             => true,
		'show_in_rest'        => true,
		'show_in_menu'        => true,
		'has_archive'         => false,
		'supports'            => [ 'title', 'editor', 'custom-fields' ],
		'menu_icon'           => 'dashicons-format-quote',
		'menu_position'       => 21,
	] );

	/* ─── Listing Preview ─────────────────────────────── */
	register_post_type( 'listing_preview', [
		'labels' => [
			'name'               => esc_html__( 'Listing Previews', 'nathan-west-michigan-realty' ),
			'singular_name'      => esc_html__( 'Listing Preview', 'nathan-west-michigan-realty' ),
			'add_new_item'       => esc_html__( 'Add New Listing Preview', 'nathan-west-michigan-realty' ),
			'edit_item'          => esc_html__( 'Edit Listing Preview', 'nathan-west-michigan-realty' ),
			'menu_name'          => esc_html__( 'Listing Previews', 'nathan-west-michigan-realty' ),
		],
		'public'              => true,
		'show_in_rest'        => true,
		'has_archive'         => 'listings',
		'rewrite'             => [ 'slug' => 'listing', 'with_front' => false ],
		'supports'            => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions' ],
		'menu_icon'           => 'dashicons-admin-home',
		'menu_position'       => 22,
	] );
}

/**
 * Register taxonomies.
 */
add_action( 'init', 'nwmr_register_taxonomies' );
function nwmr_register_taxonomies(): void {

	/* ─── Neighborhood (for Area Guides & Listing Previews) ── */
	register_taxonomy( 'neighborhood', [ 'area_guide', 'listing_preview' ], [
		'labels' => [
			'name'          => esc_html__( 'Neighborhoods', 'nathan-west-michigan-realty' ),
			'singular_name' => esc_html__( 'Neighborhood', 'nathan-west-michigan-realty' ),
			'menu_name'     => esc_html__( 'Neighborhoods', 'nathan-west-michigan-realty' ),
		],
		'hierarchical'      => true,
		'public'            => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'rewrite'           => [ 'slug' => 'neighborhood' ],
	] );

	/* ─── Listing Type ──────────────────────────────────── */
	register_taxonomy( 'listing_type', 'listing_preview', [
		'labels' => [
			'name'          => esc_html__( 'Listing Types', 'nathan-west-michigan-realty' ),
			'singular_name' => esc_html__( 'Listing Type', 'nathan-west-michigan-realty' ),
			'menu_name'     => esc_html__( 'Types', 'nathan-west-michigan-realty' ),
		],
		'hierarchical'      => true,
		'public'            => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'rewrite'           => [ 'slug' => 'listing-type' ],
	] );
}

/**
 * Register custom meta fields (REST-accessible for blocks).
 */
add_action( 'init', 'nwmr_register_meta' );
function nwmr_register_meta(): void {
	$listing_meta = [
		'_nwmr_price'          => [ 'label' => 'Price',           'type' => 'string' ],
		'_nwmr_beds'           => [ 'label' => 'Bedrooms',        'type' => 'integer' ],
		'_nwmr_baths'          => [ 'label' => 'Bathrooms',       'type' => 'number' ],
		'_nwmr_sqft'           => [ 'label' => 'Square Feet',     'type' => 'integer' ],
		'_nwmr_city'           => [ 'label' => 'City',            'type' => 'string' ],
		'_nwmr_status'         => [ 'label' => 'Status',          'type' => 'string' ],
		'_nwmr_mls_id'         => [ 'label' => 'MLS ID',          'type' => 'string' ],
		'_nwmr_idx_url'        => [ 'label' => 'IDX Detail URL',  'type' => 'string' ],
		'_nwmr_garage'         => [ 'label' => 'Garage',          'type' => 'string' ],
		'_nwmr_year_built'     => [ 'label' => 'Year Built',      'type' => 'integer' ],
		'_nwmr_lot_size'       => [ 'label' => 'Lot Size',        'type' => 'string' ],
		'_nwmr_featured'       => [ 'label' => 'Featured',        'type' => 'boolean' ],
	];

	foreach ( $listing_meta as $key => $args ) {
		register_post_meta( 'listing_preview', $key, [
			'single'        => true,
			'type'          => $args['type'],
			'show_in_rest'  => true,
			'auth_callback' => fn() => current_user_can( 'edit_posts' ),
		] );
	}

	// Testimonial meta.
	$testimonial_meta = [
		'_nwmr_reviewer_name'   => 'string',
		'_nwmr_reviewer_city'   => 'string',
		'_nwmr_reviewer_stars'  => 'integer',
		'_nwmr_reviewer_source' => 'string',
		'_nwmr_reviewer_photo'  => 'integer',
	];

	foreach ( $testimonial_meta as $key => $type ) {
		register_post_meta( 'testimonial', $key, [
			'single'        => true,
			'type'          => $type,
			'show_in_rest'  => true,
			'auth_callback' => fn() => current_user_can( 'edit_posts' ),
		] );
	}

	// Area guide meta.
	$area_meta = [
		'_nwmr_area_tagline'        => 'string',
		'_nwmr_area_median_price'   => 'string',
		'_nwmr_area_schools'        => 'string',
		'_nwmr_area_commute'        => 'string',
		'_nwmr_area_highlights'     => 'string',
	];

	foreach ( $area_meta as $key => $type ) {
		register_post_meta( 'area_guide', $key, [
			'single'        => true,
			'type'          => $type,
			'show_in_rest'  => true,
			'auth_callback' => fn() => current_user_can( 'edit_posts' ),
		] );
	}
}

/**
 * Flush rewrite rules on activation only.
 */
add_action( 'after_switch_theme', 'nwmr_flush_rewrites' );
function nwmr_flush_rewrites(): void {
	nwmr_register_post_types();
	nwmr_register_taxonomies();
	flush_rewrite_rules();
}
