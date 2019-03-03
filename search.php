<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

get_header(); ?>

<main class="vlt-main vlt-main--padding">
	<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content/content', 'post' );
			endwhile;
			docs_the_posts_navigation();
		else:
			get_template_part( 'template-parts/content/content', 'page-empty' );
		endif;
	?>

	<div class="vlt-sidebar">
		<?php get_sidebar(); ?>
	</div>
	<!-- /.vlt-sidebar -->

</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>