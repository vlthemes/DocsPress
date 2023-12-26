<?php
/**
 * Single docs page template
 *
 * This template can be overridden by copying it to yourtheme/docspress/single/page.php.
 *
 * @author nK
 * @package docspress/Templates
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="vlt-page-content">

	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'vlt-docspress-single docspress-single' . ( docspress()->get_option( 'ajax', 'docspress_single', true ) ? ' docspress-single-ajax' : '' ) ); ?>>

			<?php docspress()->get_template_part( 'single/sidebar' ); ?>

			<div class="vlt-docspress-single__content docspress-single-content">

				<?php docspress()->get_template_part( 'single/content-title' ); ?>

				<div class="vlt-docspress-single__text">

					<?php the_content(); ?>

					<div class="clearfix"></div>

					<?php

						wp_link_pages( array(
							'before' => '<div class="vlt-link-pages"><h6>' . esc_html__( 'Pages: ', '@@textdomain' ) . '</h6>',
							'after' => '</div>',
							'separator' => '<span class="sep">|</span>',
							'nextpagelink' => esc_html__( 'Next page', '@@textdomain' ),
							'previouspagelink' => esc_html__( 'Previous page', '@@textdomain' ),
							'next_or_number' => 'next'
						) );

					?>

					<?php docspress()->get_template_part( 'single/content-articles' ); ?>

				</div>
				<!-- /.vlt-docspress-single__text -->

				<?php if ( function_exists( 'vlthemes_get_post_share_buttons' ) && docspress_get_theme_mod( 'show_share_docs' ) == 'show' ) : ?>

					<div class="vlt-docspress-single__share">

						<div class="vlt-docspress-share">

							<div class="vlt-docspress-share__links">
								<?php echo vlthemes_get_post_share_buttons( get_the_ID() ); ?>
							</div>

							<div class="vlt-docspress-share__permalink">
								<input type="text" name="shortlink" id="shortlink-<?php the_ID(); ?>" value="<?php the_permalink(); ?>" readonly>
								<span class="copy-shortlink vlt-social-icon vlt-social-icon--style-2" data-tippy-placement="top" data-tippy-content="<?php esc_attr_e( 'Copy', '@@textdomain' ); ?>" data-clipboard-label="<?php esc_attr_e( 'Copied', '@@textdomain' ); ?>" aria-expanded="false" data-clipboard-target="#shortlink-<?php the_ID(); ?>"><i class="ri-file-copy-line"></i></span>
							</div>

						</div>

					</div>
					<!-- /.vlt-docspress-share -->

				<?php endif; ?>

				<?php

					docspress()->get_template_part( 'single/adjacent-links' );

					docspress()->get_template_part( 'single/footer' );

					docspress()->get_template_part( 'single/feedback-suggestion' );

					if ( docspress()->get_option( 'show_comments', 'docspress_single', true ) ) {
						docspress()->get_template_part( 'single/comments' );
					}

				?>

			</div>
			<!-- /.vlt-docspress-single__content -->

		</article>

	<?php endwhile; ?>

</div>
<!-- /.vlt-page-content -->