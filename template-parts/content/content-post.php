<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

?>

<article <?php post_class( 'vlt-post' ); ?>>

	<header class="vlt-post-header">

		<h3 class="vlt-post-title"><a href="<?php the_permalink(); ?>"><?php if ( is_sticky() ) { echo '<i class="fas fa-bookmark"></i>'; } the_title(); ?></a></h3>
		<!-- /.vlt-post-title -->

		<div class="vlt-post-meta">
			<span><i class="fas fa-calendar-alt"></i><a href="<?php the_permalink(); ?>"><time datetime="<?php the_time( 'c' ); ?>"><?php echo get_the_date(); ?></time></a></span>
			<span><i class="fas fa-tag"></i><?php echo docs_get_post_taxonomy( get_the_ID(), 'category', ', ' ); ?></span>
		</div>
		<!-- /.vlt-post-meta -->

	</header>
	<!-- /.vlt-post-header -->

	<?php if ( has_post_thumbnail() ) : ?>

		<div class="vlt-post-thumbnail clearfix">

			<?php echo docs_get_attachment_image( get_post_thumbnail_id( get_the_ID() ) ); ?>

			<a class="vlt-post-thumbnail__link" href="<?php the_permalink(); ?>"></a>
			<!-- /.vlt-post-thumbnail__link -->

		</div>
		<!-- /.vlt-post-thumbnail -->

	<?php endif; ?>

	<div class="vlt-post-excerpt">
		<?php echo docs_get_trimmed_content( get_the_content(), 30 ); ?>
	</div>
	<!-- /.vlt-post-excerpt -->

	<footer class="vlt-post-footer">

		<a href="<?php the_permalink(); ?>" class="vlt-btn vlt-btn--primary"><?php esc_html_e( 'Read More', '@@textdomain' ); ?></a>
		<!-- /.vlt-btn -->

	</footer>
	<!-- ./vlt-post-footer -->

</article>
<!-- /.vlt-post -->