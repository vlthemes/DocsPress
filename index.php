<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

get_header();

?>

<main class="vlt-main">

	<div class="vlt-page-content vlt-page-content--padding">

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

		<div class="vlt-sidebar">
			<?php get_sidebar(); ?>
		</div>
		<!-- /.vlt-sidebar -->

	</div>
	<!-- /.vlt-page-content -->

</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>