<?php
/**
 * Admin functions.
 *
 * @package   FoodiePro\Functions\Admin
 * @copyright Copyright (c) 2020, Feast Design Co.
 * @license   GPL-2.0+
 * @since     3.0.0
 */

defined( 'WPINC' ) || die;

require_once FEAST_THEME_DIR . 'lib/admin/metaboxes.php';

if ( (bool) apply_filters( 'foodie_pro_enable_theme_dashboard', true ) ) {
	require_once FEAST_THEME_DIR . 'lib/admin/dashboard.php';
}

add_action( 'admin_enqueue_scripts', 'foodie_pro_load_admin_styles' );
/**
 * Enqueue Foodie Pro admin styles.
 *
 * @since   2.0.0
 * @uses   CHILD_THEME_VERSION
 * @return void
 */
function foodie_pro_load_admin_styles() {
	wp_enqueue_style(
		'foodie-pro-admin',
		FEAST_THEME_URI . 'css/admin.css',
		array(),
		CHILD_THEME_VERSION
	);
}
