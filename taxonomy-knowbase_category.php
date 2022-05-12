<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

get_header(); ?>

<main class="vlt-main vlt-main--padding">

	<header class="vlt-knowbase-header">

		<h1 class="vlt-knowbase-title"><i class="fas fa-folder"></i><?php single_cat_title(); ?></h1>
		<!-- /.vlt-knowbase-title -->

	</header>
	<!-- /.vlt-knowbase-header -->

	<form class="vlt-search-form vlt-search-form--large mb-5" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" id="s" name="s" placeholder="<?php esc_attr_e( 'Search&hellip;', '@@textdomain' ); ?>" value="<?php echo get_search_query(); ?>">
		<button><i class="fas fa-search"></i></button>
		<input type="hidden" name="post_type" value="knowbase" />
	</form>
	<!-- /.vlt-search-form -->

	<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content/post/content', 'post' );
			endwhile;
			docs_the_posts_navigation();
		else:
			get_template_part( 'template-parts/content/content', 'page-empty' );
		endif;
	?>

</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>