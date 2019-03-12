<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

/**
 * Fallback menu
 */
if ( ! function_exists( 'docs_fallback_menu' ) ) {
	function docs_fallback_menu() {

		echo '<p class="vlt-no-menu-message">' . esc_html__( 'Please register navigation from', '@@textdomain' ) . ' ' . '<a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" target="_blank">' . esc_html__( 'Appearance > Menus', '@@textdomain' ) . '</a></p>';

	}
}