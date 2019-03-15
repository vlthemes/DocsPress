<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

?>

<form class="vlt-search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">

	<input type="text" id="s" name="s" placeholder="<?php esc_attr_e( 'Search&hellip;', '@@textdomain' ); ?>" value="<?php echo get_search_query(); ?>">
	<button><i class="fas fa-search"></i></button>

</form>
<!-- /.vlt-search-form -->