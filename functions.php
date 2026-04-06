<?php
/**
 * Nathan West Michigan Realty — Theme Functions
 *
 * @package nathan-west-michigan-realty
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

define( 'NWMR_VERSION', '1.0.0' );
define( 'NWMR_DIR',     get_template_directory() );
define( 'NWMR_URI',     get_template_directory_uri() );

/**
 * Load theme components.
 */
require_once NWMR_DIR . '/inc/theme-setup.php';
require_once NWMR_DIR . '/inc/enqueue.php';
require_once NWMR_DIR . '/inc/custom-post-types.php';
require_once NWMR_DIR . '/inc/block-patterns.php';
