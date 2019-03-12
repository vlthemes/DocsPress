<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

/**
 * Required plugins
 */
if ( ! function_exists( 'docs_tgm_plugins' ) ) {
	function docs_tgm_plugins() {

		$plugins = array(
			array(
				'name' => esc_html__( 'Kirki', 'docs' ),
				'slug' => 'kirki',
				'required' => true,
			),
			array(
				'name' => esc_html__( 'Ghost Kit', 'docs' ),
				'slug' => 'ghostkit',
				'required' => true,
			),
			array(
				'name' => esc_html__( 'DocsPress', 'docs' ),
				'slug' => 'docspress',
				'required' => true,
			),
			array(
				'name' => esc_html__( 'Contact Form 7', 'docs' ),
				'slug' => 'contact-form-7',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'MailChimp for WordPress', 'docs' ),
				'slug' => 'mailchimp-for-wp',
				'required' => false,
			),
		);

		tgmpa( $plugins );

	}
}
add_action( 'tgmpa_register', 'docs_tgm_plugins' );