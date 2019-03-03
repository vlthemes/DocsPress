<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

/**
 * Fallback menu
 */
if ( ! function_exists( 'docs_fallback_menu' ) ) {
	function docs_fallback_menu() {
		echo '<p class="vlt-no-menu-message">' . esc_html__( 'Please register navigation from', 'docs' ) . ' ' . '<a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" target="_blank">' . esc_html__( 'Appearance > Menus', 'docs' ) . '</a></p>';
	}
}