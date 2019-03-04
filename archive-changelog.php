<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

get_header(); ?>

<main class="vlt-main vlt-main--padding">

	<h1 class="vlt-main-title"><?php esc_html_e( 'Changelogs', '@@textdomain' ); ?></h1>

	<?php
		if ( have_posts() ) :
			echo '<div class="vlt-grid" data-col="2">';
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content/content', 'changelog' );
				endwhile;
			echo '</div>';
		else:
			get_template_part( 'template-parts/content/content', 'page-empty' );
		endif;
	?>
</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>