<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

$acf_header = docspress_get_theme_mod( 'page_custom_navigation', true );

if ( docspress_get_theme_mod( 'navigation_show', $acf_header ) == 'show' ) {
	get_template_part( 'template-parts/header/header', 'default' );
	get_template_part( 'template-parts/header/header', 'mobile' );
}

do_action( 'docs/ads_block' );