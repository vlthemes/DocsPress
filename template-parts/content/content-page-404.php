<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

?>

<article <?php post_class( 'vlt-page vlt-page--404' ); ?>>
	<h1><?php esc_html_e( 'Oops! That page can’t be found.', '@@textdomain' ); ?></h1>
	<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', '@@textdomain' ); ?></p>
	<?php get_search_form(); ?>
</article>
<!-- /.vlt-page -->