<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

$post_args = array(
	'post_type' => 'theme',
	'posts_per_page' => 3,
	'meta_key' => 'docs_post_views_count',
	'orderby' => 'meta_value_num',
	'order' => 'DESC',
	'ignore_sticky_posts' => true,
	'post__not_in' => array( get_the_id() )
);

$new_query = new WP_Query( $post_args );

if ( $new_query->have_posts() ) :

?>

	<section class="vlt-single-theme-section vlt-single-theme-section--features">

		<div class="container">

			<div class="row align-items-center" style="--bs-guter-y: 45px;">

				<div class="col-md-6">

					<div class="vlt-section-title">

						<h2 class="vlt-section-title__heading"><?php esc_html_e( 'Related Themes', '@@textdomain' ); ?></h2>

						<p class="vlt-section-title__description"><?php esc_html_e( 'Check out our popular themes and templates.', '@@textdomain' ); ?></p>

					</div>

				</div>

				<div class="col-md-6 text-start text-md-end">

					<a href="<?php echo get_post_type_archive_link( 'theme' ); ?>" class="vlt-btn vlt-btn--primary vlt-btn--effect"><?php esc_html_e( 'All Themes', '@@textdomain' ); ?></a>

				</div>

			</div>

			<div class="vlt-spacer" style="height: 70px;"></div>



			<div class="row" style="--bs-gutter-x: 45px; --bs-gutter-y: 70px;">

				<?php while ( $new_query->have_posts() ) : $new_query->the_post(); ?>

					<div class="col-md-6 col-lg-4">

						<?php get_template_part( 'template-parts/theme/theme', 'style-1' ); ?>

					</div>

				<?php endwhile; wp_reset_postdata(); ?>

			</div>

		</div>

	</section>

<?php endif; ?>