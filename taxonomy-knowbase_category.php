<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

get_header();

$cat = get_queried_object();

?>

<main class="vlt-main vlt-main--padding">

	<header class="vlt-page-title">

		<h1><i class="fas fa-folder"></i><?php single_cat_title(); ?></h1>

		<div class="d-none d-sm-block">
			<a href="#" class="vlt-btn vlt-btn--secondary btn-go-back"><?php esc_html_e( 'Go Back', '@@textdomain' ); ?></a>
		</div>

	</header>
	<!-- /.vlt-page-title -->

	<form class="vlt-search-form vlt-search-form--large vlt-search-form--ajax mb-5" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">

		<input type="text" name="s" placeholder="<?php esc_attr_e( 'Search&hellip;', '@@textdomain' ); ?>" value="<?php echo get_search_query(); ?>" autocomplete="off">
		<button><i class="fas fa-search"></i></button>

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
			docs_the_posts_navigation();
		else:
			get_template_part( 'template-parts/content/content', 'page-empty' );
		endif;
	?>

</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>