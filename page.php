<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

get_header();

?>

<main class="vlt-main">

	<div class="vlt-page-content vlt-page-content--padding">

		<?php get_template_part( 'template-parts/page-title/page-title', 'page' ); ?>

		<?php

			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content/content', 'page' );
			endwhile;

			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

		?>

	</div>

</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>