<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

/**
 * Sanitize slass tag
 */
if ( ! function_exists( 'docs_sanitize_class' ) ) {
	function docs_sanitize_class( $class, $fallback = null ) {

		if ( is_string( $class ) ) {
			$class = explode( ' ', $class );
		}

		if ( is_array( $class ) && count( $class ) > 0 ) {
			$class = array_map( 'sanitize_html_class', $class );
			return implode( ' ', $class );
		} else {
			return sanitize_html_class( $class, $fallback );
		}

	}
}

/**
 * Sanitize style tag
 */
if ( ! function_exists( 'docs_sanitize_style' ) ) {
	function docs_sanitize_style( $style ) {

		$allowed_html = array(
			'style' => array ()
		);
		return wp_kses( $style, $allowed_html );

	}
}

/**
 * Callback for custom comment
 */
if ( ! function_exists( 'docs_callback_custom_comment' ) ) {
	function docs_callback_custom_comment( $comment, $args, $depth ) {

		$GLOBALS['comment'] = $comment;
		global $post;

		?>

		<li <?php comment_class( 'vlt-comment-item' ); ?>>

			<div class="vlt-comment-item__inner clearfix" id="comment-<?php comment_ID(); ?>">

				<?php if ( 0 != $args['avatar_size'] && get_avatar( $comment ) ) : ?>
					<a class="vlt-comment-avatar" href="<?php echo get_comment_author_url(); ?>"><?php echo get_avatar( $comment, $args['avatar_size'] ); ?></a>
					<!-- /.vlt-comment-avatar -->
				<?php endif; ?>

				<div class="vlt-comment-content">

					<div class="vlt-comment-header">

						<h5><?php comment_author(); ?></h5>

						<div class="vlt-comment-header__metas">
							<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
								<time datetime="<?php comment_time( 'c' ); ?>">
									<?php printf( get_comment_date() ); ?>
								</time>
							</a>
							<?php
								comment_reply_link( array_merge( $args, array(
									'depth' => $depth,
									'max_depth' => $args['max_depth'],
								) ) );
							?>
						</div>
						<!-- /.vlt-comment-header__metas -->

					</div>
					<!-- /.vlt-comment-header -->

					<div class="vlt-comment-text vlt-content-markup clearfix">

						<?php comment_text(); ?>

						<?php if ( '0' == $comment->comment_approved ): ?>
							<p class="vlt-alert">
								<?php esc_html_e( 'Your comment is awaiting moderation.', 'docs' ); ?>
							</p>
						<?php endif; ?>

					</div>
					<!-- /.vlt-comment-text -->

				</div>
				<!-- /.vlt-comment-content -->

			</div>
			<!-- /.vlt-comment-item__inner -->

		<!-- </li> is added by WordPress automatically -->
		<?php
	}
}

/**
 * Get trimmed content
 */
if ( ! function_exists( 'docs_get_trimmed_content' ) ) {
	function docs_get_trimmed_content( $content = false, $max_words = 18 ) {

		if ( $content == false ) {
			return;
		}

		$content = preg_replace( '~(?:\[/?)[^/\]]+/?\]~s', '', $content );
		$content = strip_tags( $content );
		$words = explode( ' ', $content, $max_words + 1 );
		if ( count( $words ) > $max_words ) {
			array_pop( $words );
			array_push( $words, '...', '' );
		}
		$content = implode( ' ', $words );
		$content = esc_html( $content );

		return apply_filters( 'docs/get_trimmed_content', $content );

	}
}

/**
 * Get post taxonomy
 */
if ( ! function_exists( 'docs_get_post_taxonomy' ) ) {
	function docs_get_post_taxonomy( $post_id, $taxonomy, $delimiter = ', ', $get = 'name', $link = true ) {

		$tags = wp_get_post_terms( $post_id, $taxonomy );
		$list = '';

		foreach ( $tags as $tag ) {
			if ( $link ) {
				$list .= '<a href="' . get_category_link( $tag->term_id ) . '">' . $tag->$get . '</a>' . $delimiter;
			} else {
				$list .= $tag->$get . $delimiter;
			}
		}

		return substr( $list, 0, strlen( $delimiter ) * ( -1 ) );

	}
}

/**
 * Get attachment image
 */
if ( ! function_exists( 'docs_get_attachment_image' ) ) {
	function docs_get_attachment_image( $imageID, $size = 'docs-830x630_crop', $class = '' ) {
		$output = wp_get_attachment_image( $imageID, $size, false, array(
			'class' => $class,
			'src' => wp_get_attachment_image_src( $imageID, $size )[0],
			'srcset' => wp_get_attachment_image_srcset( $imageID, $size )
		) );
		return apply_filters( 'docs/get_attachment_image', $output );
	}
}

/**
 * The post navigation
 */
if ( ! function_exists( 'docs_the_posts_navigation' ) ) {
	function docs_the_posts_navigation() {
		$prev_icon = '←';
		$next_icon = '→';

		the_posts_pagination(
			array(
				'mid_size' => 2,
				'prev_text' => sprintf( '%s <span class="nav-prev-text">%s</span>', $prev_icon, __( ' Newer posts', 'docs' ) ),
				'next_text' => sprintf( '<span class="nav-next-text">%s</span> %s', __( 'Older posts ', 'docs' ), $next_icon ),
			)
		);

	}
}

/**
 * Get comment navigation
 */
if ( ! function_exists( 'docs_get_comment_navigation' ) ) {
	function docs_get_comment_navigation() {

		$output = '';
		$prev_icon = '←';
		$next_icon = '→';

		if ( get_comment_pages_count() > 1 ) :

			$output .= '<nav class="vlt-comments-navigation">';
			if ( get_previous_comments_link() ) {
				$output .= get_previous_comments_link( $prev_icon . esc_html__( ' Prev Page', 'docs' ) );
			}
			if ( get_next_comments_link() ) {
				$output .= get_next_comments_link( esc_html__( 'Next Page ', 'docs' ) . $next_icon );
			}
			$output .= '</nav>';

		endif;

		return apply_filters( 'docs/get_comment_navigation', $output );

	}
}

/**
 * Add Changelog Taxonomy
 */
if ( ! function_exists( 'docs_add_changelog_post_type' ) ) {
	function docs_add_changelog_post_type() {

		$labels = array(
			'name' => esc_html__( 'Changelogs', 'docs' ),
			'singular_name' => esc_html__( 'Changelog', 'docs' ),
			'edit_item' => esc_html__( 'Edit Changelog Item', 'docs' ),
			'update_item' => esc_html__( 'Update Changelog Item', 'docs' ),
			'search_items' => esc_html__( 'Search Changelog Item', 'docs' ),
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'has_archive' => true,
			'show_ui' => true,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'revisions'
			),
			'publicly_queryable' => true,
			'menu_position' => 40,
			'show_in_menu' => true,
			'show_in_admin_bar' => true,
			'show_in_rest' => true,
			'menu_icon' => 'dashicons-calendar-alt'
		);

		register_post_type( 'changelog', $args );

	}

}

add_action( 'init', 'docs_add_changelog_post_type' );