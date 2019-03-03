<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

?>

<article <?php post_class( 'vlt-page vlt-page--404' ); ?>>
	<h1><?php esc_html_e( 'Oops! That page can’t be found.', 'docs' ); ?></h1>
	<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'docs' ); ?></p>
	<?php get_search_form(); ?>
</article>
<!-- /.vlt-page -->