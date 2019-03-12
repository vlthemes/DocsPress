<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

?>

<?php if ( get_theme_mod( 'footer_copyright', '<p>© 2019 DocsPress. All rights reserved.</p>' ) ) : ?>

	<footer class="vlt-footer">

		<div class="vlt-footer-copyright"><?php echo get_theme_mod( 'footer_copyright', '<p>© 2019 DocsPress. All rights reserved.</p>' ); ?></div>
		<!-- /.vlt-footer-copyright -->

	</footer>
	<!-- /.vlt-footer -->

<?php endif; ?>

<?php if ( get_theme_mod( 'back_to_top', 'show' ) == 'show' ) : ?>

	<div class="hidden-sm-down">

		<a href="#" class="vlt-back-to-top hidden"><i class="icofont icofont-square-up"></i></a>
		<!-- /.vlt-back-to-top -->

	</div>
	<!-- /.hidden-sm-down -->

<?php endif; ?>