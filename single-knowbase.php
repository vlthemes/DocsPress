<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

get_header(); ?>

<main class="vlt-main">

	<div class="vlt-page-content vlt-page-content--padding">

		<?php

			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/single-post/single-post', 'knowbase' );
			endwhile;

		?>

	</div>
	<!-- /.vlt-page-content -->

</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>