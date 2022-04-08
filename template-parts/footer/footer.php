<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

?>


<footer class="vlt-footer">

	<div class="vlt-footer-copyright"><?php echo sprintf( docs_get_theme_mod( 'footer_copyright' ), date( 'Y' ) ); ?></div>
	<!-- /.vlt-footer-copyright -->

</footer>
<!-- /.vlt-footer -->


<?php if ( docs_get_theme_mod( 'back_to_top' ) == 'show' ) : ?>

	<div class="d-none d-sm-block">

		<a href="#" class="vlt-back-to-top hidden"><i class="fas fa-caret-square-up"></i></a>
		<!-- /.vlt-back-to-top -->

	</div>
	<!-- /.d-none d-sm-block -->

<?php endif; ?>