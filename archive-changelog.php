<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

get_header(); ?>

<main class="vlt-main vlt-main--padding">

	<header class="vlt-main-header">

		<h1><?php esc_html_e( 'Changelogs', '@@textdomain' ); ?></h1>

	</header>
	<!-- /.vlt-main-title -->

	<?php
		if ( have_posts() ) :
			echo '<div class="vlt-grid" data-col="2">';
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content/post/content', 'changelog' );
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