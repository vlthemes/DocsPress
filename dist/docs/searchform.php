<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

?>

<form class="vlt-search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" id="s" name="s" placeholder="<?php esc_attr_e( 'Search&hellip;', 'docs' ); ?>" value="<?php echo get_search_query(); ?>">
	<button><i class="icofont icofont-search"></i></button>
</form>
<!-- /.vlt-search-form -->