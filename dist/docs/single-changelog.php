<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

get_header(); ?>

<main class="vlt-main vlt-main--padding">
	<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content/content', 'page' );
		endwhile;
	?>
</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>