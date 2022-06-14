<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

?>

<article <?php post_class( 'vlt-post vlt-post--single' ); ?>>

	<header class="vlt-post-header">

		<h1 class="vlt-post-title"><i class="far fa-file-alt"></i><?php the_title(); ?></h1>
		<!-- /.vlt-post-title -->

		<div class="vlt-post-meta">
			<span><i class="fas fa-calendar-alt"></i><a href="<?php the_permalink(); ?>"><time datetime="<?php the_time( 'c' ); ?>"><?php echo get_the_date(); ?></time></a></span>
			<?php if ( docs_get_post_taxonomy( get_the_ID(), 'knowbase_category', ', ' ) ) : ?>
				<span><i class="fas fa-tag"></i><?php echo docs_get_post_taxonomy( get_the_ID(), 'knowbase_category', ', ' ); ?></span>
			<?php endif; ?>
			<span><i class="fas fa-clock"></i><?php echo docs_get_reading_time(); ?></span>
		</div>
		<!-- /.vlt-post-meta -->

	</header>
	<!-- /.vlt-post-header -->

	<div class="vlt-post-content vlt-content-markup">
		<?php the_content(); ?>
	</div>
	<!-- /.vlt-post-content -->

	<div class="clearfix"></div>

	<footer class="vlt-post-footer">

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
	<!-- /.vlt-post-footer -->

</article>
<!-- /.vlt-post -->