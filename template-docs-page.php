<?php

/**
 * Template Name: Docs Page
 * @author: VLThemes
 * @version: @@version
 */

get_header();

?>

<main class="vlt-main">
	<div class="container">
		<?php
			while ( have_posts() ) : the_post();
				the_content();
			endwhile;
		?>
	</div>
</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>