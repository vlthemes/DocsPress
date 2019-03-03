<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

get_header(); ?>

<main class="vlt-main vlt-main--padding">
	<?php
		if ( have_posts() ) :
			echo '<ul>';
			while ( have_posts() ) : the_post();
				echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
			endwhile;
			echo '</ul>';
		else:
			get_template_part( 'template-parts/content/content', 'page-empty' );
		endif;
	?>
</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>