<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

get_header();

$filters = true;

$column_sidebar_class = 'col-xxl-2 col-xl-3 col-lg-4 order-lg-1';
$column_content_class = is_active_sidebar( 'blog_sidebar' ) ? 'col-xxl-10 col-xl-9 col-lg-8 order-lg-2' : 'col-lg-10 offset-lg-2';

if ( docs_get_theme_mod( 'sticky_sidebar' ) == 'enable' ) {
	$column_sidebar_class .= ' sticky-parent';
}

$sidebar_class = 'vlt-sidebar vlt-sidebar--left';

?>

<main class="vlt-main">

	<?php get_template_part( 'template-parts/page-title/page-title', 'theme' ); ?>

	<div class="vlt-page-content vlt-page-content--padding vlt-page-content--padding-horizontal">

		<div class="container-fluid">

			<div class="row">

				<div class="<?php echo docs_sanitize_class( $column_content_class ); ?>">

					<?php

						if ( have_posts() ) :

							get_template_part( 'template-parts/loop/loop-theme', 'default' );

						endif;

						wp_reset_postdata();

					?>

				</div>

				<?php if ( $filters ) : ?>

					<div class="<?php echo docs_sanitize_class( $column_sidebar_class ); ?>">

						<?php if ( docs_get_theme_mod( 'sticky_sidebar' ) == 'enable' ) : ?>

						<div class="sticky-column">

						<?php endif; ?>

							<div class="<?php echo docs_sanitize_class( $sidebar_class ); ?>">

								<select class="vlt-theme-sort-select">
									<option value="date--desc" selected><?php esc_attr_e( 'Sort by newness', '@@textdomain' ); ?></option>
									<option value="title--asc"><?php esc_attr_e( 'Sort by title', '@@textdomain' ); ?></option>
									<option value="sales--desc"><?php esc_attr_e( 'Sort by number of sales', '@@textdomain' ); ?></option>
									<option value="views--desc"><?php esc_attr_e( 'Sort by popularity', '@@textdomain' ); ?></option>
									<option value="rating--desc"><?php esc_attr_e( 'Sort by average rating', '@@textdomain' ); ?></option>
									<option value="price--desc"><?php esc_attr_e( 'Sort by price: low to high', '@@textdomain' ); ?></option>
									<option value="price--asc"><?php esc_attr_e( 'Sort by price: high to low', '@@textdomain' ); ?></option>
								</select>

								<div class="vlt-spacer" style="height: 40px;"></div>

								<span class="vlt-display-2 has-color-shade-3"><?php esc_html_e( 'Filter Themes By:', '@@textdomain' ); ?></span>

								<div class="vlt-spacer" style="height: 40px;"></div>

								<div class="vlt-theme-filters">

									<?php //echo vlthemes_render_theme_filter( 'theme_category', 'Categories', 'category', 4 ); ?>
									<?php //echo vlthemes_render_theme_filter( 'theme_colors', 'Colors', 'color', 4, 'OR' ); ?>
									<?php //echo vlthemes_render_theme_filter( 'theme_tags', 'Tags', 'checkbox', 4 ); ?>
									<?php //echo vlthemes_render_theme_filter( 'theme_styles', 'Styles', 'checkbox', 4 ); ?>
									<?php //echo vlthemes_render_theme_filter( 'theme_plugins', 'Plugins', 'checkbox', 4 ); ?>
									<?php //echo vlthemes_render_theme_filter( 'theme_layouts', 'Layouts', 'checkbox', 4 ); ?>
									<?php //echo vlthemes_render_theme_filter( 'theme_elements', 'Elements', 'checkbox', 4 ); ?>
									<?php //echo vlthemes_render_theme_filter( 'theme_authors', 'Authors', 'checkbox', 4 ); ?>

								</div>

							</div>

						<?php if ( docs_get_theme_mod( 'sticky_sidebar' ) == 'enable' ) : ?>

						</div>

						<?php endif; ?>

					</div>

				<?php endif; ?>

			</div>

		</div>

	</div>
	<!-- /.vlt-page-content -->

</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>