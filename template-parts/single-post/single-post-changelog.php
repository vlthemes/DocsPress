<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

?>

<article <?php post_class( 'vlt-post vlt-post--single-changelog' ); ?>>

	<header class="vlt-post-header">

		<h1 class="vlt-post-title"><i class="ri-file-line"></i><?php the_title(); ?></h1>
		<!-- /.vlt-post-title -->

		<?php if ( docspress_get_field( 'recent_version' ) ) : ?>

			<div class="vlt-post-version">
				<small><?php esc_html_e( 'Recent version:', '@@textdomain' ); ?></small>
				<span class="badge"><?php echo docspress_get_field( 'recent_version' ); ?></span>
			</div>
			<!-- /.vlt-post-version -->

		<?php endif; ?>

	</header>
	<!-- /.vlt-post-header -->

	<div class="vlt-post-content vlt-content-markup">
		<?php the_content(); ?>
	</div>
	<!-- /.vlt-post-content -->

	<div class="clearfix"></div>

	<footer class="vlt-post-footer">

		<div class="vlt-post-modified">

			<div itemprop="author" itemscope itemtype="https://schema.org/Person">
				<meta itemprop="name" content="<?php echo esc_attr( get_the_author() ); ?>" />
				<meta itemprop="url" content="<?php echo esc_attr( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" />
			</div>

			<meta itemprop="datePublished" content="<?php echo esc_attr( get_the_time( 'c' ) ); ?>"/>
			<time itemprop="dateModified" datetime="<?php echo esc_attr( get_the_modified_date( 'c' ) ); ?>">
				<?php
				// translators: %s - last time modified.
				printf( esc_html__( 'Last modified %s', '@@textdomain' ), esc_html( get_the_modified_date() ) );
				?>
			</time>

		</div>
		<!-- /.vlt-post-modified -->

	</footer>
	<!-- /.vlt-post-footer -->

</article>
<!-- /.vlt-post -->

<?php

if ( comments_open() || get_comments_number() ) {
	comments_template();
}