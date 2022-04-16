<?php

/**
 * Template name: Knowbase
 * @author: VLThemes
 * @version: @@version
 */

get_header(); ?>

<div class="vlt-main vlt-main--padding">

	<article <?php post_class( 'vlt-knowbase' ); ?>>

		<header class="vlt-knowbase-header">

			<h1 class="vlt-knowbase-title"><i class="fas fa-folder"></i><?php echo docs_get_theme_mod( 'knowbase_category_title' ) ? docs_get_theme_mod( 'knowbase_category_title' ) : get_the_title(); ?></h1>
			<!-- /.vlt-knowbase-title -->

		</header>
		<!-- /.vlt-knowbase-header -->

		<form class="vlt-search-form vlt-search-form--large mb-5" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<input type="text" id="s" name="s" placeholder="<?php esc_attr_e( 'Search&hellip;', '@@textdomain' ); ?>" value="<?php echo get_search_query(); ?>">
			<button><i class="fas fa-search"></i></button>
			<input type="hidden" name="post_type" value="knowbase" />
		</form>
		<!-- /.vlt-search-form -->

		<div class="vlt-grid" data-col="2">

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

								$args = array(
									'posts_per_page' => docs_get_theme_mod( 'knowbase_category_count' ),
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
											<?php while ( $cat_post->have_posts() ) : $cat_post->the_post(); ?>
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
											<?php endwhile; wp_reset_postdata(); ?>
										</ul>
									</div>

							<?php endif; ?>

							<div class="vlt-knowbase-item-footer">

								<a href="<?php echo get_category_link( $categories->term_id ); ?>" class="vlt-btn vlt-btn--primary"><?php esc_html_e( 'View all artciels', '@@textdomain' ); ?></a>

							</div>

						</div>

					</div>

			<?php endforeach; ?>

		</div>

	</article>

</div>

<?php get_footer();?>