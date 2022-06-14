<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

get_header(); ?>

<main class="vlt-main vlt-main--padding">

	<?php

		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/single-post/single-post', 'knowbase' );
		endwhile;

	?>

</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>