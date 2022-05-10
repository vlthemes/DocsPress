<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

?>

<article <?php post_class( 'vlt-page' ); ?>>

	<header class="vlt-page-header">

		<h1 class="vlt-page-title"><i class="far fa-file-alt"></i><?php the_title(); ?></h1>
		<!-- /.vlt-page-title -->

		<div class="d-none d-sm-block">
			<a href="#" class="vlt-btn vlt-btn--secondary btn-go-back"><?php esc_html_e( 'Go Back', '@@textdomain' ); ?></a>
		</div>

	</header>
	<!-- /.vlt-page-header -->

	<div class="vlt-page-content vlt-content-markup">
		<?php the_content(); ?>
	</div>
	<!-- /.vlt-page-content -->

	<div class="clearfix"></div>

	<footer class="vlt-page-footer">

		<?php

			if ( get_the_tags() ) {
				echo '<div class="vlt-tags">';
				the_tags();
				echo '</div>';
			}

		?>

		<?php

			wp_link_pages( array(
				'before' => '<div class="vlt-link-pages"><h5>' . esc_html__( 'Pages: ', '@@textdomain' ) . '</h5>',
				'after' => '</div>',
				'separator' => '<span class="sep">|</span>',
				'nextpagelink' => esc_html__( 'Next page', '@@textdomain' ),
				'previouspagelink' => esc_html__( 'Previous page', '@@textdomain' ),
				'next_or_number' => 'next'
			) );

		?>

		<?php edit_post_link( __( 'Edit', '@@textdomain' ), '<span class="vlt-edit-link">', '</span>' ); ?>

	</footer>
	<!-- /.vlt-page-footer -->

</article>
<!-- /.vlt-page -->