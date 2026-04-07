<?php
/**
 * Enqueue scripts and styles.
 *
 * @package nathan-west-michigan-realty
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_enqueue_scripts', 'nwmr_enqueue_assets' );
function nwmr_enqueue_assets(): void {
	// Google Fonts — Montserrat + Inter.
	wp_enqueue_style(
		'nwmr-google-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Montserrat:wght@600;700;800&display=swap',
		[],
		null
	);

	// Main theme stylesheet.
	wp_enqueue_style(
		'nwmr-theme',
		NWMR_URI . '/assets/css/theme.css',
		[ 'nwmr-google-fonts' ],
		NWMR_VERSION
	);

	// Theme JS (progressive enhancement only).
	wp_enqueue_script(
		'nwmr-theme',
		NWMR_URI . '/assets/js/theme.js',
		[],
		NWMR_VERSION,
		[ 'strategy' => 'defer', 'in_footer' => true ]
	);

	wp_localize_script( 'nwmr-theme', 'nwmrData', [
		'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		'nonce'   => wp_create_nonce( 'nwmr_nonce' ),
		'siteUrl' => esc_url( home_url() ),
	] );
}

/**
 * Enqueue block editor assets.
 */
add_action( 'enqueue_block_editor_assets', 'nwmr_editor_assets' );
function nwmr_editor_assets(): void {
	wp_enqueue_style(
		'nwmr-google-fonts-editor',
		'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Montserrat:wght@600;700;800&display=swap',
		[],
		null
	);
}

/**
 * Follow Up Boss Pixel — loads on all front-end pages.
 * Tracker ID: WT-GCCSSPEN
 */
add_action( 'wp_head', 'nwmr_followupboss_pixel' );
function nwmr_followupboss_pixel(): void {
	if ( is_admin() ) {
		return;
	}
	?>
	<!-- begin Follow Up Boss Pixel -->
	<script>
	(function(w,i,d,g,e,t){w["WidgetTrackerObject"]=g;(w[g]=w[g]||function()
	{(w[g].q=w[g].q||[]).push(arguments);}),(w[g].ds=1*new Date());(e="script"),
	(t=d.createElement(e)),(e=d.getElementsByTagName(e)[0]);t.async=1;t.src=i;
	e.parentNode.insertBefore(t,e);})
	(window,"https://widgetbe.com/agent",document,"widgetTracker");
	window.widgetTracker("create", "WT-GCCSSPEN");
	window.widgetTracker("send", "pageview");
	</script>
	<!-- end Follow Up Boss Pixel -->
	<?php
}

/**
 * Preconnect to Google Fonts for performance.
 */
add_filter( 'wp_resource_hints', 'nwmr_resource_hints', 10, 2 );
function nwmr_resource_hints( array $hints, string $relation_type ): array {
	if ( 'preconnect' === $relation_type ) {
		$hints[] = [ 'href' => 'https://fonts.googleapis.com' ];
		$hints[] = [ 'href' => 'https://fonts.gstatic.com', 'crossorigin' => 'anonymous' ];
	}
	return $hints;
}
