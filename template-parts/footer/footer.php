<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

$footer_copyright = get_theme_mod( 'footer_copyright', '<p>© 2019 DocsPress. All rights reserved.</p>' );

?>

<?php if ( $footer_copyright ) : ?>

	<footer class="vlt-footer">

		<div class="vlt-footer-copyright"><?php echo wp_kses_post( $footer_copyright ); ?></div>
		<!-- /.vlt-footer-copyright -->

	</footer>
	<!-- /.vlt-footer -->

<?php endif; ?>

<?php if ( get_theme_mod( 'back_to_top', 'show' ) == 'show' ) : ?>

	<div class="hidden-sm-down">

		<a href="#" class="vlt-back-to-top hidden"><i class="fas fa-caret-square-up"></i></a>
		<!-- /.vlt-back-to-top -->

	</div>
	<!-- /.hidden-sm-down -->

<?php endif; ?>