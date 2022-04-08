<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

if ( ! function_exists( 'docs_dynamic_css' ) ) {
	function docs_dynamic_css( $styles ) {

		$colors = docs_get_hsl_variables( '--vlt-accent-1', docs_get_theme_mod( 'accent_colors' )[ 'first' ] );
		$colors .= docs_get_hsl_variables( '--vlt-accent-2', docs_get_theme_mod( 'accent_colors' )[ 'second' ] );

		$styles .= ':root {' . $colors . '}';

		return $styles;
	}
}
add_filter( 'kirki_docs_customize_dynamic_css', 'docs_dynamic_css' );