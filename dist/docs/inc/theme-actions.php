<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

/**
 * Register sidebars
 */
if ( ! function_exists( 'docs_register_sidebar' ) ) {
	function docs_register_sidebar() {

		register_sidebar( array(
			'name' => esc_html__( 'Blog Sidebar', 'docs' ),
			'id' => 'blog_sidebar',
			'description' => esc_html__( 'Blog Widget Area', 'docs' ),
			'before_widget' => '<div id="%1$s" class="vlt-widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="vlt-widget__title">',
			'after_title' => '</h5>'
		) );

	}
}
add_action( 'widgets_init', 'docs_register_sidebar' );

/**
 * Before site wrapper action
 */
if ( ! function_exists( 'docs_before_site' ) ) {
	function docs_before_site() {

		if ( get_theme_mod( 'preloader', 'show' ) == 'show' ) {
			echo '<div class="vlt-site-preloader"><div class="spinner"><span></span></div></div><!-- ./vlt-site-preloader -->';
		}

		echo '<div class="vlt-site-wrapper">';

	}
}
add_action( 'docs/before_site', 'docs_before_site' );

/**
 * After site wrapper action
 */
if ( ! function_exists( 'docs_after_site' ) ) {
	function docs_after_site() {

		echo '</div><!-- ./vlt-site-wrapper -->';

	}
}
add_action( 'docs/after_site', 'docs_after_site' );

/**
 * Change admin logo
 */
if ( ! function_exists( 'docs_change_admin_logo' ) ) {
	function docs_change_admin_logo() {

		if ( ! get_theme_mod( 'login_logo_image', DOCS_THEME_DIRECTORY . 'assets/img/vlthemes.png' ) ) {
			return;
		}
		$image_url = get_theme_mod( 'login_logo_image', DOCS_THEME_DIRECTORY . 'assets/img/vlthemes.png' );
		$image_w = get_theme_mod( 'login_logo_image_width', '102px' );
		$image_h = get_theme_mod( 'login_logo_image_height', '115px' );
		echo '<style type="text/css">
			h1 a {
				background: transparent url(' . esc_url( $image_url ) . ') 50% 50% no-repeat !important;
				width:' . esc_attr( $image_w ) . '!important;
				height:' . esc_attr( $image_h ) . '!important;
				background-size: cover !important;
			}
		</style>';

	}
}
add_action( 'login_head', 'docs_change_admin_logo' );