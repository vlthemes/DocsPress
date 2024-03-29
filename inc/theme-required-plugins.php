<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

/**
 * Required plugins
 */
if ( ! function_exists( 'docspress_tgm_plugins' ) ) {
	function docspress_tgm_plugins() {

		$source = 'https://vlthemes.me/plugins/';

		$plugins = array(
			array(
				'name' => esc_html__( 'Kirki', '@@textdomain' ),
				'slug' => 'kirki',
				'required' => true,
			),
			array(
				'name' => esc_html__( 'Advanced Custom Fields', '@@textdomain' ),
				'slug' => 'advanced-custom-fields-pro',
				'source' => esc_url( $source . 'advanced-custom-fields-pro.zip' ),
				'required' => true,
			),
			array(
				'name' => esc_html__( 'DocsPress Helper Plugin', '@@textdomain' ),
				'slug' => 'docspress_helper_plugin',
				'source' => esc_url( $source . 'docspress_helper_plugin.zip' ),
				'required' => true,
			),
			array(
				'name' => esc_html__( 'Elementor Page Builder', '@@textdomain' ),
				'slug' => 'elementor',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Ghost Kit', '@@textdomain' ),
				'slug' => 'ghostkit',
				'required' => true,
			),
			array(
				'name' => esc_html__( 'DocsPress', '@@textdomain' ),
				'slug' => 'docspress',
				'required' => true,
			),
			array(
				'name' => esc_html__( 'Contact Form 7', '@@textdomain' ),
				'slug' => 'contact-form-7',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Conditional Fields for Contact Form 7', '@@textdomain' ),
				'slug' => 'cf7-conditional-fields',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Multiline files upload for contact form 7', '@@textdomain' ),
				'slug' => 'multiline-files-for-contact-form-7',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Classic Widgets', '@@textdomain' ),
				'slug' => 'classic-widgets',
				'required' => false,
			),
		);

		tgmpa( $plugins );

	}
}
add_action( 'tgmpa_register', 'docspress_tgm_plugins' );