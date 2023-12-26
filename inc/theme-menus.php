<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

/**
 * Fallback menu
 */
if ( ! function_exists( 'docspress_fallback_menu' ) ) {
	function docspress_fallback_menu() {
		if ( current_user_can( 'administrator' ) ) {
			echo '<p class="vlt-no-menu-message">' . esc_html__( 'Please register navigation from', '@@textdomain' ) . ' ' . '<a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" target="_blank">' . esc_html__( 'Appearance > Menus', '@@textdomain' ) . '</a></p>';
		}
	}
}

/**
 * Nav breakpoint
 */
if ( ! function_exists( 'docspress_nav_breakpoint' ) ) {
	function docspress_nav_breakpoint() {
		return apply_filters('docspress/nav_breakpoint', 'xl');
	}
}