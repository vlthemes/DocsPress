<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

if ( ! function_exists( 'docspress_dynamic_css' ) ) {
	function docspress_dynamic_css( $styles ) {

		$colors = docspress_get_hsl_variables( '--vlt-accent-1', docspress_get_theme_mod( 'accent_colors' )[ 'first' ] );
		$colors .= docspress_get_hsl_variables( '--vlt-accent-2', docspress_get_theme_mod( 'accent_colors' )[ 'second' ] );

		$styles .= ':root {' . $colors . '}';

		return $styles;
	}
}
add_filter( 'kirki_docspress_customize_dynamic_css', 'docspress_dynamic_css' );