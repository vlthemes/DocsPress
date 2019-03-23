<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

?>

<article <?php post_class( 'vlt-changelog' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>

		<div class="vlt-changelog-thumbnail clearfix">

			<?php echo docs_get_attachment_image( get_post_thumbnail_id( get_the_ID() ) ); ?>

			<a class="vlt-changelog-thumbnail__link" href="<?php the_permalink(); ?>"></a>
			<!-- /.vlt-changelog-thumbnail__link -->

		</div>
		<!-- /.vlt-changelog-thumbnail -->

	<?php endif; ?>

	<div class="vlt-changelog-content">

		<div class="vlt-changelog-title">
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		</div>
		<!-- /.vlt-changelog-title -->

		<div class="vlt-changelog-meta">
			<span><i class="fas fa-calendar-plus"></i><a href="<?php the_permalink(); ?>"><time datetime="<?php the_modified_date( 'c' ); ?>"><?php the_modified_date(); ?></time></a></span>
		</div>
		<!-- /.vlt-changelog-meta -->

	</div>
	<!-- /.vlt-changelog-content -->

</article>
<!-- /.vlt-changelog -->