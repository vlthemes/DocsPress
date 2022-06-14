<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

get_header(); ?>

<main class="vlt-main vlt-main--padding">

	<?php get_template_part( 'template-parts/page-title/page-title', 'changelog' ); ?>

	<form class="vlt-search-form vlt-search-form--large vlt-search-form--ajax mb-5" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">

		<input type="text" name="s" placeholder="<?php esc_attr_e( 'Search&hellip;', '@@textdomain' ); ?>" value="<?php echo get_search_query(); ?>" autocomplete="off">
		<button><i class="fas fa-search"></i></button>

		<div class="vlt-search-form__results" style="display: none;"><?php esc_html_e( 'Loading...' , '@@textdomain' ); ?></div>

		<input type="hidden" name="post_type" value="changelog">

	</form>
	<!-- /.vlt-search-form -->

	<?php

		if ( have_posts() ) :
			echo '<div class="vlt-grid" data-col="2">';
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/post/post', 'changelog' );
				endwhile;
			echo '</div>';
			docs_the_posts_navigation();
		else:
			get_template_part( 'template-parts/content/content', 'page-empty' );
		endif;

	?>

</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>