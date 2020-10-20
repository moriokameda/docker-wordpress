<?php
/**
 * Feast theme settings page.
 *
 * @package   Feast\Functions\Admin
 * @copyright Copyright (c) 2020, Feast Design Co.
 * @license   GPL-2.0+
 * @since     3.1.7
 */

defined( 'WPINC' ) || die;

/**
 * Return the theme's SVG icon.
 *
 * @since  3.1.0
 * @access public
 * @return string A base64 encoded SVG icon for the theme.
 */
function feast_get_svg_icon() {
	$icon = 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgMjAgMTguMyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMjAgMTguMzsiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxnPjxnPjxwYXRoIGQ9Ik0xMCwxOC4zTDkuNiwxOEM5LjIsMTcuNywwLDExLjEsMCw1LjZDMCwyLjIsMi4xLDAsNS4yLDBDNi44LDAsOC42LDAuOCwxMCwyLjNDMTEuNCwwLjgsMTMuMiwwLDE0LjgsMEMxNy45LDAsMjAsMi4yLDIwLDUuNmMwLDUuNS05LjIsMTIuMi05LjYsMTIuNUwxMCwxOC4zeiBNNS4yLDEuNWMtMi43LDAtMy43LDIuMS0zLjcsNC4xYzAsMy43LDUuOCw4LjksOC41LDEwLjljMi43LTIuMSw4LjUtNy4yLDguNS0xMC45YzAtMi0xLTQuMS0zLjctNC4xYy0xLjMsMC0yLjcsMC43LTMuOSwyYzEsMS40LDEuNiwzLDEuNiw0LjNjMCwwLjgtMC4zLDEuNy0wLjksMi4yYy0wLjUsMC41LTEuMSwwLjgtMS43LDAuOFM4LjcsMTAuNSw4LjMsMTBDNy43LDkuNCw3LjQsOC42LDcuNCw3LjhDNy40LDYuNCw4LDQuOSw5LDMuNUM3LjksMi4yLDYuNSwxLjUsNS4yLDEuNXogTTEwLDQuN2MtMC43LDEtMS4xLDIuMi0xLjEsMy4xQzguOSw4LjIsOSw4LjcsOS4zLDljMC40LDAuNCwxLDAuNCwxLjQsMGMwLjMtMC4zLDAuNC0wLjcsMC40LTEuMkMxMS4xLDYuOSwxMC43LDUuOCwxMCw0Ljd6Ii8+PC9nPjwvZz48L3N2Zz4=';

	return "data:image/svg+xml;base64,{$icon}";
}

add_action( 'admin_menu', 'feast_theme_settings_admin_menu', 0 );
/**
 * Add the theme dashboard to the main WordPress dashboard menu.
 *
 * @since   3.1.0
 * @access  public
 * @return  void
 */
function feast_theme_settings_admin_menu() {
	add_menu_page(
		'Feast Theme Settings',
		'Feast Theme Settings',
		'edit_theme_options',
		'feast-theme-settings',
		'feast_theme_settings_page',
		feast_get_svg_icon(),
		'58.998'
	);
}

/**
 * Include the base template for our feast theme settings admin page.
 *
 * @since   3.1.0
 * @access  public
 * @return  void
 */
function feast_theme_settings_page() {
	require_once FEAST_THEME_DIR . 'lib/admin/views/feast-theme-settings.php';
}
