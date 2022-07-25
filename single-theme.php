<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

get_header();

?>

<main class="vlt-main">

	<?php get_template_part( 'template-parts/page-title/page-title', 'theme-single' ); ?>

	<div class="vlt-page-content">

		<?php

			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/theme/theme', 'single' );

			endwhile;

		?>

	</div>
	<!-- /.vlt-page-content -->

</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>