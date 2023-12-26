<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

/**
 * ACF in Admin Panel
 */
if ( ! function_exists( 'docspress_acf_in_admin_panel' ) ) {
	function docspress_acf_in_admin_panel() {
		return docspress_get_theme_mod( 'acf_show_admin_panel' ) == 'show' ? true : false;
	}
}
add_filter( 'docs/acf_show_admin_panel', 'docspress_acf_in_admin_panel' );


/**
 * Add body class
 */
if ( ! function_exists( 'docspress_add_body_class' ) ) {
	function docspress_add_body_class( $classes ) {

		$classes[] = '';
		if ( ! wp_is_mobile() ) {
			$classes[] = 'no-mobile';
		} else {
			$classes[] = 'is-mobile';
		}

		// preloader
		if ( docspress_get_theme_mod( 'preloader_style' ) !== 'none' ) {
			$classes[] = 'animsition';
		}

		return $classes;

	}
}
add_filter( 'body_class', 'docspress_add_body_class' );

/**
 * Add html class
 */
if ( ! function_exists( 'docspress_add_html_class' ) ) {
	function docspress_add_html_class( $classes = '' ) {

		return apply_filters( 'docs/add_html_class', docspress_sanitize_class( $classes ) );

	}
}

/**
 * Remove comment notes
 */
add_filter( 'comment_form_logged_in', '__return_empty_string' );

/**
 * Get post password form
 */
if ( ! function_exists( 'docspress_get_post_password_form' ) ) {
	function docspress_get_post_password_form() {

		global $post;
		$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
		$output = '<form class="vlt-post-password-form" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">';
		$output .= '<p>' . esc_html__( 'This content is restricted access, please type the password below and get access.', '@@textdomain' ) . '</p>';
		$output .= '<div class="vlt-form-group">';
		$output .= '<input name="post_password" id="' . $label . '" type="password" size="20" placeholder="' . esc_attr__( 'Password:' , '@@textdomain' ) . '">';
		$output .= '</div>';
		$output .= '<button class="vlt-btn vlt-btn--primary">' . esc_attr__( 'Get Access' , '@@textdomain' ) . '</button>';
		$output .= '</form>';
		return apply_filters( 'docs/get_post_password_form', $output );

	}
}
add_filter( 'the_password_form', 'docspress_get_post_password_form' );

/**
 * Admin logo link
 */
if ( ! function_exists( 'docspress_change_admin_logo_link' ) ) {
	function docspress_change_admin_logo_link() {
		return home_url( '/' );
	}
}
add_filter( 'login_headerurl', 'docspress_change_admin_logo_link' );

/**
 * Remove cf7 autop
 */
add_filter( 'wpcf7_autop_or_not', '__return_false' );

/*
 * Replace content variables
 */
if ( ! function_exists( 'docspress_replace_content_variables' ) ) {
	function docspress_replace_content_variables( $text ) {
		global $post;

		if ( $post->post_parent ) {
			$ancestors = get_post_ancestors( $post->ID );
			$root = count( $ancestors ) - 1;
			$parentpost_id = $ancestors[ $root ];
		} else {
			$parentpost_id = $post->ID;
		}

		$replace = array(
			'%product_name%' => docspress_get_field( 'product_name', $parentpost_id ),
			'%product_slug%' => docspress_get_field( 'product_slug', $parentpost_id )
		);

		$text = str_replace( array_keys( $replace ), $replace, $text );
		return $text;
	}
}
add_filter( 'the_content', 'docspress_replace_content_variables' );
add_filter( 'the_excerpt', 'docspress_replace_content_variables' );
add_filter( 'docs/get_trimmed_content', 'docspress_replace_content_variables' );

/**
 * Extend mime types
 */
if ( ! function_exists( 'docspress_mime_types' ) ) {
	function docspress_mime_types( $mimes ) {
		$mimes[ 'svg' ] = 'image/svg+xml';
		return $mimes;
	}
}
add_filter( 'upload_mimes', 'docspress_mime_types' );

/**
 * Disabling the scaling
 */
add_filter( 'big_image_size_threshold', '__return_false' );