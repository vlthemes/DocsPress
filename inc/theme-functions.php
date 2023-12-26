<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

/**
 * Wrapper function to deal with backwards compatibility.
 */
if ( ! function_exists( 'docspress_body_open' ) ) {
	function docspress_body_open() {
		if ( function_exists( 'wp_body_open' ) ) {
			wp_body_open();
		} else {
			do_action( 'wp_body_open' );
		}
	}
}

/**
 * Sanitize slass tag
 */
if ( ! function_exists( 'docspress_sanitize_class' ) ) {
	function docspress_sanitize_class( $class, $fallback = null ) {

		if ( is_string( $class ) ) {
			$class = explode( ' ', $class );
		}

		if ( is_array( $class ) && count( $class ) > 0 ) {
			$class = array_map( 'esc_attr', $class );
			return implode( ' ', $class );
		} else {
			return esc_attr( $class, $fallback );
		}

	}
}

/**
 * Sanitize style tag
 */
if ( ! function_exists( 'docspress_sanitize_style' ) ) {
	function docspress_sanitize_style( $style ) {
		$allowed_html = array(
			'style' => array ()
		);
		return wp_kses( $style, $allowed_html );
	}
}

/**
 * Callback for custom comment
 */
if ( ! function_exists( 'docspress_callback_custom_comment' ) ) {
	function docspress_callback_custom_comment( $comment, $args, $depth ) {

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
								<?php esc_html_e( 'Your comment is awaiting moderation.', '@@textdomain' ); ?>
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
if ( ! function_exists( 'docspress_get_trimmed_content' ) ) {
	function docspress_get_trimmed_content( $max_words = 18 ) {

		global $post;

		$content = $post->post_excerpt != '' ? $post->post_excerpt : $post->post_content;
		$content = preg_replace( '~(?:\[/?)[^/\]]+/?\]~s', '', $content );
		$content = strip_tags( $content );
		$content = strip_shortcodes( $content );
		$words = explode( ' ', $content, $max_words + 1 );
		if ( count( $words ) > $max_words ) {
			array_pop( $words );
			array_push( $words, '...', '' );
		}
		$content = implode( ' ', $words );
		$content = esc_html( $content );

		return apply_filters( 'docspress/get_trimmed_content', $content );

	}
}

/**
 * Get post taxonomy
 */
if ( ! function_exists( 'docspress_get_post_taxonomy' ) ) {
	function docspress_get_post_taxonomy( $post_id, $taxonomy, $delimiter = ', ', $get = 'name', $link = true ) {

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
 * Render elementor template
 */
if ( ! function_exists( 'docspress_render_elementor_template' ) ) {
	function docspress_render_elementor_template( $template ) {

		if ( ! $template ) {
			return;
		}

		if ( 'publish' !== get_post_status( $template ) ) {
			return;
		}

		$new_frontend = new Elementor\Frontend;
		return $new_frontend->get_builder_content_for_display( $template, false );

	}
}

/**
 * The post navigation
 */
if ( ! function_exists( 'docspress_the_posts_navigation' ) ) {
	function docspress_the_posts_navigation( $title = 'posts' ) {
		the_posts_pagination(
			array(
				'mid_size' => 2,
				'prev_text' => sprintf( '<span class="nav-prev-text">%s</span>', __( 'Newer ' . $title, '@@textdomain' ) ),
				'next_text' => sprintf( '<span class="nav-next-text">%s</span>', __( 'Older ' . $title, '@@textdomain' ) ),
				'class' => 'vlt-pagination'
			)
		);
	}
}

/**
 * Get comment navigation
 */
if ( ! function_exists( 'docspress_get_comment_navigation' ) ) {
	function docspress_get_comment_navigation() {

		$output = '';

		if ( get_comment_pages_count() > 1 ) :

			$output .= '<nav class="vlt-comments-navigation">';
			if ( get_previous_comments_link() ) {
				$output .= get_previous_comments_link( esc_html__( 'Prev Page', '@@textdomain' ) );
			}
			if ( get_next_comments_link() ) {
				$output .= get_next_comments_link( esc_html__( 'Next Page', '@@textdomain' ) );
			}
			$output .= '</nav>';

		endif;

		return apply_filters( 'docs/get_comment_navigation', $output );

	}
}

/**
 * Reading time
 */
if ( ! function_exists( 'docspress_get_reading_time' ) ) {
	function docspress_get_reading_time() {
		global $post;
		$wpm = 200;
		$words = str_word_count( strip_tags( $post->post_content ) );
		$minutes = floor( $words / $wpm );
		if ( 1 <= $minutes ) {
			$output = $minutes . esc_html__( ' min read', '@@textdomain' );
		} else {
			$output = esc_html__( '1 min read', '@@textdomain' );
		}
		return apply_filters( 'docs/get_reading_time', $output );
	}
}

/**
 * Post views
 */
if ( ! function_exists( 'docspress_set_post_views' ) ) {
	function docspress_set_post_views( $postID ) {

		$count_key = 'views';
		$count = get_post_meta( $postID, $count_key, true );
		if ( $count == '' ) {
			$count = 0;
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, '0' );
		} else {
			$count++;
			update_post_meta( $postID, $count_key, $count );
		}

	}
}
add_action( 'wp_head', 'docspress_track_post_views' );

if ( ! function_exists( 'docspress_track_post_views' ) ) {
	function docspress_track_post_views( $postID ) {

		if ( !is_single() ) {
			return;
		}
		if ( empty( $postID ) ) {
			global $post;
			$postID = $post->ID;
		}
		docspress_set_post_views( $postID );

	}
}

if ( ! function_exists( 'docspress_get_post_views' ) ) {
	function docspress_get_post_views( $postID ) {

		$count_key = 'views';
		$count = get_post_meta( $postID, $count_key, true );
		if ( $count == '' ) {
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, '0' );
			return '0';
		}
		return $count;

	}
}

/*
 * Check is elementor post/page
 */
if ( ! function_exists( 'docspress_check_is_elementor' ) ) {
	function docspress_check_is_elementor() {
		global $post;
		return \Elementor\Plugin::$instance->documents->get( $post->ID )->is_built_with_elementor();
	}
}