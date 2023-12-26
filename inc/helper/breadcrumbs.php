<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

/**
 * Breadcrumbs
 */
if ( ! function_exists( 'docspress_get_breadcrumbs' ) ) {
	function docspress_get_breadcrumbs( $container_class = 'vlt-page-title__breadcrumbs' ) {
		/* === OPTIONS === */
		$text['home'] = esc_html__( 'Home', '@@textdomain' ); // text for the 'Home' link
		$text['category'] = esc_html__( 'Archive by Category "%s"', '@@textdomain' ); // text for a category page
		$text['search'] = esc_html__( 'Search Results for "%s"', '@@textdomain' ); // text for a search results page
		$text['tag'] = esc_html__( 'Posts Tagged "%s"', '@@textdomain' ); // text for a tag page
		$text['author'] = esc_html__( 'Articles Posted by %s', '@@textdomain' ); // text for an author page
		$text['404'] = esc_html__( 'Error 404', '@@textdomain' ); // text for the 404 page

		/* === OPTIONS === */
		$text['home'] = esc_html__( 'Home', '@@textdomain' ); // text for the 'Home' link
		if( get_option( 'page_for_posts' ) !=='0' ){
		$text['category'] = '<a href="'.get_permalink( get_option( 'page_for_posts' ) ) . '">' . esc_html__( 'Blog', '@@textdomain' ) . '</a> <span class="sep">-</span> ' . esc_html__( '%s', '@@textdomain' ); // text for a category page
		}
		$text['search'] = esc_html__( 'Search Results for "%s"', '@@textdomain' ); // text for a search results page
		$text['tag'] = esc_html__( '%s', '@@textdomain' ); // text for a tag page
		$text['author'] = esc_html__( 'Articles Posted by %s', '@@textdomain' ); // text for an author page
		$text['404'] = esc_html__( '404', '@@textdomain' ); // text for the 404 page
		$text['page'] = esc_html__( 'Page %s', '@@textdomain' ); // text 'Page N'
		$text['cpage'] = esc_html__( 'Comment Page %s', '@@textdomain' ); // text 'Comment Page N'
		$wrap_before = '<nav class="' . docspress_sanitize_class( $container_class ) . '">'; // the opening wrapper tag
		$wrap_after = '</nav>'; // the closing wrapper tag
		$sep = '<i class="ri-arrow-drop-right-line"></i>'; // separator between crumbs
		$sep_before = '<span class="sep">'; // tag before separator
		$sep_after = '</span>'; // tag after separator
		$show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
		$show_on_home = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$show_current = 1; // 1 - show current page title, 0 - don't show
		$before = '<span class="current">'; // tag before the current crumb
		$after = '</span>'; // tag after the current crumb
		/* === END OF OPTIONS === */

		global $post;
		$home_link = home_url( '/' );
		$link_before = '<span>';
		$link_after = '</span>';
		$link_attr = ' ';
		$link_in_before = '<span>';
		$link_in_after = '</span>';
		$link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
		$frontpage_id = get_option( 'page_on_front' );
		$thisPostID = get_the_ID();
		$parent_id = wp_get_post_parent_id( $thisPostID );
		$sep = ' ' . $sep_before . $sep . $sep_after . ' ';
		$output = '';

		if ( is_home() || is_front_page() ) {
			if ( $show_on_home ) {
				$output .= $wrap_before . '<a href="' . $home_link . '">' . $text['home'] . '</a>' . $wrap_after;
			}
		} else {
			$output .= $wrap_before;
			if ( $show_home_link ) {
				$output .= sprintf( $link, $home_link, $text['home'] );
			}
			if ( is_category() ) {
				$cat = get_category( get_query_var( 'cat' ), false );
				if ( $cat->parent != 0 ) {
					$cats = get_category_parents( $cat->parent, true, $sep );
					$cats = preg_replace( '#^(.+)$sep$#', '$1', $cats);
					$cats = preg_replace( '#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats );
					if ( $show_home_link ) {
						$output .= $sep;
					}
					$output .= $cats;
				}
				if ( get_query_var( 'paged' ) ) {
					$cat = $cat->cat_ID;
					$output .= $sep . sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ) ) . $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
				} else {
					if ( $show_current ) {
						$output .= $sep . $before . sprintf( $text['category'], single_cat_title( '', false) ) . $after;
					}
				}
			} elseif ( is_search() ) {
				if ( have_posts() ) {
					if ( $show_home_link && $show_current ) {
						$output .= $sep;
					}
					if ( $show_current ) {
						$output .= $before . sprintf( $text['search'], get_search_query() ) . $after;
					}
				} else {
					if ( $show_home_link ) {
						$output .= $sep;
					}
					$output .= $before . sprintf( $text['search'], get_search_query() ) . $after;
				}
			} elseif ( is_day() ) {
				if ( $show_home_link ) {
					$output .= $sep;
				}
				$output .= sprintf( $link, get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $sep;
				$output .= sprintf( $link, get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ), get_the_time( 'F' ) );
				if ( $show_current ) {
					$output .= $sep . $before . get_the_time( 'd' ) . $after;
				}
			} elseif ( is_month() ) {

				if ( $show_home_link ) {
					$output .= $sep;
				}
				$output .= sprintf( $link, get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) );

				if ( $show_current ) {
					$output .= $sep . $before . get_the_time( 'F' ) . $after;
				}
			} elseif ( is_year() ) {

				if ( $show_home_link && $show_current ) {
					$output .= $sep;
				}
				if ( $show_current ) {
					$output .= $before . get_the_time( 'Y' ) . $after;
				}

			} elseif ( is_single() && !is_attachment() ) {

				if ( $show_home_link ) {
					$output .= $sep;
				}

				if ( get_post_type() != 'post' ) {

					$post_type = get_post_type_object( get_post_type() );
					$slug = $post_type->rewrite;

					$output .= sprintf( $link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name );
					if ( $show_current ) {
						$output .= $sep . $before . get_the_title() . $after;
					}

				} else {

					$cat = get_the_category();
					$cat = $cat[0];
					$cats = get_category_parents( $cat, TRUE, $sep );

					if ( !$show_current || get_query_var( 'cpage' ) ) {
						$cats = preg_replace( '#^(.+)$sep$#', '$1', $cats );
					}

					$cats = preg_replace( '#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats );

					if ( get_option( 'page_for_posts' ) !=='0' ) {
						$output .= '<a href="'.get_permalink( get_option( 'page_for_posts' ) ) . '">' . esc_html__( 'Blog', '@@textdomain' ) . '</a> <span class="sep">-</span> '. $cats;
					} else {
						$output .= $cats;
					}
					if ( get_query_var( 'cpage' ) ) {
						$output .= $sep . sprintf( $link, get_permalink(), get_the_title() ) . $sep . $before . sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . $after;
					} else {
						$title = get_the_title();
						if ( $show_current ) {
							$output .= $before . $title . $after;
						}
					}
				}

			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
				$post_type = get_post_type_object( get_post_type() );
				if ( get_query_var( 'paged' ) ) {
					$output .= $sep . sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label ) . $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
				} else {
					if ( $show_current ) {
						$output .= $sep . $before . $post_type->label . $after;
					}
				}
			} elseif ( is_attachment() ) {
				if ( $show_home_link ) {
					$output .= $sep;
				}
				$parent = get_post( $parent_id );

				$cat = get_the_category( $parent->ID );
				$cat = $cat[0];
				if ( $cat ) {
					$cats = get_category_parents( $cat, TRUE, $sep );
					$cats = preg_replace( '#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats );
					$output .= $cats;
				}
				$output .= sprintf( $link, get_permalink( $parent ), $parent->post_title );
				if ( $show_current ) {
					$output .= $sep . $before . get_the_title() . $after;
				}
			} elseif ( is_page() && !$parent_id ) {
				if ( $show_current ) {
					$output .= $sep . $before . get_the_title() . $after;
				}
			} elseif ( is_page() && $parent_id ) {

				if ( $show_home_link ) {
					$output .= $sep;
				}

				if ( $parent_id != $frontpage_id ) {

					$breadcrumbs = array();
					while ( $parent_id ) {
						$page = get_page( $parent_id );
						if ( $parent_id != $frontpage_id ) {
							$breadcrumbs[] = sprintf( $link, get_permalink( $page->ID ), get_the_title( $page->ID ) );
						}
						$parent_id = $page->post_parent;
					}
					$breadcrumbs = array_reverse( $breadcrumbs );
					for ( $i = 0; $i < count( $breadcrumbs ); $i++ ) {
						$output .= $breadcrumbs[$i];
						if ( $i != count( $breadcrumbs ) - 1 ) {
							$output .= $sep;
						}
					}
				}
				if ( $show_current ) {
					$output .= $sep . $before . get_the_title() . $after;
				}
			} elseif ( is_tag() ) {
				if ( get_query_var( 'paged' ) ) {
					$tag_id = get_queried_object_id();
					$tag = get_tag( $tag_id );
					$output .= $sep . sprintf( $link, get_tag_link( $tag_id ), $tag->name ) . $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
				} else {
					if ( $show_current ) {
						$output .= $sep . $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
					}
				}
			} elseif ( is_author() ) {
				global $author;
				$author = get_userdata( $author );
				if ( get_query_var( 'paged' ) ) {
					if ( $show_home_link ) {
						$output .= $sep;
					}
					$output .= sprintf( $link, get_author_posts_url( $author->ID ), $author->display_name ) . $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
				} else {
					if ( $show_home_link && $show_current ) {
						$output .= $sep;
					}
					if ( $show_current ) {
						$output .= $before . sprintf( $text['author'], $author->display_name ) . $after;
					}
				}
			} elseif ( is_404() ) {
				if ( $show_home_link && $show_current ) {
					$output .= $sep;
				}
				if ( $show_current ) {
					$output .= $before . $text['404'] . $after;
				}
			} elseif ( has_post_format() && !is_singular() ) {
				if ( $show_home_link ) {
					$output .= $sep;
				}
				$output .= get_post_format_string( get_post_format() );
			}
			$output .= $wrap_after;
		}
		return $output;
	}
}