<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

?>

<article <?php post_class( 'vlt-post vlt-post--changelog' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>

		<div class="vlt-post-thumbnail clearfix">

			<?php echo docs_get_attachment_image( get_post_thumbnail_id( get_the_ID() ) ); ?>

			<a class="vlt-post-thumbnail__link" href="<?php the_permalink(); ?>"></a>
			<!-- /.vlt-post-thumbnail__link -->

		</div>
		<!-- /.vlt-post-thumbnail -->

	<?php endif; ?>

	<div class="vlt-post-content">

		<div class="vlt-post-title">
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		</div>
		<!-- /.vlt-post-title -->

		<div class="vlt-post-meta">
			<span><i class="fas fa-calendar-plus"></i><a href="<?php the_permalink(); ?>"><time datetime="<?php the_modified_date( 'c' ); ?>"><?php the_modified_date(); ?></time></a></span>
		</div>
		<!-- /.vlt-post-meta -->

	</div>
	<!-- /.vlt-post-content -->

</article>
<!-- /.vlt-post -->