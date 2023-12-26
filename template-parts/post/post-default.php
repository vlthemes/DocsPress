<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

?>

<article <?php post_class( 'vlt-post vlt-post--default' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>

		<div class="vlt-post-thumbnail">

			<?php the_post_thumbnail( 'docs-950x633_crop', array( 'loading' => 'lazy' ) ); ?>

			<a class="stretched-link" href="<?php the_permalink(); ?>"></a>

		</div>
		<!-- /.vlt-post-thumbnail -->

	<?php endif; ?>

	<div class="vlt-post-content">

		<header class="vlt-post-header">

			<?php get_template_part( 'template-parts/post/partials/partial-post', 'title' ); ?>
			<?php get_template_part( 'template-parts/post/partials/partial-post', 'meta' ); ?>

		</header>
		<!-- /.vlt-post-header -->

		<div class="vlt-post-excerpt">
			<?php echo docspress_get_trimmed_content( 30 ); ?>
		</div>
		<!-- /.vlt-post-excerpt -->

		<footer class="vlt-post-footer">

			<a href="<?php the_permalink(); ?>" class="vlt-btn vlt-btn--primary"><?php esc_html_e( 'Read More', '@@textdomain' ); ?></a>
			<!-- /.vlt-btn -->

		</footer>
		<!-- ./vlt-post-footer -->

	</div>
	<!-- /.vlt-post-content -->

</article>
<!-- /.vlt-post -->