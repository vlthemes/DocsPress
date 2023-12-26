<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

get_header(); ?>

<main class="vlt-main">

	<div class="vlt-page-content vlt-page-content--padding">

		<?php get_template_part( 'template-parts/page-title/page-title', 'changelog' ); ?>

		<?php if ( docspress_get_theme_mod( 'changelog_search_form' ) == 'show' ) : ?>

			<form class="vlt-changelog-search vlt-search-form vlt-search-form--large vlt-search-form--ajax" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">

				<input type="text" name="s" placeholder="<?php esc_attr_e( 'Search&hellip;', '@@textdomain' ); ?>" value="<?php echo get_search_query(); ?>" autocomplete="off">
				<button><i class="ri-search-line"></i></button>

				<div class="vlt-search-form__results" style="display: none;"><?php esc_html_e( 'Loading...' , '@@textdomain' ); ?></div>

				<input type="hidden" name="post_type" value="changelog">

			</form>
			<!-- /.vlt-changelog-search -->

		<?php endif; ?>

		<?php

			if ( have_posts() ) :
				echo '<div class="vlt-grid" data-col="2">';
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/post/post', 'changelog' );
					endwhile;
				echo '</div>';
				docspress_the_posts_navigation( 'logs' );
			else:
				get_template_part( 'template-parts/content/content', 'page-empty' );
			endif;

		?>

	</div>
	<!-- /.vlt-page-content -->

</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>