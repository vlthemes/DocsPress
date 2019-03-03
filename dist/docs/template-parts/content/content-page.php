<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

?>

<article <?php post_class( 'vlt-page' ); ?>>

	<header class="vlt-page-header">

		<h1 class="vlt-page-title"><?php the_title(); ?></h1>
		<!-- /.vlt-page-title -->

		<?php if ( ! is_single() ) : ?>
			<div class="hidden-sm-down">
				<a href="javascript:window.print()" class="vlt-btn vlt-btn--secondary"><i class="icofont icofont-print" style="margin-right: 4px;"></i><?php esc_html_e( 'Print Page', 'docs' ); ?></a>
			</div>
		<?php endif; ?>

	</header>
	<!-- /.vlt-page-header -->

	<?php if ( has_post_thumbnail() ) : ?>

		<div class="vlt-page-thumbnail clearfix">

			<?php echo docs_get_attachment_image( get_post_thumbnail_id( get_the_ID() ) ); ?>

			<a class="vlt-page-thumbnail__link" href="<?php the_permalink(); ?>"></a>
			<!-- /.vlt-page-thumbnail__link -->

		</div>
		<!-- /.vlt-page-thumbnail -->

	<?php endif; ?>

	<div class="vlt-page-content vlt-content-markup">
		<?php the_content(); ?>
	</div>
	<!-- /.vlt-page-content -->

	<div class="clearfix"></div>

	<footer class="vlt-page-footer">

		<?php
			wp_link_pages( array(
				'before' => '<div class="vlt-link-pages"><h5>' . esc_html__( 'Pages: ', 'docs' ) . '</h5>',
				'after' => '</div>',
				'separator' => '<span class="sep">|</span>',
				'nextpagelink' => esc_html__( 'Next page →', 'docs' ),
				'previouspagelink' => esc_html__( '← Previous page', 'docs' ),
				'next_or_number' => 'next'
			) );
		?>

		<?php edit_post_link( __( 'Edit', 'docs' ), '<span class="edit-link">', '</span>' ); ?>

	</footer>
	<!-- /.vlt-page-footer -->

</article>
<!-- /.vlt-page -->

<?php

if ( comments_open() || get_comments_number() ) {
	comments_template();
}