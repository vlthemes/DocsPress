<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

$acf_footer = docspress_get_theme_mod( 'page_custom_footer', true );

if ( docspress_get_theme_mod( 'footer_show', $acf_footer ) == 'show' ) {
	get_template_part( 'template-parts/footer/footer', 'template' );
}