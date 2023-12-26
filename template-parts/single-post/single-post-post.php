<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

?>

<article <?php post_class( 'vlt-post vlt-post--single' ); ?>>

	<header class="vlt-post-header">

		<h1 class="vlt-post-title"><?php the_title(); ?></h1>
		<!-- /.vlt-post-title -->

		<div class="vlt-post-meta">
			<span><i class="ri-calendar-2-line"></i><a href="<?php the_permalink(); ?>"><time datetime="<?php the_time( 'c' ); ?>"><?php echo get_the_date(); ?></time></a></span>
			<?php if ( docspress_get_post_taxonomy( get_the_ID(), 'category', ', ' ) ) : ?>
				<span><i class="ri-price-tag-3-line"></i><?php echo docspress_get_post_taxonomy( get_the_ID(), 'category', ', ' ); ?></span>
			<?php endif; ?>
			<span><i class="ri-timer-line"></i><?php echo docspress_get_reading_time(); ?></span>
		</div>
		<!-- /.vlt-post-meta -->

	</header>
	<!-- /.vlt-page-header -->

	<?php if ( has_post_thumbnail() ) : ?>

		<div class="vlt-post-thumbnail clearfix">

			<?php the_post_thumbnail( 'docs-950x633_crop', array( 'loading' => 'lazy' ) ); ?>

			<a class="stretced-link" href="<?php the_permalink(); ?>"></a>

		</div>
		<!-- /.vlt-post-thumbnail -->

	<?php endif; ?>

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

	</footer>
	<!-- /.vlt-post-footer -->

</article>
<!-- /.vlt-post -->

<?php

if ( comments_open() || get_comments_number() ) {
	comments_template();
}