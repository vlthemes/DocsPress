<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

/**
 * Register sidebars
 */
if ( ! function_exists( 'docs_register_sidebar' ) ) {
	function docs_register_sidebar() {

		register_sidebar( array(
			'name' => esc_html__( 'Blog Sidebar', '@@textdomain' ),
			'id' => 'blog_sidebar',
			'description' => esc_html__( 'Blog Widget Area', '@@textdomain' ),
			'before_widget' => '<div id="%1$s" class="vlt-widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="vlt-widget__title">',
			'after_title' => '</h5>'
		) );

		register_sidebar( array(
			'name' => esc_html__( 'Subscribe Popup', '@@textdomain' ),
			'id' => 'subscribe_popup_sidebar',
			'description' => esc_html__( 'Subscribe popup Widget Area', '@@textdomain' ),
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

		if ( docs_get_theme_mod( 'preloader' ) == 'show' ) {
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

		if ( ! docs_get_theme_mod( 'login_logo_image' ) ) {
			return;
		}
		$image_url = docs_get_theme_mod( 'login_logo_image' );
		$image_w = docs_get_theme_mod( 'login_logo_image_width' );
		$image_h = docs_get_theme_mod( 'login_logo_image_height' );
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

/**
 * Get AJAX search results
 */
if ( ! function_exists( 'docs_get_ajax_search_results' ) ) {
	function docs_get_ajax_search_results() {

		$args = array(
			's' => $_POST[ 'searchTarget' ],
			'posts_per_page' => -1
		);

		if ( isset( $_POST[ 'searchType' ] ) ) {
			$args[ 'post_type' ] = $_POST[ 'searchType' ];
		}

		if ( isset( $_POST[ 'searchTaxonomy' ] ) && isset( $_POST[ 'searchTermID' ] ) ) {
			$args[ 'tax_query' ] = [
				[
					'taxonomy' => $_POST[ 'searchTaxonomy' ],
					'field' => 'term_id',
					'terms' => $_POST[ 'searchTermID' ]
				]
			];
		}

		$new_query = new WP_Query( $args );

		if ( $new_query->have_posts() ) :
			echo '<ul>';
			while ( $new_query->have_posts() ) : $new_query->the_post();
				$post_type = get_post_type_object( get_post_type() );
				echo '<li class="vlt-search-result vlt-search-result--' . $post_type->name . '">';
					if ( has_post_thumbnail() ) {
						echo '<span class="vlt-search-result__thumbnail">';
						the_post_thumbnail( apply_filters( 'docs/ajax-search-results-image-size', 'docs-thumbnail' ), array( 'loading' => 'lazy' ) );
						echo '</span>';
					}
					echo '<a href="' . get_permalink() .'" class="vlt-search-result__title">' . get_the_title() . '</a>';
					echo '<span class="badge">' . esc_html( $post_type->labels->singular_name ) . '</span>';
				echo '</li>';
			endwhile;
			echo '</ul>';
		endif;
		wp_reset_postdata();

		wp_die();
	}
}
add_action( 'wp_ajax_ajax-search-results', 'docs_get_ajax_search_results' );
add_action( 'wp_ajax_nopriv_ajax-search-results', 'docs_get_ajax_search_results' );