<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

/**
 * Add body class
 */
if ( ! function_exists( 'docs_add_body_class' ) ) {
	function docs_add_body_class( $classes ) {

		$classes[] = '';
		if ( ! wp_is_mobile() ) {
			$classes[] = 'no-mobile';
		} else {
			$classes[] = 'is-mobile';
		}
		return $classes;

	}
}
add_filter( 'body_class', 'docs_add_body_class' );

/**
 * Remove comment notes
 */
add_filter( 'comment_form_logged_in', '__return_empty_string' );

/**
 * Get post password form
 */
if ( ! function_exists( 'docs_get_post_password_form' ) ) {
	function docs_get_post_password_form() {

		global $post;
		$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
		$output = '<form class="vlt-post-password-form" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">';
		$output .= '<p>' . esc_html__( 'This content is restricted access, please type the password below and get access.', 'docs' ) . '</p>';
		$output .= '<div class="vlt-form-group">';
		$output .= '<input name="post_password" id="' . $label . '" type="password" size="20" placeholder="' . esc_attr__( 'Password:' , 'docs' ) . '" class="vlt-border-white">';
		$output .= '</div>';
		$output .= '<button class="vlt-btn vlt-btn--primary">' . esc_attr__( 'Get Access' , 'docs' ) . '</button>';
		$output .= '</form>';
		return apply_filters( 'docs/get_post_password_form', $output );

	}
}
add_filter( 'the_password_form', 'docs_get_post_password_form' );

/**
 * Admin logo link
 */
if ( ! function_exists( 'docs_change_admin_logo_link' ) ) {
	function docs_change_admin_logo_link() {

		return home_url( '/' );

	}
}
add_filter( 'login_headerurl', 'docs_change_admin_logo_link' );