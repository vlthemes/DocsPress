<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

$footer_class = 'vlt-footer vlt-footer--template';
$acf_footer = docspress_get_theme_mod( 'page_custom_footer', true );
$footer_template = docspress_get_theme_mod( 'footer_template', $acf_footer );

?>

<footer class="<?php echo docspress_sanitize_class( $footer_class ); ?>">

	<?php echo docspress_render_elementor_template( $footer_template ); ?>

</footer>
<!-- /.vlt-footer -->