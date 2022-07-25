<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

?>

<div class="vlt-page-title vlt-page-title--theme">

	<div class="container-fluid">

		<h1 class="vlt-page-title__title"><?php esc_html_e( 'The List of Premium WordPress Themes', '@@textdomain' ); ?></h1>

		<p class="vlt-page-title__subtitle"><?php printf( __( 'Themes and Demos List (%s items)', '@@textdomain' ), $GLOBALS['wp_query']->post_count ); ?></p>

	</div>

</div>
<!-- /.vlt-page-title -->