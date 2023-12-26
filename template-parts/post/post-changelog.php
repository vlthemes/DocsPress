<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

?>

<article <?php post_class( 'vlt-post vlt-post--changelog' ); ?>>

	<?php

		if ( docspress_get_field( 'recent_version' ) ) {
			echo '<span class="badge">' . docspress_get_field( 'recent_version' ) . '</span>';
		}

	?>

	<?php if ( has_post_thumbnail() ) : ?>

		<div class="vlt-post-thumbnail">

			<?php the_post_thumbnail( 'thumbnail', array( 'loading' => 'lazy' ) ); ?>

			<a class="stretched-link" href="<?php the_permalink(); ?>"></a>

		</div>
		<!-- /.vlt-post-thumbnail -->

	<?php endif; ?>

	<div class="vlt-post-content">

		<header class="vlt-post-header">

			<?php get_template_part( 'template-parts/post/partials/partial-post', 'title' ); ?>
			<?php get_template_part( 'template-parts/post/partials/partial-post', 'meta-modified-date' ); ?>

		</header>
		<!-- /.vlt-post-header -->

	</div>
	<!-- /.vlt-post-content -->

</article>
<!-- /.vlt-post -->