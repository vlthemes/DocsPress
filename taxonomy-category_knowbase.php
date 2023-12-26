<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

get_header();

$cat = get_queried_object();

?>

<main class="vlt-main">

	<div class="vlt-page-content vlt-page-content--padding">

		<?php get_template_part( 'template-parts/page-title/page-title', 'knowbase-single' ); ?>

		<form class="vlt-search-form vlt-search-form--large vlt-search-form--ajax" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">

			<input type="text" name="s" placeholder="<?php esc_attr_e( 'Search&hellip;', '@@textdomain' ); ?>" value="<?php echo get_search_query(); ?>" autocomplete="off">
			<button><i class="ri-search-line"></i></button>

			<div class="vlt-search-form__results" style="display: none;"><?php esc_html_e( 'Loading...' , '@@textdomain' ); ?></div>

			<input type="hidden" name="post_type" value="<?php echo get_post_type(); ?>">
			<input type="hidden" name="post_taxonomy" value="<?php echo $cat->taxonomy; ?>">
			<input type="hidden" name="post_term_id" value="<?php echo $cat->term_id; ?>">

		</form>
		<!-- /.vlt-search-form -->

		<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/post/post', 'default' );
				endwhile;
				docspress_the_posts_navigation();
			else:
				get_template_part( 'template-parts/content/content', 'page-empty' );
			endif;
		?>

	</div>
	<!-- /.vlt-page-content -->

</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>