<?php

/**
 * Template name: Knowbase
 * @author: VLThemes
 * @version: @@version
 */

get_header(); ?>

<div class="vlt-main vlt-main--padding">

	<article <?php post_class( 'vlt-page' ); ?>>

		<header class="vlt-page-title">

			<h1><i class="fas fa-folder"></i><?php echo docs_get_theme_mod( 'knowbase_category_title' ) ? docs_get_theme_mod( 'knowbase_category_title' ) : get_the_title(); ?></h1>

		</header>
		<!-- /.vlt-page-title -->

		<form class="vlt-search-form vlt-search-form--large vlt-search-form--ajax mb-5" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">

			<input type="text" name="s" placeholder="<?php esc_attr_e( 'Search&hellip;', '@@textdomain' ); ?>" value="<?php echo get_search_query(); ?>" autocomplete="off">
			<button><i class="fas fa-search"></i></button>

			<div class="vlt-search-form__results" style="display: none;"><?php esc_html_e( 'Loading...' , '@@textdomain' ); ?></div>

			<input type="hidden" name="post_type" value="knowbase">

		</form>
		<!-- /.vlt-search-form -->

		<div class="vlt-knowbase vlt-grid" data-col="2">

			<?php

				$knowbase_category_selected = docs_get_theme_mod( 'knowbase_category_list' );

				if ( empty( $knowbase_category_selected ) || $knowbase_category_selected[ 0 ] == 0 ) {
					$knowbase_category_selected = [];
				}

				$atts = array( 'child_of' => false, 'hide_empty' => true, 'hierarchical' => false, 'taxonomy' => 'knowbase_category', 'pad_counts' => false );
				$cat = get_categories( $atts );

				foreach ( $cat as $categories ) : ?>

					<div class="vlt-knowbase-item">

						<div class="vlt-knowbase-item-content">

							<div class="vlt-knowbase-item-title">
								<h3><a href="<?php echo get_category_link( $categories->term_id ); ?>"><?php echo esc_html( $categories->name ); ?></a></h3>
								<span><?php printf( __( '(%s Articles)', '@@textdomain' ), $categories->count ); ?></span>
							</div>

							<?php if ( $categories->description ) : ?>

								<div class="vlt-knowbase-item-description">
									<p><?php echo esc_html( $categories->description ); ?></p>
								</div>

							<?php endif; ?>

							<?php

								$count = 0;
								$articles_number = docs_get_theme_mod( 'knowbase_category_count' );

								$args = array(
									'posts_per_page' => -1,
									'tax_query' => array(
										'relation' => 'AND',
										array(
											'taxonomy' => 'knowbase_category',
											'field' => 'id',
											'terms' => array( $categories->term_id ),
										),
									)
								);

								$cat_post = new WP_Query( $args );

								if ( $cat_post->have_posts() ) : ?>

									<div class="vlt-knowbase-item-articles">

										<ul>
											<?php while ( $cat_post->have_posts() ) : $cat_post->the_post();

												if ( $count >= $articles_number ) {
													break;
												}
												$count++; ?>

												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

											<?php endwhile; wp_reset_postdata(); ?>

										</ul>

									</div>

							<?php endif; ?>

							<?php if ( $cat_post->post_count > $articles_number ) : ?>

								<div class="vlt-knowbase-item-footer">

									<a href="<?php echo get_category_link( $categories->term_id ); ?>" class="vlt-btn vlt-btn--primary">
										<?php
											// translators: %s articles count.
											printf( esc_html__( '+%s More', '@@textdomain' ), intval( $cat_post->post_count ) - $articles_number );
										?>
									</a>

								</div>

							<?php endif; ?>

						</div>

					</div>

			<?php endforeach; ?>

		</div>

	</article>

</div>

<?php get_footer();?>